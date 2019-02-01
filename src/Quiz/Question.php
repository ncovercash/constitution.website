<?php

namespace WeTheFuture\Quiz;

use \Exception;
use \WeTheFuture\API\ErrorCodes;
use \WeTheFuture\Database\{AbstractDatabaseModel, Column, Tables};
use \WeTheFuture\Database\Query\{InsertQuery, SelectQuery};
use \WeTheFuture\Database\QueryAddition\{OrderByClause, WhereClause};
use \WeTheFuture\Form\Field\{AutocompleteValues, SelectField, HiddenInputField, CheckboxField, RadioField, StaticHTMLField, TextField};

/**
 * Basic model class, nothing fancy
 * @method int getQuizId()
 * @method void setQuizId(int $id)
 * @method string getQuestion()
 * @method void setQuestion(string $question)
 * @method string getAnswerType()
 * @method void setAnswerType(string $answerType)
 * @method string|null getAnswer()
 * @method void setAnswer(string|null $answer)
 * @method string|null getExplanation()
 * @method void setExplanation(string|null $explanation)
 */
class Question extends AbstractDatabaseModel {
	/**
	 * Columns to prefetch from constructor
	 *
	 * @return string[]
	 */
	public static function getPrefetchColumns() : array {
		return [
			"QUIZ_ID",
			"QUESTION",
			"ANSWER_TYPE", // 'MC', 'CHECK', 'DROPDOWN', 'BLANK', 'TF'
			"ANSWER",
			"EXPLANATION",
		];
	}

	public function getQuiz() : Quiz {
		return new Quiz($this->getQuizId());
	}

	/**
	 * @return Answer[]
	 */
	public function getAnswers() : array {
		return $this->getDataFromCallableOrCache("ANSWERS", function() : array {
			return Answer::getForQuestion($this);
		});
	}

	/**
	 * @param Quiz $quiz
	 * @return self[]
	 */
	public static function getForQuiz(Quiz $quiz) : array {
		$stmt = new SelectQuery();

		$stmt->setTable(self::getTable());

		$stmt->addColumn(new Column("ID", self::getTable()));
		$stmt->addColumn(new Column("QUIZ_ID", self::getTable()));
		$stmt->addColumn(new Column("QUESTION", self::getTable()));
		$stmt->addColumn(new Column("ANSWER_TYPE", self::getTable()));
		$stmt->addColumn(new Column("ANSWER", self::getTable()));
		$stmt->addColumn(new Column("EXPLANATION", self::getTable()));

		$whereClause = new WhereClause();
		$whereClause->addToClause([new Column("QUIZ_ID", self::getTable()), "=", $quiz->getId()]);
		$stmt->addAdditionalCapability($whereClause);

		$stmt->execute();

		$rows = $stmt->getResult();
		shuffle($rows);

		return array_map(function($row) { return new self($row["ID"], $row, false); }, $rows);
	}

	public function getFormFields(int $number) {
		$fields = [];

		$label = new StaticHTMLField();
		$label->setHtml('<input type="hidden" id="question-'.$number.'-db-id" value="'.$this->getId().'"><h4>'.$number.". ".htmlspecialchars($this->getQuestion())."</h4>");
		$fields[] = $label;

		$questionSortHint = new HiddenInputField();
		$questionSortHint->setDistinguisher("question-sort[".$number."]");
		$questionSortHint->setSelector("#question-".$number."-db-id");
		$fields[] = $questionSortHint;

		switch ($this->getAnswerType()) {
			case "BLANK":
				$input = new TextField();
				$input->setDistinguisher("question-answer[".$this->getId()."]");
				$input->setRequired(true);
				$input->setLabel("Response");
				$input->setAutocompleteAttribute(AutocompleteValues::OFF);
				$input->addError(95001, ErrorCodes::ERR_95001);
				$input->setMissingErrorCode(95001);
				$input->addError(95002, ErrorCodes::ERR_95002);
				$input->setInvalidErrorCode(95002);
				$fields[] = $input;
				break;
			case "DROPDOWN":
				$input = new SelectField();
				$input->setDistinguisher("question-answer[".$this->getId()."]");
				$input->setRequired(true);
				$input->setLabel("Response");
				$options = [];
				foreach ($this->getAnswers() as $answer) {
					$options[] = [(string)$answer->getId(), $answer->getText()];
				}
				$input->setOptions($options);
				$input->setAutocompleteAttribute(AutocompleteValues::OFF);
				$input->addError(95001, ErrorCodes::ERR_95001);
				$input->setMissingErrorCode(95001);
				$input->addError(95002, ErrorCodes::ERR_95002);
				$input->setInvalidErrorCode(95002);
				$fields[] = $input;
				break;
			case "MC":
			case "TF":
				$input = new RadioField();
				$input->setDistinguisher("question-answer[".$this->getId()."]");
				$input->setRequired(true);
				$input->setLabel("Response");
				$options = [];
				foreach ($this->getAnswers() as $answer) {
					$options[] = [(string)$answer->getId(), $answer->getText()];
				}
				$input->setOptions($options);
				$input->setAutocompleteAttribute(AutocompleteValues::OFF);
				$input->addError(95001, ErrorCodes::ERR_95001);
				$input->setMissingErrorCode(95001);
				$input->addError(95002, ErrorCodes::ERR_95002);
				$input->setInvalidErrorCode(95002);
				$fields[] = $input;
				break;
			case "CHECK":
				foreach ($this->getAnswers() as $answer) {
					$input = new CheckboxField();
					$input->setDistinguisher("question-answer[".$this->getId()."][".$answer->getId()."]");
					$input->setRequired(false);
					$input->setLabel($answer->getText());
					$input->addError(95001, ErrorCodes::ERR_95001);
					$input->setMissingErrorCode(95001);
					$input->addError(95002, ErrorCodes::ERR_95002);
					$input->setInvalidErrorCode(95002);
					$fields[] = $input;
				}
				break;
			default:
				throw new Exception("Unsupported answer type ".$this->getAnswerType());
				break;
		}
		return $fields;
	}

	public function getCanonAnswerString($answer) : string {
		switch ($this->getAnswerType()) {
			case "BLANK":
				return $answer;
			case "DROPDOWN":
			case "MC":
			case "TF":
				return ((new Answer((int)$answer))->getText());
			case "CHECK":
				$answers = [];
				foreach ($answer as $id => $value) {
					if ($value == "true") {
						$answers[] = (new Answer((int)$id))->getText();
					}
				}
				return empty($answers) ? "None selected" : implode(", ", $answers);
			default:
				throw new Exception("Unsupported answer type ".$this->getAnswerType());
				break;
		}
	}

	public function getCanonCorrectAnswerString() : string {
		switch ($this->getAnswerType()) {
			case "BLANK":
				return $this->getAnswer()."";
			case "DROPDOWN":
			case "MC":
			case "TF":
				foreach ($this->getAnswers() as $answer) {
					if ($answer->isCorrect()) {
						return $answer->getText();
					}
				}
				throw new Exception("No correct answer");
			case "CHECK":
				$answers = [];
				foreach ($this->getAnswers() as $answer) {
					if ($answer->isCorrect()) {
						$answers[] = $answer->getText();
					}
				}
				return implode(", ", $answers);
			default:
				throw new Exception("Unsupported answer type ".$this->getAnswerType());
				break;
		}
	}

	public function checkAnswer($input) : bool {
		switch ($this->getAnswerType()) {
			case "BLANK":
				$prepareAnswer = function(string $in) : string {
					return preg_replace('/[^a-zA-Z0-9%$&+]+/', '', strtolower(trim($in)));
				};
				return $prepareAnswer($input) == $prepareAnswer($this->getAnswer()."");
			case "DROPDOWN":
			case "MC":
			case "TF":
				foreach ($this->getAnswers() as $answer) {
					if ($answer->isCorrect() && $answer->getId() == $input) {
						return true;
					}
				}
				return false;
			case "CHECK":
				foreach ($this->getAnswers() as $answer) {
					if ($answer->isCorrect() && $input[$answer->getId()] == "false") {
						return false;
					}
					if (!$answer->isCorrect() && $input[$answer->getId()] == "true") {
						return false;
					}
				}
				return true;
			default:
				throw new Exception("Unsupported answer type ".$this->getAnswerType());
				break;
		}
	}

	/**
	 * Table in which data resides in
	 *
	 * @return string
	 */
	public static function getTable() : string {
		return Tables::QUESTIONS;
	}

	/**
	 * Nothing should be deleted as we shouldn't delete via this method
	 * @return array
	 */
	public function getDeletedValues() : array {
		return [];
	}

	/**
	 * Create an object from the given info
	 *
	 * @param array $values
	 * @return self
	 */
	public static function create(array $values) : self {
		$stmt = new InsertQuery();

		$stmt->setTable(self::getTable());
		foreach (["QUIZ_ID", "QUESTION", "ANSWER_TYPE", "ANSWER", "EXPLANATION"] as $column) {
			$stmt->addColumn(new Column($column, self::getTable()));
			$stmt->addValue($values[$column]);
		}

		$stmt->execute();

		return new self($stmt->getResult(), $values, false);
	}

	/**
	 * Easily modifiable properties of the object
	 *
	 * @return array
	 */
	public static function getModifiableProperties() : array {
		return [
			"QuizId" => ["QUIZ_ID", null, null],
			"Question" => ["QUESTION", null, null],
			"AnswerType" => ["ANSWER_TYPE", null, null],
			"Answer" => ["ANSWER", null, null],
			"Explanation" => ["EXPLANATION", null, null],
		];
	}
}

<?php

namespace WeTheFuture\Quiz;

use \WeTheFuture\Database\{AbstractDatabaseModel, Column, Tables};
use \WeTheFuture\Database\Query\{InsertQuery, SelectQuery};
use \WeTheFuture\Database\QueryAddition\{OrderByClause, WhereClause};
use \WeTheFuture\Form\CompletionAction\DynamicRedirectCompletionAction;
use \WeTheFuture\Form\Field\{HiddenInputField, StaticHTMLField};
use \WeTheFuture\Form\Form;
use \WeTheFuture\Record\Record;

/**
 * Basic model class, nothing fancy
 * @method string getName()
 * @method void setName(int $name)
 * @method int getSort()
 * @method void setSort(int $sort)
 * @method string getTopic()
 * @method void setTopic(string $topic)
 * @method string getUrl()
 * @method void setUrl(string $url)
 */
class Quiz extends AbstractDatabaseModel {
	public const TOPIC_MAP = [
		"HISTORY" => "History",
		"AMENDMENTS" => "Amendments",
		"CONSTITUTION" => "Constitution",
		"ALL" => "All",
	];

	/**
	 * Columns to prefetch from constructor
	 *
	 * @return string[]
	 */
	public static function getPrefetchColumns() : array {
		return [
			"NAME",
			"SORT",
			"TOPIC",
			"URL",
		];
	}

	/**
	 * @return self[]
	 */
	public static function getAll() : array {
		$stmt = new SelectQuery();

		$stmt->setTable(self::getTable());

		$stmt->addColumn(new Column("ID", self::getTable()));
		$stmt->addColumn(new Column("NAME", self::getTable()));
		$stmt->addColumn(new Column("SORT", self::getTable()));
		$stmt->addColumn(new Column("TOPIC", self::getTable()));
		$stmt->addColumn(new Column("URL", self::getTable()));

		$orderByClause = new OrderByClause();
		$orderByClause->setColumn(new Column("SORT", self::getTable()));
		$orderByClause->setOrder("ASC");
		$stmt->addAdditionalCapability($orderByClause);

		$stmt->execute();

		$rows = $stmt->getResult();

		return array_map(function($row) { return new self($row["ID"], $row, false); }, $rows);
	}

	/**
	 * @param string $url
	 * @return self|null
	 */
	public static function getFromUrl(string $url) : ?self {
		$stmt = new SelectQuery();

		$stmt->setTable(self::getTable());

		$stmt->addColumn(new Column("ID", self::getTable()));
		$stmt->addColumn(new Column("NAME", self::getTable()));
		$stmt->addColumn(new Column("SORT", self::getTable()));
		$stmt->addColumn(new Column("TOPIC", self::getTable()));
		$stmt->addColumn(new Column("URL", self::getTable()));

		$whereClause = new WhereClause();
		$whereClause->addToClause([new Column("URL", self::getTable()), "=", $url]);
		$stmt->addAdditionalCapability($whereClause);

		$orderByClause = new OrderByClause();
		$orderByClause->setColumn(new Column("SORT", self::getTable()));
		$orderByClause->setOrder("ASC");
		$stmt->addAdditionalCapability($orderByClause);

		$stmt->execute();

		$rows = $stmt->getResult();

		if (count($rows)) {
			return new self($rows[0]["ID"], $rows[0], false);
		} else {
			return null;
		}
	}

	/**
	 * @return Form
	 */
	public function getForm() : Form {
		$form = new Form();

		$form->setDistinguisher($this->getUrl()); // it's already unique /shrug
		$form->setMethod(Form::POST);
		$form->setEndpoint("internal/quiz_take/");
		$form->setButtonText("SUBMIT");
		$form->setPrimary(true);

		$completionAction = new DynamicRedirectCompletionAction();
		$form->setCompletionAction($completionAction);

		$hiddenInputs = new StaticHTMLField();
		$hiddenInputs->setHtml('<input type="hidden" id="quiz-id" value="'.$this->getId().'"><input type="hidden" id="start-time" value="'.microtime(true).'">');
		$form->addField($hiddenInputs);

		$quizIdField = new HiddenInputField();
		$quizIdField->setDistinguisher("quiz-id");
		$quizIdField->setSelector("#quiz-id");
		$form->addField($quizIdField);

		$startTimeField = new HiddenInputField();
		$startTimeField->setDistinguisher("start-time");
		$startTimeField->setSelector("#start-time");
		$form->addField($startTimeField);

		$i = 1;
		foreach ($this->getQuestions() as $question) {
			foreach ($question->getFormFields($i++) as $field) {
				$form->addField($field);
			}
		}

		return $form;
	}

	/**
	 * @return Question[]
	 */
	public function getQuestions() : array {
		return $this->getDataFromCallableOrCache("QUESTIONS", function() : array {
			return Question::getForQuiz($this);
		});
	}

	/**
	 * @return Record[]
	 */
	public function getRecords() : array {
		return $this->getDataFromCallableOrCache("RECORDS", function() : array {
			return Record::getForQuiz($this);
		});
	}

	/**
	 * @return string
	 */
	public function getFriendlyTopic() : string {
		return self::TOPIC_MAP[$this->getTopic()];
	}

	/**
	 * Table in which data resides in
	 *
	 * @return string
	 */
	public static function getTable() : string {
		return Tables::QUIZZES;
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

		foreach (["NAME", "SORT", "TOPIC", "URL"] as $column) {
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
			"Name" => ["NAME", null, null],
			"Sort" => ["SORT", null, null],
			"Topic" => ["TOPIC", null, null],
			"Url" => ["URL", null, null],
		];
	}
}

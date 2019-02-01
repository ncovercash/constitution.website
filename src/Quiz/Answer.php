<?php

namespace WeTheFuture\Quiz;

use \WeTheFuture\Database\{AbstractDatabaseModel, Column, Tables};
use \WeTheFuture\Database\Query\{InsertQuery, SelectQuery};
use \WeTheFuture\Database\QueryAddition\{OrderByClause, WhereClause};

/**
 * Basic model class, nothing fancy
 * @method int getQuestionId()
 * @method void setQuestionId(int $id)
 * @method bool isCorrect()
 * @method void setQuestion(bool $correct)
 * @method string getText()
 * @method void setText(string $text)
 * @method string|null getExplanation()
 * @method void setExplanation(string|null $explanation)
 */
class Answer extends AbstractDatabaseModel {
	/**
	 * Columns to prefetch from constructor
	 *
	 * @return string[]
	 */
	public static function getPrefetchColumns() : array {
		return [
			"QUESTION_ID",
			"CORRECT",
			"TEXT",
			"EXPLANATION",
		];
	}

	public function getQuestion() : Question {
		return new Question($this->getQuestionId());
	}

	/**
	 * @param Question $question
	 * @return self[]
	 */
	public static function getForQuestion(Question $question) : array {
		$stmt = new SelectQuery();

		$stmt->setTable(self::getTable());

		$stmt->addColumn(new Column("ID", self::getTable()));
		$stmt->addColumn(new Column("QUESTION_ID", self::getTable()));
		$stmt->addColumn(new Column("CORRECT", self::getTable()));
		$stmt->addColumn(new Column("TEXT", self::getTable()));
		$stmt->addColumn(new Column("EXPLANATION", self::getTable()));

		$whereClause = new WhereClause();
		$whereClause->addToClause([new Column("QUESTION_ID", self::getTable()), "=", $question->getId()]);
		$stmt->addAdditionalCapability($whereClause);

		$stmt->execute();

		$rows = $stmt->getResult();

		if ($question->getAnswerType() != "TF") {
			shuffle($rows);
		}

		return array_map(function($row) { return new self($row["ID"], $row, false); }, $rows);
	}

	/**
	 * Table in which data resides in
	 *
	 * @return string
	 */
	public static function getTable() : string {
		return Tables::ANSWERS;
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

		foreach (["QUESTION_ID", "CORRECT", "TEXT", "EXPLANATION",] as $column) {
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
			"QuestionId" => ["QUESTION_ID", null, null],
			"Correct" => ["CORRECT", "boolval", null],
			"Text" => ["TEXT", null, null],
			"Explanation" => ["EXPLANATION", null, null],
		];
	}
}

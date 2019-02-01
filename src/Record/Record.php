<?php

namespace WeTheFuture\Record;

use \DateTime;
use \WeTheFuture\Database\{AbstractDatabaseModel, Column, Tables};
use \WeTheFuture\Database\Query\{InsertQuery, SelectQuery};
use \WeTheFuture\Database\QueryAddition\{OrderByClause, WhereClause};
use \WeTheFuture\Quiz\Quiz;
use \WeTheFuture\User\User;

/**
 * Basic model class, nothing fancy
 * @method int getUserId()
 * @method void setUserId(int $id)
 * @method int getQuizId()
 * @method void setQuizId(int $id)
 * @method string getToken()
 * @method void setToken(string $token)
 * @method int getTime()
 * @method void setTime(int $time)
 * @method float getGrade()
 * @method void setGrade(float $grade)
 * @method array getData()
 * @method void setData(array $data)
 * @method DateTime getDate()
 * @method void setDate(DateTime $date)
 */
class Record extends AbstractDatabaseModel {
	/**
	 * Columns to prefetch from constructor
	 *
	 * @return string[]
	 */
	public static function getPrefetchColumns() : array {
		return [
			"USER_ID",
			"QUIZ_ID",
			"TOKEN",
			"TIME",
			"GRADE",
			"DATA",
			"DATE",
		];
	}

	/**
	 * @param Quiz $quiz
	 * @return self[]
	 */
	public static function getForQuiz(Quiz $quiz) : array {
		$stmt = new SelectQuery();

		$stmt->setTable(self::getTable());

		$stmt->addColumn(new Column("ID", self::getTable()));
		$stmt->addColumn(new Column("USER_ID", self::getTable()));
		$stmt->addColumn(new Column("QUIZ_ID", self::getTable()));
		$stmt->addColumn(new Column("TOKEN", self::getTable()));
		$stmt->addColumn(new Column("TIME", self::getTable()));
		$stmt->addColumn(new Column("GRADE", self::getTable()));
		$stmt->addColumn(new Column("DATA", self::getTable()));
		$stmt->addColumn(new Column("DATE", self::getTable()));

		$whereClause = new WhereClause();
		$whereClause->addToClause([new Column("QUIZ_ID", self::getTable()), "=", $quiz->getId()]);
		$stmt->addAdditionalCapability($whereClause);

		$stmt->execute();

		$rows = $stmt->getResult();

		return array_map(function($row) { return new self($row["ID"], $row, false); }, $rows);
	}

	/**
	 * @param User $user
	 * @return self[]
	 */
	public static function getForUser(User $user) : array {
		$stmt = new SelectQuery();

		$stmt->setTable(self::getTable());

		$stmt->addColumn(new Column("ID", self::getTable()));
		$stmt->addColumn(new Column("USER_ID", self::getTable()));
		$stmt->addColumn(new Column("QUIZ_ID", self::getTable()));
		$stmt->addColumn(new Column("TOKEN", self::getTable()));
		$stmt->addColumn(new Column("TIME", self::getTable()));
		$stmt->addColumn(new Column("GRADE", self::getTable()));
		$stmt->addColumn(new Column("DATA", self::getTable()));
		$stmt->addColumn(new Column("DATE", self::getTable()));

		$whereClause = new WhereClause();
		$whereClause->addToClause([new Column("USER_ID", self::getTable()), "=", $user->getId()]);
		$stmt->addAdditionalCapability($whereClause);

		$stmt->execute();

		$rows = $stmt->getResult();

		return array_map(function($row) { return new self($row["ID"], $row, false); }, $rows);
	}

	/**
	 * @return User
	 */
	public function getUser() : User {
		return $this->getDataFromCallableOrCache("USER", function() : User {
			return new User($this->getUserId());
		});
	}

	/**
	 * @return Quiz
	 */
	public function getQuiz() : Quiz {
		return $this->getDataFromCallableOrCache("QUIZ", function() : Quiz {
			return new Quiz($this->getQuizId());
		});
	}

	/**
	 * Table in which data resides in
	 *
	 * @return string
	 */
	public static function getTable() : string {
		return Tables::RECORDS;
	}

	/**
	 * @param string $token
	 * @return self|null
	 */
	public static function getFromToken(string $token) : ?self {
		$stmt = new SelectQuery();

		$stmt->setTable(self::getTable());
		
		$stmt->addColumn(new Column("ID", self::getTable()));
		$stmt->addColumn(new Column("USER_ID", self::getTable()));
		$stmt->addColumn(new Column("QUIZ_ID", self::getTable()));
		$stmt->addColumn(new Column("TOKEN", self::getTable()));
		$stmt->addColumn(new Column("TIME", self::getTable()));
		$stmt->addColumn(new Column("GRADE", self::getTable()));
		$stmt->addColumn(new Column("DATA", self::getTable()));
		$stmt->addColumn(new Column("DATE", self::getTable()));

		$whereClause = new WhereClause();
		$whereClause->addToClause([new Column("TOKEN", self::getTable()), "=", $token]);
		$stmt->addAdditionalCapability($whereClause);

		$stmt->execute();

		if (count($stmt->getResult())) {
			return new self($stmt->getResult()[0]["ID"], $stmt->getResult()[0], false);
		}
		return null;
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

		foreach (["USER_ID", "QUIZ_ID", "TOKEN", "TIME", "GRADE", "DATA", "DATE"] as $column) {
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
			"UserId" => ["USER_ID", null, null],
			"QuizId" => ["QUIZ_ID", null, null],
			"Token" => ["TOKEN", null, null],
			"Time" => ["TIME", null, null],
			"Grade" => ["GRADE", null, null],
			"Data" => ["DATA", "json_decode", "json_encode"],
			"Date" => ["DATE", "date_create", function(DateTime $in) : string {
				return $in->format("Y-m-d");
			}],
		];
	}
}

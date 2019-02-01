<?php

namespace WeTheFuture\Database\Query;

use \WeTheFuture\Database\Database;
use \WeTheFuture\HTTPCode;
use \WeTheFuture\API\{Endpoint, Response};

/**
 * Represents a MySQL INSERT query
 */
class InsertQuery extends AbstractQuery {
	/**
	 * Executes the query
	 * 
	 * Bind columns and whatnot. Also fills in ? for PDO binding
	 * 
	 * @return bool if the query was successful
	 */
	public function execute() : bool {
		$this->verifyIntegrity();

		$initialQuery = "INSERT INTO `".$this->table."` ";;
		
		$initialQuery .= "(".implode(",", $this->columns).")";

		$initialQuery .= " VALUES ";
		$initialQuery .= "(".implode(",",array_fill(0, count($this->values), "?")).")";

		// additional
		if (is_array($this->additionalCapabilities)) {
			foreach ($this->additionalCapabilities as $additionalCapability) {
				$initialQuery .= " ";
				// each additional capability should verify integrity in its getQueryString
				$initialQuery .= $additionalCapability->getQueryString();
			}
		}
		$initialQuery .= ";";

		$stmt = Database::getDbh()->prepare($initialQuery);

		$stmt->execute($this->getParamtersToBind());

		$this->result = (int)Database::getDbh()->lastInsertId();

		self::$totalQueries++;

		return true;
	}
}

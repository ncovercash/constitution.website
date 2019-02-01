<?php

namespace WeTheFuture;

use \WeTheFuture\Database\{Column, Tables};
use \WeTheFuture\Database\Query\SelectQuery;

/**
 * A class which facilitates generation of (potentially unique) tokens
 */
class Tokens {
	// characters which nacan be made into tokens
	// [a-z0-9]
	public const TOKEN_CHARS = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","0","1","2","3","4","5","6","7","8","9"];
	public const TOKEN_REGEX = '^[a-z0-9]*$';

	public const EMAIL_VERIFICATION_TOKEN_LENGTH = 12;
	public const RECORD_TOKEN_LENGTH = 30;
	public const USER_FILE_TOKEN_LENGTH = 10;

	public const EMAIL_VERIFICATION_TOKEN_REGEX = '^[a-z0-9]{'.self::EMAIL_VERIFICATION_TOKEN_LENGTH.'}$';
	public const RECORD_TOKEN_REGEX = '^[a-z0-9]{'.self::RECORD_TOKEN_LENGTH.'}$';
	public const USER_FILE_TOKEN_REGEX = '^[a-z0-9]{'.self::USER_FILE_TOKEN_LENGTH.'}$';

	/**
	 * @return string
	 */
	public static function generateRecordToken() : string {
		return self::generateUniqueToken(self::RECORD_TOKEN_LENGTH, Tables::RECORDS, "TOKEN");
	}

	/**
	 * Get a UNIQUE FILE_TOKEN for a User
	 * 
	 * @return string
	 */
	public static function generateUserFileToken() : string {
		return self::generateUniqueToken(self::USER_FILE_TOKEN_LENGTH, Tables::USERS, "FILE_TOKEN");
	}

	/**
	 * Generate a token for a user's email verification
	 * 
	 * @return string token
	 */
	public static function generateEmailVerificationToken() : string {
		return self::generateToken(self::EMAIL_VERIFICATION_TOKEN_LENGTH);
	}

	/**
	 * Generate a psuedorandom token
	 * 
	 * This uses the Mersenne Twister algorithm (underlying for array_rand), which is secure enough
	 * and a psuedo-random enough number
	 * @param int $length
	 * @return string generated token
	 */
	public static function generateToken(int $length) : string {
		return self::generateTokenFromCharset($length, self::TOKEN_CHARS);
	}

	/**
	 * Generate a psuedorandom token from a given list of characters
	 * 
	 * This uses the Mersenne Twister algorithm (underlying for array_rand), which is secure enough
	 * and a psuedo-random enough number
	 * @param int $length
	 * @param array $chars
	 * @return string generated token
	 */
	public static function generateTokenFromCharset(int $length, array $chars) : string {
		return str_shuffle(implode("", array_map(function ($in) use ($chars) { return $chars[array_rand($chars)]; }, range(1, $length))));
	}

	/**
	 * Get an array of in-use tokens from the database
	 * 
	 * @param string $table Database table
	 * @param string $column Database column which holds tokens
	 * @return string[] Tokens currently in use
	 */
	public static function getTokensFromDatabase(string $table, string $column) : array {
		$stmt = new SelectQuery();

		$stmt->setTable($table);
		$stmt->addColumn(new Column($column, $table));

		$stmt->execute();

		return array_column($stmt->getResult(), $column);
	}

	/**
	 * Get a unique token with a given length and database column/table
	 * 
	 * @param int $length Token length
	 * @param string $table Table
	 * @param string $column Column
	 * @return string Unique token
	 */
	public static function generateUniqueToken(int $length, string $table, string $column) : string {
		$existingTokens = self::getTokensFromDatabase($table, $column);
		
		$token = self::generateToken($length);

		while (in_array($token, $existingTokens)) {
			$token = self::generateToken($length);
		}

		return $token;
	}
}

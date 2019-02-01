<?php

namespace WeTheFuture\API;

use \WeTheFuture\Database\{Column, Tables};
use \WeTheFuture\Database\QueryAddition\{JoinClause, WhereClause};
use \WeTheFuture\Database\Query\SelectQuery;
use \WeTheFuture\HTTPCode;
use \WeTheFuture\User\User;
use \InvalidArgumentException;

/**
 * Utility functions for an endpoint
 */
class Endpoint {
	/**
	 * Regex to check a Client header (ID,SECRET)
	 */
	const CLIENT_HEADER_REGEX = '/^([a-z0-9]{16}),([a-z0-9]{60})$/';
	/**
	 * Regex to check a User header (TOKEN,SECRET)
	 */
	const USER_HEADER_REGEX = '/^([a-z0-9]{40}),([a-z0-9]{60})$/';

	/**
	 * If the currently accessed page is an endpoint
	 * 
	 * @var bool
	 */
	static $isEndpoint = false;
	/**
	 * If the current page is an internal endpoint
	 * 
	 * @var bool
	 */
	static $isInternalEndpoint = false;

	public const AUTH_REQUIRE_NONE = 0;
	public const AUTH_REQUIRE_LOGGED_IN = 1;
	public const AUTH_REQUIRE_LOGGED_OUT = 2;

	/**
	 * Ran for every endpoint
	 * 
	 * @param bool $internal Used to denote an internal API endpoint, affects authentication
	 * @param int $internalAuth Type of authentication to require for an internal endpoint
	 */
	public static function init(bool $internal=true, int $internalAuth=self::AUTH_REQUIRE_LOGGED_IN) : void {
		self::$isEndpoint = true;
		// ini_set('display_errors', 0); // don't pollute the JSON
		self::$isInternalEndpoint = $internal;
		switch ($internalAuth) {
			case 1:
				self::checkLoggedIn();
				break;
			case 2:
				self::checkLoggedOut();
				break;
			case 0: break; // none
			default:
				throw new InvalidArgumentException("Bad internal auth type specified");
		}
	}

	/**
	 * Get if the current page is an API endpoint
	 * 
	 * @return bool if the current page is an API endpoint
	 */
	public static function isEndpoint() : bool {
		return self::$isEndpoint;
	}

	/**
	 * Get if the current page is an internal API endpoint
	 * 
	 * @return bool if the current page is an internal API endpoint
	 */
	public static function isInternalEndpoint() : bool {
		return self::$isInternalEndpoint;
	}

	/**
	 * Check if there is a user logged in.  Used for internal API calls.
	 */
	protected static function checkLoggedIn() : void {
		if (!User::isLoggedIn()) {
			HTTPCode::set(401);
			Response::sendErrorResponse(99901, ErrorCodes::ERR_99901);
		}
	}


	/**
	 * Check if there is NOT a user logged in.  Used for internal API calls.
	 */
	protected static function checkLoggedOut() : void {
		if (User::isLoggedIn()) {
			HTTPCode::set(401);
			Response::sendErrorResponse(99902, ErrorCodes::ERR_99902);
		}
	}
}

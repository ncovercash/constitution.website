<?php

namespace WeTheFuture\API;

use \ReflectionClass;

/**
 * Contains the error messages for all error codes
 */
class ErrorCodes {
	// generic
	const ERR_10001 = 'Endpoint not found';
	const ERR_10002 = 'Invalid endpoint method';
	// we have several of these for various reasons/reusage
	const ERR_99990 = 'An internal error occured';
	const ERR_99991 = 'An internal error occured';
	const ERR_99992 = 'An internal error occured';
	const ERR_99993 = 'An internal error occured';
	const ERR_99994 = 'An internal error occured';
	const ERR_99995 = 'An internal error occured';
	const ERR_99996 = 'An internal error occured';
	const ERR_99997 = 'An internal error occured';
	const ERR_99998 = 'An internal error occured';
	const ERR_99999 = 'An internal error occured';

	// internal
	// auth-related
	const ERR_99901 = 'No user is logged in';
	const ERR_99902 = 'A user is already logged in';
	const ERR_99903 = 'You are not an artist';

	// login
	const ERR_90101 = 'No username was entered';
	const ERR_90102 = 'Invalid username';
	const ERR_90103 = 'The username does not exist';
	const ERR_90104 = 'No password was entered';
	const ERR_90105 = 'Incorrect password';
	const ERR_90106 = 'No captcha was sent';
	const ERR_90107 = 'Invalid captcha';
	const ERR_90108 = 'This account has been suspended';
	const ERR_90109 = 'This account has been deactivated';
	const ERR_90110 = 'TOTP Challenge required';

	// totp login
	const ERR_90201 = 'There are no active TOTP logins';
	const ERR_90202 = 'No code was entered';
	const ERR_90203 = 'An invalid code was entered';
	const ERR_90204 = 'The code is invalid';

	// register
	const ERR_90301 = 'Username was not entered';
	const ERR_90302 = 'Username is invalid';
	const ERR_90303 = 'Username is already in use';
	const ERR_90304 = 'Name was not properly submitted';
	const ERR_90305 = 'Name is too long';
	const ERR_90306 = 'Email was not properly submitted';
	const ERR_90307 = 'Email is invalid';
	const ERR_90308 = 'Email is already in use';
	const ERR_90309 = 'Password was not entered';
	const ERR_90310 = 'Password does not meet the requirements';
	const ERR_90311 = 'Password confirmation was not entered';
	const ERR_90312 = 'Confirmation does not match the provided password';
	const ERR_90315 = 'This file is too large';
	const ERR_90316 = 'This file is not an image';
	const ERR_90317 = 'The image is invalid';
	const ERR_90322 = 'CAPTCHA was not sent';
	const ERR_90323 = 'CAPTCHA response was invalid';
	const ERR_90327 = 'Internal error';
	const ERR_90328 = 'You may not use our service if you are below this age.';
	const ERR_90329 = 'Missing school';
	const ERR_90330 = 'Invalid school';
	const ERR_90331 = 'Missing city';
	const ERR_90332 = 'Invalid city';
	const ERR_90333 = 'Missing state/province';
	const ERR_90334 = 'Invalid state/province';
	const ERR_90335 = 'Missing country';
	const ERR_90336 = 'Invalid country';

	// email verification
	const ERR_90401 = 'Token was not entered';
	const ERR_90402 = 'Token is invalid';
	const ERR_90403 = 'CAPTCHA was not sent';
	const ERR_90404 = 'CAPTCHA response was invalid';
	const ERR_90405 = 'Email is already verified';

	// settings
	const ERR_90501 = 'Username was not entered';
	const ERR_90502 = 'Username is invalid';
	const ERR_90503 = 'Username is in use by another user';
	const ERR_90504 = 'Name was not properly submitted';
	const ERR_90505 = 'Name is too long';
	const ERR_90506 = 'Email was not properly submitted';
	const ERR_90507 = 'Email is invalid';
	const ERR_90508 = 'Email is already in use';
	const ERR_90509 = 'New password was not properly submitted';
	const ERR_90510 = 'New password does not meet the requirements';
	const ERR_90511 = 'New password confirmation was not entered';
	const ERR_90512 = 'Password confirmation does not match the provided password';
	const ERR_90513 = 'Two-factor checkbox was not properly submitted';
	const ERR_90514 = 'Color was not entered';
	const ERR_90515 = 'Invalid color';
	const ERR_90516 = 'This file is too large';
	const ERR_90517 = 'This file is not an image';
	const ERR_90518 = 'The image is invalid';
	const ERR_90519 = 'The NSFW profile picture checkbox is invalid';
	const ERR_90520 = 'NSFW access checkbox is invalid';
	const ERR_90521 = 'Old password was not entered';
	const ERR_90522 = 'Old password is incorrect';
	const ERR_90529 = 'Missing school';
	const ERR_90530 = 'Invalid school';
	const ERR_90531 = 'Missing city';
	const ERR_90532 = 'Invalid city';
	const ERR_90533 = 'Missing state/province';
	const ERR_90534 = 'Invalid state/province';
	const ERR_90535 = 'Missing country';
	const ERR_90536 = 'Invalid country';

	// deactivate
	const ERR_90601 = 'No username was entered';
	const ERR_90602 = 'This username is not yours';
	const ERR_90603 = 'No password was entered';
	const ERR_90604 = 'Incorrect password';

	// quizzes
	const ERR_95001 = 'You must enter a response';
	const ERR_95002 = 'You must enter a response';

	/**
	 * Get an associative array of code => message based on class constants
	 * 
	 * @return array Associative array, code => message of all codes
	 */
	public static function getAssoc() : array {
		$reflectedClass = new ReflectionClass(__CLASS__);
		$constants = $reflectedClass->getConstants();

		$result = [];
		foreach ($constants as $name => $value) {
			$cutName = str_replace("ERR_", "", $name);
			$result[(int)$cutName] = $value;
		}

		return $result;
	}
}

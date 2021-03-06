<?php

namespace WeTheFuture\User;

use \WeTheFuture\Database\Query\{DeleteQuery, InsertQuery, SelectQuery};
use \WeTheFuture\Database\QueryAddition\{JoinClause, WhereClause};
use \WeTheFuture\Database\{AbstractDatabaseModel, Column, Tables};
use \WeTheFuture\Email\Email;
use \WeTheFuture\Images\{Folders, HasImageTrait, Image};
use \WeTheFuture\Tokens;
use \WeTheFuture\Integrations\HasSocialChipsTrait;
use \WeTheFuture\Message\MessagableTrait;
use \WeTheFuture\Page\Navigation\Navbar;
use \WeTheFuture\Page\{UniversalFunctions, Values};
use \InvalidArgumentException;
use \LogicException;

/**
 * Represents a user
 *
 * @method string getToken()
 * @method void setToken(string $token)
 * @method string getNickname()
 * @method void setNickname(string $nickname)
 * @method string getUsername()
 * @method void setUsername(string $username)
 * @method null|string getTotpKey()
 * @method void setTotpKey(null|string $totpKey)
 * @method null|string getEmail()
 * @method void setEmail(null|string $email)
 * @method string getSchool()
 * @method void setSchool(string $school)
 * @method string getCity()
 * @method void setCity(string $city)
 * @method string getStateProvince()
 * @method void setStateProvince(string $stateProvince)
 * @method string getCountry()
 * @method void setCountry(string $country)
 * @method bool isEmailVerified()
 * @method void setEmailVerified(bool $emailVerified)
 * @method bool isDeactivated()
 * @method void setDeactivated(bool $deactivated)
 * @method string getProfilePicturePath()
 * @method void setProfilePicturePath(string $path)
 */
class User extends AbstractDatabaseModel {
	use HasImageTrait;

	/**
	 * Check if a user is logged in
	 * 
	 * @return bool
	 */
	public static function isLoggedIn() : bool {
		return isset($_SESSION) && array_key_exists("user",$_SESSION) && $_SESSION["user"] instanceof self;
	}

	/**
	 * Check if there is currently a 2FA authentication in progress
	 * 
	 * @return bool
	 */
	public static function isPending2FA() : bool {
		return array_key_exists("pending_user",$_SESSION) && $_SESSION["pending_user"] instanceof self;
	}

	/**
	 * Verifies that the unserialized data is still usable
	 */
	protected function unserializeVerification() {
		if ($this->isDeactivated()) {
			throw new InvalidArgumentException("The current user account was deactivated.  Please refresh.");
		}
	}


	/**
	 * Get the user's permission scope
	 * 
	 * As of writing, this consists of the following possible values:
	 * ["all","logged_out","logged_in"]
	 * @return string[]
	 */
	public static function getPermissionScope() : array {
		if (self::isLoggedIn()) {
			$perms = ["all", "logged_in"];

			return $perms;
		} else {
			return ["all", "logged_out"];
		}
	}

	/**
	 * Get an ID if the username exists, and is unsuspended
	 * 
	 * @param string $username
	 * @return int -1 if not found
	 */
	public static function getIdFromUsername(string $username, bool $allowSuspendedAndDeactivated=false) : int {
		// check regex as not to sodomize the database
		if (!preg_match("/^([A-Za-z0-9._-]){2,64}$/", $username)) {
			return -1;
		}

		$stmt = new SelectQuery();

		$stmt->setTable(self::getTable());
		
		$stmt->addColumn(new Column("ID", self::getTable()));

		$whereClause = new WhereClause();
		$whereClause->addToClause([new Column("USERNAME", self::getTable()), "=", $username]);
		if (!$allowSuspendedAndDeactivated) {
			$whereClause->addToClause(WhereClause::AND);
			$whereClause->addToClause([new Column("DEACTIVATED", self::getTable()), "=", 0]);
		}
		$stmt->addAdditionalCapability($whereClause);

		$stmt->execute();

		if (empty($stmt->getResult())) {
			return -1;
		} else {
			return $stmt->getResult()[0]["ID"];
		}
	}

	/**
	 * Get an ID if the username exists, and is unsuspended
	 * 
	 * @param string $email
	 * @return int -1 if not found
	 */
	public static function getIdFromEmail(string $email, bool $allowSuspendedAndDeactivated=false) : int {
		$stmt = new SelectQuery();

		$stmt->setTable(self::getTable());
		
		$stmt->addColumn(new Column("ID", self::getTable()));

		$whereClause = new WhereClause();
		$whereClause->addToClause([new Column("EMAIL", self::getTable()), "=", $email]);
		if (!$allowSuspendedAndDeactivated) {
			$whereClause->addToClause(WhereClause::AND);
			$whereClause->addToClause([new Column("DEACTIVATED", self::getTable()), "=", 0]);
		}
		$stmt->addAdditionalCapability($whereClause);

		$stmt->execute();

		if (empty($stmt->getResult())) {
			return -1;
		} else {
			return $stmt->getResult()[0]["ID"];
		}
	}

	/**
	 * From
	 * 
	 * @return string
	 */
	public static function getTable() : string {
		return Tables::USERS;
	}

	/**
	 * The folder containing the image
	 * @return string
	 */
	public static function getImageFolder() : string {
		return Folders::PROFILE_PHOTO;
	}

	/**
	 * Verify the user's password
	 *
	 * @param string $password to test
	 * @return bool valid password
	 */
	public function verifyPassword(string $password) : bool {
		$valid = password_verify($password, $this->getColumnFromDatabaseOrCache("HASHED_PASSWORD"));
		if ($valid && password_needs_rehash($this->getColumnFromDatabaseOrCache("HASHED_PASSWORD"), Values::PASSWORD_HASH, Values::PASSWORD_OPTIONS)) {
			$this->setPassword($password);
		}
		return $valid;
	}

	/**
	 * Create a password hash
	 *
	 * @param string $password to test
	 * @return string new password
	 */
	public static function hashPassword(string $password) : string {
		return password_hash($password, Values::PASSWORD_HASH, Values::PASSWORD_OPTIONS) ?: "COULD NOT HASH PASSWORD";
	}

	/**
	 * @param string $password to set
	 */
	public function setPassword(string $password) : void {
		$this->updateColumnInDatabase("HASHED_PASSWORD", self::hashPassword($password));
	}

	/**
	 * Get the token used to verify the User's e-mail address
	 * 
	 * Will change upon email address change
	 * @return string
	 */
	public function getEmailToken() : string {
		return $this->getColumnFromDatabaseOrCache("EMAIL_TOKEN");
	}

	/**
	 * Send the User a verification e-mail, if their email is not yet verified
	 */
	public function sendVerificationEmail() : void {
		if ($this->isEmailVerified() || is_null($this->getEmail())) { // is_null is really for phpstan, as isEmailVerified has that within
			return;
		}

		// get the base URL to use
		// maybe change this to a hardcoded link?
		$out = [];
		if (!preg_match("/^(.*)(EmailVerification|Register|Settings|api).*/", UniversalFunctions::getRequestUrl(), $out)) {
			throw new LogicException("User::sendVerificationEmail called from an unknown page");
		}
		$url = $out[1]."EmailVerification/?token=".$this->getEmailToken();

		$subject = "Noah Overcash We the Future Contest Entry - Email verification";

		$htmlEmail = "";

		$htmlEmail .= Email::getEmailHeadHtml();
		
		$htmlEmail .= '<div';
		$htmlEmail .= ' class="container"';
		$htmlEmail .= '>';

		$htmlEmail .= UniversalFunctions::createHeading("Email Verification");

		$htmlEmail .= '<div';
		$htmlEmail .= ' class="section">';

		$htmlEmail .= '<p';
		$htmlEmail .= ' class="flow-text"';
		$htmlEmail .= '>';

		$htmlEmail .= 'Thank you for registering!';
		
		$htmlEmail .= '</p>';
		
		$htmlEmail .= '<p';
		$htmlEmail .= ' class="flow-text">';
		
		$htmlEmail .= 'Please click the button below to activate your account.';
		
		$htmlEmail .= '</p>';
		
		$htmlEmail .= '<div>'; // wrapping in a block
		
		$htmlEmail .= '<a';
		$htmlEmail .= ' href="'.$url.'"';
		$htmlEmail .= ' class="btn"';
		$htmlEmail .= '>';
		
		$htmlEmail .= 'Verify';
		
		$htmlEmail .= '</a>';
		
		$htmlEmail .= '</div>';

		$htmlEmail .= '<p>';

		
		$htmlEmail .= 'Alternatively, use the token ';
		
		$htmlEmail .= '<span';
		$htmlEmail .= ' style="';
		$htmlEmail .= 'font-weight: 700;';
		$htmlEmail .= 'font-family: monospace;';
		$htmlEmail .= '"'; // bold
		$htmlEmail .= '>';
		
		$htmlEmail .= ''.$this->getEmailToken().'';
		
		$htmlEmail .= '</span>';
		
		$htmlEmail .= ' to verify your email.';
		
		$htmlEmail .= '</p>';
		
		$htmlEmail .= '</div>';
		
		$htmlEmail .= '</div>';
		
		$htmlEmail .= '</body>';
		
		$htmlEmail .= '</html>';


		$textEmail = '';
		$textEmail .= 'Email Verification'."\r\n";
		$textEmail .= "\r\n";
		$textEmail .= 'Thank you for registering!'."\r\n";
		$textEmail .= 'Please go to the following URL to verify your account:'."\r\n";
		$textEmail .= $url."\r\n";
		$textEmail .= "Alternatively, use the token ".$this->getEmailToken().' to verify your email'."\r\n";

		Email::sendEmail([[$this->getEmail(), $this->getNickname()]], $subject, $htmlEmail, $textEmail, Email::NO_REPLY_EMAIL, Email::NO_REPLY_PASSWORD);
	}

	/**
	 * Straight out of the HasImageTrait
	 */
	public function initializeImage() : void {
		$this->setImage(new Image(self::getImageFolder(), $this->getToken(), $this->getColumnFromDatabaseOrCache("PICTURE_LOC")));
	}

	/**
	 * Get the HTML for the User's account in the navigation bar
	 * 
	 * @param int $bar The type of navbar
	 * @return string HTML
	 */
	public function getNavbarDropdown(int $bar) : string {
		if ($bar == Navbar::NAVBAR) {
			$str = "";
			$str .= $this->getImage()->getStrictCircleHtml(["valign"]); // valign needed to make it play nice
			$str .= htmlspecialchars($this->getNickname());
			return $str;
		} else { // sidebar
			return "My Account";
		}
	}

	/**
	 * Get the HTML for the sidenav header (pfp, username, nick)
	 * 
	 * @return string HTML
	 */
	public function getSidenavHTML() : string {
		$str = "";

		$str .= '<li';
		$str .= ' class="center"';
		$str .= '>';

		$str .= $this->getImage()->getStrictCircleHtml();
		
		$str .= '<h5>';
		
		$str .= htmlspecialchars($this->getNickname());

		$str .= '</h5>';

		$str .= '<p';
		$str .= ' class="grey-text"';
		$str .= '>';

		$str .= htmlspecialchars($this->getUsername());
		
		$str .= '</p>';

		$str .= '</li>';

		return $str;
	}

	/**
	 * Gets HTML for a message which designates a user-only page
	 * 
	 * @return string
	 */
	public static function getNotLoggedInHtml() : string {
		$str = '';

		$str .= '<div';
		$str .= ' class="section"';
		$str .= '>';

		$str .= '<p';
		$str .= ' class="flow-text"';
		$str .= '>';

		$str .= 'You must log in to access this page.  ';

		$str .= '<a';
		$str .= ' href="'.ROOTDIR.'Login"';
		$str .= '>';

		$str .= 'Login';

		$str .= '</a>';
		
		$str .= '</p>';

		$str .= '</div>';

		return $str;
	}

	/**
	 * Get deleted values for when a user is delet
	 * @return array
	 */
	public function getDeletedValues() : array {
		return [
			"HASHED_PASSWORD" => "DELETED USER",
			"TOTP_KEY" => null,
			"EMAIL_TOKEN" => Tokens::generateEmailVerificationToken(),
			"PICTURE_LOC" => null,
			"NICK" => "Deleted user",
			"DEACTIVATED" => true,
			"SCHOOL" => "",
			"CITY" => "",
			"STATE_PROVINCE" => "",
			"COUNTRY" => "",
		];
	}

	/**
	 * @return array
	 */
	public static function getPrefetchColumns() : array {
		return [
			"FILE_TOKEN",
			"USERNAME",
			"HASHED_PASSWORD",
			"TOTP_KEY",
			"SCHOOL",
			"CITY",
			"STATE_PROVINCE",
			"COUNTRY",
			"EMAIL",
			"EMAIL_VERIFIED",
			"EMAIL_TOKEN",
			"PICTURE_LOC",
			"NICK",
			"DEACTIVATED",
		];
	}

	/**
	 * Overridden to do additional deletion of subitems
	 */
	public function additionalDeletion() : void {
		$stmt = new DeleteQuery();
		
		$stmt->setTable(Tables::RECORDS);
		
		$whereClause = new WhereClause();
		$whereClause->addToClause([new Column("USER_ID", Tables::RECORDS), "=", $this->getId()]);
		$stmt->addAdditionalCapability($whereClause);

		$stmt->execute();
	}

	/**
	 * Create a user
	 *
	 * @param array $values
	 * @return self
	 */
	public static function create(array $values) : User {
		// per array_merge docs:
		// If the input arrays have the same string keys, then the latter value
		//  for that key will overwrite the previous one
		$values = array_merge([
			"FILE_TOKEN" => Tokens::generateUserFileToken(),
			"TOTP_KEY" => null,
			"EMAIL" => null,
			"EMAIL_VERIFIED" => 0,
			"EMAIL_TOKEN" => Tokens::generateEmailVerificationToken(),
			"PICTURE_LOC" => null,
			"NICK" => $values["USERNAME"],
		], $values);

		$stmt = new InsertQuery();

		$stmt->setTable(self::getTable());

		foreach (["FILE_TOKEN", "USERNAME", "HASHED_PASSWORD", "EMAIL", "EMAIL_TOKEN", "PICTURE_LOC", "NICK", "SCHOOL", "CITY", "STATE_PROVINCE", "COUNTRY"] as $column) {
			$stmt->addColumn(new Column($column, self::getTable()));
			$stmt->addValue($values[$column]);
		}

		$stmt->execute();

		$user = new self($stmt->getResult(), $values);

		// if the user's email is null, this will silently return
		$user->sendVerificationEmail();

		return $user;
	}

	/**
	 * Get whether or not the user has TOTP authentication enables
	 * 
	 * @return bool
	 */
	public function isTotpEnabled() : bool {
		return !is_null($this->getTotpKey());
	}

	/**
	 * Get modifiable properties for the model
	 *
	 * 	"Name" => ["COLUMN_NAME", function($value) {return $out;}, function($newValue) {return $out;}]
	 * @return array
	 */
	public static function getModifiableProperties() : array {
		return [
			"Token" => ["FILE_TOKEN", null, null],
			"Nickname" => ["NICK", null, null],
			"Username" => ["USERNAME", null, null],
			"TotpKey" => ["TOTP_KEY", null, null],
			"Email" => ["EMAIL", null, null],
			"School" => ["SCHOOL", null, null],
			"City" => ["CITY", null, null],
			"StateProvince" => ["STATE_PROVINCE", null, null],
			"Country" => ["COUNTRY", null, null],
			"EmailToken" => ["EMAIL_TOKEN", null, null],
			"EmailVerified" => ["EMAIL_VERIFIED", function($in) : bool {return true;}, null],
			"Deactivated" => ["DEACTIVATED", "boolval", null],
			"ProfilePicturePath" => ["PICTURE_LOC", null, null],
		];
	}
}

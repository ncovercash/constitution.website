<?php

namespace WeTheFuture\Page\Navigation;

use \WeTheFuture\Images\Image;
use \WeTheFuture\User\User;

/**
 * Holds constants and functions for navigation bar things
 */
class Navbar {
	// whether or not the item is a name, or should be called
	public const NAME = 0;
	public const CALLABLE = 1;

	// type of navbar item
	public const NORMAL_LINK = 1;
	public const DROPDOWN_PARENT = 2;
	public const DROPDOWN_CHILD = 3;
	public const DROPDOWN_DIVIDER = 4;
	public const PSUEDO_DROPDOWN_END = 5;

	// if the bar this item is a part of is sidebar or navbar, used for callable
	public const NAVBAR = 0;
	public const SIDENAV = 1;

	/**
	 * Get all possible navbar items
	 * 
	 * @return array[][]
	 */
	private static function getItems() : array {
		// don't repeatedly call
		$isLoggedIn = User::isLoggedIn();

		// outermost key is access level
		// inner arr is: name|callable, name|callable flag, keyword, path, type, [flags]
		return [
			"all" => [
				["Home", self::NAME, "home", ROOTDIR, self::NORMAL_LINK],
				["About", self::NAME, "about", ROOTDIR."About", self::NORMAL_LINK],
				["Learning", self::NAME, "learn", ROOTDIR."Learn", self::DROPDOWN_PARENT, "learn-dropdown"],
					["Constitution", self::NAME, null, ROOTDIR."Learn/Constitution", self::DROPDOWN_CHILD],
					["Amendments", self::NAME, null, ROOTDIR."Learn/Amendments", self::DROPDOWN_CHILD],
				[null, null, null, null, self::PSUEDO_DROPDOWN_END],
				["Quizzes", self::NAME, "quiz", ROOTDIR."Quiz", self::NORMAL_LINK],
				["Records", self::NAME, "records", ROOTDIR."Records", self::NORMAL_LINK],
			],
			"logged_in" => [
				[[($isLoggedIn ? $_SESSION["user"] : null), "getNavbarDropdown"], self::CALLABLE, "user", ROOTDIR."Profile", self::DROPDOWN_PARENT, "user-dropdown"],
					["Profile", self::NAME, null, ROOTDIR."Profile", self::DROPDOWN_CHILD],
					["Settings", self::NAME, null, ROOTDIR."Settings", self::DROPDOWN_CHILD],
					[null, null, null, null, self::DROPDOWN_DIVIDER],
					["Logout", self::NAME, null, ROOTDIR."Logout", self::DROPDOWN_CHILD],
				[null, self::NAME, null, null, self::PSUEDO_DROPDOWN_END],
			],
			"logged_out" => [
				["Login", self::NAME, "login", ROOTDIR."Login", self::NORMAL_LINK],
				["Register", self::NAME, "register", ROOTDIR."Register", self::NORMAL_LINK],
			],
		];
	}

	/**
	 * Get navbar items for the current state
	 * 
	 * @param string[] $perms Permissions to use to get navbar items
	 * @return array[][] Navbar items
	 */
	public static function getNavbarItems(array $perms=["all"]) : array {
		$items = array_filter(self::getItems(), function($in) use ($perms) {
			return in_array($in, $perms);
		}, ARRAY_FILTER_USE_KEY);

		$items = array_merge(...array_values($items));

		return $items;
	}

	/**
	 * Get the navbar item text/contents
	 * 
	 * @param int $bar Navbar type, see class constants
	 * @param array $navbarItem navbar item array, see spec in getNavbarItems
	 * @return string html-ready contents
	 */
	public static function getNavbarItemLabel(int $bar, array $navbarItem) : string {
		return $navbarItem[1] == self::CALLABLE ? call_user_func($navbarItem[0], $bar) : htmlspecialchars($navbarItem[0]);
	}

	/**
	 * Get the HTML to display thie logo HTML, in white
	 *
	 * @return string HTML to display logo in white
	 */
	public static function getLogoHtml() : string {
		return Image::getLogoImage()->getImgElementHtml();
	}
}

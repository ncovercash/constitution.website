<?php

namespace WeTheFuture\Page;

use \InvalidArgumentException;

/**
 * Generates HTML and other helper functions
 */
class UniversalFunctions {
	/**
	 * Create a heading with the vien title
	 *
	 * @param string $contents
	 * @return string
	 */
	public static function createHeading(string $contents) : string {
		$str = '';

		$str .= '<div';
		$str .= ' class="section">';

		$str .= '<h1';
		$str .= ' class="center header hide-on-small-only">';

		$str .= $contents;
		
		$str .= '</h1>';
		
		$str .= '<h3';
		$str .= ' class="center header hide-on-med-and-up">';

		$str .= $contents;

		$str .= '</h3>';

		$str .= '</div>';
		
		$str .= '<div';
		$str .= ' class="divider">';
		$str .= '</div>';

		return $str;
	}

	// https://github.com/mingalevme/utils/blob/master/src/Filesize.php
	const UNIT_PREFIXES_POWERS = [
		'B' => 0,
		''  => 0,
		'K' => 1,
		'k' => 1,
		'M' => 2,
		'G' => 3,
		'T' => 4,
		'P' => 5,
		'E' => 6,
		'Z' => 7,
		'Y' => 8,
	];

	const STATE_PROVINCE_LIST = [
		"--" => "N/A",
		"AL" => "Alabama",
		"AK" => "Alaska",
		"AZ" => "Arizona",
		"AR" => "Arkansas",
		"CA" => "California",
		"CO" => "Colorado",
		"CT" => "Connecticut",
		"DE" => "Delaware",
		"DC" => "District of Columbia",
		"FL" => "Florida",
		"GA" => "Georgia",
		"HI" => "Hawaii",
		"ID" => "Idaho",
		"IL" => "Illinois",
		"IN" => "Indiana",
		"IA" => "Iowa",
		"KS" => "Kansas",
		"KY" => "Kentucky",
		"LA" => "Louisiana",
		"ME" => "Maine",
		"MD" => "Maryland",
		"MA" => "Massachusetts",
		"MI" => "Michigan",
		"MN" => "Minnesota",
		"MS" => "Mississippi",
		"MO" => "Missouri",
		"MT" => "Montana",
		"NE" => "Nebraska",
		"NV" => "Nevada",
		"NH" => "New Hampshire",
		"NJ" => "New Jersey",
		"NM" => "New Mexico",
		"NY" => "New York",
		"NC" => "North Carolina",
		"ND" => "North Dakota",
		"OH" => "Ohio",
		"OK" => "Oklahoma",
		"OR" => "Oregon",
		"PA" => "Pennsylvania",
		"RI" => "Rhode Island",
		"SC" => "South Carolina",
		"SD" => "South Dakota",
		"TN" => "Tennessee",
		"TX" => "Texas",
		"UT" => "Utah",
		"VT" => "Vermont",
		"VA" => "Virginia",
		"WA" => "Washington",
		"WV" => "West Virginia",
		"WI" => "Wisconsin",
		"WY" => "Wyoming",
		"AB" => "Alberta",
		"BC" => "British Columbia",
		"MB" => "Manitoba",
		"NB" => "New Brunswick",
		"NL" => "Newfoundland and Labrador",
		"NT" => "Northwest Territories",
		"NS" => "Nova Scotia",
		"NU" => "Nunavut",
		"ON" => "Ontario",
		"PE" => "Prince Edward Island",
		"QC" => "Québec",
		"SK" => "Saskatchewan",
		"YT" => "Yukon Territory",
	];

	/**
	 * Get the URL used to request the page
	 *
	 * @return string
	 */
	public static function getRequestUrl() : string {
		if (php_sapi_name() == "cli") {
			return '';
		}
		return $_SERVER["REQUEST_SCHEME"]."://".((isset($_SERVER["HTTP_X_FORWARDED_HOST"])) ? $_SERVER["HTTP_X_FORWARDED_HOST"] : $_SERVER["SERVER_NAME"].(($_SERVER["SERVER_PORT"] == "80" || $_SERVER["SERVER_PORT"] == "443") ? "" : ":".$_SERVER["SERVER_PORT"])).$_SERVER["REQUEST_URI"];
	}

	/**
	 * Get the canonical (with trailing slash) URL used to request the page
	 *
	 * @return string
	 */
	public static function getCanonicalRequestUrl() : string {
		if (php_sapi_name() == "cli") {
			return '';
		}
		// adds trailing slash
		return self::getRequestUrl().(strpos(strrev(self::getRequestUrl()), "/") !== 0 ? "/" : "");
	}

	/**
	 * Gets the human friendly size from a number of bytes
	 *
	 * adapted from https://github.com/mingalevme/utils/blob/master/src/Filesize.php
	 * @param int $size
	 * @param int $precision number of decimal points to keep
	 * @return string
	 */
	public static function humanize(int $size, int $precision=2) : string {
		$base = 1024;
		$limit = array_values(self::UNIT_PREFIXES_POWERS)[count(self::UNIT_PREFIXES_POWERS)-1];
		$power = ($powerOfTwo = floor(log($size, $base))) > $limit ? $limit : $powerOfTwo;
		$prefix = array_flip(self::UNIT_PREFIXES_POWERS)[$power];
		return number_format($size/pow($base,$power), $precision).$prefix.'B';
	}

	/**
	 * Gets the number of bytes from a human friendly size
	 *
	 * adapted from https://github.com/mingalevme/utils/blob/master/src/Filesize.php
	 * @param string $size
	 * @return int
	 */
	public static function dehumanize(string $size) : int {
		$supportedUnits = implode('', array_keys(self::UNIT_PREFIXES_POWERS));
		$regexp = "/^(\d+(?:\.\d+)?)(([{$supportedUnits}])((?<!B)(B|iB))?)?$/";
		
		if ((bool) preg_match($regexp, $size, $matches) === false) {
			throw new InvalidArgumentException("Invalid size format or unknown/unsupported units");
		}
		
		$prefix = isset($matches[3]) ? $matches[3] : 'B';
		
		$base = 1024; // none of that 1000/B bs
		
		if (strpos($matches[1], '.') !== false) {
			return intval(floatval($matches[1]) * pow($base, self::UNIT_PREFIXES_POWERS[$prefix]));
		} else {
			return (int)(intval($matches[1]) * pow($base, self::UNIT_PREFIXES_POWERS[$prefix]));
		}
	}

	/**
	 * Prepends zeroes to a string up to a certian length
	 *
	 * @param mixed $in
	 * @param int $limit
	 * @return string
	 */
	public static function zeropad($in, int $limit) : string {
		return (strlen($in) >= $limit) ? $in : self::zeropad("0".$in, $limit);
	}

	/**
	 * Get an array of punctuation for a list of $count items
	 *
	 * @param int $count
	 * @return string[]
	 */
	public static function getListPunctuationArray(int $count) : array {
		if ($count <= 1) {
			return [""];
		}
		$result = [];
		for ($i=0; $i < $count; $i++) { 
			if ($i < $count-2 && $count >= 3) {
				$result[] = ", ";
			} elseif ($count < 3 && $i == 0) {
				$result[] = " and ";
			} elseif ($i == $count-2 && $count >= 3) {
				$result[] = ", and ";
			} else {
				$result[] = "";
			}
		}
		return $result;
	}
}

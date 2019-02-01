<?php

namespace WeTheFuture\Page;

class Values {
	// [keyword (for navbar), title]
	const HOME = ["home", "Home"];

	const ABOUT_US = ["about", "About Us"];
	
	const LOGIN = ["login", "Login"];
	const TOTP_LOGIN = ["login", "2FA Login"];
	
	const LOGOUT = ["logout", "Logout"];
	
	const REGISTER = ["register", "Register"];
	
	const EMAIL_VERIFICATION = ["user", "Email Verification"];
	
	const PROFILE = ["user", "Profile | {name}"];
	
	const SETTINGS = ["user", "Settings | {name}"];
	
	const USER_PROFILE = ["null", "{name}"];
	
	const QUIZZES = ["quiz", "Quizzes"];
	const QUIZ_TAKE = ["quiz", "{name}"];
	
	const RESULTS = ["quiz", "{user}'s' {quiz} Attempt"];
	
	const RECORDS = ["records", "Records"];



	const DEFAULT_COLOR = "0d47a1";



	const PASSWORD_HASH = PASSWORD_ARGON2I;

	// gets around 100-150ms on my machines
	const PASSWORD_OPTIONS = [
		"memory_cost" => 1 << 15, // 32 MB,
		"time_cost" => 5,
		"threads" => 4,
	];


	const ROOT_TITLE = "WeTheFuture";



	const DISALLOWED_DOMAINS = ["localhost","1girl1pitcher.com","1girl1pitcher.org","1guy1cock.com","1man1jar.org","1man2needles.com","1priest1nun.com","1priest1nun.net","2girls1cup-free.com","2girls1cup.cc","2girls1cup.com","2girls1cup.nl","2girls1cup.ws","2girls1finger.com","2girls1finger.org","2guys1stump.org","3guys1hammer.ws","4girlsfingerpaint.com","4girlsfingerpaint.org","bagslap.com","ballsack.org","bestshockers.com","bluewaffle.biz","bottleguy.com","bowlgirl.com","cadaver.org","clownsong.com","com"."mi"."ss.io","copyright-reform.info","cshacks.partycat.us","cyberscat.com","dadparty.com","detroithardcore.com","donotwatch.org","dontwatch.us","eelsoup.net","fruitlauncher.com","fuck.org","funnelchair.com","goat.cx","goatse.bz","goatse.ca","goatse.cx","goatse.cx","goatse.ru","goatsegirl.org","hai2u.com","homewares.org","howtotroll.org","japscat.org","jarsquatter.com","jiztini.com","junecleeland.com","kids-in-sandbox.com","kidsinsandbox.info","lemonparty.biz","lemonparty.org","lolhello.com","lolshock.com","loltrain.com","meatspin.biz","meatspin.com","merryholidays.org","milkfountain.com","mudfall.com","mudmonster.org","nimp.org","nobrain.dk","nutabuse.com","octopusgirl.com","on.nimp.org","oralse.ca","oralse.cx","oralse.cx","painolympics.info","painolympics.org","phonejapan.com","pressurespot.com","prolapseman.com","punishtube.com","scrollbelow.com","selfpwn.org","sexitnow.com","shafou.com","sourmath.com","strawpoii.me","suckdude.com","thatsjustgay.com","thatsphucked.com","theexgirlfriends.com","thehomo.org","themacuser.org","thepounder.com","tubgirl.me","tubgirl.org","turdgasm.com","vomitgirl.org","walkthedinosaur.com","whipcrack.org","wormgush.com","xvideoslive.com","y8.com","youaresogay.com","ypmate.com","zentastic.com"];



	const HEAD_INC = __DIR__."/Header/header.inc.php";
	const FOOTER_INC = __DIR__."/Footer/footer.inc.php";



	public static function createTitle(string $title, array $values=[]) : string {
		return preg_replace_callback("/{([^}]+)}/", function($in) use ($values) : string {
			return $values[$in[1]];
		}, $title);
	}

	public static function createTOC(array $items) : string {
		$str = '<div class="pushpin toc"><ul class="browser-default">';
		foreach ($items as list($id, $name)) {
			$str .= '<li><p class="no-margin"><a href="#'.htmlspecialchars($id).'">'.htmlspecialchars($name).'</a></p></li>';
		}
		$str .= '</ul></div>';
		return $str;
	}

	public static function createInlineTOC(array $items) : string {
		$str = '<h4>Table of Contents</h4><ul class="browser-default">';
		foreach ($items as list($id, $name)) {
			$str .= '<li><p class="flow-text no-margin"><a href="#'.htmlspecialchars($id).'">'.htmlspecialchars($name).'</a></p></li>';
		}
		$str .= '</ul>';
		return $str;
	}
}

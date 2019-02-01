<?php

define("ROOTDIR", "../");
define("REAL_ROOTDIR", "../");

require_once REAL_ROOTDIR."src/initializer.php";
use \WeTheFuture\Form\FormRepository;
use \WeTheFuture\HTTPCode;
use \WeTheFuture\Page\{UniversalFunctions, Values};
use \WeTheFuture\User\User;

define("PAGE_KEYWORD", Values::LOGIN[0]);
define("PAGE_TITLE", Values::createTitle(Values::LOGIN[1], []));

if (User::isLoggedIn()) {
	HTTPCode::set(401);
}

require_once Values::HEAD_INC;

echo UniversalFunctions::createHeading("Login");

if (User::isLoggedIn()) {
?>
			<p class="flow-text">You are already logged in.</p>
			<p class="flow-text">Go to your <a href="<?= ROOTDIR ?>Profile">profile</a>?</p>
<?php
} else {
	echo FormRepository::getLoginForm()->getHtml();
}

require_once Values::FOOTER_INC;

<?php

define("ROOTDIR", "../../");
define("REAL_ROOTDIR", "../../");

require_once REAL_ROOTDIR."src/initializer.php";
use \WeTheFuture\Form\FormRepository;
use \WeTheFuture\HTTPCode;
use \WeTheFuture\Page\{UniversalFunctions, Values};
use \WeTheFuture\User\User;

define("PAGE_KEYWORD", Values::TOTP_LOGIN[0]);
define("PAGE_TITLE", Values::createTitle(Values::TOTP_LOGIN[1], []));

if (!User::isPending2FA()) {
	HTTPCode::set(401);
}

require_once Values::HEAD_INC;

echo UniversalFunctions::createHeading("2FA Login");

if (!User::isPending2FA()) {
?>
		<div class="section">
			<p class="flow-text">You must first login <a href="<?= ROOTDIR ?>Login">here</a>.</p>
		</div>
<?php
} else {
	echo FormRepository::getTotpLoginForm()->getHtml();
}

require_once Values::FOOTER_INC;

<?php

define("ROOTDIR", "../../");
define("REAL_ROOTDIR", "../../");

require_once REAL_ROOTDIR."src/initializer.php";
use \WeTheFuture\Page\{UniversalFunctions, Values};
use \WeTheFuture\User\{TOTP, User};
use \WeTheFuture\HTTPCode;

define("PAGE_KEYWORD", Values::SETTINGS[0]);
define("PAGE_TITLE", Values::createTitle(Values::SETTINGS[1], ["name" => (isset($_SESSION["user"]) ? $_SESSION["user"]->getNickname() : "Logged Out")]));

if (!User::isLoggedIn()) {
	HTTPCode::set(401);
} elseif (!$_SESSION["user"]->isTotpEnabled()) {
	HTTPCode::set(400);
}

require_once Values::HEAD_INC;

echo UniversalFunctions::createHeading("2FA Settings");

if (!User::isLoggedIn()) {
	echo User::getNotLoggedInHtml();
} elseif (!$_SESSION["user"]->isTotpEnabled()) {
?>
	<div class="section">
		<p class="flow-text">Two factor authentication is disabled.  Enable it <a href="<?= ROOTDIR ?>Settings">here</a>.</p>
	</div>
<?php
} else {
?>
	<div class="section">
		<div class="row">
			<p class="flow-text col s12">Use the following QR code or manual key below to add this site to your authenticator app</p>
			<div class="col s12 m4 center">
<?php

$binaryKey = $_SESSION["user"]->getTotpKey();

$humanReadableKey = TOTP::getHumanKey($binaryKey);

$tmpfname = tempnam(sys_get_temp_dir(), 'FOO');

QRcode::png('otpauth://totp/WeTheFuture:'.$_SESSION["user"]->getUsername().'?secret='.$humanReadableKey.'&issuer=WeTheFuture&digits=6&period=30', $tmpfname, QR_ECLEVEL_L, 10, 0);

if ($tmpfname === false) {
	throw new Exception("No temporary file for 2FA could be generated.");
}

$qr = base64_encode(file_get_contents($tmpfname) ?: "");

unlink($tmpfname);
?>
				<img class="col s12 render-pixelated" src="data:image/png;base64,<?= $qr ?>">
				<p class="code col s12 flow-text"><?= $humanReadableKey ?></h4>
			</div>
			<div class="col s12 m8">
				<p class="flow-text">If you lose access to your two-factor authentication app, you will not be able to recover your account.</p>
				<!-- @todo this could be a source of error with deviations -->
				<p class="flow-text no-bottom-margin">Your current codes are: <span class="code totp-preview" data-secret="<?= $humanReadableKey ?>">......</span></p>
				<p class="no-top-margin">These 3 codes are from 30 seconds ago, now, and 30 seconds into the future in order to compensate for slight time variations</p>
				<p class="flow-text">Not working?  Make sure your device's clock is correct, or try entering the code manually.</p>
			</div>
		</div>
	</div>
	<div class="divider"></div>
	<div class="section">
		<p class="flow-text">You may disable two factor authentication <a href="<?= ROOTDIR ?>Settings">here</a>.</p>
	</div>
<?php
}

require_once Values::FOOTER_INC;

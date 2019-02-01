<?php

define("ROOTDIR", "../../");
define("REAL_ROOTDIR", "../../");

require_once REAL_ROOTDIR."src/initializer.php";
use \WeTheFuture\Images\Image;
use \WeTheFuture\Page\{UniversalFunctions, Values};
use \WeTheFuture\HTTPCode;
use \WeTheFuture\Quiz\Quiz;
use \WeTheFuture\User\User;

$id = $quiz = null;
if (array_key_exists("q", $_GET)) {
	$quiz = Quiz::getFromUrl($_GET["q"]); 
	if (is_null($quiz)) {
		HTTPCode::set(404);
	}
}

define("PAGE_KEYWORD", Values::QUIZ_TAKE[0]);
define("PAGE_TITLE", Values::createTitle(Values::QUIZ_TAKE[1], ["name" => (!is_null($quiz) ? $quiz->getName() : "Invalid URL")]));

require_once Values::HEAD_INC;

if (is_null($quiz)) {
	echo UniversalFunctions::createHeading("Quiz");
} else {
	echo UniversalFunctions::createHeading($quiz->getName());
}

if (!User::isLoggedIn()):
	echo User::getNotLoggedInHtml();
elseif (is_null($quiz)): ?>
			<div class="section">
				<p class="flow-text">Invalid quiz URL.</p>
			</div>
<?php else: ?>
			<div class="section">
				<?= $quiz->getForm()->getHtml() ?>
			</div>
<?php endif; ?>
<?php
require_once Values::FOOTER_INC;

<?php

define("ROOTDIR", "");
define("REAL_ROOTDIR", "");

require_once REAL_ROOTDIR."src/initializer.php";
use \WeTheFuture\Page\{UniversalFunctions, Values};
use \WeTheFuture\User\User;

define("PAGE_KEYWORD", Values::HOME[0]);
define("PAGE_TITLE", Values::createTitle(Values::HOME[1], []));

require_once Values::HEAD_INC;

echo UniversalFunctions::createHeading("Welcome");
?>
			<div class="section">
				<h3>You have reached Noah Overcash's entry for the <a href="http://constitutingamerica.org/contest-categories/">We the Future Contest</a> by Constituting America!</h3>
				<h5>Use the bar at the top or left of your screen to navigate the site.</h5>
			</div>
<?php
require_once Values::FOOTER_INC;

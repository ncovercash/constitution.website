<?php

define("ROOTDIR", "../");
define("REAL_ROOTDIR", "../");

require_once REAL_ROOTDIR."src/initializer.php";
use \WeTheFuture\Page\{UniversalFunctions, Values};
use \WeTheFuture\User\User;

define("PAGE_KEYWORD", "learn");
define("PAGE_TITLE", Values::createTitle("Learn", []));

require_once Values::HEAD_INC;

echo UniversalFunctions::createHeading("Learn");
?>
			<div class="section">
				<h3>What would you like to learn about?</h3>

				<ul class="flow-text browser-default">
					<li><a href="<?= ROOTDIR ?>Learn/History">History</a></li>
					<li><a href="<?= ROOTDIR ?>Learn/Constitution">Constitution</a></li>
					<li><a href="<?= ROOTDIR ?>Learn/Amendments">Amendments</a></li>
				</ul>
			</div>
<?php
require_once Values::FOOTER_INC;

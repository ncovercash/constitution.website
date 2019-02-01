<?php

define("ROOTDIR", "../");
define("REAL_ROOTDIR", "../");

require_once REAL_ROOTDIR."src/initializer.php";
use \WeTheFuture\Page\{UniversalFunctions, Values};
use \WeTheFuture\User\User;

define("PAGE_KEYWORD", Values::ABOUT_US[0]);
define("PAGE_TITLE", Values::createTitle(Values::ABOUT_US[1], []));

require_once Values::HEAD_INC;

echo UniversalFunctions::createHeading("About");
?>
			<div class="section">
				<p class="flow-text">This website is my entry for the We the Future Contest, sponsored by Constituting America.  I have put countless hours into this site, and am proud of the result.</p>
				<p class="flow-text">If you have any questions, comments, or any other feedback, please do not hesitate to e-mail me at <a href="mailto:smileytechguy@smileytechguy.com">smileytechguy@smileytechguy.com</a>.</p>

				<div class="divider"></div>

				<p class="flow-text">You may view the rest of my portfolio at <a href="https://smileytechguy.com/">smileytechguy.com</a>, and my resume <a href="https://smileytechguy.com/resume.html">here</a>.</p>

				<div class="divider"></div>

				<p class="flow-text">I would like to thank my government teacher, <strong>Taylor Stephenson</strong>, my United States history teacher, <strong>Jennifer Bradford</strong>, and my computer science instructor, <strong>Barry Lindler</strong>, for the knowledge that helped me build this.</p>
			</div>
<?php
require_once Values::FOOTER_INC;

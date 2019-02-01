<?php

define("ROOTDIR", "../");
define("REAL_ROOTDIR", "../");

require_once REAL_ROOTDIR."src/initializer.php";
use \WeTheFuture\Page\{UniversalFunctions, Values};
use \WeTheFuture\Form\FormRepository;
use \WeTheFuture\HTTPCode;
use \WeTheFuture\Quiz\Quiz;
use \WeTheFuture\Record\Record;
use \WeTheFuture\User\User;

define("PAGE_KEYWORD", Values::RECORDS[0]);
define("PAGE_TITLE", Values::createTitle(Values::RECORDS[1], []));

require_once Values::HEAD_INC;

echo UniversalFunctions::createHeading("Record Search");

?>
		<h5>Enter as many or as few parameters as you would like to limit your search.  Leave all parameters blank to see the overall top scores.</h5>
<?php
echo FormRepository::getRecordSearchForm()->getHtml();

require_once Values::FOOTER_INC;

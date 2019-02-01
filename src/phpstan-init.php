<?php

define("ROOTDIR", "");
define("REAL_ROOTDIR", "");

require_once __DIR__."/initializer.php";
use \WeTheFuture\User\User;
restore_error_handler();

define("PAGE_KEYWORD", \WeTheFuture\Page\Values::ABOUT_US[0]);
define("PAGE_TITLE", \WeTheFuture\Page\Values::createTitle(\WeTheFuture\Page\Values::ABOUT_US[1], []));

// $_SESSION["user"] = new User(1);

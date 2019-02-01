<?php

define("ROOTDIR", "../../../");
define("REAL_ROOTDIR", "../../../");

require_once REAL_ROOTDIR."src/initializer.php";
use \WeTheFuture\API\{Endpoint, Response};
use \WeTheFuture\HTTPCode;

Endpoint::init(true, Endpoint::AUTH_REQUIRE_NONE);
HTTPCode::set(204);

trigger_error("Report URI handler recieved data: ".file_get_contents('php://input') , E_USER_ERROR);

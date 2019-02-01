<?php

define("ROOTDIR", isset($_POST["rootdir"]) ? $_POST["rootdir"] : "");
define("REAL_ROOTDIR", "../../../");

require_once REAL_ROOTDIR."src/initializer.php";
use \WeTheFuture\API\{Endpoint, ErrorCodes, Response};
use \WeTheFuture\HTTPCode;
use \WeTheFuture\Form\FormRepository;

Endpoint::init(true, Endpoint::AUTH_REQUIRE_LOGGED_IN);

FormRepository::getEmailVerificationForm()->checkServerSide();

if ($_SESSION["user"]->isEmailVerified() || is_null($_SESSION["user"]->getEmail())) {
	HTTPCode::set(400);
	Response::sendErrorResponse(90405, ErrorCodes::ERR_90405);
}

if ($_POST["token"] != $_SESSION["user"]->getEmailToken()) {
	HTTPCode::set(400);
	Response::sendErrorResponse(90402, ErrorCodes::ERR_90402);
}

$_SESSION["user"]->setEmailVerified(true);

Response::sendSuccessResponse("Success");

<?php

define("ROOTDIR", isset($_POST["rootdir"]) ? $_POST["rootdir"] : "");
define("REAL_ROOTDIR", "../../../");

require_once REAL_ROOTDIR."src/initializer.php";
use \WeTheFuture\API\{Endpoint, ErrorCodes, Response};
use \WeTheFuture\HTTPCode;
use \WeTheFuture\Form\FormRepository;
use \WeTheFuture\User\User;

Endpoint::init(true, Endpoint::AUTH_REQUIRE_LOGGED_OUT);

FormRepository::getLoginForm()->checkServerSide();

$id = User::getIdFromUsername($_POST["username"], true);

if ($id == -1) {
	HTTPCode::set(400);
	Response::sendErrorResponse(90103, ErrorCodes::ERR_90103);
}

$user = new User($id);

// deactivation nukes password
if ($user->isDeactivated()) {
	HTTPCode::set(400);
	Response::sendErrorResponse(90109, ErrorCodes::ERR_90109);
}

if (!$user->verifyPassword($_POST["password"])) {
	HTTPCode::set(400);
	Response::sendErrorResponse(90105, ErrorCodes::ERR_90105);
}

if ($user->isTotpEnabled()) {
	$_SESSION["pending_user"] = $user;
	HTTPCode::set(400);
	Response::sendErrorResponse(90110, ErrorCodes::ERR_90110);
}

$_SESSION["user"] = $user;

Response::sendSuccessResponse("Success");

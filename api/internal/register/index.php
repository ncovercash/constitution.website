<?php

define("ROOTDIR", isset($_POST["rootdir"]) ? $_POST["rootdir"] : "");
define("REAL_ROOTDIR", "../../../");

require_once REAL_ROOTDIR."src/initializer.php";
use \WeTheFuture\API\{Endpoint, ErrorCodes, Response};
use \WeTheFuture\{HTTPCode, Tokens};
use \WeTheFuture\Form\FormRepository;
use \WeTheFuture\Images\{Folders, Image};
use \WeTheFuture\User\User;

Endpoint::init(true, Endpoint::AUTH_REQUIRE_LOGGED_OUT);

FormRepository::getRegisterForm()->checkServerSide();

// username in use
if (User::getIdFromUsername($_POST["username"], true) != -1) {
	HTTPCode::set(400);
	Response::sendErrorResponse(90303, ErrorCodes::ERR_90303);
}

// check email
if (!empty($_POST["email"])) {
	if (User::getIdFromEmail($_POST["email"], true) != -1) {
		HTTPCode::set(400);
		Response::sendErrorResponse(90308, ErrorCodes::ERR_90308);
	}
}

$fileToken = Tokens::generateUserFileToken();

$profilePicture = null;
if (isset($_FILES["profile-picture"])) {
	$newImage = Image::upload($_FILES["profile-picture"], Folders::PROFILE_PHOTO, $fileToken);
	if (!is_null($newImage)) {
		$profilePicture = $newImage->getPath();
	}
}

$_SESSION["user"] = User::create([
	"FILE_TOKEN" => $fileToken,
	"USERNAME" => $_POST["username"],
	"HASHED_PASSWORD" => User::hashPassword($_POST["password"]),
	"EMAIL" => $_POST["email"] ? $_POST["email"] : null,
	"PICTURE_LOC" => $profilePicture,
	"SCHOOL" => $_POST["school"],
	"CITY" => $_POST["city"],
	"STATE_PROVINCE" => $_POST["state-provinces"],
	"COUNTRY" => $_POST["country"],
	"NICK" => $_POST["nickname"] ? $_POST["nickname"] : $_POST["username"],
]);

HTTPCode::set(201);
Response::sendSuccessResponse("Success");

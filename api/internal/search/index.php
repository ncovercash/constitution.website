<?php

define("ROOTDIR", isset($_POST["rootdir"]) ? $_POST["rootdir"] : "");
define("REAL_ROOTDIR", "../../../");

require_once REAL_ROOTDIR."src/initializer.php";
use \WeTheFuture\API\{Endpoint, Response};
use \WeTheFuture\Form\FormRepository;

Endpoint::init(true, Endpoint::AUTH_REQUIRE_NONE);

FormRepository::getRecordSearchForm()->checkServerSide();

$q = [];

if (!empty($_POST["username"])) {
	$q["username"] = $_POST["username"];
}
if (!empty($_POST["school"])) {
	$q["school"] = $_POST["school"];
}
if (!empty($_POST["city"])) {
	$q["city"] = $_POST["city"];
}
if (!empty($_POST["state-provinces"])) {
	$q["state-province"] = $_POST["state-provinces"];
}
if (!empty($_POST["country"])) {
	$q["country"] = $_POST["country"];
}

if ((int)$_POST["min-grade"] == $_POST["min-grade"] && is_numeric($_POST["min-grade"])) {
	$q["min-grade"] = $_POST["min-grade"];
}
if ((int)$_POST["max-grade"] == $_POST["max-grade"] && is_numeric($_POST["max-grade"])) {
	$q["max-grade"] = $_POST["max-grade"];
}
if ((int)$_POST["min-time"] == $_POST["min-time"] && is_numeric($_POST["min-time"])) {
	$q["min-time"] = $_POST["min-time"];
}
if ((int)$_POST["max-time"] == $_POST["max-time"] && is_numeric($_POST["max-time"])) {
	$q["max-time"] = $_POST["max-time"];
}

if (!empty($_POST["quiz"])) {
	$q["quiz"] = $_POST["quiz"];
}

Response::sendSuccessResponse("Success", [
	"redirect" => "Records/Search/?".http_build_query(["q" => $q])
]);

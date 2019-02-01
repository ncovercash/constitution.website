<?php

define("ROOTDIR", isset($_POST["rootdir"]) ? $_POST["rootdir"] : "");
define("REAL_ROOTDIR", "../../../");

require_once REAL_ROOTDIR."src/initializer.php";
use \WeTheFuture\API\{Endpoint, ErrorCodes, Response};
use \WeTheFuture\HTTPCode;
use \WeTheFuture\Quiz\{Quiz, Question};
use \WeTheFuture\Record\Record;
use \WeTheFuture\Tokens;

Endpoint::init(true, Endpoint::AUTH_REQUIRE_LOGGED_IN);

if (strtoupper($_SERVER["REQUEST_METHOD"]) !== "POST") {
	HTTPCode::set(405);
	Response::sendErrorResponse(10002, ErrorCodes::ERR_10002);
}

if (!array_key_exists("quiz-id", $_POST)) {
	throw new InvalidArgumentException("Missing quiz ID");
}

$quiz = new Quiz((int)$_POST["quiz-id"]); // exception thrown if invalid ID

if (!array_key_exists("start-time", $_POST) ||
	!array_key_exists("question-sort", $_POST) ||
	!array_key_exists("question-answer", $_POST) ||
	count($_POST["question-answer"]) != count($_POST["question-sort"]) ||
	count($_POST["question-answer"]) != count($quiz->getQuestions())) {
	throw new InvalidArgumentException("Invalid submission");
}

ksort($_POST["question-sort"], SORT_NUMERIC);

$data = [];

foreach ($_POST["question-sort"] as $id) {
	$question = new Question($id);
	$data[] = [
		"id" => $id,
		"answer" => $question->getCanonAnswerString($_POST["question-answer"][$id]),
		"correct_answer" => $question->getCanonCorrectAnswerString(),
		"correct" => $question->checkAnswer($_POST["question-answer"][$id]),
	];
}

$correct = array_sum(array_column($data, "correct"));

$record = Record::create([
	"USER_ID" => $_SESSION["user"]->getId(),
	"QUIZ_ID" => $quiz->getId(),
	"TOKEN" => Tokens::generateRecordToken(),
	"TIME" => (int)(microtime(true)-((float)$_POST["start-time"])),
	"GRADE" => $correct/count($quiz->getQuestions()),
	"DATA" => json_encode($data),
	"DATE" => date("Y-m-d"),
]);

Response::sendSuccessResponse("Success", [
	"redirect" => "Results/".$record->getToken(),
]);

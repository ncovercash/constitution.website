<?php

namespace WeTheFuture\Database;

/**
 * Maps tables to the table names in the database
 * 
 * Compartmentalized due to MySQL handling and potential growth/modifications.
 */
class Tables {
	public const PENDING_THUMBNAIL_QUEUE = "pending_thumbnail_queue";

	public const RECORDS = "records";

	public const QUIZZES = "quizzes";
	public const QUESTIONS = "questions";
	public const ANSWERS = "answers";
	
	public const USERS = "users";
}

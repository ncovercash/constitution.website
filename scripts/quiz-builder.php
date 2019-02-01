<?php

if (php_sapi_name() !== 'cli') {
	die("CLI only");
}

define("ROOTDIR", "../");
define("REAL_ROOTDIR", "../");

require_once REAL_ROOTDIR."src/initializer.php";

use \WeTheFuture\Database\{Column, Database};
use \WeTheFuture\Database\Query\{MultiInsertQuery, InsertQuery, TruncateQuery};
use \WeTheFuture\Quiz\{Quiz, Question, Answer};

$quizzes = [
	[
		"name" => "Causes of the American Revolution",
		"sort" => 0,
		"topic" => "HISTORY",
		"url" => "american-revolution",
		"questions" => [
			[
				"question" => "The following is a British law(s)/act(s) and lead in some way to the American Revolution: Navigation Acts",
				"answer_type" => "TF",
				"answers" => [
					[
						"True",
						true,
						"these acts limited trade between British colonies in order to make them more dependent."
					],
					[
						"False",
						false,
						"this/these act(s)/law(s) is/are British and led in some way to the American Revolution."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "The following is a British law(s)/act(s) and lead in some way to the American Revolution: Revenue Act",
				"answer_type" => "TF",
				"answers" => [
					[
						"True",
						true,
						"this act used Britain's supply advantage to charge taxes on sugar."
					],
					[
						"False",
						false,
						"this/these act(s)/law(s) is/are British and led in some way to the American Revolution."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "The following is a British law(s)/act(s) and lead in some way to the American Revolution: Stamp Act",
				"answer_type" => "TF",
				"answers" => [
					[
						"True",
						true,
						"this act was used to tax papers and documents."
					],
					[
						"False",
						false,
						"this/these act(s)/law(s) is/are British and led in some way to the American Revolution."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "The following is a British law(s)/act(s) and lead in some way to the American Revolution: Declaratory Act",
				"answer_type" => "TF",
				"answers" => [
					[
						"True",
						true,
						"this act, although it repealed the Stamp Act, stated that Britain held complete authority to declare any laws in its colonies without colonial approval."
					],
					[
						"False",
						false,
						"this/these act(s)/law(s) is/are British and led in some way to the American Revolution."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "The following is a British law(s)/act(s) and lead in some way to the American Revolution: Townshend Taxes",
				"answer_type" => "TF",
				"answers" => [
					[
						"True",
						true,
						"these taxes increased the cost of many goods, including glass, paint, tea, lead, and paper."
					],
					[
						"False",
						false,
						"this/these act(s)/law(s) is/are British and led in some way to the American Revolution."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "The following is a British law(s)/act(s) and lead in some way to the American Revolution: Intolerable Acts",
				"answer_type" => "TF",
				"answers" => [
					[
						"True",
						true,
						"these acts caused a multitude of effects: closing the Boston port until the ruined tea was paid for, placing Massachusetts under military rule, forcing the quartering of troops, and allowing the escape of British officials who wounded colonists while enforcing the law."
					],
					[
						"False",
						false,
						"this/these act(s)/law(s) is/are British and led in some way to the American Revolution."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "The following is a British law(s)/act(s) and lead in some way to the American Revolution: Quartering Act",
				"answer_type" => "TF",
				"answers" => [
					[
						"True",
						true,
						"this act required colonists to house and feed British troops."
					],
					[
						"False",
						false,
						"this/these act(s)/law(s) is/are British and led in some way to the American Revolution."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "The following is a British law(s)/act(s) and lead in some way to the American Revolution: Proclamation of 1763",
				"answer_type" => "TF",
				"answers" => [
					[
						"True",
						true,
						"this prevented colonists from settling newly won land in the Ohio River Valley."
					],
					[
						"False",
						false,
						"this/these act(s)/law(s) is/are British and led in some way to the American Revolution."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "The following is a British law(s)/act(s) and lead in some way to the American Revolution: Tea Tax Act",
				"answer_type" => "TF",
				"answers" => [
					[
						"True",
						false,
						"this/these is/are not British law(s)/act(s) and did not lead to the American Revolution"
					],
					[
						"False",
						true,
						"this is not the name of a British act which affected the colonists."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "The following is a British law(s)/act(s) and lead in some way to the American Revolution: America Act",
				"answer_type" => "TF",
				"answers" => [
					[
						"True",
						false,
						"this/these is/are not British law(s)/act(s) and did not lead to the American Revolution"
					],
					[
						"False",
						true,
						"this is not the name of a British act which affected the colonists."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "The following is a British law(s)/act(s) and lead in some way to the American Revolution: Constitution Acts",
				"answer_type" => "TF",
				"answers" => [
					[
						"True",
						false,
						"this/these is/are not British law(s)/act(s) and did not lead to the American Revolution"
					],
					[
						"False",
						true,
						"this is not the name of a British act which affected the colonists."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "The following is a British law(s)/act(s) and lead in some way to the American Revolution: The Act of Massachusetts",
				"answer_type" => "TF",
				"answers" => [
					[
						"True",
						false,
						"this/these is/are not British law(s)/act(s) and did not lead to the American Revolution"
					],
					[
						"False",
						true,
						"this is not the name of a British act which affected the colonists."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "The following is a British law(s)/act(s) and lead in some way to the American Revolution: Rebellion Acts",
				"answer_type" => "TF",
				"answers" => [
					[
						"True",
						false,
						"this/these is/are not British law(s)/act(s) and did not lead to the American Revolution"
					],
					[
						"False",
						true,
						"this is not the name of a British act which affected the colonists."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
		],
	],
	[
		"name" => "History of the Constitution",
		"sort" => 10,
		"topic" => "HISTORY",
		"url" => "constitution-history",
		"questions" => [
			[
				"question" => "Where was the constitution drafted?",
				"answer_type" => "MC",
				"answers" => [
					[
						"The Constitutional Convention",
						true,
						"this convention, held in 1787, is where delegates met to plan our new government."
					],
					[
						"Second Constitutional Congress",
						false,
						"this congress was held to respond to revolutionary violence at Lexington and Concord."
					],
					[
						"First Constitutional Congress",
						false,
						"this congress was held to respond to Britain's \"Intolerable Acts,\" which placed high taxes on many common goods."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "What was America's first constitution?",
				"answer_type" => "MC",
				"answers" => [
					[
						"The Articles of Confederation",
						true,
						"this set of documents was initially drafted in 1781, however, were quite weak and ineffective, leading to the Constitution we know today."
					],
					[
						"The Constitution we know today",
						false,
						"the constitution we know today was drafted in 1787 and ratified by 1789, almost a decade after the Articles of Confederation"
					],
					[
						"The Bill of Rights",
						false,
						"the Bill of Rights is the name of the first ten amendments to the Constitution."
					],
					[
						"The Magna Carta",
						false,
						"this document is part of the British government, not the United States."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "How many of the original thirteen states had to ratify the Constitution? (number only)",
				"answer_type" => "BLANK",
				"answers" => [],
				"answer" => "9",
				"explanation" => "the Articles of Confederation stated that 3/4 of the states, or 9/13, had to ratify any changes",
			],
			[
				"question" => "Which of the following were major issues with the Articles of Confederation?",
				"answer_type" => "CHECK",
				"answers" => [
					[
						"Inability to collect sufficient taxes",
						true,
						"Congress held no power to tax."
					],
					[
						"Inability to raise an army",
						true,
						"state militias could be formed, however, the federal government could not form a national army."
					],
					[
						"Lack of a court or judicial system",
						true,
						"the Articles only described a legislative branch, and said nothing about executive or judicial branches."
					],
					[
						"Unregulated commerce regulation between countries and states",
						true,
						"Congress could not regulate trade."
					],
					[
						"A poor educational system",
						false,
						"the Articles did not dictate standards for any governmental bureaucracies."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "True or false: \"the original drafters of the Constitution were called framers?\"",
				"answer_type" => "TF",
				"answers" => [
					[
						"True",
						true,
						"they laid the \"frame\" for the Constitution."
					],
					[
						"False",
						false,
						"the original drafters were called framers."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
		],
	],
	[
		"name" => "Structure",
		"sort" => 100,
		"topic" => "CONSTITUTION",
		"url" => "structure",
		"questions" => [
			[
				"question" => "How many articles are in the constitution?  (Note: the preamble is not considered an article)",
				"answer_type" => "BLANK",
				"answers" => [],
				"answer" => "7",
				"explanation" => "there are seven articles in the Constitution."
			],
			[
				"question" => "Which article is the longest?",
				"answer_type" => "MC",
				"answers" => [
					[
						"Article 1",
						true,
						"article 1 is the longest, with ten lengthy sections."
					],
					[
						"Article 2",
						false,
						"article 2 is not the longest, with only four sections."
					],
					[
						"Article 3",
						false,
						"article 3 is not the longest, with only three sections."
					],
					[
						"Article 4",
						false,
						"article 4 is not the longest, with only four sections."
					],
					[
						"Article 5",
						false,
						"article 5 is not the longest, as it has no defined sections."
					],
					[
						"Article 6",
						false,
						"article 6 is not the longest, as it has no defined sections."
					],
					[
						"Article 7",
						false,
						"article 7 is not the longest, as it has no defined sections."
					],
				],
				"answer" => null,
				"explanation" => null
			],
			[
				"question" => "Three articles describe the three branches of government, one for each branch.",
				"answer_type" => "TF",
				"answers" => [
					[
						"True",
						true,
						"articles 1-3 describe the branches: article 1 describes the legislature, article 2 the executive, and article 3 the judicial."
					],
					[
						"False",
						false,
						"there are three articles which each distinctly describes one branch of government."
					],
				],
				"answer" => null,
				"explanation" => null
			],
			[
				"question" => "Which article describes the process of amending the Constitution?",
				"answer_type" => "MC",
				"answers" => [
					[
						"Article 1",
						false,
						"article 1 does not discuss the process of amending the Constitution."
					],
					[
						"Article 2",
						false,
						"article 2 does not discuss the process of amending the Constitution.",
					],
					[
						"Article 3",
						false,
						"article 3 does not discuss the process of amending the Constitution.",
					],
					[
						"Article 4",
						false,
						"article 4 does not discuss the process of amending the Constitution.",
					],
					[
						"Article 5",
						true,
						"article 5 does discuss the process of amending the Constitution.",
					],
					[
						"Article 6",
						false,
						"article 6 does not discuss the process of amending the Constitution.",
					],
					[
						"Article 7",
						false,
						"article 7 does not discuss the process of amending the Constitution.",
					],
				],
				"answer" => null,
				"explanation" => null
			],
			[
				"question" => "Which article describes the process of ratification?",
				"answer_type" => "MC",
				"answers" => [
					[
						"Article 1",
						false,
						"article 1 does not discuss the process of ratifying the Constitution."
					],
					[
						"Article 2",
						false,
						"article 2 does not discuss the process of ratifying the Constitution.",
					],
					[
						"Article 3",
						false,
						"article 3 does not discuss the process of ratifying the Constitution.",
					],
					[
						"Article 4",
						false,
						"article 4 does not discuss the process of ratifying the Constitution.",
					],
					[
						"Article 5",
						false,
						"article 5 does not discuss the process of ratifying the Constitution.",
					],
					[
						"Article 6",
						false,
						"article 6 does not discuss the process of ratifying the Constitution.",
					],
					[
						"Article 7",
						true,
						"article 7 does discuss the process of ratifying the Constitution.",
					],
				],
				"answer" => null,
				"explanation" => null
			],
		],
	],
	[
		"name" => "Preamble",
		"sort" => 110,
		"topic" => "CONSTITUTION",
		"url" => "preamble",
		"questions" => [
			[
				"question" => "What are the three well-known words which begin the Preamble?",
				"answer_type" => "BLANK",
				"answers" => [],
				"answer" => "We the people",
				"explanation" => "these are the first three words of the Preamble."
			],
			[
				"question" => "Which of the following does the preamble expressly state are reasons for creating the Constitution?",
				"answer_type" => "CHECK",
				"answers" => [
					[
						"Form a more perfect union",
						true,
						"this is specifically stated in the preamble"
					],
					[
						"Establish justice",
						true,
						"this is specifically stated in the preamble"
					],
					[
						"Insure domestic tranquility",
						true,
						"this is specifically stated in the preamble"
					],
					[
						"Promote the general welfare",
						true,
						"this is specifically stated in the preamble"
					],
					[
						"Secure the blessings of liberty",
						true,
						"this is specifically stated in the preamble"
					],
					[
						"Expand America to both oceans",
						false,
						"this is not specifically stated in the preamble"
					],
					[
						"Protect foreign freedoms",
						false,
						"this is not specifically stated in the preamble"
					],
					[
						"Create a true democracy",
						false,
						"this is not specifically stated in the preamble"
					],
				],
				"answer" => null,
				"explanation" => null,
			],
		],
	],
	[
		"name" => "Article I (Legislature)",
		"sort" => 120,
		"topic" => "CONSTITUTION",
		"url" => "article-1",
		"questions" => [
			[
				"question" => "What is the first thing that this article states?",
				"answer_type" => "MC",
				"answers" => [
					[
						"The bicameral structure of Congress",
						true,
						"this is the first and only item discussed in section one of this article."
					],
					[
						"The election process of Congress",
						false,
						"this is discussed in section four of this article."
					],
					[
						"The definition of a bill",
						false,
						"this is not discussed within the Constitution."
					],
					[
						"The types of committees within Congress",
						false,
						"this is not discussed within the Constitution."
					],
				],
				"answer" => null,
				"explanation" => null
			],
			[
				"question" => "What requirements must a representative meet?",
				"answer_type" => "CHECK",
				"answers" => [
					[
						"25 years of age",
						true,
						"this is a requirement, as listed in article 1 section 2."
					],
					[
						"Be a citizen of the United States for at least seven years",
						true,
						"this is a requirement, as listed in article 1 section 2."
					],
					[
						"Live in the state which they are representing",
						true,
						"this is a requirement, as listed in article 1 section 2."
					],
					[
						"Be a lifetime citizen of the United States",
						false,
						"this is not a requirement of representatives as listed in article 1 section 2."
					],
					[
						"30 years of age",
						false,
						"this is not a requirement of representatives as listed in article 1 section 2."
					],
					[
						"Be born in the state which they are representing",
						false,
						"this is not a requirement of representatives as listed in article 1 section 2."
					],
				],
				"answer" => null,
				"explanation" => null
			],
			[
				"question" => "What requirements must a senator meet?",
				"answer_type" => "CHECK",
				"answers" => [
					[
						"30 years of age",
						true,
						"this is a requirement, as listed in article 1 section 3."
					],
					[
						"Be a citizen of the United States for at least nine years",
						true,
						"this is a requirement, as listed in article 1 section 3."
					],
					[
						"Live in the state which they are representing",
						true,
						"this is a requirement, as listed in article 1 section 3."
					],
					[
						"Be a lifetime citizen of the United States",
						false,
						"this is not a requirement of representatives as listed in article 1 section 3."
					],
					[
						"25 years of age",
						false,
						"this is not a requirement of representatives as listed in article 1 section 3."
					],
					[
						"Be born in the state which they are representing",
						false,
						"this is not a requirement of representatives as listed in article 1 section 3."
					],
				],
				"answer" => null,
				"explanation" => null
			],
			[
				"question" => "Which are true of the President of the Senate?",
				"answer_type" => "CHECK",
				"answers" => [
					[
						"They are elected from the Senate body every two-years",
						false,
						"this is not true of the President of the Senate, as outlined in Article 1 Section 3"
					],
					[
						"They vote in every decision",
						false,
						"this is not true of the President of the Senate, as outlined in Article 1 Section 3"
					],
					[
						"They are the Vice President of the United States",
						true,
						"this is true of the President of the Senate, as outlined in Article 1 Section 3"
					],
				],
				"answer" => null,
				"explanation" => null
			],
			[
				"question" => "Which of the following can a state NOT do?",
				"answer_type" => "CHECK",
				"answers" => [
					[
						"Hold congressional elections",
						false,
						"a state is allowed to do this, per section 10 of article 1."
					],
					[
						"Enter into an alliance or treaty",
						true,
						"a state can not do this, regardless of congressional approval."
					],
					[
						"Enter a Confederation",
						true,
						"a state can not do this, regardless of congressional approval."
					],
					[
						"Coin money",
						true,
						"a state can not do this, regardless of congressional approval."
					],
					[
						"Pay debts in forms other than Gold or Silver",
						true,
						"a state can not do this, regardless of congressional approval."
					],
					[
						"Create their own voting identification laws",
						false,
						"a state is allowed to do this, per section 10 of article 1."
					],
					[
						"Accept a governors resignation",
						false,
						"a state is allowed to do this, per section 10 of article 1."
					],
					[
						"Move their capital city",
						false,
						"a state is allowed to do this, per section 10 of article 1."
					],
					[
						"Engage in war after an invasion",
						false,
						"a state is allowed to do this, per section 10 of article 1."
					],
				],
				"answer" => null,
				"explanation" => null
			],
		],
	],
	[
		"name" => "Article II (Executive)",
		"sort" => 130,
		"topic" => "CONSTITUTION",
		"url" => "article-2",
		"questions" => [
			[
				"question" => "The presidential oath is written in the Constitution",
				"answer_type" => "TF",
				"answers" => [
					[
						"True",
						true,
						"the oath is written in section 1, clause 8 of article 2."
					],
					[
						"False",
						false,
						"the oath is written in this article."
					],
				],
				"answer" => null,
				"explanation" => null
			],
			[
				"question" => "The President can fill vacant offices without congressional approval while the Congress is in recess",
				"answer_type" => "TF",
				"answers" => [
					[
						"True",
						true,
						"section 2 of article 2 states that the president can fill vacant offices during recess by granting commissions until the end of the next Senate session."
					],
					[
						"False",
						false,
						"the article states that the president may fill vacancies on a commission basis while Congress is in recess."
					],
				],
				"answer" => null,
				"explanation" => null
			],
			[
				"question" => "How often does the Constitution say that the President should give a State of the Union?",
				"answer_type" => "MC",
				"answers" => [
					[
						"Once a year",
						false,
						"article 2 states that the President should give this address \"from time to time\"."
					],
					[
						"Every two years (with each election)",
						false,
						"article 2 states that the President should give this address \"from time to time\"."
					],
					[
						"Whenever he feels it is necessary",
						false,
						"article 2 states that the President should give this address \"from time to time\"."
					],
					[
						"From time to time",
						true,
						"article 2 states that the President should give this address \"from time to time\"."
					],
				],
				"answer" => null,
				"explanation" => null
			],
		],
	],
	[
		"name" => "Article III (Judicial)",
		"sort" => 140,
		"topic" => "CONSTITUTION",
		"url" => "article-3",
		"questions" => [
			[
				"question" => "Judges, per the Constitution, may not have their pay decreased while in office.",
				"answer_type" => "TF",
				"answers" => [
					[
						"True",
						true,
						"of section one of article three which states that the compensation shall not be diminished while in office."
					],
					[
						"False",
						false,
						"the Constitution states that judges' pay may not be diminished while in office."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "Which of the following circumstances does the Supreme Court have original jurisdiction over?",
				"answer_type" => "CHECK",
				"answers" => [
					[
						"All cases regarding the Constitution",
						true,
						"article 3 section 2 states this as a case in which the Supreme Court has original jurisdiction."
					],
					[
						"Cases regarding federal laws",
						true,
						"article 3 section 2 states this as a case in which the Supreme Court has original jurisdiction."
					],
					[
						"Cases where the United States itself is a party",
						true,
						"article 3 section 2 states this as a case in which the Supreme Court has original jurisdiction."
					],
					[
						"Controversies between multiple states",
						true,
						"article 3 section 2 states this as a case in which the Supreme Court has original jurisdiction."
					],
					[
						"Controversies between citizens in different states",
						true,
						"article 3 section 2 states this as a case in which the Supreme Court has original jurisdiction."
					],
					[
						"Cases affecting ambassadors, public ministers, and consuls",
						true,
						"article 3 section 2 states this as a case in which the Supreme Court does have original jurisdiction."
					],
					[
						"Cases within a territory of the United States",
						false,
						"article 3 section 2 states this as a case in which the Supreme Court does not have original jurisdiction."
					],
					[
						"Military offenses",
						false,
						"article 3 section 2 states this as a case in which the Supreme Court does not have original jurisdiction."
					],
					[
						"Impeachment of the President",
						false,
						"the Senate handles impeachments."
					],
					[
						"Impeachment of any public official",
						false,
						"the Senate handles impeachments."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "Per the Constitution, how many judges should serve on the Supreme Court?",
				"answer_type" => "TF",
				"answers" => [
					[
						"3",
						false,
						"the Constitution only states that there should be a Supreme Court, but does not dictate the size."
					],
					[
						"5",
						false,
						"the Constitution only states that there should be a Supreme Court, but does not dictate the size."
					],
					[
						"7",
						false,
						"the Constitution only states that there should be a Supreme Court, but does not dictate the size."
					],
					[
						"9",
						false,
						"the Constitution only states that there should be a Supreme Court, but does not dictate the size."
					],
					[
						"15",
						false,
						"the Constitution only states that there should be a Supreme Court, but does not dictate the size."
					],
					[
						"The Constitution does not specify",
						true,
						"the Constitution only states that there should be a Supreme Court, but does not dictate the size."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
		],
	],
	[
		"name" => "Article IV (States' Relations)",
		"sort" => 150,
		"topic" => "CONSTITUTION",
		"url" => "article-4",
		"questions" => [
			[
				"question" => "What was the result of the Constitution on the existing processes of a state?",
				"answer_type" => "MC",
				"answers" => [
					[
						"Congress may limit them",
						true,
						"the Constitution states that full faith and credit be given to the proceedings of every state, however, Congress may pass general laws to regulate the manner of state proceedings."
					],
					[
						"They must be replaced by the three-branch system, similar to the federal government",
						false,
						"the Constitution states that full faith and credit be given to the proceedings of every state, however, Congress may pass general laws to regulate the manner of state proceedings."
					],
					[
						"They may conduct their proceedings however they see fit",
						false,
						"the Constitution states that full faith and credit be given to the proceedings of every state, however, Congress may pass general laws to regulate the manner of state proceedings."
					],
					[
						"The President can force these processes to change",
						false,
						"the Constitution states that full faith and credit be given to the proceedings of every state, however, Congress may pass general laws to regulate the manner of state proceedings."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "Which of the following is/are true regarding the formation of states?",
				"answer_type" => "CHECK",
				"answers" => [
					[
						"The Congress may admit new states",
						true,
						"article four section three states that this is the case."
					],
					[
						"The President may admit new states",
						false,
						"of article four section three which states that Congress must admit states."
					],
					[
						"A state may not be named Britain",
						false,
						"this rule does not exist."
					],
					[
						"A state may not combine with another without the approval of Congress and the state's legislatures",
						true,
						"article four section three states that this is the case."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "True or false: every state must have a republican form of government",
				"answer_type" => "TF",
				"answers" => [
					[
						"True",
						true,
						"article four section four states this."
					],
					[
						"False",
						false,
						"article four section four states that the United States shall guarantee a republican form of government in every state."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "True or false: the United States agrees to protect states from invasion AND domestic violence",
				"answer_type" => "TF",
				"answers" => [
					[
						"True",
						true,
						"article four section four states this."
					],
					[
						"False",
						false,
						"article four section four states that the United States will protect each state against invasion, and apply legislation/executive power to prevent domestic violence."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
		],
	],
	[
		"name" => "Article V, Article VI, and Article VII",
		"sort" => 160,
		"topic" => "CONSTITUTION",
		"url" => "article-5-article-6-and-article-7",
		"questions" => [
			[
				"question" => "Which of the following are needed to amend the constitution through the congressional method?",
				"answer_type" => "CHECK",
				"answers" => [
					[
						"2/3 of the Senate's votes",
						true,
						"of article five which states that this is required to amend the constitution (through the way of the Congress)."
					],
					[
						"3/4 of the Senate's votes",
						false,
						"only 2/3 of the Senate's votes are needed."
					],
					[
						"2/3 of the House of Representatives' votes",
						true,
						"of article five which states that this is required to amend the constitution (through the way of the Congress)."
					],
					[
						"3/4 of the House of Representatives' votes",
						false,
						"only 2/3 of the House of Representatives' votes are needed."
					],
					[
						"Ratification by 2/3 of the states",
						false,
						"3/4 of the states must ratify the amendment."
					],
					[
						"Ratification by 3/4 of the states",
						true,
						"of article five which states that this is required to amend the constitution (through the way of the Congress)."
					],
					[
						"Presidential approval",
						false,
						"article five does not state that this is required to amend the constitution."
					],
					[
						"Approval by the Supreme Court for constitutional",
						false,
						"article five does not state that this is required to amend the constitution."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "True or false: federal laws supersede those of any state",
				"answer_type" => "TF",
				"answers" => [
					[
						"True",
						true,
						"article 6 section 2 states that laws and treaties made by the United States are the supreme law of the land and that judges in every state must be bound by it."
					],
					[
						"False",
						false,
						"article 6 section 2 states that federal laws are the supreme law of the land."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "True or false: the Constitution would take full effect and hold jurisdiction across all states immediately upon ratification by nine of the thirteen states.",
				"answer_type" => "TF",
				"answers" => [
					[
						"True",
						false,
						"article 7 states that the constitution will only take effect in the states which ratify it, and only upon ratification by at least nine states."
					],
					[
						"False",
						true,
						"article 7 states that the constitution will only take effect in the states which ratify it, and only upon ratification by at least nine states."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
		],
	],
	[
		"name" => "Amendments I-X (Bill of Rights)",
		"sort" => 200,
		"topic" => "AMENDMENTS",
		"url" => "amendments-i-x",
		"questions" => [
			[
				"question" => "Which of the following freedoms/rights does the first amendment protect?",
				"answer_type" => "CHECK",
				"answers" => [
					[
						"religion",
						true,
						"the first amendment states that Congress may not make laws prohibiting or abridging this freedom."
					],
					[
						"speech",
						true,
						"the first amendment states that Congress may not make laws prohibiting or abridging this freedom."
					],
					[
						"press",
						true,
						"the first amendment states that Congress may not make laws prohibiting or abridging this freedom."
					],
					[
						"assembly",
						true,
						"the first amendment states that Congress may not make laws prohibiting or abridging this freedom."
					],
					[
						"petition",
						true,
						"the first amendment states that Congress may not make laws prohibiting or abridging this freedom."
					],
					[
						"bearing arms",
						false,
						"the second amendment protects this right."
					],
					[
						"not quarter troops",
						false,
						"the third amendment protects this right."
					],
					[
						"jury trial",
						false,
						"the sixth amendment protects this right."
					],
				],
				"answer" => null,
				"explanation" => null
			],
			[
				"question" => "What are the intentions of amendments nine and ten?",
				"answer_type" => "MC",
				"answers" => [
					[
						"Ensure that the federal government does not take too much power from the states and people",
						true,
						"these amendments state that rights not named in the constitution must not be taken away either (9) and that powers not expressly forbidden or given to the federal government belong to the states (10)."
					],
					[
						"Ensure that the United States is protected from foreign armies",
						false,
						"this is part of the second amendment."
					],
					[
						"Ensure that the United States does not become communist.",
						false,
						"this is not part of the constitution."
					],
					[
						"Ensure that citizens are not held in jail indefinitely.",
						false,
						"the sixth amendment protects this right."
					],
				],
				"answer" => null,
				"explanation" => null
			],
			[
				"question" => "Why was the Bill of Rights created?",
				"answer_type" => "MC",
				"answers" => [
					[
						"Convince anti-federalists, who were afraid the federal government would grow too large and out of control, thus becoming tyrannical like Britain, to ratify the constitution",
						true,
						"anti-federalists felt that the federal government might become tyrannical and revoke rights and freedoms from the people.  The Bill of Rights forbids this revocation, which helped to ebb this fear."
					],
					[
						"Ensure equal rights for all people within the United States",
						false,
						"this is part of later amendments."
					],
					[
						"Convince federalists, who were afraid the federal government would still not have enough power, to ratify the constitution",
						false,
						"federalists liked the new powers the Constitution gave the federal government (compared to the previous Articles of Confederation).  The Bill of Rights, in fact, limited the federal government's power."
					],
					[
						"To abolish slavery",
						false,
						"this is the purpose of the thirteenth amendment."
					],
				],
				"answer" => null,
				"explanation" => null
			],
			[
				"question" => "Which amendment is the most direct response to one of King George's \"Intolerable Acts\"?",
				"answer_type" => "MC",
				"answers" => [
					[
						"Amendment 3",
						true,
						"the third Intolerable Act required colonists to house and feed (quarter) troops."
					],
					[
						"Amendment 2",
						false,
						"no Intolerable Acts limited the rights to bear weapons or form a militia."
					],
					[
						"Amendment 8",
						false,
						"no Intolerable Acts directly called for cruel and unusual punishments."
					],
				],
				"answer" => null,
				"explanation" => null
			],
			[
				"question" => "What is the purpose of amendment one?",
				"answer_type" => "DROPDOWN",
				"answers" => [
					[
						"Freedom of religion, speech, press, assembly, petition",
						true,
						"this description matches the first amendment."
					],
					[
						"Right to bear arms",
						false,
						"this description matches the second amendment."
					],
					[
						"Quartering of troops",
						false,
						"this description matches the third amendment."
					],
					[
						"Search and seizure",
						false,
						"this description matches the fourth amendment."
					],
					[
						"Due process, double jeopardy, self-incrimination",
						false,
						"this description matches the fifth amendment."
					],
					[
						"Jury trial, right to counsel",
						false,
						"this description matches the sixth amendment."
					],
					[
						"Common lawsuits",
						false,
						"this description matches the seventh amendment."
					],
					[
						"Excess bail or fines, cruel and unusual punishment",
						false,
						"this description matches the eighth amendment."
					],
					[
						"Rights not named",
						false,
						"this description matches the ninth amendment."
					],
					[
						"Powers reserved to states",
						false,
						"this description matches the tenth amendment."
					],
				],
				"answer" => null,
				"explanation" => null
			],
			[
				"question" => "What is the purpose of amendment two?",
				"answer_type" => "DROPDOWN",
				"answers" => [
					[
						"Freedom of religion, speech, press, assembly, petition",
						false,
						"this description matches the first amendment."
					],
					[
						"Right to bear arms",
						true,
						"this description matches the second amendment."
					],
					[
						"Quartering of troops",
						false,
						"this description matches the third amendment."
					],
					[
						"Search and seizure",
						false,
						"this description matches the fourth amendment."
					],
					[
						"Due process, double jeopardy, self-incrimination",
						false,
						"this description matches the fifth amendment."
					],
					[
						"Jury trial, right to counsel",
						false,
						"this description matches the sixth amendment."
					],
					[
						"Common lawsuits",
						false,
						"this description matches the seventh amendment."
					],
					[
						"Excess bail or fines, cruel and unusual punishment",
						false,
						"this description matches the eighth amendment."
					],
					[
						"Rights not named",
						false,
						"this description matches the ninth amendment."
					],
					[
						"Powers reserved to states",
						false,
						"this description matches the tenth amendment."
					],
				],
				"answer" => null,
				"explanation" => null
			],
			[
				"question" => "What is the purpose of amendment three?",
				"answer_type" => "DROPDOWN",
				"answers" => [
					[
						"Freedom of religion, speech, press, assembly, petition",
						false,
						"this description matches the first amendment."
					],
					[
						"Right to bear arms",
						false,
						"this description matches the second amendment."
					],
					[
						"Quartering of troops",
						true,
						"this description matches the third amendment."
					],
					[
						"Search and seizure",
						false,
						"this description matches the fourth amendment."
					],
					[
						"Due process, double jeopardy, self-incrimination",
						false,
						"this description matches the fifth amendment."
					],
					[
						"Jury trial, right to counsel",
						false,
						"this description matches the sixth amendment."
					],
					[
						"Common lawsuits",
						false,
						"this description matches the seventh amendment."
					],
					[
						"Excess bail or fines, cruel and unusual punishment",
						false,
						"this description matches the eighth amendment."
					],
					[
						"Rights not named",
						false,
						"this description matches the ninth amendment."
					],
					[
						"Powers reserved to states",
						false,
						"this description matches the tenth amendment."
					],
				],
				"answer" => null,
				"explanation" => null
			],
			[
				"question" => "What is the purpose of amendment four?",
				"answer_type" => "DROPDOWN",
				"answers" => [
					[
						"Freedom of religion, speech, press, assembly, petition",
						false,
						"this description matches the first amendment."
					],
					[
						"Right to bear arms",
						false,
						"this description matches the second amendment."
					],
					[
						"Quartering of troops",
						false,
						"this description matches the third amendment."
					],
					[
						"Search and seizure",
						true,
						"this description matches the fourth amendment."
					],
					[
						"Due process, double jeopardy, self-incrimination",
						false,
						"this description matches the fifth amendment."
					],
					[
						"Jury trial, right to counsel",
						false,
						"this description matches the sixth amendment."
					],
					[
						"Common lawsuits",
						false,
						"this description matches the seventh amendment."
					],
					[
						"Excess bail or fines, cruel and unusual punishment",
						false,
						"this description matches the eighth amendment."
					],
					[
						"Rights not named",
						false,
						"this description matches the ninth amendment."
					],
					[
						"Powers reserved to states",
						false,
						"this description matches the tenth amendment."
					],
				],
				"answer" => null,
				"explanation" => null
			],
			[
				"question" => "What is the purpose of amendment five?",
				"answer_type" => "DROPDOWN",
				"answers" => [
					[
						"Freedom of religion, speech, press, assembly, petition",
						false,
						"this description matches the first amendment."
					],
					[
						"Right to bear arms",
						false,
						"this description matches the second amendment."
					],
					[
						"Quartering of troops",
						false,
						"this description matches the third amendment."
					],
					[
						"Search and seizure",
						false,
						"this description matches the fourth amendment."
					],
					[
						"Due process, double jeopardy, self-incrimination",
						true,
						"this description matches the fifth amendment."
					],
					[
						"Jury trial, right to counsel",
						false,
						"this description matches the sixth amendment."
					],
					[
						"Common lawsuits",
						false,
						"this description matches the seventh amendment."
					],
					[
						"Excess bail or fines, cruel and unusual punishment",
						false,
						"this description matches the eighth amendment."
					],
					[
						"Rights not named",
						false,
						"this description matches the ninth amendment."
					],
					[
						"Powers reserved to states",
						false,
						"this description matches the tenth amendment."
					],
				],
				"answer" => null,
				"explanation" => null
			],
			[
				"question" => "What is the purpose of amendment six?",
				"answer_type" => "DROPDOWN",
				"answers" => [
					[
						"Freedom of religion, speech, press, assembly, petition",
						false,
						"this description matches the first amendment."
					],
					[
						"Right to bear arms",
						false,
						"this description matches the second amendment."
					],
					[
						"Quartering of troops",
						false,
						"this description matches the third amendment."
					],
					[
						"Search and seizure",
						false,
						"this description matches the fourth amendment."
					],
					[
						"Due process, double jeopardy, self-incrimination",
						false,
						"this description matches the fifth amendment."
					],
					[
						"Jury trial, right to counsel",
						true,
						"this description matches the sixth amendment."
					],
					[
						"Common lawsuits",
						false,
						"this description matches the seventh amendment."
					],
					[
						"Excess bail or fines, cruel and unusual punishment",
						false,
						"this description matches the eighth amendment."
					],
					[
						"Rights not named",
						false,
						"this description matches the ninth amendment."
					],
					[
						"Powers reserved to states",
						false,
						"this description matches the tenth amendment."
					],
				],
				"answer" => null,
				"explanation" => null
			],
			[
				"question" => "What is the purpose of amendment seven?",
				"answer_type" => "DROPDOWN",
				"answers" => [
					[
						"Freedom of religion, speech, press, assembly, petition",
						false,
						"this description matches the first amendment."
					],
					[
						"Right to bear arms",
						false,
						"this description matches the second amendment."
					],
					[
						"Quartering of troops",
						false,
						"this description matches the third amendment."
					],
					[
						"Search and seizure",
						false,
						"this description matches the fourth amendment."
					],
					[
						"Due process, double jeopardy, self-incrimination",
						false,
						"this description matches the fifth amendment."
					],
					[
						"Jury trial, right to counsel",
						false,
						"this description matches the sixth amendment."
					],
					[
						"Common lawsuits",
						true,
						"this description matches the seventh amendment."
					],
					[
						"Excess bail or fines, cruel and unusual punishment",
						false,
						"this description matches the eighth amendment."
					],
					[
						"Rights not named",
						false,
						"this description matches the ninth amendment."
					],
					[
						"Powers reserved to states",
						false,
						"this description matches the tenth amendment."
					],
				],
				"answer" => null,
				"explanation" => null
			],
			[
				"question" => "What is the purpose of amendment eight?",
				"answer_type" => "DROPDOWN",
				"answers" => [
					[
						"Freedom of religion, speech, press, assembly, petition",
						false,
						"this description matches the first amendment."
					],
					[
						"Right to bear arms",
						false,
						"this description matches the second amendment."
					],
					[
						"Quartering of troops",
						false,
						"this description matches the third amendment."
					],
					[
						"Search and seizure",
						false,
						"this description matches the fourth amendment."
					],
					[
						"Due process, double jeopardy, self-incrimination",
						false,
						"this description matches the fifth amendment."
					],
					[
						"Jury trial, right to counsel",
						false,
						"this description matches the sixth amendment."
					],
					[
						"Common lawsuits",
						false,
						"this description matches the seventh amendment."
					],
					[
						"Excess bail or fines, cruel and unusual punishment",
						true,
						"this description matches the eighth amendment."
					],
					[
						"Rights not named",
						false,
						"this description matches the ninth amendment."
					],
					[
						"Powers reserved to states",
						false,
						"this description matches the tenth amendment."
					],
				],
				"answer" => null,
				"explanation" => null
			],
			[
				"question" => "What is the purpose of amendment nine?",
				"answer_type" => "DROPDOWN",
				"answers" => [
					[
						"Freedom of religion, speech, press, assembly, petition",
						false,
						"this description matches the first amendment."
					],
					[
						"Right to bear arms",
						false,
						"this description matches the second amendment."
					],
					[
						"Quartering of troops",
						false,
						"this description matches the third amendment."
					],
					[
						"Search and seizure",
						false,
						"this description matches the fourth amendment."
					],
					[
						"Due process, double jeopardy, self-incrimination",
						false,
						"this description matches the fifth amendment."
					],
					[
						"Jury trial, right to counsel",
						false,
						"this description matches the sixth amendment."
					],
					[
						"Common lawsuits",
						false,
						"this description matches the seventh amendment."
					],
					[
						"Excess bail or fines, cruel and unusual punishment",
						false,
						"this description matches the eighth amendment."
					],
					[
						"Rights not named",
						true,
						"this description matches the ninth amendment."
					],
					[
						"Powers reserved to states",
						false,
						"this description matches the tenth amendment."
					],
				],
				"answer" => null,
				"explanation" => null
			],
			[
				"question" => "What is the purpose of amendment ten?",
				"answer_type" => "DROPDOWN",
				"answers" => [
					[
						"Freedom of religion, speech, press, assembly, petition",
						false,
						"this description matches the first amendment."
					],
					[
						"Right to bear arms",
						false,
						"this description matches the second amendment."
					],
					[
						"Quartering of troops",
						false,
						"this description matches the third amendment."
					],
					[
						"Search and seizure",
						false,
						"this description matches the fourth amendment."
					],
					[
						"Due process, double jeopardy, self-incrimination",
						false,
						"this description matches the fifth amendment."
					],
					[
						"Jury trial, right to counsel",
						false,
						"this description matches the sixth amendment."
					],
					[
						"Common lawsuits",
						false,
						"this description matches the seventh amendment."
					],
					[
						"Excess bail or fines, cruel and unusual punishment",
						false,
						"this description matches the eighth amendment."
					],
					[
						"Rights not named",
						false,
						"this description matches the ninth amendment."
					],
					[
						"Powers reserved to states",
						true,
						"this description matches the tenth amendment."
					],
				],
				"answer" => null,
				"explanation" => null
			],
		],
	],
	[
		"name" => "Amendments XI and XII",
		"sort" => 210,
		"topic" => "AMENDMENTS",
		"url" => "amendments-xi-xii",
		"questions" => [
			[
				"question" => "Prior to the twelfth amendment, how was the Vice President chosen?",
				"answer_type" => "MC",
				"answers" => [
					[
						"The second-most voted candidate became the Vice President",
						true,
						"electors previously cast votes only for President.  After the amendment, they cast votes for each President and Vice President."
					],
					[
						"The President chose the Vice President",
						false,
						"the President, after this amendment, would choose a running mate who would likely become Vice President, however, prior to this amendment, the second-most voted candidate became the Vice President."
					],
					[
						"They were elected on a separate ballot",
						false,
						"this is what happened after this amendment was put into place."
					],
					[
						"The Supreme Court nominates a Vice President to keep the President in check",
						false,
						"this is not true."
					],
					[
						"There was no Vice President prior to this amendment.",
						false,
						"this is not true."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "What type of cases did the eleventh amendment prevent the Supreme Court from having jurisdiction over which was previously allowed in Article 3?",
				"answer_type" => "MC",
				"answers" => [
					[
						"An individual suing a different state or country",
						true,
						"this amendment extended sovereign immunity to this case."
					],
					[
						"A citizen violating traffic laws in the state which they live",
						false,
						"the Supreme Court never held authority over disputes within one state."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
		],
	],
	[
		"name" => "Amendments XVI-XXI",
		"sort" => 230,
		"topic" => "AMENDMENTS",
		"url" => "amendments-xvi-xxi",
		"questions" => [
			[
				"question" => "The eighteenth amendment (which was later repealed by the twenty-first amendment) did what?",
				"answer_type" => "DROPDOWN",
				"answers" => [
					[
						"Ban the sale of alcohol",
						true,
						"this amendment began Prohibition, a period where alcohol was illegal."
					],
					[
						"Declare US participation in World War II",
						false,
						"declarations of war do not become amendments."
					],
					[
						"Suspend the freedom of speech",
						false,
						"this is not what the eighteenth amendment did."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "One of these amendments directly increased the power of America's democracy in the legislature.  Which one is this?",
				"answer_type" => "MC",
				"answers" => [
					[
						"Amendment 16, which allowed income taxes",
						false,
						"taxes had no impact on the democratic process."
					],
					[
						"Amendment 17, which allowed direct election of senators by the people",
						true,
						"this amendment allowed the people to elect their senators directly."
					],
					[
						"Amendment 18, which banned the sale of alcohol",
						false,
						"alcohol had no direct impact on the election of senators."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "Which of the following amendments was the result of women's rights advocates and allowed suffrage for both genders?",
				"answer_type" => "MC",
				"answers" => [
					[
						"Amendment 16, which allowed income taxes",
						false,
						"taxes had no impact on the women's suffrage."
					],
					[
						"Amendment 19, which allowed women to vote",
						true,
						"this amendment allowed women suffrage, or the right to vote."
					],
					[
						"Amendment 18, which banned the sale of alcohol",
						false,
						"alcohol had no direct impact on women's suffrage."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
		],
	],
	[
		"name" => "Amendments XXII-XXVII",
		"sort" => 240,
		"topic" => "AMENDMENTS",
		"url" => "amendments-xxii-xxvii",
		"questions" => [
			[
				"question" => "The twenty-second amendment limited the number of terms a president could hold office.  How many terms was this limit? (Input a number)",
				"answer_type" => "BLANK",
				"answers" => [],
				"answer" => "2",
				"explanation" => "This limited the President to two terms, or eight years, maximum.",
			],
			[
				"question" => "Three of these amendments enabled more people to vote.  Which are they?",
				"answer_type" => "CHECK",
				"answers" => [
					[
						"Amendment 22, which limited the number of terms a President could serve",
						false,
						"the number of terms the President could serve holds no impact on who may vote."
					],
					[
						"Amendment 23, which allowed citizens of Washington D.C to vote for President and Vice President",
						true,
						"this amendment allowed the people of Washington D.C., who could not previously vote in the presidential election, to vote."
					],
					[
						"Amendment 24, which disallowed poll taxes",
						true,
						"removing poll taxes allowed more people to vote as they did not have to pay."
					],
					[
						"Amendment 25, which determines the actions to take if the President suddenly leaves office",
						false,
						"this holds no effect on who can vote."
					],
					[
						"Amendment 26, which lowered the voting age",
						true,
						"this allowed younger people to vote."
					],
					[
						"Amendment 27, which controls how Congressmen are paid",
						false,
						"this did not affect who could vote."
					],
				],
				"answer" => null,
				"explanation" => null,
			],
			[
				"question" => "The twenty-sixth amendment lowered the voting age to what it is today.  What is the current minimum age to vote? (number only)",
				"answer_type" => "BLANK",
				"answers" => [],
				"answer" => "18",
				"explanation" => "This amendment allowed people as young as eighteen to vote.",
			],
		],
	],
];

Database::getDbh()->query("SET FOREIGN_KEY_CHECKS=0;");

// $stmt = new TruncateQuery();
// $stmt->setTable("records");
// $stmt->execute();

$stmt = new TruncateQuery();
$stmt->setTable("quizzes");
$stmt->execute();

$stmt = new TruncateQuery();
$stmt->setTable("questions");
$stmt->execute();

$stmt = new TruncateQuery();
$stmt->setTable("answers");
$stmt->execute();

Database::getDbh()->query("SET FOREIGN_KEY_CHECKS=1;");

foreach ($quizzes as ["name" => $name, "sort" => $sort, "topic" => $topic, "url" => $url, "questions" => $questions]) {
	$quiz = Quiz::create([
		"NAME" => $name,
		"SORT" => $sort,
		"TOPIC" => $topic,
		"URL" => $url,
	]);

	foreach ($questions as ["question" => $question, "answer_type" => $answerType, "answers" => $answers, "answer" => $answer, "explanation" => $explanation,]) {
		$question = Question::create([
			"QUIZ_ID" => $quiz->getId(), 
			"QUESTION" => $question, 
			"ANSWER_TYPE" => $answerType, 
			"ANSWER" => $answer,
			"EXPLANATION" => $explanation,
		]);

		foreach ($answers as [$text, $correct, $explanation]) {
			Answer::create([
				"QUESTION_ID" => $question->getId(),
				"CORRECT" => $correct ? 1 : 0,
				"TEXT" => $text,
				"EXPLANATION" => $explanation,
			]);
		}
 	}
}

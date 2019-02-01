<?php

define("ROOTDIR", "../../");
define("REAL_ROOTDIR", "../../");

require_once REAL_ROOTDIR."src/initializer.php";
use \WeTheFuture\Database\Query\{InsertQuery, SelectQuery};
use \WeTheFuture\Database\QueryAddition\{OrderByClause, WhereClause, JoinClause};
use \WeTheFuture\Database\{AbstractDatabaseModel, Column, Tables};
use \WeTheFuture\Form\FormRepository;
use \WeTheFuture\HTTPCode;
use \WeTheFuture\Page\{UniversalFunctions, Values};
use \WeTheFuture\Quiz\Quiz;
use \WeTheFuture\Record\Record;
use \WeTheFuture\User\User;

define("PAGE_KEYWORD", Values::RECORDS[0]);
define("PAGE_TITLE", Values::createTitle(Values::RECORDS[1], []));

require_once Values::HEAD_INC;

echo UniversalFunctions::createHeading("Records");
?>
		<div class="section">
			<h5>Search parameters:</h5>
			<?php if (array_key_exists("q", $_GET) && is_array($_GET["q"]) && count($_GET["q"])): ?>
				<?php foreach ($_GET["q"] as $parameter => $value): ?>
					<?php
					switch ($parameter) {
						case "quiz":
							$value = (new Quiz((int)$value))->getName();
							break;
						case "min-grade":
						case "max-grade":
							$value = (int)$value;
							$value .= "%";
							break;
						case "min-time":
						case "max-time":
							$value = (int)$value;
							$value .= "s";
							break;
					}
					?>
					<p class="no-margin"><strong><?= htmlspecialchars($parameter) ?>:</strong> <?= htmlspecialchars($value) ?></p>
				<?php endforeach; ?>
				<p class="no-top-margin"></p>
			<?php else: ?>
				<p><i>No parameters were specified, showing all records.</i></p>
			<?php endif; ?>
			<?php
			$stmt = new SelectQuery();

			$stmt->setTable(Tables::RECORDS);

			$stmt->addColumn(new Column("ID", Tables::RECORDS));
			$stmt->addColumn(new Column("USER_ID", Tables::RECORDS));
			$stmt->addColumn(new Column("USERNAME", Tables::USERS));
			$stmt->addColumn(new Column("NICK", Tables::USERS));
			$stmt->addColumn(new Column("PICTURE_LOC", Tables::USERS));
			$stmt->addColumn(new Column("FILE_TOKEN", Tables::USERS));
			$stmt->addColumn(new Column("SCHOOL", Tables::USERS));
			$stmt->addColumn(new Column("QUIZ_ID", Tables::RECORDS));
			$stmt->addColumn(new Column("TOKEN", Tables::RECORDS));
			$stmt->addColumn(new Column("TIME", Tables::RECORDS));
			$stmt->addColumn(new Column("GRADE", Tables::RECORDS));
			$stmt->addColumn(new Column("DATE", Tables::RECORDS));

			$joinClause = new JoinClause();
			$joinClause->setJoinTable(Tables::USERS);
			$joinClause->setLeftColumn(new Column("USER_ID", Tables::RECORDS));
			$joinClause->setRightColumn(new Column("ID", Tables::USERS));
			$stmt->addAdditionalCapability($joinClause);

			if (array_key_exists("q", $_GET) && is_array($_GET["q"]) && count($_GET["q"])) {
				$whereClause = new WhereClause();

				if (array_key_exists("username", $_GET["q"])) {
					$whereClause->addToClause(WhereClause::AND);
					$whereClause->addToClause([new Column("USERNAME", Tables::USERS), "=", $_GET["q"]["username"]]);
				}

				if (array_key_exists("quiz", $_GET["q"])) {
					$whereClause->addToClause(WhereClause::AND);
					$whereClause->addToClause([new Column("QUIZ_ID", Tables::RECORDS), "=", $_GET["q"]["quiz"]]);
				}

				if (array_key_exists("min-grade", $_GET["q"])) {
					$whereClause->addToClause(WhereClause::AND);
					$whereClause->addToClause([new Column("GRADE", Tables::RECORDS), ">=", ((int)$_GET["q"]["min-grade"])/100]);
				}

				if (array_key_exists("max-grade", $_GET["q"])) {
					$whereClause->addToClause(WhereClause::AND);
					$whereClause->addToClause([new Column("GRADE", Tables::RECORDS), "<=", ((int)$_GET["q"]["max-grade"])/100]);
				}

				if (array_key_exists("min-time", $_GET["q"])) {
					$whereClause->addToClause(WhereClause::AND);
					$whereClause->addToClause([new Column("TIME", Tables::RECORDS), ">=", ((int)$_GET["q"]["min-time"])]);
				}

				if (array_key_exists("max-time", $_GET["q"])) {
					$whereClause->addToClause(WhereClause::AND);
					$whereClause->addToClause([new Column("TIME", Tables::RECORDS), "<=", ((int)$_GET["q"]["max-time"])]);
				}

				if (array_key_exists("state-province", $_GET["q"])) {
					$whereClause->addToClause(WhereClause::AND);
					$whereClause->addToClause([new Column("STATE_PROVINCE", Tables::USERS), "=", $_GET["q"]["state-province"]]);
				}
				if (array_key_exists("country", $_GET["q"])) {
					$whereClause->addToClause(WhereClause::AND);
					$whereClause->addToClause([new Column("COUNTRY", Tables::USERS), "=", $_GET["q"]["country"]]);
				}

				if (array_key_exists("school", $_GET["q"])) {
					$whereClause->addToClause(WhereClause::AND);
					$whereClause->addToClause([new Column("SCHOOL", Tables::USERS), "LIKE", "%".$_GET["q"]["school"]."%"]);
				}
				if (array_key_exists("city", $_GET["q"])) {
					$whereClause->addToClause(WhereClause::AND);
					$whereClause->addToClause([new Column("CITY", Tables::USERS), "LIKE", "%".$_GET["q"]["city"]."%"]);
				}

				// remove extra AND
				$clause = $whereClause->getClause();
				array_shift($clause);
				$whereClause->setClause($clause);

				$stmt->addAdditionalCapability($whereClause);
			}

			$stmt->execute();

			$rows = $stmt->getResult();

			$records = [];

			foreach ($rows as $row) {
				// cache
				new User($row["USER_ID"], [
					"ID" => $row["USER_ID"],
					"USERNAME" => $row["USERNAME"],
					"NICK" => $row["NICK"],
					"PICTURE_LOC" => $row["PICTURE_LOC"],
					"FILE_TOKEN" => $row["FILE_TOKEN"],
					"SCHOOL" => $row["SCHOOL"],
				], false);

				$records[] = new Record($row["ID"], $row, false);
			}

			usort($records, function(Record $a, Record $b) : int {
				if ($a->getGrade() == $b->getGrade()) {
					return $a->getTime()/(count($a->getQuiz()->getQuestions())) <=> $b->getTime()/(count($b->getQuiz()->getQuestions()));
				}
				return $b->getGrade() <=> $a->getGrade();
			});
			?>
			
			<div class="divider"></div>
			
			<?php if (count($records)): ?>
				<table class="responsive-table highlight bordered">
					<thead>
						<tr>
							<th>Place</th>
							<th>Quiz</th>
							<th>User</th>
							<th>Location</th>
							<th>Score</th>
							<th>Time</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; ?>
						<?php foreach ($records as $record): ?>
							<tr>
								<td><?= $i++; ?></td>
								<td>
									<a href="<?= ROOTDIR ?>Quiz/Take/<?= htmlspecialchars($record->getQuiz()->getUrl()) ?>">
										<?= htmlspecialchars($record->getQuiz()->getName()) ?>
									</a>
								</td>
								<td>
									<a href="<?= ROOTDIR ?>Profile/<?= $record->getUser()->getUsername() ?>">
										<?= htmlspecialchars($record->getUser()->getNickname()) ?>
									</a>
								</td>
								<td>
									<?php if (!empty($record->getUser()->getSchool())): ?>
										<?= htmlspecialchars($record->getUser()->getSchool()) ?>
										<br>
									<?php endif; ?>
									<?= htmlspecialchars($record->getUser()->getCity()).(empty($record->getUser()->getCity()) ? "" : ", ") ?>
									<?php if ($record->getUser()->getStateProvince() != "--"): ?>
										<?= htmlspecialchars(UniversalFunctions::STATE_PROVINCE_LIST[$record->getUser()->getStateProvince()]) ?>, 
									<?php endif; ?>
									<?= htmlspecialchars($record->getUser()->getCountry()) ?>
								</td>
								<td>
									<?= number_format($record->getGrade()*100, 2) ?>%
								</td>
								<td data-text="<?= $record->getTime() ?>">
									<?php if ($record->getTime() > 3600): ?>
										<?= floor($record->getTime()/3600) ?>h
										<?= floor(($record->getTime()%3600)/60) ?>m
										<?= $record->getTime()%60 ?>s
									<?php elseif ($record->getTime() > 60): ?>
										<?= floor($record->getTime()/60) ?>m
										<?= $record->getTime()%60 ?>s
									<?php else: ?>
										<?= $record->getTime()%60 ?>s
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			<?php else: ?>
				<p class="flow-text center"><i>Your query did not return any results</i></p>
			<?php endif; ?>

			<div class="divider"></div>

			<p>Places are determined by considering the highest percentage correct, then the amount of time taken to complete each question.</p>

			<p>Looking for bulk data, or data in a raw, machine-processable format?  Contact me at <a href="mailto:smileytechguy@smileytechguy.com">smileytechguy@smileytechguy.com</a> stating what you would like and why (statistics project, class presentation, etc.) and I will see what I can do!</p>
		</div>
<?php
require_once Values::FOOTER_INC;

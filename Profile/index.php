<?php

define("ROOTDIR", "../");
define("REAL_ROOTDIR", "../");

require_once REAL_ROOTDIR."src/initializer.php";
use \WeTheFuture\Images\Image;
use \WeTheFuture\Page\{UniversalFunctions, Values};
use \WeTheFuture\HTTPCode;
use \WeTheFuture\Record\Record;
use \WeTheFuture\User\User;

define("PAGE_KEYWORD", Values::PROFILE[0]);

$id = $user = null;
if (array_key_exists("q", $_GET)) {
	$id = User::getIdFromUsername($_GET["q"]); 
	if ($id !== -1) {
		$user = new User($id);
	} else {
		HTTPCode::set(404);
	}
} elseif (!User::isLoggedIn()) {
	HTTPCode::set(401);
} else {
	$user = $_SESSION["user"];
	$id = $user->getId();
}

define("PAGE_TITLE", Values::createTitle(Values::PROFILE[1], ["name" => (!is_null($user) ? $user->getNickname() : "Logged Out")]));

require_once Values::HEAD_INC;

echo UniversalFunctions::createHeading("Profile");

if (!User::isLoggedIn() && is_null($user)):
	echo User::getNotLoggedInHtml();
elseif (User::isLoggedIn() && is_null($user)): ?>
			<p class="flow-text">This user could not be found.</p>
<?php else: ?>
			<div class="section">
				<div class="row">
					<div class="col s6 offset-s3 m4 center force-square-contents">
						<?= $user->getImage()->getStrictCircleHtml() ?>
					</div>
					<div class="col s12 m7 offset-m1">
						<div class="col s12 center-on-small-only">
							<h2 class="header hide-on-small-only no-margin"><?= htmlspecialchars($user->getNickname()) ?></h2>
							
							<br class="hide-on-med-and-up">
							<h3 class="header hide-on-med-and-up no-margin"><?= htmlspecialchars($user->getNickname()) ?></h3>

							<p class="flow-text no-top-margin"><?= $user->getUsername() ?></p>

							<?php if (!empty($user->getSchool())): ?>
								<p class="flow-text no-bottom-margin"><?= htmlspecialchars($user->getSchool()) ?></p>
							<?php endif; ?>
							<p class="flow-text no-top-margin">
								<?= htmlspecialchars($user->getCity()).(empty($user->getCity()) ? "" : ", ") ?>
								<?php if ($user->getStateProvince() != "--"): ?>
									<?= htmlspecialchars(UniversalFunctions::STATE_PROVINCE_LIST[$user->getStateProvince()]) ?>, 
								<?php endif; ?>
								<?= htmlspecialchars($user->getCountry()) ?>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="divider"></div>
			<div class="section">
				<h3>Records</h3>

				<?php
				$records = Record::getForUser($user); 
				
				usort($records, function(Record $a, Record $b) : int {
					if ($a->getGrade() == $b->getGrade()) {
						return $a->getTime()/(count($a->getQuiz()->getQuestions())) <=> $b->getTime()/(count($b->getQuiz()->getQuestions()));
					}
					return $b->getGrade() <=> $a->getGrade();
				});

				if (count($records)): ?>
					<table class="responsive-table highlight bordered">
						<thead>
							<tr>
								<th>Place</th>
								<th>Quiz</th>
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
			</div>
<?php endif; ?>
<?php
require_once Values::FOOTER_INC;

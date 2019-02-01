<?php

define("ROOTDIR", "../");
define("REAL_ROOTDIR", "../");

require_once REAL_ROOTDIR."src/initializer.php";
use \WeTheFuture\Images\Image;
use \WeTheFuture\Page\{UniversalFunctions, Values};
use \WeTheFuture\HTTPCode;
use \WeTheFuture\Quiz\Question;
use \WeTheFuture\Record\Record;
use \WeTheFuture\User\User;

define("PAGE_KEYWORD", Values::RESULTS[0]);

$record = null;
if (array_key_exists("q", $_GET)) {
	$record = Record::getFromToken($_GET["q"]); 
	if (is_null($record)) {
		HTTPCode::set(404);
	}
} else {
	HTTPCode::set(400);
}

define("PAGE_TITLE", Values::createTitle(Values::RESULTS[1], ["user" => (!is_null($record) ? $record->getUser()->getNickname() : "Invalid"), "quiz" => (!is_null($record) ? $record->getQuiz()->getName() : "Invalid")]));

require_once Values::HEAD_INC;

echo UniversalFunctions::createHeading("Results");

if (is_null($record)): ?>
			<p class="flow-text">This record could not be found.</p>
<?php else: ?>
			<?php
			// helpers for sanity
			$quiz = $record->getQuiz();
			$user = $record->getUser();
			?>
			<div class="section">
				<h3><strong><?= htmlspecialchars($quiz->getName()) ?> (<?= $quiz->getFriendlyTopic() ?>)</strong></h3>
				<h4><strong>Grade:</strong> <?= round($record->getGrade()*count($quiz->getQuestions())) ?>/<?= count($quiz->getQuestions()) ?> (<?= number_format($record->getGrade()*100, 2) ?>%)</h4>
				<h4><strong>Date:</strong> <?= $record->getDate()->format("M j, Y") ?></h4>
				<h4>
					<strong>Time taken:</strong>
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
				</h4>

				<div class="row">
					<div class="col s3 m2 l1 center force-square-contents">
						<?= $user->getImage()->getStrictCircleHtml() ?>
					</div>
					<div class="col s9 m10 l11">
						<p class="flow-text no-margin"><a href="<?= ROOTDIR ?>Profile/<?= $user->getUsername() ?>"><?= htmlspecialchars($user->getNickname()) ?></a></p>
						
						<?php if (!empty($user->getSchool())): ?>
							<p class="flow-text no-margin"><?= htmlspecialchars($user->getSchool()) ?></p>
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

				<p>Click each question to view more information.</p>
				<ul class="collapsible popout">
					<?php $i=1; ?>
					<?php foreach (json_decode(json_encode($record->getData())?:"",true) as ["id" => $id,"answer" => $answer,"correct_answer" => $correctAnswer,"correct" => $correct,]): ?>
						<?php
						$question = new Question($id);
						?>
						<li>
							<div class="collapsible-header"><i class="material-icons"><?= $correct ? "done" : "clear" ?></i> Question <?= $i++ ?></div>
							<div class="collapsible-body">
								<h5 class="no-top-margin"><?= htmlspecialchars($question->getQuestion()) ?></h5>

								<p class="no-margin"><strong>Your answer:</strong> <?= htmlspecialchars($answer) ?></p>
								<p class="no-margin"><strong>Correct answer:</strong> <?= htmlspecialchars($correctAnswer) ?></p>

								<?php if (empty($question->getAnswers())): ?>
									<p class="raw-inline-markdown">**Explanation:** <?= htmlspecialchars($question->getExplanation()."") ?></p>
								<?php else: ?>
									<p class="no-bottom-margin"><strong>Explanation:</strong></p>
									<?php foreach ($question->getAnswers() as $answerChoice): ?>
										<p class="no-margin raw-inline-markdown">"<?= htmlspecialchars($answerChoice->getText()) ?>" is <?= $answerChoice->isCorrect() ? "" : "IN" ?>CORRECT because <?= htmlspecialchars($answerChoice->getExplanation()."") ?></p>
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
						</li>
    				<?php endforeach; ?>
				</ul>

				<?php switch ($quiz->getTopic()): case "CONSTITUTION": ?>
					<p>Want to learn more about what this topic?  Check out our resources on the Constitution <a href="<?= ROOTDIR ?>Learn/Constitution">here</a>.</p>
				<?php break; case "AMENDMENTS": ?>
					<p>Want to learn more about what this topic?  Check out our resources on the Amendments <a href="<?= ROOTDIR ?>Learn/Amendments">here</a>.</p>
				<?php endswitch; ?>

				<p class="flow-text no-bottom-margin">
					<strong>Send these results:</strong> 
					<a href="javascript:prompt(&quot;Copy the link below:&quot;, <?= htmlspecialchars(json_encode("https://constitution.website/Results/".$record->getToken())) ?>)"">Copy Link</a>, 
					<a href="mailto:?subject=My%20<?= htmlspecialchars(str_replace("+", "%20", urlencode($quiz->getName()))) ?>%20Results&body=Check%20out%20my%20results:%20https://constitution.website/Results/<?= $record->getToken() ?>%0AOr,%20if%20you're%20up%20for%20it,%20try%20the%20quiz%20yourself%20at%20https://constitution.website/Quiz/Take/<?= $quiz->getUrl() ?>">E-mail</a>,
					<a href="https://twitter.com/intent/tweet?url=<?= htmlspecialchars(urlencode("https://constitution.website/Results/".$record->getToken())) ?>&text=<?= htmlspecialchars(urlencode("I just took the ".$quiz->getName()." quiz at constitution.website.  Check out how I did!")) ?>&hashtags=constitution%2Cquiz">Tweet</a>
				</p>
				<p class="flow-text no-top-margin">
					<strong>Share the quiz:</strong> 
					<a href="javascript:prompt(&quot;Copy the link below:&quot;, <?= htmlspecialchars(json_encode("https://constitution.website/Quiz/Take/".$quiz->getUrl())) ?>)"">Copy Link</a>, 
					<a href="mailto:?subject=<?= htmlspecialchars(urlencode($quiz->getName())) ?>%20Results&body=Check%20out%20my%20results:%20https://constitution.website/Results/<?= $record->getToken() ?>">E-mail</a>, 
					<a href="https://twitter.com/intent/tweet?url=<?= htmlspecialchars(urlencode("https://constitution.website/Quiz/Take/".$quiz->getUrl())) ?>&text=<?= htmlspecialchars(urlencode("I just took the ".$quiz->getName()." quiz at constitution.website.  How well can you do?")) ?>&hashtags=constitution%2Cquiz">Tweet</a>
				</p>
			</div>
<?php endif; ?>
<?php
require_once Values::FOOTER_INC;

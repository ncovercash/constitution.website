<?php

define("ROOTDIR", "../");
define("REAL_ROOTDIR", "../");

require_once REAL_ROOTDIR."src/initializer.php";
use \WeTheFuture\Page\{UniversalFunctions, Values};
use \WeTheFuture\Quiz\Quiz;
use \WeTheFuture\User\User;

define("PAGE_KEYWORD", Values::QUIZZES[0]);
define("PAGE_TITLE", Values::createTitle(Values::QUIZZES[1], []));

require_once Values::HEAD_INC;

echo UniversalFunctions::createHeading("Quizzes");
?>
			<div class="section">
				<p class="flow-text">Please look at our large selection of various quizzes below and take as many as you like!  Once you complete a quiz, you will be able to review and share your results with full explanations of every answer.</p>

				<p><i>Please note: on mobile devices, the table headers will be on the left, and the table must be scrolled horizontally.</i></p>
				<table class="responsive-table highlight bordered">
					<thead>
						<tr>
							<th>Topic</th>
							<th>Name</th>
							<th>Questions</th>
							<th>Responses</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach (Quiz::getAll() as $quiz): ?>
							<tr>
								<td><?= htmlspecialchars($quiz->getFriendlyTopic()) ?></td>
								<td><?= htmlspecialchars($quiz->getName()) ?></td>
								<td><?= count($quiz->getQuestions()) ?></td>
								<td><?= count($quiz->getRecords()) ?></td>
								<td>
									<?php if (User::isLoggedIn()): ?>
										<a href="<?= ROOTDIR ?>Quiz/Take/<?= htmlspecialchars($quiz->getUrl()) ?>">Take</a>
									<?php else: ?>
										<a class="grey-text tooltipped" data-tooltip="You must login to take this quiz" href="#">Take</a>
									<?php endif; ?>
									|
									<a href="<?= ROOTDIR ?>Records/Search/?q[quiz]=<?= $quiz->getId() ?>">Records</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
<?php
require_once Values::FOOTER_INC;

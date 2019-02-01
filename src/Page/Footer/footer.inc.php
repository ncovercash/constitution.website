<?php
use \WeTheFuture\Controller;
use \WeTheFuture\Database\Database;
use \WeTheFuture\Database\Query\AbstractQuery;
use \WeTheFuture\Page\{Resources, UniversalFunctions};
?>
		</div>
		<footer class="page-footer">
			<div class="container white-text">
				<p>
					Website &copy;<?php echo date("Y"); ?> <a href="mailto:smileytechguy@smileytechguy.com">Noah Overcash</a>, All rights reserved.
				</p>
				<p>
					This page is created for my <a href="https://constitutingamerica.org/contest-categories/">We the Future Contest</a> entry.
				</p>
				<p>
					Version: <?= Controller::getVersion() ?> (<?= Controller::getCommit() ?>)
					<?php if (Controller::isDevelMode()): ?>
						<?php chdir(realpath(REAL_ROOTDIR) ?: ""); // reset dir for proper git usage ?>
						<?= `git log -1 --pretty="%B by %cN %cr"` ?>
					<?php endif; ?>
				</p>
				<?php if (Controller::isDevelMode()): ?>
<?php
$stmt = Database::getDbh()->query("show profiles");
$rows = $stmt ? ($stmt->fetchAll() ?: []) : [];
?>
					<p>
						<strong>Debug information:</strong> Page generated in <?= microtime(true)-EXEC_START_TIME ?>s, requiring <?= AbstractQuery::getTotalQueries() ?> database queries (which took <?= array_sum(array_column($rows, "Duration")) ?>s) and <?= UniversalFunctions::humanize(memory_get_peak_usage()) ?> of memory.
					</p>
				<?php endif; ?>
				<br>
			</div>
		</footer>
		<?php foreach (Resources::getScripts() as $script): ?>
			<script src="<?= $script[0] ?>" <?= trim(" ".implode(" ", array_slice($script, 1))) ?>></script>
		<?php endforeach; ?>

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'UA-127410305-1');
		</script>
	</body>
</html>

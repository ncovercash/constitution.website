<?php
header("Content-Type: application/javascript; charset=UTF-8", true);

define("ROOTDIR", "../../");
define("REAL_ROOTDIR", "../../");

define("NO_SESSION", true);

require_once REAL_ROOTDIR."src/initializer.php";
use \WeTheFuture\API\ErrorCodes;
use \WeTheFuture\{Controller, Secrets};
use \WeTheFuture\Database\Database;
use \WeTheFuture\Database\Query\AbstractQuery;
use \WeTheFuture\Form\FormRepository;
use \WeTheFuture\Page\{Resources, UniversalFunctions};

$forms = FormRepository::getAllForms();

?>
// ~))))'> 
//
// What's this, a possum in the JavaScript?
// Impossible!
//
// (yes spade im looking at you)

/* GENERAL FUNCTIONS */
var humanFileSize = function(size) {
	var i = Math.floor( Math.log(size) / Math.log(1024) );
	return ( size / Math.pow(1024, i) ).toFixed(2) * 1 + ' ' + ['B', 'KB', 'MB', 'GB', 'TB'][i];
};


(function($){
	$(function(){
		function materializeOnload() {
			if ($ === undefined || M === undefined) {
				window.log(<?= json_encode(basename(__FILE__)) ?>, "materializeOnload - deferring for 100ms (even though I'm not happy about it...)");
				setTimeout(materializeOnload, 100);
				return;
			}
			window.log(<?= json_encode(basename(__FILE__)) ?>, "materializeOnload - invoked");
			// its bullshit that they removed the old toast function API
			window.M["escapeToast"] = function(a) {
				M.toast({html: $("<span></span>").text(a).html()});
			};
			window.Materialize = window.M; // legacy
			$('select').attr("required", false);
			$(".sidenav").sidenav();
			$(".modal").modal();
			$('.pushpin').pushpin({
				top: 325,
				offset: 72
			});
			$('.tooltipped').tooltip();
			$(".collapsible").collapsible();
			$(".dropdown-trigger").dropdown();
			$('.psuedo-required, .psuedo-required input').attr("required", false);
			$(".raw-markdown, .raw-inline-markdown").each(function() {renderMarkdownArea(this);});
			$(".raw-emoji").each(function() {$(this).html(twemoji.parse($(this).html())).removeClass("raw-emoji");});
			$('.fixed-action-btn:not(.horizontal)').floatingActionButton();
			$('.fixed-action-btn.horizontal').floatingActionButton({
				direction: 'left'
			});
			$(".totp-preview").each(function(a, b) {
				setInterval(function() {
					$(b).text(
						totp($(b).attr("data-secret"), Math.floor(new Date().getTime()/30000)-1)+
						","+
						totp($(b).attr("data-secret"), Math.floor(new Date().getTime()/30000))+
						","+
						totp($(b).attr("data-secret"), Math.floor(new Date().getTime()/30000)+1)
					);
				}, 1000);
			});
			$('textarea').trigger('autoresize');
			M.Datepicker.init(document.querySelectorAll('.datepicker'), {
				showClearBtn: true
			});
			M.Timepicker.init(document.querySelectorAll('.timepicker'), {
				showClearBtn: true
			});
			$("table").each(function() {$(this).tablesorter();});
		}

		materializeOnload();

		/* GENERIC FUNCTIONS */
		jQuery.fn.swapWith = function(to) {
			return this.each(function() {
				var copy_to = $(to).clone(true);
				var copy_from = $(this).clone(true);
				$(to).replaceWith(copy_from);
				$(this).replaceWith(copy_to);
			});
		};

		/* IMAGE "DRAWERS" */
		$(document).on("mousewheel", ".horizontal-scrollable-container", function(e, delta) {
			var orig = $(this).scrollLeft();
			$(this).scrollLeft(this.scrollLeft + (e.originalEvent.deltaY * 1));
			if ($(this).scrollLeft() != orig) {
				e.preventDefault();
			}
		});

		/* MARKDOWN */
		$(document).on("input", ".markdown-field", function() {
			if (window.markdownCurrentlyParsing.hasOwnProperty($(this).attr("id"))) {
				window.log(".on input for .markdown-field", $(this).attr("id")+" - clearing existing render timeout");
				clearTimeout(window.markdownCurrentlyParsing[$(this).attr("id")]);
			}
			window.log(".on input for .markdown-field", $(this).attr("id")+" - setting render timeout for 1500ms");
			var field = this; // fucky JS shit
			window.markdownCurrentlyParsing[$(this).attr("id")] = setTimeout(function() {
				window.log("Markdown field surrogate", $(field).attr("id")+" - rendering");
				$(".markdown-target[data-field="+$(field).attr("id")+"]").removeClass("rendered-markdown").addClass("raw-markdown").text($(field).val());
				renderMarkdownArea($(".markdown-target[data-field="+$(field).attr("id")+"]"));
			}, 1500);
		});

		$(document).on("click", ".markdown-rendered-checkbox", function(e) {
			e.preventDefault && e.preventDefault();
			e.stopPropogation && e.stopPropogation();
			return false;
		});

		/* FORMS */
		$(document).on("change", ":checkbox", function(e) {
			var labelSpan = $(this).next();
			// restore original text (if applicable)
			$(labelSpan).text($(labelSpan).attr("data-original"));
		});
		$(document).on("input", ".marked-invalid", function(e) {
			if ($(this).attr("type") == "checkbox") {
				return; // should be caught in :checkbox.change
			}
			$(this).removeClass("marked-invalid").removeClass("invalid");
		});
		<?php foreach ($forms as $form): ?>
			<?= $form->getAllJs(); ?>
		<?php endforeach; ?>

		/* FILE PICKER */
		<?php require_once __DIR__.DIRECTORY_SEPARATOR.'file_picker.js'; ?>

		/* SUBFORM THING */
		<?php require_once __DIR__.DIRECTORY_SEPARATOR.'subform_entry_field.js'; ?>

		/* TOGGLEABLE BUTTONS */
		<?php require_once __DIR__.DIRECTORY_SEPARATOR.'toggle_buttons.js'; ?>

		/* FORM SUBMISSION KEYS */
		$(document).on("keydown", function(event) {
			if (event.which === 8 && $("form").length != 0 && $(event.target).parents("form").length == 0) {
				window.log(<?= json_encode(basename(__FILE__)) ?>, ".on keydown - recieved a backspace event, however there are (unfocused) forms on the page.  Suppressing...");
				event.preventDefault();
			}
		});
		$(document).on("keydown", "textarea", function(e) {
			if ((e.keyCode == 10 || e.keyCode == 13) && (e.ctrlKey || e.metaKey)) {
				window.log(<?= json_encode(basename(__FILE__)) ?>, ".on keydown in textarea - ctrl+enter recieved, attempting form submission");
				$(document.activeElement.form).submit();
			}
		});

		/* ENCRPYTION */
		<?php require_once __DIR__.DIRECTORY_SEPARATOR.'encryption.js'; ?>

		/* IMAGE COMPRESSION FALLBACKS */
		<?php require_once __DIR__.DIRECTORY_SEPARATOR.'webp_background_image_fallback.js'; ?>
	});
})(jQuery);

<?php if (Controller::isDevelMode()): ?>
<?php
$overallTime = microtime(true)-EXEC_START_TIME;
$dbDuration = array_sum(array_column(Database::getProfiles(), "Duration"));
?>
console.log("''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''");
console.log("''Main JS generation debug: ''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''");
console.log("''''''Overall: <?= $overallTime ?>s <?= str_repeat("'", 83-strlen((string)$overallTime)) ?>");
console.log("''''''Database queries: <?= AbstractQuery::getTotalQueries() ?> <?= str_repeat("'", 75-strlen((string)AbstractQuery::getTotalQueries())) ?>");
console.log("''''''Database queries time usage: <?= $dbDuration ?>s <?= str_repeat("'", 63-strlen((string)$dbDuration)) ?>");
console.log("''''''Memory: <?= UniversalFunctions::humanize(memory_get_peak_usage()) ?>s <?= str_repeat("'", 84-strlen(UniversalFunctions::humanize(memory_get_peak_usage()))) ?>");
console.log("''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''");
<?php endif; ?>

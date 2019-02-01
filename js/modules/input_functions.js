<?php
header("Content-Type: application/javascript; charset=UTF-8", true);

define("ROOTDIR", "../../");
define("REAL_ROOTDIR", "../../");

define("NO_SESSION", true);

require_once REAL_ROOTDIR."src/initializer.php";
use \WeTheFuture\API\ErrorCodes;

$errors = ErrorCodes::getAssoc();

?>
function markInputInvalid(e, a) {
	if ($(e).length == 0) {
		window.log(<?= json_encode(basename(__FILE__)) ?>, "markInputInvalid - called but no elements were given!", true);
		return;
	}
	if ($(e).hasClass("g-recaptcha")) {
		window.log(<?= json_encode(basename(__FILE__)) ?>, "markInputInvalid - CAPTCHA invalidation has been delegated to markCaptchaInvalid");
		markCaptchaInvalid(a);
	} else if ($(e).attr("type") == "checkbox") {
		window.log(<?= json_encode(basename(__FILE__)) ?>, "markInputInvalid - invalid element ("+$(e).attr("id")+") was a checkbox, treating as such");

		$(e).addClass("invalid").addClass("marked-invalid").focus();
		
		var labelSpan = $(e).next();
		if ($(labelSpan).attr("data-original") === undefined) {
			$(labelSpan).attr("data-original", $(labelSpan).text());
		}
		// restore original text (if applicable)
		$(labelSpan).text($(labelSpan).attr("data-original"));
		var errorSpan = $("<span></span>").text(a);
		errorSpan.html("&nbsp;("+errorSpan.html()+")");
		errorSpan.addClass("red-text");
		$(labelSpan).append(errorSpan);
	} else {
		window.log(<?= json_encode(basename(__FILE__)) ?>, "markInputInvalid - invalid element ("+$(e).attr("id")+") treated as a generic form element");

		$(e).addClass("invalid").addClass("marked-invalid").focus();
		$("label[for="+$(e).attr("id")+"]").addClass("active");
		// add helper text if it doesn't exist, BC
		if ($("span.helper-text[for="+$(e).attr("id")+"]").length == 0) {
			$(e).parent().append($("<span></span>").addClass("helper-text").attr("for", $(e).attr("id")));
		}
		$("span.helper-text[for="+$(e).attr("id")+"]").attr("data-error", a);
	}
}

function markCaptchaInvalid(a) {
	window.log(<?= json_encode(basename(__FILE__)) ?>, "markCaptchaInvalid - calling grecaptcha.reset()");

	$(".g-recaptcha").attr("data-error", a).addClass("invalid").removeClass("valid");
	grecaptcha.reset();
}
function markCaptchaValid() {
	window.log(<?= json_encode(basename(__FILE__)) ?>, "markCaptchaValid - invoked, applying valid class to CAPTCHA");

	$(".g-recaptcha").addClass("valid").removeClass("invalid");
}

function showErrorMessageForCode(c) {
	window.log(<?= json_encode(basename(__FILE__)) ?>, "showErrorMessageForCode - called for error code "+c);

	switch (c) {
<?php foreach ($errors as $code => $message): ?>
		case <?= $code ?>:
			M.escapeToast(<?= json_encode($message) ?>, 4000);
			break;
<?php endforeach; ?>
		default:
			M.escapeToast("An unknown error occured", 4000);
	}
}
function updateUploadIndicator(f, e) {
	window.log(<?= json_encode(basename(__FILE__)) ?>, "updateUploadIndicator - an upload (f="+f+") on this page has reached "+((e.loaded*100)/e.total)+"% completion");

	$(f+" .indeterminate").removeClass("indeterminate").addClass("determinate");
	$(f+" .determinate").css("width", ((e.loaded*100)/e.total)+"%");
	if (e.loaded == e.total) {
		window.log(<?= json_encode(basename(__FILE__)) ?>, "updateUploadIndicator - an upload (f="+f+") has completed.  Removing determinate progress.");
		$(f+" .determinate").addClass("indeterminate").removeClass("determinate").attr("style", "");
	}
}

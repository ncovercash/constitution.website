<?php
use \WeTheFuture\Controller;
use \WeTheFuture\Page\{Resources, UniversalFunctions, Values};

Resources::pushPageResources();
?>
<!DOCTYPE html>
<html data-rootdir="<?= ROOTDIR ?>" lang="en">
	<head>
		<meta charset="utf-8" /><!-- must be in the first 1024 bytes yada yada -->

		<title>
			<?= htmlspecialchars(PAGE_TITLE) ?> | <?= Values::ROOT_TITLE ?> 
		</title>

<?php foreach (Resources::getStyles() as $style): ?>
		<link href="<?= $style[0] ?>" <?= implode(" ", array_slice($style, 1)) ?> rel="stylesheet" />
<?php endforeach; ?>

		<meta content="width=device-width, initial-scale=1, maximum-scale=1.0" name="viewport" />
		<meta name="description" content="Noah Overcash's entry into the We the Future scholarship contest led by Constituting America"/>
		<meta name="keywords" content="constitution"/>
		<meta name="subject" content="constitution, scholarship, site"/>
		<meta name="copyright" content="Noah Overcash"/>
		<meta name="language" content="EN"/>
		<meta name="robots" content="index,follow"/>
		<meta name="Classification" content="Academic"/>
		<meta name="author" content="Noah Overcash, smileytechguy@smileytechguy.com"/>
		<meta name="designer" content="Noah Overcash"/>
		<meta name="reply-to" content="smileytechguy@smileytechguy.com"/>
		<meta name="theme-color" content="#<?= PAGE_COLOR ?>"/>

		<!-- Apple -->
		<meta name="apple-mobile-web-app-title" content="Noah Overcash's Entry"/>
		<meta name="apple-mobile-web-app-capable" content="yes"/>
		<meta name="apple-touch-fullscreen" content="yes"/>
		<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
		<meta name="format-detection" content="telephone=no"/>
		<link href="https://constitution.website/img/logo_small.png" rel="apple-touch-icon" type="image/png"/>
		<link href="https://constitution.website/img/logo_small.png" rel="apple-touch-icon-precomposed" type="image/png"/>
		<link href="https://constitution.website/img/logo_small.png" rel="apple-touch-icon" type="image/png"/>
		<link href="https://constitution.website/img/logo_small.png" rel="apple-touch-icon-precomposed" type="image/png"/>
		<link rel="mask-icon" href="https://constitution.website/img/logo/mask.svg" color="#<?= PAGE_COLOR ?>"/>

		<!-- IE -->
		<meta name="msapplication-tooltip" content="Noah Overcash Constituting America We the Future Contest Entry"/>
		<meta name="mssmarttagspreventparsing" content="true"/>
		<meta name="msapplication-starturl" content="https://constitution.website/"/>
		<meta name="msapplication-window" content="width=800;height=600"/>
		<meta name="msapplication-navbutton-color" content="red"/>
		<meta name="application-name" content="Noah Overcash Entry"/>

		<!-- win 8+ -->
		<meta name="application-name" content="Noah Overcash Entry"/>
		<meta name="msapplication-TileColor" content="#<?= PAGE_COLOR ?>"/>
		<meta name="msapplication-square70x70logo" content="<?= ROOTDIR ?>img/logo_small.png"/>

		<!-- opengraph -->
		<meta property="og:title" content="<?= htmlspecialchars(PAGE_TITLE) ?>"/>
		<meta property="og:type" content="academic.academic"/>
		<meta property="og:url" content="<?= htmlspecialchars(UniversalFunctions::getCanonicalRequestUrl()) ?>"/>
		<meta property="og:image" content="https://constitution.website/img/logo_small.png"/>
		<meta property="og:image:url" content="https://constitution.website/img/logo_small.png"/>
		<meta property="og:description" content="Noah Overcash's entry into the We the Future scholarship contest by Constituting America"/>
		<meta property="og:site_name" content="Noah Overcash"/>
		<meta property="og:locale" content="en_US"/>

		<!-- twitter -->
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:site" content="<?= htmlspecialchars(UniversalFunctions::getCanonicalRequestUrl()) ?>" />
		<meta name="twitter:title" content="<?= htmlspecialchars(PAGE_TITLE) ?> | Noah Overcash Entry" />
		<meta name="twitter:description" content="Noah Overcash's entry into the We the Future scholarship contest by Constituting America" />
		<meta property="twitter:image" content="https://constitution.website/img/logo_large.png"/>

		<!-- link tags -->
		<link rel='shortcut icon' type='image/png' href='https://constitution.website/img/logo_small.png'/>
		<link rel='fluid-icon' type='image/png' href='https://constitution.website/img/logo_small.png'/>
		<link rel="canonical" href="<?= htmlspecialchars(UniversalFunctions::getCanonicalRequestUrl()) ?>"/>
		<link rel="image_src" href="https://constitution.website/img/logo_small.png" type="image/png"/>
	</head>
	<body>
		<?php require REAL_ROOTDIR."src/Page/Navigation/navbar.inc.php"; ?> 
		<div class="container">
			<div class="news">
				<p class="no-margin">
					<span class="flow-text">
						<strong>Welcome to Noah Overcash's We the Future Contest entry!</strong>
					</span>
				</p>
				<p class="no-margin">
					All areas of the site should be fully functional!  If you have any questions, or experience any errors, do not hesitate to contact me at <a href="mailto:smileytechguy@smileytechguy.com">smileytechguy@smileytechguy.com</a>.
				</p>
			</div>
			<?php if (PAGE_TITLE != Values::EMAIL_VERIFICATION[1] && isset($_SESSION["user"]) && !$_SESSION["user"]->isEmailVerified() && !is_null($_SESSION["user"]->getEmail())): ?>
				<div class="warning">
					<p class="no-margin flow-text">
						Please verify your email <strong><?= htmlspecialchars($_SESSION["user"]->getEmail()) ?></strong>.
					</p>
					<p class="no-margin">
						Click the link in your verification email.  If you have not received the email or the email is incorrect, please go <a href="<?=ROOTDIR?>EmailVerification">here</a>.
					</p>
				</div>
			<?php endif; ?>

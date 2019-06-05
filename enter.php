<?php
session_start();
ini_set("display_errors", 1);
error_reporting(E_ALL);
date_default_timezone_set("Europe/Kiev");
?>
<!DOCTYPE html><html>
<head>
	<link rel="stylesheet" type="text/css" href="application/views/layouts/index.css">
	<link rel="stylesheet" type="text/css" href="application/views/layouts/style.css">
	<title></title>
</head>
<body>
	<div class="header">
		<div class="inner-header">

		</div>
	</div>
	<main class="main">
		<form name="registration" action="application/views/account/sign-up.html">
			<button name="submit" type="submit" value="OK">SIGN-UP</button>
		</form>
		<br>
		<form name="enter" action="application/views/account/enter.html">
			<button name="submit" type="submit" value="OK">ENTER</button>
		</form>
		<br>
		<form name="authorization" action="application/views/account/sign-in.html">
			<button name="submit" type="submit" value="OK">SIGN-IN</button>
		</form>
		<br>
		<form name="update-pass" action="application/views/account/update-pass.html">
			<button name="submit" type="submit" value="OK">UPDATE-PASS</button>
		</form>
		<br>
		<form name="forgot-pass" action="application/views/account/forgot-pass.html">
			<button name="submit" type="submit" value="OK">FORGOT-PASS</button>
		</form>
		<br>
		<form name="photo-list" action="application/views/account/photo-list.html">
			<button name="submit" type="submit" value="OK">PHOTO-LIST</button>
		</form>
		<br>
	</main>
	<script type="text/javascript" src="application/models/index.js">
	</script>
	<footer>
		<div class="footer">
			<ul>
				<li><a  href="https://github.com/ggavryly" target="blank"><img id="github_logo" src="application/views/layouts/style-images/github-512.png"></a></li>
				<li><a href="https://www.instagram.com/gena_torgo_/?hl=uk" target="blank"><img id="instagram_logo" src="application/views/layouts/style-images/instagram-512.png"></a></li>
				<li><a href="https://profile.intra.42.fr/users/ggavryly" target="blank"><img id="intra_logo" src="application/views/layouts/style-images/logo_42.png"></a></li>
			</ul>
		</div>
	</footer>
</body>
</html>

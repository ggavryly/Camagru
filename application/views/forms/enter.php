<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Enter</title>
	<link rel="stylesheet" type="text/css" href="../../../public/styles/style.css">
	<link rel="stylesheet" type="text/css" href="../../../public/styles/enter.css">
</head>
<body>
<section>
	<div class="header">
		<div class="inner-header">
			<a href="https://localhost:8443/Camagru/application/views/forms/photo-list.php"><img id="camagru_logo" src="../../../public/styles/style-images/camagru.png"></a>
			<div class="head_ic">
				<a href="https://localhost:8443/Camagru/application/views/forms/profile.php"><img id="profile" src="../../../public/styles/style-images/profile.png"></a>
				<a href="https://localhost:8443/Camagru/application/core/logout.php"><img id="logout" src="../../../public/styles/style-images/exit.png"></a>
			</div>
		</div>
	</div>
</section>
<section class="main">
	<div class="block-modal">
		<div class="form-slider">
			<div class="left-33">
				<div class="reset-form">
					<form id="Left_form" method="POST" action="">
						<fieldset>
							<span id="Left_title">Forgot Password</span><span  id="Left_back" class="number" onclick="backTransition()">></span>
							<input id="Left_field_email" type="email" name="email" placeholder="Type Your Email *">
						</fieldset>
						<input type="button" value="Reset Password" id="Left_reset" onclick="resetPassword()"/>
					</form>
				</div>
			</div>
			<div class="alert"></div>
			<div class="center-33">
				<div class="enter-form">
					<form id="Center_form" action="" method="POST">
						<fieldset>
							<span id="Center_title">Enter To Camagru</span>
							<br>
							<input id="Center_field_login" type="text" name="login" placeholder="Your Login *">
							<input id="Center_field_pass" type="password" name="pass" placeholder="Your Password *"><input type="button" id='Center_forgot' value="Forgot?" onclick="leftTransition()">
						</fieldset>
						<input type="button" value="Sign-In" id="Center_sign-in" onclick="signIn()" /><input type="button" id ="Center_sign-up" value="Sign-Up" onclick="rightTransition()">
					</form>
				</div>
			</div>
			<div class="right-33">
				<div class="register-form">
					<form id="Right_form" method="POST" action="" onsubmit="">
						<span id="Right_title">Registration</span><span id="Right_back" class="number" onclick="backTransition()"><</span>
						<input id="Right_field_login" type="text" name="login" autocomplete="username"  placeholder="Your Login *">
						<input id="Right_field_pass" type="password" name="pass" autocomplete="current-password" placeholder="Your Password *">
						<input id="Right_field_email" type="email" name="email"  placeholder="Your Email *">
						<input type="button" value="Sign-Up" id="Right_sign-up" onclick="signUp(this)"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="side">
</section>
<footer>
	<div class="footer">
		<ul>
			<li><a href="https://github.com/ggavryly" target="blank"><img id="github_logo" src="../../../public/styles/style-images/github-512.png"></a></li>
			<li><a href="https://www.instagram.com/gena_torgo_/?hl=uk" target="blank"><img id="instagram_logo" src="../../../public/styles/style-images/instagram-512.png"></a></li>
			<li><a href="https://profile.intra.42.fr/users/ggavryly" target="blank"><img id="intra_logo" src="../../../public/styles/style-images/logo_42.png"></a></li>
		</ul>
	</div>
</footer>
<?php
	session_start();
	if (isset($_SESSION['log']))
	{
		header("Location: photo-list.php");
	}
?>
<script type="text/javascript" src="../../models/enter.js"></script>
</body>
</html>
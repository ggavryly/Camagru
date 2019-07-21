<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Photo-list</title>
	<link rel="stylesheet" type="text/css" href="../../../public/styles/style.css">
	<link rel="stylesheet" type="text/css" href="../../../public/styles/photo-list.css">
</head>
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
<body>
<section class="main">
	<div class="main_list">

	</div>
	<div class="modal_win">

	</div>
</section>
<section class="side">

</section>
<footer>
	<div class="footer">
		<ul>
			<li><a href="https://github.com/ggavryly" target="blank"><img id="github_logo" src="../../../public/styles/style-images/github-512.png"></a>
			</li>
			<li><a href="https://www.instagram.com/gena_torgo_/?hl=uk" target="blank"><img id="instagram_logo" src="../../../public/styles/style-images/instagram-512.png"></a>
			</li>
			<li><a href="https://profile.intra.42.fr/users/ggavryly" target="blank"><img id="intra_logo" src="../../../public/styles/style-images/logo_42.png"></a>
			</li>
		</ul>
	</div>
</footer>
<?php
	include_once ("../../config/database.php");
	include_once ("../../controllers/AccountController.class.php");
	session_start();
	if (!isset($_SESSION['log']))
	{
		header("Location: login.php");
	}
?>
</body>
</html>
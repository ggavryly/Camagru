<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Photo-booth</title>
    <link rel="stylesheet" type="text/css" href="../../../public/styles/style.css">
    <link rel="stylesheet" type="text/css" href="../../../public/styles/photo-booth.css">
</head>
<body>
<section>
    <div class="header">
        <div class="inner-header">
            <a href="https://localhost:8443/Camagru/application/views/layouts/photo-list.html"><img id="camagru_logo" src="../../../public/styles/style-images/camagru.png"></a>
            <div class="head_ic">
                <a href="https://localhost:8443/Camagru/application/views/layouts/profile.html"><img id="profile" src="../../../public/styles/style-images/profile.png"></a>
                <a href="https://localhost:8443/Camagru/application/core/logout.php"><img id="logout" src="../../../public/styles/style-images/exit.png"></a>
            </div>
        </div>
    </div>
</section>
<section class="main">
	<div class="edit-make">
		<div class="wrapper" onclick="modeChange()">
			<input type="checkbox" id="checkbox">
			<label for="checkbox"></label>
		</div>
		<div class="select">
			<select class="option" onchange="editPicture()">
				<option>batyka</option>
				<option>doge</option>
				<option>pepe</option>
				<option>thug-life</option>
				<option selected>ukraine</option>
			</select>
		</div>
		<div class="camera">
			<video class="Left_video" autoplay>No video</video>
			<button class="Button_camera" onclick="makePicture()">Snap Photo</button>
			<form id="upload_image" enctype="multipart/form-data">
				<canvas class="hide Left_edit"></canvas>
			</form>
		</div>
		<div class="photos">

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
	if (!isset($_SESSION["log"]))
	{
		header("Location: enter.php");
	}
?>
<script type="text/javascript" src="../../models/photo-booth.js"></script>
</body>
</html>
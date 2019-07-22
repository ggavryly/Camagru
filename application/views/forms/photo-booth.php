<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Camagru</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
	<link rel="stylesheet" href="../../../public/styles/photo-booth.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
</head>
<body>
<section class="hero is-dark is-fullheight">
	<nav class="navbar is-dark is-medium">
		<div class="container">
			<div class="navbar-brand">
				<a class="navbar-item" href="../../../index.php">Camagru</a>
				<span class="navbar-burger burger" data-target="navMenu">
					<span></span>
					<span></span>
					<span></span>
            	</span>
			</div>
			<div id="navMenu" class="navbar-menu">
				<div class="navbar-end">
					<a class="navbar-item" href="../../../index.php">Home</a>
					<a class="navbar-item" href="profile.php">Profile</a>
					<a class="navbar-item" href="photo-list.php">Photo-list</a>
					<a class="navbar-item" href="../../core/logout.php">Log out</a>
				</div>
			</div>
		</div>
	</nav>
	<div class="hero-body">
		<div class="container">
			<div id="please-conf-email" class="notification is-warning" style="display: none; width: 200px">
				Please confirm your email<button  onclick="hideNotificationPCE()" class="delete"></button>
			</div>
			<div class="columns is-5-tablet is-4-desktop is-3-widescreen">
				<div class="column is-three-fifths">
					<div class="box has-text-centered">
						<div id="box_video" class="box" style="position: relative">
							<video id="video" style="width: 100%">No video</video>
						</div>
						<div class="columns is-centered" style="width: 90%">
							<figure class="image is-64x64" onclick="selectOverlay('batyka', 70,70)">
								<img src="../../../public/images/batyka.png">
							</figure>
							<figure class="image is-64x64" onclick="selectOverlay('doge', 10, 70)">
								<img src="../../../public/images/doge.png">
							</figure>
							<figure class="image is-64x64" onclick="selectOverlay('pepe', 10, 20)">
								<img src="../../../public/images/pepe.png">
							</figure>
							<figure class="image is-64x64" onclick="selectOverlay('thug-life', 40, 40)">
								<img src="../../../public/images/thug-life.png">
							</figure>
							<figure class="image is-64x64" onclick="selectOverlay('ukraine', 70, 20)">
								<img src="../../../public/images/ukraine.png">
							</figure>
						</div>
						<button class="button is-success is-icon-left" onclick="makePicture()">Snap photo</button>
					</div>
				</div>
				<div class="column is-two-fifths">
					<div class="box has-text-centered" style="overflow-y: hidden;">
						<button class="button is-success" style="margin-bottom: 15px" onclick="uploadPhoto()">Upload photo</button>
						<figure class="image picture ">
							<img id="photo" src="../../../public/styles/style-images/no-photo.png">
						</figure>
						<div class="file">
							<label class="file-label" style="" id="id_test">
								<input id="choose_file" class="file-input" type="file" name="resume" value="kopa">
								<span class="file-cta">
									<span class="file-icon">
										<i class="fas fa-upload"></i>
									</span>
									<span class="file-label">
        								Choose a file…
      								</span>
   							 </span>
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
    let burger = document.querySelector(".burger");
    let nav = document.querySelector("#"+burger.dataset.target);
    burger.addEventListener("click", function () {
        burger.classList.toggle("is-active");
        nav.classList.toggle("is-active");
    })
</script>
<?php
session_start();
if (!isset($_SESSION["log"]))
{
	header("Location: login.php");
}
?>
<script src="../../models/photo-booth.js"></script>
</body>
</html>
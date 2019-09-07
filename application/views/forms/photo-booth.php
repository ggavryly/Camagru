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
					<a href="profile.php" class="navbar-item">Profile</a>
					<a href="photo-list.php" class="navbar-item">Photo-list</a>
					<p class="navbar-item"  onclick="deleteCookie()" style="color: white">Log out</p>
				</div>
			</div>
		</div>
	</nav>
	<div class="hero-body">
		<div class="container">
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
						<div class="file" style="padding-left: 30%">
							<label class="file-label" style="" id="id_test">
								<input id="choose_file" class="file-input" type="file" name="resume" onchange="chooseFile();">
								<span class="file-cta" style="position: relative; ">
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
<script src="../../models/useful.js"></script>
<script>
    let burger = document.querySelector(".burger");
    let nav = document.querySelector("#"+burger.dataset.target);
    burger.addEventListener("click", function () {
        burger.classList.toggle("is-active");
        nav.classList.toggle("is-active");
    })
</script>
<script>
	function getCookie(name) {
		let matches = document.cookie.match(new RegExp(
			"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
		));
		return matches ? decodeURIComponent(matches[1]) : 0;
	}
	if (getCookie("login") === 0)
	{
		document.location.href = "login.php";
	}
</script>
<script src="../../models/photo-booth.js"></script>
</body>
</html>
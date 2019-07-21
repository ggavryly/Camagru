<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Camagru</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
	<link rel="stylesheet" href="../../../public/styles/photo-list.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
</head>
<body>
<section class="hero is-dark is-fullheight">
	<nav class="navbar is-dark is-medium">
		<div class="container">
			<div class="navbar-brand">
				<a class="navbar-item" href="#">Camagru</a>
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
					<a class="navbar-item" href="photo-booth.php">Photo-booth</a>
					<a class="navbar-item" href="../../core/logout.php">Log out</a>
				</div>
			</div>
		</div>
	</nav>
	<div class="hero-body">
		<div class="container">
			<div class="columns is-5-tablet is-4-desktop is-3-widescreen">
				<div class="column is-two-thirds">
					<div id="list" class="box" style="max-height: 700px; overflow-y: scroll">
						<div class="box" style="">
							<h5 class="title is-5" style="color:black">Title 5</h5>
							<figure class="image is-1by1">
								<img src="https://bulma.io/images/placeholders/256x256.png">
							</figure>
							<button class="button is-info">Comment</button>
							<span class="icon" style="float:right">
  								<i class="far fa-heart"></i>
							</span>
						</div>
					</div>
				</div>
				<div class="column is-one-third">
					<div class="box" style="display:;max-height: 500px; overflow-y: scroll">
						<textarea id="comment" class="textarea" placeholder="Add comment"></textarea>
						<button id="submit-comment" class="button is-info">Submit</button>
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
<script src="../../models/photo-list.js"></script>
</body>
</html>
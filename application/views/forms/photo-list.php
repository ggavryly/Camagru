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
				<a class="navbar-item" href="../../../index.php">Camagru</a>
				<span class="navbar-burger burger" data-target="navMenu">
					<span></span>
					<span></span>
					<span></span>
            	</span>
			</div>
			<div id="navMenu" class="navbar-menu">
				<div class="navbar-end">
					<a class="navbar-item" href="profile.php" >Profile</a>
					<a class="navbar-item" href="photo-booth.php" >Photo-booth</a>
					<p class="navbar-item"  onclick="deleteCookie()" style="color: white">Log out</p>
				</div>
			</div>
		</div>
	</nav>
	<div class="hero-body" id="body">
		<div class="container">
			<div class="columns is-5-tablet is-4-desktop is-3-widescreen">
				<div class="column is-two-thirds">
					<div id="list" class="box is-dark" style="max-height: 700px; overflow-y: scroll;">
					</div>
				</div>
				<div id="post_comment" class="column is-one-third " style="display: none">
					<div class="box" style="max-height: 700px;overflow-y: scroll">
						<div class="box">
							<h5 id="comment_login" class="title is-5" style="color:black">Title 5</h5>
							<figure class="image is-1by1">
								<img id="comment_img" src="https://bulma.io/images/placeholders/256x256.png">
							</figure>
						</div>
						<div id="comments" class="box" style="max-height: 250px;overflow-y: scroll">
							<h5 class="title is-5" style="color:black">Comments</h5>
						</div>
						<textarea id="textarea" class="textarea" placeholder="Add a comment..."></textarea>
						<button id="comment_button" class="button is-info" style="margin: 10px 10px 10px 0" onclick="addComment()">Comment</button>
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
<script src="../../models/photo-list.js"></script>
</body>
</html>
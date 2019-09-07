<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Camagru</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
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
					<a href="photo-list.php" class="navbar-item" >Photo-list</a>
					<a href="photo-booth.php" class="navbar-item" >Photo-booth</a>
					<p class="navbar-item" onclick="deleteCookie()" style="color: white">Log out</p>
				</div>
			</div>
		</div>
	</nav>
	<div class="hero-body">
		<div class="container">
			<div class="columns is-5-tablet is-4-desktop is-3-widescreen">
				<div class="column is-full">
					<div class="box">
						<div class="box">
							<div class="control">
								<input id="login" class="input" type="text" value="Your current login: " readonly>
							</div>
						</div>
						<div class="box">
							<div class="control">
								<input id="email" class="input" type="text" value="Your current email: " readonly>
							</div>
						</div>
						<div class="box">
							<div class="control">
								<input id="notifications" class="input" type="text" value="Notification: " readonly>
							</div>
						</div>
						<div class="box" style="text-align: center; width: 100%">
							<button class="button is-info" style="width: 20%" onclick="editLogin()">Edit login</button>
							<button class="button is-info" style="width: 20%" onclick="editPass()">Edit password</button>
							<button class="button is-info" style="width: 20%" onclick="editEmail()">Edit email</button>
							<button class="button is-info" style="width: 20%" onclick="editNotification()">Edit notifications</button>
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
<script src="../../models/profile.js"></script>
</body>
</html>
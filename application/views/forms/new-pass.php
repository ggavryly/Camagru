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
				<div id="navbar-menu" class="navbar-end">
					<a class="navbar-item" href="photo-list.php">Photo-list</a>
					<a class="navbar-item" href="login.php">Sign-in</a>
					<a class="navbar-item" href="sign-up.php">Sign-up</a>
				</div>
			</div>
		</div>
	</nav>
	<div class="hero-body">
		<div class="container">
			<div class="columns is-5-tablet is-4-desktop is-3-widescreen">
				<div class="column">
					<form class="box" onsubmit="return false">
						<div class="field">
							<label class="label">Enter new password</label>
							<div class="control has-icons-left">
								<input id="new_passe" type="password" class="input" placeholder="New password" required>
								<span class="icon is-small is-left">
                                        <i class="fas fa-envelope"></i>
                                    </span>
							</div>
							<br>
						</div>
						<div class="field">
							<button class="button is-success" onclick="new_pass()">Sent</button>
						</div>
					</form>
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
	});
	if (!getCookie("forgot"))
	{
		let get_id = window.location.href.match(/=([^&]*)/)[1];
		let get_login = window.location.href.match(/login=(.*)/)[1];
		let now = new Date();
		now.setMonth( now.getMonth() + 1 );
		document.cookie = "login = " + escape(get_login)+"; " + "expires=" + now.toUTCString() + ";";
		document.cookie = "id_user = " + escape(get_id)+"; " + "expires=" + now.toUTCString() + ";";
		document.cookie = "forgot = 1;expires=" + now.toUTCString() + ";";
	}
</script>
<script src="../../models/enter.js"></script>
</body>
</html>
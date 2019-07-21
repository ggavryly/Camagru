<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Photo-booth</title>
<!--    <link rel="stylesheet" type="text/css" href="../../../public/styles/style.css">-->
<!--    <link rel="stylesheet" type="text/css" href="../../../public/styles/photo-booth.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
</head>
<body>
<!--<section>-->
<!--    <div class="header">-->
<!--        <div class="inner-header">-->
<!--            <a href="https://localhost:8443/Camagru/application/views/forms/photo-list.php"><img id="camagru_logo" src="../../../public/styles/style-images/camagru.png"></a>-->
<!--            <div class="head_ic">-->
<!--                <a href="https://localhost:8443/Camagru/application/views/forms/profile.php"><img id="profile" src="../../../public/styles/style-images/profile.png"></a>-->
<!--                <a href="https://localhost:8443/Camagru/application/core/logout.php"><img id="logout" src="../../../public/styles/style-images/exit.png"></a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!--<section class="main">-->
<!--    <div class="camera">-->
<!---->
<!--    </div>-->
<!--    <div class="overlays">-->
<!--        <img class="overlay" alt="batyka" src="../../../public/images/batyka.png"></div>-->
<!--    <img class="overlay" src="../../../public/images/doge.png">-->
<!--    <img class="overlay" src="../../../public/images/pepe.png">-->
<!--    <img class="overlay" src="../../../public/images/thug-life.png">-->
<!--    <img class="overlay" src="../../../public/images/ukraine.png">-->
<!--    </div>-->
<!--</section>-->
<!--<section class="side">-->
<!---->
<!--</section>-->
<!--<footer>-->
<!--    <div class="footer">-->
<!--        <ul>-->
<!--            <li><a href="https://github.com/ggavryly" target="blank"><img id="github_logo" src="../../../public/styles/style-images/github-512.png"></a></li>-->
<!--            <li><a href="https://www.instagram.com/gena_torgo_/?hl=uk" target="blank"><img id="instagram_logo" src="../../../public/styles/style-images/instagram-512.png"></a></li>-->
<!--            <li><a href="https://profile.intra.42.fr/users/ggavryly" target="blank"><img id="intra_logo" src="../../../public/styles/style-images/logo_42.png"></a></li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</footer>-->
<section class="hero is-dark bold">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Camagru
            </h1>
            <h2 class="subtitle">
                Your kaka project
            </h2>
        </div>
    </div>
</section>
<footer class="footer">
    <div class="content has-text-centered">
        <p>
            <strong>Bulma</strong> by <a href="https://jgthms.com">Jeremy Thomas</a>. The source code is licensed
            <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
            is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
        </p>
    </div>
</footer>
<?php
	session_start();
	if (!isset($_SESSION["log"]))
	{
		header("Location: login.php");
	}
?>
</body>
</html>
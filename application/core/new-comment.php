<?php
include_once("../controllers/AccountController.class.php");
include_once("../controllers/DatabaseController.class.php");
include_once("../../config/database.php");
ini_set("display_errors", 1);
error_reporting(E_ALL);
date_default_timezone_set("Europe/Kiev");
session_start();
if (isset($_SESSION["login:".$_POST['login']]))
{
	print_r("kek");
	$data = array();
	$DH = new DatabaseController();
	print_r($_SESSION["login:".$_POST['login']]);
	$DH->new_comment($_SESSION["login:".$_POST['login']], $_POST["id_post"], $_POST["comment"]);
	if ($DH->notification($_POST["id_user"]))
	{
		$encoding = "utf-8";
		$subject_preferences = array(
			"input-charset" => $encoding,
			"output-charset" => $encoding,
			"line-length" => 76,
			"line-break-chars" => "\r\n"
		);
		$result = $_POST['id_user'];
		$encrypt = md5(66 * 6 + $result);
		$subject = "Like in camagru";
		$to = $DH->get_email($_POST["id_user"], "id");
		$from = "no-reply";
		$body = "Salute cowboy,<br>Your post is comment by {$_POST['login']} <hr>";
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Transfer-Encoding: 8bit \r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$headers .= "Date: ".date("r (T)")." \r\n";
		$headers .= "From: Camagru <noreply@camagru.com>\r\n";
		$headers .= "Reply-To: ".strip_tags($from)."\r\n";
		mail($to, $subject, stripslashes($body), $headers);
	}
}
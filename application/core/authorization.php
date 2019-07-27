<?php
include_once("../controllers/AccountController.class.php");
include_once("../controllers/DatabaseController.class.php");
include_once("../../config/database.php");
ini_set("display_errors", 1);
error_reporting(E_ALL);
date_default_timezone_set("Europe/Kiev");
$AH = new AccountController();
$result = $AH->authorization($_POST['name'], hash('whirlpool' ,$_POST['pass']));
if ($result["response"] == 1)
{
	$DH = new DatabaseController();
	$data = array();
	$data = $result;
	session_start();
	$_SESSION["login:".$_POST['name']] = $DH->get_id_user($_POST['name'], "login");
	echo json_encode($result);
}
else
{
	echo json_encode($result);
}
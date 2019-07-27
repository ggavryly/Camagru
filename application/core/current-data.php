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
	$DH = new DatabaseController();
	$result = $DH->get_user_data($_POST["login"]);
    echo json_encode($result);
}
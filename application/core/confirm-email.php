<?php
include_once("../controllers/AccountController.class.php");
include_once("../controllers/DatabaseController.class.php");
include_once("../../config/database.php");
ini_set("display_errors", 1);
error_reporting(E_ALL);
date_default_timezone_set("Europe/Kiev");
if ($_GET['action'] === "confirm")
{
    $AH = new AccountController();
    $id = $AH->encrypt_id($_GET['cr']);
    $AH->validate_email($id);
    $DH = new DatabaseController();
    session_start();
	$_SESSION["login:".$_POST['name']] = $DH->get_id_user($_POST['name'], "login");
    header("Location: ../views/forms/login.php");
}
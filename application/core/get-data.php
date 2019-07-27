<?php
include_once("../controllers/AccountController.class.php");
include_once("../controllers/DatabaseController.class.php");
include_once("../../config/database.php");
ini_set("display_errors", 1);
error_reporting(E_ALL);
date_default_timezone_set("Europe/Kiev");
session_start();
if (isset($_POST['mode']))
{
	$data = array();
	$AH = new AccountController();
	if ($_POST['mode'] == "1")
	{
		$data = $AH->load_images();
	}
	else if ($_POST['mode'] == "2")
	{
		$data = $AH->load_comments($_POST['id_post']);
	}
	echo json_encode($data);
}
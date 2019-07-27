<?php
include_once("../controllers/AccountController.class.php");
include_once("../controllers/DatabaseController.class.php");
include_once("../../config/database.php");
ini_set("display_errors", 1);
error_reporting(E_ALL);
date_default_timezone_set("Europe/Kiev");
if (isset($_POST))
{
	$DH = new DatabaseController();
	$data = array();
	foreach ($_POST as $key => $elem)
	{
		$data[] = $DH->get_login($elem, "id");
	}
	echo json_encode($data);
}
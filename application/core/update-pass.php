<?php
include_once("../controllers/AccountController.class.php");
include_once("../controllers/DatabaseController.class.php");
include_once("../../config/database.php");
ini_set("display_errors", 1);
error_reporting(E_ALL);
date_default_timezone_set("Europe/Kiev");
session_start();
if ($_GET['action'] === "reset")
{
	$AH = new AccountController();
	$DH = new DatabaseController();
	$id_user = $AH->encrypt_id($_GET['cr']);
	if ($id_user)
	{
		$login = $DH->get_login($id_user, "id");
		$_SESSION['login:'.$login] = $id_user;
		header("Location: ../views/forms/new-pass.php?id=".$id_user."&"."login=".$login);
	}
	else
    {
        echo "ERROR";
    }
}

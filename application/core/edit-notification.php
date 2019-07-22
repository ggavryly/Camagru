<?php
include_once ("../config/include.php");
session_start();
if ($_SESSION["log"])
{
	$AH = new AccountController();
	$DH = new DatabaseController();
	$DH->edit_notification($DH->get_id_user($_SESSION["login"], "login"));
}
<?php
require_once ("../config/include.php");
session_start();
if ($_SESSION["log"] == 1)
{
	$DH = new DatabaseController();
	$result = $DH->get_user_data($_SESSION["login"]);
    echo json_encode($result);
}
else
{
	header("Location: ../views/forms/login.php");
}
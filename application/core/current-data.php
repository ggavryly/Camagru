<?php
require_once ("../config/include.php");
session_start();
print_r($_SESSION);
if ($_SESSION["log"] == 1)
{
	$DH = new DatabaseController();
	$DH->get_user_data($_SESSION["login"]);
}
else
{
	header("Location: ../views/forms/enter.php");
}
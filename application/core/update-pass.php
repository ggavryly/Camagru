<?php
require_once ("../config/include.php");
session_start();
if ($_GET['action'] === "reset" && isset($_SESSION))
{
	$AH = new AccountController();
	$DH = new DatabaseController();
	$id_user = $AH->encrypt_id($_GET['cr']);
	if ($id_user)
	{
		$login = $DH->get_login($id_user, "id");
		$_SESSION['log'] = 1;
		$_SESSION['login'] = $login;
		header("Location: ../views/forms/profile.php?");
	}
	else
    {
        echo "ERROR";
    }
}

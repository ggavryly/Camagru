<?php
require_once ("../config/include.php");
session_start();
if ($_GET['action'] === "reset")
{
	$AH = new AccountController();
	$DH = new DatabaseController();
	$id_user = $AH->encrypt_id($_GET['cr']);
	if ($id_user)
	{
		$login = $DH->get_login($id_user, "id");
		$_SESSION['log'] = 1;
		$_SESSION['login'] = $login;
		header("Location: ../views/forms/profile.php?action=reset-pass");
	}
	else
    {
        echo "ERROR";
    }
}
if ($_POST['action'] === "update")
{
	if ($_POST["old-pass"] && $_POST["new-pass"] && $_POST["submit"] && $_POST["submit"] === "OK") {
		if ($_SESSION['log'] == '1') {
			$AH = new AccountController();
			$AH->new_password(hash("whirlpool", $_POST['old-pass']), hash("whirlpool", $_POST['new-pass']), $_SESSION['login']);
			//		$_SESSION['user']->test();
		}
		//	 else
		//	 	header("Location: ../views/account/sign-in.html");
	} else {
		echo "NOP";
	}
}

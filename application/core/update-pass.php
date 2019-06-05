<?php
include_once ("../controllers/AccountController.class.php");
session_start();
if ($_POST["old-pass"] && $_POST["new-pass"] && $_POST["submit"] && $_POST["submit"] === "OK")
{
	if ($_SESSION['log'] == '1')
	{
		$AH = new AccountController();
		$AH->new_password(hash("whirlpool" , $_POST['old-pass']), hash("whirlpool", $_POST['new-pass']) , $_SESSION['login']);
//		$_SESSION['user']->test();
	}
//	 else
//	 	header("Location: ../views/account/sign-in.html");
}
else {
		echo "NOP";
}

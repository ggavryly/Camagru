<?php
include_once ("../controllers/AccountController.class.php");

$AH = new AccountController();
$AH->authorization($_POST['login'], hash('whirlpool' ,$_POST['pass']));
if ($AH->__get_user_log() == 1)
{
	session_start();
	$_SESSION['login'] = $AH->__get_user_name();
	$_SESSION['log'] = 1;
	print_r($_SESSION);
	header("Location: ../../enter.php");
}

?>
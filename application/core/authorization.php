<?php
require_once ("../config/include.php");
$AH = new AccountController();
$result = $AH->authorization($_POST['name'], hash('whirlpool' ,$_POST['pass']));
if ($result == 1)
{
	session_start();
	$_SESSION['login'] = $AH->__get_user_name();
	$_SESSION['log'] = 1;
	header('Content-Type: application/json');
	echo json_encode(1);
}
else if ($result == 2)
{
	echo json_encode(2);
}
else
{
	echo json_encode(0);
}
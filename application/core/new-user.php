<?php
include_once ("useful-func.php");
require_once ("../controllers/DatabaseController.class.php");
function debug($info)
{
	echo '<pre>';
	var_dump($info);
	echo '</pre>';
}
if ($_POST['login'] && $_POST['pass'] && $_POST['email'] && $_POST['submit'] && $_POST['submit'] == 'OK')
{
	$db = new DatabaseController();
	$db->new_user($_POST['login'], hash("whirlpool",$_POST['pass']), $_POST['email']);
}
?>
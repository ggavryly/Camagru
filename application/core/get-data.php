<?php
include_once ("../config/include.php");
session_start();
if (isset($_POST['mode']))
{
	$data = array();
	$AH = new AccountController();
	if ($_POST['mode'] == "1")
	{
		$data = $AH->load_images();
	}
	else if ($_POST['mode'] == "2")
	{
		$data = $AH->load_comments($_POST['id_post']);
	}
	echo json_encode($data);
}
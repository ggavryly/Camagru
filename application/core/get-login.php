<?php
include_once ("../config/include.php");
if (isset($_POST))
{
	$DH = new DatabaseController();
	$data = array();
	foreach ($_POST as $key => $elem)
	{
		$data[] = $DH->get_login($elem, "id");
	}
	echo json_encode($data);
}
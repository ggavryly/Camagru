<?php
include_once ("application/config/include.php");
session_start();
if ($_SESSION['log'] == "1")
{
	header("Location: application/views/forms/photo-list.php");
}
else
{
	header("Location: application/views/forms/login.php");
}
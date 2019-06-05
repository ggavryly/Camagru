<?php
include_once ("../controllers/AccountController.class.php");

session_start();
$_SESSION = array();
session_destroy();

?>
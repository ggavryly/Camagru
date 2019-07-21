<?php
require_once ("../config/include.php");
session_start();
$_SESSION = array();
session_destroy();
header("Location: ../views/forms/login.php");
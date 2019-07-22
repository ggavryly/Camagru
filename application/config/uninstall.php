<?php
require_once ("../config/include.php");

$DB_DSN = 'mysql:host=localhost';
$DB_USER = 'root';
$DB_PASSWORD = '111111';
$db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->query("DROP DATABASE IF EXISTS camagru;");
header("Location: ../../index.php");
<?php
include ("../controllers/DatabaseContoller.class.php");

$DB_DSN = 'mysql:host=localhost';
$DB_USER = 'root';
$DB_PASSWORD = '111111';
print ("uninstall.php");
$db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->query("DROP DATABASE IF EXISTS camagru;");
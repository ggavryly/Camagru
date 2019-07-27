<?php
include_once("include.php");

try {
    $db = new PDO("mysql:host=localhost;", DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 	$db->query("CREATE DATABASE IF NOT EXISTS camagru;");
 	$db->query("USE camagru;");
 	$db->query("CREATE TABLE IF NOT EXISTS users (id_user INT NOT NULL PRIMARY KEY AUTO_INCREMENT, login VARCHAR(50) NOT NULL , password VARCHAR(255) NOT NULL, email VARCHAR (255) NOT NULL, verif_e INT DEFAULT 0, notification INT DEFAULT 1);");
 	$db->query("CREATE TABLE IF NOT EXISTS posts (id_post INT NOT NULL PRIMARY KEY AUTO_INCREMENT, id_user INT NOT NULL, post VARCHAR (512));");
 	$db->query("CREATE TABLE IF NOT EXISTS comments (id_comment INT NOT NULL PRIMARY KEY AUTO_INCREMENT, id_user INT NOT NULL, id_post INT NOT NULL, comment VARCHAR(255));");
 	$db->query("CREATE TABLE IF NOT EXISTS likes (id_like INT NOT NULL PRIMARY KEY AUTO_INCREMENT, id_post INT NOT NULL, id_user INT NOT NULL, amount INT DEFAULT 0);");
} catch (PDOException $e) {
	 echo 'Connection failed: ' . $e->getMessage();
}
header("Location: ../index.php");
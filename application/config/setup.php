<?php

include ("../controllers/DatabaseController.class.php");

$DB_DSN = 'mysql:host=localhost';
$DB_USER = 'root';
$DB_PASSWORD = '111111';
print ("setup.php");
try {
	 $db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 	$db->query("CREATE DATABASE IF NOT EXISTS camagru;");
 	$db->query("USE camagru;");
 	$db->query("CREATE TABLE IF NOT EXISTS users (id_user INT NOT NULL PRIMARY KEY AUTO_INCREMENT, login VARCHAR(8) NOT NULL , password VARCHAR(255) NOT NULL, email VARCHAR (255) NOT NULL, verif_e INT DEFAULT 0);");
 	$db->query("CREATE TABLE IF NOT EXISTS posts (id_post INT NOT NULL PRIMARY KEY AUTO_INCREMENT, id_user INT NOT NULL, post VARCHAR (512), likes INT, FOREIGN KEY (id_user) REFERENCES users(id_user));");
 	$db->query("CREATE TABLE IF NOT EXISTS comments (id_comment INT NOT NULL PRIMARY KEY AUTO_INCREMENT, id_user INT NOT NULL, id_post INT NOT NULL, comment VARCHAR(255), FOREIGN KEY (id_user) REFERENCES users(id_user), FOREIGN KEY (id_post) REFERENCES posts (id_post));");
} catch (PDOException $e) {
	 echo 'Connection failed: ' . $e->getMessage();
}
//
//header("Location: ../../enter.php");
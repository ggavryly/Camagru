<?php
include_once("../controllers/AccountController.class.php");
include_once("../controllers/DatabaseController.class.php");
include_once("../../config/database.php");
ini_set("display_errors", 1);
error_reporting(E_ALL);
date_default_timezone_set("Europe/Kiev");
session_start();
if (isset($_SESSION["login:".$_POST['login']]))
{
    $AH = new AccountController();
    $DH = new DatabaseController();
    if ($AH->delete_post($_POST["id_user"], $_POST["id_post"]))
        echo json_encode(array("response" => 1));
    else
        echo json_encode(array("response" => 0));
}
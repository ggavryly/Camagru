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
    if ($_POST["mode"] == "login")
    {
       	if ($AH->new_login($_POST["new_login"], $_POST["id_user"]))
		{
			unset($_SESSION["login:".$_POST["login"]]);
			$_SESSION["login:".$_POST["new_login"]] = $_POST["id_user"];
		}
    }
    else if ($_POST["mode"] == "pass")
    {
        $AH->update_password(hash("whirlpool" ,$_POST["pass"]), $_POST["id_user"]);
    }
    else if ($_POST["mode"] == "email")
    {
        $AH->new_email($_POST["email"] ,$_POST["id_user"]);
    }
}
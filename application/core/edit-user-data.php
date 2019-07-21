<?php
require_once ("../config/include.php");
session_start();
if (isset($_SESSION))
{
    $AH = new AccountController();
    $DH = new DatabaseController();
    if ($_POST["mode"] == "login")
    {
        $AH->new_login($_POST["login"], $DH->get_id_user($_SESSION["login"],"login"));
        $_SESSION["login"] = $_POST["login"];
    }
    else if ($_POST["mode"] == "pass")
    {
        $AH->update_password(hash("whirlpool" ,$_POST["pass"]), $DH->get_id_user($_SESSION["login"],"login"));
    }
    else if ($_POST["mode"] == "email")
    {
        $AH->new_email($_POST["email"] ,$DH->get_id_user($_SESSION["login"],"login"));
    }
}
<?php
require_once ("../config/include.php");
if ($_GET['action'] === "confirm")
{
    $AH = new AccountController();
    $id = $AH->encrypt_id($_GET['cr']);
    $AH->validate_email($id);
    $DH = new DatabaseController();
    session_start();
    $_SESSION['log'] = 1;
    $_SESSION['login'] = $DH->get_login($id, "id");
    header("Location: ../views/forms/photo-list.php");
}
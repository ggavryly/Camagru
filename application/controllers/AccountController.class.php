<?php

include_once ("DatabaseController.class.php");

Class AccountController
{
	private	$user_log;
	private $user_name;
	private $user_id;
	private $DBH;

	public function __get_user_log()
	{
		return $this->user_log;
	}
	public function __get_user_name()
	{
		return $this->user_name;
	}
	public function __construct()
	{
		$this->DBH = new DatabaseController();
		echo "Hello AC<br>";
	}
	public function new_password($old_pass ,$new_pass, $login)
	{
		$PP = $this->DBH->__get_pdo()->prepare("SELECT password FROM users WHERE login = :login");
		$PP->setFetchMode(PDO::FETCH_ASSOC);
		$PP->execute(array(':login' => $login));
		$check = $PP->fetch();
		if ($check['password'] === $old_pass)
		{
			$PS = $this->DBH->__get_pdo()->prepare("UPDATE users SET password = :pass WHERE login = :login");
			$PS->execute(array(':pass' => $new_pass, ':login' => $login));
		}
		else
		{
			echo "ERROR";
		}
	}
	public function authorization($login, $pass)
	{
		$result = $this->DBH->__get_pdo()->prepare("SELECT id_user , login, password FROM users WHERE login = :login AND password = :pass");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$result->execute(array(":login" => $login, ":pass" => $pass));
		$check = $result->fetch();
		if (isset($check['id_user']))
		{
			$this->user_id = $check['id_user'];
			$this->user_name = $check['login'];
			$this->user_log = 1;
			return (200);
		}
		else
			return (404);
	}
	public function validate_email()
	{

	}
	public function __destruct()
	{
		echo "BYE-AC<br>";
	}
}
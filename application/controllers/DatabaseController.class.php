<?php
require_once ("../config/database.php");

Class DatabaseController
{
	private static $pdo;

	public function __get_pdo()
	{
		return self::$pdo;
	}
	public function __set_pdo($value)
	{
		self::$pdo = $value;
		return;
	}
	public function __construct()
    {
         self::$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
         self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         echo "Hello DC<br>";
    }
    public function search_user($login)
	{
		$result = self::$pdo->prepare("SELECT login FROM users WHERE login = :login");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$result->execute(array(":login" => $login));
		$check = $result->fetch();
		if ($check['login'])
			return (1);
		else
			return (0);
	}
	public function get_id_user($dt, $mode)
	{
		if ($mode === "login") {
			$result = self::$pdo->prepare("SELECT id_user FROM users WHERE login = :dt");
		}
		else if ($mode === "email"){
			$result = self::$pdo->prepare("SELECT id_user FROM users WHERE email = :dt");
		}
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$result->execute(array(":dt" => $dt));
		$check = $result->fetch();
		if (isset($check['id_user']))
		{
			return $check['id_user'];
		}
		else
		{
			echo "ERROR NO FOUND USER";
		}
	}
	public function search_email($email)
	{
		$result = self::$pdo->prepare("SELECT email FROM users WHERE email = :email");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$result->execute(array(":email" => $email));
		$check = $result->fetch();
		if ($check['email'])
			return (1);
		else
			return (0);
	}
    public function new_post($user, $info)
	{
	}
	public function new_comment($user, $info, $post)
	{
		$prepare_user = self::$pdo->prepare("SELECT id FROM users WHERE login = ?;");
		$prepare_user->bindParam(1, $user);
		$prepare_user->execute();
		$prepare_info = self::$pdo->prepare("INSERT INTO comments (id_user, id_post, comment) VALUES (:id_user, :post, :info)");
		$prepare_info->execute(array(":id_user" => $prepare_user->execute(), ":post" => $post, ":info" => $info));
	}
	public function new_user($user, $password, $email)
	{
		$prepare_user = self::$pdo->prepare("INSERT INTO users (login, password, email) VALUES (:login, :password, :email)");
		if (!$this->search_user($user) && !$this->search_email($email))
		{
			$prepare_user->execute(array(":login" => $user, ":password" => $password, ":email" => $email));
		}
	}
	public function like($post)
	{
		$prepare_post = self::$pdo->prepare("UPDATE posts SET likes + 1 WHERE ?");
		$prepare_post->bindParam(1, $post);
		$prepare_post->execute();
	}
	public function __destruct()
	{
		echo "<br>BYE-DC";
	}
}

?>

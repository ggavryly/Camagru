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
	public function update_password($new_pass, $id_user)
	{
	    $PP = $this->DBH->__get_pdo()->prepare("UPDATE users SET password = :pass WHERE id_user = :id_user");
	    $PP->setFetchMode(PDO::FETCH_ASSOC);
	    $PP->execute(array(':pass' => $new_pass, ':id_user' => $id_user));
	}
    public function new_login($new_login, $id_user)
    {
        if (!$this->DBH->search_user($new_login))
        {
            $PP = $this->DBH->__get_pdo()->prepare("UPDATE users SET login = :login WHERE id_user = :id_user");
            $PP->setFetchMode(PDO::FETCH_ASSOC);
            $PP->execute(array(':login' => $new_login  ,':id_user' => $id_user));
            return (1);
        }
        return (0);
    }
    public function new_email($new_email, $id_user)
    {
        if (!$this->DBH->search_email($new_email))
        {
            $PP = $this->DBH->__get_pdo()->prepare("UPDATE users SET email = :email WHERE id_user = :id_user");
            $PP->setFetchMode(PDO::FETCH_ASSOC);
            $PP->execute(array(':email' => $new_email, ':id_user' => $id_user));
            return (1);
        }
        return (0);
    }
	public function authorization($login, $pass)
	{
		$array = array();
        $result = $this->DBH->__get_pdo()->prepare("SELECT id_user , login, password, verif_e FROM users WHERE login = :login AND password = :pass");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$result->execute(array(":login" => $login, ":pass" => $pass));
		$check = $result->fetch();
		if (isset($check['id_user']) && $check['verif_e'] == 1)
		{
			$array["id_user"] = $check['id_user'];
			$array["login"] = $check['login'];
			$array["response"] = 1;
		}
		else if (isset($check['id_user']) && $check['verif_e'] == 0)
		{
			$array["response"] = 4;
		}
		else {
			$array["response"] = 0;
		}
		return ($array);
	}
	public function validate_email($id)
	{
        $result = $this->DBH->__get_pdo()->prepare("UPDATE users SET verif_e = 1 WHERE id_user = :id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute(array(":id_user" => $id));
	}
	public function encrypt_id($encrypt)
	{
		$result = $this->DBH->__get_pdo()->prepare("SELECT id_user FROM users WHERE MD5(66 * 6 + id_user)=:encrypt");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$result->execute(array(":encrypt" => $encrypt));
		$check = $result->fetch();
		return ($check['id_user']);
	}
	public function load_images()
	{
		$array_posts = [];
		$request = $this->DBH->__get_pdo()->prepare("SELECT * FROM posts");
		$request->setFetchMode(PDO::FETCH_ASSOC);
		$request->execute();
		for ($i = 0; $i < $request->rowCount(); $i++)
		{
			$array_posts[$i] = $request->fetch();
		}
		return ($array_posts);
	}
	public function load_comments($id)
	{
		$request = $this->DBH->__get_pdo()->prepare("SELECT * FROM comments WHERE id_post = :id_post");
		$request->setFetchMode(PDO::FETCH_BOTH);
		$request->execute(array("id_post" => $id));
		$array_comments = [];
		for ($i = 0; $i < $request->rowCount(); $i++)
		{
			$array_comments[$i] = $request->fetch();
		}
		return ($array_comments);
	}
	public function delete_post($id_user, $id_post)
    {
        $request = $this->DBH->__get_pdo()->prepare("SELECT * FROM posts WHERE id_post = :id_post");
        $request->setFetchMode(PDO::FETCH_BOTH);
        $request->execute(array("id_post" => $id_post));
        $check = $request->fetch();
        if ($check["id_user"] === $id_user)
        {
            $delete = $this->DBH->__get_pdo()->prepare("DELETE FROM posts WHERE id_post = :id_post");
            $delete->setFetchMode(PDO::FETCH_BOTH);
            $delete->execute(array("id_post" => $id_post));
            return (1);
        }
        else
            return (0);
    }
	public function __destruct()
	{
	}
}
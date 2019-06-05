<?php
require_once ("../controllers/AccountController.class.php");
if ($_POST['email'] && $_POST['submit'] == 'OK')
{
	$db = new DatabaseController();
	if ($db->search_email($_POST['email']))
	{
		$encoding = "utf-8";
		$result = $db->get_id_user($_POST['email'], "email");
		$encrypt = md5(1290*3+$result);
		$message = "Your password reset link send to your e-mail address";
		$subject = "Forget Password";
		$to = $_POST['email'];
		$from = "camagru";
		$body =
		$headers = "From: ".strip_tags($from)."\r\n";
		$headers .= "Reply-To: ".strip_tags($from)."\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		mail($to, $subject, $body, $headers);
	}
	else
	{
		echo "ERROR {NO ACCOUNT WITH THIS EMAIL}";
	}
}
<?php
require_once ("../config/include.php");
if ($_POST['email'])
{
	$db = new DatabaseController();
	if ($db->search_email($_POST['email']))
	{
		$result = $db->get_id_user($_POST['email'], "email");
		$encrypt = md5(66 * 6 + $result);
		$message = "Your password reset link send to your e-mail address";
		$subject = "forget-password";
		$to = $_POST['email'];
		$from = "no-reply";
		$body = "Salute cowboy,<br> If you forgot your password <br><hr><a href='https://localhost:8443/Camagru/application/core/update-pass.php?cr={$encrypt}&action=reset'>Click here</a> to reset your password<hr><br>If you don't | Ignore this message";
		$headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Transfer-Encoding: 8bit \r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $headers .= "Date: ".date("r (T)")." \r\n";
		$headers .= "From: Camagru <noreply@camagru.com>\r\n";
		$headers .= "Reply-To: ".strip_tags($from)."\r\n";
		mail($to, $subject, stripslashes($body), $headers);
		echo json_encode(1);
	}
	else
	{
		echo json_encode(0);
	}
}
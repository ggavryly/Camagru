<?php
require_once ("../config/include.php");
if ($_POST['name'] && $_POST['pass'] && $_POST['email'])
{
	$db = new DatabaseController();
	$response = $db->new_user($_POST['name'], hash("whirlpool",$_POST['pass']), $_POST['email']);
    if ($response == 1)
    {
    	$encoding = "utf-8";
		$subject_preferences = array(
			"input-charset" => $encoding,
			"output-charset" => $encoding,
			"line-length" => 76,
			"line-break-chars" => "\r\n"
		);
        $result = $db->get_id_user($_POST['email'], "email");
        $encrypt = md5(66 * 6 + $result);
        $subject = "Confirm email address";
        $to = $_POST['email'];
        $from = "no-reply";
        $body = "Salute cowboy,<br>Please confirm your email address <br><hr><a href='https://localhost:8443/Camagru/application/core/confirm-email.php?cr={$encrypt}&action=confirm'>Click here</a> to confirm your email<hr>";
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Transfer-Encoding: 8bit \r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$headers .= "Date: ".date("r (T)")." \r\n";
		$headers .= "From: Camagru <noreply@camagru.com>\r\n";
		$headers .= "Reply-To: ".strip_tags($from)."\r\n";
        mail($to, $subject, stripslashes($body), $headers);
        echo json_encode($response);
    }
    else
	{
		echo json_encode($response);
	}
}
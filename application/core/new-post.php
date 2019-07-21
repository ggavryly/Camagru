<?php
include_once ("../config/include.php");
session_start();


if (isset($_SESSION["log"]) && isset($_POST['img']))
{
	$src_img = $_POST['img'];
	$unique_id = uniqid();
	$DH = new DatabaseController();
	$src_img = str_replace('data:image/png;base64,', '', $src_img);
	$src_img = str_replace(' ', '+', $src_img);
	$src_data = base64_decode($src_img);
	list($width, $height) = getimagesizefromstring($src_data);
	$js_img = imagecreatefromstring($src_data);
	$img_name = "../views/posts/" . $_SESSION["login"] ."_" . $unique_id . ".jpg";
	$out = imagecreatetruecolor($width, $height);
	imagecopyresampled($out, $js_img, 0, 0, 0, 0, $width, $height, $width, $height);
	$DH->new_post($DH->get_id_user($_SESSION['login'], "login"), $_SESSION['login']."_".$unique_id.".jpg");
	imagejpeg($out, $img_name, 100);
	echo json_encode(1);
}

//public function snapshot($params) {
//	if (!isset($_SESSION["user"]) || !isset($params["img"]))
//		exit("No image");
//	$srcImg = $params["img"];
//	$srcImg = str_replace('data:image/png;base64,', '', $srcImg);
//	$srcImg = str_replace(' ', '+', $srcImg);
//	$srcData = base64_decode($srcImg);
//	$bg = imagecreatefromstring($srcData);
//	list($width, $height) = getimagesizefromstring($srcData);
//	$out = imagecreatetruecolor($width, $height);
//
//	imagecopyresampled($out, $bg, 0, 0, 0, 0, $width, $height, $width, $height);
//	$overlays = json_decode($params["overlays"]);
//	foreach ($overlays as $overlay) {
//		$destimg = imagecreatefrompng($overlay->src);
//		$transColor = imagecolorallocatealpha($destimg, 255, 255, 255, 127);
//		$rotatedImage = imagerotate($destimg, -$overlay->rotation, $transColor);
//		imagesavealpha($rotatedImage, true);
//		$rotatedImage = imagescale($rotatedImage, $overlay->width, $overlay->height);
//		imagecopyresampled($out, $rotatedImage, $overlay->posX, $overlay->posY, 0, 0,
//			$overlay->width, $overlay->height, $overlay->width, $overlay->height);
//	}
//	$imgName = "img/" . $_SESSION["user"] ."_" . $this->generateToken(8) . ".jpg";
//	imagejpeg($out, $imgName, 100);
//	$sql = "INSERT INTO `snapshots` SET owner=?, img=?";
//	$this->db->query($sql, [$_SESSION["user"], $imgName]);
//}
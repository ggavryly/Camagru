<?php
include_once ("../config/include.php");
session_start();

function maino($overlay, $out , $w, $h)
{
    if ($overlay["batyka"])
    {
        $out = batyka($out,$w, $h);
    }
//    if ($overlay["doge"])
//    {
//        $out =  doge($out,$w, $h);
//    }
//    if ($overlay["pepe"])
//    {
//        $out =  pepe($out, $w, $h);
//    }
//    if ($overlay["thug-life"])
//    {
//        $out =  thuglife($out, $w, $h);
//    }
//    if ($overlay["ukraine"])
//    {
//        $out =  ukraine($out, $w, $h);
//    }
    return ($out);
}

function batyka($out, $w, $h)
{
    $img = imagecreatefrompng("../../public/images/batyka.png");
    imagecopy($out, $img, imagesx($out) - imagesx($img) - 600, imagesy($out) - imagesy($img) - 300, 0, 0, 200, 200);
    header('Content-type: image/png');
    imagepng($out, "../views/posts/" . $_SESSION["login"] ."_" . uniqid() . ".jpg");
    return ($out);
}

function doge($out, $w, $h)
{
    $img = imagecreatefrompng("../../public/images/doge.png");
    imagecopy($out, $img, 600, 100, 0, 0, 800, 600, 320, 240);
    return ($out);
}

function pepe($out, $w, $h)
{
    $img = imagecreatefrompng("../../public/images/pepe.png");
    imagecopy($out, $img, 100, 400, 0, 0, 800, 600, 750, 730);
    return ($out);
}

function thuglife($out, $w, $h)
{
    $img = imagecreatefrompng("../../public/images/thug-life.png");
    imagecopyresampled($out, $img, 400, 300, 0, 0, 800, 600, 1920, 1080);
    return ($out);
}

function ukraine ($out, $w, $h)
{
    $img = imagecreatefrompng("../../public/images/ukraine.png");
    imagecopy($out, $img, 100, 100, 0, 0, 800, 600, 425, 425);
    return ($out);
}

if (isset($_SESSION["log"]) && isset($_POST['img']))
{
	$src_img = $_POST['img'];
	$unique_id = uniqid();
	$DH = new DatabaseController();
	$src_img = str_replace('data:image/png;base64,', '', $src_img);
	$src_img = str_replace(' ', '+', $src_img);
	$src_data = base64_decode($src_img);
	$js_img = imagecreatefromstring($src_data);
	$img_name = "../views/posts/" . $_SESSION["login"] ."_" . $unique_id . ".jpg";
	list($width, $height) = getimagesizefromstring($src_data);
	$out = imagecreatetruecolor($width, $height);
	imagecopyresampled($out, $js_img, 0, 0, 0, 0, $width, $height, $width, $height);
	imagejpeg(maino($_POST, $out, $width, $height) , $img_name, 100);
	$DH->new_post($DH->get_id_user($_SESSION['login'], "login"), $_SESSION['login']."_".$unique_id.".jpg");
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
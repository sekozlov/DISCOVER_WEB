<?php
// header('Content-Type: image/jpg');

// //$background_color = imagecolorallocate ($im, 255, 255, 255);
// $canvas = imagecreatetruecolor(1920, 1080);
// $icon1 = imagecreatefromjpeg('worlds.jpg');
// $icon2 = imagecreatefromjpeg('pants.jpg');
// // ... add more source images as needed
// imagecopy($canvas, $icon1, 700, 120, 0, 0, 400, 400);
// imagecopy($canvas, $icon2, 0, 120, 0, 0, 400, 400);
// // ... copy additional source images to the canvas as needed
// imagejpeg($canvas);

if (isset($_GET['al'])) {
    $num = $_GET['al']; // val1
};


if ($num == 1) {
	$pic = $_COOKIE['img_name'];
	$song = $_COOKIE['discov_song'];
};
if ($num == 2) {
	$pic = $_COOKIE['img_name1'];
	$song = $_COOKIE['discov_song1'];
};
if ($num == 3) {
	$pic = $_COOKIE['img_name2'];
	$song = $_COOKIE['discov_song2'];
};

echo $pic;
echo $song;

// $stamp = imagecreatefromjpeg('worlds.jpg');
// $im = imagecreatefromjpeg('canvas.jpg');
// $target_width =270;
// $target_height =270;
// $target_layer=imagecreatetruecolor($target_width,$target_height);
// imagecopyresampled($target_layer,$stamp,0,0,0,0,$target_width,$target_height, 512,512);


// $stamp1 = imagecreatefromjpeg('panic.jpg');
// $target_width =80;
// $target_height =80;
// $target_layer1=imagecreatetruecolor($target_width,$target_height);
// imagecopyresampled($target_layer1,$stamp1,0,0,0,0,$target_width,$target_height, 512,512);

// $stamp2 = imagecreatefromjpeg('pants.jpg');
// $target_width =80;
// $target_height =80;
// $target_layer2=imagecreatetruecolor($target_width,$target_height);
// imagecopyresampled($target_layer2,$stamp2,0,0,0,0,$target_width,$target_height, 512,512);

// $text = "Breaking Point";
// //$text = $pic;


// $black = imagecolorallocate($im, 0, 0, 0);
// list($left,, $right) = imageftbbox(22, 0, 'Verdana.ttf', $text);
// // $dwidth = ($right - $left)/2;
// $dwidth = ($left - $right)/2;
// $pos = (263 - $dwidth);
// Imagettftext($im, 22, 0, $pos, 470, $black, 'Verdana.ttf', $text);

// $marge_right = 100;
// $marge_bottom = 100;
// $sx = imagesx($stamp);
// $sy = imagesy($stamp);
// imagecopy($im, $target_layer, 340, 120, 0, 0, 270, 270);
// imagecopy($im, $target_layer1, 10, 10, 0, 0, 80, 80);
// imagecopy($im, $target_layer2, 838, 10, 0, 0, 80, 80);

// // Вывод и освобождение памяти
// header('Content-type: image/png');
// imagepng($im);
// imagedestroy($im);

?>
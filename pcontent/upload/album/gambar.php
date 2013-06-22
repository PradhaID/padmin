<?php
header('Content-Type: image/png');
include ("../../../pincludes/class/class.image.php");
$img=$_GET['img'];
$ext=end(explode('.',$img));
if ($ext=="png"){
	header('Content-Type: image/png');
} else if ($ext=="jpg" || $ext=="jpeg"){
	header('Content-Type: image/jpeg');
} else if ($ext=="gif"){
	header('Content-Type: image/gif');
}
$size=$_GET['size'];
$image = new SimpleImage();
$image->load($img);
if (isset($_GET['r']) && $_GET['r']=="H"){
	$image->resizeToHeight($size);
} else {
	$image->resizeToWidth($size);
}
$image->output();
?>
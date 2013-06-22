<?php
function modulDir(){
	$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	return dirname($url);
}
function masterModulDir(){
	$url=dirname(modulDir());
	return $url;
}
?>
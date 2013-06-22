<?php
class dir{
	public function modulDir(){
		$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		return dirname($url);
	}
	public function rootDir(){
		$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		return dirname(dirname(dirname($url)));
	}
	public function path(){
		$url = dirname("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
		$path=explode("/",$url);
		$dir=end($path);
		$modul=$path[count($path)-2];
		$path=$modul.'/'.$dir;
		return $path;
	}
}
?>
<?php
class dir{
	public function rootDir(){
		$url = "http://$_SERVER[HTTP_HOST]/";
		return $url;
	}
	public function temaDir(){
		$url="pcontent/tema/";
		$query=mysql_query("SELECT * FROM tampilan");
		$tema=mysql_fetch_assoc($query);
		return $url.$tema['tema'];
	}
}
?>
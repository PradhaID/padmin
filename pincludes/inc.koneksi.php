<?php
define ("HOST","localhost");
define ("USER","root");
define ("PASS","12345");
define ("DB","padmin");
define ("EXT",".min");
$konek=mysql_connect(HOST, USER, PASS) or die ("<center><br><br>Oops...!Tidak dapat melakukan koneksi ke database</center>");
if (!$konek){
	echo'<center><br><br>Oops...!Tidak dapat melakukan koneksi ke database</center>';
	exit();
}
$db=mysql_select_db(DB);
if (!$db){
	echo'<center><br><br>Oops..!Database '.DB.' tidak dapat digunakan</center>';
	exit();
}
?>
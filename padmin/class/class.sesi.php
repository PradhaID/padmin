<?php
class sesi{
	public function cekLogin($username, $password){
		$cekData=mysql_query("SELECT * FROM pengguna WHERE (username='".$username."' AND password=password('".$password."') AND status='Aktif') OR (email='".$username."' AND password=password('".$password."' AND status='Aktif')) ") or die (mysql_error());
		if (mysql_num_rows($cekData)<1){
			return false;
		} else {
			$pengguna=mysql_fetch_assoc($cekData);
			$_SESSION['user']=$pengguna['username'];
			$_SESSION['grup']=$pengguna['grup_pengguna'];
			return true;
		}
	}
	public function cekSesi(){
		if(isset($_SESSION['user']) && isset($_SESSION['grup'])){
			return true;
		} else {
			return false;
		}
	}
	public function hapusSesi(){
		session_start();
		session_destroy();
		header("Location:login.php");
	}
	public function namaPengguna(){
		if (isset($_SESSION['user'])){
			return $_SESSION['user'];
		}
	}
	public function grupPengguna(){
		if (isset($_SESSION['grup'])){
			return $_SESSION['grup'];
		}
	}
}
?>
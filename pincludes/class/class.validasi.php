<?php
class validasi{
	function username($username){
		$query=mysql_query("SELECT * FROM pengguna WHERE username='$username'");
		if (strlen($username)<4 || strlen($username)>15 || preg_match('/\s/',$username) || mysql_num_rows($query)>=1){
			if (strlen($username)<4){
				return "Username minimal 4 karakter";
			}
			if (strlen($username)>15){
				return "Username tidak boleh lebih dari 15 karakter";
			}
			if (preg_match('/\s/',$username)){
				return "Username tidak boleh mengandung spasi";
			}
			if (mysql_num_rows($query)>=1){
				return "Username sudah terdaftar";
			}
		} else {
			return "benar";
		}
	}
    function nis($nis){
        $query=mysql_query("SELECT * FROM siswa WHERE nis='$nis'");
        if ($nis=="" || !is_numeric($nis) || mysql_num_rows($query)>=1){
            if ($nis==""){
                return "Nomor induk belum diisi";
            }
            if (!is_numeric($nis)){
                return "Nomor induk harus berupa angka";
            }
            if (mysql_num_rows($query)>=1){
                return "NIS sudah terdaftar";
            }
        } else {
            return "benar";
        }
    }
	function password($password){
		if (strlen($password)<8){
			if (strlen($password)<8){
				return "Password minimal 8 karakter";
			}
		} else {
			return "benar";
		}
	}
	function email($email){
        $query=mysql_query("SELECT * FROM siswa WHERE email='$email'");
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) || mysql_num_rows($query)>=1){
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                return "E-Mail tidak valid";
            } else if (mysql_num_rows($query)>=1){
                return "E-Mail sudah terdaftar";
            }
		} else {
			return "benar";
		}
	}
	function nama($nama){
		if (strlen($nama)<=0){
			return "Nama tidak boleh kosong";
		} else {
			return "benar";
		}
	}
	function cek_password($password){
		$query=mysql_query("SELECT * FROM pengguna WHERE username='".$_SESSION['user']."' AND password=password('$password')");
		if (mysql_num_rows($query)>=1){
			return "benar";
		} else {
			return "Password lama tidak benar";
		}
	}
}
?>
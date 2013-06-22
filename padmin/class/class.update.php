<?php
class update{
	public function halaman($id, $judul, $isi, $tag, $parent){
		if ($parent=="")
			$query="UPDATE halaman SET judul='$judul', isi='$isi', kata_kunci='$tag', sub_dari=NULL WHERE id_halaman='$id'";
		else 
			$query="UPDATE halaman SET judul='$judul', isi='$isi', kata_kunci='$tag', sub_dari=$parent WHERE id_halaman='$id'";
		if (mysql_query($query) or die (mysql_error())){
			return true;
		} else {
			return false;
		}
	}
	public function artikel($id, $judul, $isi, $tag, $kat){
		$query="UPDATE artikel SET judul='$judul', isi='$isi', kata_kunci='$tag' WHERE id_artikel='$id'";
		if (mysql_query($query) or die (mysql_error())){
			$query=mysql_query("DELETE FROM relasi_kategori_artikel WHERE id_artikel='$id'");
			foreach($kat as $id_kat){
				$query=mysql_query("INSERT INTO relasi_kategori_artikel VALUES ('$id', '$id_kat')");
			}
			return true;
		} else {
			return false;
		}
	}
	public function kategori_artikel($id, $nama, $deskripsi, $parent){
		
			$query="UPDATE kategori_artikel SET nama='$nama', deskripsi='$deskripsi', sub_dari='$parent' WHERE id_kategori='$id'";
		
		if (mysql_query($query) or die (mysql_error())){
			return true;
		} else {
			return false;
		}
	}
	public function profil($nama, $email, $biografi){
		$query="UPDATE pengguna SET nama='$nama', email='$email', biografi='$biografi' WHERE username='".$_SESSION['user']."'";
		if (mysql_query($query) or die (mysql_error())){
			return true;
		} else {
			return false;
		}
	}
	public function password($password){
		$query="UPDATE pengguna SET password=password('$password') WHERE username='".$_SESSION['user']."'";
		if (mysql_query($query) or die (mysql_error())){
			return true;
		} else {
			return false;
		}
	}
	function situs($judul, $slogan, $deskripsi, $keyword, $analytic){
		$query="UPDATE situs SET judul='$judul', slogan='$slogan', deskripsi='$deskripsi', kata_kunci='$keyword', analytic='$analytic'";
		if (mysql_query($query) or die (mysql_error())){
			return true;
		} else {
			return false;
		}
	}
	function tampilan($slider){
		$query="UPDATE tampilan SET slider='$slider'";
		if (mysql_query($query) or die (mysql_error())){
			return true;
		} else {
			return false;
		}
	}
	function album($id, $nama, $deskripsi, $keyword){
		$query="UPDATE album SET nama='$nama', deskripsi='$deskripsi', kata_kunci='$keyword' WHERE id_album='$id'";
		if (mysql_query($query) or die (mysql_error())){
			return true;
		} else {
			return false;
		}
	}
	function foto_album($id, $nama, $deskripsi){
		$query="UPDATE foto_album SET nama_file='$nama', deskripsi='$deskripsi' WHERE foto='$id'";
		if (mysql_query($query) or die (mysql_error())){
			return true;
		} else {
			return false;
		}
	}
    function soal($id, $nama, $deskripsi, $waktu, $keyword, $kelas){
        $query="UPDATE soal SET nama='$nama', deskripsi='$deskripsi', waktu='$waktu', kata_kunci='$keyword' WHERE id_soal='$id'";
        if (mysql_query($query) or die (mysql_error())){
            $query=mysql_query("DELETE FROM relasi_soal_kelas WHERE id_soal='$id'");
            foreach($kelas as $id_kelas){
                $query=mysql_query("INSERT INTO relasi_soal_kelas VALUES ('$id', '$id_kelas')");
            }
            return true;
        } else {
            return false;
        }
    }
    function statusSoal($id, $status){
        $query="UPDATE soal SET status='$status' WHERE id_soal='$id'";
        if (mysql_query($query) or die (mysql_error())){
            return true;
        } else {
            return false;
        }
    }
	function pertanyaan($id, $pertanyaan){
		$query="UPDATE pertanyaan SET pertanyaan='$pertanyaan' WHERE id_pertanyaan='$id'";
		if (mysql_query($query) or die (mysql_error())){
			return true;
		} else {
			return false;
		}
	}
    function kelas($id, $nama, $deskripsi){
        $query="UPDATE kelas SET nama='$nama', deskripsi='$deskripsi' WHERE id_kelas='$id'";
        if (mysql_query($query) or die (mysql_error())){
            return true;
        } else {
            return false;
        }
    }
    function validasi_siswa($nis){
        $query="UPDATE siswa SET konfirmasi='valid' WHERE nis='$nis'";
        if (mysql_query($query) or die (mysql_error())){
            return true;
        } else {
            return false;
        }
    }
}
?>
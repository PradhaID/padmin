<?php
class query{
	function pengguna($username, $password, $email, $nama, $biografi, $grup){
		$kode=md5(date('dmYhis'));
		if (mysql_query("INSERT INTO pengguna (username, password, email, nama, biografi, kode_verifikasi, grup_pengguna, tgl_masuk, status)
						VALUES ('$username', password('$password'), '$email', '$nama', '$biografi', '$kode', '$grup', now(), 'Aktif')")){
			return true;
		}
		else {
			return false;
		}
	}
	function kategori_artikel($nama, $deskripsi, $parent){
		if ($parent==""){
			$query="INSERT into kategori_artikel (nama, deskripsi, tgl_masuk, username) VALUES ('$nama','$deskripsi', now(), '".$_SESSION['user']."')";
		} else {
			$query="INSERT into kategori_artikel (nama, deskripsi, tgl_masuk, sub_dari, username) VALUES ('$nama','$deskripsi', now(), $parent, '".$_SESSION['user']."')";
		}
		if (mysql_query($query) or die (mysql_error())){
			return true;
		} else {
			return false;
		}
	}
	function halaman($judul, $isi, $tag, $parent){
		if ($parent==""){
			$query="INSERT into halaman (judul, isi, kata_kunci, tgl_masuk, username) VALUES ('$judul','$isi','$tag', now(), '".$_SESSION['user']."')";
		} else {
			$query="INSERT into halaman (judul, isi, kata_kunci, sub_dari, tgl_masuk, username) VALUES ('$judul','$isi','$tag','$parent', now(), '".$_SESSION['user']."')";
		}
		if (mysql_query($query) or die (mysql_error())){
			return true;
		} else {
			return false;
		}
	}
	function artikel($judul, $isi, $tag, $kat){
		$query="INSERT into artikel (judul, isi, kata_kunci, tgl_masuk, username) VALUES ('$judul','$isi','$tag',now(), '".$_SESSION['user']."')";
		if (mysql_query($query) or die (mysql_error())){
			$id=mysql_insert_id();
			foreach($kat as $id_kat){
				$query=mysql_query("INSERT INTO relasi_kategori_artikel VALUES ('$id', '$id_kat')");
			}
			return true;
		} else {
			return false;
		}
	}
	function media($media, $nama, $ukuran, $tipe){
		$query="INSERT into media (media, nama_file, ukuran, tipe, tgl_upload, username) VALUES ('$media','$nama','$ukuran', '$tipe',now(), '".$_SESSION['user']."')";
		if (mysql_query($query) or die (mysql_error())){
			return true;
		} else {
			return false;
		}
	}
	function hapusSlider(){
		mysql_query("DELETE FROM slider");
	}
	function slider($gambar, $keterangan){
		$query="INSERT into slider (gambar, keterangan) VALUES ('$gambar','$keterangan')";
		if (mysql_query($query) or die (mysql_error())){
			return true;
		} else {
			return false;
		}
	}
	function album($nama, $deskripsi, $keyword){
		$query="INSERT into album (nama, deskripsi, kata_kunci, tgl_masuk, username) VALUES ('$nama','$deskripsi','$keyword', now(), '".$_SESSION['user']."')";
		if (mysql_query($query) or die (mysql_error())){
			return true;
		} else {
			return false;
		}
	}
	function foto_album($media, $nama, $deskripsi, $ukuran, $tipe, $id_album){
		$query="INSERT into foto_album (foto, nama_file, deskripsi, ukuran, tipe, tgl_upload, id_album, username) VALUES ('$media','$nama','$deskripsi','$ukuran', '$tipe',now(), '$id_album', '".$_SESSION['user']."')";
		if (mysql_query($query) or die (mysql_error())){
			return true;
		} else {
			return false;
		}
	}
	function soal($nama, $deskripsi, $waktu, $keyword, $kelas){
		$query="INSERT into soal (nama, deskripsi, waktu, kata_kunci, tgl_masuk, username) VALUES ('$nama','$deskripsi','$waktu', '$keyword', now(), '".$_SESSION['user']."')";
		if (mysql_query($query) or die (mysql_error())){
            $id=mysql_insert_id();
            foreach($kelas as $id_kelas){
                $query=mysql_query("INSERT INTO relasi_soal_kelas VALUES ('$id', '$id_kelas')");
            }
			return true;
		} else {
			return false;
		}
	}

	function pertanyaan($idSoal, $pertanyaan){
		$query="INSERT INTO pertanyaan (pertanyaan, id_soal) VALUES ('$pertanyaan', '$idSoal')";
		if (mysql_query($query) or die (mysql_error())){
			$id=mysql_insert_id();
			return array(true, $id);
		} else {
			return false;
		}
	}
	function jawaban($idPertanyaan, $jawaban, $benar){
		$query="INSERT INTO jawaban (id_pertanyaan, jawaban, benar) VALUES ('$idPertanyaan', '$jawaban', '$benar')";
		if (mysql_query($query) or die (mysql_error())){
			$id=mysql_insert_id();
			return array(true, $id);
		} else {
			return false;
		}
	}
    function kelas($nama, $deskripsi){
        $query="INSERT into kelas (nama, deskripsi, tgl_masuk, username) VALUES ('$nama','$deskripsi', now(), '".$_SESSION['user']."')";
        if (mysql_query($query) or die (mysql_error())){
            return true;
        } else {
            return false;
        }
    }
}
?>
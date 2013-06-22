<?php
class data{
	function grup($id = NULL){
		$array=array();
		if (is_null($id)){
			$query=mysql_query("SELECT * FROM grup_pengguna") or die (mysql_error());
		} else {
			$query=mysql_query("SELECT * FROM grup_pengguna WHERE id_grup='$id'") or die (mysql_error());
		}
		while ($hasil=mysql_fetch_assoc($query)){
			$data['id']=$hasil['id_grup'];
			$data['nama']=$hasil['nama'];
			array_push($array,$data);
		}
		return $array;
	}
	function pengguna($username = NULL){
		$array=array();
		if (is_null($username)){
			$query=mysql_query("SELECT a.username as username, a.nama as nama, a.email as email, a.biografi as biografi, a.grup_pengguna as grup_pengguna, a.status as status, b.nama as nama_grup FROM pengguna a JOIN grup_pengguna b ON (a.grup_pengguna=b.id_grup)") or die (mysql_error());
		} else {
			$query=mysql_query("SELECT a.username as username, a.nama as nama, a.email as email, a.biografi as biografi,  a.grup_pengguna as grup_pengguna, a.status as status, b.nama as nama_grup FROM pengguna a JOIN grup_pengguna b ON (a.grup_pengguna=b.id_grup) WHERE username='$username'") or die (mysql_error());
		}
		while ($hasil=mysql_fetch_assoc($query)){
			$data['username']=$hasil['username'];
			$data['email']=$hasil['email'];
			$data['nama']=$hasil['nama'];
			$data['grup_pengguna']=$hasil['grup_pengguna'];
			$data['nama_grup']=$hasil['nama_grup'];
			$data['biografi']=$hasil['biografi'];
			$data['status']=$hasil['status'];
			array_push($array,$data);
		}
		return $array;
	}
	function kategori_artikel($id=NULL){
		$array=array();
		if (is_null($id)){
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM kategori_artikel WHERE status!='hapus' AND (sub_dari IS NULL OR sub_dari='')") or die (mysql_error());
		} else {
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM kategori_artikel WHERE id_kategori='$id' AND status!='hapus'") or die (mysql_error());
		}
		while ($hasil=mysql_fetch_assoc($query)){
			$data['id']=$hasil['id_kategori'];
			$data['nama']=$hasil['nama'];
			$data['deskripsi']=$hasil['deskripsi'];
			$data['sub_dari']=$hasil['sub_dari'];
			$data['tgl_masuk']=$hasil['tgl_masuk'];
			$data['tgl_ubah']=$hasil['tgl_ubah'];
			$data['pengguna']=$hasil['username'];
			$data['status']=$hasil['status'];
			$data['sub']=$this->sub_kategori_artikel($data['id']);
			if ($data['sub']=="")
					unset($data['sub']);
			array_push($array,$data);
		}
		return $array;
	}
	function sub_kategori_artikel($sub){
		$array=array();
		$sub=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM kategori_artikel WHERE  status!='hapus' AND sub_dari='$sub'") or die (mysql_error());
		if (mysql_num_rows($sub)<=0){
			return NULL;
		} else {
			while ($hasil=mysql_fetch_assoc($sub)){
				$data['id']=$hasil['id_kategori'];
				$data['nama']=$hasil['nama'];
				$data['deskripsi']=$hasil['deskripsi'];
				$data['sub_dari']=$hasil['sub_dari'];
				$data['tgl_masuk']=$hasil['tgl_masuk'];
				$data['tgl_ubah']=$hasil['tgl_ubah'];
				$data['pengguna']=$hasil['username'];
				$data['status']=$hasil['status'];
				$data['sub']=$this->sub_kategori_artikel($data['id']);
				if ($data['sub']=="")
						unset($data['sub']);
				array_push($array,$data);
			}
			return $array;
		} 
	}
	
	function halaman($id=NULL){
		$array=array();
		if (is_null($id)){
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM halaman WHERE status!='hapus'") or die (mysql_error());
		} else {
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM halaman WHERE id_halaman='$id' AND status!='hapus'") or die (mysql_error());
		}
		while ($hasil=mysql_fetch_assoc($query)){
			$data['id']=$hasil['id_halaman'];
			$data['nama']=$hasil['judul'];
			$data['isi']=$hasil['isi'];
			$data['sub_dari']=$hasil['sub_dari'];
			$data['kata_kunci']=$hasil['kata_kunci'];
			$data['tgl_masuk']=$hasil['tgl_masuk'];
			$data['tgl_ubah']=$hasil['tgl_ubah'];
			$data['pengguna']=$hasil['username'];
			$data['status']=$hasil['status'];
			array_push($array,$data);
		}
		return $array;
	}
	function artikel($id=NULL){
		$array=array();
		if (is_null($id)){
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM artikel WHERE status!='hapus' ORDER BY tgl_masuk DESC") or die (mysql_error());
		} else {
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM artikel WHERE id_artikel='$id' AND status!='hapus' ORDER BY tgl_masuk DESC") or die (mysql_error());
		}
		while ($hasil=mysql_fetch_assoc($query)){
			$data['id']=$hasil['id_artikel'];
			$data['nama']=$hasil['judul'];
			$data['isi']=$hasil['isi'];
			$data['kata_kunci']=$hasil['kata_kunci'];
			$data['tgl_masuk']=$hasil['tgl_masuk'];
			$data['tgl_ubah']=$hasil['tgl_ubah'];
			$data['pengguna']=$hasil['username'];
			$data['status']=$hasil['status'];
			array_push($array,$data);
		}
		return $array;
	}
	function relasi_kategori_artikel($id_artikel=NULL, $id_kategori=NULL, $target=NULL){
		$array=array();
		$data=array();
		if ($id_artikel!=NULL && $id_kategori!=NULL){
			$query=mysql_query("SELECT * FROM relasi_kategori_artikel WHERE id_artikel='$id_artikel' AND id_kategori='$id_kategori'");
		} else if ($id_artikel!=NULL){
			$query=mysql_query("SELECT * FROM relasi_kategori_artikel WHERE id_artikel='$id_artikel'");
		} else if ($id_kategori!=NULL){
			$query=mysql_query("SELECT * FROM relasi_kategori_artikel WHERE id_kategori='$id_kategori'");
		} else {
            $query=mysql_query("SELECT * FROM relasi_kategori_artikel");
        }
		while ($hasil=mysql_fetch_assoc($query)){
			if ($target=="artikel"){
				array_push($data,$hasil['id_artikel']);
			} else if ($target=="kategori"){
				array_push($data,$hasil['id_kategori']);
			} else {
				$data['id_artikel']=$hasil['id_artikel'];
				$data['id_kategori']=$hasil['id_kategori'];
				array_push($array,$data);
			}	
		}
		if ($target=="artikel" || $target=="kategori"){
			return $data;
		} else {
			return $array;
		}
	}
	function media($id=NULL){
		$array=array();
		if (is_null($id)){
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_upload, '%d %M %Y<br>Jam %H:%i') as tgl_upload FROM media ORDER BY tgl_upload DESC") or die (mysql_error());
		} else {
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_upload, '%d %M %Y<br>Jam %H:%i') as tgl_upload FROM media WHERE media='$id' ORDER BY tgl_upload DESC") or die (mysql_error());
		}
		while ($hasil=mysql_fetch_assoc($query)){
			$data['media']=$hasil['media'];
			$data['nama']=$hasil['nama_file'];
			$data['ukuran']=$hasil['ukuran'];
			$data['tipe']=$hasil['tipe'];
			$data['tgl_upload']=$hasil['tgl_upload'];
			$data['pengguna']=$hasil['username'];
			array_push($array,$data);
		}
		return $array;
	}
	function situs(){
		$query=mysql_query("SELECT * FROM situs") or die (mysql_error());
		while ($hasil=mysql_fetch_assoc($query)){
			$data['judul']=$hasil['judul'];
			$data['slogan']=$hasil['slogan'];
			$data['deskripsi']=$hasil['deskripsi'];
			$data['keyword']=$hasil['kata_kunci'];
			$data['analytic']=$hasil['analytic'];
		}
		return $data;
	}
	function tampilan(){
		$query=mysql_query("SELECT * FROM tampilan") or die (mysql_error());
		while ($hasil=mysql_fetch_assoc($query)){
			$data['slider']=$hasil['slider'];
			$data['tema']=$hasil['tema'];
		}
		return $data;
	}
	function slider(){
		$array=array();
		$query=mysql_query("SELECT * FROM slider") or die (mysql_error());
		while ($hasil=mysql_fetch_assoc($query)){
			$data['gambar']=$hasil['gambar'];
			$data['keterangan']=$hasil['keterangan'];
			array_push($array, $data);
		}
		return $array;
	}
	function album($id=NULL){
		$array=array();
		if (is_null($id)){
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM album ORDER BY tgl_masuk DESC") or die (mysql_error());
		} else {
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM album WHERE id_album='$id'  ORDER BY tgl_masuk DESC") or die (mysql_error());
		}
		while ($hasil=mysql_fetch_assoc($query)){
			$data['id']=$hasil['id_album'];
			$data['nama']=$hasil['nama'];
			$data['deskripsi']=$hasil['deskripsi'];
			$data['kata_kunci']=$hasil['kata_kunci'];
			$data['tgl_masuk']=$hasil['tgl_masuk'];
			$data['tgl_ubah']=$hasil['tgl_ubah'];
			$data['pengguna']=$hasil['username'];
			array_push($array,$data);
		}
		if (is_null($id)){
			return $array;
		} else {
			return $data;
		}
	}
	function foto_album($id_album=NULL, $id=NULL){
		$array=array();
		if (is_null($id) && is_null($id_album)){
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_upload, '%d %M %Y<br>Jam %H:%i') as tgl_upload FROM foto_album ORDER BY tgl_upload DESC") or die (mysql_error());
		} else if (is_null($id) && !is_null($id_album)){
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_upload, '%d %M %Y<br>Jam %H:%i') as tgl_upload FROM foto_album WHERE id_album='$id_album' ORDER BY tgl_upload DESC") or die (mysql_error());
		} else if (!is_null($id) && !is_null($id_album)){
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_upload, '%d %M %Y<br>Jam %H:%i') as tgl_upload FROM foto_album WHERE foto='$id' AND id_album='$id_album'") or die (mysql_error());
		}
		while ($hasil=mysql_fetch_assoc($query)){
			$data['foto']=$hasil['foto'];
			$data['nama']=$hasil['nama_file'];
			$data['deskripsi']=$hasil['deskripsi'];
			$data['ukuran']=$hasil['ukuran'];
			$data['tipe']=$hasil['tipe'];
			$data['tgl_upload']=$hasil['tgl_upload'];
			$data['pengguna']=$hasil['username'];
			array_push($array,$data);
		}
		if (!is_null($id) && !is_null($id_album)){
			return $data;
		} else {
			return $array;
		}
	}
	function soal($id=NULL){
		$array=array();
		if (is_null($id)){
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM soal ORDER BY tgl_masuk DESC") or die (mysql_error());
		} else {
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM soal WHERE id_soal='$id'  ORDER BY tgl_masuk DESC") or die (mysql_error());
		}
		while ($hasil=mysql_fetch_assoc($query)){
			$data['id']=$hasil['id_soal'];
			$data['nama']=$hasil['nama'];
			$data['kata_kunci']=$hasil['kata_kunci'];
			$data['deskripsi']=$hasil['deskripsi'];
            $data['waktu']=$hasil['waktu'];
			$data['tgl_masuk']=$hasil['tgl_masuk'];
			$data['tgl_ubah']=$hasil['tgl_ubah'];
            $data['status']=$hasil['status'];
			$data['pengguna']=$hasil['username'];
			array_push($array,$data);
		}
		if (is_null($id)){
			return $array;
		} else {
			return $data;
		}
	}
    function kelas($id=NULL){
        $array=array();
        if (is_null($id)){
            $query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM kelas ORDER BY tgl_masuk DESC") or die (mysql_error());
        } else {
            $query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM kelas WHERE id_kelas='$id'  ORDER BY tgl_masuk DESC") or die (mysql_error());
        }
        while ($hasil=mysql_fetch_assoc($query)){
            $data['id']=$hasil['id_kelas'];
            $data['nama']=$hasil['nama'];
            $data['deskripsi']=$hasil['deskripsi'];
            $data['tgl_masuk']=$hasil['tgl_masuk'];
            $data['tgl_ubah']=$hasil['tgl_ubah'];
            $data['pengguna']=$hasil['username'];
            array_push($array,$data);
        }
        if (is_null($id)){
            return $array;
        } else {
            return $data;
        }
    }
	function pertanyaan($id_soal, $id_pertanyaan=NULL){
		$array=array();
		if (is_null($id_pertanyaan)){
			$query=mysql_query("SELECT * FROM pertanyaan WHERE id_soal='$id_soal'") or die (mysql_error());
		} else {
			$query=mysql_query("SELECT * FROM pertanyaan WHERE id_soal='$id_soal' AND id_pertanyaan='$id_pertanyaan'") or die (mysql_error());
		}
		while ($hasil=mysql_fetch_assoc($query)){
			$data['id_soal']=$hasil['id_soal'];
			$data['id_pertanyaan']=$hasil['id_pertanyaan'];
			$data['pertanyaan']=$hasil['pertanyaan'];
			array_push($array,$data);
		}
		if (is_null($id_pertanyaan)){
			return $array;
		} else {
			return $data;
		}
	}
	function jawaban($id_pertanyaan){
		$array=array();
		$query=mysql_query("SELECT * FROM jawaban WHERE id_pertanyaan='$id_pertanyaan'") or die (mysql_error());
		while ($hasil=mysql_fetch_assoc($query)){
			$data['id_pertanyaan']=$hasil['id_pertanyaan'];
			$data['jawaban']=$hasil['jawaban'];
			$data['benar']=$hasil['benar'];
			array_push($array,$data);
		}
		return $array;
	}
    function nilai($idSoal, $idNilai=null, $idKelas=null){
        $array=array();
        if (!is_null($idKelas) && is_null($idNilai)){
            $query=mysql_query("SELECT a.waktu as waktu, a.id_nilai as id_nilai, a.id_soal as id_soal, a.nis as nis, DATE_FORMAT(a.tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk FROM nilai a join siswa b ON(a.nis=b.nis) WHERE a.id_soal='$idSoal' AND b.kelas='$idKelas'");
        } else if (is_null($idNilai)){
            $query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk FROM nilai WHERE id_soal='$idSoal'");
        } else {
            $query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk FROM nilai WHERE id_soal='$idSoal' AND id_nilai='$idNilai'");
        }
        while ($hasil=mysql_fetch_assoc($query)){
            $data['id_nilai']=$hasil['id_nilai'];
            $data['id_soal']=$hasil['id_soal'];
            $data['nis']=$hasil['nis'];
            $data['waktu']=$hasil['waktu'];
            $data['tgl_masuk']=$hasil['tgl_masuk'];
            array_push($array, $data);
        }
        if (is_null($idNilai)) return $array; else return $data;
    }
    function detailNilai($id){
        $array=array();
        $query=mysql_query("SELECT a.id_nilai, a.id_pertanyaan, a.id_jawaban, c.pertanyaan, b.benar FROM detail_nilai a LEFT JOIN jawaban b ON(a.id_jawaban=b.id_jawaban) JOIN pertanyaan c ON(a.id_pertanyaan=c.id_pertanyaan) WHERE a.id_nilai='$id'");
        while ($hasil=mysql_fetch_assoc($query)){
            $data['id_nilai']=$hasil['id_nilai'];
            $data['id_pertanyaan']=$hasil['id_pertanyaan'];
            $data['id_jawaban']=$hasil['id_jawaban'];
            $data['pertanyaan']=$hasil['pertanyaan'];
            $data['benar']=$hasil['benar'];
            array_push($array,$data);
        }
        return $array;
    }
    function siswa($nis=NULL){
        $array=array();
        if (is_null($nis)){
            $query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk FROM siswa ORDER BY tgl_masuk DESC") or die (mysql_error());
        } else {
            $query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk FROM siswa WHERE nis='$nis'  ORDER BY tgl_masuk DESC") or die (mysql_error());
        }
        while ($hasil=mysql_fetch_assoc($query)){
            $data['nis']=$hasil['nis'];
            $data['email']=$hasil['email'];
            $data['nama']=$hasil['nama'];
            $data['kelas']=$hasil['kelas'];
            $data['tempat_lahir']=$hasil['tempat_lahir'];
            $data['jk']=$hasil['jk'];
            $data['tgl_masuk']=$hasil['tgl_masuk'];
            $data['tgl_lahir']=$hasil['tgl_lahir'];
            $data['konfirmasi']=$hasil['konfirmasi'];
            array_push($array,$data);
        }
        if (is_null($nis)){
            return $array;
        } else {
            return $data;
        }
    }
    function relasi_soal_kelas($id_soal=NULL, $id_kelas=NULL, $target=NULL){
        $array=array();
        $data=array();
        if ($id_soal!=NULL && $id_kelas!=NULL){
            $query=mysql_query("SELECT * FROM relasi_soal_kelas WHERE id_soal='$id_soal' AND id_kelas='$id_kelas'");
        } else if ($id_soal!=NULL){
            $query=mysql_query("SELECT * FROM relasi_soal_kelas WHERE id_soal='$id_soal'");
        } else if ($id_kelas!=NULL){
            $query=mysql_query("SELECT * FROM relasi_soal_kelas WHERE id_kelas='$id_kelas'");
        } else {
            $query=mysql_query("SELECT * FROM relasi_soal_kelas");
        }
        while ($hasil=mysql_fetch_assoc($query)){
            if ($target=="kelas"){
                array_push($data,$hasil['id_kelas']);
            } else if ($target=="soal"){
                array_push($data,$hasil['id_soal']);
            } else {
                $data['id_soal']=$hasil['id_soal'];
                $data['id_kelas']=$hasil['id_kelas'];
                array_push($array,$data);
            }
        }
        if ($target=="soal" || $target=="kelas"){
            return $data;
        } else {
            return $array;
        }
    }
}
?>
<?php
class hapus{
	function halaman($id, $status){
		$query=mysql_query("UPDATE halaman SET status='$status' WHERE id_halaman='$id'");
		if ($query){
			return true;
		} else {
			return false;
		}
	}
	function artikel($id, $status){
		$query=mysql_query("UPDATE artikel SET status='$status' WHERE id_artikel='$id'");
		if ($query){
			return true;
		} else {
			return false;
		}
	}
	function kategori_artikel($id, $status){
		$query=mysql_query("UPDATE kategori_artikel SET status='$status' WHERE id_kategori='$id'");
		if ($query){
			return true;
		} else {
			return false;
		}
	}
	function media($id){
		$query=mysql_query("DELETE FROM media WHERE media='$id'");
		if ($query){
			return true;
		} else {
			return false;
		}
	}
	function jawaban($id){
		$query=mysql_query("DELETE FROM jawaban WHERE id_pertanyaan='$id'");
		if ($query){
			return true;
		} else {
			return false;
		}
	}
	function pertanyaan($id){
		$query=mysql_query("DELETE FROM pertanyaan WHERE id_pertanyaan='$id'");
		if ($query){
			return true;
		} else {
			return false;
		}
	}
	function soal($id){
		$query=mysql_query("DELETE FROM soal WHERE id_soal='$id'");
		if ($query){
			return true;
		} else {
			return false;
		}
	}
    function kelas ($id){
        $query=mysql_query("DELETE FROM kelas WHERE id_kelas='$id'");
        if ($query){
            return true;
        } else {
            return false;
        }
    }
    function siswa($id){
        $query=mysql_query("DELETE FROM siswa WHERE nis='$id'");
        if ($query){
            return true;
        } else {
            return false;
        }
    }
}
?>

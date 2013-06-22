<?php
include ("../class.php");
?>
<div id="konfirmasi" style="width:350px;padding:10px;">
<h2 style="margin:2px 0;">Konfirmasi Soal</h2>
Apa yang akan anda lakukan terhadap soal ini?
<br>
<ul>
<?php
$kelas=$data->kelas($_GET['id']);
echo '<li><strong>Judul:</strong> '.$kelas['nama'].'</li>';
echo '<li><strong>Tanggal Dibuat:</strong> '.str_replace('<br>',' ',$kelas['tgl_masuk']).'</li>';
echo '<li><strong>Tanggal Diubah:</strong> '.str_replace('<br>',' ',$kelas['tgl_ubah']).'</li>';
echo '<li><strong>Pengguna:</strong> '.$kelas['pengguna'].'</li>';
?>
</ul>
<div align="right" style="padding:3px">
<span id="loaderKonfirmasi"></span>
<?php
$edit=str_replace('&','.:.','edit-kelas.php?id='.$_GET['id']);
$edit=str_replace('?','.:',$edit);
?>
<button name="btnEdit" onclick="window.location='<?php echo '?halaman=p-modul&path='.$dir->path().'&target='.$edit.''; ?>'">Edit</button>
<button name="btnHapus" onClick="hapus('<?php echo $kelas['id'] ?>','hapus')">Hapus</button>
<button name="btnBatal" onClick="tutup()">Batal</button>
</div>
</div>
<script>

function tutup(){
	$('.blockMsg').animate({
		opacity: 0,
		top: '5%',
	});
	$.unblockUI();
	$(".blockUI").fadeOut("slow"); 
}
function hapus(id, status){
	$('#loaderKonfirmasi').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
	$.post('<?php echo $dir->modulDir().'/hapus-kelas.php?id='; ?>'+id+'<?php echo '&status=';?>'+status, function(data) {
		$('#konfirmasi').html(data),
		$('#content').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
		$.post('<?php echo $dir->modulDir().'/kelas.php'; ?>', function(data) {
			$('#content').html(data);
		});
	});
}
</script>
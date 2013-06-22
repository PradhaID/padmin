<?php
include ("../class.php");
?>
<div id="konfirmasi" style="width:350px;padding:10px;">
<h2 style="margin:2px 0;">Konfirmasi Album</h2>
Apa yang akan anda lakukan terhadap album ini?
<br>
<ul>
<?php
$album=$data->album($_GET['id']);
echo '<li><strong>Judul:</strong> '.$album['nama'].'</li>';
echo '<li><strong>Tanggal Dibuat:</strong> '.str_replace('<br>',' ',$album['tgl_masuk']).'</li>';
echo '<li><strong>Tanggal Diubah:</strong> '.str_replace('<br>',' ',$album['tgl_ubah']).'</li>';
echo '<li><strong>Pengguna:</strong> '.$album['pengguna'].'</li>';
?>
</ul>
<div align="right" style="padding:3px">
<span id="loaderKonfirmasi"></span>
<?php
$detail=str_replace('&','.:.','detail-album.php?id='.$_GET['id']);
$detail=str_replace('?','.:','detail-album.php?id='.$_GET['id']);
$edit=str_replace('&','.:.','edit-album.php?id='.$_GET['id']);
$edit=str_replace('?','.:','edit-album.php?id='.$_GET['id']);
?>
<button name="btnDetail" onclick="window.location='<?php echo '?halaman=p-modul&path='.$dir->path().'&target='.$detail.''; ?>'">Lihat Detail</button>
<button name="btnEdit" onclick="window.location='<?php echo '?halaman=p-modul&path='.$dir->path().'&target='.$edit.''; ?>'">Edit</button>
<button name="btnHapus" onClick="hapus('<?php echo $album['id'] ?>','hapus')">Hapus</button>
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
	$.post('<?php echo $dir->modulDir().'/hapus-artikel.php?id='; ?>'+id+'<?php echo '&status=';?>'+status, function(data) {
		$('#konfirmasi').html(data),
		$('#content').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
		$.post('<?php echo $dir->modulDir().'/artikel.php'; ?>', function(data) {
			$('#content').html(data);
		});
	});
}
</script>
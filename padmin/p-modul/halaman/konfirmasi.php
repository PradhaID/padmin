<?php
include ("../class.php");
?>
<div id="konfirmasi" style="width:350px;padding:10px;">
<h2 style="margin:2px 0;">Konfirmasi Halaman</h2>
Apa yang akan anda lakukan terhadap halaman ini?
<br>
<ul>
<?php
$halaman=$data->halaman($_GET['id']);
echo '<li><strong>Nama Halaman:</strong> '.$halaman[0]['nama'].'</li>';
echo '<li><strong>Tanggal Dibuat:</strong> '.str_replace('<br>',' ',$halaman[0]['tgl_masuk']).'</li>';
echo '<li><strong>Tanggal Diubah:</strong> '.str_replace('<br>',' ',$halaman[0]['tgl_ubah']).'</li>';
echo '<li><strong>Pengguna:</strong> '.$halaman[0]['pengguna'].'</li>';
?>
</ul>
<div align="right" style="padding:3px">
<span id="loaderKonfirmasi"></span>
<?php
$url=str_replace('&','.:.','edit-halaman.php?id='.$_GET['id']);
$url=str_replace('?','.:','edit-halaman.php?id='.$_GET['id']);
?>
<button name="btnEdit" onclick="window.location='<?php echo '?halaman=p-modul&path='.$dir->path().'&target='.$url.''; ?>'">Edit</button>
<button name="btnHapus" onClick="hapus('<?php echo $halaman[0]['id'] ?>','hapus')">Hapus</button>
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
	$.post('<?php echo $dir->modulDir().'/hapus-halaman.php?id='; ?>'+id+'<?php echo '&status=';?>'+status, function(data) {
		$('#konfirmasi').html(data),
		$('#content').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
		$.post('<?php echo $dir->modulDir().'/halaman.php'; ?>', function(data) {
			$('#content').html(data);
		});
	});
}
</script>
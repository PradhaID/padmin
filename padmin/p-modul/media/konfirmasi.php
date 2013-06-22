<?php
include ("../class.php");
?>
<div id="konfirmasi" style="width:350px;padding:10px;">
<h2 style="margin:2px 0;">Konfirmasi Media</h2>
Apa yang akan anda lakukan terhadap Media ini?
<br>
<ul>
<?php
$media=$data->media($_GET['id']);
echo '<li><strong>Nama:</strong> '.$media[0]['nama'].'</li>';
echo '<li><strong>Tanggal Upload:</strong> '.str_replace('<br>',' ',$media[0]['tgl_upload']).'</li>';
echo '<li><strong>Tipe File:</strong> '.str_replace('<br>',' ',$media[0]['tipe']).'</li>';
echo '<li><strong>Pengguna:</strong> '.$media[0]['pengguna'].'</li>';
?>
</ul>
<div align="right" style="padding:3px">
<span id="loaderKonfirmasi"></span>
<?php
$url=str_replace('&','.:.','edit-halaman.php?id='.$_GET['id']);
$url=str_replace('?','.:','edit-halaman.php?id='.$_GET['id']);
?>
<button name="btnHapus" onClick="hapus('<?php echo $media[0]['media'] ?>')">Hapus</button>
<button name="btnBatal" onClick="tutup()">Tutup</button>
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
function hapus(id){
	$('#loaderKonfirmasi').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
	$.post('<?php echo $dir->modulDir().'/hapus-media.php?id='; ?>'+id, function(data) {
		$('#konfirmasi').html(data),
		$('#content').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
		$.post('<?php echo $dir->modulDir().'/media.php'; ?>', function(data) {
			$('#content').html(data);
		});
	});
}
</script>
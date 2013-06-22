<?php
include ("../class.php");
?>
<div id="konfirmasi" style="width:350px;padding:10px;">
<h2 style="margin:2px 0;">Konfirmasi Kategori</h2><br>
<?php
$kategori=$data->kategori_artikel($_GET['id']);
if ($_GET['status']=="hapus"){
	if ($hapus->kategori_artikel($_GET['id'], $_GET['status'])){
		echo '<img src="css/images/check.gif" align="absmiddle" /> Kategori telah berhasil dihapus (<a href="javascript:void()" onClick="roolback(\''.$kategori[0]['id'].'\',\''.$kategori[0]['status'].'\')">kembalikan</a>)';
	} else {
		echo '<img src="css/images/cross.png" align="absmiddle" /> Sesuatu kesalahan telah terjadi, apakah itu?';
	}
} else if ($_GET['status']=="terbit"){
	if ($hapus->kategori_artikel($_GET['id'], $_GET['status'])){
		echo '<img src="css/images/check.gif" align="absmiddle" /> Kategori telah dikembalikan';
	} else {
		echo '<img src="css/images/cross.png" align="absmiddle" /> Sesuatu kesalahan telah terjadi, apakah itu?';
	}
}
?>
<div align="right" style="padding:5px 5px 0 0">
<span id="loaderKonfirmasi"></span>
<button name="btnBatal" onClick="tutup()">&nbsp;&nbsp;Ok&nbsp;&nbsp;</button>
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
function roolback(id, status){
	$('#loaderKonfirmasi').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
	$.post('<?php echo $dir->modulDir().'/hapus-kategori.php?id='; ?>'+id+'<?php echo '&status=';?>'+status, function(data) {
		$('#konfirmasi').html(data),
		$('#content').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
		$.post('<?php echo $dir->modulDir().'/kategori.php'; ?>', function(data) {
			$('#content').html(data);
		});
	});
}
</script>
<?php
include ("../class.php");
?>
<div id="konfirmasi" style="width:350px;padding:10px;">
<h2 style="margin:2px 0;">Konfirmasi Media</h2><br>
<?php
if ($hapus->media($_GET['id'])){
	unlink("../../../pcontent/upload/".$_GET['id']);
	echo '<img src="css/images/check.gif" align="absmiddle" /> Media telah berhasil dihapus';
} else {
	echo '<img src="css/images/cross.png" align="absmiddle" /> Sesuatu kesalahan telah terjadi, apakah itu?';
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
</script>
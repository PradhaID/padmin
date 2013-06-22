<?php
include ("../class.php");
?>
<div id="konfirmasi" style="width:350px;padding:10px;">
<h2 style="margin:2px 0;">Konfirmasi Pertanyaan</h2>
Apa yang akan anda lakukan terhadap pertanyaan ini?
<br>
<?php
$pertanyaan=$data->pertanyaan($_GET['idSoal'], $_GET['idPertanyaan']);
echo '<blockquote>'.$pertanyaan['pertanyaan'].'</blockquote>';
?>
<div align="right" style="padding:3px">
<span id="loaderKonfirmasi"></span>
<?php
$edit=str_replace('&','.:.','edit-pertanyaan.php?idSoal='.$_GET['idSoal'].'&idPertanyaan='.$_GET['idPertanyaan']);
$edit=str_replace('?','.:',$edit);
?>
<button name="btnEdit" onclick="window.location='<?php echo '?halaman=p-modul&path='.$dir->path().'&target='.$edit.''; ?>'">Edit</button>
<button name="btnHapus" onClick="hapus('<?php echo $pertanyaan['id_pertanyaan'] ?>','hapus')">Hapus</button>
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
	$.post('<?php echo $dir->modulDir().'/hapus-pertanyaan.php?idSoal='.$_GET['idSoal'].'&idPertanyaan='; ?>'+id+'<?php echo '&status=';?>'+status, function(data) {
		$('#konfirmasi').html(data),
		$('#content').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
		$.post('<?php echo $dir->modulDir().'/detail-soal.php?id='.$_GET['idSoal']; ?>', function(data) {
			$('#content').html(data);
		});
	});
}
</script>
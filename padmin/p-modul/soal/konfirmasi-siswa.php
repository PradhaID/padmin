<?php
include ("../class.php");
?>
<div id="konfirmasi" style="width:350px;padding:10px;">
<h2 style="margin:2px 0;">Konfirmasi Siswa</h2>
Apa yang akan anda lakukan terhadap siswa ini?
<br>
<ul>
<?php
$siswa=$data->siswa($_GET['id']);
echo '<li><strong>No Induk:</strong> '.$siswa['nis'].'</li>';
echo '<li><strong>Nama:</strong> '.str_replace('<br>',' ',$siswa['nama']).'</li>';
echo '<li><strong>E-Mail:</strong> '.str_replace('<br>',' ',$siswa['email']).'</li>';
$kelas=$data->kelas($siswa['kelas']);
echo '<li><strong>Kelas:</strong> '.$kelas['nama'].'</li>';

echo '<li><strong>Jenis Kelamin:</strong> ';
    if ($siswa['jk']=="L") echo "Laki-laki"; else echo "Perempuan";
    ?>
</ul>
<div align="right" style="padding:3px">
<span id="loaderKonfirmasi"></span>
<?php
$konfirmasi=str_replace('&','.:.','detail-soal.php?id='.$_GET['id']);
$konfirmasi=str_replace('?','.:',$konfirmasi);

if ($siswa['konfirmasi']!="valid"){ ?>
    <button name="btnHapus" onClick="validasi('<?php echo $siswa['nis'] ?>')">Validasi</button>
<?php } ?>
<button name="btnHapus" onClick="hapus('<?php echo $siswa['nis'] ?>','hapus')">Hapus</button>
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
	$.post('<?php echo $dir->modulDir().'/hapus-siswa.php?id='; ?>'+id+'<?php echo '&status=';?>'+status, function(data) {
		$('#konfirmasi').html(data),
		$('#content').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
		$.post('<?php echo $dir->modulDir().'/siswa.php?hal=1'; ?>', function(data) {
			$('#content').html(data);
		});
	});
}
function validasi(id){
    $('#loaderKonfirmasi').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
    $.post('<?php echo $dir->modulDir().'/validasi-siswa.php?id='; ?>'+id, function(data) {
        $('#konfirmasi').html(data),
            $('#content').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
        location.reload();
    });
}
</script>
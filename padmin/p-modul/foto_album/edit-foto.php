<?php
include ("../class.php");
?>
<div id="editFoto" style="width:400px;padding:10px;">
<h2 style="margin:2px 0;">Edit Foto</h2>
<?php
if (isset($_POST['nama'])){
	?><div class="hasilPost"><?php
	if ($update->foto_album($_GET['id'], $_POST['nama'], $_POST['deskripsi'])){
		echo '<img src="css/images/check.gif" align="absmiddle" />  Foto telah berhasil diubah';
	} else {
		echo '<img src="css/images/cross.png" align="absmiddle" /> Sesuatu kesalahan telah terjadi, apakah itu?';
	}
	?></div><?php
}
$foto=$data->foto_album($_GET['album'], $_GET['id']);
?>
<form name="Formfoto" id="Formfoto" method="post" action="<?php echo $dir->modulDir();?>/edit-foto.php?album=<?php echo $_GET['album']; ?>&id=<?php echo $_GET['id']; ?>">
<table>
	<tr>
		<td rowspan="3" valign="top" style="padding-top:3px;"><img src="<?php echo dirname($dir->rootDir())."/pcontent/upload/album/gambar.php?img=".$foto['foto']."&size=150"; ?>"></td>
		<td><input type="text" style="width:230px;" name="nama" placeholder="Nama File Sebagai Title" value="<?php echo $foto['nama']; ?>" class="inputEdit"></td>
	</tr>
	<tr>
		<td>
			<textarea name="deskripsi" placeholder="Deskripsi Gambar" class="inputEdit" style="display:block;width:230px;max-width:230px;height:100%;min-height:100px;"><?php echo $foto['deskripsi']; ?></textarea>
		</td>
	</tr>
</table>

<div align="right" style="padding:3px">
<span id="loaderKonfirmasi"></span>
<?php
$detail=str_replace('&','.:.','detail-album.php?id='.$_GET['id']);
$detail=str_replace('?','.:','detail-album.php?id='.$_GET['id']);
$edit=str_replace('&','.:.','edit-album.php?id='.$_GET['id']);
$edit=str_replace('?','.:','edit-album.php?id='.$_GET['id']);
?>
<span id="loaderFoto"></span>
<button type="submit" name="simpan">Simpan</button>
<!--<button name="btnHapus" onClick="hapus('<?php echo $album['id'] ?>','hapus')">Hapus</button>-->
<button name="btnBatal" onClick="tutup()">Tutup</button>
</div>
</form>
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
$("#Formfoto").submit(function(event) {
	event.preventDefault();
	$('#loaderFoto').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
	 var $form = $( this ),
        nama = $form.find( 'input[name="nama"]' ).val(),
		deskripsi = $form.find( 'textarea[name="deskripsi"]' ).val(),
        url = $form.attr( 'action' );
	$form.find( 'input[name="nama"]' ).attr('disabled', true);
	$form.find( 'textarea[name="deskripsi"]' ).attr('disabled', true);

    $.post( url, { nama: nama, 
					deskripsi: deskripsi},
      function( data ) {
		  $('#editFoto').html(data);
      }
	  
    );
  });
</script>
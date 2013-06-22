<div id="tambahkategori">
<?php
include ("../class.php");
session_start();
?>
<img src="css/images/album.png" align="left" /> <h2 style="padding-top:5px;">Edit Album</h2>

<?php

if (isset($_POST['nama'])){
	$keyword=$_POST['keyword'];
	?><div class="hasilPost"><?php
	if ($_POST['nama']==""){
		echo "<strong>Oops...!Tampaknya data yang anda masukan belum valid seperti :</strong><ul>";
		echo "<li>Nama Album masih kosong</li></ul>";
	} else {
		if ($update->album($_GET['id'], $_POST['nama'],$_POST['deskripsi'],$_POST['keyword'])){
			echo '<img src="css/images/check.gif" align="absmiddle" />  Album telah berhasil diubah';
            unset($_POST);
		} else {
			echo '<img src="css/images/cross.png" align="absmiddle" /> Sesuatu kesalahan telah terjadi, apakah itu?';
		}
	}
	?></div><?php
}
$album=$data->album($_GET['id']);
?>
<form name="album" id="album" method="post" action="<?php echo $dir->modulDir();?>/edit-album.php?id=<?php echo $_GET['id']; ?>">
<table width="300">
    <tr>
    	<td>
        <input type="text" name="nama" id="nama" placeholder="Nama Album"  class="inputEdit" value="<?php if (isset($_POST['nama'])) echo $_POST['nama']; else echo $album['nama']; ?>" />
        </td>
    </tr>
    <tr>
    	<td>
        <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi Kategori" class="inputEdit"><?php if (isset($_POST['deskripsi'])) echo $_POST['deskripsi']; else echo $album['deskripsi']; ?></textarea>
        </td>
    </tr>
    <tr>
    	<td>
        <input type="text" name="keyword" id="keyword" placeholder="Kata Kunci"  class="inputEdit" value="<?php if (isset($_POST['keyword'])) echo $_POST['keyword']; else echo $album['kata_kunci']; ?>" />
        </td>
    </tr>
    <tr>
    	<td><input type="submit" name="btnAlbum" value="Simpan Album" />
        <span id="loaderKategori"></span>
        </td>
    </tr>
</table>

</form>
<script>
$("#album").submit(function(event) {
	event.preventDefault();
	$('#loaderKategori').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
	 var $form = $( this ),
        nama = $form.find( 'input[name="nama"]' ).val(),
		deskripsi = $form.find( 'textarea[name="deskripsi"]' ).val(),
		keyword = $form.find( 'input[name="keyword"]' ).val(),
        url = $form.attr( 'action' );
	$form.find( 'input[name="nama"]' ).attr('disabled', true);
	$form.find( 'input[name="keyword"]' ).attr('disabled', true);
	$form.find( 'textarea[name="deskripsi"]' ).attr('disabled', true);

    $.post( url, { nama: nama, 
					deskripsi: deskripsi,
					keyword: keyword },
      function( data ) {
		  $('#tambahkategori').html(data);
      }
	  
    );
  });
</script>
</div>
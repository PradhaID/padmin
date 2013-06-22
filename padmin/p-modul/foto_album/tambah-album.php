<?php
include ("../class.php");
session_start();
?>
<img src="css/images/album.png" align="left" /> <h2 style="padding-top:0px;">Tambah Album</h2>

<?php
if (isset($_POST['nama'])){
	?><div class="hasilPost"><?php
	if ($_POST['nama']==""){
		echo "<strong>Oops...!Tampaknya data yang anda masukan belum valid seperti :</strong><ul>";
		echo "<li>Nama/Judul album masih kosong</li></ul>";
	} else {
		if ($query->album($_POST['nama'],$_POST['deskripsi'],$_POST['keyword'])){
			echo '<img src="css/images/check.gif" align="absmiddle" />  album telah berhasil ditambahkan';
            unset($_POST);
		} else {
			echo '<img src="css/images/cross.png" align="absmiddle" /> Sesuatu kesalahan telah terjadi, apakah itu?';
		}
	}
	?></div><?php
}
?>
<form name="album" id="album" method="post" action="<?php echo $dir->modulDir();?>/tambah-album.php">
<table width="300">
    <tr>
    	<td>
        <input type="text" name="nama" id="nama" placeholder="Nama Album"  class="inputEdit" />
        </td>
    </tr>
    <tr>
    	<td>
        <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi Album" class="inputEdit"></textarea>
        </td>
    </tr>
    <tr>
    	<td>
        <input type="text" name="keyword" placeholder="Kata Kunci"  class="inputEdit" />
        </td>
    </tr>
    <tr>
    	<td><input type="submit" name="btnAlbum" value="Simpan Album" />
        <span id="loaderAlbum"></span>
        </td>
    </tr>
</table>

</form>
<script>
$("#album").submit(function(event) {
	event.preventDefault();
	$('#loaderAlbum').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
	 var $form = $( this ),
        nama = $form.find( 'input[name="nama"]' ).val(),
		deskripsi = $form.find( 'textarea[name="deskripsi"]' ).val(),
		keyword = $form.find( 'input[name="keyword"]' ).val(),
        url = $form.attr( 'action' );
	$form.find( 'input[name="nama"]' ).attr('disabled', true);
	$form.find( 'input[name="keyword"]' ).attr('disabled', true);
	$form.find( 'textarea[name="deskripsi"]' ).attr('disabled', true);

    $.post( url, { nama: nama, 
					 keyword: keyword, 
					deskripsi: deskripsi },
      function( data ) {
		  $('#content').html(data);
      }
	  
    );
  });
</script>
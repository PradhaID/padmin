<div id="editKelas">
<?php
include ("../class.php");
session_start();
?>
<img src="css/images/class.png" align="left" /> <h2 style="padding-top:5px;"> &nbsp;Edit Kelas <span style="font-size:12px;">| <a href="<?php echo '?halaman=p-modul&path='.$dir->path().'&target=';?>kelas.php">Lihat Data Kelas</a></span></h2>

<?php
if (isset($_POST['nama'])){
	?><div class="hasilPost"><?php
	if ($_POST['nama']==""){
		echo "<strong>Oops...!Tampaknya data yang anda masukan belum valid seperti :</strong><ul>";
		echo "<li>Nama kelas masih kosong</li></ul>";
	} else {
		if ($update->kelas($_GET['id'], $_POST['nama'],$_POST['deskripsi'])){
			echo '<img src="css/images/check.gif" align="absmiddle" />  Kelas telah berhasil diubah';
            unset($_POST);
		} else {
			echo '<img src="css/images/cross.png" align="absmiddle" /> Sesuatu kesalahan telah terjadi, apakah itu?';
		}
	}
	?></div><?php
}
$kelas=$data->kelas($_GET['id']);
?>
<form name="kelas" id="kelas" method="post" action="<?php echo $dir->modulDir();?>/edit-kelas.php?id=<?php echo $_GET['id']; ?>">
<table width="300">
    <tr>
    	<td>
        <input type="text" name="nama" id="nama" placeholder="Nama Soal"  class="inputEdit" value="<?php if (isset($_POST['nama'])) echo $_POST['nama']; else echo $kelas['nama']; ?>" />
        </td>
    </tr>
    <tr>
    	<td>
        <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi SOal" class="inputEdit"><?php if (isset($_POST['deskripsi'])) echo $_POST['deskripsi']; else echo $kelas['deskripsi']; ?></textarea>
        </td>
    </tr>
    <tr>
    	<td><input type="submit" name="btnKelas" value="Ubah Kelas" />
        <span id="loaderKelas"></span>
        </td>
    </tr>
</table>

</form>
<script>
$("#kelas").submit(function(event) {
	event.preventDefault();
	$('#loaderKelas').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
	 var $form = $( this ),
        nama = $form.find( 'input[name="nama"]' ).val(),
		deskripsi = $form.find( 'textarea[name="deskripsi"]' ).val(),
        waktu = $form.find( 'input[name="waktu"]' ).val(),
		keyword = $form.find( 'input[name="keyword"]' ).val(),
        url = $form.attr( 'action' );
	$form.find( 'input[name="nama"]' ).attr('disabled', true);
	$form.find( 'input[name="keyword"]' ).attr('disabled', true);
    $form.find( 'input[name="waktu"]' ).attr('disabled', true);
	$form.find( 'textarea[name="deskripsi"]' ).attr('disabled', true);

    $.post( url, { nama: nama, 
					deskripsi: deskripsi },
      function( data ) {
		  $('#content').html(data);
      }
	  
    );
  });
</script>
</div>
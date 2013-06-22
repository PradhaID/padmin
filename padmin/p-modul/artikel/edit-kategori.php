<?php
session_start();
?>
<div id="tambahkategori">
<?php
include ("../class.php");

function sub($array, $prefix){
	$data=new data();
	$kategori=$data->relasi_kategori_artikel($_GET['id'], NULL, 'kategori');
	foreach($array['sub'] as $sub){
		?>
		<option <?php if ((isset($parent) && $sub['id']==$parent) || ($sub['id']=$kategori[0]['sub_dari'])){ echo 'selected="selected"' ;}?> value="<?php echo $sub['id']; ?>"><?php echo $prefix." ".$sub['nama']; ?></option>
		<?php
		if (array_key_exists('sub',$sub)){
			sub($sub, $subdata, $prefix."&mdash; ");
		}
	}
}
?>
<img src="css/images/category.png" align="left" /> <h2 style="padding-top:5px;">Edit Kategori</h2>

<?php

if (isset($_POST['nama'])){
	$parent=$_POST['parent'];
	?><div class="hasilPost"><?php
	if ($_POST['nama']==""){
		echo "<strong>Oops...!Tampaknya data yang anda masukan belum valid seperti :</strong><ul>";
		echo "<li>Nama kategori masih kosong</li></ul>";
	} else {
		if ($update->kategori_artikel($_GET['id'], $_POST['nama'],$_POST['deskripsi'],$_POST['parent'])){
			echo '<img src="css/images/check.gif" align="absmiddle" />  Kategori telah berhasil diubah';
            unset($_POST);
		} else {
			echo '<img src="css/images/cross.png" align="absmiddle" /> Sesuatu kesalahan telah terjadi, apakah itu?';
		}
	}
	?></div><?php
}
$kategori=$data->kategori_artikel($_GET['id']);
?>
<form name="kategori" id="kategori" method="post" action="<?php echo $dir->modulDir();?>/edit-kategori.php?id=<?php echo $_GET['id']; ?>">
<table width="300">
    <tr>
    	<td>
        <input type="text" name="nama" id="nama" placeholder="Nama Kategori"  class="inputEdit" value="<?php if (isset($_POST['nama'])) echo $_POST['nama']; else echo $kategori[0]['nama']; ?>" />
        </td>
    </tr>
    <tr>
    	<td>
        <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi Kategori" class="inputEdit"><?php if (isset($_POST['deskripsi'])) echo $_POST['deskripsi']; else echo $kategori[0]['deskripsi']; ?></textarea>
        </td>
    </tr>
    <tr>
    	<td>
        <select name="parent">
        	<option value="">.: Bukan Sub-Kategori :.</option>
            <?php
			foreach($data->kategori_artikel() as $data){
				if ($data['id']!=$_GET['id']){
					?>
					<option <?php if ((isset($parent) && $data['id']==$parent) || ($data['id']==$kategori[0]['sub_dari'])){ echo 'selected="selected"' ;}?> value="<?php echo $data['id']; ?>"><?php echo $data['nama']; ?></option>
					<?php
					if (array_key_exists('sub',$data)){
						sub($data, $kategori[0]['sub_dari'], "");
					}
				}
			}
			?>
        </select>
        </td>
    </tr>
    <tr>
    	<td><input type="submit" name="btnKategori" value="Simpan Kategori" />
        <span id="loaderKategori"></span>
        </td>
    </tr>
</table>

</form>
<script>
$("#kategori").submit(function(event) {
	event.preventDefault();
	$('#loaderKategori').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
	 var $form = $( this ),
        nama = $form.find( 'input[name="nama"]' ).val(),
		deskripsi = $form.find( 'textarea[name="deskripsi"]' ).val(),
		parent = $form.find( 'select[name="parent"]' ).val(),
        url = $form.attr( 'action' );
	$form.find( 'input[name="nama"]' ).attr('disabled', true);
	$form.find( 'select[name="parent"]' ).attr('disabled', true);
	$form.find( 'textarea[name="deskripsi"]' ).attr('disabled', true);

    $.post( url, { nama: nama, 
					deskripsi: deskripsi,
					parent: parent },
      function( data ) {
		  $('#tambahkategori').html(data);
      }
	  
    );
  });
</script>
</div>
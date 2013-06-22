<?php
include ("../class.php");
session_start();
function sub($array, $subdata, $prefix){
	foreach($array['sub'] as $sub){
		?>
		<option <?php if ((isset($parent) && $sub['id']==$parent) || ($sub['id']=$subdata)){ echo 'selected="selected"' ;}?> value="<?php echo $sub['id']; ?>"><?php echo $prefix." ".$sub['nama']; ?></option>
		<?php
		if (array_key_exists('sub',$sub)){
			sub($sub, $subdata, $prefix."&mdash; ");
		}
	}
}
?>
<div id="tambahkategori">
<img src="css/images/category.png" align="left" /> <h2 style="padding-top:5px;">Tambah Kategori</h2>

<?php
if (isset($_POST['nama'])){
	?><div class="hasilPost"><?php
	if ($_POST['nama']==""){
		echo "<strong>Oops...!Tampaknya data yang anda masukan belum valid seperti :</strong><ul>";
		echo "<li>Nama kategori masih kosong</li></ul>";
	} else {
		if ($query->kategori_artikel($_POST['nama'],$_POST['deskripsi'],$_POST['parent'])){
			echo '<img src="css/images/check.gif" align="absmiddle" />  Kategori telah berhasil ditambahkan';
			?>
            <script>
				$('#pilihKategori').append('<label for="<?php echo mysql_insert_id(); ?>"><input type="checkbox" name="kategori" id="<?php echo mysql_insert_id(); ?>"  checked="checked" name="<?php echo mysql_insert_id(); ?>" /><?php echo $_POST['nama']; ?></label>');
				
				tutupKategori();
			</script>
            <?php
            unset($_POST);
		} else {
			echo '<img src="css/images/cross.png" align="absmiddle" /> Sesuatu kesalahan telah terjadi, apakah itu?';
		}
	}
	?></div><?php
}
?>
<form name="kategori" id="kategori" method="post" action="<?php echo $dir->modulDir();?>/tambah-kategori.php">
<table width="300">
    <tr>
    	<td>
        <input type="text" name="nama" id="nama" placeholder="Nama Kategori"  class="inputEdit" />
        </td>
    </tr>
    <tr>
    	<td>
        <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi Kategori" class="inputEdit"></textarea>
        </td>
    </tr>
    <tr>
    	<td>
        <select name="parent">
        	<option value="">.: Bukan Sub-Kategori :.</option>
            <?php
			foreach($data->kategori_artikel() as $data){
				?>
                <option value="<?php echo $data['id']; ?>"><?php echo $data['nama']; ?></option>
                <?php
				if (array_key_exists('sub',$data)){
						sub($data, $kategori[0]['sub_dari'], "");
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
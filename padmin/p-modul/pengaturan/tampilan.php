<?php
include("../class.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kategori</title>
</head>

<body>
<img src="css/images/user.png" align="left" /> <h2 style="padding-top:5px;"> Pengaturan Tampilan </h2>
<?php
if (isset($_POST['slider'])){
	?><div class="hasilPost"><?php
	if ($update->tampilan($_POST['slider'])){
		echo '<img src="css/images/check.gif" align="absmiddle" />  Tampilan berhasil disimpan';
	} else {
		echo '<img src="css/images/cross.png" align="absmiddle" /> Sesuatu kesalahan telah terjadi, apakah itu?';
	}
	?></div><?php
}
$data=$data->tampilan();
?>
<form name="tampilan" id="tampilan" method="post" action="<?php echo $dir->modulDir();?>/tampilan.php">
<table>
    <tr>
    	<td>Tampilkan Slider</td>
        <td>
        	<select name="slider">
            	<option value="Ya" <?php if ($data['slider']=="Ya") { echo 'selected="selected"'; }?>>Ya</option>
                <option value="Tidak" <?php if ($data['slider']=="Tidak") { echo 'selected="selected"'; }?>>Tidak</option>
            </select>
        </td>
    </tr>
    <tr>
    	<td></td>
        <td>
        	<button type="submit" name="btnTampilan">Simpan</button>
            <span id="loaderTampilan"></span>
        </td>
    </tr>
    
</table>

</form>
</body>
</html>
<script>
$("#tampilan").submit(function(event) {
	event.preventDefault();
	$('#loaderTampilan').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
	 var $form = $( this ),
        slider = $form.find( 'select[name="slider"]' ).val(),
        url = $form.attr( 'action' );
	$form.find( 'select[name="slider"]' ).attr('disabled', true);
    $.post( url, { slider: slider },
      function( data ) {
		  $('#content').html(data);
      }
    );
  });
</script>
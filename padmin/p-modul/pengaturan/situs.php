<?php
include("../class.php");

?>
<img src="css/images/site.png" align="left" /> <h2 style="padding-top:5px;">&nbsp;Pengaturan Situs</h2>
<?php
if (isset($_POST['judul'])){
	?><div class="hasilPost"><?php
	if ($update->situs($_POST['judul'], $_POST['slogan'], $_POST['deskripsi'], $_POST['keyword'], $_POST['analytic'])){
		echo '<img src="css/images/check.gif" align="absmiddle" />  Situs berhasil diubah';
	} else {
		echo '<img src="css/images/cross.png" align="absmiddle" /> Sesuatu kesalahan telah terjadi, apakah itu?';
	}
	?></div><?php
}
$situs=$data->situs();
?>
<form name="situs" id="situs" method="post" action="<?php echo $dir->modulDir();?>/situs.php">
<table>
	<tr>
    	<td colspan="2">
        <h3>Informasi Situs</h3>
        </td>
    </tr>
    <tr>
    	<td align="right">Judul Situs:</td>
    	<td>
        <input type="text" name="judul" placeholder="Judul Situs" class="inputEdit" value="<?php echo $situs['judul']; ?>"  />
        </td>
    </tr>
    <tr>
    	<td width="150" align="right">Slogan:</td>
    	<td>
        <input type="text" name="slogan" placeholder="Slogan situs (Mari Berkarya Untuk Bangsa)" class="inputEdit" value="<?php echo $situs['slogan']; ?>" />
        </td>
    </tr>
    <tr>
    	<td align="right" valign="top"><br />Deskripsi:</td>
    	<td>
        <textarea name="deskripsi" placeholder="Deskripsi halaman utama situs" class="inputEdit"><?php echo $situs['deskripsi']; ?></textarea>
        </td>
    </tr>
    <tr>
    	<td colspan="2">
    	  <h3>Manajemen SEO</h3>  	  </td>
   	</tr>
    
    <tr>
      <td align="right" valign="top"><br />Kata Kunci/Keyword:</td>
      <td><textarea name="keyword"  placeholder="Kata Kunci/Keyword" class="inputEdit" ><?php echo $situs['keyword']; ?></textarea></td></td>
    </tr>
    <tr>
      <td align="right">ID Google Analytic:</td>
      <td><input type="text" name="analytic" placeholder="ID Google Analytic" class="inputEdit" value="<?php echo $situs['analytic']; ?>"  /></td>
    </tr>
    
    <tr>
    	<td></td>
    	<td><input type="submit" name="btnPengaturan" value="Simpan Pengaturan"  />
        <span id="loaderSitus"></span></td>
    </tr>
</table>

</form>
<script>
$("#situs").submit(function(event) {
	event.preventDefault();
	$('#loaderSitus').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
	 var $form = $( this ),
        judul = $form.find( 'input[name="judul"]' ).val(),
		slogan = $form.find( 'input[name="slogan"]' ).val(),
		deskripsi = $form.find( 'textarea[name="deskripsi"]' ).val(),
		keyword = $form.find( 'textarea[name="keyword"]' ).val(),
		analytic = $form.find( 'input[name="analytic"]' ).val(),
        url = $form.attr( 'action' );
	$form.find( 'input[name="judul"]' ).attr('disabled', true);
	$form.find( 'input[name="slogan"]' ).attr('disabled', true);
	$form.find( 'textarea[name="keyword"]' ).attr('disabled', true);
	$form.find( 'input[name="analytic"]' ).attr('disabled', true);
	$form.find( 'textarea[name="deskripsi"]' ).attr('disabled', 'disabled');
    $.post( url, { judul: judul, 
					slogan: slogan,
					deskripsi: deskripsi,
					keyword: keyword,
					analytic: analytic },
      function( data ) {
		  $('#content').html(data);
      }
    );
  });
</script>
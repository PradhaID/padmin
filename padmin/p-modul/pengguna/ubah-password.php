<?php
session_start();
include ("../class.php");
?>
<img src="css/images/user.png" align="left" /> <h2 style="padding-top:5px;">Ubah Password</h2>

<?php
if (isset($_POST['passwordlama'])){
	?><div class="hasilPost"><?php
	if ($_POST['repassword']!=$_POST['password'] ||
		$validasi->password($_POST['password'])!="benar" ||
		$validasi->cek_password($_POST['passwordlama'])!="benar"){
		echo "<strong>Oops...!Tampaknya data yang anda masukan belum valid seperti :</strong><ol>";
		if ($validasi->cek_password($_POST['passwordlama'])!="benar"){
			echo "<li>".$validasi->cek_password($_POST['passwordlama'])."</li>";
		}
		if ($validasi->password($_POST['password'])!="benar"){
			echo "<li>".$validasi->password($_POST['password'])."</li>";
		}
		if ($_POST['repassword']!=$_POST['password']){
			echo "<li>Ulangi password tidak sama dengan password</li>";
		}
		echo "</ol>";
	} else {
		if ($update->password($_POST['password'])){
			echo '<img src="css/images/check.gif" align="absmiddle" />  Password telah berhasil diubah';
			unset($_POST);
		} else {
			echo '<img src="css/images/cross.png" align="absmiddle" /> Sesuatu kesalahan telah terjadi, apakah itu?';
		}
		
	}
	?></div><?php
}
$pengguna=$data->pengguna($_SESSION['user']);
?>
<br />
<form name="pengguna" id="pengguna" method="post" action="<?php echo $dir->modulDir();?>/ubah-password.php">
<table>
	<tr>
    	<td width="150" align="right">Password Lama</td>
    	<td>
        <input type="password" name="passwordlama" placeholder="Password Lama" class="inputEditKecil"; />
        </td>
    </tr>
	<tr>
    	<td width="150" align="right">Password Baru</td>
    	<td>
        <input type="password" name="password" placeholder="Password" class="inputEditKecil"; />
        <em style="color:#999; font-size:11px;">Min 8 karakter</em>
        </td>
    </tr>
    <tr>
    	<td align="right">Ulangi Password Baru</td>
    	<td>
        <input type="password" name="repassword"  placeholder="Ulangi Password" class="inputEditKecil"; />
        </td>
    </tr>
    <tr>
    	<td></td>
    	<td><input type="submit" name="btnPengguna" value="Simpan" class="button" /> <span id="loaderPengguna"></span></td>
    </tr>
</table>

</form>
<script>
$("#pengguna").submit(function(event) {
	event.preventDefault();
	$('#loaderPengguna').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
	 var $form = $( this ),
	 	passwordlama = $form.find( 'input[name="passwordlama"]' ).val(),
		password = $form.find( 'input[name="password"]' ).val(),
		repassword = $form.find( 'input[name="repassword"]' ).val(),
        url = $form.attr( 'action' );
	$form.find( 'input[name="passwordlama"]' ).attr('disabled', true);
	$form.find( 'input[name="password"]' ).attr('disabled', true);
	$form.find( 'input[name="repassword"]' ).attr('disabled', true);

    $.post( url, { passwordlama: passwordlama, 
					password: password,
					repassword: repassword },
      function( data ) {
		  $('#content').html(data);
      }
	  
    );
  });
</script>
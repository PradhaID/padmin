<?php
session_start();
include ("../class.php");
?>
<img src="css/images/user.png" align="left" /> <h2 style="padding-top:5px;"> Edit Pengguna</h2>

<?php
if (isset($_POST['username'])){
	?><div class="hasilPost"><?php
	if ($validasi->email($_POST['email'])!="benar" ||
		$validasi->nama($_POST['nama'])!="benar"){
		echo "<strong>Oops...!Tampaknya data yang anda masukan belum valid seperti :</strong><ol>";
		if ($validasi->username($_POST['username'])!="benar"){
			echo "<li>".$validasi->username($_POST['username'])."</li>";
		}
		if ($validasi->email($_POST['email'])!="benar"){
			echo "<li>".$validasi->email($_POST['email'])."</li>";
		}
		if ($validasi->nama($_POST['nama'])!="benar"){
			echo "<li>".$validasi->nama($_POST['nama'])."</li>";
		}
		echo "</ol>";
	} else {
		if ($update->profil($_POST['nama'], $_POST['email'], $_POST['biografi'])){
			echo '<img src="css/images/check.gif" align="absmiddle" />  Profil telah berhasil diubah';
			unset($_POST);
		} else {
			echo '<img src="css/images/cross.png" align="absmiddle" /> Sesuatu kesalahan telah terjadi, apakah itu?';
		}
		
	}
	?></div><?php
}
$pengguna=$data->pengguna($_SESSION['user']);
?>

<form name="pengguna" id="pengguna" method="post" action="<?php echo $dir->modulDir();?>/pengaturan-pengguna.php">
<table>
	<tr>
    	<td colspan="2">
        <h3>Info Akun</h3>
        </td>
    </tr>
    <tr>
    	<td align="right">Username</td>
    	<td>
        <input type="text" name="username" placeholder="Username" class="inputEditKecil"; value="<?php echo $pengguna[0]['username']; ?>" readonly="readonly" disabled="disabled"  />
        <em style="color:#999; font-size:11px;">4-15 Karakter, tanpa spasi</em>
        </td>
    </tr>
    <tr>
    	<td colspan="2">
    	  <h3>Info Kontak</h3>  	  </td>
   	</tr>
    <tr>
    	<td align="right">E-Mail Pengguna</td>
    	<td>
        <input type="text" name="email" placeholder="E-Mail Pengguna" class="inputEdit"; value="<?php if (isset($_POST['email'])){ echo $_POST['email'] ;} else { echo $pengguna[0]['email']; }?>" />
        </td>
    </tr>
    <tr>
    	<td align="right">Nama Pengguna</td>
    	<td>
        <input type="text" name="nama" placeholder="Nama Pengguna" class="inputEdit"; value="<?php if (isset($_POST['nama'])){ echo $_POST['nama'] ;} else { echo $pengguna[0]['nama']; }?>" />
        </td>
    </tr>
    <tr>
    	<td colspan="2">
    	  <h3>Tentang Pengguna</h3>  	  </td>
   	</tr>
    <tr>
    	<td align="right" valign="top" style="padding-top:5px;">Biografi Pengguna</td>
    	<td>
        <textarea name="biografi" placeholder="Biografi Pengguna" class="inputEdit"; ><?php if (isset($_POST['biografi'])){ echo $_POST['biografi'] ;} else { echo $pengguna[0]['biografi'];}?></textarea>
        </td>
    </tr>
    <tr>
    	<td align="right">Tempatkan Sebagai</td>
    	<td><input type="text" name="nama_grup" placeholder="nama_grup" class="inputEditKecil"; value="<?php echo $pengguna[0]['nama_grup']; ?>" readonly="readonly" disabled="disabled"  /></td>
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
        username = $form.find( 'input[name="username"]' ).val(),
		email = $form.find( 'input[name="email"]' ).val(),
		nama = $form.find( 'input[name="nama"]' ).val(),
		biografi = $form.find( 'textarea[name="biografi"]' ).val(),
		grup = $form.find( 'select[name="grup"]' ).val(),
        url = $form.attr( 'action' );
	$form.find( 'input[name="username"]' ).attr('disabled', true);
	$form.find( 'select[name="grup"]' ).attr('disabled', true);
	$form.find( 'input[name="email"]' ).attr('disabled', true);
	$form.find( 'input[name="nama"]' ).attr('disabled', true);
	$form.find( 'textarea[name="biografi"]' ).attr('disabled', true);

    $.post( url, { username: username, 
					email: email,
					nama: nama,
					biografi: biografi,
					grup: grup },
      function( data ) {
		  $('#content').html(data);
      }
	  
    );
  });
</script>
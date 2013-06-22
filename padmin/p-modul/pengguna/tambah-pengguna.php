<?php
include ("../class.php");
?>
<img src="css/images/user.png" align="left" /> <h2 style="padding-top:5px;"> Tambah Pengguna</h2>

<?php
if (isset($_POST['username'])){
	?><div class="hasilPost"><?php
	if ($validasi->username($_POST['username'])!="benar" ||
		$validasi->username($_POST['password'])!="benar" ||
		$_POST['repassword']!=$_POST['password'] ||
		$validasi->email($_POST['email'])!="benar" ||
		$validasi->nama($_POST['nama'])!="benar"){
		echo "<strong>Oops...!Tampaknya data yang anda masukan belum valid seperti :</strong><ol>";
		if ($validasi->username($_POST['username'])!="benar"){
			echo "<li>".$validasi->username($_POST['username'])."</li>";
		}
		if ($validasi->password($_POST['password'])!="benar"){
			echo "<li>".$validasi->password($_POST['password'])."</li>";
		}
		if ($_POST['repassword']!=$_POST['password']){
			echo "<li>Ulangi password tidak sama dengan password</li>";
		}
		if ($validasi->email($_POST['email'])!="benar"){
			echo "<li>".$validasi->email($_POST['email'])."</li>";
		}
		if ($validasi->nama($_POST['nama'])!="benar"){
			echo "<li>".$validasi->nama($_POST['nama'])."</li>";
		}
		echo "</ol>";
	} else {
		if ($query->pengguna($_POST['username'], $_POST['password'], $_POST['email'], $_POST['nama'], $_POST['biografi'], $_POST['grup'])){
			echo '<img src="css/images/check.gif" align="absmiddle" />  Pengguna telah berhasil ditambahkan';
			unset($_POST);
		} else {
			echo '<img src="css/images/cross.png" align="absmiddle" /> Sesuatu kesalahan telah terjadi, apakah itu?';
		}
		
	}
	?></div><?php
}
?>

<form name="pengguna" id="pengguna" method="post" action="<?php echo $dir->modulDir();?>/tambah-pengguna.php">
<table>
	<tr>
    	<td colspan="2">
        <h3>Info Akun</h3>
        </td>
    </tr>
    <tr>
    	<td align="right">Username</td>
    	<td>
        <input type="text" name="username" placeholder="Username" class="inputEditKecil"; value="<?php if (isset($_POST['username'])){ echo $_POST['username'] ;}?>"  />
        <em style="color:#999; font-size:11px;">4-15 Karakter, tanpa spasi</em>
        </td>
    </tr>
    <tr>
    	<td width="150" align="right">Password</td>
    	<td>
        <input type="password" name="password" placeholder="Password" class="inputEditKecil"; />
        <em style="color:#999; font-size:11px;">Min 8 karakter</em>
        </td>
    </tr>
    <tr>
    	<td align="right">Ulangi Password</td>
    	<td>
        <input type="password" name="repassword"  placeholder="Ulangi Password" class="inputEditKecil"; />
        </td>
    </tr>
    <tr>
    	<td colspan="2">
    	  <h3>Info Kontak</h3>  	  </td>
   	</tr>
    <tr>
    	<td align="right">E-Mail Pengguna</td>
    	<td>
        <input type="text" name="email" placeholder="E-Mail Pengguna" class="inputEdit"; value="<?php if (isset($_POST['email'])){ echo $_POST['email'] ;}?>" />
        </td>
    </tr>
    <tr>
    	<td align="right">Nama Pengguna</td>
    	<td>
        <input type="text" name="nama" placeholder="Nama Pengguna" class="inputEdit"; value="<?php if (isset($_POST['nama'])){ echo $_POST['nama'] ;}?>" />
        </td>
    </tr>
    <tr>
    	<td colspan="2">
    	  <h3>Tentang Pengguna</h3>  	  </td>
   	</tr>
    <tr>
    	<td align="right" valign="top" style="padding-top:5px;">Biografi Pengguna</td>
    	<td>
        <textarea name="biografi" placeholder="Biografi Pengguna" class="inputEdit"; ><?php if (isset($_POST['biografi'])){ echo $_POST['biografi'] ;}?></textarea>
        </td>
    </tr>
    <tr>
    	<td align="right">Tempatkan Sebagai</td>
    	<td>
        <select name="grup">
            <?php
			foreach($data->grup() as $data){
				?>
                <option <?php if (isset($_POST['grup']) && $data['id']==$_POST['grup']){ echo 'selected="selected"' ;}?> value="<?php echo $data['id']; ?>"><?php echo $data['nama']; ?></option>
                <?php
			}
			?>
        </select>
        </td>
    </tr>
    <tr>
    	<td></td>
    	<td><input type="submit" name="btnPengguna" value="Simpan Pengguna" class="button" /> <span id="loaderPengguna"></span></td>
    </tr>
</table>

</form>
<script>
$("#pengguna").submit(function(event) {
	event.preventDefault();
	$('#loaderPengguna').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
	 var $form = $( this ),
        username = $form.find( 'input[name="username"]' ).val(),
		password = $form.find( 'input[name="password"]' ).val(),
		repassword = $form.find( 'input[name="repassword"]' ).val(),
		email = $form.find( 'input[name="email"]' ).val(),
		nama = $form.find( 'input[name="nama"]' ).val(),
		biografi = $form.find( 'textarea[name="biografi"]' ).val(),
		grup = $form.find( 'select[name="grup"]' ).val(),
        url = $form.attr( 'action' );
	$form.find( 'input[name="username"]' ).attr('disabled', true);
	$form.find( 'select[name="grup"]' ).attr('disabled', true);
	$form.find( 'input[name="password"]' ).attr('disabled', true);
	$form.find( 'input[name="repassword"]' ).attr('disabled', true);
	$form.find( 'input[name="email"]' ).attr('disabled', true);
	$form.find( 'input[name="nama"]' ).attr('disabled', true);
	$form.find( 'textarea[name="biografi"]' ).attr('disabled', true);

    $.post( url, { username: username, 
					password: password,
					repassword: repassword,
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
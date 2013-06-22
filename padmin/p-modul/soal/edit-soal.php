<div id="tambahkategori">
<?php
include ("../class.php");
session_start();
?>
<img src="css/images/question.png" align="left" /> <h2 style="padding-top:5px;"> &nbsp;Edit Soal <span style="font-size:12px;">| <a href="<?php echo '?halaman=p-modul&path='.$dir->path().'&target=';?>soal.php">Lihat Data</a></span></h2>

<?php
if (isset($_POST['nama'])){
	$keyword=$_POST['keyword'];
    $kel=explode(',',$_POST['kelas']);
	?><div class="hasilPost"><?php
        if ($_POST['nama']=="" || !is_numeric($_POST['waktu']) || $_POST['kelas']==""){
            echo "<strong>Oops...!Tampaknya data yang anda masukan belum valid seperti :</strong><ul>";
            if ($_POST['nama']==""){
                echo "<li>Nama soal masih kosong</li>";
            }
            if (!is_numeric($_POST['waktu'])) {
                echo "<li>Waktu harus berupa angka</li>";
            }
            if ($_POST['kelas']=="") {
                echo "<li>Anda belum memilih target kelas</li>";
            }
            echo "</ul>";
	} else {
		if ($update->soal($_GET['id'], $_POST['nama'],$_POST['deskripsi'], $_POST['waktu'],$_POST['keyword'], $kel)){
			echo '<img src="css/images/check.gif" align="absmiddle" />  Soal telah berhasil diubah';
            unset($_POST);
		} else {
			echo '<img src="css/images/cross.png" align="absmiddle" /> Sesuatu kesalahan telah terjadi, apakah itu?';
		}
	}
	?></div><?php
}
$soal=$data->soal($_GET['id']);
?>
<form name="soal" id="soal" method="post" action="<?php echo $dir->modulDir();?>/edit-soal.php?id=<?php echo $_GET['id']; ?>">
<table>
    <tr>
    	<td>
        <input type="text" name="nama" id="nama" placeholder="Nama Soal"  class="inputEdit" value="<?php if (isset($_POST['nama'])) echo $_POST['nama']; else echo $soal['nama']; ?>" />
        </td>
        <td style="width: 200px;"><h3>Target Kelas</h3></td>
    </tr>
    <tr>
    	<td>
        <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi SOal" class="inputEdit"><?php if (isset($_POST['deskripsi'])) echo $_POST['deskripsi']; else echo $soal['deskripsi']; ?></textarea>
        </td>
        <td rowspan="3" valign="top">
            <div id="pilihKategori" style="max-height:250px;overflow-y:auto;overflow-x:hidden;">
                <?php
                $dataKelas=$data->relasi_soal_kelas($_GET['id'], null, "kelas");
                foreach ($data->kelas() as $kelas){
                    ?><label for="<?php echo $kelas['id']; ?>"><?php
                        ?><input type="checkbox" name="kelas" id="<?php echo $kelas['id'];?>" <?php if (isset($kel) && in_array($kelas['id'],$kel)) echo 'checked="checked"'; else if(in_array($kelas['id'],$dataKelas)) echo 'checked="checked"'; ?> value="<?php echo $kelas['id']; ?>"> <?php echo $kelas['nama']; ?><?php
                        ?></label><?php
                }
                ?>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <input type="text" name="waktu" id="waktu" placeholder="Waktu" style="width: 50px;"  class="inputEdit" value="<?php if (isset($_POST['waktu'])) echo $_POST['waktu']; else echo $soal['waktu']; ?>" /> Menit
        </td>
    </tr>
    <tr>
    	<td>
        <input type="text" name="keyword" id="keyword" placeholder="Kata Kunci"  class="inputEdit" value="<?php if (isset($_POST['keyword'])) echo $_POST['keyword']; else echo $soal['kata_kunci']; ?>" />
        </td>
    </tr>
    <tr>
    	<td><input type="submit" name="btnAlbum" value="Simpan Soal" />
        <span id="loaderSoal"></span>
        </td>
    </tr>
</table>

</form>
<script>
$("#soal").submit(function(event) {
	event.preventDefault();
	$('#loaderSoal').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
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

    var kelas = [];
    $(':checkbox:checked').each(function(i){
        kelas[i] = $(this).val();
    });
    kel=kelas.join(',');

    $.post( url, { nama: nama, 
					deskripsi: deskripsi,
                    waktu: waktu,
                    kelas: kel,
					keyword: keyword },
      function( data ) {
		  $('#tambahkategori').html(data);
      }
	  
    );
  });
</script>
</div>
<?php
include ("../class.php");
session_start();
?>
<img src="css/images/page.png" align="left" /> <h2 style="padding-top:3px;">&nbsp;Edit Pertanyaan  <span style="font-size:12px;"> | <a href="<?php echo '?halaman=p-modul&path='.$dir->path().'&target=';?>detail-soal.php.:id=<?php echo $_GET['idSoal']; ?>">Kembali</a></span></h2>
<?php
if (isset($_POST['pertanyaan'])){
	?><div class="hasilPost"><?php
	$jawaban=explode("||",$_POST['jawab']);
	if (strip_tags($_POST['pertanyaan'], '<a><img><br>')==""){
		echo "<strong>Oops...!Tampaknya data yang anda masukan belum valid seperti :</strong><ol>";
		echo "<li>Pertanyaan masih kosong</li></ol>";
	} else {
		if ($update->pertanyaan($_GET['idPertanyaan'], strip_tags(nl2br($_POST['pertanyaan']), '<a><img><br>'))){
			$noJ=1;
			$hapus->jawaban($_GET['idPertanyaan']);
			foreach($jawaban as $jawab){
				if ($jawab!=""){
					if ($noJ==$_POST['benar']){
						$query->jawaban($_GET['idPertanyaan'],$jawab,'benar');
					} else {
						$query->jawaban($_GET['idPertanyaan'],$jawab,'salah');
					}
				}
				$noJ++;
			}
			echo '<img src="css/images/check.gif" align="absmiddle" />  Pertanyaan telah berhasil diubah';
		} else {
			echo '<img src="css/images/cross.png" align="absmiddle" /> Sesuatu kesalahan telah terjadi, apakah itu?';
		}
	}
	?></div><?php
}
$pertanyaan=$data->pertanyaan($_GET['idSoal'],$_GET['idPertanyaan']);
?>
<form name="formPertanyaan" id="formPertanyaan" method="post" action="<?php echo $dir->modulDir();?>/edit-pertanyaan.php?idSoal=<?php echo $_GET['idSoal'];?>&idPertanyaan=<?php echo $_GET['idPertanyaan'];?>">
<table>
    <tr>
    	<td>
		<textarea id="pertanyaan" name="pertanyaan"  style="width:600px;height:100px;"><?php echo stripslashes(nl2br($pertanyaan['pertanyaan'])); ?></textarea>
        </td>
    </tr>
    <tr>
    	<td>
		&nbsp;Jawaban
        </td>
    </tr>
    <tr>
    	<td>
		<table id="jawab">
        	<?php
			$alpha="A";
			foreach($data->jawaban($pertanyaan['id_pertanyaan']) as $jawab){
				?>
                <tr>
                    <td>&nbsp;<?php echo $alpha;?> <input type="radio" alt="Jawaban Benar" name="rbJawaban" <?php if ($jawab['benar']=="benar") echo 'checked="checked"'; ?> value="<?php echo ord(strtolower($alpha))-96;?>" /></td>
                    <td><input type="text" name="jawaban" class="inputEdit" value="<?php echo $jawab['jawaban']; ?>" /></td>
                </tr>
                <?php
				$alpha++;
			}
			?>
        </table>
        </td>
    </tr>
    <tr>
    	<td>
        <input type="submit" name="submit" value="Simpan Pertanyaan" />
        <button type="button" onclick="append()">Tambah Jawaban</button>
        <span id="loaderPertanyaan"></span>
        </td>
    </tr>
</table>
</form>
<script>
init('pertanyaan');
function append(){
	var n = $('#jawab tr').length;
	if (n>=5){
		alert("Jawaban sudah terlalu banyak");
	} else {
		$('#jawab').append('<tr><td>&nbsp;'+String.fromCharCode(64+n+1)+' <input type="radio" alt="Jawaban Benar" name="rbJawaban" value="'+(n+1)+'" /></td><td><input type="text" name="jawaban" class="inputEdit" /></td></tr>')
	}
}
</script>
<script>
$("#formPertanyaan").submit(function(event) {
	event.preventDefault();
	var jawaban = [];
    $('input[name="jawaban"]').each(function(i){
      jawaban[i] = $.trim($(this).val());
    });
	jawab=jawaban.join('||');
	 var $form = $( this ),
        pertanyaan = tinyMCE.activeEditor.getContent({format : 'raw'}),
		benar = $form.find( 'input[name="rbJawaban"]:checked' ).val(),
		parent = $form.find( 'select[name="parent"]' ).val(),
        url = $form.attr( 'action' );
	if (jawaban[parseInt(benar)-1]=='' || jawaban[parseInt(benar)-1]==undefined){
		alert("Nilai jawaban benar "+String.fromCharCode(64+parseInt(benar))+" masih kosong"+jawaban[parseInt(benar)-1]);
	} else {
		$('#loaderPertanyaan').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
		$form.find( 'input[name="pertanyaan"]' ).attr('disabled', true);
		$form.find( 'input[name="tag"]' ).attr('disabled', true);
		$form.find( 'select[name="parent"]' ).attr('disabled', true);
		$form.find( 'textarea[name="isi"]' ).attr('disabled', 'disabled');
		$.post( url, { pertanyaan: pertanyaan, 
						jawab: jawab,
						benar: benar }, function( data ) {
							$('#content').html(data);
					}
		);
	}
  });
</script>
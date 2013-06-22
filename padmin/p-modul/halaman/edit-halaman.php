<?php
include ("../class.php");
session_start();
?>
<img src="css/images/page.png" align="left" /> <h2 style="padding-top:3px;">&nbsp;Edit Halaman</h2>
<?php
$halaman=$data->halaman($_GET['id']);
if (isset($_POST['judul'])){
	$judul=$_POST['judul'];
	$isi=$_POST['isi'];
	$parent=$_POST['parent'];
	$tag=$_POST['tag']
	?><div class="hasilPost"><?php
	if ($judul==""){
		echo "<strong>Oops...!Tampaknya data yang anda masukan belum valid seperti :</strong><ol>";
		echo "<li>Judul halaman masih kosong</li></ol>";
	} else {
		if ($update->halaman($_GET['id'], $judul, $isi, $tag, $parent)){
			echo '<img src="css/images/check.gif" align="absmiddle" />  Halaman telah berhasil diubah';
			unset($_POST);
		} else {
			echo '<img src="css/images/cross.png" align="absmiddle" /> Sesuatu kesalahan telah terjadi, apakah itu?';
		}
	}
	?></div><?php
}
?>
<form name="halaman" id="halaman" method="post" action="<?php echo $dir->modulDir();?>/edit-halaman.php?id=<?php echo $_GET['id']; ?>">
<table>
	<tr>
   	  
        <td><input type="text" name="judul" class="inputEdit" placeholder="Masukan Judul Halaman Disini" value="<?php if (isset($judul)) echo $judul; else echo $halaman[0]['nama']; ?>" /></td>
        <td valign="bottom">
        <h3>Sub-Halaman Dari</h3>
        </div>
        </td>
    </tr>
    <tr>
    	<td>
		<textarea id="isi" name="isi"  style="width:600px;"><?php if (isset($isi)) echo stripslashes($isi); else echo $halaman[0]['isi']; ?></textarea>
        <div style="padding:5px 0 2px 0;text-align:right"><a href="javascript:void(0)" onclick="tambahGambar()"><img src="css/images/image.png" border="0" /> </div>
        </td>
        <td valign="top"  rowspan="3" width="200">
        <select name="parent">
        	<option value="">.: Bukan Sub-Halaman :.</option>
            <?php
			foreach($data->halaman() as $data){
				?>
                <option <?php if ((isset($parent) && $data['id']==$parent) || ($data['id']==$halaman[0]['sub_dari'])){ echo 'selected="selected"' ;}?> value="<?php echo $data['id']; ?>"><?php echo $data['nama']; ?></option>
                <?php
			}
			?>
        </select>
        </td>
    </tr>
    <tr>
    	<td>
        Keyword/Tag <em>(pisahkan oleh tanda koma)</em>
        </td>
    </tr>
    <tr>
    	<td><input name="tag" type="text" class="inputEdit" value="<?php if (isset($tag)) echo $tag; else echo $halaman[0]['kata_kunci'];  ?>" placeholder="Teknologi, Hiburan, dll" size="30" /><em style="font-size:10px;"></em></td>
    </tr>
    <tr>
    	<td>
        <input type="submit" name="submit" value="Simpan Halaman" />
        <span id="loaderHalaman"></span>
        </td>
    </tr>
</table>
</form>
<script>
function tambahGambar(){
		$.blockUI({
			centerX: true, 
		    centerY: false, 
			message:'<div id="popup" class="handle">Silahkan Tunggu...</div>', 
			overlayCSS: { backgroundColor: '#000', cursor: 'default' },
			css: { opacity: '0', top: '5%', width: 'auto', border: 'none', background: 'none' }
		});
			var msg = $('#popup');
		    var height = $(window).height();
		    var width = $(document).width();
			msg.css({
				'left' : '50%',
				'margin-left' : 10 - (msg.width() / 2),
			});
			
		$.post('<?php echo $dir->rootDir().'/p-modul/media/media-pop.php'; ?>', function(data) {
			$('#popup').html(data),
			$('.blockMsg').animate({
				opacity: 1,
				top: '15%'
			  });
		});
}
</script>
<script>


init('isi');
</script>
<script>
$("#halaman").submit(function(event) {
	event.preventDefault();
	$('#loaderHalaman').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
	 var $form = $( this ),
        judul = $form.find( 'input[name="judul"]' ).val(),
		tag = $form.find( 'input[name="tag"]' ).val(),
		isi = tinyMCE.activeEditor.getContent({format : 'raw'}),
		parent = $form.find( 'select[name="parent"]' ).val(),
        url = $form.attr( 'action' );
	$form.find( 'input[name="judul"]' ).attr('disabled', true);
	$form.find( 'input[name="tag"]' ).attr('disabled', true);
	$form.find( 'select[name="parent"]' ).attr('disabled', true);
	$form.find( 'textarea[name="isi"]' ).attr('disabled', 'disabled');

    $.post( url, { judul: judul, 
					isi: isi,
					tag: tag,
					parent: parent },
      function( data ) {
		  $('#content').html(data);
      }
    );
  });
</script>
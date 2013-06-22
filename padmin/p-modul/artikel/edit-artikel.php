<?php
session_start();
include ("../class.php");
function sub($array, $prefix){
	$data=new data();
	$kategori=$data->relasi_kategori_artikel($_GET['id'], NULL, 'kategori');
	foreach($array['sub'] as $sub){
		?>
		<label for="<?php echo $sub['id']; ?>">
            <?php echo $prefix." ";?><input type="checkbox" name="kategori" id="<?php echo $sub['id']; ?>" value="<?php echo $sub['id']; ?>" <?php if ((isset($kat) && in_array($sub['id'],$kat)) || (isset($kategori) && in_array($sub['id'],$kategori))) echo 'checked="checked"'; ?> /><?php echo $sub['nama']; ?>
        </label>
		<?php
		if (array_key_exists('sub',$sub)){
			sub($sub, $prefix."&mdash; ");
		}
	}
}
?>
<script type="text/javascript">
$(document).ready(function() { 
	$('#tambahKategori').click(function() { 
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
			
		$.post('<?php echo $dir->modulDir().'/tambah-kategori-pop.php'; ?>', function(data) {
			$('#popup').html(data),
			$('.blockMsg').animate({
				opacity: 1,
				top: '15%'
			  });
		});
	});
	$('#tambahGambar').click(function() { 
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
	});
});
</script>
<img src="css/images/article.png" align="left" /> <h2 style="padding-top:5px;">&nbsp;Edit Artikel</h2>
<?php
$artikel=$data->artikel($_GET['id']);
if (isset($_POST['judul'])){
	$kat=explode(',',$_POST['kategori']);
	?><div class="hasilPost"><?php
	if ($_POST['judul']==""){
		echo "<strong>Oops...!Tampaknya data yang anda masukan belum valid seperti :</strong><ol>";
		echo "<li>Judul artikel masih kosong</li></ol>";
	} else {
		if ($update->artikel($_GET['id'],$_POST['judul'], $_POST['isi'], $_POST['tag'], $kat)){
			echo '<img src="css/images/check.gif" align="absmiddle" />  Artikel telah berhasil diubah';
			//unset($_POST);
		} else {
			echo '<img src="css/images/cross.png" align="absmiddle" /> Sesuatu kesalahan telah terjadi, apakah itu?';
		}
	}
	?></div><?php
}
?>
<form name="artikel" id="artikel" method="post" action="<?php echo $dir->modulDir();?>/edit-artikel.php?id=<?php echo $_GET['id']; ?>">
<table>
	<tr>
   	  
        <td><input type="text" name="judul" placeholder="Masukan Judul Artikel Disini" class="inputEdit" value="<?php if (isset($_POST['judul'])) echo $_POST['judul']; else echo $artikel[0]['nama']; ?>" /></td>
        <td valign="bottom">
        <h3>Kategori</h3>
        </div>
        </td>
    </tr>
    <tr>
    	<td>
		<textarea id="isi" name="isi"  style="width:600px;" placeholder="Tulis Artikel Disini"><?php if (isset($_POST['isi'])) echo stripslashes($_POST['isi']);  else echo $artikel[0]['isi']; ?></textarea>
        <div style="padding:5px 0 2px 0;text-align:right"><a href="javascript:void(0)" id="tambahGambar"><img src="css/images/image.png" border="0" /> </div>
        </td>
        <td valign="top"  rowspan="3" width="200">
        <div id="pilihKategori" style="max-height:300px;overflow-y:auto;overflow-x:hidden;">
        <?php
		$kategori=$data->relasi_kategori_artikel($_GET['id'], NULL, 'kategori');
		foreach($data->kategori_artikel() as $data){
			?>
			<label for="<?php echo $data['id']; ?>">
            	<input type="checkbox" name="kategori" id="<?php echo $data['id']; ?>" value="<?php echo $data['id']; ?>" <?php if ((isset($kat) && in_array($data['id'],$kat)) || in_array($data['id'],$kategori)) echo 'checked="checked"'; ?> /><?php echo $data['nama']; ?>
            </label>
            <?php
				if (array_key_exists('sub',$data)){
						sub($data, "&mdash; ");
					}
		}
		?>
        </div>
        <div style="padding:5px 0 2px 0;text-align:right"><a href="javascript:void(0)" id="tambahKategori">Tambah Kategori</a></div>
        </td>
    </tr>
    <tr>
    	<td>
        Keyword/Tag <em>(pisahkan oleh tanda koma)</em>
        </td>
    </tr>
    <tr>
    	<td><input name="tag" type="text" placeholder="Teknologi, Hiburan, dll" class="inputEdit" size="30" value="<?php if (isset($_POST['tag'])) echo $_POST['tag']; else echo $artikel[0]['kata_kunci']; ?>" /><em style="font-size:10px;"></em></td>
    </tr>
    <tr>
    	<td>
        <input type="submit" name="submit" value="Simpan Artikel" />
        <span id="loaderArtikel"></span>
        </td>
    </tr>
</table>
</form>
<script>
init('isi');
</script>
<script>
$("#artikel").submit(function(event) {
	event.preventDefault();
	$('#loaderArtikel').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
	 var $form = $( this ),
        judul = $form.find( 'input[name="judul"]' ).val(),
		tag = $form.find( 'input[name="tag"]' ).val(),
		isi = tinyMCE.activeEditor.getContent({format : 'raw'}),
        url = $form.attr( 'action' );
	$form.find( 'input[name="judul"]' ).attr('disabled', true);
	$form.find( 'input[name="tag"]' ).attr('disabled', true);
	$form.find( 'textarea[name="isi"]' ).attr('disabled', 'disabled');
	var kategori = [];
    $(':checkbox:checked').each(function(i){
      kategori[i] = $(this).val();
    });
	kat=kategori.join(',');
    $.post( url, { judul: judul, 
					isi: isi,
					tag: tag,
					kategori: kat },
      function( data ) {
		  $('#content').html(data);
      }
    );
  });
</script>
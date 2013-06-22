<?php
session_start();
include ("../class.php");
$album=$data->album($_GET['id']);
$edit=str_replace('&','.:.','edit-album.php?id='.$_GET['id']);
$edit=str_replace('?','.:','edit-album.php?id='.$_GET['id']);
?>
<img src="css/images/album.png" align="left" /> <h2 style="padding-top:0px;">&nbsp;<?php echo $album['nama']; ?> <span style="font-weight:normal;font-size:12px;">(<a href="<?php echo '?halaman=p-modul&path='.$dir->path().'&target='.$edit.''; ?>">Edit</a> | <a href="javascript:void(0)" onclick="konfirmasi('<?php echo $_GET['id']; ?>')">Tambahkan Gambar</a>)</span></h2>
<style type="text/css">
.dataImg a{
	text-decoration:none;
}
</style>
<div class="dataImg">
<?php
foreach($data->foto_album($_GET['id']) as $foto){
	?>
	<a href="javascript:void(0)" onclick="edit('<?php echo $_GET['id'];?>', '<?php echo $foto['foto'];?>')">
    <img  src="<?php echo dirname($dir->rootDir())."/pcontent/upload/album/gambar.php?img=".$foto['foto']."&size=150&r=H"; ?>" />
	</a>
    <?php
}
?>
</div>
<script>
function edit(album, foto){
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
			
		$.post('<?php echo $dir->modulDir().'/edit-foto.php?album=';?>'+album+'&id='+foto, function(data) {
			$('#popup').html(data),
			$('.blockMsg').animate({
				opacity: 1,
				top: '15%'
			  });
		});
}
function konfirmasi(id){
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
			
		$.post('<?php echo $dir->modulDir().'/upload-tab.php?id='; ?>'+id, function(data) {
			$('#popup').html(data),
			$('.blockMsg').animate({
				opacity: 1,
				top: '15%'
			  });
		});
}
</script>
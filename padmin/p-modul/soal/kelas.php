<?php
include ("../class.php");
?>
<img src="css/images/class.png" align="left" /> <h2 style="padding-top:3px;">&nbsp; Data Kelas <span style="font-size:12px;">| <a href="<?php echo '?halaman=p-modul&path='.$dir->path().'&target=';?>tambah-kelas.php">Tambah Kelas</a></span></h2>
<span id="loaderAlbum"></span>
<br>
<div id="data">
<table class="data" width="100%" cellpadding="0" cellspacing="0">
	<thead>
    	<tr>
            <td align="center" width="15%">Nama Kelas </td>
            <td align="center" width="45%">Deskripsi Kelas</td>
            <td align="center" width="15%">Tanggal Dibuat</td>
            <td align="center" width="15%">Tanggal Diubah</td>
            <td align="center" width="10%">Pengguna</td>
        </tr>
    </thead>
    <tbody>
    	<?php
		foreach($data->kelas() as $data){
		?>
    	<tr onclick="konfirmasi('<?php echo $data['id'];?>')">
            <td><?php echo $data['nama'];?></td>
            <td><?php echo $data['deskripsi'];?></td>
            <td align="right"><?php echo $data['tgl_masuk'];?></td>
            <td align="right"><?php echo $data['tgl_ubah'];?></td>
            <td><?php echo $data['pengguna'];?></td>
        </tr>
        <?php
		}
		?>
    </tbody>
    <tfoot>
    	<tr>
            <td align="center" width="15%">Nama Kelas </td>
            <td align="center" width="45%">Deskripsi Kelas</td>
            <td align="center" width="15%">Tanggal Dibuat</td>
            <td align="center" width="15%">Tanggal Diubah</td>
            <td align="center" width="10%">Pengguna</td>
        </tr>
    </tfoot>
</table>
</div>
<script>

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
			
		$.post('<?php echo $dir->modulDir().'/konfirmasi-kelas.php?id='; ?>'+id, function(data) {
			$('#popup').html(data),
			$('.blockMsg').animate({
				opacity: 1,
				top: '15%'
			  });
		});
}
</script>
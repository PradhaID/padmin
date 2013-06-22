<?php
include ("../class.php");
?>
<img src="css/images/media.png" align="left" /> <h2 style="padding-top:3px;">&nbsp; Data Media</h2>
<br>
<div id="data">
<table class="data" width="100%" cellpadding="0" cellspacing="0">
	<thead>
    	<tr>
        	<td align="center" width="10%"></td>
            <td align="center" width="25%">Nama File </td>
            <td align="center" width="15%">Ukuran</td>
            <td align="center" width="10%">Tipe File</td>
            <td align="center" width="20%">Tanggal Upload</td>
            <td align="center" width="10%">Pengguna</td>
        </tr>
    </thead>
    <tbody>
    	<?php
		foreach($data->media() as $data){
		?>
    	<tr onclick="konfirmasi('<?php echo $data['media'];?>')">
        	<td><?php
				if ($data['tipe']=="jpg" || $data['tipe']=="jpeg" || $data['tipe']=="png" || $data['tipe']=="gif"){
					?>
                    <img src="<?php echo dirname($dir->rootDir())."/pcontent/upload/gambar.php?img=".$data['media']."&size=60&r=H"; ?>" />
                    <?php
				}
				 ?>
            </td>
            <td><?php echo $data['nama'];?></td>
            <td align="right"><?php echo $data['ukuran']/1000;?>Kb</td>
            <td><?php echo $data['tipe'];?></td>
            <td align="right"><?php echo $data['tgl_upload'];?></td>
            <td><?php echo $data['pengguna'];?></td>
        </tr>
        <?php
		}
		?>
    </tbody>
    <tfoot>
    	<td align="center" width="10%"></td>
    	<td align="center" width="25%">Nama File </td>
        <td align="center" width="15%">Ukuran</td>
        <td align="center" width="10%">Tipe File</td>
        <td align="center" width="20%">Tanggal Upload</td>
        <td align="center" width="10%">Pengguna</td>
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
			
		$.post('<?php echo $dir->modulDir().'/konfirmasi.php?id='; ?>'+id, function(data) {
			$('#popup').html(data),
			$('.blockMsg').animate({
				opacity: 1,
				top: '15%'
			  });
		});
}
</script>
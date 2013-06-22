<?php
include ("../class.php");
?>
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
    	<tr onclick="detail('<?php echo $data['media'];?>')">
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
function detail(id){
	$("#upload").attr("class","");
	$("#pustaka").attr("class","aktif");
	$("#tab").css("-webkit-border-radius","5px 5px 5px 5px");
	$("#tab").css("-khtml-border-radius","5px 5px 5px 5px");
	$("#tab").css("-moz-border-radius","5px 5px 5px 5px");
	$("#tab").css("border-radius","5px 5px 5px 5px");
	$('#tab').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
	$.post('<?php echo $dir->modulDir().'/detail-tab.php?id='; ?>'+id, function(data) {
		$('#tab').html(data);
	});
}
</script>
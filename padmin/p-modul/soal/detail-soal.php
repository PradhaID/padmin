<?php
include ("../class.php");
?>
<img src="css/images/question.png" align="left" /> <h2 style="padding-top:3px;">&nbsp; Detail Soal <span style="font-size:12px;">(<a href="<?php echo '?halaman=p-modul&path='.$dir->path().'&target=';?>soal.php">Data Soal</a> | <a href="<?php echo '?halaman=p-modul&path='.$dir->path().'&target=';?>tambah-pertanyaan.php.:idSoal=<?php echo $_GET['id']; ?>">Tambah Pertanyaan</a>)</span></h2>
<span id="loaderSoal"></span>
<?php
    if (isset($_POST['status'])){
        $update->statusSoal($_GET['id'],$_POST['status']);
    }
?>
<table style="margin: 10px 5px;">
    <tr>
        <td>Soal</td>
        <td>:</td>
        <td><strong><?php $soal=$data->soal($_GET['id']); echo $soal['nama']; ?></strong></td>
    </tr>
    <tr>
        <td>Deskripsi Soal</td>
        <td>:</td>
        <td><?php echo $soal['deskripsi']; ?></td>
    </tr>
    <tr>
        <td>Waktu</td>
        <td>:</td>
        <td><?php echo $soal['waktu']; ?> Menit</td>
    </tr>
    <tr>
        <td>Kata Kunci</td>
        <td>:</td>
        <td><?php echo $soal['kata_kunci']; ?></td>
    </tr>
    <tr>
        <td>Status</td>
        <td>:</td>
        <td><select name="status" style="padding: 0;margin: 0;" onchange="updateStatus(<?php echo $_GET['id']; ?>)">
            <option value="konsep" <?php if ($soal['status']=="konsep"){ ?> selected="selected" <?php } ?>>Konsep</option>
            <option value="terbit" <?php if ($soal['status']=="terbit"){ ?> selected="selected" <?php } ?>>Terbit</option>
            </select> <span id="loaderStatus"></span>
        </td>
    </tr>
</table>
<br>
<div id="data">
<table class="data" width="100%" cellpadding="0" cellspacing="0">
    <tbody>
    	<?php
		$no=1;
		foreach($data->pertanyaan($_GET['id']) as $pertanyaan){
		?>
    	<tr onclick="konfirmasi('<?php echo $_GET['id'];?>', '<?php echo $pertanyaan['id_pertanyaan'];?>')">
            <td width="5" valign="top"><?php echo $no.". ";?></td>
            <td><?php echo $pertanyaan['pertanyaan'];?>
            	<?php
				echo "<br>";
				echo '<ol style="list-style-type: upper-alpha">';
				foreach($data->jawaban($pertanyaan['id_pertanyaan']) as $jawab){
					echo "<li>".$jawab['jawaban']."</li>";
				}
				echo "</ol>";
				?>
            </td>
        </tr>
        <?php
			$no++;
		}
		?>
    </tbody>
</table>
</div>
<script>

function konfirmasi(idSoal, idPertanyaan){
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
			
		$.post('<?php echo $dir->modulDir().'/konfirmasi-pertanyaan.php?idSoal='; ?>'+idSoal+'<?php echo '&idPertanyaan='; ?>'+idPertanyaan, function(data) {
			$('#popup').html(data),
			$('.blockMsg').animate({
				opacity: 1,
				top: '15%'
			  });
	});
}
    function updateStatus(id){
        $('#loaderStatus').html('<img src="css/images/loader.gif" align="absmiddle" style="max-height: 16px;"> <span style="font-size: 11px"> Silahkan Tunggu...</span>');
        var status= $('select[name="status"]').val();
        $.post( '<?php echo $dir->modulDir();?>/detail-soal.php?id='+id, { status: status },
            function( data ) {
                $('#loaderStatus').html('<img src="css/images/check.gif" align="absmiddle" style="max-height: 16px;">');
            });
    }
</script>
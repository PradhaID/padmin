<?php
include ("../class.php");
?>
<img src="css/images/question.png" align="left" /> <h2 style="padding-top:3px;">&nbsp; Data Nilai <span style="font-size:12px;">| <a href="<?php echo '?halaman=p-modul&path='.$dir->path().'&target=';?>soal.php">Kembali</a></span></h2>
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
            <td><?php echo ucfirst($soal['status']); ?></td>
        </tr>
    </table>

        <div style="text-align: right; padding: 10px;margin-top:-40px;">
            Tampilkan nilai untuk kelas :
            <select name="kelas" onchange="pilihKelas()">
                <option value="">Semua Kelas</option>
                <?php
                foreach($data->kelas() as $kelas){
                    ?><option value="<?php echo $kelas['id']; ?>" <?php if (isset($_GET['kelas']) && $_GET['kelas']==$kelas['id']) echo 'selected="selected"'; ?>><?php echo $kelas['nama']; ?></option><?php
                }
                ?>
            </select>
        </div>
<div id="data">
<table class="data" width="100%" cellpadding="0" cellspacing="0">
	<thead>
    	<tr>
            <td align="center" width="10%">NIS </td>
            <td align="center" width="20%">Nama</td>
            <td align="center" width="20%">Kelas</td>
            <td align="center" width="10%">Nilai</td>
            <td align="center" width="20%">Waktu Pengerjaan</td>
            <td align="center" width="15%">Tanggal Masuk</td>
        </tr>
    </thead>
    <tbody>
    	<?php
        $kls=null;
        if (isset($_GET['kelas']) && $_GET['kelas']!=""){
            $kls=$_GET['kelas'];
        }
        if (count($data->nilai($_GET['id'],null, $kls))==0){
            ?>
            <tr>
                <td colspan="5" align="center">Belum ada nilai untuk kelas/soal ini</td>
            </tr>
            <?php
        } else {
            foreach($data->nilai($_GET['id'], null, $kls) as $nilai){
                $siswa=$data->siswa($nilai['nis']);
                $kelas=$data->kelas($siswa['kelas']);
            ?>
            <tr>
                <td><?php echo $nilai['nis'];?></td>
                <td><?php echo $siswa['nama'];?></td>
                <td><?php echo $kelas['nama']; ?></td>
                <td align="center">
                    <?php
                        $benar=0;
                        foreach($data->detailNilai($nilai['id_nilai']) as $detail){
                            if ($detail['benar']=='benar'){
                                $benar=$benar+1;
                            }
                        }
                        echo number_format($benar/count($data->detailNilai($nilai['id_nilai']))*10,2,',','.');
                    ?>
                </td>
                <td align="right"><?php echo $nilai['waktu'];?></td>
                <td align="right"><?php echo $nilai['tgl_masuk'];?></td>
            </tr>
            <?php
            }
        }
		?>
    </tbody>
    <tfoot>
    	<tr>
            <td align="center" width="10%">NIS </td>
            <td align="center" width="20%">Nama</td>
            <td align="center" width="20%">Kelas</td>
            <td align="center" width="10%">Nilai</td>
            <td align="center" width="20%">Waktu Pengerjaan</td>
            <td align="center" width="15%">Tanggal Masuk</td>
        </tr>
    </tfoot>
</table>

</div>
<div style="text-align: right; padding: 10px;">
    <?php
    if (isset($_GET['kelas']) && $_GET['kelas']!=""){
        ?><a href="p-modul/soal/pdf-nilai.php?id=<?php echo $_GET['id']; ?>&kelas=<?php echo $_GET['kelas']; ?>">Download PDF</a><?php
    } else {
        ?><a href="p-modul/soal/pdf-nilai.php?id=<?php echo $_GET['id']; ?>">Download PDF</a><?php
    }
    ?>

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
			
		$.post('<?php echo $dir->modulDir().'/konfirmasi-soal.php?id='; ?>'+id, function(data) {
			$('#popup').html(data),
			$('.blockMsg').animate({
				opacity: 1,
				top: '15%'
			  });
		});
}
function pilihKelas(){
    <?php
    $nilai=str_replace('&','.:.','nilai.php?id='.$_GET['id'].'&kelas=');
    $nilai=str_replace('?','.:',$nilai);
    ?>
    var kelas= $('select[name="kelas"]').val();
    window.location='<?php echo '?halaman=p-modul&path='.$dir->path().'&target='.$nilai.''; ?>'+kelas;
}
</script>
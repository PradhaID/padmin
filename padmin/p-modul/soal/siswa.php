<?php
include ("../class.php");
function arraytolower($array, $include_keys=false) {
    if($include_keys) {
        foreach($array as $key => $value) {
            if(is_array($value))
                $array2[strtolower($key)] = arraytolower($value, $include_keys);
            else
                $array2[strtolower($key)] = strtolower($value);
        }
        $array = $array2;
    }
    else {
        foreach($array as $key => $value) {
            if(is_array($value))
                $array[$key] = arraytolower($value, $include_keys);
            else
                $array[$key] = strtolower($value);
        }
    }
    return $array;
}
?>
<script type="text/javascript">
<?php
$cari=str_replace('&','.:.','siswa.php?cari=');
$cari=str_replace('?','.:',$cari);
?>
function cari(){
    if(event.keyCode == 13){
        $('#loaderSiswa').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
        var cari=$('#cari').val();
        window.location='<?php echo '?halaman=p-modul&path='.$dir->path().'&target='.$cari.''; ?>'+cari;
    }

}
$('#tombolcari').click(function(){
	var cari=$('#cari').val();
        window.location='<?php echo '?halaman=p-modul&path='.$dir->path().'&target='.$cari.''; ?>'+cari;
});
</script>
<img src="css/images/student.png" align="left" /> <h2 style="padding-top:3px;">&nbsp; Data Siswa </h2>
<span id="loaderSiswa"></span>
<br>
<div style="text-align: right; padding: 10px;margin-top:-40px;">
    Cari :
    <input type="text" name="cari" id="cari" onkeyup="cari()" value="<?php if (isset($_GET['cari'])) echo $_GET['cari']; ?>"> <?php if (isset($_GET['cari'])) {?><a style="text-decoration: none" href="<?php echo '?halaman=p-modul&path='.$dir->path().'&target=siswa.php'; ?>">x</a><?php } ?> <input type="button" value="Cari" onclick="cari()" id="tombolcari">
</div>
<div id="data">
<table class="data" width="100%" cellpadding="0" cellspacing="0">
	<thead>
    	<tr>
            <td align="center" width="10%">No Induk </td>
            <td align="center" width="20%">Nama</td>
            <td align="center" width="20%">E-Mail</td>
            <td align="center" width="15%">Jenis Kelamin</td>
            <td align="center" width="15%">Tanggal Registrasi</td>
            <td align="center" width="20%">Status</td>
        </tr>
    </thead>
    <tbody>
    	<?php
        $hal=1;
        if (isset($_GET['hal'])){
            $hal=$_GET['hal'];
        }
        if (isset($_GET['cari'])){
            $siswa=$data->siswa();
            $ulangsiswa=$siswa;
        } else {
            $siswa=array_chunk($data->siswa(), 15);
            $ulangsiswa=$siswa[$hal-1];
        }
		foreach($ulangsiswa as $data){
            if (isset($_GET['cari'])){
                $result = preg_filter('~' . strtolower(preg_quote($_GET['cari'], '~')) . '~', null, arraytolower($data));
            }
            if (isset($_GET['cari']) && (int)$result>=1){
                ?>
                <tr onclick="konfirmasi('<?php echo $data['nis'];?>')">
                    <td align="center"><?php echo $data['nis'];?></td>
                    <td><?php echo $data['nama'];?></td>
                    <td><?php echo $data['email'];?></td>
                    <td><?php if ($data['jk']=="L") echo "Laki-laki"; else echo "Perempuan"; ?></td>
                    <td align="right"><?php echo $data['tgl_masuk'];?></td>
                    <td><?php if ($data['konfirmasi']!="valid") echo "Belum diValidasi"; else echo "Valid"; ?></td>
                </tr>
                <?php
            } else if (!isset($_GET['cari'])) {
                ?>
                <tr onclick="konfirmasi('<?php echo $data['nis'];?>')">
                    <td align="center"><?php echo $data['nis'];?></td>
                    <td><?php echo $data['nama'];?></td>
                    <td><?php echo $data['email'];?></td>
                    <td><?php if ($data['jk']=="L") echo "Laki-laki"; else echo "Perempuan"; ?></td>
                    <td align="right"><?php echo $data['tgl_masuk'];?></td>
                    <td><?php if ($data['konfirmasi']!="valid") echo "Belum diValidasi"; else echo "Valid"; ?></td>
                </tr>
                <?php
            }
        }
            ?>

    </tbody>
    <tfoot>
    	<tr>
            <td align="center" width="10%">No Induk </td>
            <td align="center" width="20%">Nama</td>
            <td align="center" width="20%">E-Mail</td>
            <td align="center" width="15%">Jenis Kelamin</td>
            <td align="center" width="15%">Tanggal Registrasi</td>
            <td align="center" width="20%">Status</td>
        </tr>
    </tfoot>
</table>
</div>
    <?php if (!isset($_GET['cari'])){?>
    <div style="padding: 10px;text-align: right;">Halaman:
        <?php
        $hit=1;
        while ($hit<=count($siswa)){
            if ($hal==$hit){
                echo $hit.' ';
            } else {
                $file=str_replace('&','.:.','siswa.php?hal='.$hit);
                $file=str_replace('?','.:',$file);
                echo '<a href="?halaman=p-modul&path='.$dir->path().'&target='.$file.'">'.$hit.'</a> ';
            }

            $hit++;
        }
        ?>
    </div>
    <?php } ?>
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
			
		$.post('<?php echo $dir->modulDir().'/konfirmasi-siswa.php?id='; ?>'+id, function(data) {
			$('#popup').html(data),
			$('.blockMsg').animate({
				opacity: 1,
				top: '15%'
			  });
		});
}

</script>
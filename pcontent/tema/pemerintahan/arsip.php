<div id="content" style="padding:20px;">
<h2 style="margin-bottom:10px;">Arsip Materi & Artikel</h2><hr/>
<?php
$halaman = array_chunk($func->artikel(), 5);
$no=0;
$hal=$_GET['id']-1;
if (isset($halaman[$hal])){
    foreach($halaman[$hal] as $artikel){
        echo '<div id="arsip">';
        $judul=str_replace($func->stringURL(),"-",$artikel['judul']);
        $judul=str_replace("---","-",$judul);
        $judul=str_replace("--","-",$judul);
        echo "<h2><a href=\"".$dir->rootDir()."artikel/".(int)$artikel['id']."/".$judul.".ayong\">".$artikel['judul']."</a></h2>";
        echo '<span style="padding:2px 8px;font-size:10px;">Ditulis oleh: <em>'.$artikel['pengguna'].'</em>, '.str_replace('<br>',' ',$artikel['tgl_masuk'])."</span>";
        echo '<div style="padding:5px 10px;">';
        $func->kutipan_artikel($artikel['isi'], 100);
        echo '<a href="'.$dir->rootDir()."artikel/".(int)$artikel['id']."/".$judul.'.ayong">Lebih lanjut &gt;&gt;</a>';
        echo '</div>';
        echo '</div>';
    }
} else {
    ?><div style="text-align: center"> Tidak ditemukan data pada halaman <?php echo $hal+1; ?></div><?php
}

?><div align="right"><?php
echo 'Halaman: ';
if (($hal+1)!=1){
	echo '<a href="'.$dir->rootDir().'arsip/'.($hal).'/data'.$func->ext().'">&lt;&lt;</a>';
}
for ($i=1; $i<=count($halaman); $i++){
	if ($i==$hal+1)
		echo $i;
	else
		echo '<a href="'.$dir->rootDir().'arsip/'.$i.'/data'.$func->ext().'" style="padding:0 5px;">'.$i.'</a>';
}
?></div>
</div>
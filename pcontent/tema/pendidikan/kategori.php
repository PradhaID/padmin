<div id="content" style="padding:20px;">
<?php
$kategori=$func->kategori_artikel($_GET['id']);
?>
<h2 style="margin-bottom:10px;">Kategori: <?php echo $kategori['nama']; ?></h2><hr/> 
<?php
$artikel=array();
foreach($func->relasi_kategori_artikel(null, $_GET['id']) as $id){
	array_push($artikel,$func->artikel($id['id_artikel']));
}
arsort($artikel);
$halaman = array_chunk($artikel, 5);
$hal=$_GET['hal']-1;
foreach($halaman[$hal] as $artikel){
	echo '<div id="arsip">';
	$judul=str_replace($func->stringURL(),"-",$artikel['judul']);
	$judul=str_replace("---","-",$judul);
	$judul=str_replace("--","-",$judul);
	echo '<h2><a href="'.$dir->rootDir().'artikel/'.(int)$artikel['id'].'/'.$judul.$func->ext().'">'.$artikel['judul'].'</a></h2>';
	echo '<span style="padding:2px 8px;font-size:10px;">Ditulis oleh: <em>'.$artikel['pengguna'].'</em>, '.str_replace('<br>',' ',$artikel['tgl_masuk'])."</span>";
	echo '<div style="padding:5px 10px;">';
	$func->kutipan_artikel($artikel['isi'], 100);
	echo '<a href="'.$dir->rootDir()."artikel/".(int)$artikel['id']."/".$judul.$func->ext().'">Lebih lanjut &gt;&gt;</a>';
	echo '</div>';
	echo '</div>';
}
/*$no=0;
$hal=$_GET['id']-1;
foreach($halaman[$hal] as $artikel){
	echo '<div id="arsip">';
	$judul=str_replace($func->stringURL(),"_",$artikel['judul']);
	echo "<h2><a href=\"".$dir->rootDir()."artikel/".(int)$artikel['id']."/".$judul."\">".$artikel['judul']."</a></h2>";
	echo '<span style="padding:2px 8px;font-size:10px;">Ditulis oleh: <em>'.$artikel['pengguna'].'</em>, '.str_replace('<br>',' ',$artikel['tgl_masuk'])."</span>";
	echo '<div style="padding:5px 10px;">';
	$func->kutipan_artikel($artikel['isi'], 100);
	echo '<a href="'.$dir->rootDir()."artikel/".(int)$artikel['id']."/".$judul.'">Lebih lanjut &gt;&gt;</a>';
	echo '</div>';
	echo '</div>';
}*/

?><div align="right"><?php
if (count($halaman)>=1){
	echo 'Halaman: ';
}
if (($hal+1)!=1){
	echo '<a href="'.$dir->rootDir().'arsip/'.($hal).'/data">&lt;&lt;</a>';
}
$judul=str_replace($func->stringURL(),"-",$kategori['nama']);
	$judul=str_replace("---","-",$judul);
	$judul=str_replace("--","-",$judul);
for ($i=1; $i<=count($halaman); $i++){
	if ($i==$hal+1)
		echo $i;
	else
		echo '<a href="'.$dir->rootDir().'kategori/'.$_GET['id'].'/'.$i.'/'.$judul.$func->ext().'" style="padding:0 5px;">'.$i.'</a>';
}
?></div>
</div>
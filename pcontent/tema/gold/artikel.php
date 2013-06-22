<?php 
$artikel=$func->artikel($_GET['id']); 
$seoTag=explode(',',$artikel['kata_kunci']);
$seoTag=str_replace(' ', '-',array_map("trim",$seoTag));
function tambahTag($a){
	return ("tag-$a ");
}
$seoTag=array_map("tambahTag",$seoTag);
?>
<div id="content" class="<?php echo implode("",$seoTag); ?>" style="padding:20px;">
    <h2><?php echo $artikel['judul']; ?></h2>
	<?php
	echo '<span style="padding:2px 8px;font-size:10px;">Ditulis oleh: <em>'.$artikel['pengguna'].'</em>, '.str_replace('<br>',' ',$artikel['tgl_masuk'])."</span>";
	?>
	<?php $func->share_social(); ?>
    <?php echo $artikel['isi']; ?>
	<strong>Kategori: </strong>
	<?php
	
		$no=1;
		foreach($func->relasi_kategori_artikel($_GET['id']) as $id){
			$kategori=$func->kategori_artikel($id['id_kategori']);
			$judul=str_replace($func->stringURL(),"-",$kategori['nama']);
			$judul=str_replace("---","-",$judul);
			$judul=str_replace("--","-",$judul); 
			if ($no<count($func->relasi_kategori_artikel($_GET['id']))){
				echo '<a href="'.$dir->rootDir().'kategori/'.(int)$kategori['id'].'/1/'.$judul.'.ayong">'.$kategori['nama'].'</a>, ';
			} else echo '<a href="'.$dir->rootDir().'kategori/'.(int)$kategori['id'].'/1/'.$judul.'.ayong">'.$kategori['nama']."</a>.";
			$no++;
		}
	?>
	<strong>| Tag: </strong><em><?php echo $artikel['kata_kunci']; ?></em>
    <div style="clear:both;"></div>
</div>
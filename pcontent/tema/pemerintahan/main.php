<?php
$func->slider();
?>
<div id="content">
	<div  id="post" style="float:left;width:700px;padding:5px 10px;">
	<?php
	$no=0;
	foreach($func->artikel() as $artikel){
		if ($no<5){
            if ($no<2){
                ?><div id="arsip" style="float: left; width: 339px;margin-right:10px;<?php if ($no==0){echo 'border-right:1px solid #ccc';} ?>"><?php
                echo '<h2><a href="'.$dir->rootDir().'artikel/'.(int)$artikel['id'].'/'.$func->urlTitle($artikel['judul']).$func->ext().'">'.$artikel['judul'].'</a></h2>';
                echo '<span style="padding:2px 8px;font-size:10px;">Ditulis oleh: <em>'.$artikel['pengguna'].'</em>, '.str_replace('<br>',' ',$artikel['tgl_masuk'])."</span>";
                echo '<div style="padding:5px 10px;">';
                $func->kutipan_artikel($artikel['isi'], 50, 180);
                echo '<a href="'.$dir->rootDir().'artikel/'.(int)$artikel['id'].'/'.$func->urlTitle($artikel['judul']).$func->ext().'">Lebih lanjut &gt;&gt;</a>';
                echo '</div>';
                ?></div><?php
                if ($no==1){
                    echo '<div style="border-bottom: 1px solid #ccc;clear: both;padding: 5px;"></div> ';
                }
            } else {
                ?><div id="arsip" style="float: left; width: 225px;margin:10px 0;padding-right: 3px;<?php if ($no==2 || $no==3){echo 'border-right:1px solid #ccc;margin-right:7px;';} ?>"><?php
                echo '<h2><a href="'.$dir->rootDir().'artikel/'.(int)$artikel['id'].'/'.$func->urlTitle($artikel['judul']).$func->ext().'">'.$artikel['judul'].'</a></h2>';
                echo '<span style="padding:2px 8px;font-size:10px;">Ditulis oleh: <em>'.$artikel['pengguna'].'</em>, '.str_replace('<br>',' ',$artikel['tgl_masuk'])."</span>";
                echo '<div style="padding:5px 10px;">';
                $func->kutipan_artikel($artikel['isi'], 30, 100);
                echo '<a href="'.$dir->rootDir()."artikel/".(int)$artikel['id']."/".$func->urlTitle($artikel['judul']).$func->ext().'">Lebih lanjut &gt;&gt;</a>';
                echo '</div>';
                ?></div><?php
            }
		}
		$no++;
	}
	?>

    <div style="text-align: center  ;clear: both;border-top: 1px solid #CCCCCC;margin-top: 10px;"><a href="<?php echo $dir->rootDir().'arsip/2/data'.$func->ext(); ?>">Artikel & Materi Lama</a></span></div>
    </div>
    <div id="sidebar" style="float:right;width:245px;padding: 5px 10px">

    <h3>Tulisan Terbaru</h3>
        <?php
        $no=0;
        echo '<ul style="margin:0;padding:0 0 0 20px;">';
        foreach($func->artikel() as $artikel){
		    if ($no<5){
                echo '<li><a href="'.$dir->rootDir().'artikel/'.(int)$artikel['id'].'/'.$func->urlTitle($artikel['judul']).$func->ext().'">'.$artikel['judul'].'</a></li>';
            }
            $no++;
        }
        echo "</ul>";
        ?>
    </div>
    <div style="clear:both;"></div>
</div>

<?php
$func->slider();
?>
<div id="content">
    <div id="post" style="float:left;width:205px;">
    <h3>News & Event <span style="font-size:12px;font-weight:normal">| <a href="<?php echo $dir->rootDir().'arsip/1/data.ayong'; ?>">arsip</a></span></h3> 
    <?php
    echo "<ul>";
	$tampil=0;
	$artikel=$func->artikel();
	while($tampil<5){
		$judul=str_replace($func->stringURL(),"-",trim($artikel[$tampil]['judul']));
		$judul=str_replace("---","-",$judul);
		$judul=str_replace("--","-",$judul);
		echo "<li><a href=\"".$dir->rootDir()."artikel/".(int)$artikel[$tampil]['id']."/".$judul.".ayong\">".$artikel[$tampil]['judul']."</a></li>";
		$tampil++;
	}
    echo "</ul>";
    ?>
    </div>
    <div style="float:right;">
    <div class='img'>  
        <a href="http://hotelayonglinggarjati.com/halaman/8/Standard-Room.ayong"><img src="http://www.hotelayonglinggarjati.com/pcontent/upload/902abb0f21d1639e968062cef818db71.jpg"  alt="Standard Room"/></a>
        <div class='deskripsi'>  
            <p class='isi_deskripsi'>Standard Room</p> 
        </div>
    </div>  
    
    <div class='img'>  
        <a href="http://www.hotelayonglinggarjati.com/halaman/9/Deluxe-Room.ayong"><img src="http://www.hotelayonglinggarjati.com/pcontent/upload/07255ca3a904cdb94d40af37affb4778.jpg"  alt="Deluxe Room"/></a>
        <div class='deskripsi'>  
            <p class='isi_deskripsi'>Deluxe Room</p> 
        </div>
    </div> 
    
    <div class='img'>  
        <a href="http://www.hotelayonglinggarjati.com/halaman/10/Family-Room.ayong"><img src="http://www.hotelayonglinggarjati.com/pcontent/upload/10eb6268a9efb8adafeb0c0aed9b032f.jpg"  alt="Family Room"/> </a>
        <div class='deskripsi'>  
            <p class='isi_deskripsi'>Family Room</p> 
        </div>
    </div>  
    
     <div class='img'> 
			 
        <a href="http://www.hotelayonglinggarjati.com/halaman/11/Suite-Room.ayong"><img src="http://www.hotelayonglinggarjati.com/pcontent/upload/538ce2bf39bc4dffb3dd6cac76f77b72.jpg" alt="Suite Room" /></a>
        <div class='deskripsi'>  
            <p class='isi_deskripsi'>Suite Room</p> 
        </div>
    </div> 
    </div>
    <div style="clear:both;"></div>
</div>

<?php
$func->slider();
?>
<div id="content">
    <div id="post" style="float:left;width:205px;">
    <h3>News & Event</h3> 
    <?php
    echo "<ul>";
    foreach ($func->artikel() as $artikel){
		$judul=str_replace($func->stringURL(),"_",$artikel['judul']);
        echo "<li><a href=\"".$dir->rootDir()."artikel/".(int)$artikel['id']."/".$judul."\">".$artikel['judul']."</a></li>";
    }
    echo "</ul>";
    ?>
    </div>
    <div style="float:right;">
    <div class='img'>  
        <img src="http://www.hotelayonglinggarjati.com/pcontent/upload/902abb0f21d1639e968062cef818db71.jpg"/>  
        <div class='deskripsi'>  
            <p class='isi_deskripsi'>Standard Room</p> 
        </div>
    </div>  
    
    <div class='img'>  
        <img src="http://www.hotelayonglinggarjati.com/pcontent/upload/07255ca3a904cdb94d40af37affb4778.jpg"/>  
        <div class='deskripsi'>  
            <p class='isi_deskripsi'>Deluxe Room</p> 
        </div>
    </div> 
    
    <div class='img'>  
        <img src="http://www.hotelayonglinggarjati.com/pcontent/upload/10eb6268a9efb8adafeb0c0aed9b032f.jpg"/> 
        <div class='deskripsi'>  
            <p class='isi_deskripsi'>Family Room</p> 
        </div>
    </div>  
    
     <div class='img'>  
        <img src="http://www.hotelayonglinggarjati.com/pcontent/upload/538ce2bf39bc4dffb3dd6cac76f77b72.jpg" />
        <div class='deskripsi'>  
            <p class='isi_deskripsi'>Suite Room</p> 
        </div>
    </div> 
    
    
    </div>
    <div style="clear:both;"></div>
</div>
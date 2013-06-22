<div id="content" style="padding:20px;">
    <?php
	$artikel=$func->artikel($_GET['id']);
        
    ?>
    <h2><?php echo $artikel['judul']; ?></h2>
    <?php echo $artikel['isi']; ?>
    <div style="clear:both;"></div>
</div>
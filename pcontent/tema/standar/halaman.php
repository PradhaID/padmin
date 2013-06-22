<div id="content" style="padding:20px;">
    <?php
	$halaman=$func->halaman($_GET['id']);
        
    ?>
    <h2><?php echo $halaman['judul']; ?></h2>
    <?php echo $halaman['isi']; ?>
    <div style="clear:both;"></div>
</div>
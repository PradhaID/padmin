<div id="content" style="padding:20px;">
    <?php
	$album=$func->album($_GET['id']);
        
    ?>
	<h2><?php echo $album['nama']; ?></h2>
	<?php echo $album['deskripsi']; ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $dir->rootDir().$dir->temaDir().'/css/jquery.ad-gallery.css'; ?>">
	<script type="text/javascript" src="<?php echo $dir->rootDir().$dir->temaDir().'/js/jquery.ad-gallery.js'; ?>"></script>
	<script type="text/javascript">
	$(function() {
		var galleries = $('.ad-gallery').adGallery();
		galleries[0].settings.effect = 'fade';
	});
	
	</script>
	<style type="text/css">
	.ad-gallery{
		width:95%;
		margin:0 auto;
	}
	h2 {
		margin-top: 0;
		margin-bottom: 0;
		padding: 0;
	}
	h3 {
		margin-top: 1.2em;
		margin-bottom: 0;
		padding: 0;
	}
	ul {
		list-style-image:url(list-style.gif);
	}
	pre {
		font-family: "Lucida Console", "Courier New", Verdana;
		border: 1px solid #CCC;
		background: #f2f2f2;
		padding: 10px;
	}
	code {
		font-family: "Lucida Console", "Courier New", Verdana;
		margin: 0;
		padding: 0;
	}

	</style>
    
	<?php $func->share_social(); ?>
	<div id="gallery" class="ad-gallery">
      <div class="ad-image-wrapper">
      </div>
      <div class="ad-controls">
      </div>
      <div class="ad-nav">
        <div class="ad-thumbs">
			<ul class="ad-thumb-list">
	
	<?php
	foreach ($func->foto_album($album['id']) as $foto){
		?>
		<li>
            <a href="<?php echo $dir->rootDir().'pcontent/upload/album/'.$foto['foto']; ?>" >
				<img src="<?php echo $dir->rootDir().'pcontent/upload/album/gambar.php?img='.$foto['foto'].'&size=80&r=H'; ?>" title="<?php echo $foto['nama']; ?>" alt="<?php echo $foto['deskripsi']; ?>">
            </a>
        </li>
		<?php
		//echo '<img src="'.$dir->rootDir().'pcontent/upload/album/gambar.php?img='.$foto['foto'].'&size=100&r=H" style="margin:5px;">';
	}
	?>
			</ul>
        </div>
      </div>
    </div>
    <div style="clear:both;"></div>
</div>
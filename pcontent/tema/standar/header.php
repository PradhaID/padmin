<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="<?php echo $dir->rootDir().$dir->temaDir().'/styles.css'; ?>" media="all">
<meta name="keywords" content="<?php echo $situs['kata_kunci']; ?>">
<meta name="description" content="<?php echo $situs['deskripsi']; ?>">
<title><?php echo $situs['title']; ?></title>
<script type="text/javascript" src="<?php echo $dir->rootDir()."pincludes/js/jquery.js"; ?>"></script>
<?php $func->sliderScript(); ?>
<script type="text/javascript" src="<?php echo $dir->rootDir().$dir->temaDir().'/js/menu.js'; ?>"></script>


</head>

<body>
<div id="layout">
	<div id="header">
    	<div class="left">
        	<h1><?php echo $situs['judul']; ?></h1>
            <h2><?php echo $situs['slogan']; ?></h2>
        </div>
    
        <div class="right">
        <p><a href=""><img src="<?php echo $dir->rootDir().$dir->temaDir();?>/img/facebook.png" style="float:left;margin-right:3px;">Facebook</a> </p>
		<p><a href=""><img src="<?php echo $dir->rootDir().$dir->temaDir();?>/img/twitter.png" style="float:left;margin-right:3px;"> Twitter</a></p>
        </div>
        <div style="clear:both;"></div>
        
    </div>
    <div id="nav">
    <?php 
	$func->halaman(NULL, true);
	?>
	</div>
    
<?php session_start();ob_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="<?php echo $dir->rootDir().$dir->temaDir().'/styles.css'; ?>" media="all">
<meta name="keywords" content="<?php echo $situs['kata_kunci']; ?>, <?php echo $situs['title']; ?>">
<meta name="description" content="<?php echo $situs['deskripsi']; ?>">
<meta name="author" content="Aditya Yudha Pradhana, adityudhna@gmail.com" />
<meta name="revisit-after" content="3 days" />
<meta name="revised" content="Aditya Yudha Pradhana, <?php echo date('d/M/Y'); ?>" />
<meta name="ROBOTS" content="INDEX, FOLLOW" />
<meta name="ROBOTS" content="all" />
<meta name="copyright" content="Copyright 2012" />
<meta name="Designer" content="Aditya Yudha Pradhana" />
<meta name="Distribution" content="Global" />
<meta name="msnbot" content="NOODP" />
<meta name='MSSmartTagsPreventParsing' />
<meta name="generator" content="Padmin 1.0.0" />
<meta name="Title" content="<?php echo $situs['title']; ?>" />
<link rel="canonical" href="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />

<META NAME="geo.position" CONTENT="-6.8829;108.4864">
<META NAME="geo.country" CONTENT="ID">
<META NAME="geo.region" CONTENT="ID-JB">
<META NAME="geo.placename" CONTENT="Subang">

<meta property='fb:admins' content='100000581586277'  />
<meta property="og:type" content="hotel" />
<meta property="og:title" content="<?php echo $situs['title']; ?>" />
<meta property="og:description" content="<?php echo $situs['deskripsi']; ?>" />
<meta property="og:latitude" content="-6.88289" />
<meta property="og:longitude" content="108.4863569" />
<meta property="og:street-address" content="Subang" />
<meta property="og:locality" content="Subang" />
<meta property="og:region" content="ID-JB" />
<meta property="og:postal-code" content="45556" />
<meta property="og:app_id" content="340176079380484" />
<meta property="og:url" content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
<meta property="og:site_name" content="www.bpmp-kabsubang.com" />

<link rel="shortcut icon" href="<?php echo $dir->rootDir().$dir->temaDir().'/favicon.ico'; ?>" />
<title><?php echo $situs['title']; ?></title>
<script type="text/javascript" src="<?php echo $dir->rootDir()."pincludes/js/jquery.js"; ?>"></script>
<?php $func->sliderScript(); ?>
<?php $func->analytic(); ?>

<script type="text/javascript" src="<?php echo $dir->rootDir().$dir->temaDir().'/js/menu.js'; ?>"></script>

</head>

<body>
<div id="layout">
	<div id="header">
    	<div class="left">
            <img src="<?php echo $dir->rootDir().$dir->temaDir(); ?>/img/logo.png" align="left" style="margin-right:-10px;">
        	<h1>&nbsp;&nbsp;<?php echo $situs['judul']; ?></h1>
            <h2>&nbsp;&nbsp;<?php echo $situs['slogan']; ?></h2>
        </div>
        <div class="right">
        <!--<p><a href="https://www.facebook.com/HotelAyongLinggarjati" target="_blank"><img src="<?php echo $dir->rootDir().$dir->temaDir();?>/img/facebook.png" style="float:left;margin-right:3px;">Facebook</a> </p>
		<p><a href="http://twitter.com/HotelAyong"><img src="<?php echo $dir->rootDir().$dir->temaDir();?>/img/twitter.png" style="float:left;margin-right:3px;"> Twitter</a></p>
        -->
        </div>
        <div style="clear:both;"></div>
        
    </div>
    <div id="nav">
    <?php 
	$func->halaman(NULL, true);
	?>
	</div>
    
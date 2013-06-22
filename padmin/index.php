<?php
session_start();
ob_start();
include ("../pincludes/inc.koneksi.php");
include ("class/class.sesi.php");
include ("class/class.data.php");
$sesi=new sesi();

if (!$sesi->cekSesi()){
	header("Location:login.php?login=belumlogin&url=http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>pAdmin</title>
<link href="css/html.css" rel="stylesheet" type="text/css" media="all">
<link href="css/id.css" rel="stylesheet" type="text/css" media="all">
<link href="css/class.css" rel="stylesheet" type="text/css" media="all">
<link href="css/form.css" rel="stylesheet" type="text/css" media="all">

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.blockUI.js"></script>
<script type="text/javascript" src="js/actions.js"></script>
<script type="text/javascript" src="js/tinymce/tiny_mce.js"></script>
<script type="text/javascript" src="js/tinyMCE.init.js"></script>
<script type="text/javascript">
        $(document).ready(function() {

            $(".user").click(function(e) {
                e.preventDefault();
                $("fieldset#user_menu").toggle();
                $(".user").toggleClass("menu-open");
            });

            $("fieldset#signin_menu").mouseup(function() {
                return false
            });
            $(document).mouseup(function(e) {
                if($(e.target).parent("a.user").length==0) {
                    $(".user").removeClass("menu-open");
                    $("fieldset#user_menu").hide();
                }
            });            

        });
</script>
</head>

<body>
<?php
$data=new data();
?>
	<div id="header">
    	<div id="headerleft">
        	<div id="home"><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/padmin/"> &nbsp;&nbsp;&nbsp;&nbsp;</a></div>
		</div>
        <div id="headerleft"><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/" target="_blank"  style="color:#ccc;text-decoration: none" ><?php echo $_SERVER['HTTP_HOST']; ?></a></div>
        <div id="headerleft"><a href="http://padmin.pradhana.net/" style="color:#ccc;text-decoration: none">PAdministrator</a></div>
    	<div id="usersession">
        	<a href="javascript:void(0)" class="user" style="text-decoration:none;color:#ccc;">Halo...!<?php echo $sesi->namaPengguna(); ?> :)</a>
        </div>
        <fieldset id="user_menu">
        	<p align="right"><a href="index.php?halaman=p-modul&path=p-modul/pengguna&target=pengaturan-pengguna.php">Pengaturan Pengguna</a></p>
            <p align="right"><a href="index.php?halaman=p-modul&path=p-modul/pengguna&target=ubah-password.php">Ubah Password</a></p>
            <p align="right"><a href="logout.php">Keluar</a></p>
        </fieldset>
        
	</div>
    <div id="navigasi">
    	<div id="title">Menu Utama</div>
        <div id="wrap">
        <ul>
        <?php
        foreach(glob('p-modul/*', GLOB_ONLYDIR) as $path) {
            $modul=explode('/',$path);
            $dir=$modul[1];
            if (in_array("config.txt",scandir($path))){
                $datamodul = parse_ini_file($path."/config.txt");
                //print_r($ini_array);
                echo '<li class="page_item">';
                echo '<a href="?halaman=p-modul&path='.$path.'&target='.$datamodul['url'].'">'.$datamodul['namamodul'].'</a>';
                echo '<ul>';
                foreach($datamodul['menu'] as $menu){
                    $menu=explode('|',$menu);
                    $url=str_replace('&','.:.',$menu[1]);
                    $url=str_replace('?','.:',$url);
                    echo '<li class="page_item"><a href="?halaman=p-modul&path='.$path.'&target='.$url.'">'.$menu[0].'</a></li>';
                }
                echo '</ul>';
                echo '</li>';
            }
        }
        ?>
        </ul>
        </div>
        <?php
		if (scandir('modul')>=1){
			?>
            <div id="title">Modul</div>
            <div id="wrap">
            <ul>
            <?php
			foreach(glob('modul/*', GLOB_ONLYDIR) as $path) {
				$modul=explode('/',$path);
				$dir=$modul[1];
				if (in_array("config.txt",scandir($path))){
					$datamodul = parse_ini_file($path."/config.txt");
					//print_r($ini_array);
					echo '<li class="page_item">';
					echo '<a href="">'.$datamodul['namamodul'].'</a>';
					echo '<ul>';
					foreach($datamodul['menu'] as $menu){
						$menu=explode('|',$menu);
						$url=str_replace('&','.:.',$menu[1]);
						$url=str_replace('?','.:',$url);
						echo '<li class="page_item"><a href="?halaman=modul&path='.$path.'&target='.$url.'">'.$menu[0].'</a></li>';
					}
					echo '</ul>';
					echo '</li>';
				}
			}
			?>
            </ul>
            </div>
            <?php
		}
		?>
    </div>
    <div id="content">
    <?php
	if (isset($_GET['halaman']) && $_GET['halaman']=="modul"){
		$target=str_replace('.:.','&',$_GET['target']);
		$target=str_replace('.:','?',$target);
		$path=$_GET['path'];
		?>
        <script>
			$('#content').html('<center><br/><br/><br/><br/><img src="css/images/loader.gif" align="absmiddle"> <br>Silahkan Tunggu...</center>');
			$.post('<?php echo $path.'/'.$target; ?>', function(data) {
				$('#content').html(data);
			});
		</script>
        <?php
	} else if (isset($_GET['halaman']) && $_GET['halaman']=="p-modul"){
		$target=str_replace('.:.','&',$_GET['target']);
		$target=str_replace('.:','?',$target);
		$path=$_GET['path'];
		?>
        <script>
			$('#content').html('<center><br/><br/><br/><br/><img src="css/images/loader.gif" align="absmiddle"> <br>Silahkan Tunggu...</center>');
			$.post('<?php echo $path.'/'.$target; ?>', function(data) {
				
				$('#content').html(data);
			});
			
		</script>
        <?php
	} else {
        ?>
        <div id="widget-odd">
            <div id="widget-title">Status Lisensi</div>
            <div id="widget-content">Status lisensi PAdmin pada <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>" target="_blank"><?php echo $_SERVER['HTTP_HOST']; ?></a> masih pending</div>
        </div>
        <div id="widget-even">
            <div id="widget-title">Data Artikel</div>
            <div id="widget-content">
                <?php
                    $no=1;
                    foreach ($data->artikel() as $artikel){
                        echo "<ul>";
                        if ($no<=10){
                            echo '<li><a href="" target="_blank">'.$artikel['nama']."</a></li>";
                        }
                        echo "</ul>";
                        $no++;
                    }
                ?>
            </div>
        </div>
        
        <?php
    }
	?>
    
    </div>
    </div>
</body>
</html>
<?php
class func{
	public function head(){
		$dir=new dir();
		$func=new func();
		$situs=$func->situs();
		return include($dir->temaDir()."/header.php");
	}
	public function content($id=NULL, $limit=5){
		$dir=new dir();
        $validasi=new validasi();
		$func=new func();
		if (isset($_GET['content']) && $_GET['content']=="artikel"){
			return include($dir->temaDir()."/artikel.php");
		} else if (isset($_GET['content']) && $_GET['content']=="halaman"){
			return include($dir->temaDir()."/halaman.php");
		} else if (isset($_GET['content']) && $_GET['content']=="album"){
			return include($dir->temaDir()."/album.php");
		} else if (isset($_GET['content']) && $_GET['content']=="arsip"){
			return include($dir->temaDir()."/arsip.php");
		} else if (isset($_GET['content']) && $_GET['content']=="kategori"){
			return include($dir->temaDir()."/kategori.php");
		} else if (isset($_GET['content']) && $_GET['content']=="registrasi"){
            return include($dir->temaDir()."/register.php");
        } else if (isset($_GET['content']) && $_GET['content']=="login"){
            return include($dir->temaDir()."/login.php");
        } else if (isset($_GET['content']) && $_GET['content']=="logout"){
            return include($dir->temaDir()."/logout.php");
        } else if (isset($_GET['content']) && $_GET['content']=="lupa"){
            return include($dir->temaDir()."/lupa.php");
        } else if (isset($_GET['content']) && $_GET['content']=="profil"){
            return include($dir->temaDir()."/profil.php");
        } else if (isset($_GET['content']) && $_GET['content']=="konfirmasi"){
            return include($dir->temaDir()."/konfirmasi.php");
        } else if (isset($_GET['content']) && $_GET['content']=="soal"){
			return include($dir->temaDir()."/soal.php");
		} else {
			return include($dir->temaDir()."/main.php");
		}
	}
	public function foot(){
		$dir=new dir();
		$func=new func();
		return include($dir->temaDir()."/footer.php");
	}
	public function situs(){
		$keyword=mysql_fetch_assoc(mysql_query("SELECT * FROM situs"));
		$data['judul']=$keyword['judul'];
		$data['slogan']=$keyword['slogan'];
		if (isset($_GET['content']) && $_GET['content']=="artikel"){
			$artikel=mysql_fetch_assoc(mysql_query("SELECT * FROM artikel WHERE id_artikel='$_GET[id]'"));
			$data['title']=$artikel['judul']." | ".$data['judul'];
			$data['deskripsi']=strip_tags($artikel['isi']);
			$data['kata_kunci']=$artikel['kata_kunci'];
		} else if (isset($_GET['content']) && $_GET['content']=="halaman"){
			$halaman=mysql_fetch_assoc(mysql_query("SELECT * FROM halaman WHERE id_halaman='$_GET[id]'"));
			$data['title']=$halaman['judul']." | ".$data['judul'];
			$data['deskripsi']=strip_tags($halaman['isi']);
			$data['kata_kunci']=$halaman['kata_kunci'];
		} else if (isset($_GET['content']) && $_GET['content']=="album"){
			$album=mysql_fetch_assoc(mysql_query("SELECT * FROM album WHERE id_album='$_GET[id]'"));
			$data['title']=$album['nama']." | ".$data['judul'];
			$data['deskripsi']=strip_tags($album['deskripsi']);
			$data['kata_kunci']=$album['kata_kunci'];
		} else if (isset($_GET['content']) && $_GET['content']=="arsip"){
			$data['title']="Arsip | ".$data['judul'];
			$data['deskripsi']="Arsip";
			$data['kata_kunci']="Arsip Tulisan";
		} else if (isset($_GET['content']) && $_GET['content']=="kategori"){
			$data['title']="Kategori | ".$data['judul'];
			$data['deskripsi']="Kategori Artikel";
			$data['kata_kunci']="Kategori Tulisan";
		} else if (isset($_GET['content']) && $_GET['content']=="registrasi"){
            $data['title']="Registrasi | ".$data['judul'];
            $data['deskripsi']="Registrasi";
            $data['kata_kunci']="Registrasi";
        } else if (isset($_GET['content']) && $_GET['content']=="login"){
            $data['title']="Login | ".$data['judul'];
            $data['deskripsi']="Login";
            $data['kata_kunci']="Login";
        } else if (isset($_GET['content']) && $_GET['content']=="soal"){
			$soal=mysql_fetch_assoc(mysql_query("SELECT * FROM soal WHERE id_soal='$_GET[id]'"));
			$data['title']=$soal['nama']." | ".$data['judul'];
			$data['deskripsi']=$soal['deskripsi'];
			$data['kata_kunci']=$soal['kata_kunci'];
		} else {
			$data['title']=$data['judul']." | ".$data['slogan'];
			$data['deskripsi']=$keyword['deskripsi'];
			$data['kata_kunci']=$keyword['kata_kunci'];
		}
		$data['analytic']=$keyword['analytic'];
		return $data;
	}
	public function artikel($id=NULL){
		$array=array();
		if (is_null($id)){
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM artikel WHERE status!='hapus' ORDER BY UNIX_TIMESTAMP(tgl_masuk) DESC") or die (mysql_error());
		} else {
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM artikel WHERE id_artikel='$id' AND status!='hapus'") or die (mysql_error());
		}
		while ($hasil=mysql_fetch_assoc($query)){
			$data['id']=$hasil['id_artikel'];
			$data['judul']=$hasil['judul'];
			$data['isi']=$hasil['isi'];
			$data['kata_kunci']=$hasil['kata_kunci'];
			$data['tgl_masuk']=$hasil['tgl_masuk'];
			$data['tgl_ubah']=$hasil['tgl_ubah'];
			$data['pengguna']=$hasil['username'];
			$data['status']=$hasil['status'];
			array_push($array,$data);
		}
		if (is_null($id))
			return $array;
		else return $data;
	}
	function relasi_kategori_artikel($id_artikel=NULL, $id_kategori=NULL, $target=NULL){
		$array=array();
		$data=array();
		if ($id_artikel!=NULL && $id_kategori!=NULL){
			$query=mysql_query("SELECT a.id_artikel as id_artikel, a.id_kategori as id_kategori FROM relasi_kategori_artikel a JOIN artikel b ON (a.id_artikel=b.id_artikel) WHERE a.id_artikel='$id_artikel' AND a.id_kategori='$id_kategori' AND b.status!='hapus'");
		} else if ($id_artikel!=NULL){
			$query=mysql_query("SELECT a.id_artikel as id_artikel, a.id_kategori as id_kategori FROM relasi_kategori_artikel a JOIN artikel b ON (a.id_artikel=b.id_artikel) WHERE a.id_artikel='$id_artikel' AND b.status!='hapus'");
		} else if ($id_kategori!=NULL){
			$query=mysql_query("SELECT a.id_artikel as id_artikel, a.id_kategori as id_kategori FROM relasi_kategori_artikel a JOIN artikel b ON (a.id_artikel=b.id_artikel) WHERE a.id_kategori='$id_kategori' AND b.status!='hapus'");
		}
		while ($hasil=mysql_fetch_assoc($query)){
			if ($target=="artikel"){
				array_push($data,$hasil['id_artikel']);
			} else if ($target=="kategori"){
				array_push($data,$hasil['id_kategori']);
			} else {
				$data['id_artikel']=$hasil['id_artikel'];
				$data['id_kategori']=$hasil['id_kategori'];
				array_push($array,$data);
			}	
		}
		if ($target=="artikel" || $target=="kategori"){
			return $data;
		} else {
			return $array;
		}
	}
	function kategori_artikel($id=NULL){
		$array=array();
		if (is_null($id)){
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM kategori_artikel WHERE status!='hapus' AND (sub_dari IS NULL OR sub_dari='')") or die (mysql_error());
		} else {
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM kategori_artikel WHERE id_kategori='$id' AND status!='hapus'") or die (mysql_error());
		}
		while ($hasil=mysql_fetch_assoc($query)){
			$data['id']=$hasil['id_kategori'];
			$data['nama']=$hasil['nama'];
			$data['deskripsi']=$hasil['deskripsi'];
			$data['sub_dari']=$hasil['sub_dari'];
			$data['tgl_masuk']=$hasil['tgl_masuk'];
			$data['tgl_ubah']=$hasil['tgl_ubah'];
			$data['pengguna']=$hasil['username'];
			$data['status']=$hasil['status'];
			$data['sub']=$this->sub_kategori_artikel($data['id']);
			if ($data['sub']=="")
					unset($data['sub']);
			array_push($array,$data);
		}
		if (is_null($id))
			return $array;
		else 
			return $data;
	}
	function sub_kategori_artikel($sub){
		$array=array();
		$sub=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM kategori_artikel WHERE  status!='hapus' AND sub_dari='$sub'") or die (mysql_error());
		if (mysql_num_rows($sub)<=0){
			return NULL;
		} else {
			while ($hasil=mysql_fetch_assoc($sub)){
				$data['id']=$hasil['id_kategori'];
				$data['nama']=$hasil['nama'];
				$data['deskripsi']=$hasil['deskripsi'];
				$data['sub_dari']=$hasil['sub_dari'];
				$data['tgl_masuk']=$hasil['tgl_masuk'];
				$data['tgl_ubah']=$hasil['tgl_ubah'];
				$data['pengguna']=$hasil['username'];
				$data['status']=$hasil['status'];
				$data['sub']=$this->sub_kategori_artikel($data['id']);
				if ($data['sub']=="")
						unset($data['sub']);
				array_push($array,$data);
			}
			return $array;
		} 
	}
	function sub_halaman($sub){
		$array=array();
		$sub=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM halaman WHERE sub_dari='$sub'");
		if (mysql_num_rows($sub)<=0){
			return NULL;
		} else {
			while ($result=mysql_fetch_assoc($sub)){
				$data['id']=$result['id_halaman'];
				$data['judul']=$result['judul'];
				$data['isi']=$result['isi'];
				$data['kata_kunci']=$result['kata_kunci'];
				$data['tgl_masuk']=$result['tgl_masuk'];
				$data['tgl_ubah']=$result['tgl_ubah'];
				$data['pengguna']=$result['username'];
				$data['status']=$result['status'];
				$data['sub']=$this->sub_halaman($data['id']);
				if ($data['sub']=="")
					unset($data['sub']);
				array_push($array,$data);
			}
			return $array;
		} 
	}
	
	public function halaman($id=NULL, $home=false){
		$array=array();
		if (is_null($id)){
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM halaman WHERE (sub_dari IS NULL OR sub_dari='') AND status='terbit'");
		} else {
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM halaman WHERE id_halaman='$id' AND status='terbit'");
		}
		
		while ($hasil=mysql_fetch_assoc($query)){
			$data['id']=$hasil['id_halaman'];
			$data['judul']=$hasil['judul'];
			$data['isi']=$hasil['isi'];
			$data['kata_kunci']=$hasil['kata_kunci'];
			$data['tgl_masuk']=$hasil['tgl_masuk'];
			$data['tgl_ubah']=$hasil['tgl_ubah'];
			$data['pengguna']=$hasil['username'];
			$data['status']=$hasil['status'];
			$data['sub']=$this->sub_halaman($data['id']);
			if ($data['sub']=="")
				unset($data['sub']);
			array_push($array,$data);
		}

		if (is_null($id))
			return $this->buildUL($array, $home);
		else return $data;
	}
	function buildSub($array){
		$dir=new dir();
		$no=0;
		foreach ($array as $array){
			$judul=str_replace($this->stringUrl(),"-",$array['judul']);
			$judul=str_replace("---","-",$judul);
			$judul=str_replace("--","-",$judul);
			echo '<li><a href="'.$dir->rootDir().'halaman/'.(int)$array['id'].'/'.$judul.$this->ext().'">'.$array['judul'].'</a>';
			if (array_key_exists('sub',$array)){
				echo "\n<ul>\n";
				$this->buildSub($array['sub']);
				echo "</ul>";
			}
			echo "</li>\n";
			$no++;
		}
	}
	function stringUrl(){
		$arr=array(",",".","&","~","@","#","$","%","^","*"," ","(",")","+","=","[","]","/",".","\"","?","<".">");
		return $arr;
	}
	function buildUL($array, $home=false) {
		$dir=new dir();
		
		echo "<ul  id=\"menu\" class=\"clear\">\n";
		if ($home){
			echo "<li><a href=\"".$dir->rootDir()."\">Home</a></li>";
		}
		$no=0;
		while ($no<=count($array)-1){
			$judul=str_replace($this->stringUrl(),"-",$array[$no]['judul']);
			$judul=str_replace("---","-",$judul);
			$judul=str_replace("--","-",$judul);
			echo '<li><a href="'.$dir->rootDir().'halaman/'.(int)$array[$no]['id'].'/'.$judul.$this->ext().'">'.$array[$no]['judul'].'</a>';
			if (array_key_exists('sub',$array[$no])){
				echo"\n<ul>\n";
				$this->buildSub($array[$no]['sub']);
				echo"</ul>\n";
			}
			echo "</li>\n";
			$no++;
		}
		echo "</ul>\n";
	}
	function tampilan(){
		$query=mysql_query("SELECT * FROM tampilan");
		while ($hasil=mysql_fetch_assoc($query)){
			$data['tema']=$hasil['tema'];
			$data['slider']=$hasil['slider'];
		}
		return $data;
	}
	function sliderScript(){
		$dir=new dir();
		$tampilan=$this->tampilan();
		if ($tampilan['slider']=="Ya" && !isset($_GET['content'])){
			?>
<link rel="stylesheet" href="pincludes/css/diapo.css" media="all">
<script type="text/javascript" src="<?php echo $dir->rootDir();?>pincludes/js/jquery.mobile-1.0rc2.customized.min.js"></script>
<script type="text/javascript" src="<?php echo $dir->rootDir();?>pincludes/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo $dir->rootDir();?>pincludes/js/jquery.hoverIntent.minified.js"></script>
<script type="text/javascript" src="<?php echo $dir->rootDir();?>pincludes/js/diapo.js"></script>
<script>
$(function(){
	$('.pix_diapo').diapo();
});
</script>
<?php
		}
	}
	function dataSlider(){
		$array=array();
		$query=mysql_query("SELECT * FROM slider") or die (mysql_error());
		while ($hasil=mysql_fetch_assoc($query)){
			$data['gambar']=$hasil['gambar'];
			$data['keterangan']=$hasil['keterangan'];
			array_push($array, $data);
		}
		return $array;
	}
	function slider(){
		$tampilan=$this->tampilan();
		$dataSlider=$this->dataSlider();
		if ($tampilan['slider']=="Ya"){
			?>
            <div class="pix_diapo">
            	<?php
				foreach($dataSlider as $slider){
				?>
                <div>
                    <img src="<?php echo $slider['gambar']; ?>">
                    <div class="caption elemHover fromBottom">
                        <?php echo $slider['keterangan']; ?>
                    </div>
                </div>
                <?php
				}
				?>
            </div>
            <?php
		}
	}
	public function share_social(){
	?>
		<style type="text/css">
		div .plusone, .twitter, .fb-like {
			text-align:right;
			font-size: 1px;
			display: inline-block;
			padding-top:5px;
		}
		div .fb_reset {
			display: inline;
		} 
		</style>
		<div id="social">
			<!-- +1 -->
			<div class="plusone">
			<!-- Place this tag where you want the +1 button to render -->
			<g:plusone size="medium" annotation="none"></g:plusone>
			<!-- Place this render call where appropriate -->
			<script type="text/javascript">
			  (function() {
				var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				po.src = 'https://apis.google.com/js/plusone.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			  })();
			</script>    
			</div>
			<!-- end +1 -->
			<!-- twitter -->
			<div class="twitter">
			<a href="https://twitter.com/share" class="twitter-share-button" data-count="none" data-via="HotelAyong">Tweet</a><script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>    
			</div>
			<!-- end twitter -->
			<!-- like -->
			<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=108227685965001";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
			<div class="fb-like" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"></div>
			<!-- end like -->
		</div>
	<?php
	}
	public function analytic(){
		$situs=$this->situs();
		if ($situs['analytic']!=""){
		?>
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', '<?php echo $situs['analytic']; ?>']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
		<?php
		}
	}
	function album($id=NULL){
		$array=array();
		if (is_null($id)){
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM album ORDER BY tgl_masuk ASC") or die (mysql_error());
		} else {
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM album WHERE id_album='$id'  ORDER BY tgl_masuk ASC") or die (mysql_error());
		}
		while ($hasil=mysql_fetch_assoc($query)){
			$data['id']=$hasil['id_album'];
			$data['nama']=$hasil['nama'];
			$data['deskripsi']=$hasil['deskripsi'];
			$data['kata_kunci']=$hasil['kata_kunci'];
			$data['tgl_masuk']=$hasil['tgl_masuk'];
			$data['tgl_ubah']=$hasil['tgl_ubah'];
			$data['pengguna']=$hasil['username'];
			array_push($array,$data);
		}
		if (is_null($id)){
			return $array;
		} else {
			return $data;
		}
	}
	function foto_album($id_album=NULL, $id=NULL){
		$array=array();
		if (is_null($id) && is_null($id_album)){
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_upload, '%d %M %Y<br>Jam %H:%i') as tgl_upload FROM foto_album ORDER BY tgl_upload DESC") or die (mysql_error());
		} else if (is_null($id) && !is_null($id_album)){
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_upload, '%d %M %Y<br>Jam %H:%i') as tgl_upload FROM foto_album WHERE id_album='$id_album' ORDER BY tgl_upload DESC") or die (mysql_error());
		} else {
			$query=mysql_query("SELECT *, DATE_FORMAT(tgl_upload, '%d %M %Y<br>Jam %H:%i') as tgl_upload FROM foto_album WHERE foto='$id' AND id_album='id_album'") or die (mysql_error());
		}
		while ($hasil=mysql_fetch_assoc($query)){
			$data['foto']=$hasil['foto'];
			$data['nama']=$hasil['nama_file'];
			$data['deskripsi']=$hasil['deskripsi'];
			$data['ukuran']=$hasil['ukuran'];
			$data['tipe']=$hasil['tipe'];
			$data['tgl_upload']=$hasil['tgl_upload'];
			$data['pengguna']=$hasil['username'];
			array_push($array,$data);
		}
		if (!is_null($id) && !is_null($id_album)){
			return $data;
		} else {
			return $array;
		}
	}
	public function halaman_album($isi){
		preg_match_all('/\[album hal=([0-9]*)\]/i', $isi, $matches);
		$object='';
		$dir=new dir();
		foreach ($this->album() as $album){
			$judul=str_replace($this->stringURL(),"-",$album['nama']);
			$judul=str_replace("---","-",$judul);
			$judul=str_replace("--","-",$judul);
			//$object.='<h3><a href="'.$dir->rootDir().'album/'.$album['id'].'/'.$judul.'">'.$album['nama'].'</a></h3>';
			$show=1;
			$foto=$this->foto_album($album['id']);
			$object.='<div id="album"><a href="'.$dir->rootDir().'album/'.$album['id'].'/'.$judul.$this->ext().'"  data-tooltip="'.$album['nama'].'">';
			while ($show<=4){
				$object.='<img class="thumb'.$show.'" src="'.$dir->rootDir().'pcontent/upload/album/gambar.php?img='.$foto[$show]['foto'].'&size=170&r=H" style="margin:5px;">';
				$show++;
			}
			$object.='</a></div>';
		}
		$content=$isi;
		//$content=str_replace($matches[0][0],$object,$isi);
		return $content;
	}
	function kutipan_artikel($isi, $kata=20, $gambar=100){
		$content = str_replace(']]>', ']]>', $isi);
		preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $content, $img);
		if (isset($img[1])) {
			$thumb=$img[1];
			echo '<img src="'.$thumb.'" align="left" style="max-width:'.$gambar.'px;margin:5px;margin-right:10px">';
		} else {
            $kata=$kata+15;
        }
		
		$word=explode(' ',strip_tags(str_replace("<br/>"," ",str_replace("<br>"," ",$isi))));
		$no=0;
		while($no<$kata){
			if (isset($word[$no])){
				echo $word[$no].' ';
			}
			$no++;
		}
	}
    public function soal($id=NULL){
        $array=array();
        if (is_null($id)){
            $query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM soal ORDER BY tgl_masuk DESC") or die (mysql_error());
        } else {
            $query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM soal WHERE id_soal='$id'") or die (mysql_error());
        }
        while ($hasil=mysql_fetch_assoc($query)){
            $data['id']=$hasil['id_soal'];
            $data['nama']=$hasil['nama'];
            $data['deskripsi']=$hasil['deskripsi'];
            $data['waktu']=$hasil['waktu'];
            $data['status']=$hasil['status'];
            $data['kata_kunci']=$hasil['kata_kunci'];
            $data['tgl_masuk']=$hasil['tgl_masuk'];
            $data['tgl_ubah']=$hasil['tgl_ubah'];
            $data['pengguna']=$hasil['username'];
            array_push($array,$data);
        }
        if (is_null($id))
            return $array;
        else return $data;
    }
    function pertanyaan($id_soal, $id_pertanyaan=NULL){
        $array=array();
        if (is_null($id_pertanyaan)){
            $query=mysql_query("SELECT * FROM pertanyaan WHERE id_soal='$id_soal'") or die (mysql_error());
        } else {
            $query=mysql_query("SELECT * FROM pertanyaan WHERE id_soal='$id_soal' AND id_pertanyaan='$id_pertanyaan'") or die (mysql_error());
        }
        while ($hasil=mysql_fetch_assoc($query)){
            $data['id_soal']=$hasil['id_soal'];
            $data['id_pertanyaan']=$hasil['id_pertanyaan'];
            $data['pertanyaan']=$hasil['pertanyaan'];
            array_push($array,$data);
        }
        if (is_null($id_pertanyaan)){
            return $array;
        } else {
            return $data;
        }
    }
    function jawaban($id_pertanyaan){
        $array=array();
        $query=mysql_query("SELECT * FROM jawaban WHERE id_pertanyaan='$id_pertanyaan'") or die (mysql_error());
        while ($hasil=mysql_fetch_assoc($query)){
            $data['id_jawaban']=$hasil['id_jawaban'];
            $data['id_pertanyaan']=$hasil['id_pertanyaan'];
            $data['jawaban']=$hasil['jawaban'];
            $data['benar']=$hasil['benar'];
            array_push($array,$data);
        }
        return $array;
    }
    function insertNilai($nis, $idSoal, $waktu){
        $query=mysql_query("INSERT INTO nilai (nis, id_soal, waktu) VALUES ('$nis','$idSoal','$waktu')") or die (mysql_error()."Nilai Error");
        return mysql_insert_id();
    }
    function insertDetailNilai($idNilai, $idPertanyaan, $idJawaban){
        if ($idJawaban=="null"){
            $query=mysql_query("INSERT INTO detail_nilai VALUES ('$idNilai','$idPertanyaan',null)") or die (mysql_error());
        } else{
            $query=mysql_query("INSERT INTO detail_nilai VALUES ('$idNilai','$idPertanyaan','$idJawaban')") or die (mysql_error());
        }
        return true;
    }
    function nilai($id){
        $array=array();
        $query=mysql_fetch_assoc(mysql_query("SELECT * FROM nilai WHERE id_nilai='$id'"));
        $data['id_nilai']=$query['id_nilai'];
        $data['id_soal']=$query['id_soal'];
        $data['nis']=$query['nis'];
        $data['waktu']=$query['waktu'];
        return $data;
    }
    function detailNilai($id){
        $array=array();
        $query=mysql_query("SELECT a.id_nilai, a.id_pertanyaan, a.id_jawaban, c.pertanyaan, b.benar FROM detail_nilai a LEFT JOIN jawaban b ON(a.id_jawaban=b.id_jawaban) JOIN pertanyaan c ON(a.id_pertanyaan=c.id_pertanyaan) WHERE a.id_nilai='$id'");
        while ($hasil=mysql_fetch_assoc($query)){
            $data['id_nilai']=$hasil['id_nilai'];
            $data['id_pertanyaan']=$hasil['id_pertanyaan'];
            $data['id_jawaban']=$hasil['id_jawaban'];
            $data['pertanyaan']=$hasil['pertanyaan'];
            $data['benar']=$hasil['benar'];
            array_push($array,$data);
        }
        return $array;
    }
    function kelas($id=NULL){
        $array=array();
        if (is_null($id)){
            $query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM kelas ORDER BY tgl_masuk DESC") or die (mysql_error());
        } else {
            $query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y<br>Jam %H:%i') as tgl_masuk, DATE_FORMAT(tgl_ubah, '%d %M %Y<br>Jam %H:%i') as tgl_ubah FROM kelas WHERE id_kelas='$id'  ORDER BY tgl_masuk DESC") or die (mysql_error());
        }
        while ($hasil=mysql_fetch_assoc($query)){
            $data['id']=$hasil['id_kelas'];
            $data['nama']=$hasil['nama'];
            $data['deskripsi']=$hasil['deskripsi'];
            $data['tgl_masuk']=$hasil['tgl_masuk'];
            $data['tgl_ubah']=$hasil['tgl_ubah'];
            $data['pengguna']=$hasil['username'];
            array_push($array,$data);
        }
        if (is_null($id)){
            return $array;
        } else {
            return $data;
        }
    }
    function reg($nis, $email, $password, $nama, $jk, $kelas, $tempat, $tgl_lahir, $konfirmasi){
        $query="INSERT INTO siswa (nis, email, password, nama, jk, kelas, tempat_lahir, tgl_lahir, konfirmasi)
                VALUES ('$nis','$email',password('$password'),'$nama','$jk','$kelas','$tempat','$tgl_lahir','$konfirmasi')";
        if (mysql_query($query)){
            return true;
        } else {
            return false;
        }
    }
    function login($nis, $password){
        $query=mysql_query("SELECT *, DATE_FORMAT(tgl_masuk, '%d %M %Y') as tgl_masuk FROM siswa WHERE (nis='$nis' AND password=password('$password')) OR (email='$nis' AND password=password('$password')) ");
        if (mysql_num_rows($query)>=1){
            $hasil=mysql_fetch_assoc($query);
            $_SESSION['nis']=$hasil['nis'];
            $_SESSION['nama']=$hasil['nama'];
            $_SESSION['tgl_masuk']=$hasil['tgl_masuk'];
            $_SESSION['email']=$hasil['email'];
            $_SESSION['kelas']=$hasil['kelas'];
            if ($hasil['konfirmasi']!="valid"){
                return "belumvalid";
            } else {
                return "valid";
            }
        } else {
            return false;
        }
    }
    function status(){
        $dir=new dir();
        if (isset($_SESSION['nis'])){
            $kelas=$this->kelas($_SESSION['kelas']);
            ?>
            <h3>Info User</h3>
                <center>
                    <strong>NIS : </strong><?php echo $_SESSION['nis']; ?><br>
                    <strong>Nama : </strong><?php echo $_SESSION['nama']; ?><br>
                    <strong>Kelas : </strong><?php echo $kelas['nama']; ?><br>
                    <strong>Terdaftar : </strong><?php echo $_SESSION['tgl_masuk']; ?><br>
                    <a href="<?php echo $dir->rootDir().'profil/edit/akun'.$this->ext(); ?>">Profil</a> | <a href="<?php echo $dir->rootDir().'logout/1/logout'.$this->ext(); ?>">Keluar</a> <br>
                </center>
            <?php
        } else {
            ?>
            <h3>Login Siswa</h3>
                <form action="<?php echo $dir->rootDir().'login/1/login'.$this->ext(); ?>" method="post" name="loginForm">
            <table>
                <tr>
                    <td>NIS/E-Mail</td>
                    <td><input type="text" name="nis" style="width: 100%;"> </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" style="width: 100%;"> </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="btnLogin" value="Login"> ( <a href="<?php echo $dir->rootDir().'lupa/kirim/password'.$this->ext(); ?>">Lupa?</a> | <a href="<?php echo $dir->rootDir().'registrasi/siswa/reg'.$this->ext(); ?>">Daftar</a> )</td>
                </tr>
            </table>
                    </form>
            <?php
        }
    }
    function cekPengerjaanSoal($nis, $soal){
        $query=mysql_query("SELECT * FROM nilai WHERE nis='$nis' AND id_soal='$soal'");
        if (mysql_num_rows($query)>=1){
            return true;
        } else {
            return false;
        }
    }
    function relasi_soal_kelas($id_soal=NULL, $id_kelas=NULL, $target=NULL){
        $array=array();
        $data=array();
        if ($id_soal!=NULL && $id_kelas!=NULL){
            $query=mysql_query("SELECT * FROM relasi_soal_kelas WHERE id_soal='$id_soal' AND id_kelas='$id_kelas'");
        } else if ($id_soal!=NULL){
            $query=mysql_query("SELECT * FROM relasi_soal_kelas WHERE id_soal='$id_soal'");
        } else if ($id_kelas!=NULL){
            $query=mysql_query("SELECT * FROM relasi_soal_kelas WHERE id_kelas='$id_kelas'");
        } else {
            $query=mysql_query("SELECT * FROM relasi_soal_kelas");
        }
        while ($hasil=mysql_fetch_assoc($query)){
            if ($target=="kelas"){
                array_push($data,$hasil['id_kelas']);
            } else if ($target=="soal"){
                array_push($data,$hasil['id_soal']);
            } else {
                $data['id_soal']=$hasil['id_soal'];
                $data['id_kelas']=$hasil['id_kelas'];
                array_push($array,$data);
            }
        }
        if ($target=="soal" || $target=="kelas"){
            return $data;
        } else {
            return $array;
        }
    }
    function cekSoalKelas($soal, $kelas){
        $query=mysql_query("SELECT * FROM relasi_soal_kelas WHERE id_soal='$soal' AND id_kelas='$kelas'");
        if (mysql_num_rows($query)>=1){
            return true;
        } else {
            return false;
        }
    }
    function cekStatusSoal($soal){
        $query=mysql_fetch_assoc(mysql_query("SELECT * FROM soal WHERE id_soal='$soal'"));
        if ($query['status']=='terbit'){
            return true;
        } else {
            return false;
        }
    }
    function ext(){
        return EXT;
    }
    function urlTitle($title){
        $judul=str_replace($this->stringURL(),"-",$title);
        $judul=str_replace("---","-",$judul);
        $judul=str_replace("--","-",$judul);
        return $judul;
    }
    function cekAkun($nis){
        $query=mysql_query("SELECT * FROM siswa WHERE nis='$nis' OR email='$nis'");
        if (mysql_num_rows($query)>=1){
            return true;
        } else {
            return false;
        }
    }
    function cekKonfirmasi($kode){
        $query=mysql_query("SELECT * FROM siswa WHERE konfirmasi='$kode'");
        if (mysql_num_rows($query)>=1){
            $query=mysql_query("UPDATE siswa set konfirmasi='valid' WHERE konfirmasi='$kode'");
            return true;
        } else {
            return false;
        }
    }
    function cekLupaPassword($kode){
        $query=mysql_query("SELECT * FROM siswa WHERE lupa='$kode'");
        if (mysql_num_rows($query)>=1){
            return true;
        } else {
            return false;
        }
    }
    function ubahPassword($password,$kode){
        $query="UPDATE siswa SET password=password('$password'), lupa='' WHERE lupa='$kode'";
        if (mysql_query($query)){
            return true;
        } else {
            return false;
        }
    }
    function email($emailPenerima, $namaPenerima, $judul, $isi){
        $situs=$this->situs();
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 1;
        $mail->Host = 'mail.hotelayonglinggarjati.com';
        $mail->Port = 26;
        $mail->SMTPAuth = true;
        $mail->Username = 'email@hotelayonglinggarjati.com';
        $mail->Password = 'bismillah';
        $mail->SetFrom('email@hotelayonglinggarjati.com', $situs['judul']);
        $mail->AddAddress($emailPenerima, $namaPenerima);
        $mail->IsHTML(true);
        $mail->Subject = $judul;
        $mail->Body = $isi;
        if(!$mail->Send()) {
            echo 'Mailer error: '.$mail->ErrorInfo;
        } else {
            echo 'Message has been sent.';
        }
    }
    function updateLupa($nis, $kode){
        $query="UPDATE siswa SET lupa='$kode' WHERE nis='$nis' OR email='$nis'";
        if (mysql_query($query)){
            return true;
        } else {
            return false;
        }
    }
    function updateKonfirmasi($nis, $kode){
        $query="UPDATE siswa SET konfirmasi='$kode' WHERE nis='$nis' OR email='$nis'";
        if (mysql_query($query)){
            return true;
        } else {
            return false;
        }
    }
    function siswa($nis){
        $query=mysql_query("SELECT *, DATE_FORMAT(tgl_lahir, '%d/%m/%Y') as tgl_lahir FROM siswa WHERE nis='$nis' OR email='$nis'");
        $hasil=mysql_fetch_assoc($query);
        $data['nis']=$hasil['nis'];
        $data['email']=$hasil['email'];
        $data['nama']=$hasil['nama'];
        $data['kelas']=$hasil['kelas'];
        $data['jk']=$hasil['jk'];
        $data['tempat_lahir']=$hasil['tempat_lahir'];
        $data['tgl_lahir']=$hasil['tgl_lahir'];
        return $data;
    }
    function updateProfil($nama, $jk, $kelas, $tempat, $tgl_lahir){
        $query="UPDATE siswa SET  nama='$nama', jk='$jk', kelas='$kelas', tempat_lahir='$tempat', tgl_lahir='$tgl_lahir' WHERE nis='".$_SESSION['nis']."'";
        if (mysql_query($query)){
            return true;
        } else {
            return false;
        }
    }
    function updatePassword($password){
        $query="UPDATE siswa SET password=password('$password') WHERE nis='".$_SESSION['nis']."'";
        if (mysql_query($query)){
            return true;
        } else {
            return false;
        }
    }
    function kunjungan($ip, $sumber, $alamat, $tanggal){
        $cek=mysql_query("SELECT * FROM kunjungan WHERE ip='$ip' AND alamat='$alamat' AND tanggal='$tanggal'");
        if (mysql_num_rows($cek)<=0){
            mysql_query("INSERT INTO kunjungan VALUES ('$ip', '$sumber', '$alamat', '$tanggal')");
        }
    }
    function total_kunjungan($total=null){
        if (is_null($total)){
            $jumlah=mysql_num_rows(mysql_query("SELECT * FROM kunjungan"));
            return $jumlah;
        }
    }
}
?>
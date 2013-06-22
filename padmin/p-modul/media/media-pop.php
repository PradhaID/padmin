<?php
include ("../class.php");
$tab="upload";
if (isset($_GET['tab'])){
	$tab=$_GET['tab'];
}
?>

<style type="text/css">
#menu ul {
	float:left;
	padding:0;
	margin:0px;
	list-style-type:none;
}
#menu ul a{
	float:left;
	text-decoration:none;
	color:#333;
	background-color:#eee;
	padding:5px 10px;
	-webkit-border-radius: 3px 3px 0 0;
	-khtml-border-radius: 3px 3px 0 0;
	-moz-border-radius: 3px 3px 0 0;
	border-radius: 3px 3px 0 0;
}
#menu ul a.aktif{
	background-color:#999;
}
#menu ul a:hover {background-color:#999;}
#menu ul li {display:inline;
	
	}
#tab{
	border:1px solid #999;
	clear:both;
	-webkit-border-radius: 0 5px 5px 5px;
	-khtml-border-radius: 0 5px 5px 5px;
	-moz-border-radius: 0 5px 5px 5px;
	border-radius: 0 5px 5px 5px;
	padding:5px;
	max-height:400px;
	overflow-y:auto;
	overflow-x:hidden;
	}
</style>
<div style="width:800px;">
<img src="css/images/media.png" align="left" /> <h2 style="padding-top:5px;">Media</h2>

<div id="menu">
    <ul>
        <li><a href="javascript:void(0)" id="upload" onclick="upload()" class="<?php if ($tab=="upload") echo "aktif"; ?>">Upload</a></li>
        <li><a href="javascript:void(0)" id="pustaka" onclick="pustaka()" class="<?php if ($tab=="pustaka") echo "aktif"; ?>">Pustaka</a></li>
    </ul>
</div>
<div id="tab">
<?php
if ($tab=="upload") {
	include ("upload-tab.php");
} 
?>
</div>
<div style="text-align:right;padding:5px;"><button name="close" onclick="tutup()">Tutup</button></div>
</div>
<script>
$(document).ready(function() {
	var msg = $('#popup');
		    var height = $(window).height();
		    var width = $(document).width();
			msg.css({
				'left' : '50%',
				'margin-left' : (msg.width() / 2) - msg.width() + 200
			});
});
function tutup(){
		$('.blockMsg').animate({
			opacity: 0,
			top: '5%'
		});
		$.unblockUI();
		$(".blockUI").fadeOut("slow"); 
		
}
function pustaka(){
	$("#upload").attr("class","");
	$("#pustaka").attr("class","aktif");
	$("#tab").css("-webkit-border-radius","5px 5px 5px 5px");
	$("#tab").css("-khtml-border-radius","5px 5px 5px 5px");
	$("#tab").css("-moz-border-radius","5px 5px 5px 5px");
	$("#tab").css("border-radius","5px 5px 5px 5px");
	$('#tab').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
	$.post('<?php echo $dir->modulDir().'/media-tab.php'; ?>', function(data) {
		$('#tab').html(data);
	});
	
}
function upload(){
	$("#upload").attr("class","aktif");
	$("#pustaka").attr("class","");
	$("#tab").css("-webkit-border-radius","0px 5px 5px 5px");
	$("#tab").css("-khtml-border-radius","0px 5px 5px 5px");
	$("#tab").css("-moz-border-radius","0px 5px 5px 5px");
	$("#tab").css("border-radius","0px 5px 5px 5px");
	$('#tab').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
	$.post('<?php echo $dir->modulDir().'/upload-tab.php'; ?>', function(data) {
		$('#tab').html(data);
	});
	
}
</script>

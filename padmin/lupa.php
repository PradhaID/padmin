<?php
session_start();
ob_start();
include ("function.php");
if (isset($_POST['username'])){
	header("Location:lupa.php?data=tidakvalid");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link href="css/html.css" rel="stylesheet" type="text/css" media="all">
<link href="css/id.css" rel="stylesheet" type="text/css" media="all">
<link href="css/form.css" rel="stylesheet" type="text/css" media="all">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.ui.js"></script>
<script type="text/javascript" src="js/actions.js"></script>
<style type="text/css">
#formLogin{
	position:fixed;
    left: 50%;
    width:420px;
	opacity:0;
    margin-left: -220px;
    border: 1px solid #ccc;
    background-color: #e3e3e3;
	padding:10px;
	-moz-box-shadow: 1px 1px 1px #888;
	-webkit-box-shadow: 1px 1px 1px #888;
	box-shadow: 1px 1px 1px #888;
	-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=1, Direction=135, Color='#888888')";
	filter: progid:DXImageTransform.Microsoft.Shadow(Strength=1, Direction=135, Color='#888888');
	-webkit-border-radius: 3px;
	-khtml-border-radius: 3px;	
	-moz-border-radius: 3px;
	border-radius: 3px;
}
#footer {
   position:fixed;
   left:0px;
   bottom:0px;
   text-align:right;
   width:100%;
}
</style>
<?php
$data=true;

if (isset($_GET['data']) && $_GET['data']=="tidakvalid"){
	$data=false;
}
if ($data){
	?>
    <script>
	$(document).ready(function() {
	$('#formLogin').animate({
				opacity: 1,
				top: '15%'
			  });
	});
	</script>
    <?php
}
if ($data==false){
?>
<script>
  $(document).ready(function() { 
      $("#formLogin").effect("shake", { times:3 }, 100);
	  $('#username').focus();
  });
  
</script>
<style type="text/css">
#formLogin{
	top:15%;
	opacity:1;
}
.inputEdit{
	border:1px solid #F00;
}
</style>
<?php
}
?>
</head>

<body>
<?php 
if (!$data){ 
	echo '<div style="left: 50%;margin-left: -250px;width:500px;position:fixed;margin-top:10%;text-align:center;color:red">Oops...!Nampaknya E-Mail atau Username yang anda masukan tidak terdaftar</div>';
}
?>
<div id="formLogin">
<form name="login" action="lupa.php" method="post">

<table>
	<tr>
    	<td>E-Mail atau Username</td>
    </tr>
    <tr>
    	<td><input type="text" name="username" id="username" <?php if ($data){ ?> value="Masukan E-Mail atau Username Anda Disini" class="inputAdd" onblur="blurInput('username')" onfocus="focusInput('username')" <?php } else { echo 'class="inputEdit"'; } ?>></td>
    </tr>
    <tr>
    	<td><em style="font-size:11px;">Kami akan mengirimkan konfirmasi kehilangan password melalu E-Mail anda</em></td>
    </tr>
    <tr>
    	<td><input type="submit" name="btnLupa" value="Kirim"> | <a href="login.php">Ingat?</a></td>
    </tr>
</table>
</form>
</div>

<div id="footer"><h2 style="color:#9d9d9d;">PAdmin</h2></div>
</body>
</html>
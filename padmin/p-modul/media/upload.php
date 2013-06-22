<?php
session_start();
include ("../class.php");

function get() {
	echo "[]";
}

function post($dir, $query){
	$url=$dir->modulDir();
	$i=0;
	$file=array();
	while ($i<count($_FILES["file"]["name"])){
		if ($_FILES["file"]["error"][$i] > 0){
			echo "Error: " . $_FILES["file"]["error"][$i] . "<br />";
		} else {
			$ext=end(explode('.',$_FILES["file"]["name"][$i]));
			$data['name']=$_FILES["file"]["name"][$i];
			$data['size']=$_FILES["file"]["size"][$i];
			$data['tmp']=$_FILES["file"]["tmp_name"][$i];
			$nama=md5(uniqid().$data['name'].date('dmyhis'));
			$query->media($nama.'.'.$ext, $data['name'], $data['size'], $ext);
			move_uploaded_file($data['tmp'], '../../../pcontent/upload/'.$nama.'.'.$ext);
			$data['url']="openPage('".$nama.'.'.$ext."')";
			$data['thumbnail']=dirname($dir->rootDir())."/pcontent/upload/gambar.php?img=".$nama.'.'.$ext."&size=30&r=H";
			array_push($file, $data);
		}
		$i++;
	}
	header('Cache-Control: no-cache, must-revalidate');
	header('Vary: Accept');
	if (isset($_SERVER['HTTP_ACCEPT']) &&
		(strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false)) {
		header('Content-type: application/json');
	} else {
		header('Content-type: text/plain');
	}
	echo json_encode($file);
}
function delete(){
}
switch ($_SERVER['REQUEST_METHOD']) {
    case 'HEAD':
    case 'GET':
        get();
        break;
    case 'POST':
        post($dir, $query);
        break;
    case 'DELETE':
        delete();
        break;
    default:
        header('HTTP/1.0 405 Method Not Allowed');
}
/*echo "<pre>";
print_r($file);
echo "</pre>";*/
?>
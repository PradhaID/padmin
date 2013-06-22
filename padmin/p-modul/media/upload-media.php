<?php
include ("../../function.php");
$dir="../../../pcontent/upload/";
function recurseDir($dir) {
	if(is_dir($dir)) {
		if($dh = opendir($dir)){
			while($file = readdir($dh)){
				if($file != '.' && $file != '..'){
					if(is_dir($dir . $file)){
						recurseDir($dir . $file . '/');
					}else{
						echo $dir . $file."<br/>";   
			 		}
				}
	 		}
		}
 		closedir($dh);         
     	}
}
//recurseDir($dir);
?>

<link rel="stylesheet" href="<?php echo modulDir();?>/jquery.fileupload-ui.css">

<img src="css/images/media.png" align="left" /> <h2 style="padding-top:5px;"> Upload Media</h2>
<div id="file_upload" style="width:100%">
    <form action="<?php echo modulDir();?>/upload.php" method="POST" enctype="multipart/form-data" style="width:100%">
        <input type="file" name="file[]" multiple>
        <button type="submit">Upload</button>
        <p class="file_upload_label" style="line-height: 150px;font-size:16px;">Klik disini atau tarik file kesini</p>
    </form>
    <table class="files" align="right">
    	<tbody class="file_upload_template" style="display:none;">
        <tr>
            <td style="max-width:80px;" class="file_upload_preview"></td>
            <td class="file_name"></td>
            <td class="file_size"></td>
            <td class="file_upload_progress"><div></div></td>
            <td class="file_upload_start"><button class="button">Upload</button></td>
            <td class="file_upload_cancel"><button class="button">Batal</button></td>
        </tr>
        </tbody>
        <tr class="file_download_template" style="display:none;">
            <td class="file_download_preview"></td>
            <td class="file_name"><a></a></td>
            <td class="file_size"></td>
            <td class="file_download_delete" colspan="3"><button class="button">Bersihkan</button></td>
        </tr>
    </table>
    <div style="clear:both"></div>
    <div class="file_upload_overall_progress" style="display:none;clear:both"><div style="display:none;"></div></div>
    <div class="file_upload_buttons" style="text-align:right";>
        <button class="file_upload_start button">Upload Semua File</button> 
        <button class="file_upload_cancel button">Batalkan Semua</button> 
        <button class="file_download_delete button">Bersihkan Semua</button>
    </div>
</div>
<script>
	function openPage(page){
		$.post(page+'/media.php', function(data) {
			$('#content').html(data);
		});
	}
</script>
<script src="<?php echo modulDir();?>/js/jquery.fileupload.js"></script>
<script src="<?php echo modulDir();?>/js/jquery.fileupload-ui.js"></script>
<script src="<?php echo modulDir();?>/js/jquery.fileupload-uix.js"></script>
<script src="<?php echo modulDir();?>/js/application.js"></script>

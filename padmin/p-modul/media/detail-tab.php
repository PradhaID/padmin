<?php
include ("../class.php");
$media=$data->media($_GET['id']);
?>
<style type="text/css">
.radio-toolbar input[type="radio"] {
    display:none; 
}

.radio-toolbar label{
	    display:inline-block;
}
.radio-toolbar label img {

	border:1px solid #ddd;
}

.radio-toolbar input[type="radio"]:checked + label img { 
    border:1px solid #000 ;
}​
</style>
<div style="padding:2px 6px">
<form name="detail-insert">
<table cellpadding="0" cellspacing="0" id="dt">
	<tr>
    	<td rowspan="5" valign="top">
        <?php
				if ($media[0]['tipe']=="jpg" || $media[0]['tipe']=="jpeg" || $media[0]['tipe']=="png" || $media[0]['tipe']=="gif"){
					?>
                    <img style="padding-right:10px;" src="<?php echo dirname($dir->rootDir())."/pcontent/upload/gambar.php?img=".$media[0]['media']."&size=100&r=H"; ?>" />
                    <?php
				}
				 ?></td>
        <td style="padding:3px 0;">Nama File</td>
        <td> : </td>
        <td><?php echo $media[0]['nama']; ?></td>
    </tr>
    <tr>
    	<td style="padding:3px 0;">Ukuran</td>
        <td> : </td>
        <td><?php echo $media[0]['ukuran']/1000; ?>Kb</td>
    </tr>
    <tr>
    	<td style="padding:3px 0;">Tipe File</td>
        <td> : </td>
        <td><?php echo $media[0]['tipe']; ?></td>
    </tr>
    <tr>
    	<td style="padding:3px 0;">Tanggal Upload </td>
        <td> : </td>
        <td><?php echo str_replace('<br>',' ',$media[0]['tgl_upload']); ?></td>
    </tr>
    <tr>
    	<td style="padding:3px 0;">Pengguna </td>
        <td> : </td>
        <td><?php echo $media[0]['pengguna']; ?></td>
    </tr>
    <?php
    if ($media[0]['tipe']=="jpg" || $media[0]['tipe']=="jpeg" || $media[0]['tipe']=="png" || $media[0]['tipe']=="gif"){
    ?>
    <tr>
    	<td>Perataan Media &nbsp;&nbsp;</td>
    	<td colspan="4">
        <div class="radio-toolbar">
        <input type="radio" name="align" id="none" value="none" checked="checked" />
        	<label for="none"><img src="css/images/none.png" /></label>
        <input type="radio" name="align" id="left" value="left" />
        	<label for="left"><img src="css/images/left.png" /></label>
        <input type="radio" name="align" id="center" value="center" />
        	<label for="center"><img src="css/images/center.png" /></label>
        <input type="radio" name="align" id="right" value="right" />
        	<label for="right"><img src="css/images/right.png" /></label>
        </div>
        </td>
    </tr>
    <tr>
    	<td>Title </td>
    	<td colspan="3"><input type="text" name="title" style="width:350px" value="<?php echo $media[0]['nama']; ?>"  /></td>
    </tr>
    <tr>
    	<td>Teks Alternate </td>
    	<td colspan="3"><input type="text" name="alt"  style="width:350px"  /></td>
    </tr>
    <?php
    } else {
        ?>
        <tr>
            <td>Text Download &nbsp;&nbsp;</td>
            <td colspan="3"><input type="text" name="download"  style="width:350px"  value="Download"  /></td>
        </tr>
        <?php
    }
    ?>
    <tr>
    	<td>Alamat &nbsp;&nbsp;</td>
    	<td colspan="3"><input type="text" name="url"  style="width:350px"  value="<?php echo dirname($dir->rootDir())."/pcontent/upload/".$media[0]['media']; ?>"  /></td>
    </tr>
    <tr>
    	<td></td>
    	<td colspan="3">
            <button type="button" name="insert" onclick="masukan();">
            <?php
            if ($media[0]['tipe']=="jpg" || $media[0]['tipe']=="jpeg" || $media[0]['tipe']=="png" || $media[0]['tipe']=="gif"){
                echo "Masukan Gambar";
            } else {
                echo "Masukan Link Download";
            }
            ?>
            </button>
        </td>
    </tr>
</table>
</form>
</div>
<script>
function tutup(){
		$('.blockMsg').animate({
			opacity: 0,
			top: '5%'
		});
		$.unblockUI();
		$(".blockUI").fadeOut("slow"); 
		
}
function masukan(){
    <?php
    if ($media[0]['tipe']=="jpg" || $media[0]['tipe']=="jpeg" || $media[0]['tipe']=="png" || $media[0]['tipe']=="gif"){
        ?>
	    var align=$(':radio[name=align]:checked').val();
	    tinyMCE.execCommand('mceInsertContent',false,'<img src="<?php echo dirname($dir->rootDir())."/pcontent/upload/".$media[0]['media']; ?>" style="padding:5px;margin:10px;" align="'+align+'">');
        <?php
    } else {
        ?>
        var download=$(':text[name=download]').val();
        tinyMCE.execCommand('mceInsertContent',false,'<a href="<?php echo dirname($dir->rootDir())."/pcontent/upload/".$media[0]['media']; ?>">'+download+'</a>');
        <?php
    }
    ?>
	tutup();
}
</script>
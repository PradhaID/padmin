<?php
include("../class.php");

?>
<div style="width:500px;">
<img src="css/images/pengaturan.png" align="left" /> <h2 style="padding-top:5px;">&nbsp; Pengaturan Slider</h2>
<?php
if (isset($_POST['gambar']) && isset($_POST['keterangan'])){
	$gambar=explode('||',$_POST['gambar']);
	$keterangan=explode('||',$_POST['keterangan']);
	$no=0;
	$query->hapusSlider();
	while ($no<count($gambar)){
		if ($gambar[$no]!="" || $keterangan[$no]!=""){
			$query->slider($gambar[$no],$keterangan[$no]);
		}
		$no++;
	}
}
?>
<form name="slider" id="slider" method="post" action="<?php echo $dir->modulDir();?>/slider.php">
<table>
	<tr>
    	<td>
        <?php
		if (count($data->slider())<=0){
		?>
        	<table>
            <tr>
                <td>Gambar</td>
                <td><input type="text" name="gambar" class="inputEdit" /></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><input type="text" name="keterangan" class="inputEdit" /></td>
            </tr>
            <tr>
                <td colspan="2"><hr/></td>
            </tr>
            </table>
        <?php 
		} else {
			foreach($data->slider() as $slider){
				?>
                <table>
                <tr>
                    <td>Gambar</td>
                    <td><input type="text" name="gambar" class="inputEdit" value="<?php echo $slider['gambar']; ?>" /></td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td><input type="text" name="keterangan" class="inputEdit" value="<?php echo $slider['keterangan']; ?>" /></td>
                </tr>
                <tr>
                    <td colspan="2"><hr/></td>
                </tr>
                </table>
                <?php
			}
		}
		?>
        </td>
    <tr>
    <tr>
    	<td>
        	<div id="gambar">
            </div>
        </td>
    <tr>
        <td>
        	<button type="submit" name="btnTampilan">Simpan</button>
            <button type="button" name="tambah" onClick="append()">Tambah Slider</button>
            <span id="loaderSlider"></span>
        </td>
    </tr>
    
</table>

</form>
</div>
<script type="text/javascript">
function append(){
	$('#gambar').append('<table><tr><td>Gambar</td><td><input type=\"text\" name=\"gambar\" class=\"inputEdit\" /></td></tr>      <tr><td>Keterangan</td><td><input type=\"text\" name=\"keterangan\" class=\"inputEdit\" /></td></tr><tr><td colspan=\"2\"><hr/></td></tr></table>')
}

</script>
<script>
$("#slider").submit(function(event) {
	event.preventDefault();
	$('#loaderSlider').html('<img src="css/images/loader.gif" align="absmiddle"> Silahkan Tunggu...');
	 var $form = $( this ),
        url = $form.attr( 'action' );
	var gambar = [];
    $('input[name="gambar"]').each(function(i){
      gambar[i] = $(this).val();
    });
	gam=gambar.join('||');
	
	var keterangan = [];
    $('input[name="keterangan"]').each(function(i){
      keterangan[i] = $(this).val();
    });
	ket=keterangan.join('||');
	$form.find( 'select[name="gambar"]' ).attr('disabled', true);
	$form.find( 'select[name="keterangan"]' ).attr('disabled', true);
    $.post( url, { gambar: gam, keterangan: ket },
      function( data ) {
		  $('#content').html(data);
      }
    );
  });
</script>
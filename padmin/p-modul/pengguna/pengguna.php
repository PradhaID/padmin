<?php
include ("../class.php");
?>
<img src="css/images/user.png" align="left" /> <h2 style="padding-top:3px;"> Data Pengguna</h2>
<br>
<div id="data">
<table class="data" width="100%" cellpadding="0" cellspacing="0">
	<thead>
    	<tr>
            <td align="center" width="15%">Nama</td>
            <td align="center" width="10%">Username</td>
            <td align="center" width="25%">E-Mail</td>
            <td align="center" width="40%">Biografi</td>
            <td align="center" width="10%">Sebagai</td>
        </tr>
    </thead>
    <tbody>
    	<?php
		foreach($data->pengguna() as $data){
		?>
    	<tr>
            <td><?php echo $data['nama'];?></td>
            <td><?php echo $data['username'];?></td>
            <td><?php echo $data['email'];?></td>
            <td><?php echo $data['biografi'];?></td>
            <td><?php echo $data['nama_grup'];?></td>
        </tr>
        <?php
		}
		?>
    </tbody>
    <tfoot>
    	<tr>
            <td align="center" width="15%">Nama</td>
            <td align="center" width="10%">Username</td>
            <td align="center" width="25%">E-Mail</td>
            <td align="center" width="40%">Biografi</td>
            <td align="center" width="10%">Sebagai</td>
        </tr>
    </tfoot>
</table>
</div>
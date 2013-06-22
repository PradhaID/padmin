<div id="content" style="padding:20px;">
<h1> Aktivasi Akun</h1>

    <?php
    if ($_GET['id']=="konfirmasi" && isset($_GET['hal'])){
        if ($func->cekKonfirmasi($_GET['hal'])){
            echo '<div style="padding: 20px; text-align:center;">Akun anda telah diaktifkan!<br>Silahkan <a href="'.$dir->rootDir().'login/1/login'.$func->ext().'">login</a> untuk dapat mengakses fasilitas kami</div>';
        } else {
            echo '<div style="padding: 20px; text-align:center;">Kode konfirmasi telah kadaluarsa</div>';
        }
    } else if ($_GET['id']=="kirimulang"){
        if (isset($_POST['nis'])){
            if ($func->cekAkun($_POST['nis'])){
                $kode=md5(date('dmyhis').uniqid()).md5("konfirmasi");
                $func->updateKonfirmasi($_POST['nis'],$kode);
                $siswa=$func->siswa($_POST['nis']);
                $url="http://".$_SERVER['HTTP_HOST']."/konfirmasi/konfirmasi/".$kode."/aktivasi".$func->ext();
                $isi="Klik link dibawah ini untuk mengaktifkan akun anda<br> ".$url;
                $func->email($siswa['email'],$siswa['nama'],'Konfirmasi Aktivasi Akun',$isi);
            } else {
                echo '<div style="padding: 20px; text-align:center;"> Akun anda belum terdaftar :</div>';
                formKirim($dir, $func);
            }
        } else {
            echo '<div style="padding: 20px; text-align:center;"> Masukan NIS atau E-Mail anda :</div>';
            formKirim($dir, $func);
        }
    }
    function formKirim($dir, $func){
    ?>
    <form action="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" name="login" method="post">
    <table align="center">
        <tr>
            <td align="right">NIS/E-Mail</td>
            <td><input type="text" name="nis" placeholder="NIS/E-Mail" style="width: 200px;"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btnLogin" value="Kirimkan Permintaan"></td>
        </tr>
    </table>
    </form>
    <?php } ?>
</div>
<div id="content" style="padding:20px;">
    <?php
    if ($_GET['id']=="ubah" && isset($_GET['hal'])){
        ?><h1>Ubah Password</h1><?php
    } else if ($_GET['id']=="kirim"){
        ?><h1>Lupa Password</h1><?php
    }
    if ($_GET['id']=="ubah" && isset($_GET['hal'])){
        if ($func->cekLupaPassword($_GET['hal'])){
            if (isset($_POST['password'])){
                if ($validasi->password($_POST['password'])!="benar" ||  $_POST['password']!=$_POST['repassword']){
                    echo '<div style="padding: 20px; text-align:left;">';
                    echo '<strong>Ada beberapa kesalahan di dalam pembuatan password, seperti :</strong>';
                    echo '<ul>';
                    if ($validasi->password($_POST['password'])!="benar"){
                        echo '<li>'.$validasi->password($_POST['password']).'</li>';
                    }
                    if ($_POST['password']!=$_POST['repassword']){
                        echo '<li>Password baru tidak sama dengan ulangi password baru</li>';
                    }
                    echo '</ul>';
                    echo '</div>';
                    formUbah($dir, $func);
                } else {
                    if ($func->ubahPassword($_POST['password'],$_GET['hal'])){
                        echo '<div style="padding: 20px; text-align: center;color: red;"> Password anda telah berhasil diubah! Silahkan <a href="'.$dir->rootDir().'login/1/login'.$func->ext().'">Login</a> </div>';
                    }
                }
            } else {
                formUbah($dir, $func);
            }
        } else {
            echo '<div style="padding: 20px; text-align:center;">Kode konfirmasi telah kadaluarsa</div>';
        }
    } else if ($_GET['id']=="kirim"){
        if (isset($_POST['nis'])){
            if ($func->cekAkun($_POST['nis'])){
                //Kirim E-Mail
                $kode=md5(date('dmyhis').uniqid()).md5("lupa");
                $url="http://".$_SERVER['HTTP_HOST']."/lupa/ubah/".$kode."/ubahpassword".$func->ext();
                $func->updateLupa($_POST['nis'],$kode);
                $siswa=$func->siswa($_POST['nis']);
                $isi="Anda telah melakukan konfirmasi kehilangan password<br>Untuk mendapatkan password anda kembali, klik link dibawah ini ".$url;
                $func->email($siswa['email'],$siswa['nama'],'Lupa Password',$isi);
                echo '<div style="padding: 20px; text-align:center;">Silahkan cek e-mail anda.<br> Sistem kami telah mengirimkan link untuk konfirmasi password anda</div>';
            } else {
                echo '<div style="padding: 20px; text-align:center;color: red;">NIS/E-Mail Tidak Terdaftar</div>';
                formKirim($dir, $func);
            }
        } else {
            echo '<div style="padding: 20px; text-align:center;"> Masukan NIS atau E-Mail anda :</div>';
            formKirim($dir, $func);
        }
    }
    function formUbah($dir, $func){
        ?>
        <form action="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" name="ubah" method="post">
            <table align="center">
                <tr>
                    <td align="right">Password Baru</td>
                    <td><input type="password" name="password" placeholder="Password Baru" style="width: 200px;"></td>
                </tr>
                <tr>
                    <td align="right">Ulangi Password Baru</td>
                    <td><input type="password" name="repassword" placeholder="Ulangi Password Baru" style="width: 200px;"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="btnLogin" value="Ubah Password"></td>
                </tr>
            </table>
        </form>
        <?php
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
            <td><input type="submit" name="btnLogin" value="Kirimkan Permintaan"> | <a href="<?php echo $dir->rootDir().'login/1/login'.$func->ext(); ?>">Ingat?</a> </td>
        </tr>
    </table>
    </form>
    <?php } ?>
</div>
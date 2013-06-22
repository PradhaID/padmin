<div id="content" style="padding:20px;">
<h1>Login</h1>
    <?php
    if (isset($_POST['nis']) && isset($_POST['password'])){
       ?>
        <center>
            <?php
            if ($func->login($_POST['nis'], $_POST['password'])=="valid"){
                if (isset($_GET['hal'])){
                    header("Location:".$_GET['hal']);
                } else {
                    header("Location:http://".$_SERVER['HTTP_HOST']);
                }
            } else if ($func->login($_POST['nis'], $_POST['password'])=="belumvalid"){
                echo '<div style="padding: 20px; text-align: center;color: red;"> Akun anda belum di verifikasi! <a href="'.$dir->rootDir().'konfirmasi/kirimulang/aktivasi'.$func->ext().'">Kirim ulang link aktivasi akun</a></div>';
            } else {
                echo '<div style="padding: 20px; text-align: center;color: red;"> Kombinasi NIS/E-Mail dengan password tidak benar! Silahkan coba lagi</div>';
            }
            ?>
        </center>
       <?php
    }
    ?>
    <form action="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" name="login" method="post">
    <table align="center">
        <tr>
            <td align="right">NIS/E-Mail</td>
            <td><input type="text" name="nis" placeholder="NIS/E-Mail"></td>
        </tr>
        <tr>
            <td align="right">Password</td>
            <td><input type="password" name="password" placeholder="Password"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btnLogin" value="Login"> ( <a href="<?php echo $dir->rootDir().'lupa/kirim/password'.$this->ext(); ?>">Lupa?</a> | <a href="<?php echo $dir->rootDir().'registrasi/siswa/reg'.$this->ext(); ?>">Daftar</a> )</td>
        </tr>
    </table>
    </form>
</div>
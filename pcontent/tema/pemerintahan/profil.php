<div id="content" style="padding:20px;">

    <?php
    if ($_GET['id']=="edit"){
        ?><h1>Edit Profil</h1><?php
    } else {
        ?><h1>Ubah Password</h1><?php
    }
    if ($_GET['id']=="edit"){
        if (isset($_POST['nis'])){
            echo '<div style="background-color: #1d063c;padding: 10px 10px 5px 10px;color: #fff;margin-top: 10px;">';
            $tgl=explode('/',$_POST['tanggal']);
            if (isset($tgl[2]) && isset($tgl[1])){
                $tgl_lahir=$tgl[2]."-".$tgl[1]."-".$tgl[0];
                $konfirmasi=md5(date('dmyhis').uniqid()).md5($tgl_lahir);
            }
            if ($validasi->nama($_POST['nama'])!="benar" ||
                (!isset($tgl[2]) && !isset($tgl[1])) ||
                $_POST['kelas']=="" ||
                $_POST['tempat']=="" ||
                $_POST['tanggal']==""){
                echo "<strong>Oops..!Tampaknya ada kesalahan pengisian form, seperti:</strong>";
                echo "<ul>";
                if ($_POST['kelas']==""){
                    echo '<li>Anda belum memilih kelas</li>';
                }
                if ($validasi->nama($_POST['nama'])!="benar"){
                    echo '<li>'.$validasi->nama($_POST['nama']).'</li>';
                }
                if ($_POST['tempat']==""){
                    echo '<li>Anda belum mengisi tempat lahir</li>';
                }
                if ($_POST['tanggal']=="" || (!isset($tgl[2]) && !isset($tgl[1]))){
                    echo '<li>Anda belum mengisi tanggal lahir</li>';
                }
                echo "</ul>";
            } else {
                if ($func->updateProfil($_POST['nama'],$_POST['jk'],$_POST['kelas'],$_POST['tempat'], $tgl_lahir)){
                    echo "Pembaharuan profil telah berhasil disimpan";
                } else {
                    echo "Gagal";
                }
            }
            echo '</div>';
        }
        formProfil($dir, $func);
    } else if ($_GET['id']=="ubahpassword"){
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
            } else {
                if ($func->updatePassword($_POST['password'])){
                    echo '<div style="padding: 20px; text-align: center;color: red;"> Password anda telah berhasil diubah! </div>';
                } else {
                    echo 'Gagal';
                }
            }
        }
        ?>
        <form action="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" name="ubahPassword" method="post">
            <table align="center">
                <tr>
                    <td align="right">Password Baru :</td>
                    <td><input type="password" name="password"> </td>
                </tr>
                <tr>
                    <td align="right">Ulangi Password Baru :</td>
                    <td><input type="password" name="repassword"> </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="btnUbahPassword" value="Simpan"> | <a href="<?php echo $dir->rootDir().'profil/edit/akun'.$func->ext(); ?>">Kembali ke Profil</a>  </td>
                </tr>
            </table>
        </form>
        <?php
    }
    function formProfil($dir, $func){
        $siswa=$func->siswa($_SESSION['nis']);
    ?>
    <form action="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" name="reg" method="post">
    <table align="center">
        <tr>
            <td align="right">No Induk Siswa</td>
            <td><input type="text" name="nis" disabled="disabled" readonly="readonly" value="<?php echo $siswa['nis']; ?>"></td>
        </tr>
        <tr>
            <td align="right">Kelas</td>
            <td>
                <select name="kelas">
                    <option value="">.: Pilih Kelas :.</option>
                    <?php
                    foreach($func->kelas() as $kelas){
                        ?><option <?php if ($siswa['kelas']==$kelas['id']) echo 'selected="selected"'; ?> value="<?php echo $kelas['id']; ?>" <?php if (isset($_POST['kelas']) && $_POST['kelas']==$kelas['id']) echo 'selected="selected"'; ?>><?php echo $kelas['nama']; ?></option><?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right">Nama</td>
            <td><input type="text" name="nama" value="<?php if (isset($_POST['nama'])) echo $_POST['nama']; else echo $siswa['nama']; ?>" style="width: 300px; "></td>
        </tr>
        <tr>
            <td align="right">E-Mail</td>
            <td><input type="text" name="email" disabled="disabled" readonly="readonly" value="<?php if (isset($_POST['email'])) echo $_POST['email']; else echo $siswa['email']; ?>" style="width: 300px;"></td>
        </tr>
        <tr>
            <td align="right">Password</td>
            <td> (<a href="<?php echo $dir->rootDir().'profil/ubahpassword/akun'.$func->ext(); ?>">Ubah Password</a>)</td>
        </tr>
        <tr>
            <td align="right">Jenis Kelamin</td>
            <td><label for="jkL"><input type="radio" value="L" name="jk" id="jkL" <?php if ((isset($_POST['jk']) && $_POST['jk']=="L") || $siswa['jk']=="L") echo 'checked="checked"' ?>> Laki-laki </label>
                <label for="jkP"><input type="radio" value="P" name="jk" id="jkP" <?php if ((isset($_POST['jk']) && $_POST['jk']=="P") || $siswa['jk']=="P") echo 'checked="checked"' ?>> Perempuan </label></td>
        </tr>
        <tr>
            <td align="right">Tempat Lahir</td>
            <td><input type="text" name="tempat" value="<?php if (isset($_POST['tempat'])) echo $_POST['tempat']; else echo $siswa['tempat_lahir']; ?>" style="width: 300px; "></td>
        </tr>
        <tr>
            <td align="right">Tanggal</td>
            <td><input type="text" name="tanggal" id="tanggal" value="<?php if (isset($_POST['tanggal'])) echo $_POST['tanggal']; else echo $siswa['tgl_lahir']; ?>" style="width: 65px;"> dd/mm/yyyy</td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btnReg" value="Simpan Perubahan"></td>
        </tr>
    </table>
    </form>
    <link rel="stylesheet" href="<?php echo $dir->rootDir().$dir->temaDir().'/css/jquery-ui.css'; ?>">
    <script type="text/javascript" src="<?php echo $dir->rootDir().$dir->temaDir().'/js/jquery.ui.core.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo $dir->rootDir().$dir->temaDir().'/js/jquery.ui.datepicker.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo $dir->rootDir().$dir->temaDir().'/js/jquery.ui.datepicker-id.min.js'; ?>"></script>
    <script>
        $(function() {
            $( "#tanggal" ).datepicker({
                yearRange: "-25:+0",
                dateFormat:"dd/mm/yy",
                changeMonth:true,
                changeYear:true
            });
        });
    </script>
    <?php } ?>
</div>
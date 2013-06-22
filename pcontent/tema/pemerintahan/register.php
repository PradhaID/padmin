<div id="content" style="padding:20px;">
<h1>Registrasi</h1>
    <?php
    if (isset($_POST['nis'])){
        echo '<div style="background-color: #1d063c;padding: 10px 10px 5px 10px;color: #fff;margin-top: 10px;">';
        $tgl=explode('/',$_POST['tanggal']);
        if (isset($tgl[2]) && isset($tgl[1])){
            $tgl_lahir=$tgl[2]."-".$tgl[1]."-".$tgl[0];
            $konfirmasi=md5(date('dmyhis').uniqid()).md5($tgl_lahir);
        }
        if ($validasi->nis($_POST['nis'])!="benar" ||
            $validasi->email($_POST['email'])!="benar" ||
            $validasi->nama($_POST['nama'])!="benar" ||
            $validasi->password($_POST['password'])!="benar" ||
            (!isset($tgl[2]) && !isset($tgl[1])) ||
            $_POST['kelas']=="" ||
            $_POST['tempat']=="" ||
            $_POST['password']!=$_POST['repassword'] ||
            $_POST['tanggal']==""){
            echo "<strong>Oops..!Tampaknya ada kesalahan pengisian form, seperti:</strong>";
            echo "<ul>";
            if ($validasi->nis($_POST['nis'])!="benar"){
                echo '<li>'.$validasi->nis($_POST['nis']).'</li>';
            }
            if ($_POST['kelas']==""){
                echo '<li>Anda belum memilih kelas</li>';
            }
            if ($validasi->nama($_POST['nama'])!="benar"){
                echo '<li>'.$validasi->nama($_POST['nama']).'</li>';
            }
            if ($validasi->email($_POST['email'])!="benar"){
                echo '<li>'.$validasi->email($_POST['email']).'</li>';
            }

            if ($validasi->password($_POST['password'])!="benar"){
                echo '<li>'.$validasi->password($_POST['password']).'</li>';
            }
            if ($_POST['password']!=$_POST['repassword']){
                echo '<li>Ulangi password tidak sama dengan password</li>';
            }

            if ($_POST['tempat']==""){
                echo '<li>Anda belum mengisi tempat lahir</li>';
            }
            if ($_POST['tanggal']=="" || (!isset($tgl[2]) && !isset($tgl[1]))){
                echo '<li>Anda belum mengisi tanggal lahir</li>';
            }
            echo "</ul>";
        } else {
            if ($func->reg($_POST['nis'],$_POST['email'],$_POST['password'],$_POST['nama'],$_POST['jk'],$_POST['kelas'],$_POST['tempat'], $tgl_lahir, $konfirmasi)){
                $url="http://".$_SERVER['HTTP_HOST']."/konfirmasi/konfirmasi/".$konfirmasi."/aktivasi".$func->ext();
                $isi = 'Pendaftaran siswa telah berhasil<br>Klik link dibawah ini untuk mengaktivasi akun anda<br>'.$url;
                $func->email($_POST['email'],$_POST['nama'],'Pendaftaran Siswa',$isi);
                echo "Pendaftaran Berhasil";
            } else {
                echo "Gagal";
            }
        }
        echo '</div>';
    }
    ?>
    <form action="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" name="reg" method="post">
    <table align="center">
        <tr>
            <td align="right">No Induk Siswa</td>
            <td><input type="text" name="nis" value="<?php if (isset($_POST['nis'])) echo $_POST['nis']; ?>"></td>
        </tr>
        <tr>
            <td align="right">Kelas</td>
            <td>
                <select name="kelas">
                    <option value="">.: Pilih Kelas :.</option>
                    <?php
                    foreach($func->kelas() as $kelas){
                        ?><option value="<?php echo $kelas['id']; ?>" <?php if (isset($_POST['kelas']) && $_POST['kelas']==$kelas['id']) echo 'selected="selected"'; ?>><?php echo $kelas['nama']; ?></option><?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right">Nama</td>
            <td><input type="text" name="nama" value="<?php if (isset($_POST['nama'])) echo $_POST['nama']; ?>" style="width: 300px; "></td>
        </tr>
        <tr>
            <td align="right">E-Mail</td>
            <td><input type="text" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" style="width: 300px;"></td>
        </tr>
        <tr>
            <td align="right">Password</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td align="right">Ulangi Password</td>
            <td><input type="password" name="repassword"></td>
        </tr>
        <tr>
            <td align="right">Jenis Kelamin</td>
            <td><label for="jkL"><input type="radio" value="L" name="jk" id="jkL" <?php if (isset($_POST['jk']) && $_POST['jk']=="L") echo 'checked="checked"' ?>> Laki-laki </label> <label for="jkP"><input type="radio" value="P" name="jk" id="jkP" <?php if (isset($_POST['jk']) && $_POST['jk']=="P") echo 'checked="checked"' ?>> Perempuan </label></td>
        </tr>
        <tr>
            <td align="right">Tempat Lahir</td>
            <td><input type="text" name="tempat" value="<?php if (isset($_POST['tempat'])) echo $_POST['tempat']; ?>" style="width: 300px; "></td>
        </tr>
        <tr>
            <td align="right">Tanggal</td>
            <td><input type="text" name="tanggal" id="tanggal" value="<?php if (isset($_POST['tanggal'])) echo $_POST['tanggal']; ?>" style="width: 65px;"> dd/mm/yyyy</td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btnReg" value="Daftar"> | <a href="<?php echo $dir->rootDir().'login/1/login'.$func->ext(); ?>">Login</a></td>
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
</div>
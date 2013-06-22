<?php 
$soal=$func->soal($_GET['id']); 
$seoTag=explode(',',$soal['kata_kunci']);
$seoTag=str_replace(' ', '-',array_map("trim",$seoTag));
function tambahTag($a){
	return ("tag-$a ");
}
$seoTag=array_map("tambahTag",$seoTag);
?>
<div id="content" class="<?php echo implode("",$seoTag); ?>" style="padding:20px;">
    <h2><?php echo $soal['nama']; ?></h2>
	<?php
	echo '<span style="padding:2px 8px;font-size:10px;">Ditulis oleh: <em>'.$soal['pengguna'].'</em>, '.str_replace('<br>',' ',$soal['tgl_masuk'])."</span>";
	?>
	<br>
    <?php echo $soal['deskripsi']; ?>
    <?php
    $url=explode("/",$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    if (isset($_GET['hal'])){
        $nilai=$func->nilai($_GET['hal']);
        ?>
        <center><strong>Daftar Nilai</strong></center>
        <table style="border: 1px solid #ccc;padding: 10px;" align="center">
            <tr>
                <td><strong>Soal</strong></td>
                <td>:</td>
                <td><?php echo $soal['nama']; ?></td>
            </tr>
            <tr>
                <td><strong>NIS</strong></td>
                <td>:</td>
                <td><?php echo $_SESSION['nis']; ?></td>
            </tr>
            <tr>
                <td><strong>Nama</strong></td>
                <td>:</td>
                <td><?php echo $_SESSION['nama']; ?></td>
            </tr>
            <tr>
                <td><strong>Kelas</strong></td>
                <td>:</td>
                <td><?php $kelas=$func->kelas($_SESSION['kelas']); echo $kelas['nama']; ?></td>
            </tr>
            <tr>
                <td><strong>Waktu Pengerjaan</strong></td>
                <td>:</td>
                <td><?php echo $nilai['waktu']; ?></td>
            </tr>
        </table>
        <center><strong>Detail Nilai</strong></center>
        <table style="border: 1px solid #ccc;padding: 10px;" align="center">
            <?php $benar=0;$salah=0;?>
            <?php foreach($func->detailNilai($_GET['hal']) as $detail){ ?>
            <?php if ($detail['benar']=="benar") $benar=$benar+1; else $salah=$salah+1; ?>
            <?php } ?>
            <tr>
                <td><?php echo 'Benar <strong>'.$benar.'</strong> dari <strong>'.($benar+$salah).'</strong> Pertanyaan'; ?></td>
            </tr>

            <tr>
                <td align="center"><strong>Nilai:</strong><strong><?php echo number_format($benar/count($func->detailNilai($_GET['hal']))*10,2,',','.');?></strong></td>
            </tr>
        </table>
        <?php
    } else {
        if (isset($_SESSION['nis']) && isset($_SESSION['nama']) && isset($_SESSION['kelas'])){
            if (isset($_POST['pertanyaan'])){
                $soal=$func->soal($_GET['id']);
                $sisawaktu=explode(':',$_POST['waktu'], 2);
                $jumlahDetik=($soal['waktu']*60)-(($sisawaktu[0]*60)+$sisawaktu[1]);
                $menit=number_format($jumlahDetik/60,0);
                $detik=$jumlahDetik%60;
                $id=$func->insertNilai($_SESSION['nis'], $_GET['id'],$menit.' Menit '.$detik.' Detik');
                foreach($_POST['pertanyaan'] as $pertanyaan){
                    if (!isset($_POST[$pertanyaan])){
                        $_POST[$pertanyaan]="null";
                    }
                    $func->insertDetailNilai($id, $pertanyaan, $_POST[$pertanyaan]);
                }
                echo $_POST['waktu'];
                header("Location:http://".$url['0']."/".$url['1']."/".$url['2']."/".$id."/".$url['3']);
            } else if (!$func->cekStatusSoal($_GET['id'])){
                echo "<div style='padding: 20px;text-align: center;'>Oops...!anda tidak memiliki hak akses untuk soal ini :)</div>";
            } else if (!$func->cekSoalKelas($_GET['id'],$_SESSION['kelas'])){
                echo "<div style='padding: 20px;text-align: center;'>Maaf soal ini bukan untuk kelas anda :)</div>";
            } else if ($func->cekPengerjaanSoal($_SESSION['nis'],$_GET['id'])){
                echo "<div style='padding: 20px;text-align: center;'>Soal ini sudah anda kerjakan :)</div>";
            } else {
            ?>
            <div style='padding: 20px;'>

                <script type="text/javascript">
                    var sec=0;
                    var min=<?php $soal=$func->soal($_GET['id']); echo $soal['waktu'];?>;
                    function countDown(){
                        if (min<=0 && sec<=00){
                            time="-";
                            sec = "00"; window.clearTimeout(SD);
                            document.getElementById("theTime").innerHTML="-";
                        }
                        if (sec<=9) {
                            sec = "0" + sec;
                        }
                        time = "Sisa Waktu: <strong>"+(min<=9 ? "0" + min : min) + "</strong> menit dan <strong>" + sec + "</strong> detik ";
                        waktu = (min<=9 ? "0" + min : min) +':' +sec;
                        if (time!="unlimited" && document.getElementById) {
                            theTime.innerHTML = time;
                            document.getElementById('waktu').value=waktu;
                        }
                        sec--;
                        if (sec == -01) {
                            sec = 59;
                            min = min - 1;
                        } else {
                            min = min;
                        }
                        SD=window.setTimeout("countDown();", 1000);
                        if (min == '00' && sec == '00') {
                            sec = "00"; window.clearTimeout(SD);
                            alert("Oops...!Waktu anda telah habis!");
                            document.forms["soal"].submit();
                        }
                    }
                    $(document).ready(function() {
                        countDown();
                    });
                </script>
             <div align="right" id="theTime" class="timeClass"></div>
            <table align="center" width="500">
                <tr>
                    <td>
            <form id="soal" name="soal" method="post" action="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>">
                <input type="hidden" name="waktu" id="waktu" value="">
            <?php
            foreach($func->pertanyaan($_GET['id']) as $pertanyaan){
                ?>
                <fieldset class="sectionwrap">
                    <legend><?php echo $pertanyaan['pertanyaan']; ?></legend>
                <?php
                echo '<ol type="A">';
                $alpha="A";
                    echo '<input type="hidden" name="pertanyaan[]" value="'.$pertanyaan['id_pertanyaan'].'"> ';
                foreach($func->jawaban($pertanyaan['id_pertanyaan']) as $jawaban){
                    echo '<li><label for="'.$jawaban['id_jawaban'].'"><input type="radio" name="'.$pertanyaan['id_pertanyaan'].'" id="'.$jawaban['id_jawaban'].'" value="'.$jawaban['id_jawaban'].'">'.$jawaban['jawaban'].'</label></li>';
                    $alpha++;
                }
                echo '</ol>';
                    if ($pertanyaan==end($func->pertanyaan($_GET['id']))){
                ?>
                <div align="right"><input type="submit" name="btnSoal" value="Selesai!"> </div>
                    <?php } ?>
                </fieldset>
                <?php
            }
            ?>

            </form>
                    </td>
                </tr>
            </table>
            </div>
                <?php
            }
        } else {
            header("Location:".$dir->rootDir().'login/1/login'.$func->ext());
        }
    }
    ?>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $dir->rootDir().$dir->temaDir().'/js/formWizard.js'; ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $dir->rootDir().$dir->temaDir().'/css/formWizard.css'; ?>" />
    <script type="text/javascript">
            var myform=new formtowizard({
                formid: 'soal',
                persistsection: true,
                revealfx: ['fade', 500]
            });
    </script>
	<div style="font-size:10px;"><strong>Tag: </strong><em><?php echo $soal['kata_kunci']; ?></em></div>
    <div style="clear:both;"></div>
</div>
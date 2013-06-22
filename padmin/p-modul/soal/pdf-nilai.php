<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adityudhna
 * Date: 10/20/12
 * Time: 6:32 AM
 * To change this template use File | Settings | File Templates.
 */
include ("../class.php");

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFillColor(200);
$pdf->SetTextColor(0);
$pdf->SetAuthor('Aditya Yudha Pradhana');
$pdf->SetTitle('Daftar Nilai');

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Daftar Nilai',0,0,'C');
$pdf->Cell(27,15,'',0,0,'L');
$pdf->Ln();
$pdf->SetFont('Arial','',10);

$soal=$data->soal($_GET['id']);
$pdf->Cell(27,5,'Soal',0,0,'L');
$pdf->Cell(3,5,':',0,0,'L');
$pdf->Cell(0,5,$soal['nama'],0,0,'L');
$pdf->Ln();
$pdf->Cell(27,5,'Deskripsi Soal',0,0,'L');
$pdf->Cell(3,5,':',0,0,'L');
$pdf->Cell(0,5,$soal['deskripsi'],0,0,'L');
$pdf->Ln();
$pdf->Cell(27,5,'Waktu',0,0,'L');
$pdf->Cell(3,5,':',0,0,'L');
$pdf->Cell(0,5,$soal['waktu'].' Menit',0,0,'L');
$pdf->Ln();
$kls=null;
if (isset($_GET['kelas']) && $_GET['kelas']!=""){
    $kls=$data->kelas($_GET['kelas']);
    $kelas=$kls['nama'];
} else {
    $kelas="Semua Kelas";
}
$pdf->Cell(27,5,'Kelas',0,0,'L');
$pdf->Cell(3,5,':',0,0,'L');
$pdf->Cell(0,5,$kelas,0,0,'L');
$pdf->Ln();$pdf->Ln();

$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,8,'NIS',1,0,'C',true);
$pdf->Cell(50,8,'Nama',1,0,'C',true);
$pdf->Cell(35,8,'Kelas',1,0,'C',true);
$pdf->Cell(13,8,'Nilai',1,0,'C',true);
$pdf->Cell(37,8,'Waktu Pengerjaan',1,0,'C',true);
$pdf->Cell(32,8,'Tanggal Masuk',1,0,'C',true);
$pdf->Ln();
$pdf->SetFont('Arial','',9);
$pdf->SetFillColor(255,255,255);
if (count($data->nilai($_GET['id'],null, $kls['id']))==0){
    $pdf->Cell(0,5,'Belum ada nilai untuk soal ini',1,0,'C');
} else {
    foreach($data->nilai($_GET['id'],null,$kls['id']) as $nilai){
        $siswa=$data->siswa($nilai['nis']);
        $kelas=$data->kelas($siswa['kelas']);
        $pdf->Cell(25,10,$nilai['nis'],1,0,'C');
        if (strlen($siswa['nama'])>=30){
            $pdf->MultiCell(50,5,$siswa['nama'],1,'L');
        } else {
            $pdf->MultiCell(50,10,$siswa['nama'],1,'L');
        }

        $pdf->SetY($pdf->GetY()-10);
        $pdf->SetX($pdf->GetX()+75);
        if (strlen($kelas['nama'])<=20){
            $pdf->MultiCell(35,10,$kelas['nama'],1,'L');
        } else {
            $pdf->MultiCell(35,5,$kelas['nama'],1,'L');
        }
        $pdf->SetY($pdf->GetY()-10);
        $pdf->SetX($pdf->GetX()+110);
        $benar=0;
        foreach($data->detailNilai($nilai['id_nilai']) as $detail){
            if ($detail['benar']=='benar'){
                $benar=$benar+1;
            }
        }
        $perolehan_nilai=number_format($benar/count($data->detailNilai($nilai['id_nilai']))*10,2,',','.');
        $pdf->Cell(13,10,$perolehan_nilai,1,0,'C');
        $pdf->Cell(37,10,$nilai['waktu'],1,0,'C');
        $pdf->MultiCell(32,5,str_replace("<br>","\n\r",$nilai['tgl_masuk']),1,0,'R');
    }
}
if (isset($_GET['kelas']) && $_GET['kelas']!=""){
    $kelas=$data->kelas($_GET['kelas']);
    $pdf->Output("Daftar Nilai - ".$kelas['nama'].".pdf","D");
} else {
    $pdf->Output("Daftar Nilai.pdf","D");
}

?>
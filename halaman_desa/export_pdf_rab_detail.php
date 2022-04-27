<?php
session_start();
$kd_kel=$_SESSION['kodewil'];
include "config/koneksi.php";

$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kel=$tm_cari['nama'];
	
	$kd_prop=substr($kd_kel,0,2);
	$kd_kab=substr($kd_kel,0,5);
	$kd_kec=substr($kd_kel,0,8);
	
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_prop'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_prop=$tm_cari['nama'];

	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kab'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kab=$tm_cari['nama'];
	
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kec'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kec=$tm_cari['nama'];

	$id=$_GET['kd'];
			$cari_kd=mysqli_query($koneksi,"SELECT 
									kode, tahun, bidang, bidang_sub, kegiatan, 
									waktu, rincian from tbrab 
									where id='$id'");
				$tm_cari=mysqli_fetch_array($cari_kd);
				$tahun=$tm_cari['tahun'];
				$bidang=$tm_cari['bidang'];
				$bidang_sub=$tm_cari['bidang_sub'];
				$kegiatan=$tm_cari['kegiatan'];
				$waktu=$tm_cari['waktu'];
				$rincian=$tm_cari['rincian'];
				
				
				$cari_kd=mysqli_query($koneksi,"SELECT sum(jumlah) as tot FROM tbrab_detail WHERE kode_rab='$id'");
				$tm_cari=mysqli_fetch_array($cari_kd);
				$tot_rab=$tm_cari['tot'];
													
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$html = '<center><h4>Rencana Anggaran Biaya<br>
DESA '.$nm_kel.'<br>KECAMATAN '.$nm_kec.'</h4></center><hr/><br/>';
$html .= '<table border="0" cellspacing="0" width="100%">
        <tr>
            <td width="10%"><font size=2>Tahun Anggaran</font></td>
            <td width="2%" align="center"><font size=2>:</font></td>
            <td width="88%"><font size=2>'.$tahun.'</font></td>
        </tr>
		<tr>
            <td width="10%"><font size=2>Bidang</font></td>
            <td width="2%" align="center"><font size=2>:</font></td>
            <td width="88%"><font size=2>'.$bidang.'</font></td>
        </tr>
		<tr>
            <td width="10%"><font size=2>Sub Bidang</font></td>
            <td width="2%" align="center"><font size=2>:</font></td>
            <td width="88%"><font size=2>'.$bidang_sub.'</font></td>
        </tr>
		<tr>
            <td width="10%"><font size=2>Kegiatan</font></td>
            <td width="2%" align="center"><font size=2>:</font></td>
            <td width="88%"><font size=2>'.$kegiatan.'</font></td>
        </tr>
		<tr>
            <td width="10%"><font size=2>Waktu Pelaksanaan</font></td>
            <td width="2%" align="center"><font size=2>:</font></td>
            <td width="88%"><font size=2>'.$waktu.'</font></td>
        </tr>
		<tr>
            <td width="10%"><font size=2>Output/Keluaran</font></td>
            <td width="2%" align="center"><font size=2>:</font></td>
            <td width="88%"><font size=2>'.$rincian.'</font></td>
        </tr></table><br>
<table border="1" cellspacing="0" width="100%">
        <tr>
            <td rowspan="2" align="center"><font size=2>NO</font></td>
            <td rowspan="2" align="center"><font size=2>URAIAN</font></td>
            <td colspan="3" align="center"><font size=2>ANGGARAN</font></td>
        </tr>
		<tr>
            <td align="center"><font size=2>VOLUME</font></td>
            <td align="center"><font size=2>HARGA SATUAN</font></td>
            <td align="center"><font size=2>JUMLAH</font></td>
        </tr>';

$sql = mysqli_query($koneksi,"SELECT * from tbrab_sub where kode_rab='$id' order by id");
while ($tampil = mysqli_fetch_array($sql)) {
		$no_anggaran=$tampil['no_anggaran'];
										
			$cari_kd=mysqli_query($koneksi,"SELECT sum(jumlah) as tot FROM tbrab_detail 
											WHERE kode_rab='$id' and no_anggaran='$no_anggaran'");
			$tm_cari=mysqli_fetch_array($cari_kd);
			$tot_rab_sub=$tm_cari['tot'];
			
								
    $html .= "<tr>
		<td align='center'><font size=2>".$tampil['no_anggaran']."</font></td>
		<td><font size=2>".$tampil['uraian_sub']."</font></td>
		<td align='center'><font size=2></font></td>
		<td align='center'><font size=2></font></td>
        <td align='right'><font size=2>".number_format($tot_rab_sub,2)."</font></td>
    </tr>";

			$no = 0 ;
			$data1 = mysqli_query($koneksi,"SELECT * from tbrab_detail where kode_rab='$id' and no_anggaran='$no_anggaran' order by id");
			while($d1 = mysqli_fetch_array($data1)){
				$no++;	


$html .= "<tr>
		<td align='center'><font size=2></font></td>
		<td><font size=2>".$no_anggaran.".".$no." ".$d1['uraian']."</font></td>
		<td align='center'><font size=2>".$d1['volume']."</font></td>
		<td align='center'><font size=2>".number_format($d1['harga'],2)."</font></td>
        <td align='right'><font size=2>".number_format($d1['jumlah'],2)."</font></td>
    </tr>";
	
			}		
}

$html .= "<tr>
		<td align='center'><font size=2></font></td>
		<td><font size=2>JUMLAH (Rp)</font></td>
		<td align='center'><font size=2></font></td>
		<td align='center'><font size=2></font></td>
        <td align='right'><font size=2>".number_format($tot_rab,2)."</font></td>
    </tr>";

$html .="</table></html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Rencana Anggaran Biaya.pdf');
?>
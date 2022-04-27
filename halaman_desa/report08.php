<?php
session_start();
$kd_kel=$_SESSION['kodewil'];
include "config/koneksi.php";

$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kel=$tm_cari['nama'];
	
	$kd_kec=substr($kd_kel,0,8);
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kec'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kec=$tm_cari['nama'];
	
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal, 
								DATE_FORMAT(tgl_datang,'%d/%m/%Y') AS tanggal_datang,
													DATE_FORMAT(tgl_pindah,'%d/%m/%Y') AS tanggal_pindah,
													DATE_FORMAT(menetap_tgl,'%d/%m/%Y') AS tanggal_mati 
													FROM tbpenduduk where kode='$kd_kel' and 
(menetap<>'Menetap' and menetap<>'Lahir Di' and menetap<>'Hilang')");
$html = '<center><h4>Data Mutasi Penduduk</h4></center><hr/><br/>';
$html .= '<table border="1" cellspacing="0" width="100%">
        <tr>
													<td rowspan="2"><center><font size="2"><b>NOMOR URUT</b></font></center></td> 
													<td rowspan="2"><center><font size="2"><b>NAMA LENGKAP/PANGGILAN</b></font></center></td> 
													<td colspan="2"><center><font size="2"><b>TEMPAT DAN TGL LAHIR</b></font></center></td> 
													<td rowspan="2"><center><font size="2"><b>JENIS KELAMIN</b></font></center></td> 
													<td rowspan="2"><center><font size="2"><b>KEWARGANEGARAAN</b></font></center></td> 
													<td colspan="2"><center><font size="2"><b>PENAMBAHAN</b></font></center></td> 
													<td colspan="4"><center><font size="2"><b>PENGURANGAN</b></font></center></td> 													
													<td rowspan="2"><center><font size="2"><b>KET</b></font></center></td> 
	    </tr>
												<tr> 
													<td><center><font size="2"><b>TEMPAT LAHIR</b></font></center></td> 
													<td><center><font size="2"><b>TGL</b></font></center></td> 
													<td><center><font size="2"><b>DATANG DARI</b></font></center></td> 
													<td><center><font size="2"><b>TANGGAL</b></font></center></td> 
													<td><center><font size="2"><b>PINDAH KE</b></font></center></td> 
													<td><center><font size="2"><b>TANGGAL</b></font></center></td> 
													<td><center><font size="2"><b>MENINGGAL</b></font></center></td> 
													<td><center><font size="2"><b>TANGGAL</b></font></center></td> 
												</tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
	$id_jk=$row['id_jk'];
	$id_gol_darah=$row['id_gol_darah'];
	$id_agama=$row['id_agama'];
$id_status_kawin=$row['id_status_kawin'];
$kd_pekerjaan=$row['kd_pekerjaan'];
													$id_warga=$row['id_warga'];
													$id_dukuh=$row['id_dukuh'];
													$menetap=$row['menetap'];
													
	$cari_kd=mysqli_query($koneksi,"select jk FROM tbjk where kode='$id_jk'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jk=$tm_cari['jk'];
	
	$cari_kd=mysqli_query($koneksi,"select agama FROM tbagama where kode='$id_agama'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$agama=$tm_cari['agama'];

	$cari_kd=mysqli_query($koneksi,"select darah FROM tbdarah where kode='$id_gol_darah'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$darah=$tm_cari['darah'];

													$cari_kd=mysqli_query($koneksi,"select warga FROM tbwarga where kode='$id_warga'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$warga=$tm_cari['warga'];
													
													$cari_kd=mysqli_query($koneksi,"select nm_dukuh FROM tbdukuh where id_dukuh='$id_dukuh'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$nm_dukuh=$tm_cari['nm_dukuh'];
	
	$cari_kd=mysqli_query($koneksi,"select status_nikah FROM tbstatus_nikah where kode='$id_status_kawin'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$status_nikah=$tm_cari['status_nikah'];
													
	$cari_kd=mysqli_query($koneksi,"select pekerjaan FROM tbpekerjaan where kode='$kd_pekerjaan'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$pekerjaan=$tm_cari['pekerjaan'];

													if($menetap=='Datang Dari') {
														$txttgldatang = $row['tanggal_datang'];
														$txttglpindah = "";
														$txttglmati= "";
													}
													if($menetap=='Pindah Ke') {
														$txttgldatang = "";
														$txttglpindah = $row['tanggal_pindah'];
														$txttglmati= "";
													}
													if($menetap=='Meninggal') {
														$txttgldatang = "";
														$txttglpindah = "";
														$txttglmati= $row['tanggal_mati'];
													}
													
    $html .= "<tr>
        <td align='center'><font size=2>".$no."</font></td>
        <td align='center'><font size=2>".$row['nama']."</font></td>
        <td align='center'><font size=2>".$row['tempat_lhr']."</font></td>
	<td align='center'><font size=2>".$row['tanggal']."</font></td>
	<td align='center'><font size=2>".$jk."</font></td>
	<td align='center'><font size=2>".$warga."</font></td>
	<td align='center'><font size=2>".$row['menetap_ket1']."</font></td>
	<td align='center'><font size=2>".$txttgldatang."</font></td>
	<td align='center'><font size=2>".$row['menetap_ket2']."</font></td>
	<td align='center'><font size=2>".$txttglpindah."</font></td>
	<td align='center'><font size=2>".$row['menetap_ket3']."</font></td>
	<td align='center'><font size=2>".$txttglmati."</font></td>
	<td align='center'><font size=2>".$row['keterangan']."</font></td>
    </tr>";
    $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Data Mutasi Penduduk.pdf');
?>
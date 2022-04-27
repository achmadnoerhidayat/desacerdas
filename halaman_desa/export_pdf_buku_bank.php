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
$query = mysqli_query($koneksi,"SELECT *, DATE_FORMAT(tgl_trx,'%d/%m/%Y') AS tgl FROM tbbank where kode='$kd_kel'");
$html = '<center>Buku Bank<br>DESA .$nm_kel.<br>Kecamatan .$nm_kec.<br></center>';
$html .= '<table border="1" cellspacing="0" width="100%">
												<tr>
													<td align="center" rowspan="2"> <b>No</b></td>
													<td align="center" rowspan="2"> <b>Tanggal</b></td>
													<td align="center" colspan="2"> <b>Buku Bank</b></td>
													<td align="center" colspan="2"> <b>Pemasukan</b></td>
													<td align="center" colspan="3"> <b>Pengeluaran</b></td>
												</tr>
												<tr>
													<td align="center"> <b>Tanggal Transaksi</b></td>
													<td align="center"> <b>Uraian Transaksi</b></td>
													<td align="center"> <b>Setoran</b></td>
													<td align="center"> <b>Bunga Bank</b></td>
													<td align="center"> <b>Penarikan</b></td>
													<td align="center"> <b>Pajak</b></td>
													<td align="center"> <b>Administrasi Bank</b></td>
												</tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{						
													$setoran=$row['setoran'];
													$bunga=$row['bunga'];
													$penarikan=$row['penarikan'];
													$pajak=$row['pajak'];
													$adm=$row['adm'];
													
													if($setoran==0) {
														$setoran=0;
													}
													if($bunga==0) {
														$bunga=0;
													}
													if($penarikan==0) {
														$penarikan=0;
													}
													if($pajak==0) {
														$pajak=0;
													}
													if($adm==0) {
														$adm=0;
													}
    $html .= "<tr>
        <td align='center'><font size=2>".$no."</font></td>
        <td align='center'><font size=2>".$row['tgl']."</font></td>
        <td align='center'><font size=2>".$row['tgl']."</font></td>
        <td align='center'><font size=2>".$row['uraian_trx']."</font></td>
		<td align='center'><font size=2>".number_format($setoran,0)."</font></td>
		<td align='center'><font size=2>".number_format($bunga,0)."</font></td>
        <td align='center'><font size=2>".number_format($penarikan,0)."</font></td>
		<td align='center'><font size=2>".number_format($pajak,0)."</font></td>
		<td align='center'><font size=2>".number_format($adm,0)."</font></td>
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
$dompdf->stream('laporan_buku_bank.pdf');
?>

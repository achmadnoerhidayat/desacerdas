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

	$id_dukuh=$_GET['sdukuh'];
														$cari_kd=mysqli_query($koneksi,"select nm_dukuh FROM tbdukuh where id_dukuh='$id_dukuh'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$nm_dukuh=$tm_cari['nm_dukuh'];
													
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal FROM tbpenduduk where kode='$kd_kel' and id_dukuh='$id_dukuh'");
$html = '<center><h4>Laporan Kependudukan Berdasarkan Kelompok Usia<br>
Dusun '.$nm_dukuh.'</h4></center><hr/><br/>';
$html .= '<table border="1" cellspacing="0" width="100%">
        <tr>
            <td align="center"><font size=2>NO</font></td>
            <td align="center"><font size=2>KK</font></td>
            <td align="center"><font size=2>NIK</font></td>
            <td align="center"><font size=2>Nama Lengkap</font></td>
            <td align="center"><font size=2>Tempat Lahir</font></td>
			<td align="center"><font size=2>Tanggal Lahir</font></td>
			<td align="center"><font size=2>Jenis Kelamin</font></td>
			<td align="center"><font size=2>Alamat</font></td>
			<td align="center"><font size=2>RT</font></td>
			<td align="center"><font size=2>RW</font></td>
			<td align="center"><font size=2>Kel/Desa</font></td>
			<td align="center"><font size=2>Kecamatan</font></td>
			<td align="center"><font size=2>Gol. Darah</font></td>
			<td align="center"><font size=2>Agama</font></td>
			<td align="center"><font size=2>Status Perkawinan</font></td>
			<td align="center"><font size=2>Pekerjaan</font></td>
        </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
	$id_jk=$row['id_jk'];
	$id_gol_darah=$row['id_gol_darah'];
	$id_agama=$row['id_agama'];
$id_status_kawin=$row['id_status_kawin'];
$kd_pekerjaan=$row['kd_pekerjaan'];
	
	$cari_kd=mysqli_query($koneksi,"select jk FROM tbjk where kode='$id_jk'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jk=$tm_cari['jk'];
	
	$cari_kd=mysqli_query($koneksi,"select agama FROM tbagama where kode='$id_agama'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$agama=$tm_cari['agama'];

	$cari_kd=mysqli_query($koneksi,"select darah FROM tbdarah where kode='$id_gol_darah'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$darah=$tm_cari['darah'];
	
	$cari_kd=mysqli_query($koneksi,"select status_nikah FROM tbstatus_nikah where kode='$id_status_kawin'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$status_nikah=$tm_cari['status_nikah'];
													
	$cari_kd=mysqli_query($koneksi,"select pekerjaan FROM tbpekerjaan where kode='$kd_pekerjaan'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$pekerjaan=$tm_cari['pekerjaan'];
													
    $html .= "<tr>
		<td align='center'><font size=2>".$no."</font></td>
        <td align='center'><font size=2>".$row['kk']."</font></td>
        <td align='center'><font size=2>".$row['nik']."</font></td>
        <td align='center'><font size=2>".$row['nama']."</font></td>
        <td align='center'><font size=2>".$row['tempat_lhr']."</font></td>
		<td align='center'><font size=2>".$row['tanggal']."</font></td>
		<td align='center'><font size=2>".$jk."</font></td>
		<td align='center'><font size=2>".$row['alamat']."</font></td>
		<td align='center'><font size=2>".$row['rt']."</font></td>
		<td align='center'><font size=2>".$row['rw']."</font></td>
		<td align='center'><font size=2>".$nm_kel."</font></td>
		<td align='center'><font size=2>".$nm_kec."</font></td>
		<td align='center'><font size=2>".$darah."</font></td>
		<td align='center'><font size=2>".$agama."</font></td>
		<td align='center'><font size=2>".$status_nikah."</font></td>
		<td align='center'><font size=2>".$pekerjaan."</font></td>
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
$dompdf->stream('Laporan Kependudukan Berdasarkan Kelompok Usia-Detail.pdf');
?>
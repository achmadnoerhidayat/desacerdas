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
$query = mysqli_query($koneksi,"select *, DATE_FORMAT(tanggal,'%d/%m/%Y') AS tgl FROM tbkader where kode='$kd_kel'");
$html = '<center>Buku Kader Pemberdayaan Masyarakat<br>DESA ".$nm_kel."<br>Kecamatan .$nm_kec.<br></center>';
$html .= '<table border="1" cellspacing="0" width="100%">
        <tr>
            <th><font size=2>No</font></th>
            <th><font size=2>Tanggal</font></th>
            <th><font size=2>Nama Lengkap</font></th>
            <th><font size=2>Umur</font></th>
			<th><font size=2>Jenis Kelamin</font></th>
			<th><font size=2>Pendidikan/Kursus</font></th>
			<th><font size=2>Bidang</font></th>
			<th><font size=2>Alamat</font></th>
			<th><font size=2>Keterangan</font></th>
        </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
	$id_jk=$row['id_jk'];

	$cari_kd=mysqli_query($koneksi,"select jk FROM tbjk where kode='$id_jk'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jk=$tm_cari['jk'];

    $html .= "<tr>
        <td><font size=2>".$no."</font></td>
        <td><font size=2>".$row['tgl']."</font></td>
        <td><font size=2>".$row['nama']."</font></td>
        <td><font size=2>".$row['umur']."</font></td>
		<td><font size=2>".$jk."</font></td>
		<td><font size=2>".$row['pendidikan']."</font></td>
		<td><font size=2>".$row['bidang']."</font></td>
		<td><font size=2>".$row['alamat']."</font></td>
        <td><font size=2>".$row['keterangan']."</font></td>
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
$dompdf->stream('laporan_kader.pdf');
?>

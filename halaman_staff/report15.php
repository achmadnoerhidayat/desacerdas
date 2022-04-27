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
	
	$sbln=$_GET['sbln'];
	$sthn=$_GET['sthn'];	
	$srt=$_GET['srt'];	

		$cari_kd=mysqli_query($koneksi,"select bulan FROM tbbulan WHERE id='$sbln'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$nm_bulan=$tm_cari['bulan'];
													
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal, 
													DATE_FORMAT(menetap_tgl,'%d/%m/%Y') AS tanggal_mati 
													from tbpenduduk 
													where kode='$kd_kel' and 
																				menetap='Meninggal' and 
																				month(tgl_register)='$sbln' and 
																				year(tgl_register)='$sthn' and 
																				rt='$srt'");
$html = '<center><h4>LAPORAN KEMATIAN</h4></center><hr/><br/>';
$html .= '<table border="0" cellspacing="0" width="100%">
	<tr>
		<td width="10%"><font size="2">BULAN</font></td>
		<td width="2%" align="center"><font size="2">:</font></td>
		<td width="88%"><font size="2">'.$nm_bulan.'</font></td>
	</tr>
		<tr>
			<td width="10%"><font size="2">TAHUN</font></td>
			<td width="2%" align="center"><font size="2">:</font></td>
			<td width="88%"><font size="2">'.$sthn.'</font></td>
		</tr>
		<tr>
			<td width="10%"><font size="2">RT</font></td>
			<td width="2%" align="center"><font size="2">:</font></td>
			<td width="88%"><font size="2">'.$srt.'</font></td>
		</tr>
		<tr>
			<td width="10%"><font size="2">KELURAHAN</font></td>
			<td width="2%" align="center"><font size="2">:</font></td>
			<td width="88%"><font size="2">'.$nm_kel.'</font></td>
		</tr>
		<tr>
			<td width="10%"><font size="2">KECAMATAN</font></td>
			<td width="2%" align="center"><font size="2">:</font></td>
			<td width="88%"><font size="2">'.$nm_kec.'</font></td>
		</tr>
</table>
<br>
<table border="1" cellspacing="0" width="100%">
        <tr>
			<td align="center"><font size="2">NO</font></td>
			<td align="center"><font size="2">NAMA</font></td>
	       		<td align="center"><font size="2">JENIS KELAMIN</font></td>
	            	<td align="center"><font size="2">NIK</font></td>
	            	<td align="center"><font size="2">TEMPAT, TANGGAL LAHIR</font></td>
			<td align="center"><font size="2">TEMPAT,TANGGAL, JAM KEMATIAN</font></td>
			<td align="center"><font size="2">ALAMAT</font></td>
			<td align="center"><font size="2">KET</font></td>
        </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
	$id_jk=$row['id_jk'];
	
	$cari_kd=mysqli_query($koneksi,"select jk FROM tbjk where kode='$id_jk'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jk=$tm_cari['jk'];
													
    $html .= "<tr>
		<td align='center'><font size=2>".$no."</font></td>
        	<td align='center'><font size=2>".$row['nama']."</font></td>
		<td align='center'><font size=2>".$jk."</font></td>
        	<td align='center'><font size=2>".$row['nik']."</font></td>
        	<td align='center'><font size=2>".$row['tempat_lhr']."/".$row['tanggal']."</font></td>
        	<td align='center'><font size=2>".$row['menetap_ket4'].", ".$row['tanggal_mati'].", ".$row['jam_kematian']."</font></td>
		<td align='center'><font size=2>".$row['alamat']."</font></td>
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
$dompdf->stream('Laporan Kematian.pdf');
?>
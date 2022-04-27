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
													DATE_FORMAT(tgl_pergi,'%d/%m/%Y') AS tanggal_pergi 
													from tbpenduduk 
													where kode='$kd_kel' and menetap='Datang Dari'");
$html = '<center><h4>Data Penduduk Sementara</h4></center><hr/><br/>';
$html .= '<table border="1" cellspacing="0" width="100%">
        <tr>
													<td rowspan="2"><center><font size="1"><b>NOMOR URUT</b></font></center></td> 
													<td rowspan="2"><center><font size="1"><b>NAMA LENGKAP</b></font></center></td> 
													<td colspan="2"><center><font size="1"><b>JENIS KELAMIN</b></font></center></td> 													
													<td rowspan="2"><center><font size="1"><b>NOMOR IDENTITAS/TANDA PENGENAL</b></font></center></td> 
													<td rowspan="2"><center><font size="1"><b>TEMPAT DAN TANGGAL LAHIR</b></font></center></td> 
													<td rowspan="2"><center><font size="1"><b>PEKERJAAN</b></font></center></td>
													<td colspan="2"><center><font size="1"><b>KEWARGANEGARAAN</b></font></center></td>
													<td rowspan="2"><center><font size="1"><b>DATANG DARI</b></font></center></td> 
													<td rowspan="2"><center><font size="1"><b>MAKSUD DAN TUJUAN</b></font></center></td>
													<td rowspan="2"><center><font size="1"><b>NAMA DAN ALAMAT YANG DIDATANGI</b></font></center></td>
													<td rowspan="2"><center><font size="1"><b>DATANG TANGGAL</b></font></center></td>
													<td rowspan="2"><center><font size="1"><b>PERGI TANGGAL</b></font></center></td>
													<td rowspan="2"><center><font size="1"><b>KET</b></font></center></td>
												</tr>
												<tr> 
													<td><center><font size="1"><b>L</b></font></center></td> 
													<td><center><font size="1"><b>P</b></font></center></td> 
													<td><center><font size="1"><b>KEBANGSAAN</b></font></center></td> 
													<td><center><font size="1"><b>KETURUNAN</b></font></center></td>
        </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
													$id_jk=$row['id_jk'];
													$id_status_kawin=$row['id_status_kawin'];
													$id_agama=$row['id_agama'];
													$id_gol_darah=$row['id_gol_darah'];
													$kd_pekerjaan=$row['kd_pekerjaan'];
													$id_warga=$row['id_warga'];
													$id_dukuh=$row['id_dukuh'];
				
													if($id_jk=='1') {
														$ket_laki="L";
														$ket_perempuan="";
													}
													if($id_jk=='2') {
														$ket_laki="";
														$ket_perempuan="P";
													}
													
													if($id_warga=='1') {
														$wni="WNI";
														$wna="";
													}
													if($id_warga=='2') {
														$wni="";
														$wna="WNA";
													}																	
																	
													$cari_kd=mysqli_query($koneksi,"select jk FROM tbjk where kode='$id_jk'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jk=$tm_cari['jk'];

													$cari_kd=mysqli_query($koneksi,"select status_nikah FROM tbstatus_nikah where kode='$id_status_kawin'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$status_nikah=$tm_cari['status_nikah'];

													$cari_kd=mysqli_query($koneksi,"select agama FROM tbagama where kode='$id_agama'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$agama=$tm_cari['agama'];

													$cari_kd=mysqli_query($koneksi,"select darah FROM tbdarah where kode='$id_gol_darah'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$darah=$tm_cari['darah'];
													
													$cari_kd=mysqli_query($koneksi,"select pekerjaan FROM tbpekerjaan where kode='$kd_pekerjaan'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$pekerjaan=$tm_cari['pekerjaan'];
													
													$cari_kd=mysqli_query($koneksi,"select warga FROM tbwarga where kode='$id_warga'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$warga=$tm_cari['warga'];
													
													$cari_kd=mysqli_query($koneksi,"select nm_dukuh FROM tbdukuh where id_dukuh='$id_dukuh'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$nm_dukuh=$tm_cari['nm_dukuh'];
													
    $html .= "<tr>
        <td align='center'><font size=1>".$no."</font></td>
        <td align='center'><font size=1>".$row['nama']."</font></td>
        <td align='center'><font size=1>".$ket_laki."</font></td>
        <td align='center'><font size=1>".$ket_perempuan."</font></td>		
        <td align='center'><font size=1>".$row['nik']."</font></td>		
        <td align='center'><font size=1>".$row['tempat_lhr']."/".$row['tanggal']."</font></td>
		<td align='center'><font size=1>".$pekerjaan."</font></td>
		<td align='center'><font size=1>".$wni."</font></td>
		<td align='center'><font size=1>".$wna."</font></td>		
		<td align='center'><font size=1>".$row['menetap_ket1']."</font></td>
		<td align='center'><font size=1>".$row['maksud_datang']."</font></td>
		<td align='center'><font size=1>".$row['didatangi']."</font></td>
		<td align='center'><font size=1>".$row['tanggal_datang']."</font></td>
		<td align='center'><font size=1>".$row['tanggal_pergi']."</font></td>
		<td align='center'><font size=1>".$row['keterangan']."</font></td>
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
$dompdf->stream('Data Penduduk Sementara.pdf');
?>
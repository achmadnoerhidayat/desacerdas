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

	$txtkk=$_GET['kk'];
	$cari_kd=mysqli_query($koneksi,"select alamat, rt, rw 
																				FROM tbpenduduk 
																				where kode='$kd_kel' and kk='$txtkk'");
												$tm_cari=mysqli_fetch_array($cari_kd);
												$alamat_hdr=$tm_cari['alamat'];
												$rt_hdr=$tm_cari['rt'];
												$rw_hdr=$tm_cari['rw'];

												$cari_kd=mysqli_query($koneksi,"select nama FROM tbpenduduk 
																				where kode='$kd_kel' and kk='$txtkk' and status_hub='Kepala Keluarga'");
												$tm_cari=mysqli_fetch_array($cari_kd);
												$nama_kk=$tm_cari['nama'];
	
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal from tbpenduduk 
													where kode='$kd_kel' and kk='$txtkk'");

$html = '<center><h4>Data Kependudukan Berdasarkan KK dan AK (Anggota Keluarga)</h4></center><hr/><br/>';
$html .= '<table border="0" cellspacing="0" width="100%">
	<tr>
        <td width="15%" align="center"></td>
        <td width="20%"><font size=2><b>No. KK</b></font></td>
        <td width="20%"><font size=2>'.$txtkk.'</font></td>
        <td width="15%"><font size=2><b>Desa/Kelurahan</b></font></td>
		<td width="15%"><font size=2>'.$nm_kel.'</font></td>
		<td width="15%" align="center"></td>
    </tr>
	<tr>
        <td width="15%" align="center"></td>
        <td width="20%"><font size=2><b>Nama Kepala Keluarga</b></font></td>
        <td width="20%"><font size=2>'.$nama_kk.'</font></td>
        <td width="15%"><font size=2><b>Kecamatan</b></font></td>
		<td width="15%"><font size=2>'.$nm_kec.'</font></td>
		<td width="15%" align="center"></td>
    </tr>
	<tr>
        <td width="15%" align="center"></td>
        <td width="20%"><font size=2><b>Alamat</b></font></td>
        <td width="20%"><font size=2>'.$alamat_hdr.'</font></td>
        <td width="15%"><font size=2><b>Kabupaten/Kota</b></font></td>
		<td width="15%"><font size=2>'.$nm_kab.'</font></td>
		<td width="15%" align="center"></td>
    </tr>
	<tr>
        <td width="15%" align="center"></td>
        <td width="20%"><font size=2><b>RT/RW</b></font></td>
        <td width="20%"><font size=2>'.$rt_hdr.'/'.$rw_hdr.'</font></td>
        <td width="15%"><font size=2><b>Propinsi</b></font></td>
		<td width="15%"><font size=2>'.$nm_prop.'</font></td>
		<td width="15%" align="center"></td>
    </tr>	
	</table>
	<br>&nbsp;<br>
	<table border="1" cellspacing="0" width="100%">
	<tr>
		<td align="center"><font size="2">No</font></td>
		<td align="center"><font size="2">Nama Lengkap</font></td>
		<td align="center"><font size="2">NIK</font></td>
		<td align="center"><font size="2">Jenis Kelamin</font></td>
		<td align="center"><font size="2">Tempat Lahir</font></td>
		<td align="center"><font size="2">Tanggal Lahir</font></td>
		<td align="center"><font size="2">Agama</font></td>
		<td align="center"><font size="2">Pendidikan</font></td> 
		<td align="center"><font size="2">Jenis Pekerjaan</font></td>
    </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
	$id_jk=$row['id_jk'];
	$id_gol_darah=$row['id_gol_darah'];
	$id_agama=$row['id_agama'];
$id_status_kawin=$row['id_status_kawin'];
$kd_pekerjaan=$row['kd_pekerjaan'];
$kd_pendidikan=$row['kd_pendidikan'];
	
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

													$cari_kd=mysqli_query($koneksi,"select pendidikan FROM tbpendidikan where kode='$kd_pendidikan'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$pendidikan=$tm_cari['pendidikan'];
													
    $html .= "<tr>
		<td align='center'><font size=2>".$no."</font></td>
        <td align='center'><font size=2>".$row['nama']."</font></td>
        <td align='center'><font size=2>".$row['nik']."</font></td>
		<td align='center'><font size=2>".$jk."</font></td>		
        <td align='center'><font size=2>".$row['tempat_lhr']."</font></td>
		<td align='center'><font size=2>".$row['tanggal']."</font></td>
		<td align='center'><font size=2>".$agama."</font></td>
		<td align='center'><font size=2>".$pendidikan."</font></td>
		<td align='center'><font size=2>".$pekerjaan."</font></td>
    </tr>";
    $no++;
}

$html .= "</table>
<br>
<table border='1' cellspacing='0' width='100%'>
	<tr>
        <td rowspan='2' align='center'><font size='2'>Status Perkawinan</font></td>
        <td rowspan='2' align='center'><font size='2'>Status Hubungan<br>Dalam Keluarga</font></td>
        <td rowspan='2' align='center'><font size='2'>Kewarganegaraan</font></td>
        <td colspan='2' align='center'><font size='2'>Dokumen Imigrasi</font></td>
        <td colspan='2' align='center'><font size='2'>Nama Orang Tua</font></td>
    </tr>
	<tr>
        <td align='center'><font size='2'>No. Paspor</font></td>
        <td align='center'><font size='2'>No. Kitap</font></td>
        <td align='center'><font size='2'>Ayah</font></td>
        <td align='center'><font size='2'>Ibu</font></td>
    </tr>";

$query = mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal from tbpenduduk 
													where kode='$kd_kel' and kk='$txtkk'");

while($row = mysqli_fetch_array($query))
{
	$id_warga=$row['id_warga'];
	$id_status_kawin=$row['id_status_kawin'];
	
	$cari_kd=mysqli_query($koneksi,"select status_nikah FROM tbstatus_nikah where kode='$id_status_kawin'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$status_nikah=$tm_cari['status_nikah'];

	$cari_kd=mysqli_query($koneksi,"select warga FROM tbwarga where kode='$id_warga'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$warga=$tm_cari['warga'];
													
    $html .= "<tr>
        <td align='center'><font size=2>".$status_nikah."</font></td>
        <td align='center'><font size=2>".$row['status_hub']."</font></td>
		<td align='center'><font size=2>".$warga."</font></td>		
        <td align='center'><font size=2>".$row['passport']."</font></td>
		<td align='center'><font size=2>".$row['kitap']."</font></td>
		<td align='center'><font size=2>".$row['nm_ayah']."</font></td>
		<td align='center'><font size=2>".$row['nm_ibu']."</font></td>
    </tr>";
}
													
$html .= "</table></html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Data Kependudukan Berdasarkan KK dan AK.pdf');
?>
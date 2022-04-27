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
$query = mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal FROM tbpenduduk where kode='$kd_kel'");
$html = '<center><h4>Data KTP dan KK</h4></center><hr/><br/>';
$html .= '<table border="1" cellspacing="0" width="100%">
        <tr>
													<td rowspan="2"><center><font size="1"><b>NOMOR URUT</b></font></center></td> 
													<td rowspan="2"><center><font size="1"><b>NO. KK</b></font></center></td> 
													<td rowspan="2"><center><font size="1"><b>NAMA LENGKAP</b></font></center></td> 
													<td rowspan="2"><center><font size="1"><b>NIK</b></font></center></td> 
													<td rowspan="2"><center><font size="1"><b>JENIS KELAMIN</b></font></center></td> 													
													<td rowspan="2"><center><font size="1"><b>TEMPAT/TGL LAHIR</b></font></center></td> 
													<td rowspan="2"><center><font size="1"><b>GOL. DARAH</b></font></center></td>
													<td rowspan="2"><center><font size="1"><b>AGAMA</b></font></center></td>
													<td rowspan="2"><center><font size="1"><b>PENDIDIKAN</b></font></center></td>
													<td rowspan="2"><center><font size="1"><b>PEKERJAAN</b></font></center></td>
													<td rowspan="2"><center><font size="1"><b>ALAMAT</b></font></center></td>
													<td rowspan="2"><center><font size="1"><b>STATUS PERKAWINAN</b></font></center></td>
													<td rowspan="2"><center><font size="1"><b>TEMPAT DAN TANGGAL DIKELUARKAN</b></font></center></td>
													<td rowspan="2"><center><font size="1"><b>STATUS HUB. KELUARGA</b></font></center></td>
													<td rowspan="2"><center><font size="1"><b>KEWARGANEGARAAN</b></font></center></td>
													<td colspan="2"><center><font size="1"><b>ORANG TUA</b></font></center></td> 
													<td rowspan="2"><center><font size="1"><b>TGL MULAI</b></font></center></td> 
													<td rowspan="2"><center><font size="1"><b>KET</b></font></center></td> 
	    </tr>
												<tr> 
													<td><center><font size="1"><b>AYAH</b></font></center></td> 
													<td><center><font size="1"><b>IBU</b></font></center></td> 
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

													$cari_kd=mysqli_query($koneksi,"select warga FROM tbwarga where kode='$id_warga'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$warga=$tm_cari['warga'];
													
													$cari_kd=mysqli_query($koneksi,"select nm_dukuh FROM tbdukuh where id_dukuh='$id_dukuh'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$nm_dukuh=$tm_cari['nm_dukuh'];

													$cari_kd=mysqli_query($koneksi,"select pendidikan FROM tbpendidikan where kode='$kd_pendidikan'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$pendidikan=$tm_cari['pendidikan'];
													
    $html .= "<tr>
														<td align='center'><font size=1>".$no."</font></td>                  
														<td align='center'><font size=1>".$row['kk']."</font></td>
														<td align='center'><font size=1>".$row['nama']."</font></td>          
														<td align='center'><font size=1>".$row['nik']."</font></td>														
														<td align='center'><font size=1>".$jk."</font></td>
														<td align='center'>
															<font size=1>".$row['tempat_lhr']."/".$row['tanggal']."
															</font>
														</td>  
														<td align='center'><font size=1>".$darah."</font></td>
														<td align='center'><font size=1>".$agama."</font></td>
														<td align='center'><font size=1>".$pendidikan."</font></td>
														<td align='center'><font size=1>".$pekerjaan."</font></td>
														<td align='center'><font size=1>".$row['alamat']."</font></td>
														<td align='center'><font size=1>".$status_nikah."</font></td>
														<td align='center'>
															<font size=1>
															".$row['ktp_ket1']."/".$row['ktp_ket2']."
															</font>
														</td>														
														<td align='center'><font size=1>".$row['status_hub']."</font></td>
														<td align='center'><font size=1>".$warga."</font></td>
														<td align='center'><font size=1>".$row['nm_ayah']."</font></td>
														<td align='center'><font size=1>".$row['nm_ibu']."</font></td>													
														<td align='center'><font size=1></font></td>														
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
$dompdf->stream('Data KK dan AK.pdf');
?>
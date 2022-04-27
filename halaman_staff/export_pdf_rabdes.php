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

	$cbothn=$_GET['thn'];
													
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$html = '<center><h4>BUKU RANCANGAN ANGGARAN PENDAPATAN DAN BELANJA DESA<br>
PEMERINTAH DESA '.$nm_kel.'<br>TAHUN ANGGARAN '.$cbothn.'</h4></center><br/>';
$html .='<table border="1" cellspacing="0" cellpadding="5" style="width: 100%">
	<tr>
		<td colspan="4" align="center"><font size="2"><b>KODE  REKENING</b></font></td>
		<td align="center"><font size="2"><b>URAIAN</b></font></td>
		<td align="center"><font size="2"><b>ANGGARAN (Rp)</b></font></td>
		<td align="center"><font size="2"><b>KETERANGAN</b></font></td>
	</tr>';
$sql = mysqli_query($koneksi,"SELECT kode, nama FROM tbrek where left(kode,1)='1' order by kode asc");
while ($tampil = mysqli_fetch_array($sql)) {
		$kode1=substr($tampil['kode'],0,1);
		$kode2=substr($tampil['kode'],1,1);
		$kode3=substr($tampil['kode'],2,1);
		$kode4=substr($tampil['kode'],3,1);
		$kode5=$tampil['nama'];
		
		$kode=$tampil['kode'];
		$digit=strlen($kode);
		
		if($digit=='5') {
			$kode1="";
			$kode2="";
			$kode3="";
			$kode4="";
			$kode5=$kode." ".$tampil['nama'];
		}
		
		$data = mysqli_query($koneksi,"SELECT * FROM tbrapbes_detail WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'"); 
		$cek = mysqli_num_rows($data);
		if($cek > 0){
			$cari_kd=mysqli_query($koneksi,"SELECT anggaran, keterangan FROM tbrapbes_detail WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'");
			$tm_cari=mysqli_fetch_array($cari_kd);
			$anggaran=$tm_cari['anggaran'];	
			$keterangan=$tm_cari['keterangan'];
			$anggaran1=number_format($anggaran,0);
		} else {
			$anggaran1="";
			$keterangan="";
		}
			
								
    $html .= "<tr>
		<td align='center'><font size=2>".$kode1."</font></td>
		<td align='center'><font size=2>".$kode2."</font></td>
		<td align='center'><font size=2>".$kode3."</font></td>
		<td align='center'><font size=2>".$kode4."</font></td>
        <td><font size=2>".$kode5."</font></td>
        <td align='right'><font size=2>".$anggaran1."</font></td>
        <td><font size=2>".$keterangan."</font></td>
    </tr>";
}
	$cari_kd=mysqli_query($koneksi,"SELECT sum(anggaran) as tot FROM tbrapbes_detail WHERE left(kode,1)='1' and tahun='$cbothn' and kode_wil='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$tot1=$tm_cari['tot'];	
											
$html .= "<tr>
		<td align='center'><font size=2></font></td>
		<td align='center'><font size=2></font></td>
		<td align='center'><font size=2></font></td>
		<td align='center'><font size=2></font></td>
        <td><font size=2>JUMLAH PENDAPATAN</font></td>
        <td align='right'><font size=2>".number_format($tot1,0)."</font></td>
        <td><font size=2></font></td>
    </tr>";


$sql = mysqli_query($koneksi,"SELECT kode, nama FROM tbrek where left(kode,1)='2' order by kode asc");
while ($tampil = mysqli_fetch_array($sql)) {
				$kode1=substr($tampil['kode'],0,1);
		$kode2=substr($tampil['kode'],1,1);
		$kode3=substr($tampil['kode'],2,1);
		$kode4=substr($tampil['kode'],3,1);
		$kode5=$tampil['nama'];
		
		$kode=$tampil['kode'];
		$digit=strlen($kode);
		
		if($digit=='5') {
			$kode1="";
			$kode2="";
			$kode3="";
			$kode4="";
			$kode5=$kode." ".$tampil['nama'];
		}
		
		$data = mysqli_query($koneksi,"SELECT * FROM tbrapbes_detail WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'"); 
		$cek = mysqli_num_rows($data);
		if($cek > 0){
			$cari_kd=mysqli_query($koneksi,"SELECT anggaran, keterangan FROM tbrapbes_detail WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'");
			$tm_cari=mysqli_fetch_array($cari_kd);
			$anggaran=$tm_cari['anggaran'];	
			$keterangan=$tm_cari['keterangan'];
			$anggaran1=number_format($anggaran,0);
		} else {
			$anggaran1="";
			$keterangan="";
		}
			
								
    $html .= "<tr>
		<td align='center'><font size=2>".$kode1."</font></td>
		<td align='center'><font size=2>".$kode2."</font></td>
		<td align='center'><font size=2>".$kode3."</font></td>
		<td align='center'><font size=2>".$kode4."</font></td>
        <td><font size=2>".$kode5."</font></td>
        <td align='right'><font size=2>".$anggaran1."</font></td>
        <td><font size=2>".$keterangan."</font></td>
    </tr>";
}
	$cari_kd=mysqli_query($koneksi,"SELECT sum(anggaran) as tot FROM tbrapbes_detail WHERE left(kode,1)='2' and tahun='$cbothn' and kode_wil='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$tot2=$tm_cari['tot'];	

	$tot3=$tot1-$tot2;	
											
	if ($tot3<0) {
		$tot3_rst="(".number_format($tot3,0).")";	
	} else {
		$tot3_rst=number_format($tot3,0);																											
	}
											
$html .= "<tr>
		<td align='center'><font size=2></font></td>
		<td align='center'><font size=2></font></td>
		<td align='center'><font size=2></font></td>
		<td align='center'><font size=2></font></td>
        <td><font size=2>JUMLAH BELANJA</font></td>
        <td align='right'><font size=2>".number_format($tot2,0)."</font></td>
        <td><font size=2></font></td>
    </tr>
	<tr>
		<td align='center'><font size=2></font></td>
		<td align='center'><font size=2></font></td>
		<td align='center'><font size=2></font></td>
		<td align='center'><font size=2></font></td>
        <td><font size=2>SURPLUS / DEFISIT</font></td>
        <td align='right'><font size=2>".$tot3_rst."</font></td>
        <td><font size=2></font></td>
    </tr>";

$sql = mysqli_query($koneksi,"SELECT kode, nama FROM tbrek where left(kode,1)='3' and left(kode,2)='31' order by kode asc");
while ($tampil = mysqli_fetch_array($sql)) {
				$kode1=substr($tampil['kode'],0,1);
		$kode2=substr($tampil['kode'],1,1);
		$kode3=substr($tampil['kode'],2,1);
		$kode4=substr($tampil['kode'],3,1);
		$kode5=$tampil['nama'];
		
		$kode=$tampil['kode'];
		$digit=strlen($kode);
		
		if($digit=='5') {
			$kode1="";
			$kode2="";
			$kode3="";
			$kode4="";
			$kode5=$kode." ".$tampil['nama'];
		}
		
		$data = mysqli_query($koneksi,"SELECT * FROM tbrapbes_detail WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'"); 
		$cek = mysqli_num_rows($data);
		if($cek > 0){
			$cari_kd=mysqli_query($koneksi,"SELECT anggaran, keterangan FROM tbrapbes_detail WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'");
			$tm_cari=mysqli_fetch_array($cari_kd);
			$anggaran=$tm_cari['anggaran'];	
			$keterangan=$tm_cari['keterangan'];
			$anggaran1=number_format($anggaran,0);
		} else {
			$anggaran1="";
			$keterangan="";
		}
			
								
    $html .= "<tr>
		<td align='center'><font size=2>".$kode1."</font></td>
		<td align='center'><font size=2>".$kode2."</font></td>
		<td align='center'><font size=2>".$kode3."</font></td>
		<td align='center'><font size=2>".$kode4."</font></td>
        <td><font size=2>".$kode5."</font></td>
        <td align='right'><font size=2>".$anggaran1."</font></td>
        <td><font size=2>".$keterangan."</font></td>
    </tr>";
}
	$cari_kd=mysqli_query($koneksi,"SELECT sum(anggaran) as tot FROM tbrapbes_detail WHERE left(kode,1)='3' and left(kode,2)='31' and tahun='$cbothn' and kode_wil='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$tot4=$tm_cari['tot'];	
								
$html .= "<tr>
		<td align='center'><font size=2></font></td>
		<td align='center'><font size=2></font></td>
		<td align='center'><font size=2></font></td>
		<td align='center'><font size=2></font></td>
        <td><font size=2>JUMLAH  ( RP )</font></td>
        <td align='right'><font size=2>".number_format($tot4,0)."</font></td>
        <td><font size=2></font></td>
    </tr>";

$sql = mysqli_query($koneksi,"SELECT kode, nama FROM tbrek where left(kode,1)='3' and left(kode,2)='32' order by kode asc");
while ($tampil = mysqli_fetch_array($sql)) {
				$kode1=substr($tampil['kode'],0,1);
		$kode2=substr($tampil['kode'],1,1);
		$kode3=substr($tampil['kode'],2,1);
		$kode4=substr($tampil['kode'],3,1);
		$kode5=$tampil['nama'];
		
		$kode=$tampil['kode'];
		$digit=strlen($kode);
		
		if($digit=='5') {
			$kode1="";
			$kode2="";
			$kode3="";
			$kode4="";
			$kode5=$kode." ".$tampil['nama'];
		}
		
		$data = mysqli_query($koneksi,"SELECT * FROM tbrapbes_detail WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'"); 
		$cek = mysqli_num_rows($data);
		if($cek > 0){
			$cari_kd=mysqli_query($koneksi,"SELECT anggaran, keterangan FROM tbrapbes_detail WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'");
			$tm_cari=mysqli_fetch_array($cari_kd);
			$anggaran=$tm_cari['anggaran'];	
			$keterangan=$tm_cari['keterangan'];
			$anggaran1=number_format($anggaran,0);
		} else {
			$anggaran1="";
			$keterangan="";
		}
			
								
    $html .= "<tr>
		<td align='center'><font size=2>".$kode1."</font></td>
		<td align='center'><font size=2>".$kode2."</font></td>
		<td align='center'><font size=2>".$kode3."</font></td>
		<td align='center'><font size=2>".$kode4."</font></td>
        <td><font size=2>".$kode5."</font></td>
        <td align='right'><font size=2>".$anggaran1."</font></td>
        <td><font size=2>".$keterangan."</font></td>
    </tr>";
}
	$cari_kd=mysqli_query($koneksi,"SELECT sum(anggaran) as tot FROM tbrapbes_detail WHERE left(kode,1)='3' and left(kode,2)='32' and tahun='$cbothn' and kode_wil='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$tot4=$tm_cari['tot'];	
								
$html .= "<tr>
		<td align='center'><font size=2></font></td>
		<td align='center'><font size=2></font></td>
		<td align='center'><font size=2></font></td>
		<td align='center'><font size=2></font></td>
        <td><font size=2>JUMLAH  ( RP )</font></td>
        <td align='right'><font size=2>".number_format($tot4,0)."</font></td>
        <td><font size=2></font></td>
    </tr>
	</table>
	<table border='0' style='width: 100%'>
	<tr>
		<td width='60%'></td>
		<td align='center' width='40%'><font size=2><br>DISETUJUI OLEH :</font></td>
	</tr>
	<tr>
		<td width='60%'></td>
		<td align='center' width='40%'><font size=2>KEPALA DESA ".$nm_kel."</font></td>
	</tr>";
	
$html .= "</table></html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Rincian Rancangan APBDes.pdf');
?>
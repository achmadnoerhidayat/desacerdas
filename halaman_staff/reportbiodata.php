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

	$id=$_GET['txtnik'];
	$cari_kd=mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d-%m-%Y') AS tanggal, 
					DATE_FORMAT(tgl_datang,'%d/%m/%Y') AS tanggal_datang,
					DATE_FORMAT(tgl_pergi,'%d/%m/%Y') AS tanggal_pergi,
					DATE_FORMAT(tgl_pindah,'%d/%m/%Y') AS tanggal_pindah,
					DATE_FORMAT(menetap_tgl,'%d/%m/%Y') AS tanggal_mati, 
					DATE_FORMAT(tgl_hilang,'%d/%m/%Y') AS tanggal_hilang, 
					DATE_FORMAT(tgl_hilang,'%d/%m/%Y') AS tanggal_hilang 
				from tbpenduduk WHERE nik='$id'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$txtgllahir=$tm_cari['tanggal'];	
	$txtkk=$tm_cari['kk'];
	$txtnm=$tm_cari['nama'];
	$cbojk=$tm_cari['id_jk'];
	$txtalamat = $tm_cari['alamat'];
	$txtrt = $tm_cari['rt'];
	$txtrw = $tm_cari['rw'];
	$txttempatlhr = $tm_cari['tempat_lhr'];
	$cbostatus = $tm_cari['id_status_kawin'];
	$cboagama = $tm_cari['id_agama'];
	$cbodarah = $tm_cari['id_gol_darah'];
	$cbopekerjaan = $tm_cari['kd_pekerjaan'];
	$cbowarga = $tm_cari['id_warga'];
	$cbodukuh = $tm_cari['id_dukuh'];
	$kd_pendidikan = $tm_cari['kd_pendidikan'];
	$kd_membaca = $tm_cari['kd_membaca'];
	$status_hub = $tm_cari['status_hub'];
	$ket = $tm_cari['keterangan'];
		$menetap=$tm_cari['menetap'];

		$nik_ayah=$tm_cari['nik_ayah'];
		$nm_ayah=$tm_cari['nm_ayah'];
		$nik_ibu=$tm_cari['nik_ibu'];	
		$nm_ibu=$tm_cari['nm_ibu'];
		$nik_suami_istri=$tm_cari['nik_suami_istri'];
		$nm_suami_istri=$tm_cari['nm_suami_istri']; 


		$checked="";
		$checked1="";
		$checked2="";
		$checked3="";
		$checked4="";
		$checked5="";
		
		$checked6="";
		$checked7="";
		
		if($menetap=='Menetap') {
			$ket_menetap1="";
			$ket_menetap2="";
			$ket_menetap3="";
			$ket_menetap4="";
			
			$txtgldatang = "";
			$txtglpergi = "";
			$maksud_datang = "";
			$didatangi = "";

			$txtglpindah = "";
			$txtglmeninggal = "";
			$txtglhilang ="";
			$checked="checked";
						$jam="";
		}	
		if($menetap=='Datang Dari') {
			$ket_menetap1=$tm_cari['menetap_ket1'];
			$ket_menetap2="";
			$ket_menetap3="";
			$ket_menetap4="";
			
			$txtgldatang = $tm_cari['tanggal_datang'];
			$txtglpergi = $tm_cari['tanggal_pergi'];
			$maksud_datang = $tm_cari['maksud_datang'];
			$didatangi = $tm_cari['didatangi'];

			$txtglpindah = "";
			$txtglmeninggal = "";
			$txtglhilang ="";
			$checked1="checked";
						$jam="";
		}	
		if($menetap=='Lahir Di') {
			$ket_menetap1="";
			$ket_menetap2=$tm_cari['menetap_ket2'];
			$ket_menetap3="";
			$ket_menetap4="";
			
			$txtgldatang = "";
			$txtglpergi = "";
			$maksud_datang = "";
			$didatangi = "";
			
			$txtglpindah = "";
			$txtglmeninggal = "";
			$txtglhilang ="";
			$checked2="checked";
						$jam="";
		}
		if($menetap=='Pindah Ke') {
			$ket_menetap1="";
			$ket_menetap2="";
			$ket_menetap3=$tm_cari['menetap_ket3'];
			$ket_menetap4="";

			$txtgldatang = "";
			$txtglpergi = "";
			$maksud_datang = "";
			$didatangi = "";
			
			$txtglpindah = $tm_cari['tanggal_pindah'];
			$txtglmeninggal = "";
			$txtglhilang ="";
			$checked3="checked";
						$jam="";
		}
		if($menetap=='Meninggal') {
			$ket_menetap1="";
			$ket_menetap2="";
			$ket_menetap3="";
			$ket_menetap4=$tm_cari['menetap_ket4'];
			$jam=$tm_cari['jam_kematian'];
			
			$txtgldatang = "";
			$txtglpergi = "";
			$maksud_datang = "";
			$didatangi = "";
			
			$txtglpindah = "";
			$txtglmeninggal = $tm_cari['tanggal_mati'];
			$txtglhilang ="";
			$checked4="checked";
		}
		if($menetap=='Hilang') {
			$ket_menetap1="";
			$ket_menetap2="";
			$ket_menetap3="";
			$ket_menetap4="";
			
			$txtgldatang = "";
			$txtglpergi = "";
			$maksud_datang = "";
			$didatangi = "";
			
			$txtglpindah = "";
			$txtglmeninggal = "";
			$txtglhilang = $tm_cari['tanggal_hilang'];
			$checked5="checked";
						$jam="";
		}

		$ktp=$tm_cari['ktp'];
		$ktp_ket1=$tm_cari['ktp_ket1'];
		$ktp_ket2=$tm_cari['ktp_ket2'];
		
		if($ktp=='Belum E-KTP') {
			$checked6="checked";
		} else {
			$checked7="checked";			
		}
		$passport=$tm_cari['passport'];
		$kitap=$tm_cari['kitap'];

													$cari_kd=mysqli_query($koneksi,"select membaca FROM tbmembaca where kode='$kd_membaca'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$membaca=$tm_cari['membaca'];

													$cari_kd=mysqli_query($koneksi,"select pendidikan FROM tbpendidikan where kode='$kd_pendidikan'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$pendidikan=$tm_cari['pendidikan'];
	
													$cari_kd=mysqli_query($koneksi,"select jk FROM tbjk where kode='$cbojk'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jk=$tm_cari['jk'];

													$cari_kd=mysqli_query($koneksi,"select status_nikah FROM tbstatus_nikah where kode='$cbostatus'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$status_nikah=$tm_cari['status_nikah'];

													$cari_kd=mysqli_query($koneksi,"select agama FROM tbagama where kode='$cboagama'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$agama=$tm_cari['agama'];

													$cari_kd=mysqli_query($koneksi,"select darah FROM tbdarah where kode='$cbodarah'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$darah=$tm_cari['darah'];
													
													$cari_kd=mysqli_query($koneksi,"select pekerjaan FROM tbpekerjaan where kode='$cbopekerjaan'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$pekerjaan=$tm_cari['pekerjaan'];
													
													$cari_kd=mysqli_query($koneksi,"select warga FROM tbwarga where kode='$cbowarga'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$warga=$tm_cari['warga'];
													
													$cari_kd=mysqli_query($koneksi,"select nm_dukuh FROM tbdukuh where id_dukuh='$cbodukuh'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$nm_dukuh=$tm_cari['nm_dukuh'];

													$cari_kd=mysqli_query($koneksi,"select membaca FROM tbmembaca where kode='$kd_membaca'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$membaca=$tm_cari['membaca'];

require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
			
$html = '<h4>Biodata Penduduk - Data Diri</h4>';
$html .= '<table border="1" cellpadding="10" cellspacing="0" width="100%">
	<tr>
        <td width="20%"><font size=2><b>KK</b></font></td>
        <td width="80%"><font size=2>'.$txtkk.'</font></td>
    </tr>
	<tr>
        <td width="20%"><font size=2><b>NIK</b></font></td>
        <td width="80%"><font size=2>'.$id.'</font></td>
    </tr>
		<tr>
			<td width="20%"><font size="2">Nama Lengkap</font></td>
			<td width="80%"><font size="2">'.$txtnm.'</font></td>
		</tr>
		<tr>
			<td width="20%"><font size="2">Tempat/Tanggal Lahir</font></td>
			<td width="80%"><font size="2">'.$txttempatlhr.'/'.$txtgllahir.'</font></td>
		</tr>
		<tr>
			<td width="20%"><font size="2">Jenis Kelamin</font></td>
			<td width="80%"><font size="2">'.$jk.'</font></td>
		</tr>
		<tr>
			<td width="20%"><font size="2">Golongan Darah</font></td>
			<td width="80%"><font size="2">'.$darah.'</font></td>
		</tr>
		<tr>
			<td width="20%"><font size="2">Alamat</font></td>
			<td width="80%"><font size="2">'.$txtalamat.'</font></td>
		</tr>
		<tr>
			<td width="20%"><font size="2">Kelurahan/Desa</font></td>
			<td width="80%"><font size="2">'.$nm_kel.'</font></td>
		</tr>
		<tr>
			<td width="20%"><font size="2">Kecamatan</font></td>
			<td width="80%"><font size="2">'.$nm_kec.'</font></td>
		</tr>
		<tr>
			<td width="20%"><font size="2">Agama</font></td>
			<td width="80%"><font size="2">'.$agama.'</font></td>
		</tr>
		<tr>
			<td width="20%"><font size="2">Status Perkawinan</font></td>
			<td width="80%"><font size="2">'.$status_nikah.'</font></td>
		</tr>
		<tr>
			<td width="20%"><font size="2">Dukuh/Dusun</font></td>
			<td width="80%"><font size="2">'.$nm_dukuh.'</font></td>
		</tr>
		<tr>
			<td width="20%"><font size="2">RT/RW</font></td>
			<td width="80%"><font size="2">'.$txtrt.'/'.$txtrw.'</font></td>
		</tr>
		<tr>
			<td width="20%"><font size="2">Pekerjaan</font></td>
			<td width="80%"><font size="2">'.$pekerjaan.'</font></td>
		</tr>
		<tr>
			<td width="20%"><font size="2">Warga Negara</font></td>
			<td width="80%"><font size="2">'.$warga.'</font></td>
		</tr>
		<tr>
			<td width="20%"><font size="2">Pendidikan Terakhir</font></td>
			<td width="80%"><font size="2">'.$pendidikan.'</font></td>
		</tr>
		<tr>
			<td width="20%"><font size="2">Dapat Membaca</font></td>
			<td width="80%"><font size="2">'.$membaca.'</font></td>
		</tr>
		</table>
		<h4>Biodata Informasi Menetap Mutasi</h4>
	<table border="1" cellspacing="0" cellpadding="10" style="width: 100%">
		<tr>
			<td colspan="2">
				<font size="2">
					<input type="radio" name="jenis_kelamin" value="Menetap" '.$checked.' /> Menetap
				</font>
			</td>
		</tr>
		<tr>
			<td width="30%"><font size="2"><input type="radio" name="jenis_kelamin" value="Datang Dari" '.$checked1.' /> Datang Dari</font></td>
			<td width="70%"><font size="2">'.$ket_menetap1.'</font></td>
		</tr>
		<tr>
			<td width="30%" align="right"><font size="2">Tanggal Datang&nbsp;</font></td>
			<td width="70%"><font size="2">'.$txtgldatang.'</font></td>
		</tr>
		<tr>
			<td width="30%" align="right"><font size="2">Maksud dan Tujuan&nbsp;</font></td>
			<td width="70%"><font size="2">'.$maksud_datang.'</font></td>
		</tr>
		<tr>
			<td width="30%" align="right"><font size="2">Nama dan Alamat Yang didatangi&nbsp;</font></td>
			<td width="70%"><font size="2">'.$didatangi.'</font></td>
		</tr>
		<tr>
			<td width="30%" align="right"><font size="2">Pergi Tanggal&nbsp;</font></td>
			<td width="70%"><font size="2">'.$txtglpergi.'</font></td>
		</tr>
		<tr>
			<td width="30%">
				<font size="2">
					<input type="radio" name="jenis_kelamin" value="Lahir Di" '.$checked2.' /> Lahir Di
				</font>
			</td>
			<td width="70%"><font size="2">'.$ket_menetap2.'</font></td>
		</tr>
		<tr>
			<td width="30%">
				<font size="2">
					<input type="radio" name="jenis_kelamin" value="Pindah Ke" '.$checked3.' /> Pindah Ke
				</font>
			</td>
			<td width="70%"><font size="2">'.$ket_menetap3.'</font></td>
		</tr>
		<tr>
			<td width="30%">
				<font size="2">
					<input type="radio" name="jenis_kelamin" value="Meninggal" '.$checked4.' /> Meninggal
				</font>
			</td>
			<td width="70%"><font size="2">'.$ket_menetap4.'</font></td>
		</tr>
		<tr>
			<td width="30%" align="right"><font size="2">Tanggal&nbsp;</font></td>
			<td width="70%"><font size="2">'.$txtglmeninggal.'</font></td>
		</tr>
		<tr>
			<td width="30%" align="right"><font size="2">Jam Kematian&nbsp;</font></td>
			<td width="70%"><font size="2">'.$jam.'</font></td>
		</tr>
		<tr>
			<td width="30%">
				<font size="2">
					<input type="radio" name="jenis_kelamin" value="Hilang" '.$checked5.' /> Hilang
				</font>
			</td>
			<td width="70%"><font size="2">'.$txtglhilang.'</font></td>
		</tr>
	</table>
			<h4>Kepemilikan E-KTP dan Dokumen</h4>
	<table border="1" cellspacing="0" cellpadding="10" style="width: 100%">
		<tr>
			<td colspan="2">
				<font size="2">
					<input type="radio" name="jenis_kelamin1" value="Belum E-KTP" '.$checked6.' /> Belum E-KTP
				</font>
			</td>
		</tr>
		<tr>
			<td colspan="2"><font size="2"><input type="radio" name="jenis_kelamin1" value="Sudah E-KTP" '.$checked7.' /> Sudah E-KTP</font></td>
		</tr>
		<tr>
			<td width="30%" align="right"><font size="2">Dikeluarkan Di&nbsp;</font></td>
			<td width="70%"><font size="2">'.$ktp_ket1.'</font></td>
		</tr>
		<tr>
			<td width="30%" align="right"><font size="2">Tanggal&nbsp;</font></td>
			<td width="70%"><font size="2">'.$ktp_ket2.'</font></td>
		</tr>
		<tr>
			<td colspan="2"><font size="2">Dokumen Imigrasi</font></td>
		</tr>
		<tr>
			<td width="30%" align="right"><font size="2">Passport&nbsp;</font></td>
			<td width="70%"><font size="2">'.$passport.'</font></td>
		</tr>
		<tr>
			<td width="30%" align="right"><font size="2">Kitap&nbsp;</font></td>
			<td width="70%"><font size="2">'.$kitap.'</font></td>
		</tr>
		</table>
	<h4>Biodata Penduduk - Data Keluarga</h4>
	<table border="1" cellspacing="0" cellpadding="10" style="width: 100%">
		<tr>
			<td width="30%"><font size="2">Hubungan Dalam Keluarga</font></td>
			<td width="70%"><font size="2">'.$status_hub.'</font></td>
		</tr>
		<tr>
			<td width="30%"><font size="2">NIK Ayah</font></td>
			<td width="70%"><font size="2">'.$nik_ayah.'</font></td>
		</tr>
		<tr>
			<td width="30%"><font size="2">Nama Ayah</font></td>
			<td width="70%"><font size="2">'.$nm_ayah.'</font></td>
		</tr>
		<tr>
			<td width="30%"><font size="2">NIK Ibu</font></td>
			<td width="70%"><font size="2">'.$nik_ibu.'</font></td>
		</tr>
		<tr>
			<td width="30%"><font size="2">Nama Ibu</font></td>
			<td width="70%"><font size="2">'.$nm_ibu.'</font></td>
		</tr>
		<tr>
			<td width="30%"><font size="2">NIK Suami/Istri</font></td>
			<td width="70%"><font size="2">'.$nik_suami_istri.'</font></td>
		</tr>
		<tr>
			<td width="30%"><font size="2">Nama Suami/Istri</font></td>
			<td width="70%"><font size="2">'.$nm_suami_istri.'</font></td>
		</tr>
		<tr>
			<td width="30%"><font size="2">Keterangan</font></td>
			<td width="70%"><font size="2">'.$ket.'</font></td>
		</tr>
	</table>
	<h4>Data Saudara</h4>
	<table border="1" cellspacing="0" cellpadding="5" style="width: 50%">
	<tr>
		<td align="center"><font size="2">No</font></td>
		<td align="center"><font size="2">NIK</font></td>
		<td><font size="2">Nama</font></td>
    </tr>';
$query = mysqli_query($koneksi,"SELECT nik_saudara, nm_saudara FROM tbpenduduk_saudara where nik='$id'");

$no = 1;
while($row = mysqli_fetch_array($query))
{													
    $html .= "<tr>
		<td align='center'><font size=2>".$no."</font></td>
        <td align='center'><font size=2>".$row['nik_saudara']."</font></td>
        <td><font size=2>".$row['nm_saudara']."</font></td>
    </tr>";
    $no++;
}

$html .= "</table>
<h4>Data Anak</h4>
	<table border='1' cellspacing='0' cellpadding='5' style='width: 50%'>
	<tr>
		<td align='center'><font size='2'>No</font></td>
		<td align='center'><font size='2'>NIK</font></td>
		<td><font size='2'>Nama</font></td>
    </tr>";

$query = mysqli_query($koneksi,"SELECT nik_anak, nm_anak FROM tbpenduduk_anak where nik='$id'");
$no = 1;
while($row = mysqli_fetch_array($query))
{													
    $html .= "<tr>
        <td align='center'><font size=2>".$no."</font></td>
        <td align='center'><font size=2>".$row['nik_anak']."</font></td>
		<td><font size=2>".$row['nm_anak']."</font></td>
    </tr>";
	$no++;
}
													
$html .= "</table></html>";

$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Data Kependudukan Berdasarkan KK dan AK.pdf');
?>
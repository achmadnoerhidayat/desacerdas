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
	
		$thn_skr=date('Y');
			$tgl_skr=date('d/m/Y');
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php include "titel.php"; ?></title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Induk Penduduk.xls");
	?>

	<center>
		<font size="3"><b>DATA INDUK PENDUDUK</b></font>
		<br>
		<font size="2">PEMERINTAH DESA <?php echo $nm_kel; ?></font>
		<br>
		<font size="2">KECAMATAN <?php echo $nm_kec; ?> KABUPATEN <?php echo $nm_kab; ?></font>
		<br>
		<font size="2">TAHUN <?php echo $thn_skr; ?></font>
		<br>&nbsp;
	</center>

	<table border="1">
		<tr>
			<td rowspan="2" align="center"><font size="2"><b>NOMOR URUT</b></font></td> 
			<td rowspan="2" align="center"><font size="2"><b>NAMA LENGKAP</b></font></td> 
			<td rowspan="2" align="center"><font size="2"><b>JENIS KELAMIN</b></font></td> 
			<td rowspan="2" align="center"><font size="2"><b>STATUS PERKAWINAN</b></font></td> 
			<td colspan="2" align="center"><font size="2"><b>TEMPAT DAN TGL LAHIR</b></font></td> 
			<td rowspan="2" align="center"><font size="2"><b>AGAMA</b></font></td> 
			<td rowspan="2" align="center"><font size="2"><b>PENDIDIKAN TERAKHIR</b></font></td> 
			<td rowspan="2" align="center"><font size="2"><b>PEKERJAAN</b></font></td> 
			<td rowspan="2" align="center"><font size="2"><b>DAPAT MEMBACA</b></font></td> 
			<td rowspan="2" align="center"><font size="2"><b>KEWARGANEGARAAN</b></font></td> 
			<td rowspan="2" align="center"><font size="2"><b>ALAMAT LENGKAP</b></font></td> 
			<td rowspan="2" align="center"><font size="2"><b>KEDUDUKAN DALAM KELUARGA</b></font></td> 
			<td rowspan="2" align="center"><font size="2"><b>NIK</b></font></td> 
			<td rowspan="2" align="center"><font size="2"><b>NOMOR KK</b></font></td> 													
			<td rowspan="2" align="center"><font size="2"><b>KET</b></font></td>
		</tr>
		<tr>
			<td><center><font size="2"><b>TEMPAT LAHIR</b></font></center></td> 
			<td><center><font size="2"><b>TGL</b></font></center></td>
		</tr>
		<?php 
		// koneksi database
		$koneksi = mysqli_connect("localhost","kreasiso_potensi","Fy!s_G&z^k$}","kreasiso_potensi");
		
		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal FROM tbpenduduk where kode='$kd_kel'");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
			

	$id_jk=$d['id_jk'];
	$id_gol_darah=$d['id_gol_darah'];
	$id_agama=$d['id_agama'];
$id_status_kawin=$d['id_status_kawin'];
$kd_pekerjaan=$d['kd_pekerjaan'];
			$id_warga=$d['id_warga'];
			$id_dukuh=$d['id_dukuh'];
			$kd_pendidikan=$d['kd_pendidikan'];			
			
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
		?>
		<tr>
		        <td align="center"><font size="2"><?php echo $no; ?></font></td>
		        <td align="center"><font size="2"><?php echo $d['nama'] ?></font></td>
			<td align="center"><font size="2"><?php echo $jk; ?></font></td>
			<td align="center"><font size="2"><?php echo $status_nikah; ?></font></td>
		        <td align="center"><font size="2"><?php echo $d['tempat_lhr'] ?></font></td>
			<td align="center"><font size="2"><?php echo $d['tanggal'] ?></font></td>
			<td align="center"><font size="2"><?php echo $agama; ?></font></td>
			<td align="center"><font size="2"><?php echo $pendidikan; ?></font></td>
			<td align="center"><font size="2"><?php echo $pekerjaan; ?></font></td>
			<td align="center"><font size="2"><?php echo $d['kd_membaca']; ?></font></td>
			<td align="center"><font size="2"><?php echo $warga; ?></font></td>
			<td align="center"><font size="2"><?php echo $d['alamat'] ?></font></td>
			<td align="center"><font size="2"><?php echo $d['status_hub']; ?></font></td>
		        <td align="center"><font size="2"><?php echo $d['nik'] ?></font></td>
		        <td align="center"><font size="2"><?php echo $d['kk'] ?></font></td>
			<td align="center"><font size="2"><?php echo $d['keterangan']; ?></font></td>
		</tr>

		<?php 
			$no++;
		}
		?>
	</table>

<br>
	<table>
		<tr>
			<td colspan="8" align="center">
				<font size="2">
					Mengetahui :<br>
					Kepala Desa <?php echo $nm_kel; ?>
				</font>
			</td>
			<td colspan="8" align="center">
				<font size="2">
					Desa <?php echo $nm_kel; ?>, <?php echo $tgl_skr; ?><br>
					Sekertaris Desa <?php echo $nm_kel; ?>
				</font>
			</td>
		</tr>
	</table>
	
</body>
</html>
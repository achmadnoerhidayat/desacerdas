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
	header("Content-Disposition: attachment; filename=Laporan Kematian.xls");
	?>

	<center>

		<font size="3"><b>LAPORAN KEMATIAN</b></font>
		<br>&nbsp;

	</center>

	<table cellpadding="0" cellspacing="0" width="100%" border="0">
		<tr>
			<td width="10%"><font size="2">BULAN</font></td>
			<td width="2%" align="center"><font size="2">:</font></td>
			<td width="88%"><font size="2"><?php echo $nm_bulan; ?></font></td>
		</tr>
		<tr>
			<td width="10%"><font size="2">TAHUN</font></td>
			<td width="2%" align="center"><font size="2">:</font></td>
			<td width="88%"><font size="2"><?php echo $sthn; ?></font></td>
		</tr>
		<tr>
			<td width="10%"><font size="2">RT</font></td>
			<td width="2%" align="center"><font size="2">:</font></td>
			<td width="88%"><font size="2"><?php echo $srt; ?></font></td>
		</tr>
		<tr>
			<td width="10%"><font size="2">KELURAHAN</font></td>
			<td width="2%" align="center"><font size="2">:</font></td>
			<td width="88%"><font size="2"><?php echo $nm_kel; ?></font></td>
		</tr>
		<tr>
			<td width="10%"><font size="2">KECAMATAN</font></td>
			<td width="2%" align="center"><font size="2">:</font></td>
			<td width="88%"><font size="2"><?php echo $nm_kec; ?></font></td>
		</tr>
	</table>

	<table border="1">
		<tr>
			<td align="center"><font size="2">NO</font></td>
			<td align="center"><font size="2">NAMA</font></td>
	       		<td align="center"><font size="2">JENIS KELAMIN</font></td>
	            	<td align="center"><font size="2">NIK</font></td>
	            	<td align="center"><font size="2">TEMPAT, TANGGAL LAHIR</font></td>
			<td align="center"><font size="2">TEMPAT,TANGGAL, JAM KEMATIAN</font></td>
			<td align="center"><font size="2">ALAMAT</font></td>
			<td align="center"><font size="2">KET</font></td>
		</tr>
			

		<?php 
		// koneksi database
$koneksi = mysqli_connect("localhost","kreasiso_potensi","Fy!s_G&z^k$}","kreasiso_potensi");

	//$koneksi = mysqli_connect("localhost","root","","dbpotensi"); 
		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal, 
													DATE_FORMAT(menetap_tgl,'%d/%m/%Y') AS tanggal_mati 
													from tbpenduduk 
													where kode='$kd_kel' and 
																				menetap='Meninggal' and 
																				month(tgl_register)='$sbln' and 
																				year(tgl_register)='$sthn' and 
																				rt='$srt'");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
			

	$id_jk=$d['id_jk'];
	
	$cari_kd=mysqli_query($koneksi,"select jk FROM tbjk where kode='$id_jk'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jk=$tm_cari['jk'];
	

		?>
		<tr>
			<td align="center"><font size="2"><?php echo $no; ?></font></td>
			<td align="center"><font size="2"><?php echo $d['nama']; ?></font></td>
			<td align="center"><font size="2"><?php echo $jk; ?></font></td>
			<td align="center"><font size="2"><?php echo $d['nik']; ?></font></td>
			<td align="center"><font size="2"><?php echo $d['tempat_lhr']; ?>, <?php echo $d['tanggal']; ?></font></td>
			<td align="center"><font size="2"><?php echo $d['menetap_ket4']; ?>, <?php echo $d['tanggal_mati']; ?>, <?php echo $d['jam_kematian']; ?></font></td>
			<td align="center"><font size="2"><?php echo $d['alamat']; ?></font></td>
			<td align="center"><font size="2"><?php echo $d['keterangan']; ?></font></td>
		</tr>
		<?php 
		$no++;
		}
		?>
	</table>
</body>
</html>
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

	<center>
		<font size="3"><b>LAPORAN KEMATIAN</b></font>
		<br>
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

	<table border="1" cellspacing="0" style="width: 100%">
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
		$no = 1;
		$sql = mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal, 
													DATE_FORMAT(menetap_tgl,'%d/%m/%Y') AS tanggal_mati 
													from tbpenduduk 
													where kode='$kd_kel' and 
																				menetap='Meninggal' and 
																				month(tgl_register)='$sbln' and 
																				year(tgl_register)='$sthn' and 
																				rt='$srt'");
		while($data = mysqli_fetch_array($sql)){
													$id_jk=$data['id_jk'];	
													$cari_kd=mysqli_query($koneksi,"select jk FROM tbjk where kode='$id_jk'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jk=$tm_cari['jk'];			
		?>
		<tr>
			<td align="center"><font size="2"><?php echo $no; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['nama']; ?></font></td>
			<td align="center"><font size="2"><?php echo $jk; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['nik']; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['tempat_lhr']; ?>, <?php echo $data['tanggal']; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['menetap_ket4']; ?>, <?php echo $data['tanggal_mati']; ?>, <?php echo $data['jam_kematian']; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['alamat']; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['keterangan']; ?></font></td>
		</tr>
		<?php 
		$no++;
		}
		?>
	</table>

	<script>
		window.print();
	</script>

</body>
</html>
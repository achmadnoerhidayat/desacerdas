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

	<?php 
	include "config/koneksi.php";
	?>

	<table border="1" cellspacing="0" style="width: 100%">
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
		$no = 1;
		$sql = mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal FROM tbpenduduk where kode='$kd_kel'");
		while($data = mysqli_fetch_array($sql)){
			$id_jk=$data['id_jk'];
			$id_gol_darah=$data['id_gol_darah'];
			$id_agama=$data['id_agama'];
			$id_status_kawin=$data['id_status_kawin'];
			$kd_pekerjaan=$data['kd_pekerjaan'];
			$id_warga=$data['id_warga'];
			$id_dukuh=$data['id_dukuh'];
			$kd_pendidikan=$data['kd_pendidikan'];			
			
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
			<td align="center"><font size="2"><?php echo $data['nama'] ?></font></td>
			<td align="center"><font size="2"><?php echo $jk; ?></font></td>
			<td align="center"><font size="2"><?php echo $status_nikah; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['tempat_lhr'] ?></font></td>
			<td align="center"><font size="2"><?php echo $data['tanggal'] ?></font></td>
			<td align="center"><font size="2"><?php echo $agama; ?></font></td>
			<td align="center"><font size="2"><?php echo $pendidikan; ?></font></td>
			<td align="center"><font size="2"><?php echo $pekerjaan; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['kd_membaca']; ?></font></td>
			<td align="center"><font size="2"><?php echo $warga; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['alamat'] ?></font></td>
			<td align="center"><font size="2"><?php echo $data['status_hub']; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['nik'] ?></font></td>
			<td align="center"><font size="2"><?php echo $data['kk'] ?></font></td>
			<td align="center"><font size="2"><?php echo $data['keterangan']; ?></font></td>
		</tr>
		<?php 
$no++;
		}
		?>
	</table>
<br>
	<table border="0" cellspacing="0" style="width: 100%">
		<tr>
			<td width="50%" align="center">
				<font size="2">
					Mengetahui :<br>
					Kepala Desa <?php echo $nm_kel; ?>
				</font>
			</td>
			<td width="50%" align="center">
				<font size="2">
					Desa <?php echo $nm_kel; ?>, <?php echo $tgl_skr; ?><br>
					Sekertaris Desa <?php echo $nm_kel; ?>
				</font>
			</td>
		</tr>
	</table>
	
	<script>
		window.print();
	</script>

</body>
</html>
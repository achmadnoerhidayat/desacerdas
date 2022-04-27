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
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php include "titel.php"; ?></title>
</head>
<body>

	<center>

		<h4>Data Kependudukan Berdasarkan RT</h4>


	</center>

	<?php 
	include "config/koneksi.php";
	?>

	<table border="1" cellspacing="0" style="width: 100%">
		<tr>
			<td align="center"><font size="2">NO</font></td>
			<td align="center"><font size="2">KK</font></td>
            <td align="center"><font size="2">NIK</font></td>
            <td align="center"><font size="2">Nama Lengkap</font></td>
            <td align="center"><font size="2">Tempat Lahir</font></td>
			<td align="center"><font size="2">Tanggal Lahir</font></td>
			<td align="center"><font size="2">Jenis Kelamin</font></td>
			<td align="center"><font size="2">Alamat</font></td>
			<td align="center" bgcolor="yellow"><font size="2">RT</font></td>
			<td align="center"><font size="2">RW</font></td>
			<td align="center"><font size="2">Kel/Desa</font></td>
			<td align="center"><font size="2">Kecamatan</font></td>
			<td align="center"><font size="2">Gol. Darah</font></td>
			<td align="center"><font size="2">Agama</font></td>
			<td align="center"><font size="2">Status Perkawinan</font></td>
			<td align="center"><font size="2">Pekerjaan</font></td>
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
		?>
		<tr>
			<td align="center"><font size="2"><?php echo $no; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['kk']; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['nik']; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['nama']; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['tempat_lhr']; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['tanggal']; ?></font></td>
			<td align="center"><font size="2"><?php echo $jk; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['alamat']; ?></font></td>
			<td align="center" bgcolor="yellow"><font size="2"><?php echo $data['rt']; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['rw']; ?></font></td>
			<td align="center"><font size="2"><?php echo $nm_kel; ?></font></td>
			<td align="center"><font size="2"><?php echo $nm_kec; ?></font></td>
			<td align="center"><font size="2"><?php echo $darah; ?></font></td>
			<td align="center"><font size="2"><?php echo $agama; ?></font></td>
			<td align="center"><font size="2"><?php echo $status_nikah; ?></font></td>
			<td align="center"><font size="2"><?php echo $pekerjaan; ?></font></td>
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
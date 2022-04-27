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
		<b><h4>Laporan Kehadiran</h4></b>
	</center>

	<?php 
		include "config/koneksi.php";
	?>

	<table border="1" cellspacing="0" style="width: 100%">
		<tr>
			<td><b>NAMA LENGKAP</b></td>
			<td align="center"><b>TANGGAL</b></td>
			<td align="center"><b>MASUK</b></td>
			<td align="center"><b>PULANG</b></td>
		</tr>

		<?php 
			$sql = mysqli_query($koneksi,"SELECT *, DATE_FORMAT(tbkehadiran.tanggal,'%d/%m/%Y') AS tgl_kehadiran, tbuser.nama, tbuser.jabatan 
										FROM tbkehadiran, tbuser 
										WHERE tbkehadiran.nip=tbuser.nip");
			while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td>
				<?php echo $data['nama']; ?><br>
				<small><?php echo $data['jabatan']; ?></small>
			</td>    
			<td align="center"><?php echo $data['tgl_kehadiran']; ?></td>
			<td align="center"><?php echo $data['masuk']; ?></td>
			<td align="center"><?php echo $data['pulang']; ?></td>			
		</tr>

		<?php 
			}
		?>
	</table>

	<script>
		window.print();
	</script>

</body>
</html>

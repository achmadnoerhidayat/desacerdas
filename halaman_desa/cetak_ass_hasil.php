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
		<b><h4>Hasil Ujian/Sertifikasi</h4></b>
	</center>

	<?php 
		include "config/koneksi.php";
	?>

	<table border="1" cellspacing="0" style="width: 100%">
		<tr>
			<td><b>NAMA PELAKSANA UJIAN</b></td>
			<td><b>PAKET SOAL</b></td>			
			<td align="center"><b>TANGGAL UJIAN</b></td>
			<td align="center"><b>SKOR/NILAI</b></td>
			<td align="center"><b>STATUS</b></td>
		</tr>
													
		<?php 
			$sql = mysqli_query($koneksi,"SELECT * FROM vw_ujian WHERE id_kel='$kd_kel'");
			while($data = mysqli_fetch_array($sql)){
		?>
		<tr>														
			<td>
				<?php echo $data['nama']; ?><br>
				<small><?php echo $data['email']; ?></small>
			</td> 
			<td>
				<?php echo $data['nama_paket']?>
			</td> 			
			<td align="center"><?php echo $data['tanggal']; ?></td>
			<td align="center"><?php echo $data['nilai']; ?></td>
			<td align="center"><?php echo $data['status']; ?></td>			
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

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
										Buku Inventaris Hasil Pembangunan<br>
										DESA <?php echo $nm_kel; ?><br>
										KECAMATAN <?php echo $nm_kec; ?>
										<br>
									</center>

	<?php 
	include "config/koneksi.php";
	?>

	<table border="1" cellspacing="0" style="width: 100%">
		<tr>													
			<th><font size="2">No</font></th>
            		<th><font size="2">Tanggal</font></th>
		       	<th><font size="2">Jenis/Nama Hasil Pembangunan</font></th>
		    	<th><font size="2">Volume</font></th>
			<th><font size="2">Biaya</font></th>
			<th><font size="2">Lokasi</font></th>
			<th><font size="2">Keterangan</font></th>
		</tr>
		<?php 
		$no = 0;
		$sql = mysqli_query($koneksi,"SELECT *, DATE_FORMAT(tanggal,'%d/%m/%Y') AS tgl FROM tbinventaris where kode='$kd_kel'");
		while($data = mysqli_fetch_array($sql)){

													$no++;
                                                    		?>
		<tr>
			<td><font size="2"><?php echo $no; ?></font></td>
			<td><font size="2"><?php echo $data['tgl']; ?></font></td>
			<td><font size="2"><?php echo $data['nama']; ?></font></td>
			<td><font size="2"><?php echo $data['volume']; ?></font></td>
			<td><font size="2"><?php echo number_format($data['biaya'],0) ?></font></td>
			<td><font size="2"><?php echo $data['lokasi']; ?></font></td>
			<td><font size="2"><?php echo $data['keterangan']; ?></font></td>
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

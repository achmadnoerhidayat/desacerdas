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
										Buku Kader Pemberdayaan Masyarakat<br>
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
            <th><font size="2">Nama Lengkap</font></th>
            <th><font size="2">Umur</font></th>
			<th><font size="2">Jenis Kelamin</font></th>
			<th><font size="2">Pendidikan/Kursus</font></th>
			<th><font size="2">Bidang</font></th>
			<th><font size="2">Alamat</font></th>
			<th><font size="2">Keterangan</font></th>
		</tr>
		<?php 
		$no = 0;
		$sql = mysqli_query($koneksi,"SELECT *, DATE_FORMAT(tanggal,'%d/%m/%Y') AS tgl FROM tbkader where kode='$kd_kel'");
		while($data = mysqli_fetch_array($sql)){
			$id_jk=$data['id_jk'];
													$cari_kd=mysqli_query($koneksi,"SELECT jk FROM tbjk WHERE kode='$id_jk'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jk=$tm_cari['jk'];
													$no++;
                                                    		?>
		<tr>
			<td><font size="2"><?php echo $no; ?></font></td>
			<td><font size="2"><?php echo $data['tgl']; ?></font></td>
			<td><font size="2"><?php echo $data['nama']; ?></font></td>
			<td><font size="2"><?php echo $data['umur']; ?></font></td>
			<td><font size="2"><?php echo $jk; ?></font></td>
			<td><font size="2"><?php echo $data['pendidikan']; ?></font></td>
			<td><font size="2"><?php echo $data['bidang']; ?></font></td>
			<td><font size="2"><?php echo $data['alamat']; ?></font></td>
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

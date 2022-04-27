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
										<b>
										<h4>
										Listing Layanan Surat
										</h4>
										</b>
									</center>

	<?php 
	include "config/koneksi.php";
	?>

	<table border="1" cellspacing="0" style="width: 100%">
												<tr>
													<td align="center"><b>No</b></td>
													<td><b>NOMOR SURAT</b></td>
													<td><b>TITLE SURAT</b></td>
												</tr>

		<?php 
		$no = 0;
		$sql = mysqli_query($koneksi,"SELECT * FROM tbbuatsurat");
		while($data = mysqli_fetch_array($sql)){
													$no++;
                                                    		?>
													<tr>
														<td align="center"><?php echo $no; ?></td>    
														<td><?php echo $data['nomor_surat']; ?></td>    
														<td><?php echo $data['title_surat']; ?></td>    
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

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
	header("Content-Disposition: attachment; filename=laporan_list_surat.xls");
	?>

									<center>
										<b>
										<h4>
										Listing Layanan Surat
										</h4>
										</b>
									</center>

	<table border="1" cellspacing="0" style="width: 100%">
												<tr>
													<td align="center"><b>No</b></td>
													<td><b>NOMOR SURAT</b></td>
													<td><b>TITLE SURAT</b></td>
												</tr>
		<?php 
		// koneksi database
		//$koneksi = mysqli_connect("localhost","kreasiso_potensi","Fy!s_G&z^k$}","kreasiso_potensi");

		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"select * FROM tbbuatsurat");
		$no = 0;
		while($d = mysqli_fetch_array($data)){
			$no++;
		?>
													<tr>
														<td align="center"><?php echo $no; ?></td>    
														<td><?php echo $d['nomor_surat']; ?></td>    
														<td><?php echo $d['title_surat']; ?></td>    
													</tr>

		<?php 
		}
		?>
	</table>
</body>
</html>

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
	header("Content-Disposition: attachment; filename=laporan_kehadiran.xls");
	?>

									<center>
										<b>
										<h4>
										Laporan Kehadiran
										</h4>
										</b>
									</center>

	<table border="1" cellspacing="0" style="width: 100%">
												<tr>
			<td><b>NAMA LENGKAP</b></td>
			<td align="center"><b>TANGGAL</b></td>
			<td align="center"><b>MASUK</b></td>
			<td align="center"><b>PULANG</b></td>
												</tr>
		<?php 
		// koneksi database
		//$koneksi = mysqli_connect("localhost","kreasiso_potensi","Fy!s_G&z^k$}","kreasiso_potensi");

		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"SELECT *, DATE_FORMAT(tbkehadiran.tanggal,'%d/%m/%Y') AS tgl_kehadiran, tbuser.nama, tbuser.jabatan 
										FROM tbkehadiran, tbuser 
										WHERE tbkehadiran.nip=tbuser.nip");
		$no = 0;
		while($d = mysqli_fetch_array($data)){
			$no++;
		?>
													<tr>
														<td>
				<?php echo $d['nama']; ?><br>
				<small><?php echo $d['jabatan']; ?></small>
			</td>    
			<td align="center"><?php echo $d['tgl_kehadiran']; ?></td>
			<td align="center"><?php echo $d['masuk']; ?></td>
			<td align="center"><?php echo $d['pulang']; ?></td>		
													</tr>

		<?php 
		}
		?>
	</table>
</body>
</html>

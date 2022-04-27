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
	header("Content-Disposition: attachment; filename=Data_Surat_Masuk.xls");
	?>

									<center>
										<b>
										<h2>
										Buku Agenda Surat Masuk BPD<br>
										DESA <?php echo $nm_kel; ?><br>
										KECAMATAN <?php echo $nm_kec; ?>
										</h2>
										</b>
									</center>

	<table border="1" cellspacing="0" style="width: 100%">
												<tr>
													<td align="center" rowspan="2"> <b>No</b></td>
													<td align="center" rowspan="2"> <b>Tanggal</b></td>
													<td align="center" colspan="4"> <b>Surat Masuk</b></td>
													<td rowspan="2"> <b>Keterangan</b></td>
												</tr>
												<tr>
													<td align="center"> <b>Nomor</b></td>
													<td align="center"> <b>Tanggal</b></td>
													<td> <b>Hal dan Isi Singkat</b></td>
													<td> <b>Tujuan</b></td>
												</tr>
		<?php 
		// koneksi database
		$koneksi = mysqli_connect("localhost","kreasiso_potensi","Fy!s_G&z^k$}","kreasiso_potensi");

		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"select *, 
										DATE_FORMAT(tanggal,'%d/%m/%Y') AS tgl, 
										DATE_FORMAT(tgl_surat,'%d/%m/%Y') AS tgl1 
										FROM tbsurat_masuk where kode='$kd_kel'");
		$no = 0;
		while($d = mysqli_fetch_array($data)){
			$no++;
		?>
													<tr>
														<td align="center"><?php echo $no; ?></td>    
														<td align="center"><?php echo $d['tgl']; ?></td>    
														<td align="center"><?php echo $d['nomor']; ?></td>    
														<td align="center"><?php echo $d['tgl1']; ?></td>    
														<td><?php echo $d['isi']; ?></td>
														<td><?php echo $d['tujuan']; ?></td> 
														<td><?php echo $d['keterangan']; ?></td>														    
													</tr>

		<?php 
		}
		?>
	</table>
</body>
</html>

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
	header("Content-Disposition: attachment; filename=Data_Buku_Bank.xls");
	?>

									<center>
										<b>
										<h2>
										Buku Bank<br>
										DESA <?php echo $nm_kel; ?><br>
										KECAMATAN <?php echo $nm_kec; ?>
										</h2>
										</b>
									</center>

	<table border="1" cellspacing="0" style="width: 100%">
												<tr>
													<td align="center" rowspan="2"> <b>No</b></td>
													<td align="center" rowspan="2"> <b>Tanggal</b></td>
													<td align="center" colspan="2"> <b>Buku Bank</b></td>
													<td align="center" colspan="2"> <b>Pemasukan</b></td>
													<td align="center" colspan="3"> <b>Pengeluaran</b></td>
												</tr>
												<tr>
													<td align="center"> <b>Tanggal Transaksi</b></td>
													<td align="center"> <b>Uraian Transaksi</b></td>
													<td align="center"> <b>Setoran</b></td>
													<td align="center"> <b>Bunga Bank</b></td>
													<td align="center"> <b>Penarikan</b></td>
													<td align="center"> <b>Pajak</b></td>
													<td align="center"> <b>Administrasi Bank</b></td>
												</tr>
		<?php 
		// koneksi database
		$koneksi = mysqli_connect("localhost","kreasiso_potensi","Fy!s_G&z^k$}","kreasiso_potensi");

		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"SELECT *, DATE_FORMAT(tgl_trx,'%d/%m/%Y') AS tgl FROM tbbank where kode='$kd_kel'");
		$no = 0;
		while($d = mysqli_fetch_array($data)){
			$no++;
													$setoran=$d['setoran'];
													$bunga=$d['bunga'];
													$penarikan=$d['penarikan'];
													$pajak=$d['pajak'];
													$adm=$d['adm'];
		?>
													<tr>
														<td align="center"><?php echo $no; ?></td>    
														<td align="center"><?php echo $d['tgl']; ?></td>    
														<td align="center"><?php echo $d['tgl']; ?></td>    
														<td align="center"><?php echo $d['uraian_trx']; ?></td>    
														<td align="center">
															<?php 
																if($setoran=='0') {
																	echo "-";
																} else {
																	echo $d['setoran'];
																}																	
															?>
														</td>
														<td align="center">
															<?php 
																if($bunga=='0') {
																	echo "-";
																} else {
																	echo $d['bunga'];
																}																	
															?>
														</td>
														<td align="center">
															<?php 
																if($penarikan=='0') {
																	echo "-";
																} else {
																	echo $d['penarikan'];
																}																	
															?>
														</td>
														<td align="center">
															<?php 
																if($pajak=='0') {
																	echo "-";
																} else {
																	echo $d['pajak'];
																}																	
															?>
														</td>
														<td align="center">
															<?php 
																if($adm=='0') {
																	echo "-";
																} else {
																	echo $d['adm'];
																}																	
															?>
														</td>
													</tr>

		<?php 
		}
		?>
	</table>
</body>
</html>

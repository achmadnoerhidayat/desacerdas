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
										<h2>
										Buku Bank<br>
										DESA <?php echo $nm_kel; ?><br>
										KECAMATAN <?php echo $nm_kec; ?>
										</h2>
										</b>
									</center>

	<?php 
	include "config/koneksi.php";
	?>

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
		$no = 0;
		$sql = mysqli_query($koneksi,"SELECT *, DATE_FORMAT(tgl_trx,'%d/%m/%Y') AS tgl FROM tbbank where kode='$kd_kel'");
		while($data = mysqli_fetch_array($sql)){
													$setoran=$data['setoran'];
													$bunga=$data['bunga'];
													$penarikan=$data['penarikan'];
													$pajak=$data['pajak'];
													$adm=$data['adm'];
													$no++;
                                                    		?>
													<tr>
														<td align="center"><?php echo $no; ?></td>    
														<td align="center"><?php echo $data['tgl']; ?></td>    
														<td align="center"><?php echo $data['tgl']; ?></td>    
														<td align="center"><?php echo $data['uraian_trx']; ?></td>    
														<td align="center">
															<?php 
																if($setoran=='0') {
																	echo "-";
																} else {
																	echo number_format($data['setoran'],0);
																}																	
															?>
														</td>
														<td align="center">
															<?php 
																if($bunga=='0') {
																	echo "-";
																} else {
																	echo number_format($data['bunga'],0);
																}																	
															?>
														</td>
														<td align="center">
															<?php 
																if($penarikan=='0') {
																	echo "-";
																} else {
																	echo number_format($data['penarikan'],0);
																}																	
															?>
														</td>
														<td align="center">
															<?php 
																if($pajak=='0') {
																	echo "-";
																} else {
																	echo number_format($data['pajak'],0);
																}																	
															?>
														</td>
														<td align="center">
															<?php 
																if($adm=='0') {
																	echo "-";
																} else {
																	echo number_format($data['adm'],0);
																}																	
															?>
														</td>
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

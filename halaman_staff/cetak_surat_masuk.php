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
										Buku Agenda Surat Masuk BPD<br>
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
		$no = 0;
		$sql = mysqli_query($koneksi,"SELECT *, 
										DATE_FORMAT(tanggal,'%d/%m/%Y') AS tgl, 
										DATE_FORMAT(tgl_surat,'%d/%m/%Y') AS tgl1 
										FROM tbsurat_masuk where kode='$kd_kel'");
		while($data = mysqli_fetch_array($sql)){
													$no++;
                                                    		?>
													<tr>
														<td align="center"><?php echo $no; ?></td>    
														<td align="center"><?php echo $data['tgl']; ?></td>    
														<td align="center"><?php echo $data['nomor']; ?></td>    
														<td align="center"><?php echo $data['tgl1']; ?></td>    
														<td><?php echo $data['isi']; ?></td>
														<td><?php echo $data['tujuan']; ?></td> 
														<td><?php echo $data['keterangan']; ?></td>														    
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

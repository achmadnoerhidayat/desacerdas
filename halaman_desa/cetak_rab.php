<?php
	session_start();
	$kd_kel=$_SESSION['kodewil'];
	include "config/koneksi.php";

	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kel=$tm_cari['nama'];
	
	$kd_prop=substr($kd_kel,0,2);
	$kd_kab=substr($kd_kel,0,5);
	$kd_kec=substr($kd_kel,0,8);

	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_prop'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_prop=$tm_cari['nama'];

	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kab'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kab=$tm_cari['nama'];

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
										Rencana Anggaran Biaya<br>
										DESA <?php echo $nm_kel; ?><br>
										KECAMATAN <?php echo $nm_kec; ?>
										</h2>
										</b>
									</center>

	<br>
<table border="1" cellspacing="0" style="width: 100%">
		<tr>													
			<th width="5%"><font size="2"><center>No</center></font></th>													
            <th width="10%"><font size="2"><center>Tahun Anggaran</center></font></th>
            <th width="15%"><font size="2"><center>Bidang</center></font></th>
            <th width="20%"><font size="2"><center>Sub Bidang</center></font></th>
			<th width="20%"><font size="2"><center>Kegiatan</center></font></th>
			<th width="10%"><font size="2"><center>Waktu Pelaksanaan</center></font></th>
			<th width="20%"><font size="2"><center>Rincian Pendanaan</center></font></th>
		</tr>
		<?php 
		$no = 0;
		$sql = mysqli_query($koneksi,"SELECT 
									tahun, bidang, bidang_sub, kegiatan, 
									waktu, rincian from tbrab where kode='$kd_kel' order by id asc");
		while($data = mysqli_fetch_array($sql)){
			
													$no++;
                                                    		?>
		<tr>
			<td align="center"><font size="2"><?php echo $no; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['tahun']; ?></font></td>
			<td><font size="2"><?php echo $data['bidang']; ?></font></td>
			<td><font size="2"><?php echo $data['bidang_sub']; ?></font></td>
			<td><font size="2"><?php echo $data['kegiatan']; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['waktu']; ?></font></td>
			<td><font size="2"><?php echo $data['rincian']; ?></font></td>
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

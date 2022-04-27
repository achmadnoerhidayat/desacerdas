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
	header("Content-Disposition: attachment; filename=Data Kader.xls");
	?>

	<center>
										Buku Kader Pemberdayaan Masyarakat<br>
										DESA <?php echo $nm_kel; ?><br>
										KECAMATAN <?php echo $nm_kec; ?>
										<br>&nbsp;

	</center>

	<table border="1">
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
		// koneksi database
		$koneksi = mysqli_connect("localhost","kreasiso_potensi","Fy!s_G&z^k$}","kreasiso_potensi");

		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"select *, DATE_FORMAT(tanggal,'%d/%m/%Y') AS tgl FROM tbkader where kode='$kd_kel'");
		$no = 0;
		while($d = mysqli_fetch_array($data)){
	$id_jk=$d['id_jk'];
	$cari_kd=mysqli_query($koneksi,"select jk FROM tbjk where kode='$id_jk'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jk=$tm_cari['jk'];
	$no++;
		?>
		<tr>
            <td><font size="2"><?php echo $no; ?></font></td>
            <td><font size="2"><?php echo $d['tgl']; ?></font></td>
			<td><font size="2"><?php echo $d['nama']; ?></font></td>
			<td><font size="2"><?php echo $d['umur']; ?></font></td>
   <td><font size="2"><?php echo $jk; ?></font></td>
			<td><font size="2"><?php echo $d['pendidikan']; ?></font></td>

			<td><font size="2"><?php echo $d['bidang']; ?></font></td>
			<td><font size="2"><?php echo $d['alamat']; ?></font></td>
			<td><font size="2"><?php echo $d['keterangan']; ?></font></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>

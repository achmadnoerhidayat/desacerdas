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
	header("Content-Disposition: attachment; filename=Data Administrasi Pemilu.xls");
	?>

	<center>
		<h4>Data Administrasi Pemilu</h4>
	</center>

	<table border="1">
		<tr>
			<th><font size="2">NO</font></th>
			<th><font size="2">KK</font></th>
            <th><font size="2">NIK</font></th>
            <th><font size="2">Nama Lengkap</font></th>
            <th><font size="2">Tempat Lahir</font></th>
			<th><font size="2">Tanggal Lahir</font></th>
			<th><font size="2">Jenis Kelamin</font></th>
			<th><font size="2">Alamat</font></th>
			<th><font size="2">RT</font></th>
			<th><font size="2">RW</font></th>
			<th><font size="2">Kel/Desa</font></th>
			<th><font size="2">Kecamatan</font></th>
			<th><font size="2">Gol. Darah</font></th>
			<th><font size="2">Agama</font></th>
			<th><font size="2">Status Perkawinan</font></th>
			<th><font size="2">Pekerjaan</font></th>
			
		</tr>
		<?php 
		// koneksi database
$koneksi = mysqli_connect("localhost","kreasiso_potensi","Fy!s_G&z^k$}","kreasiso_potensi");

		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal FROM tbpenduduk where kode='$kd_kel'");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
			

	$id_jk=$d['id_jk'];
	$id_gol_darah=$d['id_gol_darah'];
	$id_agama=$d['id_agama'];
$id_status_kawin=$d['id_status_kawin'];
$kd_pekerjaan=$d['kd_pekerjaan'];
	
	$cari_kd=mysqli_query($koneksi,"select jk FROM tbjk where kode='$id_jk'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jk=$tm_cari['jk'];
	
	$cari_kd=mysqli_query($koneksi,"select agama FROM tbagama where kode='$id_agama'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$agama=$tm_cari['agama'];

	$cari_kd=mysqli_query($koneksi,"select darah FROM tbdarah where kode='$id_gol_darah'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$darah=$tm_cari['darah'];
	
	$cari_kd=mysqli_query($koneksi,"select status_nikah FROM tbstatus_nikah where kode='$id_status_kawin'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$status_nikah=$tm_cari['status_nikah'];
													
	$cari_kd=mysqli_query($koneksi,"select pekerjaan FROM tbpekerjaan where kode='$kd_pekerjaan'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$pekerjaan=$tm_cari['pekerjaan'];
		?>
		<tr>
			<td><font size="2"><?php echo $no; ?></font></td>
			<td><font size="2"><?php echo $d['kk']; ?></font></td>
			<td><font size="2"><?php echo $d['nik']; ?></font></td>
			<td><font size="2"><?php echo $d['nama']; ?></font></td>
			<td><font size="2"><?php echo $d['tempat_lhr']; ?></font></td>
			<td><font size="2"><?php echo $d['tanggal']; ?></font></td>
			<td><font size="2"><?php echo $jk; ?></font></td>
			<td><font size="2"><?php echo $d['alamat']; ?></font></td>
			<td><font size="2"><?php echo $d['rt']; ?></font></td>
			<td><font size="2"><?php echo $d['rw']; ?></font></td>
			<td><font size="2"><?php echo $nm_kel; ?></font></td>
			<td><font size="2"><?php echo $nm_kec; ?></font></td>
			<td><font size="2"><?php echo $darah; ?></font></td>
			<td><font size="2"><?php echo $agama; ?></font></td>
			<td><font size="2"><?php echo $status_nikah; ?></font></td>
			<td><font size="2"><?php echo $pekerjaan; ?></font></td>
		</tr>
		<?php 
				$no++;
		}
		?>
	</table>
</body>
</html>
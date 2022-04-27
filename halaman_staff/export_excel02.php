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

	$txtkk=$_GET['kk'];
	$cari_kd=mysqli_query($koneksi,"select alamat, rt, rw 
																				FROM tbpenduduk 
																				where kode='$kd_kel' and kk='$txtkk'");
												$tm_cari=mysqli_fetch_array($cari_kd);
												$alamat_hdr=$tm_cari['alamat'];
												$rt_hdr=$tm_cari['rt'];
												$rw_hdr=$tm_cari['rw'];

												$cari_kd=mysqli_query($koneksi,"select nama FROM tbpenduduk 
																				where kode='$kd_kel' and kk='$txtkk' and status_hub='Kepala Keluarga'");
												$tm_cari=mysqli_fetch_array($cari_kd);
												$nama_kk=$tm_cari['nama'];
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
	header("Content-Disposition: attachment; filename=Data Kependudukan Berdasarkan KK dan AK.xls");
	?>

	<center>
		<h4>Data Kependudukan Berdasarkan KK dan AK (Anggota Keluarga)</h4>
	</center>

	<table border="0" cellspacing="0" style="width: 100%">
											<tr>
												<td width="15%"></td>
												<td width="20%"><font size="2"><b>No. KK</b></font></td>
												<td width="20%"><font size="2"><b><?php echo $txtkk; ?></b></font></td>
												<td width="15%"><font size="2"><b>Desa/Kelurahan</b></font></td>
												<td width="15%"><font size="2"><b><?php echo $nm_kel; ?></b></font></td>
												<td width="15%"></td>
											</tr>
											<tr>
												<td width="15%"></td>
												<td width="20%"><font size="2"><b>Nama Kepala Keluarga</b></font></td>
												<td width="20%"><font size="2"><b><?php echo $nama_kk; ?></b></font></td>
												<td width="15%"><font size="2"><b>Kecamatan</b></font></td>
												<td width="15%"><font size="2"><b><?php echo $nm_kec; ?></b></font></td>
												<td width="15%"></td>
											</tr>
											<tr>
												<td width="15%"></td>
												<td width="20%"><font size="2"><b>Alamat</b></font></td>
												<td width="20%"><font size="2"><b><?php echo $alamat_hdr; ?></b></font></td>
												<td width="15%"><font size="2"><b>Kabupaten/Kota</b></font></td>
												<td width="15%"><font size="2"><b><?php echo $nm_kab; ?></b></font></td>
												<td width="15%"></td>
											</tr>
											<tr>
												<td width="15%"></td>
												<td width="20%"><font size="2"><b>RT/RW</b></font></td>
												<td width="20%"><font size="2"><b>'<?php echo $rt_hdr; ?>/<?php echo $rw_hdr; ?>'</b></font></td>
												<td width="15%"><font size="2"><b>Provinsi</b></font></td>
												<td width="15%"><font size="2"><b><?php echo $nm_prop; ?></b></font></td>
												<td width="15%"></td>
											</tr>	
	</table>
	<br>
	<table border="1">
		<tr>													
            <td align="center"><font size="2">No</font></td>
            <td align="center"><font size="2">Nama Lengkap</font></td>
            <td align="center"><font size="2">NIK</font></td>
			<td align="center"><font size="2">Jenis Kelamin</font></td>
            <td align="center"><font size="2">Tempat Lahir</font></td>
			<td align="center"><font size="2">Tanggal Lahir</font></td>
			<td align="center"><font size="2">Agama</font></td>
			<td align="center"><font size="2">Pendidikan</font></td> 
			<td align="center"><font size="2">Jenis Pekerjaan</font></td>
		</tr>
		<?php 
		// koneksi database
		$koneksi = mysqli_connect("localhost","kreasiso_potensi","Fy!s_G&z^k$}","kreasiso_potensi");

		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal from tbpenduduk 
													where kode='$kd_kel' and kk='$txtkk'");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
													$id_jk=$d['id_jk'];
													$id_status_kawin=$d['id_status_kawin'];
													$id_agama=$d['id_agama'];
													$id_gol_darah=$d['id_gol_darah'];
													$kd_pekerjaan=$d['kd_pekerjaan'];
													$id_warga=$d['id_warga'];
													$id_dukuh=$d['id_dukuh'];
													$kd_pendidikan=$d['kd_pendidikan'];
													
													$cari_kd=mysqli_query($koneksi,"select jk FROM tbjk where kode='$id_jk'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jk=$tm_cari['jk'];

													$cari_kd=mysqli_query($koneksi,"select status_nikah FROM tbstatus_nikah where kode='$id_status_kawin'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$status_nikah=$tm_cari['status_nikah'];

													$cari_kd=mysqli_query($koneksi,"select agama FROM tbagama where kode='$id_agama'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$agama=$tm_cari['agama'];

													$cari_kd=mysqli_query($koneksi,"select darah FROM tbdarah where kode='$id_gol_darah'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$darah=$tm_cari['darah'];
													
													$cari_kd=mysqli_query($koneksi,"select pekerjaan FROM tbpekerjaan where kode='$kd_pekerjaan'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$pekerjaan=$tm_cari['pekerjaan'];
													
													$cari_kd=mysqli_query($koneksi,"select warga FROM tbwarga where kode='$id_warga'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$warga=$tm_cari['warga'];
													
													$cari_kd=mysqli_query($koneksi,"select nm_dukuh FROM tbdukuh where id_dukuh='$id_dukuh'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$nm_dukuh=$tm_cari['nm_dukuh'];

													$cari_kd=mysqli_query($koneksi,"select pendidikan FROM tbpendidikan where kode='$kd_pendidikan'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$pendidikan=$tm_cari['pendidikan'];
		?>
		<tr>
		<td align="center"><font size="2"><?php echo $no; ?></font></td>
			<td align="center"><font size="2"><?php echo $d['nama']; ?></font></td>
			<td align="center"><font size="2"><?php echo $d['nik']; ?></font></td>
			<td align="center"><font size="2"><?php echo $jk; ?></font></td>
			<td align="center"><font size="2"><?php echo $d['tempat_lhr']; ?></font></td>
			<td align="center"><font size="2"><?php echo $d['tanggal']; ?></font></td>
			<td align="center"><font size="2"><?php echo $agama; ?></font></td>
			<td align="center"><font size="2"><?php echo $pendidikan; ?></font></td>
			<td align="center"><font size="2"><?php echo $pekerjaan; ?></font></td>			
		</tr>
		<?php 
		$no++;
		}
		?>
	</table>
	<br>
	<table border="1">
		<tr>																										
            <td rowspan="2" align="center"><font size="2">Status Perkawinan</font></td>
            <td rowspan="2" align="center"><font size="2">Status Hubungan<br>Dalam Keluarga</font></td>
			<td rowspan="2" align="center"><font size="2">Kewarganegaraan</font></td>
            <td colspan="2" align="center"><font size="2">Dokumen Imigrasi</font></td>
			<td colspan="2" align="center"><font size="2">Nama Orang Tua</font></td>
		</tr>
		<tr>									
            <td align="center"><font size="2">No. Paspor</font></td>
            <td align="center"><font size="2">No. Kitap</font></td>
			<td align="center"><font size="2">Ayah</font></td>
            <td align="center"><font size="2">Ibu</font></td>
		</tr>
		<?php 
		// koneksi database
		$koneksi = mysqli_connect("localhost","kreasiso_potensi","Fy!s_G&z^k$}","kreasiso_potensi");

		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal from tbpenduduk 
													where kode='$kd_kel' and kk='$txtkk'");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
													$id_jk=$d['id_jk'];
													$id_status_kawin=$d['id_status_kawin'];
													$id_agama=$d['id_agama'];
													$id_gol_darah=$d['id_gol_darah'];
													$kd_pekerjaan=$d['kd_pekerjaan'];
													$id_warga=$d['id_warga'];
													$id_dukuh=$d['id_dukuh'];
													$kd_pendidikan=$d['kd_pendidikan'];
													
													$cari_kd=mysqli_query($koneksi,"select jk FROM tbjk where kode='$id_jk'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jk=$tm_cari['jk'];

													$cari_kd=mysqli_query($koneksi,"select status_nikah FROM tbstatus_nikah where kode='$id_status_kawin'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$status_nikah=$tm_cari['status_nikah'];

													$cari_kd=mysqli_query($koneksi,"select agama FROM tbagama where kode='$id_agama'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$agama=$tm_cari['agama'];

													$cari_kd=mysqli_query($koneksi,"select darah FROM tbdarah where kode='$id_gol_darah'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$darah=$tm_cari['darah'];
													
													$cari_kd=mysqli_query($koneksi,"select pekerjaan FROM tbpekerjaan where kode='$kd_pekerjaan'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$pekerjaan=$tm_cari['pekerjaan'];
													
													$cari_kd=mysqli_query($koneksi,"select warga FROM tbwarga where kode='$id_warga'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$warga=$tm_cari['warga'];
													
													$cari_kd=mysqli_query($koneksi,"select nm_dukuh FROM tbdukuh where id_dukuh='$id_dukuh'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$nm_dukuh=$tm_cari['nm_dukuh'];

													$cari_kd=mysqli_query($koneksi,"select pendidikan FROM tbpendidikan where kode='$kd_pendidikan'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$pendidikan=$tm_cari['pendidikan'];
		?>
		<tr>														
			<td align="center"><font size="2"><?php echo $status_nikah; ?></font></td>
			<td align="center"><font size="2"><?php echo $d['status_hub']; ?></font></td>
			<td align="center"><font size="2"><?php echo $warga; ?></font></td>
			<td align="center"><font size="2"><?php echo $d['passport']; ?></font></td>
			<td align="center"><font size="2"><?php echo $d['kitap']; ?></font></td>
			<td align="center"><font size="2"><?php echo $d['nm_ayah']; ?></font></td>
			<td align="center"><font size="2"><?php echo $d['nm_ibu']; ?></font></td>
		</tr>
		<?php 
		}
		?>
	</table>
	
</body>
</html>
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
	
		$thn_skr=date('Y');
			$tgl_skr=date('d/m/Y');
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php include "titel.php"; ?></title>
</head>
<body>

	<center>
		<font size="3"><b>DATA PENDUDUK SEMENTARA</b></font>
		<br>
		<font size="2">PEMERINTAH DESA <?php echo $nm_kel; ?></font>
		<br>
		<font size="2">KECAMATAN <?php echo $nm_kec; ?> KABUPATEN <?php echo $nm_kab; ?></font>
		<br>
		<font size="2">BUKU PENDUDUK SEMENTARA TAHUN <?php echo $thn_skr; ?></font>
		<br>&nbsp;
	</center>

	<?php 
	include "config/koneksi.php";
	?>

	<table border="1" cellspacing="0" style="width: 100%">
												<tr> 
													<td rowspan="2"><center><font size="2"><b>NOMOR URUT</b></font></center></td> 
													<td rowspan="2"><center><font size="2"><b>NAMA LENGKAP</b></font></center></td> 
													<td colspan="2"><center><font size="2"><b>JENIS KELAMIN</b></font></center></td> 													
													<td rowspan="2"><center><font size="2"><b>NOMOR IDENTITAS/TANDA PENGENAL</b></font></center></td> 
													<td rowspan="2"><center><font size="2"><b>TEMPAT DAN TANGGAL LAHIR</b></font></center></td> 
													<td rowspan="2"><center><font size="2"><b>PEKERJAAN</b></font></center></td>
													<td colspan="2"><center><font size="2"><b>KEWARGANEGARAAN</b></font></center></td>
													<td rowspan="2"><center><font size="2"><b>DATANG DARI</b></font></center></td> 
													<td rowspan="2"><center><font size="2"><b>MAKSUD DAN TUJUAN</b></font></center></td>
													<td rowspan="2"><center><font size="2"><b>NAMA DAN ALAMAT YANG DIDATANGI</b></font></center></td>
													<td rowspan="2"><center><font size="2"><b>DATANG TANGGAL</b></font></center></td>
													<td rowspan="2"><center><font size="2"><b>PERGI TANGGAL</b></font></center></td>
													<td rowspan="2"><center><font size="2"><b>KET</b></font></center></td> 
												</tr>
												<tr> 
													<td><center><font size="2"><b>L</b></font></center></td> 
													<td><center><font size="2"><b>P</b></font></center></td> 
													<td><center><font size="2"><b>KEBANGSAAN</b></font></center></td> 
													<td><center><font size="2"><b>KETURUNAN</b></font></center></td> 
												</tr>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal, 
													DATE_FORMAT(tgl_datang,'%d/%m/%Y') AS tanggal_datang, 
													DATE_FORMAT(tgl_pergi,'%d/%m/%Y') AS tanggal_pergi 
													from tbpenduduk 
													where kode='$kd_kel' and menetap='Datang Dari'");
		while($data = mysqli_fetch_array($sql)){
													$id_jk=$data['id_jk'];
													$id_status_kawin=$data['id_status_kawin'];
													$id_agama=$data['id_agama'];
													$id_gol_darah=$data['id_gol_darah'];
													$kd_pekerjaan=$data['kd_pekerjaan'];
													$id_warga=$data['id_warga'];
													$id_dukuh=$data['id_dukuh'];
				


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
		?>
		<tr>
			<td align="center"><font size="2"><?php echo $no; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['nama']; ?></font></td>
			<td align="center">
				<font size="2">
					<?php 
						if($id_jk=='1') {
							echo "L";
						}
					?>				
				</font>
			</td>
			<td align="center">
				<font size="2">
					<?php 
						if($id_jk=='2') {
							echo "P";
						}
					?>				
				</font>
			</td>
			<td align="center"><font size="2"><?php echo $data['nik']; ?></font></td>
			<td align="center">
				<font size="2">
					<?php echo $data['tempat_lhr']; ?>/<?php echo $data['tanggal']; ?>
				</font>
			</td>
			<td align="center"><font size="2"><?php echo $pekerjaan; ?></font></td>			
			<td align="center">
				<font size="2">
																<?php 
																	if($id_warga=='1') {
																		echo "WNI";
																	}
																?>
				</font>
			</td>
			<td align="center">
				<font size="2">
																<?php 
																	if($id_warga=='2') {
																		echo "WNA";
																	}
																?>
				</font>
			</td>
			
			<td align="center"><font size="2"><?php echo $data['menetap_ket1']; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['maksud_datang']; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['didatangi']; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['tanggal_datang']; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['tanggal_pergi']; ?></font></td>
			<td align="center"><font size="2"><?php echo $data['keterangan']; ?></font></td>
		</tr>
		<?php 
			$no++;
		}
		?>
	</table>

<br>
	<table border="0" cellspacing="0" style="width: 100%">
		<tr>
			<td width="50%" align="center">
				<font size="2">
					Mengetahui :<br>
					Kepala Desa <?php echo $nm_kel; ?>
				</font>
			</td>
			<td width="50%" align="center">
				<font size="2">
					Desa <?php echo $nm_kel; ?>, <?php echo $tgl_skr; ?><br>
					Sekertaris Desa <?php echo $nm_kel; ?>
				</font>
			</td>
		</tr>
	</table>
	
	<script>
		window.print();
	</script>

</body>
</html>
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

	$id=$_GET['kd'];
			$cari_kd=mysqli_query($koneksi,"SELECT 
									kode, tahun, bidang, bidang_sub, kegiatan, 
									waktu, rincian from tbrab 
									where id='$id'");
				$tm_cari=mysqli_fetch_array($cari_kd);
				$tahun=$tm_cari['tahun'];
				$bidang=$tm_cari['bidang'];
				$bidang_sub=$tm_cari['bidang_sub'];
				$kegiatan=$tm_cari['kegiatan'];
				$waktu=$tm_cari['waktu'];
				$rincian=$tm_cari['rincian'];
				
				
				$cari_kd=mysqli_query($koneksi,"SELECT sum(jumlah) as tot FROM tbrab_detail WHERE kode_rab='$id'");
				$tm_cari=mysqli_fetch_array($cari_kd);
				$tot_rab=$tm_cari['tot'];
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
	header("Content-Disposition: attachment; filename=Rencana Anggaran Biaya.xls");
	?>

	<center>
					<font size="3"><b>Rencana Anggaran Biaya</b></font><br>
					<font size="4">
						<b>
							DESA <?php echo $nm_kel; ?><br>
							KECAMATAN <?php echo $nm_kec; ?><br>							
						</b>
					</font>
				</center>

	<table border="0" width="100%">
								<tr>
									<td width="10%"><font size="2"><b>Tahun Anggaran</b></font></td>
									<td width="2%" align="center"><font size="2"><b>:</b></font></td>
									<td width="88%"><font size="2"><b><?php echo $tahun; ?></b></font></td>
								</tr>
								<tr>
									<td width="10%"><font size="2"><b>Bidang</b></font></td>
									<td width="2%" align="center"><font size="2"><b>:</b></font></td>
									<td width="88%"><font size="2"><b><?php echo $bidang; ?></b></font></td>
								</tr>
								<tr>
									<td width="10%"><font size="2"><b>Sub Bidang</b></font></td>
									<td width="2%" align="center"><font size="2"><b>:</b></font></td>
									<td width="88%"><font size="2"><b><?php echo $bidang_sub; ?></b></font></td>
								</tr>
								<tr>
									<td width="10%"><font size="2"><b>Kegiatan</b></font></td>
									<td width="2%" align="center"><font size="2"><b>:</b></font></td>
									<td width="88%"><font size="2"><b><?php echo $kegiatan; ?></b></font></td>
								</tr>
								<tr>
									<td width="10%"><font size="2"><b>Waktu Pelaksanaan</b></font></td>
									<td width="2%" align="center"><font size="2"><b>:</b></font></td>
									<td width="88%"><font size="2"><b><?php echo $waktu; ?></b></font></td>
								</tr>
								<tr>
									<td width="10%"><font size="2"><b>Output/Keluaran</b></font></td>
									<td width="2%" align="center"><font size="2"><b>:</b></font></td>
									<td width="88%"><font size="2"><b><?php echo $rincian; ?></b></font></td>
								</tr>
							</table>
							<br>
<table border="1" cellpadding="5" cellspacing="0" style="width: 100%">
								<tr>
									<td rowspan="2" align="center" ><font size="2"><b>NO</b></font></td>
									<td rowspan="2" align="center" ><font size="2"><b>URAIAN</b></font></td>
									<td colspan="3" align="center" ><font size="2"><b>ANGGARAN</b></font></td>
								</tr>
								<tr>
									<td align="center" ><font size="2"><b>VOLUME</b></font></td>
									<td align="center" ><font size="2"><b>HARGA SATUAN</b></font></td>
									<td align="center" ><font size="2"><b>JUMLAH</b></font></td>
								</tr>
								
		<?php 
		// koneksi database
		$koneksi = mysqli_connect("localhost","kreasiso_potensi","Fy!s_G&z^k$}","kreasiso_potensi");
		//$koneksi = mysqli_connect("localhost","root","","dbpotensi");

		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"SELECT * from tbrab_sub where kode_rab='$id' order by id");
		while($d = mysqli_fetch_array($data)){
			$no_anggaran=$d['no_anggaran'];
										
			$cari_kd=mysqli_query($koneksi,"SELECT sum(jumlah) as tot FROM tbrab_detail 
											WHERE kode_rab='$id' and no_anggaran='$no_anggaran'");
			$tm_cari=mysqli_fetch_array($cari_kd);
			$tot_rab_sub=$tm_cari['tot'];
		?>
		<tr>
									<td width="5%" align="center" >
										<font size="2">
											<b>
												<?php echo $d['no_anggaran']; ?>
											</b>
										</font>
									</td>
									<td width="40%" >
										<font size="2">
											<b>												
												<?php echo $d['uraian_sub']; ?>
											</b>
										</font>
									</td>
									<td width="15%" align="center" >
										<font size="2">
											<b>												
												
											</b>
										</font>									
									</td>
									<td width="20%" align="center" >
										<font size="2">
											<b>				
												
											</b>
										</font>									
									</td>
									<td width="20%" align="center" >
										<font size="2">
											<b>												
												<?php echo number_format($tot_rab_sub,2); ?>
											</b>
										</font>									
									</td>
								</tr>
								
		<?php 
			$no = 0 ;
			$data1 = mysqli_query($koneksi,"SELECT * from tbrab_detail where kode_rab='$id' and no_anggaran='$no_anggaran' order by id");
			while($d1 = mysqli_fetch_array($data1)){
				$no++;	
		?>
		<tr>
									<td width="5%" align="center" >
										<font size="2">
											
												
											
										</font>
									</td>
									<td width="40%" >
										<font size="2">
												<?php echo $no_anggaran; ?>.<?php echo $no; ?>&nbsp;											
												<?php echo $d1['uraian']; ?>
											
										</font>
									</td>
									<td width="15%" align="center" >
										<font size="2">
											<?php echo $d1['volume']; ?>
										</font>									
									</td>
									<td width="20%" align="center" >
										<font size="2">
														
												<?php echo number_format($d1['harga'],2); ?>
											
										</font>									
									</td>
									<td width="20%" align="center" >
										<font size="2">
												<?php echo number_format($d1['jumlah'],2); ?>
										</font>									
									</td>
								</tr>
								<?php
									}
									}
								?>
								<tr>
									<td width="5%" align="center" >
										<font size="2">
											
												
											
										</font>
									</td>
									<td width="40%" >
										<font size="2">
												<b>JUMLAH (Rp)</b>
											
										</font>
									</td>
									<td width="15%" align="center" >
										<font size="2">
											
										</font>									
									</td>
									<td width="20%" align="center" >
										<font size="2">
														

											
										</font>									
									</td>
									<td width="20%" align="center" >
										<font size="2">
												<b><?php echo number_format($tot_rab,2); ?></b>
										</font>									
									</td>
								</tr>
	</table>
</body>
</html>
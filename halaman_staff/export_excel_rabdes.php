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

	$cbothn=$_GET['thn'];
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
	header("Content-Disposition: attachment; filename=Rincian Rancangan APBDes.xls");
	?>

	<center>
					<font size="3"><b>BUKU RANCANGAN ANGGARAN PENDAPATAN DAN BELANJA DESA </b></font><br>
					<font size="4">
						<b>
							PEMERINTAH DESA <?php echo $nm_kel; ?><br>
							TAHUN ANGGARAN <?php echo $cbothn; ?><br>							
						</b>
					</font>
				</center>

	
							<br>
<table border="1" cellpadding="5" cellspacing="0" style="width: 100%">
								<tr>
									<td colspan="4" align="center"><font size="2"><b>KODE  REKENING</b></font></td>
									<td align="center"><font size="2"><b>URAIAN</b></font></td>
									<td align="center"><font size="2"><b>ANGGARAN (Rp)</b></font></td>
									<td align="center"><font size="2"><b>KETERANGAN</b></font></td>
								</tr>
								
								
		<?php 
		// koneksi database
		// $koneksi = mysqli_connect("localhost","kreasiso_potensi","Fy!s_G&z^k$}","kreasiso_potensi");
		// $koneksi = mysqli_connect("localhost","root","","dbpotensi");

																
									$sql = mysqli_query($koneksi,"SELECT kode, nama FROM tbrek where left(kode,1)='1' order by kode asc");
									while ($tampil = mysqli_fetch_array($sql)) {
										$kode=$tampil['kode'];
										$digit=strlen($kode);
								?>
								<tr>
<td align="center">
										<font size="2">
											
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],0,1);
													}
												?>
											
										</font>
									</td>
									<td align="center">
										<font size="2">
																						
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],1,1);
													}
												?>
											
										</font>
									</td>
									<td align="center">
										<font size="2">
																							
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],2,1);
													}
												?>											
											
										</font>
									</td>
									<td align="center">
										<font size="2">
																							
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],3,1);
													}
												?>														
											
										</font>
									</td>
									<td>
										<font size="2">
																						
												<?php 
													if ($digit<'5') {
														echo $tampil['nama'];
													} else {
														echo $tampil['kode']."&nbsp;".$tampil['nama'];
													}
												?>
											
										</font>
									</td>
									<td align="right">
										<font size="2">
																							
												<?php 
													if ($digit>='3') {
														$data = mysqli_query($koneksi,"SELECT * FROM tbrapbes_detail 
																						WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'"); 
														$cek = mysqli_num_rows($data);
														if($cek > 0){
															$cari_kd=mysqli_query($koneksi,"SELECT 
																						anggaran, keterangan FROM tbrapbes_detail 
																						WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'");
															$tm_cari=mysqli_fetch_array($cari_kd);
															$anggaran=$tm_cari['anggaran'];	
															echo number_format($anggaran,2);															
														} else {
															$anggaran="";
															echo $anggaran;
														}
													}
												?>											
											
										</font>
									</td>
									<td>
										<font size="2">
																							
												<?php 
													if ($digit>='3') {
														$cari_kd=mysqli_query($koneksi,"SELECT 
																						anggaran, keterangan FROM tbrapbes_detail 
																						WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'");
														$tm_cari=mysqli_fetch_array($cari_kd);
														$keterangan=$tm_cari['keterangan'];
														
															echo $keterangan;
														
													}
												?>											
											
										</font>
									</td>
								</tr>

								
								<?php										
									}
								?>

								<tr>
									<td align="center"></td>
									<td align="center"></td>
									<td align="center"></td>
									<td align="center"></td>
									<td><font size="2">JUMLAH PENDAPATAN</font></td>
									<td align="right">
										<?php 
											$cari_kd=mysqli_query($koneksi,"SELECT sum(anggaran) as tot 
																			FROM tbrapbes_detail WHERE left(kode,1)='1' and tahun='$cbothn' and kode_wil='$kd_kel'");
											$tm_cari=mysqli_fetch_array($cari_kd);
											$tot1=$tm_cari['tot'];	
											echo number_format($tot1,2);															
										?>						
									</td>
									<td align="center"></td>
								</tr>

<?php 
									$sql = mysqli_query($koneksi,"SELECT kode, nama FROM tbrek where left(kode,1)='2' order by kode asc");
									while ($tampil = mysqli_fetch_array($sql)) {
										$kode=$tampil['kode'];
										$digit=strlen($kode);
								?>
								<tr>
<td align="center">
										<font size="2">
											
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],0,1);
													}
												?>
											
										</font>
									</td>
									<td align="center">
										<font size="2">
																						
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],1,1);
													}
												?>
											
										</font>
									</td>
									<td align="center">
										<font size="2">
																							
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],2,1);
													}
												?>											
											
										</font>
									</td>
									<td align="center">
										<font size="2">
																							
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],3,1);
													}
												?>														
											
										</font>
									</td>
									<td>
										<font size="2">
																						
												<?php 
													if ($digit<'5') {
														echo $tampil['nama'];
													} else {
														echo $tampil['kode']."&nbsp;".$tampil['nama'];
													}
												?>
											
										</font>
									</td>
									<td align="right">
										<font size="2">
																							
												<?php 
													if ($digit>='3') {
														$data = mysqli_query($koneksi,"SELECT * FROM tbrapbes_detail 
																						WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'"); 
														$cek = mysqli_num_rows($data);
														if($cek > 0){
															$cari_kd=mysqli_query($koneksi,"SELECT 
																						anggaran, keterangan FROM tbrapbes_detail 
																						WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'");
															$tm_cari=mysqli_fetch_array($cari_kd);
															$anggaran=$tm_cari['anggaran'];	
															echo number_format($anggaran,2);															
														} else {
															$anggaran="";
															echo $anggaran;
														}
													}
												?>											
											
										</font>
									</td>
									<td>
										<font size="2">
																							
												<?php 
													if ($digit>='3') {
														$cari_kd=mysqli_query($koneksi,"SELECT 
																						anggaran, keterangan FROM tbrapbes_detail 
																						WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'");
														$tm_cari=mysqli_fetch_array($cari_kd);
														$keterangan=$tm_cari['keterangan'];
														
															echo $keterangan;
														
													}
												?>											
											
										</font>
									</td>
								</tr>

								
								<?php										
									}
								?>

								<tr>
									<td align="center"></td>
									<td align="center"></td>
									<td align="center"></td>
									<td align="center"></td>
									<td><font size="2">JUMLAH BELANJA</font></td>
									<td align="right">
										<?php 
											$cari_kd=mysqli_query($koneksi,"SELECT sum(anggaran) as tot 
																			FROM tbrapbes_detail WHERE left(kode,1)='2' and tahun='$cbothn' and kode_wil='$kd_kel'");
											$tm_cari=mysqli_fetch_array($cari_kd);
											$tot2=$tm_cari['tot'];	
											echo number_format($tot2,2);															
										?>						
									</td>
									<td align="center"></td>
								</tr>
								<tr>
									<td align="center"></td>
									<td align="center"></td>
									<td align="center"></td>
									<td align="center"></td>
									<td><font size="2">SURPLUS / DEFISIT</font></td>
									<td align="right">
										<?php 
											
											$tot3=$tot1-$tot2;	
											
											if ($tot3<0) {
												echo "(".number_format($tot3,2).")";	
											} else {
												echo number_format($tot3,2);																											
											}

										?>						
									</td>
									<td align="center"></td>
								</tr>

<?php 
									$sql = mysqli_query($koneksi,"SELECT kode, nama FROM tbrek where left(kode,1)='3' and left(kode,2)='31' order by kode asc");
									while ($tampil = mysqli_fetch_array($sql)) {
										$kode=$tampil['kode'];
										$digit=strlen($kode);
								?>
								<tr>
<td align="center">
										<font size="2">
											
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],0,1);
													}
												?>
											
										</font>
									</td>
									<td align="center">
										<font size="2">
																						
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],1,1);
													}
												?>
											
										</font>
									</td>
									<td align="center">
										<font size="2">
																							
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],2,1);
													}
												?>											
											
										</font>
									</td>
									<td align="center">
										<font size="2">
																							
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],3,1);
													}
												?>														
											
										</font>
									</td>
									<td>
										<font size="2">
																						
												<?php 
													if ($digit<'5') {
														echo $tampil['nama'];
													} else {
														echo $tampil['kode']."&nbsp;".$tampil['nama'];
													}
												?>
											
										</font>
									</td>
									<td align="right">
										<font size="2">
																							
												<?php 
													if ($digit>='3') {
														$data = mysqli_query($koneksi,"SELECT * FROM tbrapbes_detail 
																						WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'"); 
														$cek = mysqli_num_rows($data);
														if($cek > 0){
															$cari_kd=mysqli_query($koneksi,"SELECT 
																						anggaran, keterangan FROM tbrapbes_detail 
																						WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'");
															$tm_cari=mysqli_fetch_array($cari_kd);
															$anggaran=$tm_cari['anggaran'];	
															echo number_format($anggaran,2);															
														} else {
															$anggaran="";
															echo $anggaran;
														}
													}
												?>											
											
										</font>
									</td>
									<td>
										<font size="2">
																							
												<?php 
													if ($digit>='3') {
														$cari_kd=mysqli_query($koneksi,"SELECT 
																						anggaran, keterangan FROM tbrapbes_detail 
																						WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'");
														$tm_cari=mysqli_fetch_array($cari_kd);
														$keterangan=$tm_cari['keterangan'];
														
															echo $keterangan;
														
													}
												?>											
											
										</font>
									</td>
								</tr>

<?php										
									}
								?>

<tr>
									<td align="center"></td>
									<td align="center"></td>
									<td align="center"></td>
									<td align="center"></td>
									<td><font size="2">JUMLAH  ( RP )</font></td>
									<td align="right">
										<?php 
											$cari_kd=mysqli_query($koneksi,"SELECT sum(anggaran) as tot 
																			FROM tbrapbes_detail WHERE left(kode,1)='3' and left(kode,2)='31' and tahun='$cbothn' 
																			and kode_wil='$kd_kel'");
											$tm_cari=mysqli_fetch_array($cari_kd);
											$tot4=$tm_cari['tot'];	
											echo number_format($tot4,2);															
										?>						
									</td>
									<td align="center"></td>
								</tr>
<?php 
									$sql = mysqli_query($koneksi,"SELECT kode, nama FROM tbrek where left(kode,1)='3' and left(kode,2)='32' order by kode asc");
									while ($tampil = mysqli_fetch_array($sql)) {
										$kode=$tampil['kode'];
										$digit=strlen($kode);
								?>
								<tr>
<td align="center">
										<font size="2">
											
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],0,1);
													}
												?>
											
										</font>
									</td>
									<td align="center">
										<font size="2">
																						
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],1,1);
													}
												?>
											
										</font>
									</td>
									<td align="center">
										<font size="2">
																							
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],2,1);
													}
												?>											
											
										</font>
									</td>
									<td align="center">
										<font size="2">
																							
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],3,1);
													}
												?>														
											
										</font>
									</td>
									<td>
										<font size="2">
																						
												<?php 
													if ($digit<'5') {
														echo $tampil['nama'];
													} else {
														echo $tampil['kode']."&nbsp;".$tampil['nama'];
													}
												?>
											
										</font>
									</td>
									<td align="right">
										<font size="2">
																							
												<?php 
													if ($digit>='3') {
														$data = mysqli_query($koneksi,"SELECT * FROM tbrapbes_detail 
																						WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'"); 
														$cek = mysqli_num_rows($data);
														if($cek > 0){
															$cari_kd=mysqli_query($koneksi,"SELECT 
																						anggaran, keterangan FROM tbrapbes_detail 
																						WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'");
															$tm_cari=mysqli_fetch_array($cari_kd);
															$anggaran=$tm_cari['anggaran'];	
															echo number_format($anggaran,2);															
														} else {
															$anggaran="";
															echo $anggaran;
														}
													}
												?>											
											
										</font>
									</td>
									<td>
										<font size="2">
																							
												<?php 
													if ($digit>='3') {
														$cari_kd=mysqli_query($koneksi,"SELECT 
																						anggaran, keterangan FROM tbrapbes_detail 
																						WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'");
														$tm_cari=mysqli_fetch_array($cari_kd);
														$keterangan=$tm_cari['keterangan'];
														
															echo $keterangan;
														
													}
												?>											
											
										</font>
									</td>
								</tr>
								
								<?php										
									}
								?>

<tr>
									<td align="center"></td>
									<td align="center"></td>
									<td align="center"></td>
									<td align="center"></td>
									<td><font size="2">JUMLAH  ( RP )</font></td>
									<td align="right">
										<?php 
											$cari_kd=mysqli_query($koneksi,"SELECT sum(anggaran) as tot 
																			FROM tbrapbes_detail WHERE left(kode,1)='3' and left(kode,2)='32' and tahun='$cbothn' 
																			and kode_wil='$kd_kel'");
											$tm_cari=mysqli_fetch_array($cari_kd);
											$tot5=$tm_cari['tot'];	
											echo number_format($tot5,2);															
										?>						
									</td>
									<td align="center"></td>
								</tr>
	</table>
	<br>
	<table border="0" cellpadding="5" cellspacing="0" style="width: 100%">
		<tr>
			<td width="60%" align="center"></td>
			<td width="40%" align="center"><font size="2">DISETUJUI OLEH :</font></td>
		</tr>
		<tr>
			<td width="60%" align="center"></td>
			<td width="40%" align="center"><font size="2">KEPALA DESA <?php echo $nm_kel; ?></font></td>
		</tr>
	</table>
</body>
</html>
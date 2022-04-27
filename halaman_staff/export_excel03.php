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

	$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$tot_penduduk=$tm_cari['tot'];
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
	header("Content-Disposition: attachment; filename=Laporan Kependudukan Berdasarkan Kelompok Usia.xls");
	?>

	<center>
		<h4>Laporan Kependudukan Berdasarkan Kelompok Usia</h4>
	</center>

	<table border="1">
												<tr> 
													<td rowspan="2" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>No</b></font></center></td> 
													<td colspan="2" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Dusun</b></font></center></td> 
													<td colspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>0-4 Tahun</b></font></center></td> 
													<td colspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>5-9 Tahun</b></font></center></td> 
													<td colspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>10-14 Tahun</b></font></center></td> 
													<td colspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>15-19 Tahun</b></font></center></td> 
													<td colspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>20-24 Tahun</b></font></center></td> 
													<td colspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>25-29 Tahun</b></font></center></td> 
													<td colspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>30-34 Tahun</b></font></center></td> 
													<td colspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>35-39 Tahun</b></font></center></td> 
													<td colspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>40-44 Tahun</b></font></center></td> 
													<td colspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>45-49 Tahun</b></font></center></td> 
													<td colspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>50-54 Tahun</b></font></center></td> 
													<td colspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>55-59 Tahun</b></font></center></td> 
													<td colspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>60-64 Tahun</b></font></center></td> 
													<td colspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>65 Tahun Keatas</b></font></center></td> 
													<td colspan="2" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Dusun</b></font></center></td> 
												</tr> 
												<tr> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Kode</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Nama</b></font></center></td>
 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Pria</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Wanita</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Jumlah</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>%</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Pria</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Wanita</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Jumlah</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>%</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Pria</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Wanita</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Jumlah</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>%</b></font></center></td> 

													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Pria</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Wanita</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Jumlah</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>%</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Pria</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Wanita</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Jumlah</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>%</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Pria</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Wanita</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Jumlah</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>%</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Pria</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Wanita</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Jumlah</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>%</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Pria</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Wanita</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Jumlah</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>%</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Pria</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Wanita</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Jumlah</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>%</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Pria</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Wanita</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Jumlah</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>%</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Pria</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Wanita</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Jumlah</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>%</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Pria</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Wanita</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Jumlah</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>%</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Pria</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Wanita</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Jumlah</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>%</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Pria</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Wanita</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Jumlah</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>%</b></font></center></td> 

													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>Jumlah</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>%</b></font></center></td>
												</tr>
		<?php 
		// koneksi database
$koneksi = mysqli_connect("localhost","kreasiso_potensi","Fy!s_G&z^k$}","kreasiso_potensi");

		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"select distinct(id_dukuh) as kode from tbpenduduk where kode='$kd_kel'");
		$no = 1;
		while($d = mysqli_fetch_array($data)){

													$id_dukuh=$d['kode'];
													
													$cari_kd=mysqli_query($koneksi,"select nm_dukuh FROM tbdukuh where id_dukuh='$id_dukuh'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$nm_dukuh=$tm_cari['nm_dukuh'];

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot_dukuh=$tm_cari['tot'];
													$tot_dukuh_persen=round((($tot_dukuh/$tot_penduduk)*100),2);
	
													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)<=4)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot1_lk=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)<=4)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot1_pr=$tm_cari['tot'];

													$tot1=$tot1_lk+$tot1_pr;
													$tot1_persen=round((($tot1/$tot_dukuh)*100),2);
// ----------------------------------------------------------------------------------------------------------

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=5 and year(curdate())-year(tgl_lhr)<=9)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot2_lk=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=5 and year(curdate())-year(tgl_lhr)<=9)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot2_pr=$tm_cari['tot'];

													$tot2=$tot2_lk+$tot2_pr;
													$tot2_persen=round((($tot2/$tot_dukuh)*100),2);
// ----------------------------------------------------------------------------------------------------------

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=10 and year(curdate())-year(tgl_lhr)<=14)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot3_lk=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=10 and year(curdate())-year(tgl_lhr)<=14)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot3_pr=$tm_cari['tot'];

													$tot3=$tot3_lk+$tot3_pr;
													$tot3_persen=round((($tot3/$tot_dukuh)*100),2);
// ----------------------------------------------------------------------------------------------------------

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=15 and year(curdate())-year(tgl_lhr)<=19)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot4_lk=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=15 and year(curdate())-year(tgl_lhr)<=19)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot4_pr=$tm_cari['tot'];

													$tot4=$tot4_lk+$tot4_pr;
													$tot4_persen=round((($tot4/$tot_dukuh)*100),2);
// ----------------------------------------------------------------------------------------------------------

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=20 and year(curdate())-year(tgl_lhr)<=24)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot5_lk=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=20 and year(curdate())-year(tgl_lhr)<=24)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot5_pr=$tm_cari['tot'];

													$tot5=$tot5_lk+$tot5_pr;
													$tot5_persen=round((($tot5/$tot_dukuh)*100),2);
// ----------------------------------------------------------------------------------------------------------

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=25 and year(curdate())-year(tgl_lhr)<=29)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot6_lk=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=25 and year(curdate())-year(tgl_lhr)<=29)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot6_pr=$tm_cari['tot'];

													$tot6=$tot6_lk+$tot6_pr;
													$tot6_persen=round((($tot6/$tot_dukuh)*100),2);
// ----------------------------------------------------------------------------------------------------------

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=30 and year(curdate())-year(tgl_lhr)<=34)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot7_lk=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=30 and year(curdate())-year(tgl_lhr)<=34)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot7_pr=$tm_cari['tot'];

													$tot7=$tot7_lk+$tot7_pr;
													$tot7_persen=round((($tot7/$tot_dukuh)*100),2);
// ----------------------------------------------------------------------------------------------------------

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=35 and year(curdate())-year(tgl_lhr)<=39)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot8_lk=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=35 and year(curdate())-year(tgl_lhr)<=39)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot8_pr=$tm_cari['tot'];

													$tot8=$tot8_lk+$tot8_pr;
													$tot8_persen=round((($tot8/$tot_dukuh)*100),2);
// ----------------------------------------------------------------------------------------------------------											

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=40 and year(curdate())-year(tgl_lhr)<=44)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot9_lk=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=40 and year(curdate())-year(tgl_lhr)<=44)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot9_pr=$tm_cari['tot'];

													$tot9=$tot9_lk+$tot9_pr;
													$tot9_persen=round((($tot9/$tot_dukuh)*100),2);
// ----------------------------------------------------------------------------------------------------------			

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=45 and year(curdate())-year(tgl_lhr)<=49)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot10_lk=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=45 and year(curdate())-year(tgl_lhr)<=49)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot10_pr=$tm_cari['tot'];

													$tot10=$tot10_lk+$tot10_pr;
													$tot10_persen=round((($tot10/$tot_dukuh)*100),2);
// ----------------------------------------------------------------------------------------------------------			

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=50 and year(curdate())-year(tgl_lhr)<=54)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot11_lk=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=50 and year(curdate())-year(tgl_lhr)<=54)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot11_pr=$tm_cari['tot'];

													$tot11=$tot11_lk+$tot11_pr;
													$tot11_persen=round((($tot11/$tot_dukuh)*100),2);
// ----------------------------------------------------------------------------------------------------------			

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=55 and year(curdate())-year(tgl_lhr)<=59)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot12_lk=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=55 and year(curdate())-year(tgl_lhr)<=59)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot12_pr=$tm_cari['tot'];

													$tot12=$tot12_lk+$tot12_pr;
													$tot12_persen=round((($tot12/$tot_dukuh)*100),2);
// ----------------------------------------------------------------------------------------------------------			

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=60 and year(curdate())-year(tgl_lhr)<=64)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot13_lk=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=60 and year(curdate())-year(tgl_lhr)<=64)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot13_pr=$tm_cari['tot'];

													$tot13=$tot13_lk+$tot13_pr;
													$tot13_persen=round((($tot13/$tot_dukuh)*100),2);
// ----------------------------------------------------------------------------------------------------------			

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=65)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot14_lk=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=65)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot14_pr=$tm_cari['tot'];

													$tot14=$tot14_lk+$tot14_pr;
													$tot14_persen=round((($tot14/$tot_dukuh)*100),2);
// ----------------------------------------------------------------------------------------------------------			

		?>
		<tr>
														<td class="border text-center"><font size="2"><?php echo $no; ?></font></td>                  
														<td class="border"><font size="2"><?php echo $d['kode']; ?></font></td>             
														<td class="border text-center"><font size="2"><?php echo $nm_dukuh; ?></font></td>

														<td class="border text-center"><font size="2"><?php echo $tot1_lk ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot1_pr ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot1 ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot1_persen ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot2_lk ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot2_pr ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot2 ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot2_persen ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot3_lk ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot3_pr ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot3 ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot3_persen ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot4_lk ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot4_pr ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot4 ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot4_persen ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot5_lk ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot5_pr ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot5 ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot5_persen ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot6_lk ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot6_pr ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot6 ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot6_persen ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot7_lk ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot7_pr ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot7 ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot7_persen ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot8_lk ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot8_pr ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot8 ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot8_persen ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot9_lk ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot9_pr ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot9 ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot9_persen ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot10_lk ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot10_pr ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot10 ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot10_persen ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot11_lk ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot11_pr ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot11 ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot11_persen ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot12_lk ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot12_pr ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot12 ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot12_persen ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot13_lk ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot13_pr ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot13 ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot13_persen ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot14_lk ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot14_pr ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot14 ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot14_persen ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot_dukuh ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot_dukuh_persen ?>%</font></td>
		</tr>
		<?php 
		$no++;
		}
		?>
	</table>
</body>
</html>
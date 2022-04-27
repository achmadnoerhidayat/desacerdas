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
	
	$tgl_skr=date('d/m/Y');
	$cbobln=$_GET['sbln'];
	$cbothn=$_GET['sthn'];

	$cari_kd=mysqli_query($koneksi,"select bulan FROM tbbulan WHERE id='$cbobln'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_bulan=$tm_cari['bulan'];
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
	header("Content-Disposition: attachment; filename=Rekapitulasi Jumlah Penduduk.xls");
	?>

	<center>
		<font size="3"><b>REKAPITULASI JUMLAH PENDUDUK BULAN <?php echo $nm_bulan; ?> TAHUN <?php echo $cbothn; ?></b></font>
		<br>
		<font size="2">PEMERINTAH DESA <?php echo $nm_kel; ?></font>
		<br>
		<font size="2">KECAMATAN <?php echo $nm_kec; ?> KABUPATEN <?php echo $nm_kab; ?></font>
		
		<br>&nbsp;
	</center>

	<table border="1">
												<tr> 
													<td rowspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>NOMOR URUT</b></font></center></td> 
													<td rowspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>NAMA DUSUN/LINGKUNGAN</b></font></center></td> 
													<td colspan="7" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>JUMLAH PENDUDUK AWAL BULAN</b></font></center></td> 
													<td colspan="8" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>TAMBAHAN BULAN INI</b></font></center></td> 
													<td colspan="8" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>PENGURANGAN BULAN INI</b></font></center></td> 
													<td rowspan="2" colspan="7" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>JML PENDUDUK AKHIR BULAN</b></font></center></td> 
													<td rowspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>KET</b></font></center></td> 
												</tr> 
												<tr> 
													<td rowspan="2" colspan="2" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>WNI</b></font></center></td> 
													<td rowspan="2" colspan="2" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>WNA</b></font></center></td> 
													<td rowspan="3" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>JML KK</b></font></center></td> 
													<td rowspan="3" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>JML ANGGOTA KELUARGA</b></font></center></td> 
													<td rowspan="3" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>JML JIWA (7+8)</b></font></center></td> 
													<td colspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>LAHIR</b></font></center></td> 
													<td colspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>DATANG</b></font></center></td>								
													<td colspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>MENINGGAL</b></font></center></td> 
													<td colspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>PINDAH</b></font></center></td> 													
												</tr>												
												<tr> 
													<td colspan="2" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>WNA</b></font></center></td> 
													<td colspan="2" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>WNI</b></font></center></td> 
													<td colspan="2" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>WNA</b></font></center></td> 
													<td colspan="2" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>WNI</b></font></center></td>
													<td colspan="2" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>WNA</b></font></center></td> 
													<td colspan="2" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>WNI</b></font></center></td> 
													<td colspan="2" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>WNA</b></font></center></td> 
													<td colspan="2" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>WNI</b></font></center></td>
													<td colspan="2" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>WNA</b></font></center></td> 
													<td colspan="2" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>WNI</b></font></center></td>
													<td rowspan="2" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>JML KK</b></font></center></td> 
													<td rowspan="2" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>JML ANGGOTA</b></font></center></td> 
													<td rowspan="2" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>JML JIWA</b></font></center></td> 
												</tr>	
												<tr> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>L</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>P</b></font></center></td>  
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>L</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>P</b></font></center></td>  													
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>L</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>P</b></font></center></td>  
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>L</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>P</b></font></center></td>  												
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>L</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>P</b></font></center></td>  
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>L</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>P</b></font></center></td>
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>L</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>P</b></font></center></td>  
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>L</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>P</b></font></center></td>  												
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>L</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>P</b></font></center></td>  
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>L</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>P</b></font></center></td>													
																				<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>L</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>P</b></font></center></td>  
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>L</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>P</b></font></center></td>													
												</tr>	
		<?php 
		// koneksi database
	$koneksi = mysqli_connect("localhost","kreasiso_potensi","Fy!s_G&z^k$}","kreasiso_potensi");
	//$koneksi = mysqli_connect("localhost","root","","dbpotensi");

		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"SELECT distinct(id_dukuh) as kd_dukuh FROM tbpenduduk where kode='$kd_kel'");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
			$id_dukuh=$d['kd_dukuh'];			
$cari_kd=mysqli_query($koneksi,"select nm_dukuh FROM tbdukuh where id_dukuh='$id_dukuh'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$nm_dukuh=$tm_cari['nm_dukuh'];

												// --- Penduduk Awal Bulan -----------
												// --- 01 Penduduk Awal Bulan Laki-Laki WNI -----------
													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Menetap'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_laki_wni_awal_menetap=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and id_dukuh='$id_dukuh' and 
													month(tgl_register)<'$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Lahir Di'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_laki_wni_awal_lahir=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and id_dukuh='$id_dukuh' and 
													month(tgl_register)<'$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Datang Dari'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_laki_wni_awal_datang=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and id_dukuh='$id_dukuh' and 
													month(tgl_register)<'$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Meninggal'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_laki_wni_awal_meninggal=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and id_dukuh='$id_dukuh' and 
													month(tgl_register)<'$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Pindah Ke'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_laki_wni_awal_pindah=$tm_cari['tot'];
													
													//$jml_laki_wni_awal=$jml_laki_wni_awal_menetap+$jml_laki_wni_awal_lahir+$jml_laki_wni_awal_datang-($jml_laki_wni_awal_meninggal+$jml_laki_wni_awal_pindah);
													$jml_laki_wni_awal=$jml_laki_wni_awal_menetap;
												// --- END 01 Penduduk Awal Bulan Laki-Laki WNI -----------

												// --- 02 Penduduk Awal Bulan Laki-Laki WNA -----------
													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Menetap'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_laki_wna_awal_menetap=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and id_dukuh='$id_dukuh' and 
													month(tgl_register)<'$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Lahir Di'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_laki_wna_awal_lahir=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and id_dukuh='$id_dukuh' and 
													month(tgl_register)<'$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Datang Dari'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_laki_wna_awal_datang=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and id_dukuh='$id_dukuh' and 
													month(tgl_register)<'$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Meninggal'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_laki_wna_awal_meninggal=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and id_dukuh='$id_dukuh' and 
													month(tgl_register)<'$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Pindah Ke'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_laki_wna_awal_pindah=$tm_cari['tot'];
													
													//$jml_laki_wna_awal=$jml_laki_wna_awal_menetap+$jml_laki_wna_awal_lahir+$jml_laki_wna_awal_datang-($jml_laki_wna_awal_meninggal+$jml_laki_wna_awal_pindah);
													$jml_laki_wna_awal=$jml_laki_wna_awal_menetap;
												// --- END 02 Penduduk Awal Bulan Laki-Laki WNA -----------

												// --- 03 Penduduk Awal Bulan Perempuan WNI -----------
													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Menetap'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_perempuan_wni_awal_menetap=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and id_dukuh='$id_dukuh' and 
													month(tgl_register)<'$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Lahir Di'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_perempuan_wni_awal_lahir=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and id_dukuh='$id_dukuh' and 
													month(tgl_register)<'$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Datang Dari'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_perempuan_wni_awal_datang=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and id_dukuh='$id_dukuh' and 
													month(tgl_register)<'$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Meninggal'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_perempuan_wni_awal_meninggal=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and id_dukuh='$id_dukuh' and 
													month(tgl_register)<'$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Pindah Ke'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_perempuan_wni_awal_pindah=$tm_cari['tot'];
													
													//$jml_perempuan_wni_awal=$jml_perempuan_wni_awal_menetap+$jml_perempuan_wni_awal_lahir+$jml_perempuan_wni_awal_datang-($jml_perempuan_wni_awal_meninggal+$jml_perempuan_wni_awal_pindah);
													$jml_perempuan_wni_awal=$jml_perempuan_wni_awal_menetap;
												// --- END 03 Penduduk Awal Bulan Perempuan WNI -----------
												
												// --- 04 Penduduk Awal Bulan Perempuan WNA -----------
													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Menetap'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_perempuan_wna_awal_menetap=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and id_dukuh='$id_dukuh' and 
													month(tgl_register)<'$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Lahir Di'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_perempuan_wna_awal_lahir=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and id_dukuh='$id_dukuh' and 
													month(tgl_register)<'$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Datang Dari'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_perempuan_wna_awal_datang=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and id_dukuh='$id_dukuh' and 
													month(tgl_register)<'$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Meninggal'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_perempuan_wna_awal_meninggal=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and id_dukuh='$id_dukuh' and 
													month(tgl_register)<'$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Pindah Ke'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_perempuan_wna_awal_pindah=$tm_cari['tot'];
													
													//$jml_perempuan_wna_awal=$jml_perempuan_wna_awal_menetap+$jml_perempuan_wna_awal_lahir+$jml_perempuan_wna_awal_datang-($jml_perempuan_wna_awal_meninggal+$jml_perempuan_wna_awal_pindah);
													$jml_perempuan_wna_awal=$jml_perempuan_wna_awal_menetap;
												// --- END 04 Penduduk Awal Bulan Perempuan WNA -----------

												// --- 05 Penduduk Awal Bulan KK -----------
													$cari_kd=mysqli_query($koneksi,"SELECT count(distinct(kk)) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and status_hub='Kepala Keluarga' and 
													menetap='Menetap'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_kk_awal_menetap=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(distinct(kk)) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_dukuh='$id_dukuh' and 
													month(tgl_register)<'$cbobln' and year(tgl_register)='$cbothn' and status_hub='Kepala Keluarga' and 
													menetap='Lahir Di'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_kk_awal_lahir=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(distinct(kk)) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_dukuh='$id_dukuh' and 
													month(tgl_register)<'$cbobln' and year(tgl_register)='$cbothn' and status_hub='Kepala Keluarga' and 
													menetap='Datang Dari'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_kk_awal_datang=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(distinct(kk)) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_dukuh='$id_dukuh' and 
													month(tgl_register)<'$cbobln' and year(tgl_register)='$cbothn' and status_hub='Kepala Keluarga' and 
													menetap='Meninggal'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_kk_awal_meninggal=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(distinct(kk)) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_dukuh='$id_dukuh' and 
													month(tgl_register)<'$cbobln' and year(tgl_register)='$cbothn' and status_hub='Kepala Keluarga' and 
													menetap='Pindah Ke'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_kk_awal_pindah=$tm_cari['tot'];
													
													//$jml_kk_awal=$jml_kk_awal_menetap+$jml_kk_awal_lahir+$jml_kk_awal_datang-($jml_kk_awal_meninggal+$jml_kk_awal_pindah);
													$jml_kk_awal=$jml_kk_awal_menetap;
												// --- END 05 Penduduk Awal Bulan KK -----------


												// --- 06 Penduduk Awal Bulan Anggota -----------
													$cari_kd=mysqli_query($koneksi,"SELECT count(nik) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and status_hub<>'Kepala Keluarga' and 
													menetap='Menetap'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_anggota_awal_menetap=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(distinct(kk)) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_dukuh='$id_dukuh' and 
													month(tgl_register)<'$cbobln' and year(tgl_register)='$cbothn' and status_hub<>'Kepala Keluarga' and 
													menetap='Lahir Di'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_anggota_awal_lahir=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(distinct(kk)) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_dukuh='$id_dukuh' and 
													month(tgl_register)<'$cbobln' and year(tgl_register)='$cbothn' and status_hub<>'Kepala Keluarga' and 
													menetap='Datang Dari'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_anggota_awal_datang=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(distinct(kk)) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_dukuh='$id_dukuh' and 
													month(tgl_register)<'$cbobln' and year(tgl_register)='$cbothn' and status_hub<>'Kepala Keluarga' and 
													menetap='Meninggal'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_anggota_awal_meninggal=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(distinct(kk)) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_dukuh='$id_dukuh' and 
													month(tgl_register)<'$cbobln' and year(tgl_register)='$cbothn' and status_hub<>'Kepala Keluarga' and 
													menetap='Pindah Ke'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_anggota_awal_pindah=$tm_cari['tot'];
													
													//$jml_anggota_awal=$jml_anggota_awal_menetap+$jml_anggota_awal_lahir+$jml_anggota_awal_datang-($jml_anggota_awal_meninggal+$jml_anggota_awal_pindah);
													$jml_anggota_awal=$jml_anggota_awal_menetap;
												// --- END 06 Penduduk Awal Bulan Anggota -----------
												
													$jml_jiwa_awal=$jml_kk_awal+$jml_anggota_awal;

// --- End Penduduk Awal Bulan -----------
												
												
												// --- Penduduk Sekarang -----------
												
												// --- Lahir -----------
													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Lahir Di'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_laki_wni_lahir=$tm_cari['tot'];
													
													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Lahir Di'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_laki_wna_lahir=$tm_cari['tot'];
													
													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Lahir Di'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_perempuan_wni_lahir=$tm_cari['tot'];		

													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Lahir Di'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_perempuan_wna_lahir=$tm_cari['tot'];	
												// --------------------------
												
												// --- Datang -----------
													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Datang Dari'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_laki_wni_datang=$tm_cari['tot'];
													
													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Datang Dari'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_laki_wna_datang=$tm_cari['tot'];
													
													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Datang Dari'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_perempuan_wni_datang=$tm_cari['tot'];		

													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Datang Dari'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_perempuan_wna_datang=$tm_cari['tot'];
												// -----------------------------------------------------		

												// --- Meninggal -----------
													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Meninggal'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_laki_wni_meninggal=$tm_cari['tot'];
													
													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Meninggal'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_laki_wna_meninggal=$tm_cari['tot'];
													
													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Meninggal'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_perempuan_wni_meninggal=$tm_cari['tot'];		

													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Meninggal'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_perempuan_wna_meninggal=$tm_cari['tot'];
												// -----------------------------------------------------

												// --- Pindah -----------
													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='1' and id_warga='1' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Pindah Ke'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_laki_wni_pindah=$tm_cari['tot'];
													
													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='1' and id_warga='2' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Pindah Ke'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_laki_wna_pindah=$tm_cari['tot'];
													
													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='2' and id_warga='1' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Pindah Ke'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_perempuan_wni_pindah=$tm_cari['tot'];		

													$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_jk='2' and id_warga='2' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and 
													menetap='Pindah Ke'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_perempuan_wna_pindah=$tm_cari['tot'];
												// -----------------------------------------------------												
													
													
												// ------------------- Jumlah Penduduk Akhir Bulan --------------
													$jml_laki_wni_akhir=$jml_laki_wni_awal+$jml_laki_wni_lahir+$jml_laki_wni_datang-($jml_laki_wni_meninggal+$jml_laki_wni_pindah);
													$jml_laki_wna_akhir=$jml_laki_wna_awal+$jml_laki_wna_lahir+$jml_laki_wna_datang-($jml_laki_wna_meninggal+$jml_laki_wna_pindah);
													$jml_perempuan_wni_akhir=$jml_perempuan_wni_awal+$jml_perempuan_wni_lahir+$jml_perempuan_wni_datang-($jml_perempuan_wni_meninggal+$jml_perempuan_wni_pindah);
													$jml_perempuan_wna_akhir=$jml_perempuan_wna_awal+$jml_perempuan_wna_lahir+$jml_perempuan_wna_datang-($jml_perempuan_wna_meninggal+$jml_perempuan_wna_pindah);
													
													
													
												// --- 05 Penduduk Akhir Bulan KK -----------
													$cari_kd=mysqli_query($koneksi,"SELECT count(distinct(kk)) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and status_hub='Kepala Keluarga' and 
													menetap='Menetap'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_kk_akhir_menetap=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(distinct(kk)) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and status_hub='Kepala Keluarga' and 
													menetap='Lahir Di'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_kk_akhir_lahir=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(distinct(kk)) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and status_hub='Kepala Keluarga' and 
													menetap='Datang Dari'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_kk_akhir_datang=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(distinct(kk)) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and status_hub='Kepala Keluarga' and 
													menetap='Meninggal'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_kk_akhir_meninggal=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(distinct(kk)) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and status_hub='Kepala Keluarga' and 
													menetap='Pindah Ke'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_kk_akhir_pindah=$tm_cari['tot'];
													
													//$jml_kk_akhir_bulan=$jml_kk_akhir_menetap+$jml_kk_akhir_lahir+$jml_kk_akhir_datang-($jml_kk_akhir_meninggal+$jml_kk_akhir_pindah);
													$jml_kk_akhir_bulan=$jml_kk_awal+$jml_kk_akhir_lahir+$jml_kk_akhir_datang-($jml_kk_akhir_meninggal+$jml_kk_akhir_pindah);

												// --- END 05 Penduduk Awal Bulan KK -----------

												// --- 06 Penduduk Akhir Bulan Anggota -----------
													$cari_kd=mysqli_query($koneksi,"SELECT count(nik) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and status_hub<>'Kepala Keluarga' and 
													menetap='Menetap'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_anggota_akhir_menetap=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(nik) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and status_hub<>'Kepala Keluarga' and 
													menetap='Lahir Di'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_anggota_akhir_lahir=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(nik) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and status_hub<>'Kepala Keluarga' and 
													menetap='Datang Dari'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_anggota_akhir_datang=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(nik) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and status_hub<>'Kepala Keluarga' and 
													menetap='Meninggal'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_anggota_akhir_meninggal=$tm_cari['tot'];

													$cari_kd=mysqli_query($koneksi,"SELECT count(nik) as tot FROM tbpenduduk 
													WHERE kode='$kd_kel' and id_dukuh='$id_dukuh' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and status_hub<>'Kepala Keluarga' and 
													menetap='Pindah Ke'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jml_anggota_akhir_pindah=$tm_cari['tot'];
													
													//$jml_anggota_akhir_bulan=$jml_anggota_akhir_menetap+$jml_anggota_akhir_lahir+$jml_anggota_akhir_datang-($jml_anggota_akhir_meninggal+$jml_anggota_akhir_pindah);
													$jml_anggota_akhir_bulan=$jml_anggota_awal+$jml_anggota_akhir_lahir+$jml_anggota_akhir_datang-($jml_anggota_akhir_meninggal+$jml_anggota_akhir_pindah);
												// --- END 06 Penduduk Awal Bulan Anggota -----------

													$jml_jiwa_akhir=$jml_kk_akhir_bulan+$jml_anggota_akhir_bulan;
													
		?>
		<tr>
														<td class="border text-center"><font size="2"><?php echo $no; ?></font></td>                  
														<td class="border text-center"><font size="2"><?php echo $nm_dukuh; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_laki_wni_awal; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_wni_awal; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_laki_wna_awal; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_wna_awal; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_kk_awal; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_anggota_awal; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_jiwa_awal; ?></font></td>
														
														<td class="border text-center"><font size="2"><?php echo $jml_laki_wna_lahir; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_wna_lahir; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_laki_wni_lahir; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_wni_lahir; ?></font></td>

														<td class="border text-center"><font size="2"><?php echo $jml_laki_wna_datang; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_wna_datang; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_laki_wni_datang; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_wni_datang; ?></font></td>

														<td class="border text-center"><font size="2"><?php echo $jml_laki_wna_meninggal; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_wna_meninggal; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_laki_wni_meninggal; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_wni_meninggal; ?></font></td>

														<td class="border text-center"><font size="2"><?php echo $jml_laki_wna_pindah; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_wna_pindah; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_laki_wni_pindah; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_wni_pindah; ?></font></td>

														<td class="border text-center"><font size="2"><?php echo $jml_laki_wna_akhir; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_wna_akhir; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_laki_wni_akhir; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_perempuan_wni_akhir; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_kk_akhir_bulan; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_anggota_akhir_bulan; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $jml_jiwa_akhir; ?></font></td>
														<td class="border text-center"><font size="2"></font></td>
		</tr>
		<?php 
		$no++;
		}
		?>
	</table>

<br>
	<table>
		<tr>
			<td colspan="6" align="center">
				<font size="2">
					Mengetahui :<br>
					Kepala Desa <?php echo $nm_kel; ?>
				</font>
			</td>
			<td colspan="7" align="center">
				<font size="2">
					Desa <?php echo $nm_kel; ?>, <?php echo $tgl_skr; ?><br>
					Sekertaris Desa <?php echo $nm_kel; ?>
				</font>
			</td>
		</tr>
	</table>
	
</body>
</html>
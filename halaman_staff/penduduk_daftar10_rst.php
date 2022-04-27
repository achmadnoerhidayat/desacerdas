<?php
	session_start();
	
	if($_SESSION['nip']==''){
		header("location:../index.php");
	} else {
		$kd_kel=$_SESSION['kodewil'];
		$nip=$_SESSION['nip'];
		$nm_user=$_SESSION['nm_user'];
		
	include "config/koneksi.php";
							$cari_kd=mysqli_query($koneksi,"SELECT file_photo, file_name FROM tbuser WHERE nip='$nip'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$file_photo=$tm_cari['file_photo'];
	$file_name=$tm_cari['file_name'];
	if($file_photo=='') {
		$file_photo="dist/images/logo.svg";
	}
	
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

//if(isset($_POST['tambah1'])){
	$cbobln=$_POST['cbobln'];
	$cbothn=$_POST['cbothn'];

	$cari_kd=mysqli_query($koneksi,"select bulan FROM tbbulan WHERE id='$cbobln'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_bulan=$tm_cari['bulan'];
//} else {
	//$cbobln=$_POST['cbobln1'];
	//$cbothn=$_POST['cbothn1'];

	//$cari_kd=mysqli_query($koneksi,"select bulan FROM tbbulan WHERE id='$cbobln'");
	//$tm_cari=mysqli_fetch_array($cari_kd);
	//$nm_bulan=$tm_cari['bulan'];	
//}
?>

<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title><?php include "titel.php"; ?></title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="dist/css/app.css" />
        <!-- END: CSS Assets-->

<style>
	.btn_style{
		border: 1px solid #cecece;
		border-radius: 3px;
		padding: 3px 10px;
		box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
		color: white;
		background-color: #7CFC00;
	}
	.btn_style:hover{
		border: 1px solid #b1b1b1;
		box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
	}
	</style>

<style>
	.btn_style1{
		border: 1px solid #cecece;
		border-radius: 3px;
		padding: 3px 10px;
		box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
		color: white;
		background-color: grey;
	}
	.btn_style1:hover{
		border: 1px solid #b1b1b1;
		box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
	}
	</style>

<style>
	.btn_style2{
		border: 1px solid #cecece;
		border-radius: 3px;
		padding: 3px 10px;
		box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
		color: white;
		background-color: #FFD700;
	}
	.btn_style2:hover{
		border: 1px solid #b1b1b1;
		box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
	}
	</style>
	
	
    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->
        
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->

<?php include "menu_penduduk02.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> 
					<i data-feather="chevron-right" class="breadcrumb__icon"></i> 
					<a href="penduduk_daftar.php" class="">Kependudukan</a>
					<i data-feather="chevron-right" class="breadcrumb__icon"></i>
					<a href="#" class="breadcrumb--active">Rekapitulasi Jumlah Penduduk</a> </div>
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Search -->

                    <!-- END: Search -->
                    <!-- BEGIN: Notifications -->
                    
                    <!-- END: Notifications -->
                    <!-- BEGIN: Account Menu -->
                    <div class="intro-x dropdown w-8 h-8 relative">
                        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                            <img alt="User Profil" src="<?php echo $file_photo; ?>">
                        </div>
                        <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20">
                            <div class="dropdown-box__content box bg-theme-38 text-white">
                                <div class="p-4 border-b border-theme-40">
                                    <div class="font-medium"><?php echo $nm_user; ?></div>
                                    <div class="text-xs text-theme-41"><?php include "titel_status.php"; ?></div>
                                </div>
                                <div class="p-2">
                                    <a href="profile.php" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                    <a href="change_pwd.php" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Change Password </a>
                                </div>
                                <div class="p-2 border-t border-theme-40">
                                    <a href="logout.php" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Account Menu -->
                </div>
                <!-- END: Top Bar -->
				
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">
                        <!-- BEGIN: Form Layout -->
                        <div class="intro-y box p-5">

<center>
		<font size="3"><b>REKAPITULASI JUMLAH PENDUDUK BULAN <?php echo $nm_bulan; ?> TAHUN <?php echo $cbothn; ?></b></font>
		<br>
		<font size="2">PEMERINTAH DESA <?php echo $nm_kel; ?></font>
		<br>
		<font size="2">KECAMATAN <?php echo $nm_kec; ?> KABUPATEN <?php echo $nm_kab; ?></font>
		<br>&nbsp;
	</center>
	
                                        <table class="table">
                                            <tbody>

                                                <tr valign="top" class="">
                                                    	<td width="15%" class="no-border">

							</td>
                                                    	<td width="1%" class="no-border text-center">

							</td>
                                                    	<td width="54%" class="no-border text-left" >

							</td>
                                                    	<td width="10%" class="no-border text-center">
															<button type="button" class="button w-40 bg-theme-1 text-white">
															<a href="report10.php?sbln=<?php echo $cbobln; ?>&sthn=<?php echo $cbothn; ?>" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Download&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
															</button>
														</td>
                                                    	<td width="10%" class="no-border text-center">
															<button type="button" class="button w-40 bg-theme-1 text-white">
															<a target="_blank" href="export_excel10.php?sbln=<?php echo $cbobln; ?>&sthn=<?php echo $cbothn; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Export Excel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
															</button>
														</td>
                                                    	<td width="10%" class="no-border text-center">
															<button type="button" class="button w-40 bg-theme-1 text-white">
															<a href="cetak10.php?sbln=<?php echo $cbobln; ?>&sthn=<?php echo $cbothn; ?>" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Print&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
															</button>
														</td>
                                                </tr>
                                            </tbody>
                                        </table>

<div class="overflow-x-auto">
<table class="table"> 
											<thead> 
												<tr> 
													<td rowspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>NOMOR URUT</b></font></center></td> 
													<td rowspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>NAMA DUSUN/LINGKUNGAN</b></font></center></td> 
													<td colspan="7" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>JUMLAH PENDUDUK AWAL BULAN</b></font></center></td> 
													<td colspan="8" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>TAMBAHAN BULAN INI</b></font></center></td> 
													<td colspan="8" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>PENGURANGAN BULAN INI</b></font></center></td> 
													<td rowspan="2" colspan="7" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>JML PENDUDUK AKHIR BULAN</b></font></center></td> 
													<td rowspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>KET</b></font></center></td> 
													<td rowspan="4" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b></b></font></center></td> 
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
												
											</thead>  

											<?php 
												$halaman = 10;
												$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
												$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

												$result = mysqli_query($koneksi,"SELECT distinct(id_dukuh) as kd_dukuh FROM tbpenduduk where kode='$kd_kel'");

												$total = mysqli_num_rows($result);
												$pages = ceil($total/$halaman);            

												$query = mysqli_query($koneksi,"select distinct(id_dukuh) as kd_dukuh from tbpenduduk 
												where kode='$kd_kel' LIMIT $mulai, $halaman")or die(mysql_error);

												$no =$mulai+1;
												while ($data = mysqli_fetch_assoc($query)) {
													$id_dukuh=$data['kd_dukuh'];		
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
												<tbody>
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
														<td class="border text-center">
															<form action="penduduk_detail10_rinci.php" method="post">			
																<input type="hidden" name="txtid" value="<?php echo $id_dukuh; ?>"/>															
																<input type="hidden" name="txtbln" value="<?php echo $cbobln; ?>"/>															
																<input type="hidden" name="txtthn" value="<?php echo $cbothn; ?>"/>																															
																<button class="btn_style" name="btn1" id="btn1" type="submit">Detail</button>
															</form>														
														</td>              
													</tr>
												</tbody>
												<?php               
$no++;
													} 
												?>
										</table> 
</div>        
                                        <table class="table">
                                            <tbody>
                                                <tr class="">
                                                    <td width="20%" class="no-border"></td>
                                                    <td width="80%" class="no-border text-right">
														<?php for ($i=1; $i<=$pages ; $i++){ ?>
															<a href="?halaman=<?php echo $i; ?>"><font size="2"><?php echo $i; ?></font></a>&nbsp;
														<?php } ?> 
													</td>
                                                </tr>
											</tbody>
										</table>

                <!-- END: Datatable -->


                        </div>
                        <!-- END: Form Layout -->
                    </div>
                </div>
            </div>
            <!-- END: Content -->
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="dist/js/app.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>

<?php
	}
?>
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
	
	$kd_kec=substr($kd_kel,0,8);
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kec'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kec=$tm_cari['nama'];

	$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$tot_penduduk=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"select count(distinct(id_dukuh)) as tot FROM tbpenduduk where kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_data=$tm_cari['tot'];
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
					<a href="#" class="breadcrumb--active">Laporan Kependudukan Berdasarkan Kelompok Usia</a> </div>
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
															<a href="report03.php" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Download&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
															</button>
														</td>
                                                    	<td width="10%" class="no-border text-center">
															<button type="button" class="button w-40 bg-theme-1 text-white">
															<a target="_blank" href="export_excel03.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Export Excel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
															</button>
														</td>
                                                    	<td width="10%" class="no-border text-center">
															<button type="button" class="button w-40 bg-theme-1 text-white">
															<a href="cetak03.php" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Print&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
															</button>
														</td>
                                                </tr>
                                            </tbody>
                                        </table>

<div class="overflow-x-auto">
<table class="table"> 
											<thead> 
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
													<td rowspan="2" class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b></b></font></center></td> 
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
											</thead>  

											<?php 
												$query = mysqli_query($koneksi,"select distinct(id_dukuh) as kode from tbpenduduk where kode='$kd_kel'")or die(mysql_error);
												$no =1;
												
												$tot1_lk_all=0;
												$tot2_lk_all=0;
												$tot3_lk_all=0;
												$tot4_lk_all=0;
												$tot5_lk_all=0;
												$tot6_lk_all=0;
												$tot7_lk_all=0;
												$tot8_lk_all=0;
												$tot9_lk_all=0;
												$tot10_lk_all=0;
												$tot11_lk_all=0;
												$tot12_lk_all=0;
												$tot13_lk_all=0;
												$tot14_lk_all=0;

												$tot1_pr_all=0;
												$tot2_pr_all=0;
												$tot3_pr_all=0;
												$tot4_pr_all=0;
												$tot5_pr_all=0;
												$tot6_pr_all=0;
												$tot7_pr_all=0;
												$tot8_pr_all=0;
												$tot9_pr_all=0;
												$tot10_pr_all=0;
												$tot11_pr_all=0;
												$tot12_pr_all=0;
												$tot13_pr_all=0;
												$tot14_pr_all=0;
												
												$tot1_all=0;
												$tot2_all=0;
												$tot3_all=0;
												$tot4_all=0;
												$tot5_all=0;
												$tot6_all=0;
												$tot7_all=0;
												$tot8_all=0;
												$tot9_all=0;
												$tot10_all=0;
												$tot11_all=0;
												$tot12_all=0;	
												$tot13_all=0;
												$tot14_all=0;
												
												$tot1_persen_all=0;
												$tot2_persen_all=0;
												$tot3_persen_all=0;
												$tot4_persen_all=0;
												$tot5_persen_all=0;
												$tot6_persen_all=0;
												$tot7_persen_all=0;
												$tot8_persen_all=0;		
												$tot9_persen_all=0;
												$tot10_persen_all=0;
												$tot11_persen_all=0;
												$tot12_persen_all=0;
												$tot13_persen_all=0;
												$tot14_persen_all=0;
												
												$tot_dukuh_all=0;
												$tot_dukuh_persen_all=0;
												while ($data = mysqli_fetch_assoc($query)) {
													$id_dukuh=$data['kode'];
													
													$cari_kd=mysqli_query($koneksi,"select nm_dukuh FROM tbdukuh where id_dukuh='$id_dukuh'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$nm_dukuh=$tm_cari['nm_dukuh'];

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot_dukuh=$tm_cari['tot'];
													$tot_dukuh_persen=round((($tot_dukuh/$tot_penduduk)*100),2);
													$tot_dukuh_all=$tot_dukuh_all+$tot_dukuh;
													$tot_dukuh_persen_all=$tot_dukuh_persen_all+$tot_dukuh_persen;
													
													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)<=4)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot1_lk=$tm_cari['tot'];
													$tot1_lk_all=$tot1_lk_all+$tot1_lk;
													
													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)<=4)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot1_pr=$tm_cari['tot'];
													$tot1_pr_all=$tot1_pr_all+$tot1_pr;
													
													$tot1=$tot1_lk+$tot1_pr;
													$tot1_all=$tot1_all+$tot1;
													$tot1_persen=round((($tot1/$tot_dukuh)*100),2);
													$tot1_persen_all=$tot1_persen_all+$tot1_persen;
// ----------------------------------------------------------------------------------------------------------

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=5 and year(curdate())-year(tgl_lhr)<=9)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot2_lk=$tm_cari['tot'];
													$tot2_lk_all=$tot2_lk_all+$tot2_lk;
													
													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=5 and year(curdate())-year(tgl_lhr)<=9)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot2_pr=$tm_cari['tot'];
													$tot2_pr_all=$tot2_pr_all+$tot2_pr;
													
													$tot2=$tot2_lk+$tot2_pr;
													$tot2_all=$tot2_all+$tot2;
													$tot2_persen=round((($tot2/$tot_dukuh)*100),2);
													$tot2_persen_all=$tot2_persen_all+$tot2_persen;
// ----------------------------------------------------------------------------------------------------------

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=10 and year(curdate())-year(tgl_lhr)<=14)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot3_lk=$tm_cari['tot'];
													$tot3_lk_all=$tot3_lk_all+$tot3_lk;
													
													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=10 and year(curdate())-year(tgl_lhr)<=14)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot3_pr=$tm_cari['tot'];
													$tot3_pr_all=$tot3_pr_all+$tot3_pr;
													
													$tot3=$tot3_lk+$tot3_pr;
													$tot3_all=$tot3_all+$tot3;
													$tot3_persen=round((($tot3/$tot_dukuh)*100),2);
													$tot3_persen_all=$tot3_persen_all+$tot3_persen;
// ----------------------------------------------------------------------------------------------------------

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=15 and year(curdate())-year(tgl_lhr)<=19)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot4_lk=$tm_cari['tot'];
													$tot4_lk_all=$tot4_lk_all+$tot4_lk;
													
													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=15 and year(curdate())-year(tgl_lhr)<=19)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot4_pr=$tm_cari['tot'];
													$tot4_pr_all=$tot4_pr_all+$tot4_pr;
													
													$tot4=$tot4_lk+$tot4_pr;
													$tot4_all=$tot4_all+$tot4;
													$tot4_persen=round((($tot4/$tot_dukuh)*100),2);
													$tot4_persen_all=$tot4_persen_all+$tot4_persen;
// ----------------------------------------------------------------------------------------------------------

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=20 and year(curdate())-year(tgl_lhr)<=24)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot5_lk=$tm_cari['tot'];
													$tot5_lk_all=$tot5_lk_all+$tot5_lk;
													
													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=20 and year(curdate())-year(tgl_lhr)<=24)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot5_pr=$tm_cari['tot'];
													$tot5_pr_all=$tot5_pr_all+$tot5_pr;
													
													$tot5=$tot5_lk+$tot5_pr;
													$tot5_all=$tot5_all+$tot5;													
													$tot5_persen=round((($tot5/$tot_dukuh)*100),2);
													$tot5_persen_all=$tot5_persen_all+$tot5_persen;
// ----------------------------------------------------------------------------------------------------------

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=25 and year(curdate())-year(tgl_lhr)<=29)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot6_lk=$tm_cari['tot'];
													$tot6_lk_all=$tot6_lk_all+$tot6_lk;
													
													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=25 and year(curdate())-year(tgl_lhr)<=29)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot6_pr=$tm_cari['tot'];
													$tot6_pr_all=$tot6_pr_all+$tot6_pr;
													
													$tot6=$tot6_lk+$tot6_pr;
													$tot6_all=$tot6_all+$tot6;
													$tot6_persen=round((($tot6/$tot_dukuh)*100),2);
													$tot6_persen_all=$tot6_persen_all+$tot6_persen;
// ----------------------------------------------------------------------------------------------------------

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=30 and year(curdate())-year(tgl_lhr)<=34)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot7_lk=$tm_cari['tot'];
													$tot7_lk_all=$tot7_lk_all+$tot7_lk;
													
													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=30 and year(curdate())-year(tgl_lhr)<=34)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot7_pr=$tm_cari['tot'];
													$tot7_pr_all=$tot7_pr_all+$tot7_pr;
													
													$tot7=$tot7_lk+$tot7_pr;
													$tot7_all=$tot7_all+$tot7;
													$tot7_persen=round((($tot7/$tot_dukuh)*100),2);
													$tot7_persen_all=$tot7_persen_all+$tot7_persen;
// ----------------------------------------------------------------------------------------------------------

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=35 and year(curdate())-year(tgl_lhr)<=39)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot8_lk=$tm_cari['tot'];
													$tot8_lk_all=$tot8_lk_all+$tot8_lk;
													
													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=35 and year(curdate())-year(tgl_lhr)<=39)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot8_pr=$tm_cari['tot'];
													$tot8_pr_all=$tot8_pr_all+$tot8_pr;
													
													$tot8=$tot8_lk+$tot8_pr;
													$tot8_all=$tot8_all+$tot8;
													$tot8_persen=round((($tot8/$tot_dukuh)*100),2);
													$tot8_persen_all=$tot8_persen_all+$tot8_persen;
// ----------------------------------------------------------------------------------------------------------											

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=40 and year(curdate())-year(tgl_lhr)<=44)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot9_lk=$tm_cari['tot'];
													$tot9_lk_all=$tot9_lk_all+$tot9_lk;
													
													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=40 and year(curdate())-year(tgl_lhr)<=44)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot9_pr=$tm_cari['tot'];
													$tot9_pr_all=$tot9_pr_all+$tot9_pr;
													
													$tot9=$tot9_lk+$tot9_pr;
													$tot9_all=$tot9_all+$tot9;
													$tot9_persen=round((($tot9/$tot_dukuh)*100),2);
													$tot9_persen_all=$tot9_persen_all+$tot9_persen;
// ----------------------------------------------------------------------------------------------------------			

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=45 and year(curdate())-year(tgl_lhr)<=49)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot10_lk=$tm_cari['tot'];
													$tot10_lk_all=$tot10_lk_all+$tot10_lk;
													
													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=45 and year(curdate())-year(tgl_lhr)<=49)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot10_pr=$tm_cari['tot'];
													$tot10_pr_all=$tot10_pr_all+$tot10_pr;
													
													$tot10=$tot10_lk+$tot10_pr;
													$tot10_all=$tot10_all+$tot10;
													$tot10_persen=round((($tot10/$tot_dukuh)*100),2);
													$tot10_persen_all=$tot10_persen_all+$tot10_persen;
// ----------------------------------------------------------------------------------------------------------			

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=50 and year(curdate())-year(tgl_lhr)<=54)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot11_lk=$tm_cari['tot'];
													$tot11_lk_all=$tot11_lk_all+$tot11_lk;
													
													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=50 and year(curdate())-year(tgl_lhr)<=54)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot11_pr=$tm_cari['tot'];
													$tot11_pr_all=$tot11_pr_all+$tot11_pr;
													
													$tot11=$tot11_lk+$tot11_pr;
													$tot11_all=$tot11_all+$tot11;
													$tot11_persen=round((($tot11/$tot_dukuh)*100),2);
													$tot11_persen_all=$tot11_persen_all+$tot11_persen;
// ----------------------------------------------------------------------------------------------------------			

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=55 and year(curdate())-year(tgl_lhr)<=59)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot12_lk=$tm_cari['tot'];
													$tot12_lk_all=$tot12_lk_all+$tot12_lk;
													
													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=55 and year(curdate())-year(tgl_lhr)<=59)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot12_pr=$tm_cari['tot'];
													$tot12_pr_all=$tot12_pr_all+$tot12_pr;
													
													$tot12=$tot12_lk+$tot12_pr;
													$tot12_all=$tot12_all+$tot12;
													$tot12_persen=round((($tot12/$tot_dukuh)*100),2);
													$tot12_persen_all=$tot12_persen_all+$tot12_persen;
// ----------------------------------------------------------------------------------------------------------			

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=60 and year(curdate())-year(tgl_lhr)<=64)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot13_lk=$tm_cari['tot'];
													$tot13_lk_all=$tot13_lk_all+$tot13_lk;
													
													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=60 and year(curdate())-year(tgl_lhr)<=64)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot13_pr=$tm_cari['tot'];
													$tot13_pr_all=$tot13_pr_all+$tot13_pr;
													
													$tot13=$tot13_lk+$tot13_pr;
													$tot13_all=$tot13_all+$tot13;
													$tot13_persen=round((($tot13/$tot_dukuh)*100),2);
													$tot13_persen_all=$tot13_persen_all+$tot13_persen;
// ----------------------------------------------------------------------------------------------------------			

													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='1' 
																	and (year(curdate())-year(tgl_lhr)>=65)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot14_lk=$tm_cari['tot'];
													$tot14_lk_all=$tot14_lk_all+$tot14_lk;
													
													$cari_kd=mysqli_query($koneksi,"select count(nik) as tot FROM tbpenduduk where kode='$kd_kel' 
																	and id_dukuh='$id_dukuh' and id_jk='2' 
																	and (year(curdate())-year(tgl_lhr)>=65)");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$tot14_pr=$tm_cari['tot'];
													$tot14_pr_all=$tot14_pr_all+$tot14_pr;
													
													$tot14=$tot14_lk+$tot14_pr;
													$tot14_all=$tot14_all+$tot14;
													$tot14_persen=round((($tot14/$tot_dukuh)*100),2);
													$tot14_persen_all=$tot14_persen_all+$tot14_persen;
// ----------------------------------------------------------------------------------------------------------			
								
?>
												<tbody>
													<tr>
														<td class="border text-center"><font size="2"><?php echo $no; ?></font></td>                  
														<td class="border"><font size="2"><?php echo $data['kode']; ?></font></td>             
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

														<td class="border text-center">
															<form action="penduduk_detail03_rinci.php" method="post">			
																<input type="hidden" name="txtid" value="<?php echo $data['kode']; ?>"/>															
																<button class="btn_style" name="btn1" id="btn1" type="submit">Detail</button>
															</form>														
														</td>              
													</tr>
													
												</tbody>
												<?php               
$no++;
													} 
												?>
													<tr>
														<td colspan="3" class="border" align="right"><font size="2">Jumlah Total&nbsp;</font></td>                  

														<td class="border text-center"><font size="2"><?php echo $tot1_lk_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot1_pr_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot1_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo round(($tot1_persen_all/$jml_data),2) ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot2_lk_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot2_pr_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot2_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo round(($tot2_persen_all/$jml_data),2) ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot3_lk_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot3_pr_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot3_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo round(($tot3_persen_all/$jml_data),2) ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot4_lk_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot4_pr_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot4_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo round(($tot4_persen_all/$jml_data),2) ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot5_lk_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot5_pr_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot5_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo round(($tot5_persen_all/$jml_data),2) ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot6_lk_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot6_pr_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot6_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo round(($tot6_persen_all/$jml_data),2) ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot7_lk_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot7_pr_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot7_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo round(($tot7_persen_all/$jml_data),2) ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot8_lk_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot8_pr_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot8_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo round(($tot8_persen_all/$jml_data),2) ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot9_lk_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot9_pr_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot9_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo round(($tot9_persen_all/$jml_data),2) ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot10_lk_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot10_pr_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot10_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo round(($tot10_persen_all/$jml_data),2) ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot11_lk_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot11_pr_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot11_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo round(($tot11_persen_all/$jml_data),2) ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot12_lk_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot12_pr_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot12_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo round(($tot12_persen_all/$jml_data),2) ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot13_lk_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot13_pr_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot13_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo round(($tot13_persen_all/$jml_data),2) ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot14_lk_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot14_pr_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot14_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo round(($tot14_persen_all/$jml_data),2) ?>%</font></td>

														<td class="border text-center"><font size="2"><?php echo $tot_dukuh_all ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $tot_dukuh_persen_all ?>%</font></td>
														<td class="border text-center">

														</td>

													</tr>
										</table> 
</div>        

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
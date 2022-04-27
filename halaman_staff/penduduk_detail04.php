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

	$id=$_POST['txtid'];
	$txtform=$_POST['txtform'];
	$cari_kd=mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal, 
									DATE_FORMAT(Menetap_tgl,'%d/%m/%Y') AS tanggal1 from tbpenduduk WHERE id='$id'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nik_ayah=$tm_cari['nik_ayah'];
	$nm_ayah=$tm_cari['nm_ayah'];
	$nik_ibu=$tm_cari['nik_ibu'];	
	$nm_ibu=$tm_cari['nm_ibu'];
	$nik_suami_istri=$tm_cari['nik_suami_istri'];
	$nm_suami_istri=$tm_cari['nm_suami_istri']; 
	$txtstatushub = $tm_cari['status_hub'];
	$txtket = $tm_cari['keterangan'];
	$nik=$tm_cari['nik'];
	
if(isset($_POST['submit11'])) {
		$id=$_POST['txtid'];
        $txtform=$_POST['txtform'];

		if($txtform=="1") {
                          header('location:penduduk_daftar01.php');
		}
		if($txtform=="2") {
  header('location:penduduk_daftar02.php');
		}
		if($txtform=="3") {
  header('location:penduduk_daftar03.php');
		}
		if($txtform=="4") {
  header('location:penduduk_daftar04.php');
		}
		if($txtform=="5") {
  header('location:penduduk_daftar05.php');
		}
		if($txtform=="6") {
  header('location:penduduk_daftar06.php');
		}
		if($txtform=="7") {
  header('location:penduduk_daftar07.php');
		}
		if($txtform=="8") {
  header('location:penduduk_daftar08.php');
		}
		if($txtform=="9") {
  header('location:penduduk_daftar09.php');
		}
		if($txtform=="10") {
 header('location:penduduk_daftar10.php');
		}
		if($txtform=="11") {
  header('location:penduduk_daftar11.php');
		}
		if($txtform=="12") {
  header('location:penduduk_daftar12.php');
		}
		if($txtform=="13") {
		header('location:penduduk_daftar13.php');
		}
		if($txtform=="14") {
     header('location:penduduk_daftar14.php');
		}
		if($txtform=="15") {
    header('location:penduduk_daftar15.php');
		}
	}
	
	
	
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
					<a href="#" class="breadcrumb--active">Detail Data Kependudukan - Data Keluarga</a> </div>
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
						<table class="table table--sm" width="100%"> 
							<tr> 
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="25%">
									<font color="white">Data Diri</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="25%">
									<font color="white">Informasi Menetap Mutasi</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="25%">
									<font color="white">Kepemilikan E-KTP dan Dokumen</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="white" width="25%">
									<font color="black">Data Keluarga</font>
								</td>
							</tr> 
						</table>
	
<!-- BEGIN: Official Store -->
<form class="form-horizontal" action="" method="post">
<input type="hidden" name="txtform" value="<?php echo $txtform; ?>"/>

                        <div class="col-span-12 xl:col-span-8 mt-6">

				<div class="intro-y block sm:flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Status Hubungan Keluarga
                                </h2>
                            	</div>
                            	<div class="intro-y box p-5 mt-12 sm:mt-5">
					<div class="mt-3">
						<input type="text" class="input pr-12 w-full border col-span-4" disabled value="<?php echo $txtstatushub; ?>" >
					</div>
                            	</div>
				<br>

                            <div class="intro-y block sm:flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Data Orang Tua
                                </h2>
                            </div>

                            <div class="intro-y box p-5 mt-12 sm:mt-5">
                                <div><b>Ayah</b></div>
								<div class="mt-3">
									<input type="text" class="input pr-12 w-full border col-span-4" id="txtnikayah" name="txtnikayah" 
									disabled value="<?php echo $nik_ayah; ?>">
								</div>
								<div class="mt-3">
									<input type="text" class="input pr-12 w-full border col-span-4" id="txtnmayah" name="txtnmayah" 
									disabled value="<?php echo $nm_ayah; ?>">
								</div>
								<br>
								<div><b>Ibu</b></div>
								<div class="mt-3">
									<input type="text" class="input pr-12 w-full border col-span-4" id="txtnikibu" name="txtnikibu" 
									disabled value="<?php echo $nik_ibu; ?>">
								</div>
								<div class="mt-3">
									<input type="text" class="input pr-12 w-full border col-span-4" id="txtnmibu" name="txtnmibu" 
									disabled value="<?php echo $nm_ibu; ?>">
								</div>
                            </div>
							<br>
                    <div class="intro-y col-span-12 lg:col-span-6">
                        <!-- BEGIN: Table Head Options -->
                        <div class="intro-y box">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                <h2 class="font-medium text-base mr-auto">
                                    Saudara
                                </h2>
                            </div>
                            <div class="p-5" id="head-options-table">
                                <div class="preview">
                                    <div class="overflow-x-auto">
                                        <table class="table">
                                            <thead>
                                                <tr class="bg-gray-700 text-white">
                                                    <th class="whitespace-no-wrap">No</th>
                                                    <th class="whitespace-no-wrap">NIK</th>
                                                    <th class="whitespace-no-wrap">Nama</th>
                                                </tr>
                                            </thead>
                                            <tbody>
												<?php 
													$no = 0 ;
													$sql = mysqli_query($koneksi,"SELECT nik_saudara, nm_saudara FROM tbpenduduk_saudara where nik='$nik'");
													while ($tampil = mysqli_fetch_array($sql)) {
														$no++;
												?>
                                                <tr>
                                                    <td class="border-b"><?php echo $no ?></td>
                                                    <td class="border-b"><?php echo $tampil['nik_saudara']?></td>
                                                    <td class="border-b"><?php echo $tampil['nm_saudara']?></td>
                                                </tr>
												<?php 
													}
												?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

							<br>
							<div class="intro-y block sm:flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Suami/Istri
                                </h2>
                            </div>
                            <div class="intro-y box p-5 mt-12 sm:mt-5">
								<div class="mt-3">
									<input type="text" class="input pr-12 w-full border col-span-4" id="txtniksuami" name="txtniksuami" 
									disabled value="<?php echo $nik_suami_istri; ?>">
								</div>
								<div class="mt-3">
									<input type="text" class="input pr-12 w-full border col-span-4" id="txtnmsuami" name="txtnmsuami" 
									disabled value="<?php echo $nm_suami_istri; ?>">
								</div>
                            </div>
							<br>

                    <div class="intro-y col-span-12 lg:col-span-6">
                        <!-- BEGIN: Table Head Options -->
                        <div class="intro-y box">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                <h2 class="font-medium text-base mr-auto">
                                    Anak
                                </h2>
                            </div>
                            <div class="p-5" id="head-options-table">
                                <div class="preview">
                                    <div class="overflow-x-auto">
                                        <table class="table">
                                            <thead>
                                                <tr class="bg-gray-700 text-white">
                                                    <th class="whitespace-no-wrap">No</th>
                                                    <th class="whitespace-no-wrap">NIK</th>
                                                    <th class="whitespace-no-wrap">Nama</th>
                                                </tr>
                                            </thead>
                                            <tbody>
												<?php 
													$no = 0 ;
													$sql = mysqli_query($koneksi,"SELECT nik_anak, nm_anak FROM tbpenduduk_anak where nik='$nik'");
													while ($tampil = mysqli_fetch_array($sql)) {
														$no++;
												?>
                                                <tr>
                                                    <td class="border-b"><?php echo $no ?></td>
                                                    <td class="border-b"><?php echo $tampil['nik_anak']?></td>
                                                    <td class="border-b"><?php echo $tampil['nm_anak']?></td>
                                                </tr>
												<?php 
													}
												?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- END: Official Store -->
						
                    </div>

							<br>
														<div class="intro-y block sm:flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Keterangan
                                </h2>
                            </div>
                            <div class="intro-y box p-5 mt-12 sm:mt-5">
								<div class="mt-3">
									<input type="text" class="input pr-12 w-full border col-span-4" disabled value="<?php echo $txtket; ?>">
								</div>
                            </div>
                </div>
				
				
				
			<table class="table table--sm" width="100%">
					<tr>
						<td class="border text-center whitespace-no-wrap">
							<button type="submit" id="submit11" name="submit11" class="button bg-theme-1 text-white mt-5">
							&nbsp;&nbsp;&nbsp;Selesai&nbsp;&nbsp;&nbsp;
							</button>
						</td>
					</tr>
				</table>
				
				
				
				
				
            </div>
</form>
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

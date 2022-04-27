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
	
	$tgl_skr=date('d/m/Y');
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kel=$tm_cari['nama'];
	
	$cari_kd=mysqli_query($koneksi,"SELECT *, 
					left(kode,2) as kd_prop, left(kode,5) as kd_kab,
					left(kode,8) as kd_kec 
					FROM tbprofil where kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);	
	$kd_prop=$tm_cari['kd_prop'];
	$kd_kab=$tm_cari['kd_kab'];
	$kd_kec=$tm_cari['kd_kec'];
	
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

<?php include "menu_profil12.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> 
					<i data-feather="chevron-right" class="breadcrumb__icon"></i> 
					<a href="#" class="breadcrumb--active">Input Validasi Desa</a> </div>
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
								<td class="border text-center whitespace-no-wrap" bgcolor="white" width="50%">
									<font color="black">Validasi Desa</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="50%">
									<font color="white">Data RT/RW</font>
								</td>
							</tr> 
						</table>
						
<form class="form-horizontal" enctype="multipart/form-data" action="validasi_desa1.php" method="post">
                        <div class="intro-y box">
                            <div class="p-5" id="input">
							
                                <div class="preview">
										<div class="mt-3">
											<label><b>Upload Logo Daerah</b></label>
											<input type="file" id="gambar" name="gambar" class="input w-full border mt-2" />
											<label>*Tipe File PNG,JPEG, Ukuran Maksimum 15Mb</label>
										</div>
										<div class="mt-3">
											<div class="relative mt-2">
												<select class="input pr-12 w-full border col-span-4" name="cboprop" id="cboprop" disabled>
													<?php
														$q = mysqli_query($koneksi,"SELECT kode, nama FROM wilayah_2020 WHERE length(kode)='2'");
														while ($row1 = mysqli_fetch_array($q)){
															$k_id           = $row1['kode'];
															$k_opis         = $row1['nama'];
													?>
													<option value='<?php echo $k_id; ?>' <?php if ($k_id == $kd_prop){ echo 'selected'; } ?>><?php echo $k_opis; ?></option>
													<?php
														}
													?>
												</select>
											</div>
										</div>
										<div class="mt-3">
											<div class="relative mt-2">
												<select class="input pr-12 w-full border col-span-4" name="cbokab" id="cbokab" disabled>
													<?php
														$q = mysqli_query($koneksi,"SELECT kode, nama FROM wilayah_2020 WHERE length(kode)='5' and left(kode,2)='$kd_prop'");
														while ($row1 = mysqli_fetch_array($q)){
															$k_id           = $row1['kode'];
															$k_opis         = $row1['nama'];
													?>
													<option value='<?php echo $k_id; ?>' <?php if ($k_id == $kd_kab){ echo 'selected'; } ?>><?php echo $k_opis; ?></option>
													<?php
														}
													?>
												</select>
											</div>
										</div>
										<div class="mt-3">
											<div class="relative mt-2">
												<select class="input pr-12 w-full border col-span-4" name="cbokec" id="cbokec" disabled>
													<?php
														$q = mysqli_query($koneksi,"SELECT kode, nama FROM wilayah_2020 WHERE length(kode)='8' and left(kode,2)='$kd_prop' and left(kode,5)='$kd_kab'");
														while ($row1 = mysqli_fetch_array($q)){
															$k_id           = $row1['kode'];
															$k_opis         = $row1['nama'];
													?>
													<option value='<?php echo $k_id; ?>' <?php if ($k_id == $kd_kec){ echo 'selected'; } ?>><?php echo $k_opis; ?></option>
													<?php
														}
													?>
												</select>
											</div>
										</div>
										<div class="mt-3">
											<div class="relative mt-2">
												<select class="input pr-12 w-full border col-span-4" name="cbokel" id="cbokel" disabled>
													<?php
														$q = mysqli_query($koneksi,"SELECT kode, nama FROM wilayah_2020 WHERE length(kode)='13' and left(kode,2)='$kd_prop' and left(kode,5)='$kd_kab' and left(kode,8)='$kd_kec'");
														while ($row1 = mysqli_fetch_array($q)){
															$k_id           = $row1['kode'];
															$k_opis         = $row1['nama'];
													?>
													<option value='<?php echo $k_id; ?>' <?php if ($k_id == $kd_kel){ echo 'selected'; } ?>><?php echo $k_opis; ?></option>
													<?php
														}
													?>
												</select>
											</div>
										</div>
										<div class="mt-3">
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" 
													id="txtdukuh" name="txtdukuh" autocomplete="off" placeholder="Nama Dukuh/Dusun">														
												</div>
												<div class="relative mt-2">
													<button type="submit" id="btnadddukuh" name="btnadddukuh" class="button bg-theme-1 text-white mt-5">
													&nbsp;Tambah Dukuh/Dusun&nbsp;   
													</button>
												</div>
											</div>
										</div>
										<div class="mt-3">
											<div class="relative mt-2">
												<table class="table table--sm" width="100%"> 
													<?php 
														$query = mysqli_query($koneksi,"SELECT * FROM tbdukuh where kode='$kd_kel'")or die(mysql_error);
														while ($data = mysqli_fetch_assoc($query)) {	
													?>
													<tbody>
														<tr>
															<td class="border"><?php echo $data['nm_dukuh']; ?></td>                  
														</tr>
													</tbody>
													<?php               
														} 
													?>
												</table>
											</div>
										</div>										
								</div>
								
								
                            </div>
                        </div>
                    </div>
                </div>
				
				<table class="table table--sm" width="100%"> 
					<tr> 
						<td class="border text-center whitespace-no-wrap">
							<button type="submit" id="submit1" name="submit1" class="button bg-theme-1 text-white mt-5">
							&nbsp;&nbsp;&nbsp;Selanjutnya&nbsp;&nbsp;&nbsp;   
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
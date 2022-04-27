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

	$varsearch = $_GET['varsearch'];
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

<?php include "menu_profil10.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> 
					<i data-feather="chevron-right" class="breadcrumb__icon"></i> 
					<a href="#" class="">Profil Desa</a>
					<i data-feather="chevron-right" class="breadcrumb__icon"></i>
					<a href="perangkat.php" class="breadcrumb--active">Perangkat Desa</a> </div>
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


										<table class="table table--sm" width="100%"> 
											<thead> 
												<tr> 
													<th class="border-b-2 whitespace-no-wrap">NAP</th>
													<th class="border-b-2 whitespace-no-wrap">NIP</th>
													<th class="border-b-2 whitespace-no-wrap">Nama Lengkap</th>
													<th class="border-b-2 text-center whitespace-no-wrap">Jabatan</th>
													<th class="border-b-2 text-center whitespace-no-wrap">Detail</th>
													<th class="border-b-2 text-center whitespace-no-wrap">Aksi</th>
												</tr> 
											</thead>  

											<?php 
												$halaman = 10;
												$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
												$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;


														$result = mysqli_query($koneksi,"SELECT * FROM tbperangkat WHERE kode='$kd_kel' and 
																						nama like '%$varsearch%'");


												$total = mysqli_num_rows($result);
												$pages = ceil($total/$halaman);            


														$query = mysqli_query($koneksi,"SELECT * FROM tbperangkat WHERE kode='$kd_kel'  and 
																						nama like '%$varsearch%'  
																						LIMIT $mulai, $halaman")or die(mysql_error);												

												$no =$mulai+1;
												while ($data = mysqli_fetch_assoc($query)) {
													
													$id_jabatan=$data['id_jabatan'];
													$cari_kd=mysqli_query($koneksi,"SELECT jabatan FROM tbjabatan_perangkat WHERE kode='$id_jabatan'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jabatan=$tm_cari['jabatan'];
											?>
												<tbody>
													<tr>
														<td class="border-b"><?php echo $data['nap']?></td>
														<td class="border-b"><?php echo $data['nip']?></td>
														<td class="border-b"><?php echo $data['nama']?></td>
														<td class="border-b text-center"><?php echo $jabatan;?></td>
														<td class="border-b text-center">
															<form action="perangkat_detail.php" method="post">			
																<input type="hidden" name="txtid" value="<?php echo $data['id']; ?>"/>															
																<button class="btn_style" type="submit">Detail</button>
															</form>
														</td>
														<td class="border-b text-center">
															<div class="flex sm:justify-center items-center">
																<a class="flex items-center mr-3" href="perangkat_edit.php?kd=<?php echo $data['id']?>"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
																<a class="flex items-center text-theme-6" href="perangkat_del.php?kd=<?php echo $data['id']?>" onclick="return confirm('Data akan dihapus. Lanjutkan?')"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
														</td>
													</tr>
												</tbody>
												<?php               
													} 
												?>
										</table>          
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
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

	$id=$_POST['txtidmodul'];
	$cari_kd=mysqli_query($koneksi,"SELECT nama_paket, deskripsi, waktu FROM tbmodul_ass WHERE id_modul='$id'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nama_paket=$tm_cari['nama_paket'];
	$deskripsi=$tm_cari['deskripsi'];
	$waktu=$tm_cari['waktu'];
	
	$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbsoal WHERE id_modul='$id'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_soal=$tm_cari['tot'];
	$no_soal=$jml_soal+1;	
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

<?php include "menu_ass01.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="soal.php?id=<?php echo $id; ?>" class="breadcrumb--active">Assesment</a> </div>
                    <!-- END: Breadcrumb -->

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

		    <div class="intro-y flex items-center mt-8">
		        <h2 class="text-lg font-medium mr-auto">
		            Assesment Detail - <?php echo $nama_paket; ?>
		        </h2>
		    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN : Card Soal -->


        	<div class="intro-y col-span-12 lg:col-span-8">
					
					<form action="soal_add_save.php" method="post">
					<input type="hidden" name="txtidmodul" value="<?php echo $id; ?>"/>
                    <div class="box">
                        <div class="flex p-5 lg:p-10 mb-10">
                            <div class="w-full">
                                <label class="text-lg font-medium">Pertanyaan No <?php echo $no_soal; ?></label><br>
								<textarea class="input w-full border mt-2" id="txtsoal" name="txtsoal" rows="3" required></textarea>
                            
	                            <div class="intro-y flex justify-between items-center my-2">
	                                <span>A</span>&nbsp;&nbsp;&nbsp;
									<textarea class="input w-full border mt-2" id="txtjwba" name="txtjwba" style="overflow:auto" rows="1" required></textarea>									
	                                &nbsp;&nbsp;&nbsp;
									<span class="flex items-center">
										<input type="radio" class="input border mr-2" id="jwb_a" name="jwb" value="A" required >
	                                </span>
	                            </div>
	                            <div class="intro-y flex justify-between items-center my-2">
	                                <span>B</span>&nbsp;&nbsp;&nbsp;
									<textarea class="input w-full border mt-2" id="txtjwbb" name="txtjwbb" style="overflow:auto" rows="1" required></textarea>									
	                                &nbsp;&nbsp;&nbsp;
									<span class="flex items-center">
										<input type="radio" class="input border mr-2" id="jwb_b" name="jwb" value="B" required >
	                                </span>
	                            </div>
	                            <div class="intro-y flex justify-between items-center my-2">
	                                <span>C</span>&nbsp;&nbsp;&nbsp;
									<textarea class="input w-full border mt-2" id="txtjwbc" name="txtjwbc" style="overflow:auto" rows="1" required></textarea>
	                                &nbsp;&nbsp;&nbsp;
									<span class="flex items-center">
										<input type="radio" class="input border mr-2" id="jwb_c" name="jwb" value="C" required >
	                                </span>
	                            </div>
	                            <div class="intro-y flex justify-between items-center my-2">
	                                <span>D</span>&nbsp;&nbsp;&nbsp;
									<textarea class="input w-full border mt-2" id="txtjwbd" name="txtjwbd" style="overflow:auto" rows="1" required></textarea>									
	                                &nbsp;&nbsp;&nbsp;
									<span class="flex items-center">
										<input type="radio" class="input border mr-2" id="jwb_d" name="jwb" value="D" required >
	                                </span>
	                            </div>
	                            <div class="intro-y flex justify-between items-center my-2">
	                                <span>E</span>&nbsp;&nbsp;&nbsp;
									<textarea class="input w-full border mt-2" id="txtjwbe" name="txtjwbe" style="overflow:auto" rows="1" required></textarea>									
	                                &nbsp;&nbsp;&nbsp;
									<span class="flex items-center">
										<input type="radio" class="input border mr-2" id="jwb_e" name="jwb" value="E" required >
	                                </span>
	                            </div>
								
                                <div class="intro-y relative mb-10">
                                    <button type="submit" class="button absolute mt-1 lg:mt-3 top-0 right-0 border border-theme-1 text-theme-1 dark:border-theme-10 dark:text-theme-10 w-auto">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
					</form>
			</div>
        <!-- END : Card Soal -->
    </div>	

            </div>
            <!-- END: Content -->
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="dist/js/app.js"></script>
		<script src="assets/js/highcharts.js"></script>
<script src="assets/js/jquery-1.10.1.min.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>

<?php
	}
?>
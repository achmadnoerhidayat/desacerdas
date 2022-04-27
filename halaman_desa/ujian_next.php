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

	$id_modul=$_GET['idmodul'];

	$cari_kd=mysqli_query($koneksi,"SELECT nama_paket, deskripsi, waktu FROM tbmodul_ass WHERE id_modul='$id_modul'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nama_paket=$tm_cari['nama_paket'];										
	$deskripsi=$tm_cari['deskripsi'];										
	$waktu=$tm_cari['waktu'];											
	
	$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbsoal WHERE id_modul='$id_modul'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_soal=$tm_cari['tot'];				

	$modal=mysqli_query($koneksi,"Delete FROM tbsoal_tmp WHERE id_modul='$id_modul'");	
	$modal=mysqli_query($koneksi,"Delete FROM tbsoal_jawaban WHERE id_modul='$id_modul'");	
	
	$no = 0 ;
	$sql = mysqli_query($koneksi,"SELECT id, nama_soal FROM tbsoal where id_modul='$id_modul' order by id asc");
	while ($tampil = mysqli_fetch_array($sql)) {
		$no++;
		$id_soal=$tampil['id'];
		$nama_soal=$tampil['nama_soal'];

		mysqli_query($koneksi,"INSERT INTO tbsoal_tmp 
								(id_modul, id_soal, no_soal, nama_soal) 
								VALUES 
								('$id_modul','$id_soal','$no','$nama_soal')");

		mysqli_query($koneksi,"INSERT INTO tbsoal_jawaban 
								(id_modul, id_soal, no_soal) 
								VALUES 
								('$id_modul','$id_soal','$no')");
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

<?php include "menu_ujian.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="index.php" class="breadcrumb--active">Assesment</a> </div>
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
        <h2 class="text-lg font-medium mr-auto">Detail Ujian / Sertifikasi</h2>
        <div id="countDown" class="text-sm button border border-theme-1 text-theme-1 ml-auto cursor-default">

        </div>
    </div>
    <div id="box-preview" class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN : Card Soal -->
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box">
                <div class="flex flex-col pt-5 px-5 pb-3 lg:pt-5 lg:px-10 lg:pb-5 border-b">
                    <h1 class="text-4xl font-bold"><?php echo $nama_paket; ?></h1>
                    <p class="text-sm mt-2"><?php echo $deskripsi; ?></p>
                </div>
                <div class="flex flex-col pt-3 px-5 pb-3 lg:pt-0 lg:px-5 lg:pb-5 border-b">
                    <div class="overflow-x-auto">
                        <table class="table mt-5">
                            <tbody>
                                <tr>
                                    <td class="w-1/2">Waktu</td>
                                    <td class="text-left">:</td>
                                    <td class="w-1/2"><?php echo $waktu; ?> Menit</td>
                                </tr>
                                <tr>
                                    <td class="w-1/2">Jumlah</td>
                                    <td class="text-left">:</td>
                                    <td class="w-1/2"><?php echo $jml_soal; ?> Soal</td>
                                </tr>
                            <tbody>
                        </table>
                    </div>
                </div>
                <div class="flex flex-col pt-3 px-5 pb-5 lg:pt-5 lg:px-10 lg:pb-5 justify-end">
                    <a href="ujian_mulai.php?idmodul=<?php echo $id_modul; ?>&nosoal=1" class="button mr-1 mb-2 py-5 bg-theme-1 text-white hover:text-gray-300 hover:opacity-90">
                        Mulai Mengerjakan
                    </a>
                    <a href="ujian.php" class="button mr-1 mb-2 border border-theme-6 text-theme-6">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
        <!-- END : Card Soal -->
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
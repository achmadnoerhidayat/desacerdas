<?php
	session_start();
	if($_SESSION['nip']==''){
		header("location:../index.php");
	} else {
		$kd_kel=$_SESSION['kodewil'];
		$nip=$_SESSION['nip'];
		$nm_user=$_SESSION['nm_user'];
		
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('d m Y H:i:s');
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

	$id_ujian=$_GET['id'];
	$cari_kd=mysqli_query($koneksi,"SELECT *, DATE_FORMAT(tgl_ujian,'%d %M %Y') AS tanggal1 FROM vw_ujian WHERE id_ujian='$id_ujian'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nama_paket=$tm_cari['nama_paket'];
	$tanggal=$tm_cari['tanggal'];
	$tanggal1=$tm_cari['tanggal1'];	
	$nilai=$tm_cari['nilai'];
	$jbenar=$tm_cari['j_benar'];
	$jsalah=$tm_cari['j_salah'];
	$jkosong=$tm_cari['j_kosong'];
	$status=$tm_cari['status'];
	if($status=='Lulus') {
		$warna="text-theme-9";
	} else {
		$warna="text-theme-6";
	}
	
	$jml_soal=$jbenar+$jsalah+$jkosong;	
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
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="tabel_score.php" class="breadcrumb--active">Assestment Score</a> </div>
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
        <h2 class="text-lg font-medium mr-auto">Hasil Ujian / Sertifikasi</h2>
        <div class="text-sm button cursor-default">
            Waktu : <?php echo $tgl_skr; ?>
        </div>
    </div>

    <div id="box-preview" class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN : Card Soal -->
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="intro-y box">
                <div class="flex pt-5 px-5 pb-3 lg:pt-5 lg:px-10 lg:pb-5 text-center items-center">
                    <div class="w-1/2">
                        <div class="uppercase mb-5">Paket Soal</div>
                        <h1 class="text-6xl font-bold">
                            <?php echo $nama_paket; ?>
                        </h1>
                    </div>
                    <div class="border-l w-1/2">
                        <div class="my-2">
                            <div class="my-2 uppercase">Tanggal Ujian / Sertifikasi</div>
                            <h1 class="text-4xl font-bold">
                                <?php echo $tanggal1; ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y box mt-5">
                <div class="flex pt-5 px-5 pb-3 lg:pt-5 lg:px-10 lg:pb-5 text-center items-center">
                    <div class="w-1/3">
                        <div class="uppercase mb-5">Skor Akhir</div>
                        <h1 class="text-6xl font-bold <?php echo $warna; ?>">
                            <?php echo $nilai; ?>
                        </h1>
                    </div>
                    <div class="border-r border-l w-1/3">
                        <div class="my-2">
                            <div class="my-2 uppercase">Jawaban Benar</div>
                            <h1 class="text-4xl font-bold">
                                <?php echo $jbenar; ?>
                            </h1>
                        </div>
                        <div class="my-2">
                            <div class="my-2 uppercase">Jawaban Salah</div>
                            <h1 class="text-4xl font-bold">
                                <?php echo $jsalah; ?>
                            </h1>
                        </div>
                    </div>
                    <div class="w-1/3">
                        <div class="my-2">
                            <div class="my-2 uppercase">Tidak Terjawab</div>
                            <h1 class="text-4xl font-bold">
                                <?php echo $jkosong; ?>
                            </h1>
                        </div>
                        <div class="my-2">
                            <div class="my-2 uppercase">Jumlah Soal</div>
                            <h1 class="text-4xl font-bold">
                                <?php echo $jml_soal; ?>
                            </h1>
                        </div>
                    </div>
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
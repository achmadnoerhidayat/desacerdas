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
					<a href="#" class="">Kependudukan</a>
					<i data-feather="chevron-right" class="breadcrumb__icon"></i>
					<a href="#" class="breadcrumb--active">Data Kependudukan Keseluruhan</a> </div>
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

                    <div class="intro-y col-span-12 lg:col-span-4">
                        <!-- BEGIN: Table Row States -->
                        <div class="intro-y box mt-5">
                            <div class="p-5" id="row-states-table">
                                <div class="preview">
                                    <div class="overflow-x-auto">
                                        <table class="table">
                                            <tbody>
                                                <tr class="bg-theme-1 text-white">
                                                    <td class="border text-center">Data Kependudukan<br>Keseluruhan</td>
                                                </tr>
                                                <tr class="">
                                                    <td class="border text-center">
													<a href="penduduk_daftar01.php">Lihat Selengkapnya &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>></a>
													</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Table Row States -->
                    </div>

                    <div class="intro-y col-span-12 lg:col-span-4">
                        <!-- BEGIN: Table Row States -->
                        <div class="intro-y box mt-5">
                            <div class="p-5" id="row-states-table">
                                <div class="preview">
                                    <div class="overflow-x-auto">
                                        <table class="table">
                                            <tbody>
                                                <tr class="bg-theme-1 text-white">
                                                    <td class="border text-center">Data Kependudukan<br>KK dan AK</td>
                                                </tr>
                                                <tr class="">
                                                    <td class="border text-center">
													<a href="penduduk_daftar02.php">Lihat Selengkapnya &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>></a>
													</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Table Row States -->
                    </div>

                    <div class="intro-y col-span-12 lg:col-span-4">
                        <!-- BEGIN: Table Row States -->
                        <div class="intro-y box mt-5">
                            <div class="p-5" id="row-states-table">
                                <div class="preview">
                                    <div class="overflow-x-auto">
                                        <table class="table">
                                            <tbody>
                                                <tr class="bg-theme-1 text-white">
                                                    <td class="border text-center">Data Kependudukan<br>Kelompok Usia</td>
                                                </tr>
                                                <tr class="">
                                                    <td class="border text-center">
													<a href="penduduk_daftar03.php">Lihat Selengkapnya &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>></a>
													</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Table Row States -->
                    </div>

                    <div class="intro-y col-span-12 lg:col-span-4">
                        <!-- BEGIN: Table Row States -->
                        <div class="intro-y box mt-5">
                            <div class="p-5" id="row-states-table">
                                <div class="preview">
                                    <div class="overflow-x-auto">
                                        <table class="table">
                                            <tbody>
                                                <tr class="bg-theme-1 text-white">
                                                    <td class="border text-center">Data Kependudukan<br>Agama</td>
                                                </tr>
                                                    <td class="border text-center">
													<a href="penduduk_daftar04.php">Lihat Selengkapnya &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>></a>
													</td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Table Row States -->
                    </div>

                    <div class="intro-y col-span-12 lg:col-span-4">
                        <!-- BEGIN: Table Row States -->
                        <div class="intro-y box mt-5">
                            <div class="p-5" id="row-states-table">
                                <div class="preview">
                                    <div class="overflow-x-auto">
                                        <table class="table">
                                            <tbody>
                                                <tr class="bg-theme-1 text-white">
                                                    <td class="border text-center">Data Kependudukan<br>Pekerjaan</td>
                                                </tr>
                                                    <td class="border text-center">
													<a href="penduduk_daftar05.php">Lihat Selengkapnya &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>></a>
													</td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Table Row States -->
                    </div>

                    <div class="intro-y col-span-12 lg:col-span-4">
                        <!-- BEGIN: Table Row States -->
                        <div class="intro-y box mt-5">
                            <div class="p-5" id="row-states-table">
                                <div class="preview">
                                    <div class="overflow-x-auto">
                                        <table class="table">
                                            <tbody>
                                                <tr class="bg-theme-1 text-white">
                                                    <td class="border text-center">Biodata Penduduk<br>&nbsp;</td>
                                                </tr>
                                                    <td class="border text-center">
													<a href="penduduk_daftar06.php">Lihat Selengkapnya &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>></a>
													</td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Table Row States -->
                    </div>

                    <div class="intro-y col-span-12 lg:col-span-4">
                        <!-- BEGIN: Table Row States -->
                        <div class="intro-y box mt-5">
                            <div class="p-5" id="row-states-table">
                                <div class="preview">
                                    <div class="overflow-x-auto">
                                        <table class="table">
                                            <tbody>
                                                <tr class="bg-theme-1 text-white">
                                                    <td class="border text-center">Data Induk Penduduk<br>&nbsp;</td>
                                                </tr>
                                                    <td class="border text-center">
													<a href="penduduk_daftar07.php">Lihat Selengkapnya &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>></a>
													</td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Table Row States -->
                    </div>

                    <div class="intro-y col-span-12 lg:col-span-4">
                        <!-- BEGIN: Table Row States -->
                        <div class="intro-y box mt-5">
                            <div class="p-5" id="row-states-table">
                                <div class="preview">
                                    <div class="overflow-x-auto">
                                        <table class="table">
                                            <tbody>
                                                <tr class="bg-theme-1 text-white">
                                                    <td class="border text-center">Data Mutasi<br>&nbsp;</td>
                                                </tr>
                                                    <td class="border text-center">
													<a href="penduduk_daftar08.php">Lihat Selengkapnya &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>></a>
													</td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Table Row States -->
                    </div>

                    <div class="intro-y col-span-12 lg:col-span-4">
                        <!-- BEGIN: Table Row States -->
                        <div class="intro-y box mt-5">
                            <div class="p-5" id="row-states-table">
                                <div class="preview">
                                    <div class="overflow-x-auto">
                                        <table class="table">
                                            <tbody>
                                                <tr class="bg-theme-1 text-white">
                                                    <td class="border text-center">Data KTP dan KK<br>&nbsp;</td>
                                                </tr>
                                                    <td class="border text-center">
													<a href="penduduk_daftar09.php">Lihat Selengkapnya &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>></a>
													</td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Table Row States -->
                    </div>

                    <div class="intro-y col-span-12 lg:col-span-4">
                        <!-- BEGIN: Table Row States -->
                        <div class="intro-y box mt-5">
                            <div class="p-5" id="row-states-table">
                                <div class="preview">
                                    <div class="overflow-x-auto">
                                        <table class="table">
                                            <tbody>
                                                <tr class="bg-theme-1 text-white">
                                                    <td class="border text-center">Rekapitulasi Jumlah <br>Penduduk</td>
                                                </tr>
                                                    <td class="border text-center">
													<a href="penduduk_daftar10.php">Lihat Selengkapnya &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>></a>
													</td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Table Row States -->
                    </div>

                    <div class="intro-y col-span-12 lg:col-span-4">
                        <!-- BEGIN: Table Row States -->
                        <div class="intro-y box mt-5">
                            <div class="p-5" id="row-states-table">
                                <div class="preview">
                                    <div class="overflow-x-auto">
                                        <table class="table">
                                            <tbody>
                                                <tr class="bg-theme-1 text-white">
                                                    <td class="border text-center">Laporan Dusun <br>&nbsp;</td>
                                                </tr>
                                                    <td class="border text-center">
													<a href="penduduk_daftar11.php">Lihat Selengkapnya &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>></a>
													</td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Table Row States -->
                    </div>

                    <div class="intro-y col-span-12 lg:col-span-4">
                        <!-- BEGIN: Table Row States -->
                        <div class="intro-y box mt-5">
                            <div class="p-5" id="row-states-table">
                                <div class="preview">
                                    <div class="overflow-x-auto">
                                        <table class="table">
                                            <tbody>
                                                <tr class="bg-theme-1 text-white">
                                                    <td class="border text-center">Laporan RT <br>&nbsp;</td>
                                                </tr>
                                                    <td class="border text-center">
													<a href="penduduk_daftar12.php">Lihat Selengkapnya &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>></a>
													</td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Table Row States -->
                    </div>

                    <div class="intro-y col-span-12 lg:col-span-4">
                        <!-- BEGIN: Table Row States -->
                        <div class="intro-y box mt-5">
                            <div class="p-5" id="row-states-table">
                                <div class="preview">
                                    <div class="overflow-x-auto">
                                        <table class="table">
                                            <tbody>
                                                <tr class="bg-theme-1 text-white">
                                                    <td class="border text-center">Administrasi Pemilu <br>&nbsp;</td>
                                                </tr>
                                                    <td class="border text-center">
													<a href="penduduk_daftar13.php">Lihat Selengkapnya &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>></a>
													</td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Table Row States -->
                    </div>

                    <div class="intro-y col-span-12 lg:col-span-4">
                        <!-- BEGIN: Table Row States -->
                        <div class="intro-y box mt-5">
                            <div class="p-5" id="row-states-table">
                                <div class="preview">
                                    <div class="overflow-x-auto">
                                        <table class="table">
                                            <tbody>
                                                <tr class="bg-theme-1 text-white">
                                                    <td class="border text-center">Data Penduduk Sementara<br>&nbsp;</td>
                                                </tr>
                                                    <td class="border text-center">
													<a href="penduduk_daftar14.php">Lihat Selengkapnya &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>></a>
													</td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Table Row States -->
                    </div>

                    <div class="intro-y col-span-12 lg:col-span-4">
                        <!-- BEGIN: Table Row States -->
                        <div class="intro-y box mt-5">
                            <div class="p-5" id="row-states-table">
                                <div class="preview">
                                    <div class="overflow-x-auto">
                                        <table class="table">
                                            <tbody>
                                                <tr class="bg-theme-1 text-white">
                                                    <td class="border text-center">Laporan Kematian<br>&nbsp;</td>
                                                </tr>
                                                    <td class="border text-center">
													<a href="penduduk_daftar15.php">Lihat Selengkapnya &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>></a>
													</td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Table Row States -->
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
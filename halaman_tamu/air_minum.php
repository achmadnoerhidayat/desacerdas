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

	$cari_kd=mysqli_query($koneksi,"SELECT 
									jml_pelanggan1, jml_pelanggan2, jml_pelanggan3, jml_pelanggan4, jml_pelanggan5, jml_pelanggan6, 
									air1, air2, air3, air4, air5, air6, 
									nilai1, nilai2, nilai3, nilai4, nilai5, nilai6, 
									kapasitas_produksi, kapasitas_produksi_efektif, 
									produksi1, produksi2, produksi3, produksi4, produksi5, produksi6, 
									sumber 
									FROM tbairminum where kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	
	
	$txtjml1=$tm_cari['jml_pelanggan1'];
	$txtjml2=$tm_cari['jml_pelanggan2'];
	$txtjml3=$tm_cari['jml_pelanggan3'];
	$txtjml4=$tm_cari['jml_pelanggan4'];
	$txtjml5=$tm_cari['jml_pelanggan5'];
	$txtjml6=$tm_cari['jml_pelanggan6'];
	
	$txtair1=$tm_cari['air1'];	
	$txtair2=$tm_cari['air2'];
	$txtair3=$tm_cari['air3'];
	$txtair4=$tm_cari['air4'];
	$txtair5=$tm_cari['air5'];	
	$txtair6=$tm_cari['air6'];
	
	$txtnilai1=$tm_cari['nilai1'];
	$txtnilai2=$tm_cari['nilai2'];
	$txtnilai3=$tm_cari['nilai3'];
	$txtnilai4=$tm_cari['nilai4'];
	$txtnilai5=$tm_cari['nilai5'];
	$txtnilai6=$tm_cari['nilai6'];
	
	$txtkapasitas1=$tm_cari['kapasitas_produksi'];
	$txtkapasitas2=$tm_cari['kapasitas_produksi_efektif'];
	
	$txtsumber1=$tm_cari['produksi1'];
	$txtsumber2=$tm_cari['produksi2'];
	$txtsumber3=$tm_cari['produksi3'];
	$txtsumber4=$tm_cari['produksi4'];
	$txtsumber5=$tm_cari['produksi5'];
	$txtsumber6=$tm_cari['produksi6'];
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
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="" class="flex mr-auto">
                    <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="dist/images/logo.svg">
                </a>
                <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <ul class="border-t border-theme-24 py-5 hidden">
                <li>
                    <a href="index.html" class="menu">
                        <div class="menu__icon"> <i data-feather="home"></i> </div>
                        <div class="menu__title"> Dashboard </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="box"></i> </div>
                        <div class="menu__title"> Menu Layout <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="index.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Side Menu </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dashboard.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Simple Menu </div>
                            </a>
                        </li>
                        <li>
                            <a href="top-menu-dashboard.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Top Menu </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="side-menu-inbox.html" class="menu">
                        <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                        <div class="menu__title"> Inbox </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-file-manager.html" class="menu">
                        <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
                        <div class="menu__title"> File Manager </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-point-of-sale.html" class="menu">
                        <div class="menu__icon"> <i data-feather="credit-card"></i> </div>
                        <div class="menu__title"> Point of Sale </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-chat.html" class="menu">
                        <div class="menu__icon"> <i data-feather="message-square"></i> </div>
                        <div class="menu__title"> Chat </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-post.html" class="menu">
                        <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                        <div class="menu__title"> Post </div>
                    </a>
                </li>
                <li class="menu__devider my-6"></li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="edit"></i> </div>
                        <div class="menu__title"> Crud <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-crud-data-list.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Data List </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-crud-form.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Form </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="users"></i> </div>
                        <div class="menu__title"> Users <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-users-layout-1.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Layout 1 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-users-layout-2.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Layout 2 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-users-layout-3.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Layout 3 </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="trello"></i> </div>
                        <div class="menu__title"> Profile <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-profile-overview-1.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Overview 1 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-profile-overview-2.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Overview 2 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-profile-overview-3.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Overview 3 </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="layout"></i> </div>
                        <div class="menu__title"> Pages <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Wizards <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-wizard-layout-1.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-wizard-layout-2.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 2</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-wizard-layout-3.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 3</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Blog <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-blog-layout-1.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-blog-layout-2.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 2</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-blog-layout-3.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 3</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Pricing <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-pricing-layout-1.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-pricing-layout-2.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 2</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Invoice <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-invoice-layout-1.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-invoice-layout-2.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 2</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> FAQ <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-faq-layout-1.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-faq-layout-2.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 2</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-faq-layout-3.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 3</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="login-login.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Login </div>
                            </a>
                        </li>
                        <li>
                            <a href="login-register.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Register </div>
                            </a>
                        </li>
                        <li>
                            <a href="main-error-page.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Error Page </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-update-profile.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Update profile </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-change-password.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Change Password </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu__devider my-6"></li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                        <div class="menu__title"> Components <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Grid <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-regular-table.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Regular Table</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-datatable.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Datatable</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="side-menu-accordion.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Accordion </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-button.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Button </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-modal.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Modal </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-alert.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Alert </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-progress-bar.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Progress Bar </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-tooltip.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Tooltip </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-dropdown.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Dropdown </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-toast.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Toast </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-typography.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Typography </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-icon.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Icon </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-loading-icon.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Loading Icon </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;.html" class="menu menu--active">
                        <div class="menu__icon"> <i data-feather="sidebar"></i> </div>
                        <div class="menu__title"> Forms <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="menu__sub-open">
                        <li>
                            <a href="side-menu-regular-form.html" class="menu menu--active">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Regular Form </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-datepicker.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Datepicker </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-select2.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Select2 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-file-upload.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> File Upload </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-wysiwyg-editor.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Wysiwyg Editor </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-validation.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Validation </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
                        <div class="menu__title"> Widgets <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-chart.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Chart </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-slider.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Slider </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-image-zoom.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Image Zoom </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->

<?php include "menu_airminum.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
<div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> 
					<i data-feather="chevron-right" class="breadcrumb__icon"></i> 
					<a href="#" class="">Potensi Desa</a>
					<i data-feather="chevron-right" class="breadcrumb__icon"></i>
					<a href="#" class="">Sumber Daya Air</a>
					<i data-feather="chevron-right" class="breadcrumb__icon"></i>
					<a href="#" class="breadcrumb--active">Air Minum</a> </div>
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
                
								<form class="form-horizontal" action="" method="post">
								<input type="hidden" name="txtkdkel" value="<?php echo $kd_kel; ?>"/>

				
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">

                        <div class="intro-y box">
                            <div class="p-5" id="input">
                                <div class="preview">
									<div class="mt-3">
										<label><b>Jumlah Pelanggan Dan Volume Air</b></label>
									</div>
									<div class="mt-3">
										<div class="sm:grid grid-cols-4 gap-2">
											<div class="relative mt-2">
												<label>Jenis Pelanggan</label>
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtjenis1" name="txtjenis1" disabled value="Sosial" >
											</div>
											<div class="relative mt-2">
												<label>Jumlah Pelanggan</label>
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtjml1" name="txtjml1" autocomplete="off" value="<?php echo $txtjml1; ?>" >
											</div>
											<div class="relative mt-2">
												<label>Volume Air disalurkan (m3)</label>
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtair1" name="txtair1" autocomplete="off" value="<?php echo $txtair1; ?>" >
											</div>
											<div class="relative mt-2">
												<label>Nilai Rupiah (Rp)</label>
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtnilai1" name="txtnilai1" autocomplete="off" value="<?php echo $txtnilai1; ?>" >
											</div>
										</div>
										<div class="sm:grid grid-cols-4 gap-2">
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtjenis2" name="txtjenis2" disabled value="Rumah Tangga" >
											</div>
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtjml2" name="txtjml2" autocomplete="off" value="<?php echo $txtjml2; ?>" >
											</div>
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtair2" name="txtair2" autocomplete="off" value="<?php echo $txtair2; ?>" >
											</div>
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtnilai2" name="txtnilai2" autocomplete="off" value="<?php echo $txtnilai2; ?>" >
											</div>
										</div>
										<div class="sm:grid grid-cols-4 gap-2">
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtjenis3" name="txtjenis3" disabled value="Instansi Pemerintah" >
											</div>
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtjml3" name="txtjml3" autocomplete="off" value="<?php echo $txtjml3; ?>" >
											</div>
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtair3" name="txtair3" autocomplete="off" value="<?php echo $txtair3; ?>" >
											</div>
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtnilai3" name="txtnilai3" autocomplete="off" value="<?php echo $txtnilai3; ?>" >
											</div>
										</div>
										<div class="sm:grid grid-cols-4 gap-2">
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtjenis4" name="txtjenis4" disabled value="Niaga" >
											</div>
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtjml4" name="txtjml4" autocomplete="off" value="<?php echo $txtjml4; ?>" >
											</div>
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtair4" name="txtair4" autocomplete="off" value="<?php echo $txtair4; ?>" >
											</div>
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtnilai4" name="txtnilai4" autocomplete="off" value="<?php echo $txtnilai4; ?>" >
											</div>
										</div>
										<div class="sm:grid grid-cols-4 gap-2">
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtjenis5" name="txtjenis5" disabled value="Industri" >
											</div>
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtjml5" name="txtjml5" autocomplete="off" value="<?php echo $txtjml5; ?>" >
											</div>
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtair5" name="txtair5" autocomplete="off" value="<?php echo $txtair5; ?>" >
											</div>
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtnilai5" name="txtnilai5" autocomplete="off" value="<?php echo $txtnilai5; ?>" >
											</div>
										</div>
										<div class="sm:grid grid-cols-4 gap-2">
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtjenis6" name="txtjenis6" disabled value="Khusus" >
											</div>
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtjml6" name="txtjml6" autocomplete="off" value="<?php echo $txtjml6; ?>" >
											</div>
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtair6" name="txtair6" autocomplete="off" value="<?php echo $txtair6; ?>" >
											</div>
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtnilai6" name="txtnilai6" autocomplete="off" value="<?php echo $txtnilai6; ?>" >
											</div>
										</div>
									</div>							
								</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">

                        <div class="intro-y box">
                            <div class="p-5" id="input">
                                <div class="preview">
									<div class="mt-3">
										<label><b>Kapasitas Produksi</b></label>
									</div>
									<div class="mt-3">
										<div class="sm:grid grid-cols-2 gap-2">
											<div class="relative mt-2">
												<label>Rata-rata Kapasitas Produksi Potensial (liter/detik)</label>
												<input type="text" class="input pr-12 w-full border col-span-4" 
												id="txtkapasitas1" name="txtkapasitas1" autocomplete="off" value="<?php echo $txtkapasitas1; ?>" >
											</div>
											<div class="relative mt-2">
												<label>Rata-rata Kapasitas Produksi Efektif (liter/detik)</label>
												<input type="text" class="input pr-12 w-full border col-span-4" 
												id="txtkapasitas2" name="txtkapasitas2" autocomplete="off" value="<?php echo $txtkapasitas2; ?>" >
											</div>
										</div>
									</div>							
								</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">

                        <div class="intro-y box">
                            <div class="p-5" id="input">
                                <div class="preview">
									<div class="mt-3">
										<label><b>Produksi Air Minum Menurut Sumber (m3)</b></label>
									</div>
									<div class="mt-3">
										<div class="sm:grid grid-cols-2 gap-2">
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txt" name="txt" value="Sungai" disabled >
											</div>
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" 
												id="txtsumber1" name="txtsumber1" autocomplete="off" value="<?php echo $txtsumber1; ?>" >
											</div>
										</div>
										<div class="sm:grid grid-cols-2 gap-2">
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txt" name="txt" value="Danau" disabled >
											</div>
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" 
												id="txtsumber2" name="txtsumber2" autocomplete="off" value="<?php echo $txtsumber2; ?>" >
											</div>
										</div>
										<div class="sm:grid grid-cols-2 gap-2">
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txt" name="txt" value="Waduk" disabled >
											</div>
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" 
												id="txtsumber3" name="txtsumber3" autocomplete="off" value="<?php echo $txtsumber3; ?>" >
											</div>
										</div>
										<div class="sm:grid grid-cols-2 gap-2">
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txt" name="txt" value="Mata Air" disabled >
											</div>
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" 
												id="txtsumber4" name="txtsumber4" autocomplete="off" value="<?php echo $txtsumber4; ?>" >
											</div>
										</div>
										<div class="sm:grid grid-cols-2 gap-2">
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txt" name="txt" value="Air Tanah" disabled >
											</div>
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" 
												id="txtsumber5" name="txtsumber5" autocomplete="off" value="<?php echo $txtsumber5; ?>" >
											</div>
										</div>
										<div class="sm:grid grid-cols-2 gap-2">
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txt" name="txt" value="Lainnya" disabled >
											</div>
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" 
												id="txtsumber6" name="txtsumber6" autocomplete="off" value="<?php echo $txtsumber6; ?>" >
											</div>
										</div>
									</div>							
								</div>
                            </div>
                        </div>
                    </div>
                </div>

</form>
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
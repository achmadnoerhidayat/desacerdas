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

	$cbothn = $_GET['thn'];
	
	
	if(isset($_POST['btntutup'])) {
		header('location:adm_rabdes_input.php');
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
		
<link href="jquery-ui-1.11.4/smoothness/jquery-ui.css" rel="stylesheet" />
  <script src="jquery-ui-1.11.4/external/jquery/jquery.js"></script>
  <script src="jquery-ui-1.11.4/jquery-ui.js"></script>
  <script src="jquery-ui-1.11.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="jquery-ui-1.11.4/jquery-ui.theme.css">
  
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

<?php include "menu_adm07a.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
<div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> 
					<i data-feather="chevron-right" class="breadcrumb__icon"></i> 
										<a href="#" class="">Administrasi</a>
					<i data-feather="chevron-right" class="breadcrumb__icon"></i>
					<a href="adm_rabdes.php.php" class="">Rancangan APBDes</a>
					<i data-feather="chevron-right" class="breadcrumb__icon"></i>
					<a href="#" class="breadcrumb--active">Input Detail </a> </div>
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
			<input type="hidden" name="txtthn" value="<?php echo $cbothn; ?>"/>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">

                        <div class="intro-y box">
                            <div class="p-5" id="input">
                                <div class="preview">
									<div class="mt-3">
                                        <input type="text" class="input w-full border mt-2" id="txttahun" name="txttahun" 
										disabled value="<?php echo $cbothn; ?>" >
                                    </div>	
								</div>
                            </div>
                        </div>
<br>
                        <div class="intro-y box">
                            <div class="p-5" id="input">
                                <div class="preview">
									<div class="mt-3">
										<label><b>Isian Table Rancangan APBDes</b></label>
                                    </div>
<br>
<div class="overflow-x-auto">
<table class="table">
								<tr>
									<td colspan="4" align="center" class="border border-b-2 whitespace-no-wrap"><font size="2"><b>KODE  REKENING</b></font></td>
									<td align="center" class="border border-b-2 whitespace-no-wrap"><font size="2"><b>URAIAN</b></font></td>
									<td align="center" class="border border-b-2 whitespace-no-wrap"><font size="2"><b>ANGGARAN (Rp)</b></font></td>
									<td align="center" class="border border-b-2 whitespace-no-wrap"><font size="2"><b>KETERANGAN</b></font></td>

								</tr>
								
								<?php 
									$sql = mysqli_query($koneksi,"SELECT kode, nama FROM tbrek where left(kode,1)='1' order by kode asc");
									while ($tampil = mysqli_fetch_array($sql)) {
										$kode=$tampil['kode'];
										$digit=strlen($kode);
								?>
								<tr>
									<td align="center" class="border border-b-2 whitespace-no-wrap">
										<font size="2">
											
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],0,1);
													}
												?>
											
										</font>
									</td>
									<td align="center" class="border border-b-2 whitespace-no-wrap">
										<font size="2">
																						
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],1,1);
													}
												?>
											
										</font>
									</td>
									<td align="center" class="border border-b-2 whitespace-no-wrap">
										<font size="2">
																							
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],2,1);
													}
												?>											
											
										</font>
									</td>
									<td align="center" class="border border-b-2 whitespace-no-wrap">
										<font size="2">
																							
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],3,1);
													}
												?>														
											
										</font>
									</td>
									<td class="border border-b-2 whitespace-no-wrap">
										<font size="2">
															
												<?php 
													if ($digit<'5') {
														echo $tampil['nama'];
													} else {
														echo $tampil['kode']."&nbsp;".$tampil['nama'];
													}
												?>
												
												
												
												<?php 
													if ($digit>='2' and $digit<'5') {
												?>
												<a href="adm_rabdes_inputsub1.php?kd=<?php echo $kode; ?>&thn=<?php echo $cbothn; ?>"> 
													<font color="red">[<i>+ Sub</i>]</font></a>
												<?php
													}
												?>
												
											
										</font>
									</td>
									<td class="border border-b-2 whitespace-no-wrap" align="right">
										<font size="2">
																							
												<?php 
													if ($digit>='3') {
														$data = mysqli_query($koneksi,"SELECT * FROM tbrapbes_detail 
																						WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'"); 
														$cek = mysqli_num_rows($data);
														if($cek > 0){
															$cari_kd=mysqli_query($koneksi,"SELECT 
																						anggaran, keterangan FROM tbrapbes_detail 
																						WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'");
															$tm_cari=mysqli_fetch_array($cari_kd);
															$anggaran=$tm_cari['anggaran'];	
															echo number_format($anggaran,2);															
														} else {
															//$anggaran="";
															//echo $anggaran;
												?>
															<a href="adm_rabdes_input1.php?kd=<?php echo $kode; ?>&thn=<?php echo $cbothn; ?>">
															<font color="red">[<i>Input</i>]</font></a>
												<?php
														}
													}
												?>											
											
										</font>
									</td>
									<td class="border border-b-2 whitespace-no-wrap">
										<font size="2">
																							
												<?php 
													if ($digit>='3') {
														$cari_kd=mysqli_query($koneksi,"SELECT 
																						anggaran, keterangan FROM tbrapbes_detail 
																						WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'");
														$tm_cari=mysqli_fetch_array($cari_kd);
														$keterangan=$tm_cari['keterangan'];
														
															echo $keterangan;
														
													}
												?>											
											
										</font>
									</td>
								</tr>

								
								<?php										
									}
								?>

								<tr>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
									<td class="border border-b-2 whitespace-no-wrap"><font size="2">JUMLAH PENDAPATAN</font></td>
									<td align="right" class="border border-b-2 whitespace-no-wrap">
										<?php 
											$cari_kd=mysqli_query($koneksi,"SELECT sum(anggaran) as tot 
																			FROM tbrapbes_detail WHERE left(kode,1)='1' and tahun='$cbothn' and kode_wil='$kd_kel'");
											$tm_cari=mysqli_fetch_array($cari_kd);
											$tot1=$tm_cari['tot'];	
											echo number_format($tot1,2);															
										?>						
									</td>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
								</tr>

<?php 
									$sql = mysqli_query($koneksi,"SELECT kode, nama FROM tbrek where left(kode,1)='2' order by kode asc");
									while ($tampil = mysqli_fetch_array($sql)) {
										$kode=$tampil['kode'];
										$digit=strlen($kode);
								?>
								<tr>
									<td align="center" class="border border-b-2 whitespace-no-wrap">
										<font size="2">
											
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],0,1);
													}
												?>
											
										</font>
									</td>
									<td align="center" class="border border-b-2 whitespace-no-wrap">
										<font size="2">
																						
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],1,1);
													}
												?>
											
										</font>
									</td>
									<td align="center" class="border border-b-2 whitespace-no-wrap">
										<font size="2">
																							
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],2,1);
													}
												?>											
											
										</font>
									</td>
									<td align="center" class="border border-b-2 whitespace-no-wrap">
										<font size="2">
																							
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],3,1);
													}
												?>														
											
										</font>
									</td>
									<td class="border border-b-2 whitespace-no-wrap">
										<font size="2">
															
												<?php 
													if ($digit<'5') {
														echo $tampil['nama'];
													} else {
														echo $tampil['kode']."&nbsp;".$tampil['nama'];
													}
												?>
												
												
												
												<?php 
													if ($digit>='2' and $digit<'5') {
												?>
												<a href="adm_rabdes_inputsub1.php?kd=<?php echo $kode; ?>&thn=<?php echo $cbothn; ?>"> 
													<font color="red">[<i>+ Sub</i>]</font></a>
												<?php
													}
												?>
												
											
										</font>
									</td>
									<td class="border border-b-2 whitespace-no-wrap" align="right">
										<font size="2">
																							
												<?php 
													if ($digit>='3') {
														$data = mysqli_query($koneksi,"SELECT * FROM tbrapbes_detail 
																						WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'"); 
														$cek = mysqli_num_rows($data);
														if($cek > 0){
															$cari_kd=mysqli_query($koneksi,"SELECT 
																						anggaran, keterangan FROM tbrapbes_detail 
																						WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'");
															$tm_cari=mysqli_fetch_array($cari_kd);
															$anggaran=$tm_cari['anggaran'];	
															echo number_format($anggaran,2);															
														} else {
															//$anggaran="";
															//echo $anggaran;
												?>
															<a href="adm_rabdes_input1.php?kd=<?php echo $kode; ?>&thn=<?php echo $cbothn; ?>">
															<font color="red">[<i>Input</i>]</font></a>
												<?php
														}
													}
												?>											
											
										</font>
									</td>
									<td class="border border-b-2 whitespace-no-wrap">
										<font size="2">
																							
												<?php 
													if ($digit>='3') {
														$cari_kd=mysqli_query($koneksi,"SELECT 
																						anggaran, keterangan FROM tbrapbes_detail 
																						WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'");
														$tm_cari=mysqli_fetch_array($cari_kd);
														$keterangan=$tm_cari['keterangan'];
														
															echo $keterangan;
														
													}
												?>											
											
										</font>
									</td>
								</tr>

								
								<?php										
									}
								?>

								<tr>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
									<td class="border border-b-2 whitespace-no-wrap"><font size="2">JUMLAH BELANJA</font></td>
									<td align="right" class="border border-b-2 whitespace-no-wrap">
										<?php 
											$cari_kd=mysqli_query($koneksi,"SELECT sum(anggaran) as tot 
																			FROM tbrapbes_detail WHERE left(kode,1)='2' and tahun='$cbothn' and kode_wil='$kd_kel'");
											$tm_cari=mysqli_fetch_array($cari_kd);
											$tot2=$tm_cari['tot'];	
											echo number_format($tot2,2);															
										?>						
									</td>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
								</tr>
								<tr>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
									<td class="border border-b-2 whitespace-no-wrap"><font size="2">SURPLUS / DEFISIT</font></td>
									<td align="right" class="border border-b-2 whitespace-no-wrap">
										<?php 
											
											$tot3=$tot1-$tot2;	
											
											if ($tot3<0) {
												echo "(".number_format($tot3,2).")";	
											} else {
												echo number_format($tot3,2);																											
											}

										?>						
									</td>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
								</tr>

<?php 
									$sql = mysqli_query($koneksi,"SELECT kode, nama FROM tbrek where left(kode,1)='3' and left(kode,2)='31' order by kode asc");
									while ($tampil = mysqli_fetch_array($sql)) {
										$kode=$tampil['kode'];
										$digit=strlen($kode);
								?>
								<tr>
									<td align="center" class="border border-b-2 whitespace-no-wrap">
										<font size="2">
											
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],0,1);
													}
												?>
											
										</font>
									</td>
									<td align="center" class="border border-b-2 whitespace-no-wrap">
										<font size="2">
																						
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],1,1);
													}
												?>
											
										</font>
									</td>
									<td align="center" class="border border-b-2 whitespace-no-wrap">
										<font size="2">
																							
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],2,1);
													}
												?>											
											
										</font>
									</td>
									<td align="center" class="border border-b-2 whitespace-no-wrap">
										<font size="2">
																							
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],3,1);
													}
												?>														
											
										</font>
									</td>
									<td class="border border-b-2 whitespace-no-wrap">
										<font size="2">
															
												<?php 
													if ($digit<'5') {
														echo $tampil['nama'];
													} else {
														echo $tampil['kode']."&nbsp;".$tampil['nama'];
													}
												?>
												
												
												
												<?php 
													if ($digit>='2' and $digit<'5') {
												?>
												<a href="adm_rabdes_inputsub1.php?kd=<?php echo $kode; ?>&thn=<?php echo $cbothn; ?>"> 
													<font color="red">[<i>+ Sub</i>]</font></a>
												<?php
													}
												?>
												
											
										</font>
									</td>
									<td class="border border-b-2 whitespace-no-wrap" align="right">
										<font size="2">
																							
												<?php 
													if ($digit>='3') {
														$data = mysqli_query($koneksi,"SELECT * FROM tbrapbes_detail 
																						WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'"); 
														$cek = mysqli_num_rows($data);
														if($cek > 0){
															$cari_kd=mysqli_query($koneksi,"SELECT 
																						anggaran, keterangan FROM tbrapbes_detail 
																						WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'");
															$tm_cari=mysqli_fetch_array($cari_kd);
															$anggaran=$tm_cari['anggaran'];	
															echo number_format($anggaran,2);															
														} else {
															//$anggaran="";
															//echo $anggaran;
												?>
															<a href="adm_rabdes_input1.php?kd=<?php echo $kode; ?>&thn=<?php echo $cbothn; ?>">
															<font color="red">[<i>Input</i>]</font></a>
												<?php
														}
													}
												?>											
											
										</font>
									</td>
									<td class="border border-b-2 whitespace-no-wrap">
										<font size="2">
																							
												<?php 
													if ($digit>='3') {
														$cari_kd=mysqli_query($koneksi,"SELECT 
																						anggaran, keterangan FROM tbrapbes_detail 
																						WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'");
														$tm_cari=mysqli_fetch_array($cari_kd);
														$keterangan=$tm_cari['keterangan'];
														
															echo $keterangan;
														
													}
												?>											
											
										</font>
									</td>
								</tr>

<?php										
									}
								?>

<tr>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
									<td class="border border-b-2 whitespace-no-wrap"><font size="2">JUMLAH  ( RP )</font></td>
									<td align="right" class="border border-b-2 whitespace-no-wrap">
										<?php 
											$cari_kd=mysqli_query($koneksi,"SELECT sum(anggaran) as tot 
																			FROM tbrapbes_detail WHERE left(kode,1)='3' and left(kode,2)='31' and tahun='$cbothn'");
											$tm_cari=mysqli_fetch_array($cari_kd);
											$tot4=$tm_cari['tot'];	
											echo number_format($tot4,2);															
										?>						
									</td>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
								</tr>
<?php 
									$sql = mysqli_query($koneksi,"SELECT kode, nama FROM tbrek where left(kode,1)='3' and left(kode,2)='32' order by kode asc");
									while ($tampil = mysqli_fetch_array($sql)) {
										$kode=$tampil['kode'];
										$digit=strlen($kode);
								?>
								<tr>
									<td align="center" class="border border-b-2 whitespace-no-wrap">
										<font size="2">
											
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],0,1);
													}
												?>
											
										</font>
									</td>
									<td align="center" class="border border-b-2 whitespace-no-wrap">
										<font size="2">
																						
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],1,1);
													}
												?>
											
										</font>
									</td>
									<td align="center" class="border border-b-2 whitespace-no-wrap">
										<font size="2">
																							
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],2,1);
													}
												?>											
											
										</font>
									</td>
									<td align="center" class="border border-b-2 whitespace-no-wrap">
										<font size="2">
																							
												<?php 
													if ($digit=='1') {
														echo $tampil['kode'];
													} elseif ($digit=='5') {
														
													} else {
														echo substr($tampil['kode'],3,1);
													}
												?>														
											
										</font>
									</td>
									<td class="border border-b-2 whitespace-no-wrap">
										<font size="2">
															
												<?php 
													if ($digit<'5') {
														echo $tampil['nama'];
													} else {
														echo $tampil['kode']."&nbsp;".$tampil['nama'];
													}
												?>
												
												
												
												<?php 
													if ($digit>='2' and $digit<'5') {
												?>
												<a href="adm_rabdes_inputsub1.php?kd=<?php echo $kode; ?>&thn=<?php echo $cbothn; ?>"> 
													<font color="red">[<i>+ Sub</i>]</font></a>
												<?php
													}
												?>
												
											
										</font>
									</td>
									<td class="border border-b-2 whitespace-no-wrap" align="right">
										<font size="2">
																							
												<?php 
													if ($digit>='3') {
														$data = mysqli_query($koneksi,"SELECT * FROM tbrapbes_detail 
																						WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'"); 
														$cek = mysqli_num_rows($data);
														if($cek > 0){
															$cari_kd=mysqli_query($koneksi,"SELECT 
																						anggaran, keterangan FROM tbrapbes_detail 
																						WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'");
															$tm_cari=mysqli_fetch_array($cari_kd);
															$anggaran=$tm_cari['anggaran'];	
															echo number_format($anggaran,2);															
														} else {
															//$anggaran="";
															//echo $anggaran;
												?>
															<a href="adm_rabdes_input1.php?kd=<?php echo $kode; ?>&thn=<?php echo $cbothn; ?>">
															<font color="red">[<i>Input</i>]</font></a>
												<?php
														}
													}
												?>											
											
										</font>
									</td>
									<td class="border border-b-2 whitespace-no-wrap">
										<font size="2">
																							
												<?php 
													if ($digit>='3') {
														$cari_kd=mysqli_query($koneksi,"SELECT 
																						anggaran, keterangan FROM tbrapbes_detail 
																						WHERE kode='$kode' and tahun='$cbothn' and kode_wil='$kd_kel'");
														$tm_cari=mysqli_fetch_array($cari_kd);
														$keterangan=$tm_cari['keterangan'];
														
															echo $keterangan;
														
													}
												?>											
											
										</font>
									</td>
								</tr>
								
								<?php										
									}
								?>

<tr>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
									<td class="border border-b-2 whitespace-no-wrap"><font size="2">JUMLAH  ( RP )</font></td>
									<td align="right" class="border border-b-2 whitespace-no-wrap">
										<?php 
											$cari_kd=mysqli_query($koneksi,"SELECT sum(anggaran) as tot 
																			FROM tbrapbes_detail WHERE left(kode,1)='3' and left(kode,2)='32' and tahun='$cbothn' 
																			and kode_wil='$kd_kel'");
											$tm_cari=mysqli_fetch_array($cari_kd);
											$tot5=$tm_cari['tot'];	
											echo number_format($tot5,2);															
										?>						
									</td>
									<td align="center" class="border border-b-2 whitespace-no-wrap"></td>
								</tr>								
							</table>
</table>			
								</div>
								
                            </div>
							
                        </div>
						<div class="mt-3 center">
										<center>
											<button type="submit" name="btntutup" class="button bg-theme-1 text-white mt-5">   &nbsp;&nbsp;&nbsp;TUTUP&nbsp;&nbsp;&nbsp;   </button>
										</center>
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

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
	$file_photo1=$tm_cari['file_photo'];
	$file_name=$tm_cari['file_name'];
	if($file_photo1=='') {
		$file_photo1="dist/images/logo.svg";
	}
	
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kel=$tm_cari['nama'];

	$id=$_POST['txtid'];
	$cari_kd=mysqli_query($koneksi,"SELECT nama_irigasi, tipe, pengelola, luas_prencana, luas_potensial, 
tipe_bgn, jml_bgn_utama, jln_inspeksi, rencana_produksi, 
rencana_intensitas_tanam, 
panjang_1, panjang_2, panjang_3, panjang_4, panjang_5, 
jml_1, jml_2, jml_3, jml_4, jml_5, jml_6, jml_7, jml_8, 
jml_9, jml_10, jml_11, jml_12, jml_13, jml_14, jml_15, jml_16, 
bangun_mulai, bangun_selesai, bangun_biaya, bangun_konstruksi, 
bangun_konsultan, bangun_pengawas, bangun_kontraktor, bangun_sumber, 
p3a_1, p3a_2, p3a_3, p3a_4, p3a_5, p3a_6, p3a_7, p3a_8, p3a_9, 
					file_photo, 
DATE_FORMAT(bangun_mulai,'%d/%m/%Y') AS tgl, DATE_FORMAT(bangun_selesai,'%d/%m/%Y') AS tgl1 
					FROM tbirigasi where id='$id'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nama_irigasi=$tm_cari['nama_irigasi'];
	$data1=$tm_cari['tipe'];
	$data2=$tm_cari['pengelola'];
	$data3=$tm_cari['luas_prencana'];
	$data4=$tm_cari['luas_potensial'];
	$data5=$tm_cari['tipe_bgn'];
	$data6=$tm_cari['jml_bgn_utama'];
	$data7=$tm_cari['jln_inspeksi'];
	$data8=$tm_cari['rencana_produksi'];
	$data9=$tm_cari['rencana_intensitas_tanam'];
	$data10=$tm_cari['panjang_1'];
	$data11=$tm_cari['panjang_2'];
	$data12=$tm_cari['panjang_3'];
	$data13=$tm_cari['panjang_4'];
	$data14=$tm_cari['panjang_5'];
	$data15=$tm_cari['jml_1'];
	$data16=$tm_cari['jml_2'];
	$data17=$tm_cari['jml_3'];
	$data18=$tm_cari['jml_4'];
	$data19=$tm_cari['jml_5'];
	$data20=$tm_cari['jml_6'];
	$data21=$tm_cari['jml_7'];
	$data22=$tm_cari['jml_8'];
	$data23=$tm_cari['jml_9'];
	$data24=$tm_cari['jml_10'];
	$data25=$tm_cari['jml_11'];
	$data26=$tm_cari['jml_12'];
	$data27=$tm_cari['jml_13'];
	$data28=$tm_cari['jml_14'];
	$data29=$tm_cari['jml_15'];
	$data30=$tm_cari['jml_16'];
	$data31=$tm_cari['tgl'];
	$data32=$tm_cari['tgl1'];
	$data33=$tm_cari['bangun_biaya'];
	$data34=$tm_cari['bangun_konstruksi'];
	$data35=$tm_cari['bangun_konsultan'];
	$data36=$tm_cari['bangun_pengawas'];
	$data37=$tm_cari['bangun_kontraktor'];
	$data38=$tm_cari['bangun_sumber'];
	$data39=$tm_cari['p3a_1'];
	$data40=$tm_cari['p3a_2'];
	$data41=$tm_cari['p3a_3'];
	$data42=$tm_cari['p3a_4'];
	$data43=$tm_cari['p3a_5'];
	$data44=$tm_cari['p3a_6'];
	$data45=$tm_cari['p3a_7'];
	$data46=$tm_cari['p3a_8'];
	$data47=$tm_cari['p3a_9'];
	$file_photo=$tm_cari['file_photo'];
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

<?php include "menu_irigasi.php"; ?>

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
					<a href="irigasi.php" class="">Irigasi</a>
					<i data-feather="chevron-right" class="breadcrumb__icon"></i>
					<a href="#" class="breadcrumb--active">Detail</a> </div>
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Search -->

                    <!-- END: Search -->
                    <!-- BEGIN: Notifications -->

                    <!-- END: Notifications -->
                    <!-- BEGIN: Account Menu -->
                    <div class="intro-x dropdown w-8 h-8 relative">
                        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                            <img alt="User Profil" src="<?php echo $file_photo1; ?>">
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
                
                    <div class="col-span-12 lg:col-span-8 xxl:col-span-9">
                        <!-- BEGIN: Display Information -->
                        <div class="intro-y box lg:mt-5">
                            <div class="flex items-center p-5 border-b border-gray-200">
                                <h2 class="font-medium text-base mr-auto">
                                    <?php echo $nama_irigasi; ?>
                                </h2>
                            </div>
                            <div class="p-5">
                                <div class="grid grid-cols-12 gap-5">
                                    <div class="col-span-12 xl:col-span-7">
                                        <div class="border border-gray-200 rounded-md p-5">
												<center>
                                                <img class="rounded-md" alt="Photo Sungai" src="<?php echo $file_photo; ?>" width="550px">
												</center>
                                        </div>
                                    </div>											
                                    <div class="col-span-12 xl:col-span-5">
                                        <div class="mt-3">
                                            <label>Tipe Irigasi</label>
                                            <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2" 
											placeholder="Input text" value="<?php echo $data1; ?>" disabled>
                                        </div>
                                        <div class="mt-3">
                                            <label>Pengelola</label>
                                            <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2" 
											placeholder="Input text" value="<?php echo $data2; ?>" disabled>
                                        </div>
                                        <div class="mt-3">
                                            <label>Luas Prencana</label>
                                            <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2" 
											placeholder="Input text" value="<?php echo number_format($data3,0) ?> (Ha)" disabled>
                                        </div>
                                        <div class="mt-3">
                                            <label>Luas Potensial (Ha)</label>
                                            <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2" 
											placeholder="Input text" value="<?php echo number_format($data4,0) ?> (Ha)" disabled>
                                        </div>

									</div>
    
                                </div>
                            </div>
                        </div>
                        <!-- END: Display Information -->

                        <!-- BEGIN: Personal Information -->
                        <div class="intro-y box lg:mt-5">
                            <div class="flex items-center p-5 border-b border-gray-200">
                                <h2 class="font-medium text-base mr-auto">
                                    <b>Informasi Umum</b>
                                </h2>
                            </div>
                            <div class="p-5">
                                <div class="grid grid-cols-12 gap-5">
                                    <div class="col-span-12 xl:col-span-12">
                                        <div>
											<div class="relative mt-2">
                                            							<label>Tipe Bangunan Utama</label>
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
												id="txttipebgn" name="txttipebgn" disabled value="<?php echo $data5; ?>">
											</div>
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
                                            								<label>Jumlah Bangunan</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtjmlbgn" name="txtjmlbgn" disabled value="<?php echo $data6; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Jalan Inspeksi</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtjalan" name="txtjalan" value="<?php echo number_format($data7,0) ?> (km)" disabled>
												</div>
											</div>
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
                                            								<label>Rencana Produksi</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtrencanap" name="txtrencanap" autocomplete="off" value="<?php echo number_format($data8,0) ?> (ton)" disabled>
												</div>
												<div class="relative mt-2">
                                            								<label>Rencana Intensitas Tanam</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtrencanar" name="txtrencanar" autocomplete="off" value="<?php echo number_format($data9,0) ?> (Ha)" disabled>
												</div>
											</div>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        <!-- END: Personal Information -->

                        <!-- BEGIN: Personal Information -->
                        <div class="intro-y box lg:mt-5">
                            <div class="flex items-center p-5 border-b border-gray-200">
                                <h2 class="font-medium text-base mr-auto">
                                    <b>Panjang Saluran (dalam satuan meter)</b>
                                </h2>
                            </div>
                            <div class="p-5">
                                <div class="grid grid-cols-12 gap-5">
                                    <div class="col-span-12 xl:col-span-12">
											<div class="sm:grid grid-cols-5 gap-2">
												<div class="relative mt-2">
                                            								<label>Induk</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtpanjang1" name="txtpanjang1" disabled value="<?php echo $data10; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Sekunder</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtpanjang2" name="txtpanjang2" disabled value="<?php echo $data11; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Pembuang</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtpanjang3" name="txtpanjang3" disabled value="<?php echo $data12; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Suplesi</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtpanjang4" name="txtpanjang4" disabled value="<?php echo $data13; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Gendong</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtpanjang5" name="txtpanjang5" disabled value="<?php echo $data14; ?>">
												</div>
											</div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        <!-- END: Personal Information -->

                        <!-- BEGIN: Personal Information -->
                        <div class="intro-y box lg:mt-5">
                            <div class="flex items-center p-5 border-b border-gray-200">
                                <h2 class="font-medium text-base mr-auto">
                                    <b>Jumlah Bangunan (buah)</b>
                                </h2>
                            </div>
                            <div class="p-5">
                                <div class="grid grid-cols-12 gap-5">
                                    <div class="col-span-12 xl:col-span-12">
											<div class="sm:grid grid-cols-4 gap-2">
												<div class="relative mt-2">
                                            								<label>Bagi</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtjml1" name="txtjml1" disabled value="<?php echo $data15; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Bagi Sadap</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtjml2" name="txtjml2" disabled value="<?php echo $data16; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Sadap/oncoran</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtjml3" name="txtjml3" disabled value="<?php echo $data17; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Ulur</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtjml4" name="txtjml4" disabled value="<?php echo $data18; ?>">
												</div>
											</div>

											<div class="sm:grid grid-cols-4 gap-2">
												<div class="relative mt-2">
                                            								<label>Talang Jembatan/Talang</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtjml5" name="txtjml5" disabled value="<?php echo $data19; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Siphon</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtjml6" name="txtjml6" disabled value="<?php echo $data20; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Silang</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtjml7" name="txtjml7" disabled value="<?php echo $data21; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Gorong-gorong</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtjml8" name="txtjml8" disabled value="<?php echo $data22; ?>">
												</div>
											</div>

											<div class="sm:grid grid-cols-4 gap-2">
												<div class="relative mt-2">
                                            								<label>Jembatan</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtjml9" name="txtjml9" disabled value="<?php echo $data23; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Tenun</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtjml10" name="txtjml10" disabled value="<?php echo $data24; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Got Milling</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtjml11" name="txtjml11" disabled value="<?php echo $data25; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Suplesi</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtjml12" name="txtjml12" disabled value="<?php echo $data26; ?>">
												</div>
											</div>

											<div class="sm:grid grid-cols-4 gap-2">
												<div class="relative mt-2">
                                            								<label>Pelimpah Sampling</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtjml13" name="txtjml13" disabled value="<?php echo $data27; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Kantong Lumpur</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtjml14" name="txtjml14" disabled value="<?php echo $data28; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Pembilas</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtjml15" name="txtjml15" disabled value="<?php echo $data29; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Pelengkap</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtjml16" name="txtjml16" disabled value="<?php echo $data30; ?>">
												</div>
											</div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        <!-- END: Personal Information -->

                        <!-- BEGIN: Personal Information -->
                        <div class="intro-y box lg:mt-5">
                            <div class="flex items-center p-5 border-b border-gray-200">
                                <h2 class="font-medium text-base mr-auto">
                                    <b>Pembangunan Awal</b>
                                </h2>
                            </div>
                            <div class="p-5">
                                <div class="grid grid-cols-12 gap-5">
                                    <div class="col-span-12 xl:col-span-12">
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
                                            								<label>Mulai</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtpemb1" name="txtpemb1" disabled value="<?php echo $data31; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Selesai</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtpemb2" name="txtpemb2" disabled value="<?php echo $data32; ?>">
												</div>
											</div>
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
                                            								<label>Biaya</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtpemb3" name="txtpemb3" disabled value="Rp. <?php echo number_format($data33,0) ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Konstruksi Agensi</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtpemb4" name="txtpemb4" disabled value="<?php echo $data34; ?>">
												</div>
											</div>
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
                                            								<label>Konsultan Perencanaan</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtpemb5" name="txtpemb5" disabled value="<?php echo $data35; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Konsultan Pengawas</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtpemb6" name="txtpemb6" disabled value="<?php echo $data36; ?>">
												</div>
											</div>
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
                                            								<label>Kontraktor</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtpemb7" name="txtpemb7" disabled value="<?php echo $data37; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Sumber Dana</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtpemb8" name="txtpemb8" disabled value="<?php echo $data38; ?>">
												</div>
											</div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        <!-- END: Personal Information -->


                        <!-- BEGIN: Personal Information -->
                        <div class="intro-y box lg:mt-5">
                            <div class="flex items-center p-5 border-b border-gray-200">
                                <h2 class="font-medium text-base mr-auto">
                                    <b>Perkumpulan Petani Pemakai Air (P3A)</b>
                                </h2>
                            </div>
                            <div class="p-5">
                                <div class="grid grid-cols-12 gap-5">
                                    <div class="col-span-12 xl:col-span-12">
											<div class="sm:grid grid-cols-3 gap-2">
												<div class="relative mt-2">
                                            								<label>Jumlah P3A (buah)</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtp3a-1" name="txtp3a-1" disabled value="<?php echo $data39; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Luas Daerah Kerja P3A (Ha)</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtp3a-2" name="txtp3a-2" disabled value="<?php echo $data40; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Jumlah Anggota P3A (Petani)</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtp3a-3" name="txtp3a-3" disabled value="<?php echo $data41; ?>">
												</div>
											</div>
											<div class="sm:grid grid-cols-3 gap-2">
												<div class="relative mt-2">
                                            								<label>Jumlah P3A aktif (buah)</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtp3a-4" name="txtp3a-4" disabled value="<?php echo $data42; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Luas Daerah Kerja P3A aktif (Ha)</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtp3a-5" name="txtp3a-5" disabled value="<?php echo $data43; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Jumlah Gabungan P3A tingkat primer (buah)</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtp3a-6" name="txtp3a-6" disabled value="<?php echo $data44; ?>">
												</div>
											</div>
											<div class="sm:grid grid-cols-3 gap-2">
												<div class="relative mt-2">
                                            								<label>Jumlah Gabungan P3A tingkat sekunder (buah)</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtp3a-7" name="txtp3a-7" disabled value="<?php echo $data45; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Luas Pengelolaan OP ke Petani (Ha)</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtp3a-8" name="txtp3a-8" disabled value="<?php echo $data46; ?>">
												</div>
												<div class="relative mt-2">
                                            								<label>Realisasi Pengumpulan IPAIR</label>
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="" 
													id="txtp3a-9" name="txtp3a-9" disabled value="Rp. <?php echo number_format($data47,0) ?>">
												</div>
											</div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        <!-- END: Personal Information -->

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
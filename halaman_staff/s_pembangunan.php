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

	$tgl_skr=date('d/m/Y');
	$tgl_skr_eng=date('Y/m/d');
	
	$data = mysqli_query($koneksi,"SELECT * FROM tbpengaturan_surat WHERE id_kel='$kd_kel' and id_kategori='23'");
	$cek = mysqli_num_rows($data);
	if($cek > 0){	
		$cari_kd=mysqli_query($koneksi,"SELECT id, alamat, tempat, jabatan, nama, nip, no_pengaturan FROM tbpengaturan_surat WHERE id_kel='$kd_kel' and id_kategori='23'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$nip_jwb=$tm_cari['nip'];
		$nm_jwb=$tm_cari['nama'];
		$jabatan=$tm_cari['jabatan'];
		$alamat=$tm_cari['alamat'];	
		$no_pengaturan=$tm_cari['no_pengaturan'];		
	} else {
		echo"<script>window.alert('Pengaturan Surat Izin Pembangunan Belum Ada. Silahkan Buat Pengaturan Suratnya.');window.location=('pengaturan_surat.php');</script>";		
	}
	
	if(isset($_POST['btnsimpan'])) {	
		$cbokel = $_POST['txtkdkel'];
		$txtnama = $_POST['txtnama'];
		$title="SURAT IZIN PEMBANGUNAN ".$txtnama;	
	
		$cbopekerjaan = $_POST['cbopekerjaan'];
		$txtalamat = $_POST['txtalamat'];	

		$fld1 = $_POST['txtnotanah'];
		$fld2 = $_POST['txtlstanah'];
		$fld3 = $_POST['txtpemilik'];
		$fld4 = $_POST['txtletak'];
		$fld5 = $_POST['txtrt'];
		$fld6 = $_POST['txtdesa'];
		$fld7 = $_POST['txtpondasi'];
		$fld8 = $_POST['txtlantai'];
		$fld9 = $_POST['txttiang'];
		$fld10 = $_POST['txtdinding'];
		$fld11 = $_POST['txtr_atap'];
		$fld12 = $_POST['txttutup_atap'];
		$fld13 = $_POST['txtfungsi'];
		$fld14 = $_POST['txtpelaksana'];
		$fld15 = $_POST['txtpembuangan'];

		$bln_skr=date('m');
		$thn_skr=date('Y');
		if($bln_skr=='1') {
			$bln_rome="I";
		}
		if($bln_skr=='2') {
			$bln_rome="II";
		}
		if($bln_skr=='3') {
			$bln_rome="III";
		}
		if($bln_skr=='4') {
			$bln_rome="IV";
		}
		if($bln_skr=='5') {
			$bln_rome="V";
		}
		if($bln_skr=='6') {
			$bln_rome="VI";
		}
		if($bln_skr=='7') {
			$bln_rome="VII";
		}
		if($bln_skr=='8') {
			$bln_rome="VIII";
		}
		if($bln_skr=='9') {
			$bln_rome="IX";
		}
		if($bln_skr=='10') {
			$bln_rome="X";
		}
		if($bln_skr=='11') {
			$bln_rome="XI";
		}
		if($bln_skr=='12') {
			$bln_rome="XII";
		}

		$cari_kd=mysqli_query($koneksi,"SELECT count(nomor_surat) as total 
						FROM tbbuatsurat WHERE id_kel='$kd_kel' and id_kategori='23' and 
						month(tgl_surat)='$bln_skr' and year(tgl_surat)='$thn_skr'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$total=$tm_cari['total'];
		$nourut=$total+1;

		$txtno = $nourut."/".$nourut."/".$no_pengaturan."/".$bln_rome."/".$thn_skr;
	
		mysqli_query($koneksi,"INSERT INTO tbbuatsurat 
							(nomor_surat, tgl_surat, title_surat, id_kel, id_kategori, 
							nama, kd_pekerjaan, alamat,
							fld1, fld2, fld3, fld4, fld5, fld6, fld7, fld8, fld9, fld10,
							fld11, fld12, fld13, fld14, fld15
							) 
							VALUES 
							('$txtno','$tgl_skr_eng','$title','$cbokel','23',
							'$txtnama','$cbopekerjaan','$txtalamat',
							'$fld1','$fld2','$fld3','$fld4','$fld5',
							'$fld6','$fld7','$fld8','$fld9','$fld10',
							'$fld11','$fld12','$fld13','$fld14','$fld15'
							)");	
		echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('layanan_surat02.php');</script>";		
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

<?php include "menu_surat02.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
<div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> 
					<i data-feather="chevron-right" class="breadcrumb__icon"></i> 
					<a href="" class="breadcrumb--active">Layanan Surat</a> </div>
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

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Layanan Surat - Form Buat Surat Izin Pembangunan</h2>
    </div>

    <form action="" method="POST">
        <input type="hidden" name="txtkdkel" value="<?php echo $kd_kel; ?>"/>
        <div class="p-5 mt-2 box intro-y">
            <div class="flex">
                <div class="flex-row items-center w-1/3 mr-2">
                    <div class="w-full pb-3 border-b border-gray-300">
                        <h4 class="mr-auto text-lg font-medium">Biodata Pemohon</h4>
                    </div>

                    <div class="w-full mt-4">
                        <label class="block mb-2">Nama Lengkap</label>
                        <input type="text" class="input w-full border mt-2" id="txtnama" name="txtnama" autocomplete="off" required>
                    </div>

                    <div class="w-full mt-4">
                        <label class="block mb-2">Pekerjaan</label>
                        <select class="input pr-12 w-full border col-span-4" name="cbopekerjaan" id="cbopekerjaan" required>
											<?php
																	$sql="select kode, pekerjaan FROM tbpekerjaan";
			       														$sql_row=mysqli_query($koneksi,$sql);
			       														while($sql_res=mysqli_fetch_assoc($sql_row))	
																		{
																?>
																<option value="<?php echo $sql_res["kode"]; ?>"><?php echo $sql_res["pekerjaan"]; ?></option>
			       													<?php
			       														}
			       													?>					
											</select>
                    </div>

                    <div class="w-full mt-4">
                        <label class="block mb-2">Alamat</label>
<textarea class="input w-full border mt-2" id="txtalamat" name="txtalamat" required></textarea>
                    </div>
                </div>

                <div class="flex-row items-center w-1/3 mx-2">
                    <div class="w-full pb-3 border-b border-gray-300">
                        <h4 class="mr-auto text-lg font-medium">Data Tanah</h4>
                    </div>

                    <div class="w-full mt-4">
                        <label class="block mb-2">Nomor Daftar Tanah/Sertifikat</label>
                        <input type="text" class="input w-full border mt-2" id="txtnotanah" name="txtnotanah" autocomplete="off" required>
                    </div>

                    <div class="w-full mt-4">
                        <label class="block mb-2">Luas Tanah</label>
                        <input type="text" class="input w-full border mt-2" id="txtlstanah" name="txtlstanah" autocomplete="off" required>
                    </div>

                    <div class="w-full mt-4">
                        <label class="block mb-2">Nama Pemilik/Persil</label>
                        <input type="text" class="input w-full border mt-2" id="txtpemilik" name="txtpemilik" autocomplete="off" required>
                    </div>

                    <div class="w-full mt-4">
                        <label class="block mb-2">Letak Bangunan/Persil</label>
                        <input type="text" class="input w-full border mt-2" id="txtletak" name="txtletak" autocomplete="off" required>
                    </div>

                    <div class="w-full mt-4">
                        <label class="block mb-2">RT/RW</label>
                        <input type="text" class="input w-full border mt-2" id="txtrt" name="txtrt" autocomplete="off" required>
                    </div>

                    <div class="w-full mt-4">
                        <label class="block mb-2">Kelurahan/Kecamatan</label>
                        <input type="text" class="input w-full border mt-2" id="txtdesa" name="txtdesa" autocomplete="off" required>
                    </div>
                </div>

                <div class="flex-row items-center w-1/3 ml-2">
                    <div class="w-full pb-3 border-b border-gray-300">
                        <h4 class="mr-auto text-lg font-medium">Data Bangunan</h4>
                    </div>

                    <div class="w-full mt-4">
                        <label class="block mb-2">Pondasi</label>
                        <input type="text" class="input w-full border mt-2" id="txtpondasi" name="txtpondasi" autocomplete="off" required>
                    </div>

                    <div class="w-full mt-4">
                        <label class="block mb-2">Lantai</label>
                        <input type="text" class="input w-full border mt-2" id="txtlantai" name="txtlantai" autocomplete="off" required>
                    </div>

                    <div class="w-full mt-4">
                        <label class="block mb-2">Tiang</label>
                        <input type="text" class="input w-full border mt-2" id="txttiang" name="txttiang" autocomplete="off" required>
                    </div>

                    <div class="w-full mt-4">
                        <label class="block mb-2">Dinding</label>
                        <input type="text" class="input w-full border mt-2" id="txtdinding" name="txtdinding" autocomplete="off" required>
                    </div>

                    <div class="w-full mt-4">
                        <label class="block mb-2">Rangka Atap</label>
                        <input type="text" class="input w-full border mt-2" id="txtr_atap" name="txtr_atap" autocomplete="off" required>
                    </div>

                    <div class="w-full mt-4">
                        <label class="block mb-2">Tutup Atap</label>
                        <input type="text" class="input w-full border mt-2" id="txttutup_atap" name="txttutup_atap" autocomplete="off" required>
                    </div>

                    <div class="w-full mt-4">
                        <label class="block mb-2">Fungsi Bangunan</label>
                        <input type="text" class="input w-full border mt-2" id="txtfungsi" name="txtfungsi" autocomplete="off" required>
                    </div>

                    <div class="w-full mt-4">
                        <label class="block mb-2">Pelaksanaan/Pengawasan : Sendiri/Orang Lain/CV/dll *)</label>
                        <input type="text" class="input w-full border mt-2" id="txtpelaksana" name="txtpelaksana" autocomplete="off" required>
                    </div>

                    <div class="w-full mt-4">
                        <label class="block mb-2">Pembuangan Air Limbah</label>
						<input type="text" class="input w-full border mt-2" id="txtpembuangan" name="txtpembuangan" autocomplete="off" required>
                    </div>

                </div>

            </div>

<div class="flex justify-between mt-4">
    <a href="javascript:;" onclick="window.history.back();" class="button w-auto bg-theme-6 text-white flex items-center py-3 mr-1">
        <i data-feather="chevron-left" class="h-5 w-5 inline-block mr-2"></i> Kembali
    </a>
    
    <div class="flex justify-end">
<button id="previewButton" type="button" class="button w-auto bg-theme-11 text-white flex items-center py-3 mr-1" onClick="popUp();">
                <i data-feather="eye" class="h-5 w-5 inline-block mr-2"></i> Preview
            </button>

<script language="JavaScript">
<!--
var wi=null;
function popUp(){
	if (wi) wi.close();		
		var _txt1 = $("#txtnama").val();
		var _txt2 = $("#cbopekerjaan").val();		
		var _txt3 = $("#txtalamat").val();		
		var _txt4 = $("#txtnotanah").val();
		var _txt5 = $("#txtlstanah").val();
		var _txt6 = $("#txtpemilik").val();
		var _txt7 = $("#txtletak").val();		
		var _txt8 = $("#txtrt").val();
		var _txt9 = $("#txtdesa").val();
		var _txt10 = $("#txtpondasi").val();
		var _txt11 = $("#txtlantai").val();
		var _txt12 = $("#txttiang").val();
		var _txt13 = $("#txtdinding").val();		
		var _txt14 = $("#txtr_atap").val();
		var _txt15 = $("#txttutup_atap").val();
		var _txt16 = $("#txtfungsi").val();
		var _txt17 = $("#txtpelaksana").val();
		var _txt18 = $("#txtpembuangan").val();
		
		var queryString = "?txt1=" + _txt1 + "&txt2=" + _txt2 + "&txt3=" + _txt3 + "&txt4=" + _txt4 + "&txt5=" + _txt5 + "&txt6=" + _txt6 + "&txt7=" + _txt7 + "&txt8=" + _txt8 + "&txt9=" + _txt9 + "&txt10=" + _txt10 + "&txt11=" + _txt11 + "&txt12=" + _txt12 + "&txt13=" + _txt13 + "&txt14=" + _txt14 + "&txt15=" + _txt15 + "&txt16=" + _txt16 + "&txt17=" + _txt17 + "&txt18=" + _txt18;
		wi=window.open("s_pembangunan_preview.php" + queryString,"","width=700,height=600,location=no,scrollbars=no,status=no");
}
//-->
</script>
        <button type="submit" class="button w-auto bg-theme-1 text-white flex items-center py-3 ml-1" id="btnsimpan" name="btnsimpan">
            <i data-feather="save" class="h-5 w-5 inline-block mr-2"></i> Simpan Data
        </button>
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

<script type="text/javascript">
var uploadField = document.getElementById("gambar");
uploadField.onchange = function() {
    if(this.files[0].size > 5000000){ // ini untuk ukuran 800KB, 1000000 untuk 1 MB.
       alert("Maaf. File Terlalu Besar ! Maksimal Upload 5 Mb");
       this.value = "";
    };
};
</script>

    </body>
</html>

<?php
	}
?>
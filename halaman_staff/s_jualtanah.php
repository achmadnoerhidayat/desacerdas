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
	
	$data = mysqli_query($koneksi,"SELECT * FROM tbpengaturan_surat WHERE id_kel='$kd_kel' and id_kategori='5'");
	$cek = mysqli_num_rows($data);
	if($cek > 0){	
		$cari_kd=mysqli_query($koneksi,"SELECT id, alamat, tempat, jabatan, nama, nip, no_pengaturan FROM tbpengaturan_surat WHERE id_kel='$kd_kel' and id_kategori='5'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$nip_jwb=$tm_cari['nip'];
		$nm_jwb=$tm_cari['nama'];
		$jabatan=$tm_cari['jabatan'];
		$alamat=$tm_cari['alamat'];	
		$no_pengaturan=$tm_cari['no_pengaturan'];
	} else {
		echo"<script>window.alert('Pengaturan Surat Keterangan Jual Tanah Belum ada. Silahkan Buat Pengaturan Suratnya.');window.location=('pengaturan_surat.php');</script>";		
	}

	if(isset($_POST['btnsimpan'])) {	
		function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[2],$pisah[0],$pisah[1]);
		$satukan = implode('-',$urutan);
		return $satukan;
		}
		
		$txttgltrx = ubahformatTgl($_POST['date_of_birth']); 
		$txttgldp = ubahformatTgl($_POST['date_of_birth1']); 
		$txttglbyrbln = ubahformatTgl($_POST['date_of_birth2']); 
		$txttglcicilan1 = ubahformatTgl($_POST['date_of_birth3']); 
		$txttglcicilan2 = ubahformatTgl($_POST['date_of_birth4']); 
		$txttgllahirs1 = ubahformatTgl($_POST['date_of_birth5']); 
		$txttgllahirs2 = ubahformatTgl($_POST['date_of_birth6']); 
		
		// ===== Header ==========+
		$cbokel = $_POST['txtkdkel'];
		$txtnama = $_POST['txtnama'];
		$title="SURAT KETERANGAN JUAL TANAH ".$txtnama;
							
		// ======= Pihak I ============
		$txtumur = $_POST['txtumur'];
		$cbopekerjaan = $_POST['cbopekerjaan'];
		$txtalamat = $_POST['txtalamat'];	

		// ======= Pihak II ============		
		$txtnama1 = $_POST['txtnama1'];
		$txtumur1 = $_POST['txtumur1'];
		$cbopekerjaan1 = $_POST['cbopekerjaan1'];
		$txtalamat1 = $_POST['txtalamat1'];

		// ======= Data Transaksi ============

		$txtharga_m = $_POST['txtharga_m'];
		$txtharga_tot = $_POST['txtharga_tot'];
		$jenis_pembayaran= $_POST['cbojbayar'];
		$durasi_bayar= $_POST['txtdurasi'];
		$durasi_bayar_pilih= $_POST['cbodurasi'];
		$durasi_sertifikat= $_POST['txtdurasi1'];
		$durasi_sertifikat_pilih= $_POST['cbodurasi1'];
							
		// ======= Data Sertifikat ============
		$txthak= $_POST['txthak'];
		$txtnosertifikat= $_POST['txtnosertifikat'];
		$txtalamat_sertifikat= $_POST['txtalamat_sertifikat'];
		$txthibah1 = $_POST['txthibah1'];
		$txthibah2 = $_POST['txthibah2'];
		$txthibah3 = $_POST['txthibah3'];		
		$txtbatas1 = $_POST['txtbatas1'];
		$txtbatas2 = $_POST['txtbatas2'];
		$txtbatas3 = $_POST['txtbatas3'];
		$txtbatas4 = $_POST['txtbatas4'];
							
		// ======= Data Pembayaran ============
		$txtdp= $_POST['txtdp'];
		$txtjangka_cicilan= $_POST['txtjangka'];
		$txtjangka_cicilan_pilih= $_POST['cbodurasi2'];
		
		$cbojbayar1= $_POST['cbojbayar1'];		
		$txtcicilan1rp= $_POST['txtcicilan1rp'];
		$txtcicilan2rp= $_POST['txtcicilan2rp'];
							
		// ===== Data Saksi I =========== 
		$txtnamasaksi1= $_POST['txtnamasaksi1'];
		$txttempatlhrs1= $_POST['txttempatlhrs1'];
		$cbopekerjaans1= $_POST['cbopekerjaans1'];
		$txtalamats1= $_POST['txtalamats1'];
		$txthubs1= $_POST['txthubs1'];

		// ===== Data Saksi II =========== 
		$txtnamasaksi2= $_POST['txtnamasaksi2'];
		$txttempatlhrs2= $_POST['txttempatlhrs2'];
		$cbopekerjaans2= $_POST['cbopekerjaans2'];
		$txtalamats2= $_POST['txtalamats2'];
		$txthubs2= $_POST['txthubs2']; 

		$txtpenyelesaian= $_POST['txtpenyelesaian'];

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
						FROM tbbuatsurat WHERE id_kel='$kd_kel' and id_kategori='5' and 
						month(tgl_surat)='$bln_skr' and year(tgl_surat)='$thn_skr'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$total=$tm_cari['total'];
		$nourut=$total+1;

		$txtno = $nourut."/".$nourut."/".$no_pengaturan."/".$bln_rome."/".$thn_skr;
		
		mysqli_query($koneksi,"INSERT INTO tbbuatsurat 
							(nomor_surat, tgl_surat, title_surat, id_kel, id_kategori, 
							nama, kd_pekerjaan, alamat, fld_umur1,  
							nama1, kd_pekerjaan1, alamat1, fld_umur2,
							tgl_trx, fld_harga, fld_total, fld_jbayar, 
							fld_durasi,fld_durasi_pilih, fld_lamaserah,fld_lamaserah_pilih,
							fld_hak,fld_noserti,fld_alamatserti,fld_hibah1, fld_hibah2, fld_hibah3,
							fld_batas1, fld_batas2, fld_batas3, fld_batas4, 
							fld_dp, fld_tgldp, fld_lamacicil, fld_lamacicil_pilih, 
							fld_bayartiap, fld_carabyr, fld_cicil_awal, fld_cicil_akhir, fld_cicil_awalrp, fld_cicil_akhirrp, 
							fld_saksi1, fld_saksi_tempat1, fld_saksi_tgllahir1, fld_saksi_pekerjaan1, fld_saksi_alamat1, fld_saksi_hub1, 
							fld_saksi2, fld_saksi_tempat2, fld_saksi_tgllahir2, fld_saksi_pekerjaan2, fld_saksi_alamat2, fld_saksi_hub2,							
							fld_penyelesaian) 
							Values 
							('$txtno','$tgl_skr_eng','$title','$cbokel','5',
							'$txtnama','$cbopekerjaan','$txtalamat','$txtumur',
							'$txtnama1','$cbopekerjaan1','$txtalamat1','$txtumur1',
							'$txttgltrx','$txtharga_m','$txtharga_tot','$jenis_pembayaran',
							'$durasi_bayar','$durasi_bayar_pilih','$durasi_sertifikat','$durasi_sertifikat_pilih',
							'$txthak','$txtnosertifikat','$txtalamat_sertifikat','$txthibah1','$txthibah2','$txthibah3',
							'$txtbatas1','$txtbatas2','$txtbatas3','$txtbatas4',
							'$txtdp','$txttgldp','$txtjangka_cicilan','$txtjangka_cicilan_pilih',
							'$txttglbyrbln','$cbojbayar1','$txttglcicilan1','$txttglcicilan2','$txtcicilan1rp','$txtcicilan2rp',
							'$txtnamasaksi1','$txttempatlhrs1','$txttgllahirs1','$cbopekerjaans1','$txtalamats1','$txthubs1',
							'$txtnamasaksi2','$txttempatlhrs2','$txttgllahirs2','$cbopekerjaans2','$txtalamats2','$txthubs2',
							'$txtpenyelesaian')");
							
		echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('layanan_surat.php');</script>";		
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
        <h2 class="text-lg font-medium mr-auto">Layanan Surat - Form Buat Surat Keterangan Jual Tanah</h2>
    </div>

    <form action="" method="POST">
		<input type="hidden" name="txtkdkel" value="<?php echo $kd_kel; ?>"/>
        <!-- Data Pihak -->
        <div class="box intro-y p-5 mt-2">
            <div class="flex">
                <div class="flex-row items-center w-1/3 mr-2">
                    <div class="w-full border-b border-gray-300 pb-3">
                        <h4 class="text-lg font-medium mr-auto">Pihak Pertama (I) / Penjual</h4>
                    </div>

                    <div class="w-full mt-4">
                        <label class="mb-2 block">Nama Lengkap</label>
                        <input type="text" class="input w-full border mt-2" id="txtnama" name="txtnama" autocomplete="off" required>
                    </div>

                    <div class="w-full mt-4">
                        <label class="mb-2 block">Umur</label>
                        <input type="text" class="input w-full border mt-2" id="txtumur" name="txtumur" autocomplete="off" required>
                    </div>

                    <div class="w-full mt-4">
                        <label class="mb-4 block">Pekerjaan</label>
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
                        <label class="mb-2 block">Alamat</label>
						<textarea class="input w-full border mt-2" id="txtalamat" name="txtalamat" required autocomplete="off"></textarea>
                    </div>
                </div>

                <div class="flex-row items-center w-1/3 mx-2">
                    <div class="w-full border-b border-gray-300 pb-3">
                        <h4 class="text-lg font-medium mr-auto">Pihak Pertama (II) / Pembeli</h4>
                    </div>

                    <div class="w-full mt-4">
                        <label class="mb-2 block">Nama Lengkap</label>
                        <input type="text" class="input w-full border mt-2" id="txtnama1" name="txtnama1" autocomplete="off" required>
                    </div>

                    <div class="w-full mt-4">
                        <label class="mb-2 block">Umur</label>
                        <input type="text" class="input w-full border mt-2" id="txtumur1" name="txtumur1" autocomplete="off" required>
                    </div>

                    <div class="w-full mt-4">
                        <label class="mb-4 block">Pekerjaan</label>
                        <select class="input pr-12 w-full border col-span-4" name="cbopekerjaan1" id="cbopekerjaan1" required>
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
                        <label class="mb-2 block">Alamat</label>
						<textarea class="input w-full border mt-2" id="txtalamat1" name="txtalamat1" required autocomplete="off"></textarea>						
                    </div>
                </div>

                <div class="flex-row items-center w-1/3 ml-2">
                    <div class="w-full border-b border-gray-300 pb-3">
                        <h4 class="text-lg font-medium mr-auto">Data Transaksi</h4>
                    </div>

                    <div class="w-full mt-4">
                        <label class="mb-4 block">Tanggal</label>
						<input name="date_of_birth" id="date_of_birth" class="datepicker input w-full border block mx-auto" data-single-mode="true" >
                    </div>
                    <div class="w-full mt-4">
                        <label class="mb-2 block">Harga / M<sup>2</sup></label>
                        <input type="text" class="input w-full border mt-2" id="txtharga_m" name="txtharga_m" autocomplete="off" required>
                    </div>
                    <div class="w-full mt-4">
                        <label class="mb-2 block">Total Harga</label>
                        <input type="text" class="input w-full border mt-2" id="txtharga_tot" name="txtharga_tot" autocomplete="off" required>
                    </div>

                    <div class="flex mt-4">
                        <div class="w-1/3 mr-2">
                            <label class="mb-4 block">Jenis Pembayaran</label>
								<select class="input pr-12 w-full border col-span-4" name="cbojbayar" id="cbojbayar" required>
									<?php
										$sql="select jenis_bayar FROM tbjenis_bayar order by id asc";
			       						$sql_row=mysqli_query($koneksi,$sql);
			       						while($sql_res=mysqli_fetch_assoc($sql_row))	
											{
									?>
									<option value="<?php echo $sql_res["jenis_bayar"]; ?>"><?php echo $sql_res["jenis_bayar"]; ?></option>
			       					<?php
			       						}
			       					?>					
								</select>
                        </div>
                        <div class="w-2/3 ml-2">
                            <label class="mb-4 block">Durasi Waktu Pembayaran</label>
                            <div class="flex">
                                <div class="w-1/2 mr-2">
									<input type="text" class="input w-full border mt-4" id="txtdurasi" name="txtdurasi" autocomplete="off" required>
                                </div>
                                <div class="w-1/2 ml-2">
									<select class="input pr-12 w-full border col-span-4" name="cbodurasi" id="cbodurasi" required>
										<?php
											$sql="select durasi FROM tbdurasi order by id asc";
											$sql_row=mysqli_query($koneksi,$sql);
											while($sql_res=mysqli_fetch_assoc($sql_row))	
												{
										?>
										<option value="<?php echo $sql_res["durasi"]; ?>"><?php echo $sql_res["durasi"]; ?></option>
										<?php
											}
										?>					
									</select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex mt-4">
                        <div class="w-full ml-2">
                            <label class="mb-4 block">Penyerahan Sertifikat</label>
                            <div class="flex">
                                <div class="w-1/2 mr-2">
									<input type="text" class="input w-full border mt-2" id="txtdurasi1" name="txtdurasi1" autocomplete="off" required>
                                </div>
                                <div class="w-1/2 ml-2">
									<select class="input pr-12 w-full border col-span-4" name="cbodurasi1" id="cbodurasi1" required>
										<?php
											$sql="select durasi FROM tbdurasi order by id asc";
											$sql_row=mysqli_query($koneksi,$sql);
											while($sql_res=mysqli_fetch_assoc($sql_row))	
												{
										?>
										<option value="<?php echo $sql_res["durasi"]; ?>"><?php echo $sql_res["durasi"]; ?></option>
										<?php
											}
										?>					
									</select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Sertikat -->
        <div class="box intro-y p-5 mt-4">
            <div class="w-full border-b border-gray-300 pb-3">
                <div class="flex justify-between">
                    <h4 class="text-lg font-medium mr-auto">Data Sertifikat</h4>
                </div>
            </div>

            <div class="flex">
                <div class="flex-row items-center w-1/3 mr-2">
                    <div class="w-full mt-4">
                        <label class="mb-2 block">Hak Penjual atas Tanah</label>
                        <input type="text" class="input w-full border mt-2" id="txthak" name="txthak" autocomplete="off" required>
                    </div>
                    <div class="w-full mt-4">
                        <label class="mb-2 block">Nomor Sertifikat</label>
                        <input type="text" class="input w-full border mt-2" id="txtnosertifikat" name="txtnosertifikat" autocomplete="off" required>
                    </div>

                    <div class="w-full mt-4">
                        <label class="mb-2 block">Alamat Tertulis di Sertifikat</label>
						<textarea class="input w-full border mt-2" id="txtalamat_sertifikat" name="txtalamat_sertifikat" required autocomplete="off"></textarea>						
                    </div>
                </div>

                <!-- Detail Tanah -->
                <div class="grant_type_target flex-row items-center w-2/3 mx-2">
                    <div class="w-full mt-4">
                        <label class="mb-4 block">Detail Tanah</label>
                    </div>

                    <div class="flex">
                        <div class="relative mr-2">
                            <input type="number" name="txthibah1" id="txthibah1" class="input border col-span-4" placeholder="Panjang Tanah">
                            <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100  border text-gray-600">M</div>
                        </div>
                        <div class="relative mx-2">
                            <input type="number" name="txthibah2" id="txthibah2" class="input border col-span-4" placeholder="Lebar Tanah">
                            <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100  border text-gray-600">M</div>
                        </div>
                        <div class="relative ml-2">
                            <input type="number" name="txthibah3" id="txthibah3" class="input border col-span-4" placeholder="Luas Tanah">
                            <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100  border text-gray-600">M<sup>2</sup></div>
                        </div>
                    </div>

                    <div class="w-full mt-4">
                        <label class="mb-2 block">Batas - batas : </label>
                    </div>

                    <div class="flex-row mt-2">
                        <div class="w-full">
                            <input type="text" class="input w-full border mt-2" id="txtbatas1" name="txtbatas1" autocomplete="off" required placeholder="Sebelah Timur berbatasan dengan">
                        </div>
                        <div class="w-full mt-4">
							<input type="text" class="input w-full border mt-2" id="txtbatas2" name="txtbatas2" autocomplete="off" required placeholder="Sebelah Barat berbatasan dengan">
                        </div>
                        <div class="w-full mt-4">
							<input type="text" class="input w-full border mt-2" id="txtbatas3" name="txtbatas3" autocomplete="off" required placeholder="Sebelah Utara berbatasan dengan">						
                        </div>
                        <div class="w-full mt-4">
							<input type="text" class="input w-full border mt-2" id="txtbatas4" name="txtbatas4" autocomplete="off" required placeholder="Sebelah Selatan berbatasan dengan">						
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Pembayaran -->
        <div class="box intro-y p-5 mt-4">
            <div class="w-full border-b border-gray-300 pb-3">
                <div class="flex justify-between">
                    <h4 class="text-lg font-medium mr-auto">Data Pembayaran</h4>
                </div>
            </div>

            <div class="flex">
                <div class="flex-row w-1/3 mr-2 mt-4">
                    <div class="flex w-full">
                        <div class="w-1/3 mr-2">
                            <label class="mb-2 block">Uang Muka/DP</label>
                            <div class="relative">
								<input type="text" class="input w-full border mt-2" id="txtdp" name="txtdp" autocomplete="off" required>
                                <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">%</div>
                            </div>
                        </div>
                        <div class="w-2/3 ml-2">
                            <label class="mb-2 block">Tanggal Penyerahan DP</label>
						<input name="date_of_birth1" id="date_of_birth1" class="datepicker input w-full border block mx-auto" data-single-mode="true" >
                        </div>
                    </div>
                </div>

                <div class="flex-row w-1/3 mx-2 mt-4">
                    <div class="flex w-full">
                        <div class="w-2/3 mr-2">
                            <label class="mb-2 block">Lama jangka waktu cicilan</label>
								<input type="text" class="input w-full border mt-2" id="txtjangka" name="txtjangka" autocomplete="off" required>
                        </div>
                        <div class="w-1/3 ml-2">
                            <label class="mb-2 block">&nbsp;</label>
									<select class="input pr-12 w-full border col-span-4" name="cbodurasi2" id="cbodurasi2" required>
										<?php
											$sql="select durasi FROM tbdurasi where id<>'1' order by id asc";
											$sql_row=mysqli_query($koneksi,$sql);
											while($sql_res=mysqli_fetch_assoc($sql_row))	
												{
										?>
										<option value="<?php echo $sql_res["durasi"]; ?>"><?php echo $sql_res["durasi"]; ?></option>
										<?php
											}
										?>					
									</select>
                        </div>
                    </div>
                </div>

                <div class="flex-row w-1/3 ml-2 mt-4">
                    <div class="flex w-full">
                        <div class="w-1/2 mr-2">
                            <label class="mb-2 block">Pembayaran tiap Tanggal</label>
						<input name="date_of_birth2" id="date_of_birth2" class="datepicker input w-full border block mx-auto" data-single-mode="true" >
                        </div>
                        <div class="w-1/3 ml-2">
                            <label class="mb-2 block">&nbsp;</label>
								<select class="input pr-12 w-full border col-span-4" name="cbojbayar1" id="cbojbayar1" required>
									<?php
										$sql="select jenis_bayar FROM tbjenis_bayar where id<>'2' order by id asc";
			       						$sql_row=mysqli_query($koneksi,$sql);
			       						while($sql_res=mysqli_fetch_assoc($sql_row))	
											{
									?>
									<option value="<?php echo $sql_res["jenis_bayar"]; ?>"><?php echo $sql_res["jenis_bayar"]; ?></option>
			       					<?php
			       						}
			       					?>					
								</select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex">
                <div class="flex-row w-1/2 mr-2 mt-4">
                    <div class="flex w-full">
                        <div class="w-1/2 mr-2">
                            <label class="mb-2 block">Cicilan Pertama</label>
								<input type="text" class="input w-full border mt-2" id="txtcicilan1rp" name="txtcicilan1rp" autocomplete="off" required>
                        </div>
                        <div class="w-1/2 ml-2">
                            <label class="mb-2 block">Tanggal</label>
						<input name="date_of_birth3" id="date_of_birth3" class="datepicker input w-full border block mx-auto" data-single-mode="true" >
                        </div>
                    </div>
                </div>

                <div class="flex-row w-1/2 mr-2 mt-4">
                    <div class="flex w-full">
                        <div class="w-1/2 mr-2">
                            <label class="mb-2 block">Cicilan Terakhir</label>
								<input type="text" class="input w-full border mt-2" id="txtcicilan2rp" name="txtcicilan2rp" autocomplete="off" required>
                        </div>
                        <div class="w-1/2 ml-2">
                            <label class="mb-2 block">Tanggal</label>
						<input name="date_of_birth4" id="date_of_birth4" class="datepicker input w-full border block mx-auto" data-single-mode="true" >
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Jaminan dan Saksi - Saksi -->
        <div class="box intro-y p-5 mt-4">
            <div class="w-full border-b border-gray-300 pb-3">
                <div class="flex justify-between">
                    <h4 class="text-lg font-medium mr-auto">Data Jaminan dan Saksi - Saksi</h4>
                </div>
            </div>

            <div class="flex mt-4">
                <div class="flex-row items-center w-1/2 mr-2">
                    <div class="w-full border-b border-gray-300 pb-3">
                        <h4 class="text-lg font-medium mr-auto">Saksi Pertama (I)</h4>
                    </div>

                    <div class="w-full mt-4">
                        <label class="mb-2 block">Nama Lengkap</label>
                         <input type="text" class="input w-full border mt-2" id="txtnamasaksi1" name="txtnamasaksi1" autocomplete="off" required>
                    </div>

                    <div class="w-full mt-4">
                        <label class="mb-2 block">Tempat, Tanggal Lahir</label>

                        <div class="flex">
                            <div class="w-1/2 mr-2">
                                <input type="text" class="input w-full border mt-2" id="txttempatlhrs1" name="txttempatlhrs1" autocomplete="off" required>
                            </div>
                            <div class="w-1/2 ml-2">
						<input name="date_of_birth5" id="date_of_birth5" class="datepicker input w-full border block mx-auto" data-single-mode="true" >
                            </div>
                        </div>
                    </div>

                    <div class="w-full mt-4">
                        <label class="mb-2 block">Pekerjaan</label>
                        <select class="input pr-12 w-full border col-span-4" name="cbopekerjaans1" id="cbopekerjaans1" required>
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
                        <label class="mb-2 block">Alamat</label>
						<textarea class="input w-full border mt-2" id="txtalamats1" name="txtalamats1" required autocomplete="off"></textarea>						
                    </div>

                    <div class="w-full mt-4">
                        <label class="mb-2 block">Hubungan Kekerabatan</label>
                        <input type="text" class="input w-full border mt-2" id="txthubs1" name="txthubs1" autocomplete="off" required>
                    </div>
                </div>

                <div class="flex-row items-center w-1/2 ml-2">
                    <div class="w-full border-b border-gray-300 pb-3">
                        <h4 class="text-lg font-medium mr-auto">Saksi Pertama (II)</h4>
                    </div>

                    <div class="w-full mt-4">
                        <label class="mb-2 block">Nama Lengkap</label>
                         <input type="text" class="input w-full border mt-2" id="txtnamasaksi2" name="txtnamasaksi2" autocomplete="off" required>
                    </div>

                    <div class="w-full mt-4">
                        <label class="mb-2 block">Tempat, Tanggal Lahir</label>

                        <div class="flex">
                            <div class="w-1/2 mr-2">
                                <input type="text" class="input w-full border mt-2" id="txttempatlhrs2" name="txttempatlhrs2" autocomplete="off" required>
                            </div>
                            <div class="w-1/2 ml-2">
						<input name="date_of_birth6" id="date_of_birth6" class="datepicker input w-full border block mx-auto" data-single-mode="true" >
                            </div>
                        </div>
                    </div>

                    <div class="w-full mt-4">
                        <label class="mb-2 block">Pekerjaan</label>
                        <select class="input pr-12 w-full border col-span-4" name="cbopekerjaans2" id="cbopekerjaans2" required>
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
                        <label class="mb-2 block">Alamat</label>
						<textarea class="input w-full border mt-2" id="txtalamats2" name="txtalamats2" required autocomplete="off"></textarea>						
                    </div>

                    <div class="w-full mt-4">
                        <label class="mb-2 block">Hubungan Kekerabatan</label>
                        <input type="text" class="input w-full border mt-2" id="txthubs2" name="txthubs2" autocomplete="off" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="box intro-y p-5 mt-4">
            <div class="w-full border-b border-gray-300 pb-3">
                <div class="flex justify-between">
                    <h4 class="text-lg font-medium mr-auto">Penyelesaian Perselisihan</h4>
                </div>
            </div>

            <div class="flex mt-4">
                <div class="w-1/2">
                    <label class="mb-2 block">Penyelesaian Permasalahan di :</label>
					<textarea class="input w-full border mt-2" id="txtpenyelesaian" name="txtpenyelesaian" required autocomplete="off"></textarea>
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

		var _txt1 = $("#date_of_birth").val();	
		var _txt2 = $("#date_of_birth1").val();		
		var _txt3 = $("#date_of_birth2").val();
		var _txt4 = $("#date_of_birth3").val();
		var _txt5 = $("#date_of_birth4").val();
		var _txt6 = $("#date_of_birth5").val();
		var _txt7 = $("#date_of_birth6").val();

		var _txt8 = $("#txtnama").val();
		var _txt9 = $("#txtumur").val();
		var _txt10 = $("#cbopekerjaan").val();
		var _txt11 = $("#txtalamat").val();
		var _txt12 = $("#txtnama1").val();
		var _txt13 = $("#txtumur1").val();
		var _txt14 = $("#cbopekerjaan1").val();
		var _txt15 = $("#txtalamat1").val();
		
		var _txt16 = $("#txtharga_m").val();
		var _txt17 = $("#txtharga_tot").val();
		var _txt18 = $("#cbojbayar").val();
		var _txt19 = $("#txtdurasi").val();
		var _txt20 = $("#cbodurasi").val();
		var _txt21 = $("#txtdurasi1").val();
		var _txt22 = $("#cbodurasi1").val();
		
		var _txt23 = $("#txthak").val();
		var _txt24 = $("#txtnosertifikat").val();		
		var _txt25 = $("#txtalamat_sertifikat").val();
		var _txt26 = $("#txthibah1").val();
		var _txt27 = $("#txthibah2").val();
		var _txt28 = $("#txthibah3").val();
		var _txt29 = $("#txtbatas1").val();
		var _txt30 = $("#txtbatas2").val();
		var _txt31 = $("#txtbatas3").val();
		var _txt32 = $("#txtbatas4").val();

		var _txt33 = $("#txtdp").val();
		var _txt34 = $("#txtjangka").val();
		var _txt35 = $("#cbodurasi2").val();
		
		var _txt36 = $("#cbojbayar1").val();
		var _txt37 = $("#txtcicilan1rp").val();
		var _txt38 = $("#txtcicilan2rp").val();
		
		var _txt39 = $("#txtnamasaksi1").val();
		var _txt40 = $("#txttempatlhrs1").val();
		var _txt41 = $("#cbopekerjaans1").val();
		var _txt42 = $("#txtalamats1").val();
		var _txt43 = $("#txthubs1").val();
		
		var _txt44 = $("#txtnamasaksi2").val();
		var _txt45 = $("#txttempatlhrs2").val();
		var _txt46 = $("#cbopekerjaans2").val();
		var _txt47 = $("#txtalamats2").val();
		var _txt48 = $("#txthubs2").val();
		
		var _txt49 = $("#txtpenyelesaian").val();

		var queryString = "?txt1=" + _txt1 + "&txt2=" + _txt2 + "&txt3=" + _txt3 + "&txt4=" + _txt4 + "&txt5=" + _txt5 + "&txt6=" + _txt6 + "&txt7=" + _txt7 + "&txt8=" + _txt8 + "&txt9=" + _txt9 + "&txt10=" + _txt10 + "&txt11=" + _txt11 + "&txt12=" + _txt12 + "&txt13=" + _txt13 + "&txt14=" + _txt14 + "&txt15=" + _txt15 + "&txt16=" + _txt16 + "&txt17=" + _txt17 + "&txt18=" + _txt18 + "&txt19=" + _txt19 + "&txt20=" + _txt20 + "&txt21=" + _txt21 + "&txt22=" + _txt22 + "&txt23=" + _txt23 + "&txt24=" + _txt24 + "&txt25=" + _txt25 + "&txt26=" + _txt26 + "&txt27=" + _txt27 + "&txt28=" + _txt28 + "&txt29=" + _txt29 + "&txt30=" + _txt30 + "&txt31=" + _txt31 + "&txt32=" + _txt32 + "&txt33=" + _txt33 + "&txt34=" + _txt34 + "&txt35=" + _txt35 + "&txt36=" + _txt36 + "&txt37=" + _txt37 + "&txt38=" + _txt38 + "&txt39=" + _txt39 + "&txt40=" + _txt40 + "&txt41=" + _txt41 + "&txt42=" + _txt42 + "&txt43=" + _txt43 + "&txt44=" + _txt44 + "&txt45=" + _txt45 + "&txt46=" + _txt46 + "&txt47=" + _txt47 + "&txt48=" + _txt48 + "&txt49=" + _txt49;
		wi=window.open("s_jualtanah_preview.php" + queryString,"","width=700,height=600,location=no,scrollbars=no,status=no");
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
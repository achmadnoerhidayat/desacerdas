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
	
	$kd_kec=substr($kd_kel,0,8);
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kec'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kec=$tm_cari['nama'];
		
	if(isset($_POST['submit1'])) {
		$txtnik = $_POST['txtnik'];	
		$ktp = $_POST['vertical_radio_button'];
		$txtpassport = $_POST['txtpassport'];
		$txtkitap = $_POST['txtkitap'];
		if($ktp=='Belum E-KTP') {
			$ket_ktp1="";
			$ket_ktp2="";
			mysqli_query($koneksi,"UPDATE tbpenduduk 
							SET ktp='$ktp', ktp_ket1='$ket_ktp1', ktp_ket2='$ket_ktp2', passport='$txtpassport', kitap='$txtkitap' WHERE nik='$txtnik'");
		}
		if($ktp=='Sudah E-KTP') {
			$ket_ktp1=$_POST['txtktp1'];
			$ket_ktp2=$_POST['txttgl1'];
			mysqli_query($koneksi,"UPDATE tbpenduduk 
							SET ktp='$ktp', ktp_ket1='$ket_ktp1', ktp_ket2='$ket_ktp2', passport='$txtpassport', kitap='$txtkitap' WHERE nik='$txtnik'");
		}

			$txtnikayah = "";
			$txtnmayah = "";
			$txtnikibu = "";
			$txtnmibu = "";
			$txtstatushub = "";
			$txtniksuami = "";
			$txtnmsuami = "";
			$txtket = "";
	}		
	
	if(isset($_POST['submit2'])) 
		{
			$txtnik = $_POST['txtnik1'];
			
			$txtnikayah = $_POST['txtnikayah'];
			$txtnmayah = $_POST['txtnmayah'];
			$txtnikibu = $_POST['txtnikibu'];
			$txtnmibu = $_POST['txtnmibu'];
			$txtstatushub = $_POST['txtstatushub'];
			$txtniksuami = $_POST['txtniksuami'];
			$txtnmsuami = $_POST['txtnmsuami'];
			$txtket = $_POST['txtket'];
		
			$txtniksaudara = $_POST['txtniksaudara'];
			$txtnmsaudara = $_POST['txtnmsaudara'];
			mysqli_query($koneksi,"INSERT INTO tbpenduduk_saudara (nik, nik_saudara, nm_saudara) VALUES ('$txtnik','$txtniksaudara','$txtnmsaudara')");		
			mysqli_query($koneksi,"UPDATE tbpenduduk 
							SET nik_ayah='$txtnikayah', nm_ayah='$txtnmayah', 
							nik_ibu='$txtnikibu', nm_ibu='$txtnmibu', status_hub='$txtstatushub', 
							nik_suami_istri='$txtniksuami', nm_suami_istri='$txtnmsuami', keterangan='$txtket' 
							WHERE nik='$txtnik'");

			$cari_kd=mysqli_query($koneksi,"select * from tbpenduduk WHERE nik='$txtnik'");
			$tm_cari=mysqli_fetch_array($cari_kd);
			$nik_ayah=$tm_cari['nik_ayah'];
			$nm_ayah=$tm_cari['nm_ayah'];
			$nik_ibu=$tm_cari['nik_ibu'];	
			$nm_ibu=$tm_cari['nm_ibu'];
			$txtstatushub = $tm_cari['status_hub'];
			$nik_suami_istri=$tm_cari['nik_suami_istri'];
			$nm_suami_istri=$tm_cari['nm_suami_istri']; 
			$txtket = $tm_cari['keterangan'];
		}
	else if(isset($_POST['submit3'])) // cek bila yang diklik adalah tombol Pengurangan (submit2)
		{	
			$txtnik = $_POST['txtnik2'];
			
			$txtnikayah = $_POST['txtnikayah'];
			$txtnmayah = $_POST['txtnmayah'];
			$txtnikibu = $_POST['txtnikibu'];
			$txtnmibu = $_POST['txtnmibu'];
			$txtstatushub = $_POST['txtstatushub'];
			$txtniksuami = $_POST['txtniksuami'];
			$txtnmsuami = $_POST['txtnmsuami'];
			$txtket = $_POST['txtket'];
		
			$txtnikanak = $_POST['txtnikanak'];
			$txtnmanak = $_POST['txtnmanak'];
			mysqli_query($koneksi,"INSERT INTO tbpenduduk_anak (nik, nik_anak, nm_anak) VALUES ('$txtnik','$txtnikanak','$txtnmanak')");	
			mysqli_query($koneksi,"UPDATE tbpenduduk 
							SET nik_ayah='$txtnikayah', nm_ayah='$txtnmayah', 
							nik_ibu='$txtnikibu', nm_ibu='$txtnmibu', status_hub='$txtstatushub', 
							nik_suami_istri='$txtniksuami', nm_suami_istri='$txtnmsuami', keterangan='$txtket' 
							WHERE nik='$txtnik'");

			$cari_kd=mysqli_query($koneksi,"select * from tbpenduduk WHERE nik='$txtnik'");
			$tm_cari=mysqli_fetch_array($cari_kd);
			$nik_ayah=$tm_cari['nik_ayah'];
			$nm_ayah=$tm_cari['nm_ayah'];
			$nik_ibu=$tm_cari['nik_ibu'];	
			$nm_ibu=$tm_cari['nm_ibu'];
			$txtstatushub = $tm_cari['status_hub'];			
			$nik_suami_istri=$tm_cari['nik_suami_istri'];
			$nm_suami_istri=$tm_cari['nm_suami_istri']; 
			$txtket = $tm_cari['keterangan'];
		}
	else if(isset($_POST['submit4'])) // cek bila yang diklik adalah tombol Perkalian (submit3)
     {
		$txtnik = $_POST['txtnik3'];

		$txtnikayah = $_POST['txtnikayah'];
		$txtnmayah = $_POST['txtnmayah'];
		$txtnikibu = $_POST['txtnikibu'];
		$txtnmibu = $_POST['txtnmibu'];
		$txtniksuami = $_POST['txtniksuami'];
		$txtnmsuami = $_POST['txtnmsuami'];
		$txtstatushub = $_POST['txtstatushub'];
		$txtket = $_POST['txtket'];
	
		mysqli_query($koneksi,"UPDATE tbpenduduk 
							SET nik_ayah='$txtnikayah', nm_ayah='$txtnmayah', 
							nik_ibu='$txtnikibu', nm_ibu='$txtnmibu', 
							nik_suami_istri='$txtniksuami', nm_suami_istri='$txtnmsuami', status_hub='$txtstatushub', keterangan='$txtket' 
							WHERE nik='$txtnik'");
						
		echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('penduduk_input.php');</script>";
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

<?php include "menu_penduduk01.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> 
					<i data-feather="chevron-right" class="breadcrumb__icon"></i> 
					<a href="penduduk_daftar.php" class="">Kependudukan</a>
					<i data-feather="chevron-right" class="breadcrumb__icon"></i>
					<a href="#" class="breadcrumb--active">Input Data Kependudukan</a> </div>
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
						<table class="table table--sm" width="100%"> 
							<tr> 
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="25%">
									<font color="white">Data Diri</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="25%">
									<font color="white">Informasi Menetap Mutasi</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="25%">
									<font color="white">Kepemilikan E-KTP dan Dokumen</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="white" width="25%">
									<font color="black">Data Keluarga</font>
								</td>
							</tr> 
						</table>
						
<form class="form-horizontal" action="" method="post">
<input type="hidden" name="txtnik" value="<?php echo $txtnik; ?>"/>

	
<!-- BEGIN: Official Store -->
                        <div class="col-span-12 xl:col-span-8 mt-6">
							<div class="intro-y block sm:flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Status Hubungan Keluarga
                                </h2>
                            </div>
                            <div class="intro-y box p-5 mt-12 sm:mt-5">
								<div class="mt-3">
									<input type="text" class="input pr-12 w-full border col-span-4" id="txtstatushub" name="txtstatushub" 
									autocomplete="off" placeholder="Status Hubungan Dalam Keluarga" value="<?php echo $txtstatushub; ?>">
								</div>
                            </div>
							<br>
							
                            <div class="intro-y block sm:flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Data Orang Tua
                                </h2>
                            </div>
                            <div class="intro-y box p-5 mt-12 sm:mt-5">
                                <div><b>Ayah</b></div>
								<div class="mt-3">
									<input type="text" class="input pr-12 w-full border col-span-4" id="txtnikayah" name="txtnikayah" 
									autocomplete="off" required placeholder="NIK" value="<?php echo $txtnikayah; ?>">
								</div>
								<div class="mt-3">
									<input type="text" class="input pr-12 w-full border col-span-4" id="txtnmayah" name="txtnmayah" 
									autocomplete="off" required placeholder="Nama Ayah" value="<?php echo $txtnmayah; ?>">
								</div>
								<br>
								<div><b>Ibu</b></div>
								<div class="mt-3">
									<input type="text" class="input pr-12 w-full border col-span-4" id="txtnikibu" name="txtnikibu" 
									autocomplete="off" required placeholder="NIK" value="<?php echo $txtnikibu; ?>">
								</div>
								<div class="mt-3">
									<input type="text" class="input pr-12 w-full border col-span-4" id="txtnmibu" name="txtnmibu" 
									autocomplete="off" required placeholder="Nama Ibu" value="<?php echo $txtnmibu; ?>">
								</div>
                            </div>
							<br>
							<div class="intro-y block sm:flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Saudara
                                </h2>
                            </div>
                            <div class="intro-y box p-5 mt-12 sm:mt-5">
								<div class="mt-3">
									<input type="text" class="input pr-12 w-full border col-span-4" id="txtniksaudara" name="txtniksaudara" 
									autocomplete="off" placeholder="NIK">
								</div>
								<div class="mt-3">
									<input type="text" class="input pr-12 w-full border col-span-4" id="txtnmsaudara" name="txtnmsaudara" 
									autocomplete="off" placeholder="Nama Saudara">
								</div>
								<div class="mt-3">
									<div class="sm:grid grid-cols-4 gap-2">
										<div class="relative mt-2">
																			
										</div>
										<div class="relative mt-2">
																			
										</div>
										<div class="relative mt-2">
																			
										</div>
										<div class="relative mt-2 text-right">	
<input type="hidden" name="txtnik1" value="<?php echo $txtnik; ?>"/>										
											<button type="submit" name="submit2" class="button text-white bg-theme-1 shadow-md mr-2">+ Tambahkan</button>																			
										</div>
									</div>
								</div>
                            </div>

							<br>
							<div class="intro-y block sm:flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Suami/Istri
                                </h2>
                            </div>
                            <div class="intro-y box p-5 mt-12 sm:mt-5">
								<div class="mt-3">
									<input type="text" class="input pr-12 w-full border col-span-4" id="txtniksuami" name="txtniksuami" 
									autocomplete="off" placeholder="NIK" value="<?php echo $nik_suami_istri; ?>">
								</div>
								<div class="mt-3">
									<input type="text" class="input pr-12 w-full border col-span-4" id="txtnmsuami" name="txtnmsuami" 
									autocomplete="off" placeholder="Nama Suami/Istri" value="<?php echo $nm_suami_istri; ?>">
								</div>
                            </div>
							<br>
							<div class="intro-y block sm:flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Anak
                                </h2>
                            </div>
                            <div class="intro-y box p-5 mt-12 sm:mt-5">
								<div class="mt-3">
									<input type="text" class="input pr-12 w-full border col-span-4" id="txtnikanak" name="txtnikanak" 
									autocomplete="off" placeholder="NIK">
								</div>
								<div class="mt-3">
									<input type="text" class="input pr-12 w-full border col-span-4" id="txtnmanak" name="txtnmanak" 
									autocomplete="off" placeholder="Nama Anak">
								</div>
								<div class="mt-3">
									<div class="sm:grid grid-cols-4 gap-2">
										<div class="relative mt-2">
																			
										</div>
										<div class="relative mt-2">
																			
										</div>
										<div class="relative mt-2">
																			
										</div>
										<div class="relative mt-2 text-right">
											<input type="hidden" name="txtnik2" value="<?php echo $txtnik; ?>"/>
											<button type="submit" name="submit3" class="button text-white bg-theme-1 shadow-md mr-2">+ Tambahkan</button>
										</div>
									</div>
								</div>
                            </div>
							<br>
														<div class="intro-y block sm:flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Keterangan
                                </h2>
                            </div>
                            <div class="intro-y box p-5 mt-12 sm:mt-5">
								<div class="mt-3">
									<input type="text" class="input pr-12 w-full border col-span-4" id="txtket" name="txtket" 
									autocomplete="off" placeholder="Keterangan" value="<?php echo $txtket; ?>">
								</div>
                            </div>
                        </div>
                        <!-- END: Official Store -->
						
                    </div>
                </div>
				
				<table class="table table--sm" width="100%"> 
					<tr> 
						<td class="border text-center whitespace-no-wrap">
											<input type="hidden" name="txtnik3" value="<?php echo $txtnik; ?>"/>
							<button type="submit" name="submit4" class="button bg-theme-1 text-white mt-5">
							&nbsp;&nbsp;&nbsp;SIMPAN&nbsp;&nbsp;&nbsp;   
							</button>
						</td>
					</tr>
				</table>
				
				
				
				
				
				
				
				
				
            </div>
</form>
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
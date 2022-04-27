<?php
session_start();
	
	if($_SESSION['nip']==''){
		header("location:../index.php");
	} else {
		$kd_kel=$_SESSION['kodewil'];
		$nip=$_SESSION['nip'];
		$nm_user=$_SESSION['nm_user'];
		
	function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[2],$pisah[1],$pisah[0]);
		$satukan = implode('-',$urutan);
		return $satukan;
	}
	
	$tgl_skr=date('d/m/Y');
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
		$txtgllahir = ubahformatTgl($_POST['txtgllahir']);
		$txtnik = $_POST['txtnik'];
		$txtkk = $_POST['txtkk'];
		$txtnm = $_POST['txtnm'];
		$cbojk = $_POST['cbojk'];
		$txtalamat = $_POST['txtalamat'];
		$txtrt = $_POST['txtrt'];
		$txtrw = $_POST['txtrw'];
		$txttempatlhr = $_POST['txttempatlhr'];
		$cbostatus = $_POST['cbostatus'];
		$cboagama = $_POST['cboagama'];
		$cbodarah = $_POST['cbodarah'];
		$cbopekerjaan = $_POST['cbopekerjaan'];
		$cbowarga = $_POST['cbowarga'];
		$cbodukuh = $_POST['cbodukuh'];
		$cbopendidikan = $_POST['cbopendidikan'];
		$cbomembaca = $_POST['cbomembaca'];
		
		$data = mysqli_query($koneksi,"SELECT nik FROM tbpenduduk WHERE nik='$txtnik'"); 
		$cek = mysqli_num_rows($data);
		if($cek == 0){		
			mysqli_query($koneksi,"INSERT INTO tbpenduduk 
							(kode, nik, kk, nama, id_jk, alamat, rt, rw, 
							tempat_lhr, tgl_lhr, id_status_kawin, id_agama, id_gol_darah, 
							kd_pekerjaan, id_warga, id_dukuh, kd_pendidikan, kd_membaca) 	
							VALUES 
							('$kd_kel','$txtnik','$txtkk','$txtnm','$cbojk','$txtalamat','$txtrt','$txtrw',
							'$txttempatlhr','$txtgllahir','$cbostatus','$cboagama','$cbodarah',
							'$cbopekerjaan','$cbowarga','$cbodukuh','$cbopendidikan','$cbomembaca')");
		}
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
								<td class="border text-center whitespace-no-wrap" bgcolor="white" width="25%">
									<font color="black">Informasi Menetap Mutasi</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="25%">
									<font color="white">Kepemilikan E-KTP dan Dokumen</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="25%">
									<font color="white">Data Keluarga</font>
								</td>
							</tr> 
						</table>
						
<form class="form-horizontal" action="penduduk_input02.php" method="post">
<input type="hidden" name="txtnik" value="<?php echo $txtnik; ?>"/>
                        <div class="intro-y box">
                            <div class="p-5" id="input">
							
                                <div class="preview">
											
									<div class="mt-3">
										<div class="relative mt-2">
											<input type="radio" class="input border mr-2" id="Menetap" name="vertical_radio_button" value="Menetap">
											<label class="cursor-pointer select-none" for="vertical-radio-chris-evans">Menetap</label>
										</div>
									</div>

									<div class="mt-3">
										<div class="relative mt-2">
											<input type="radio" class="input border mr-2" id="Datang Dari" name="vertical_radio_button" value="Datang Dari">
											<label class="cursor-pointer select-none" for="vertical-radio-liam-neeson">Datang Dari</label>
										</div>
										<div class="relative mt-2">
											<input type="text" class="input pr-12 w-full border col-span-4" id="txtmenetap1" name="txtmenetap1" autocomplete="off">														
										</div>
										<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Tanggal Datang" 
												id="txttgl1" name="txttgl1" autocomplete="off" value="<?php echo $tgl_skr; ?>">
										</div>
										<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Maksud dan Tujuan" 
												id="txtmaksud" name="txtmaksud" autocomplete="off" >
										</div>
										<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Nama dan Alamat Yang didatangi" 
												id="txtdidatangi" name="txtdidatangi" autocomplete="off" >
										</div>
										<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Pergi Tanggal" 
												id="txttgl1a" name="txttgl1a" autocomplete="off" value="<?php echo $tgl_skr; ?>">
										</div>
									</div>	

									<div class="mt-3">
										<div class="relative mt-2">
											<input type="radio" class="input border mr-2" id="Lahir Di" name="vertical_radio_button" value="Lahir Di">
											<label class="cursor-pointer select-none" for="vertical-radio-daniel-craig">Lahir Di</label>
										</div>
										<div class="relative mt-2">
											<input type="text" class="input pr-12 w-full border col-span-4" id="txtmenetap2" name="txtmenetap2" autocomplete="off">
										</div>
									</div>	

									<div class="mt-3">
										<div class="relative mt-2">
											<input type="radio" class="input border mr-2" id="Pindah Ke" name="vertical_radio_button" value="Pindah Ke">
											<label class="cursor-pointer select-none" for="vertical-radio-daniel-craig">Pindah Ke</label>
										</div>
										<div class="relative mt-2">
											<input type="text" class="input pr-12 w-full border col-span-4" id="txtmenetap3" name="txtmenetap3" autocomplete="off">
										</div>
										<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Tanggal Pindah" 
												id="txttgl2" name="txttgl2" autocomplete="off" required value="<?php echo $tgl_skr; ?>">
										</div>
									</div>

									<div class="mt-3">
										<div class="relative mt-2">
											<input type="radio" class="input border mr-2" id="Meninggal" name="vertical_radio_button" value="Meninggal">
											<label class="cursor-pointer select-none" for="vertical-radio-daniel-craig">Meninggal</label>
										</div>
										<div class="relative mt-2">
											<input type="text" class="input pr-12 w-full border col-span-4" id="txtmenetap4" name="txtmenetap4" autocomplete="off">
										</div>
										<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Tanggal Meninggal" 
												id="txttglmeninggal" name="txttglmeninggal" autocomplete="off" required value="<?php echo $tgl_skr; ?>">
										</div>
										<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Jam Kematian" 
												id="txtjam" name="txtjam" autocomplete="off">
										</div>
									</div>									
									
									<div class="mt-3">
										<div class="relative mt-2">
											<input type="radio" class="input border mr-2" id="Hilang" name="vertical_radio_button" value="Hilang">
											<label class="cursor-pointer select-none" for="vertical-radio-daniel-craig">Hilang</label>
										</div>
										<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Tanggal Hilang" 
												id="txttglhilang" name="txttglhilang" autocomplete="off" required value="<?php echo $tgl_skr; ?>">
										</div>
									</div>									

								</div>
								
								
                            </div>
                        </div>
                    </div>
                </div>
				
				<table class="table table--sm" width="100%"> 
					<tr> 
						<td class="border text-center whitespace-no-wrap">
							<button type="submit" id="submit1" name="submit1" class="button bg-theme-1 text-white mt-5">
							&nbsp;&nbsp;&nbsp;Selanjutnya&nbsp;&nbsp;&nbsp;   
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
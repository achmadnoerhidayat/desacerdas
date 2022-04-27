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

	$id=$_POST['txtid'];
	//$txtform=$_POST['txtform'];
	$cari_kd=mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal from tbpenduduk WHERE id='$id'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$txtgllahir=$tm_cari['tanggal'];	
	$txtnik=$tm_cari['nik'];
	$txtkk=$tm_cari['kk'];
	$txtnm=$tm_cari['nama'];
	$cbojk=$tm_cari['id_jk'];
	$txtalamat = $tm_cari['alamat'];
	$txtrt = $tm_cari['rt'];
	$txtrw = $tm_cari['rw'];
	$txttempatlhr = $tm_cari['tempat_lhr'];
	$cbostatus = $tm_cari['id_status_kawin'];
	$cboagama = $tm_cari['id_agama'];
	$cbodarah = $tm_cari['id_gol_darah'];
	$cbopekerjaan = $tm_cari['kd_pekerjaan'];
	$cbowarga = $tm_cari['id_warga'];
	$cbodukuh = $tm_cari['id_dukuh'];
		$kd_pendidikan=$tm_cari['kd_pendidikan'];
	$kd_membaca=$tm_cari['kd_membaca'];
	
													$cari_kd=mysqli_query($koneksi,"select jk FROM tbjk where kode='$cbojk'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jk=$tm_cari['jk'];

													$cari_kd=mysqli_query($koneksi,"select status_nikah FROM tbstatus_nikah where kode='$cbostatus'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$status_nikah=$tm_cari['status_nikah'];

													$cari_kd=mysqli_query($koneksi,"select agama FROM tbagama where kode='$cboagama'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$agama=$tm_cari['agama'];

													$cari_kd=mysqli_query($koneksi,"select darah FROM tbdarah where kode='$cbodarah'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$darah=$tm_cari['darah'];
													
													$cari_kd=mysqli_query($koneksi,"select pekerjaan FROM tbpekerjaan where kode='$cbopekerjaan'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$pekerjaan=$tm_cari['pekerjaan'];
													
													$cari_kd=mysqli_query($koneksi,"select warga FROM tbwarga where kode='$cbowarga'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$warga=$tm_cari['warga'];
													
													$cari_kd=mysqli_query($koneksi,"select nm_dukuh FROM tbdukuh where id_dukuh='$cbodukuh'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$nm_dukuh=$tm_cari['nm_dukuh'];
													
													$cari_kd=mysqli_query($koneksi,"select pendidikan FROM tbpendidikan where kode='$kd_pendidikan'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$pendidikan=$tm_cari['pendidikan'];
													
													$cari_kd=mysqli_query($koneksi,"SELECT membaca FROM tbmembaca WHERE kode='$kd_membaca'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$membaca=$tm_cari['membaca'];
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

<?php include "menu_dashboard.php"; ?>

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
					<a href="#" class="breadcrumb--active">Detail Data Kependudukan - Data Diri</a> </div>
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
								<td class="border text-center whitespace-no-wrap" bgcolor="white" width="25%">
									<font color="black">Data Diri</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="25%">
									<font color="white">Informasi Menetap Mutasi</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="25%">
									<font color="white">Kepemilikan E-KTP dan Dokumen</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="25%">
									<font color="white">Data Keluarga</font>
								</td>
							</tr> 
						</table>
						
<form class="form-horizontal" action="index_penduduk_detail02.php" method="post">
<input type="hidden" name="txtid" value="<?php echo $id; ?>"/>
<input type="hidden" name="txtform" value="<?php echo $txtform; ?>"/>
                        <div class="intro-y box">
                            <div class="p-5" id="input">
	
                                <div class="preview">
									<div class="mt-3">
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="KK" 
												id="txtkk" name="txtkk" value="<?php echo $txtkk; ?>" disabled >
											</div>
										</div>
										<div class="mt-3">
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="NIK" 
												id="txtnik" name="txtnik" disabled value="<?php echo $txtnik; ?>" >
											</div>
										</div>							
										<div class="mt-3">
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Nama Lengkap" 
												id="txtnm" name="txtnm" disabled value="<?php echo $txtnm; ?>" >
											</div>
										</div>
										<div class="mt-3">
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Tempat Lahir" 
												id="txttempatlhr" name="txttempatlhr" disabled value="<?php echo $txttempatlhr; ?>" >
											</div>
										</div>
										<div class="mt-3">
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Tanggal Lahir" 
												id="txttgllahir" name="txtgllahir" disabled value="<?php echo $txtgllahir; ?>" >
											</div>
										</div>
										<div class="mt-3">
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Jenis Kelamin" 
													id="txt1" name="txt1" disabled value="<?php echo $jk; ?>" >
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Golongan Darah" 
													id="txt1" name="txt1" disabled value="<?php echo $darah; ?>" >
												</div>
											</div>
										</div>
										<div class="mt-3">
											<div class="relative mt-2">
												<input class="input pr-12 w-full border col-span-4" placeholder="Alamat" 
												id="txtalamat" name="txtalamat" autocomplete="off" value="<?php echo $txtalamat; ?>" disabled>
											</div>
										</div>
										<div class="mt-3">
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
													<input class="input pr-12 w-full border col-span-4" value="<?php echo $nm_kel; ?>" disabled>
												</div>
												<div class="relative mt-2">
													<input class="input pr-12 w-full border col-span-4" value="<?php echo $nm_kec; ?>" disabled>
												</div>
											</div>
										</div>
										<div class="mt-3">
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Agama" 
													id="txt1" name="txt1" disabled value="<?php echo $agama; ?>" >
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Status Perkawinan" 
													id="txt1" name="txt1" disabled value="<?php echo $status_nikah; ?>" >
												</div>
											</div>
										</div>
										<div class="mt-3">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Dukuh/Dusun" 
													id="txt1" name="txt1" disabled value="<?php echo $nm_dukuh; ?>" >
										</div>
										<div class="mt-3">
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
													<input class="input pr-12 w-full border col-span-4" placeholder="RT" 
												id="txtrt" name="txtrt" disabled value="<?php echo $txtrt; ?>">
												</div>
												<div class="relative mt-2">
													<input class="input pr-12 w-full border col-span-4" placeholder="RW" 
												id="txtrw" name="txtrw" disabled value="<?php echo $txtrw; ?>">
												</div>
											</div>
										</div>
										<div class="mt-3">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Pekerjaan" 
												id="txtkk" name="txtkk" value="<?php echo $pekerjaan; ?>" disabled >
										</div>
										<div class="mt-3">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Warga Negara" 
												id="txtkk" name="txtkk" value="<?php echo $warga; ?>" disabled >
												

										</div>	
										<div class="mt-3">
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
													<input class="input pr-12 w-full border col-span-4" disabled value="<?php echo $pendidikan; ?>">
												</div>
												<div class="relative mt-2">
													<input class="input pr-12 w-full border col-span-4" disabled value="<?php echo $membaca; ?>">
												</div>
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
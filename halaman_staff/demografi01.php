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
	
	$tgl_skr=date('Y/m/m');
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kel=$tm_cari['nama'];
	
	$kd_kec=substr($kd_kel,0,8);
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kec'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kec=$tm_cari['nama'];

	$cari_kd=mysqli_query($koneksi,"SELECT *, 
					left(kode,2) as kd_prop, left(kode,5) as kd_kab,
					left(kode,8) as kd_kec 
					FROM tbprofil where kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$kd_pos=$tm_cari['kd_pos'];
	$file_peta=$tm_cari['file_peta'];

	$jmlp=$tm_cari['jmlp'];
	$padat=$tm_cari['padat'];
	$tinggi=$tm_cari['tinggi'];
	$hujan=$tm_cari['hujan'];
	$suhu=$tm_cari['suhu'];
	$deskripsiw=$tm_cari['deskripsiw'];
	$topografi=$tm_cari['topografi'];
	
	$jarak1=$tm_cari['jarak1'];
	$jarak2=$tm_cari['jarak2'];
	$jarak3=$tm_cari['jarak3'];
	$jarak4=$tm_cari['jarak4'];

	$txt1=$tm_cari['fld1'];
	$txt2=$tm_cari['fld2'];
	$txt3=$tm_cari['fld3'];
	$txt4=$tm_cari['fld4'];
	$txt5=$tm_cari['fld5'];
	$txt6=$tm_cari['fld6'];
	$txt7=$tm_cari['fld7'];
	$txt8=$tm_cari['fld8'];
	$txt9=$tm_cari['fld9'];
	$txt10=$tm_cari['fld10'];
	$txt11=$tm_cari['fld11'];
	$txt12=$tm_cari['fld12'];
	$txt13=$tm_cari['fld13'];
	$txt14=$tm_cari['fld14'];
	$txt15=$tm_cari['fld15'];
	$txt16=$tm_cari['fld16'];
	$txt17=$tm_cari['fld17'];
	
	$kd_prop=$tm_cari['kd_prop'];
	$kd_kab=$tm_cari['kd_kab'];
	$kd_kec=$tm_cari['kd_kec'];

$txtluas = $_POST['txtluas'];
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

<?php include "menu_profil04.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
<div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> 
					<i data-feather="chevron-right" class="breadcrumb__icon"></i> 
					<a href="#" class="">Profil Desa</a>
					<i data-feather="chevron-right" class="breadcrumb__icon"></i>
					<a href="#" class="breadcrumb--active">Gambaran Umum Demografi</a> </div>
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
									<font color="white">Luas Wilayah</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="white" width="25%">
									<font color="black">Berdasarkan Penggunaan</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="25%">
									<font color="white">Berdasarkan Peruntukan</font>
								</td>
							</tr> 
						</table>
						
<form class="form-horizontal" action="demografi02.php" method="post">
<input type="hidden" name="txtluas" value="<?php echo $txtluas; ?>"/>
                        <div class="intro-y box">

						                        <div class="intro-y box lg:mt-5">
						                            <div class="p-5">
						                                <div class="grid grid-cols-12 gap-5">
						                                    <div class="col-span-12 xl:col-span-12">
						                                        <div class="mt-3">
						                                            	<label>Industri (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt1" name="txt1" value="<?php echo $txt1; ?>" 
												autocomplete="off" required placeholder="Industri (ha)">
						                                        </div>
						                                        <div class="mt-3">
						                                            	<label>Pertokoan/Perdagangan (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt2" name="txt2" value="<?php echo $txt2; ?>" 
												autocomplete="off" required placeholder="Pertokoan/Perdagangan (ha)">
						                                        </div>
						                                        <div class="mt-3">
						                                            	<label>Perkantoran (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt3" name="txt3" value="<?php echo $txt3; ?>" 
												autocomplete="off" required placeholder="Perkantoran (ha)">
						                                        </div>
						                                        <div class="mt-3">
						                                            	<label>Pasar Desa (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt4" name="txt4" value="<?php echo $txt4; ?>" 
												autocomplete="off" required placeholder="Pasar Desa (ha)">
						                                        </div>
						                                        <div class="mt-3">
						                                            	<label>Tanah Waqaf (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt5" name="txt5" value="<?php echo $txt5; ?>" 
												autocomplete="off" required placeholder="Tanah Waqaf (ha)">
						                                        </div>
						                                    </div>
						                                </div>
						                            </div>
						                        </div>

						                        <div class="intro-y box lg:mt-5">
						                            <div class="flex items-center p-5 border-b border-gray-200">
						                                <h2 class="font-medium text-base mr-auto">
						                                    Tanah Sawah
						                                </h2>
						                            </div>
						                            <div class="p-5">
						                                <div class="grid grid-cols-12 gap-5">
						                                    <div class="col-span-12 xl:col-span-12">
						                                        <div class="mt-3">
						                                            	<label>Irigasi Teknis (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt6" name="txt6" value="<?php echo $txt6; ?>" 
												autocomplete="off" required placeholder="Irigasi Teknis (ha)">
						                                        </div>
						                                        <div class="mt-3">
						                                            	<label>Irigasi Setengan Teknis (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt7" name="txt7" value="<?php echo $txt7; ?>" 
												autocomplete="off" required placeholder="Irigasi Setengan Teknis (ha)">
						                                        </div>
						                                        <div class="mt-3">
						                                            	<label>Irigasi Sederhana (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt8" name="txt8" value="<?php echo $txt8; ?>" 
												autocomplete="off" required placeholder="Irigasi Sederhana (ha)">
						                                        </div>
						                                        <div class="mt-3">
						                                            	<label>Irigasi Tadah Hujan (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt9" name="txt9" value="<?php echo $txt9; ?>" 
												autocomplete="off" required placeholder="Irigasi Tadah Hujan (ha)">
						                                        </div>
						                                        <div class="mt-3">
						                                            	<label>Sawah Pasang Sumur (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt10" name="txt10" value="<?php echo $txt10; ?>" 
												autocomplete="off" required placeholder="Sawah Pasang Sumur (ha)">
						                                        </div>
						                                    </div>
						                                </div>
						                            </div>
						                        </div>

						                        <div class="intro-y box lg:mt-5">
						                            <div class="flex items-center p-5 border-b border-gray-200">
						                                <h2 class="font-medium text-base mr-auto">
						                                    Tanah Kering
						                                </h2>
						                            </div>
						                            <div class="p-5">
						                                <div class="grid grid-cols-12 gap-5">
						                                    <div class="col-span-12 xl:col-span-12">
						                                        <div class="mt-3">
						                                            	<label>Pekarangan (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt11" name="txt11" value="<?php echo $txt11; ?>" 
												autocomplete="off" required placeholder="Pekarangan (ha)">
						                                        </div>
						                                        <div class="mt-3">
						                                            	<label>Perladangan (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt12" name="txt12" value="<?php echo $txt12; ?>" 
												autocomplete="off" required placeholder="Perladangan (ha)">
						                                        </div>
						                                        <div class="mt-3">
						                                            	<label>Tegalan (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt13" name="txt13" value="<?php echo $txt13; ?>" 
												autocomplete="off" required placeholder="Tegalan (ha)">
						                                        </div>
						                                        <div class="mt-3">
						                                            	<label>Perkebunan Negara (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt14" name="txt14" value="<?php echo $txt14; ?>" 
												autocomplete="off" required placeholder="Perkebunan Negara (ha)">
						                                        </div>
						                                        <div class="mt-3">
						                                            	<label>Perkebunan Swasta (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt15" name="txt15" value="<?php echo $txt15; ?>" 
												autocomplete="off" required placeholder="Perkebunan Swasta (ha)">
						                                        </div>
						                                        <div class="mt-3">
						                                            	<label>Perkebunan Rakyat (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt16" name="txt16" value="<?php echo $txt16; ?>" 
												autocomplete="off" required placeholder="Perkebunan Rakyat (ha)">
						                                        </div>
						                                        <div class="mt-3">
						                                            	<label>Tempat Rekreasi (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt17" name="txt17" value="<?php echo $txt17; ?>" 
												autocomplete="off" required placeholder="Tempat Rekreasi (ha)">
						                                        </div>
						                                    </div>
						                                </div>
						                            </div>
						                        </div>

                    </div>

				
				<table class="table table--sm" width="100%"> 
					<tr> 
						<td class="border text-center whitespace-no-wrap">
							<button type="submit" class="button bg-theme-1 text-white mt-5">
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
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

	$txt18=$tm_cari['fld18'];
	$txt19=$tm_cari['fld19'];
	$txt20=$tm_cari['fld20'];
	$txt21=$tm_cari['fld21'];
	$txt22=$tm_cari['fld22'];
	$txt23=$tm_cari['fld23'];
	$txt24=$tm_cari['fld24'];
	$txt25=$tm_cari['fld25'];
	
	$kd_prop=$tm_cari['kd_prop'];
	$kd_kab=$tm_cari['kd_kab'];
	$kd_kec=$tm_cari['kd_kec'];

$txtluas = $_POST['txtluas'];
    $txt1 = $_POST['txt1'];
    $txt2 = $_POST['txt2'];
    $txt3 = $_POST['txt3'];
    $txt4 = $_POST['txt4'];
    $txt5 = $_POST['txt5'];
    $txt6 = $_POST['txt6'];
    $txt7 = $_POST['txt7'];
    $txt8 = $_POST['txt8'];
    $txt9 = $_POST['txt9'];
    $txt10 = $_POST['txt10'];
    $txt11 = $_POST['txt11'];
    $txt12 = $_POST['txt12'];
    $txt13 = $_POST['txt13'];
    $txt14 = $_POST['txt14'];
    $txt15 = $_POST['txt15'];
    $txt16 = $_POST['txt16'];
    $txt17 = $_POST['txt17'];
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
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="25%">
									<font color="white">Berdasarkan Penggunaan</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="white" width="25%">
									<font color="black">Berdasarkan Peruntukan</font>
								</td>
							</tr> 
						</table>
						
							<form class="form-horizontal" enctype="multipart/form-data" action="demografi_proses.php" method="post">
							<input type="hidden" name="txtid" value="<?php echo $kd_kel; ?>"/>
<input type="hidden" name="txtluas" value="<?php echo $txtluas; ?>"/>

<input type="hidden" name="txt1" value="<?php echo $txt1; ?>"/>
<input type="hidden" name="txt2" value="<?php echo $txt2; ?>"/>
<input type="hidden" name="txt3" value="<?php echo $txt3; ?>"/>
<input type="hidden" name="txt4" value="<?php echo $txt4; ?>"/>
<input type="hidden" name="txt5" value="<?php echo $txt5; ?>"/>
<input type="hidden" name="txt6" value="<?php echo $txt6; ?>"/>
<input type="hidden" name="txt7" value="<?php echo $txt7; ?>"/>
<input type="hidden" name="txt8" value="<?php echo $txt8; ?>"/>
<input type="hidden" name="txt9" value="<?php echo $txt9; ?>"/>
<input type="hidden" name="txt10" value="<?php echo $txt10; ?>"/>
<input type="hidden" name="txt11" value="<?php echo $txt11; ?>"/>
<input type="hidden" name="txt12" value="<?php echo $txt12; ?>"/>
<input type="hidden" name="txt13" value="<?php echo $txt13; ?>"/>
<input type="hidden" name="txt14" value="<?php echo $txt14; ?>"/>
<input type="hidden" name="txt15" value="<?php echo $txt15; ?>"/>
<input type="hidden" name="txt16" value="<?php echo $txt16; ?>"/>
<input type="hidden" name="txt17" value="<?php echo $txt17; ?>"/>

                        <div class="intro-y box">
                            <div class="p-5" id="input">
							
									<div class="preview">

						                                        <div class="mt-3">
						                                            	<label>Jalan (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt18" name="txt18" value="<?php echo $txt18; ?>" 
												autocomplete="off" required placeholder="Jalan (ha)">
						                                        </div>
						                                        <div class="mt-3">
						                                            	<label>Sawah dan Ladang (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt19" name="txt19" value="<?php echo $txt19; ?>" 
												autocomplete="off" required placeholder="Sawah dan Ladang (ha)">
						                                        </div>
						                                        <div class="mt-3">
						                                            	<label>Bangunan Umum (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt20" name="txt20" value="<?php echo $txt20; ?>" 
												autocomplete="off" required placeholder="Bangunan Umum (ha)">
						                                        </div>
						                                        <div class="mt-3">
						                                            	<label>Empang (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt21" name="txt21" value="<?php echo $txt21; ?>" 
												autocomplete="off" required placeholder="Empang (ha)">
						                                        </div>
						                                        <div class="mt-3">
						                                            	<label>Pemukiman/Perumahan (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt22" name="txt22" value="<?php echo $txt22; ?>" 
												autocomplete="off" required placeholder="Pemukiman/Perumahan (ha)">
						                                        </div>
						                                        <div class="mt-3">
						                                            	<label>Jalur Hijau (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt23" name="txt23" value="<?php echo $txt23; ?>" 
												autocomplete="off" required placeholder="Jalur Hijau (ha)">
						                                        </div>
						                                        <div class="mt-3">
						                                            	<label>Perkuburan (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt24" name="txt24" value="<?php echo $txt24; ?>" 
												autocomplete="off" required placeholder="Perkuburan (ha)">
						                                        </div>
						                                        <div class="mt-3">
						                                            	<label>Lain-lain (Sungai dan Parit) (ha)</label>
                                        							<input type="text" class="input w-full border mt-2" 
												id="txt25" name="txt25" value="<?php echo $txt25; ?>" 
												autocomplete="off" required placeholder="Lain-lain (Sungai dan Parit) (ha)">
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
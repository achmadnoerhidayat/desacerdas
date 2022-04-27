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

	$cari_kd=mysqli_query($koneksi,"SELECT count(*) as tot FROM tbdukuh where kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_dukuh=$tm_cari['tot'];
	
	$cari_kd=mysqli_query($koneksi,"SELECT *, 
					left(kode,2) as kd_prop, left(kode,5) as kd_kab,
					left(kode,8) as kd_kec 
					FROM tbprofil where kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$file_peta=$tm_cari['file_peta'];
	$file_logo=$tm_cari['logo_desa'];
	$kd_prop=$tm_cari['kd_prop'];
	$kd_kab=$tm_cari['kd_kab'];
	$kd_kec=$tm_cari['kd_kec'];	
	$alamat=$tm_cari['alamat'];	
	$kd_pos=$tm_cari['kd_pos'];

	$lat_desa=$tm_cari['lat_desa'];
	$long_desa=$tm_cari['long_desa'];
	$koordinat=$lat_desa.",".$long_desa;
	//echo $koordinat;
	
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_prop'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_prop=$tm_cari['nama'];

	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kab'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kab=$tm_cari['nama'];
	
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kec'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kec=$tm_cari['nama'];
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

<link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
      integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
      crossorigin=""
    />

    <script
      src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
      integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
      crossorigin=""
    ></script>
<style>
#map {
    width: 100%;
    height:640px;
}
</style>
		
    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->

        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->

<?php include "menu_profil01.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="#" class="breadcrumb--active">Validasi Desa</a> </div>
                    <!-- END: Breadcrumb -->

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

                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                        Desa <?php echo $nm_kel; ?>
                    </h2>
                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                        <button type="button" class="button box text-gray-700 mr-2 flex items-center ml-auto sm:ml-0"> 
							<a href="laju_penduduk.php"> Laju Pertumbuhan Penduduk </a> 
						</button>						
                    </div>
                </div>
				
                <div class="intro-y grid grid-cols-12 gap-6 mt-5">
                    <!-- BEGIN: Blog Layout -->
                    <div class="intro-y blog col-span-12 md:col-span-6 box">
                        <div class="blog__preview image-fit">
							<?php 
								if($file_logo=='') {
							?>
                            <img class="rounded-t-md" src="dist/images/preview-12.jpg">
							<?php
								} else {
							?>
                            <img class="rounded-t-md" src="<?php echo $file_logo; ?>" width="20px">
							<?php
								}
							?>						
                            <div class="absolute w-full flex items-center px-5 pt-6 z-10">
                                <div class="ml-3 text-white mr-auto">

                                </div>
                               
                            </div>
                        </div>
                        <div class="px-5 pt-3 pb-5 border-t border-gray-200">
                            <div class="w-full flex items-center mt-3">
                                <div class="flex-1 relative text-gray-700">
									<b>Nama</b><br>
									<?php echo $nm_kel; ?>
                                </div>
                            </div>
                            <div class="w-full flex items-center mt-3">
                                <div class="flex-1 relative text-gray-700">
									<b>Alamat</b><br>
									<?php echo $alamat; ?>, 
									<?php echo $nm_kel; ?>, 
									<?php echo $nm_kec; ?>, 
									<?php echo $nm_kab; ?>, 
									<?php echo $nm_prop; ?>, 
									<?php echo $kd_pos; ?>.
                                </div>
                            </div>
                            <div class="w-full flex items-center mt-3">
                                <div class="flex-1 relative text-gray-700">
									<b>Koordinat</b><br>
									<?php echo $lat_desa; ?>, 
									<?php echo $long_desa; ?>.
                                </div>
                            </div>							
						</div>						
                    </div>
                    <div class="intro-y blog col-span-12 md:col-span-6 box">			
						<?php 
							$query = mysqli_query($koneksi,"select id_dukuh, nm_dukuh FROM tbdukuh where kode='$kd_kel'")or die(mysql_error);
							while ($data = mysqli_fetch_assoc($query)) {
								$id_dukuh=$data['id_dukuh'];
						?>
						<table class="table">
							<tr>
								<td colspan="2"><div class="font-medium text-base"><?php echo $data['nm_dukuh']; ?></div></td>
								<td align="center">
																							
								</td>
							</tr>
							<?php 
								$query1 = mysqli_query($koneksi,"select id, rw FROM tbrw where id_dukuh='$id_dukuh'")or die(mysql_error);
								while ($data1 = mysqli_fetch_assoc($query1)) {
									$id_rw=$data1['id'];
							?>							
							<tr>
								<td width="10%"></td>
								<td width="40%">RW : <?php echo $data1['rw']; ?></td>
								<td width="50%">

								</td>									
							</tr>
							<?php 
								$query2 = mysqli_query($koneksi,"select id_rt, rt FROM tbrt where id_rw='$id_rw'")or die(mysql_error);
								while ($data2 = mysqli_fetch_assoc($query2)) {
							?>	
							<tr>
								<td width="10%"></td>
								<td width="40%">RT : <?php echo $data2['rt']; ?></td>
								<td width="50%">

								</td>									
							</tr>							
							<?php
										}
							?>
							<tr>
								<td width="10%"></td>
								<td width="40%">

								</td>
								<td width="50%">

								</td>									
							</tr>							
							<?php
									}
								} 
							?>
						</table>
					</div>

                    <div class="intro-y blog col-span-12 md:col-span-12 box">
                        
<div id="map"></div>
<script>
        var mymap = L.map('map').setView([<?php echo $lat_desa; ?>,<?php echo $long_desa; ?>], 19);   
        //setting maps menggunakan api mapbox bukan google maps, daftar dan dapatkan token      
        L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibmFiaWxjaGVuIiwiYSI6ImNrOWZzeXh5bzA1eTQzZGxpZTQ0cjIxZ2UifQ.1YMI-9pZhxALpQ_7x2MxHw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 20,
                id: 'mapbox/streets-v11', //menggunakan peta model streets-v11 kalian bisa melihat jenis-jenis peta lainnnya di web resmi mapbox
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'your.mapbox.access.token'
            }).addTo(mymap);
			
	
</script>
												
                    </div>					
				</div>
				
            </div>
            <!-- END: Content -->
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="dist/js/app.js"></script>
		<script src="assets/js/highcharts.js"></script>
<script src="assets/js/jquery-1.10.1.min.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>

<?php
	}
?>
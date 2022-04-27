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

	$cari_kd=mysqli_query($koneksi,"SELECT lat_desa, long_desa FROM tbprofil where kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$lat_desa=$tm_cari['lat_desa'];
	$long_desa=$tm_cari['long_desa'];
	$koordinat=$lat_desa.",".$long_desa;
	
	if(isset($_POST['btnmasuk'])) {		
		date_default_timezone_set('Asia/Jakarta');
		$tgl_skr=date('Y-m-d');
		$waktuaja_skr=date('h:i');

		$cbokel = $_POST['txtkdkel'];		
		$txtnip = $_POST['txtnip'];
		$txtlat = $_POST['txtlat'];
		$txtlong = $_POST['txtlong'];
		$txtradius = $_POST['txtradius'];
		
		$lat=substr($txtlat,7,9);
		$long=substr($txtlat,17,11);		
		
		if($txtradius<>'radius') {
			if($txtradius>'5') {
				echo"<script>window.alert('Anda Diluar Jangkauan untuk absen!');window.location=('absensi.php');</script>";			
			} else {
				$data = mysqli_query($koneksi,"SELECT nip FROM tbkehadiran WHERE nip='$txtnip' and tanggal='$tgl_skr' and masuk<>''");
				$cek = mysqli_num_rows($data);
				if($cek > 0){	
					echo"<script>window.alert('Anda Sudah Absen Masuk sebelumnya!');window.location=('absensi.php');</script>";		
				} else {
					mysqli_query($koneksi,"INSERT INTO tbkehadiran (nip, tanggal, masuk, lat_msk, long_msk) VALUES ('$txtnip','$tgl_skr','$waktuaja_skr','$lat','$long')");			
					echo"<script>window.alert('Absen Masuk anda berhasil direkam!');window.location=('absensi.php');</script>";
				}
			}
		} else {
					echo"<script>window.alert('Klik tombol di peta, untuk mengecek lokasi dan radius anda!');window.location=('absensi.php');</script>";					
		}

	}

	if(isset($_POST['btnpulang'])) {		
		date_default_timezone_set('Asia/Jakarta');
		$tgl_skr=date('Y-m-d');
		$waktuaja_skr=date('h:i');

		$cbokel = $_POST['txtkdkel'];		
		$txtnip = $_POST['txtnip'];
		$txtlat = $_POST['txtlat'];
		$txtlong = $_POST['txtlong'];
		$txtradius = $_POST['txtradius'];
		
		$lat=substr($txtlat,7,9);
		$long=substr($txtlat,17,11);		

		if($txtradius<>'radius') {
			if($txtradius>'5') {
				echo"<script>window.alert('Anda Diluar Jangkauan untuk absen!');window.location=('absensi.php');</script>";			
			} else {
				$data = mysqli_query($koneksi,"SELECT nip FROM tbkehadiran WHERE nip='$txtnip' and tanggal='$tgl_skr' and masuk<>''");
				$cek = mysqli_num_rows($data);
				$data = mysqli_query($koneksi,"SELECT nip FROM tbkehadiran WHERE nip='$txtnip' and tanggal='$tgl_skr' and masuk<>''");
				$cek = mysqli_num_rows($data);
				if($cek > 0){	

					$data1 = mysqli_query($koneksi,"SELECT nip FROM tbkehadiran WHERE nip='$txtnip' and tanggal='$tgl_skr' and pulang<>''");
					$cek1 = mysqli_num_rows($data1);
					if($cek1 > 0){	
						echo"<script>window.alert('Anda Sudah Absen Pulang sebelumnya!');window.location=('absensi.php');</script>";		
					} else {
						mysqli_query($koneksi,"UPDATE tbkehadiran SET pulang='$waktuaja_skr', lat_plg='$lat', long_plg='$long' WHERE nip='$txtnip' and tanggal='$tgl_skr'");			
						echo"<script>window.alert('Absen Pulang anda berhasil direkam!');window.location=('absensi.php');</script>";
					}		
				} else {
					echo"<script>window.alert('Anda Belum Absen Masuk!');window.location=('absensi.php');</script>";		
				}
			}
		} else {
					echo"<script>window.alert('Klik tombol di peta, untuk mengecek lokasi dan radius anda!');window.location=('absensi.php');</script>";					
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

<style>
	.btn_style{
		border: 1px solid #cecece;
		border-radius: 3px;
		padding: 3px 10px;
		box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
		color: white;
		background-color: #7CFC00;
	}
	.btn_style:hover{
		border: 1px solid #b1b1b1;
		box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
	}
	</style>

<style>
	.btn_style1{
		border: 1px solid #cecece;
		border-radius: 3px;
		padding: 3px 10px;
		box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
		color: white;
		background-color: grey;
	}
	.btn_style1:hover{
		border: 1px solid #b1b1b1;
		box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
	}
	</style>

<style>
	.btn_style2{
		border: 1px solid #cecece;
		border-radius: 3px;
		padding: 3px 10px;
		box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
		color: white;
		background-color: red;
	}
	.btn_style2:hover{
		border: 1px solid #b1b1b1;
		box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
	}
	</style>		
	
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
	
	<!-- Leaflet CSS Library -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">

    <!-- Font-awesome CSS Library -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Leaflet Locate Control CSS Library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.72.0/dist/L.Control.Locate.min.css" />
	
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

<?php include "menu_absen01.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> 
						<a href="index.php" class="">Home</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> 
						<a href="#" class="breadcrumb--active">Laporan Kehadiran</a>
					</div>
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
                        Laporan Kehadiran
                    </h2>
                </div>
                <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
					<!-- BEGIN : Card Soal -->


					<div class="intro-y col-span-12">
    <div class="intro-y box p-5 mt-5">
        <div class="flex justify-between items-center">

<form class="" method="post">
<input type="hidden" name="txtkdkel" value="<?php echo $kd_kel; ?>"/>
			<input type="hidden" name="txtnip" value="<?php echo $nip; ?>"/>		
<input type="hidden" class="input w-full border mt-2"  id="txtlat" name="txtlat" value="lat">
			<input type="hidden" class="input w-full border mt-2"  id="txtlong" name="txtlong" value="long">
			<input type="hidden" class="input w-full border mt-2"  id="txtradius" name="txtradius" value="radius">
       
			
			<table width="100%">
				<tr>
					<td width="10%">
						<button type="submit"  class="button w-40 bg-theme-1 text-white" id="btnmasuk" name="btnmasuk"> Absen Masuk </button>
					</td>
					<td width="10%">
						<button type="submit"  class="button w-40 bg-theme-1 text-white" id="btnpulang" name="btnpulang"> Absen Pulang </button>
					</td>	
					<td width="80%"></td>					
				</tr>
			</table>
</form>			
			
        </div>
        <br>
        <div id="map"></div>
    <!-- Leaflet JavaScript Library -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <!-- Leaflet Locate Control Library -->
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.72.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>

<script>

/* Initial Map */
var map = L.map('map').setView([<?php echo $lat_desa; ?>,<?php echo $long_desa; ?>], 14);   
      
/* Tile Basemap */
var basemap = L.tileLayer('Https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  //attribution akan muncul di pojok kanan bawah
  attribution: '<a href="Https://www.openstreetmap.org/copyright">OpenStreetMap</a> | <a href="Https://unsorry.net" target="_blank">unsorry@2020</a>'
});
basemap.addTo(map);

// Locate control
L.control.locate({
  position: 'topleft',
  showCompass: true,
  showPopup: false,
}).addTo(map);

function onLocationFound(e) {
  var puncakmerapi = [<?php echo $lat_desa; ?>,<?php echo $long_desa; ?>];

  /* Menghitung jarak antar 2 koordinat dengan satuan km
      Untuk satuan meter tidak perlu dibagi 1000 */
  var distance = (L.latLng(e.latlng).distanceTo(puncakmerapi) / 1000).toFixed(2);

  var radius = (e.accuracy / 2).toFixed(1);

		
  // Membuat marker sesuai koordinat lokasi
  locationMarker = L.marker(e.latlng);
 
  locationMarker.addTo(map);
  locationMarker.bindPopup("<p class='text-center'>Anda berada <b>" + distance + " km</b><br>dari Kantor Desa.<br>Akurasi GPS " + radius + " meter.</p>");
  locationMarker.openPopup();
  
  document.getElementById('txtradius').value = distance; 
  document.getElementById('txtlat').value = e.latlng; 

  // Membuat garis antara koordinat lokasi dengan puncak merapi
  var latlongline = [e.latlng,puncakmerapi];
  var polyline = L.polyline(latlongline, {
    color: 'red',
    weight: 5,
    opacity: 0.7,
  });
  polyline.addTo(map);
}

map.on('locationfound', onLocationFound);

</script>

	
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
	</div>
					</div>
					
					</div>
					<!-- END : Card Soal -->
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

<script>
function validasiFile(){
    var inputFile = document.getElementById('id-input-file-1');
    var pathFile = inputFile.value;
    var ekstensiOk = /(\.pdf|\.docx|\.xls)$/i;
	if(!ekstensiOk.exec(pathFile)){
        alert('Silakan upload file yang memiliki ekstensi .pdf/.docx/.xls');
        inputFile.value = '';
        return false;
    } 
}
</script>
		
    </body>
</html>

<?php
	}
?>

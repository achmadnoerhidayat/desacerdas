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
	
	$bulan=$_POST['cbobln'];
    $id=$_POST['txtid'];



	$cari_kd=mysqli_query($koneksi,"SELECT
                                          nip, DATE_FORMAT(tanggal,'%d/%m/%Y') AS tgl_kehadiran, masuk, pulang FROM tbkehadiran WHERE nip='$id'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nip=$tm_cari['nip'];
	$tanggal=$tm_cari['tgl_kehadiran'];
	$masuk=$tm_cari['masuk'];
	$pulang=$tm_cari['pulang'];

	$cari_kd=mysqli_query($koneksi,"SELECT
									nama, jabatan, file_photo, file_name
									FROM tbuser
									WHERE nip='$nip'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nama=$tm_cari['nama'];
	$jabatan=$tm_cari['jabatan'];
	$file_photo=$tm_cari['file_photo'];
	$file_name=$tm_cari['file_name'];
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

<?php include "menu_absen02.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> 
						<a href="index.php" class="">Home</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> 
						<a href="#" class="breadcrumb--active">Riwayat Kehadiran</a>
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

    <div class="intro-x flex items-center mt-8" style="z-index: auto">
        <h2 class="text-lg font-medium mr-auto">Riwayat Kehadiran</h2>
    </div>

    <div class="-intro-y box px-5 pt-5 mt-5" style="z-index: auto">
        <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
            <div class="flex flex-1 px-5 justify-start">
                <div class="w-20 h-20 flex-none md:w-32 md:h-32 image-fit relative">
                    <img alt="User Images" src="<?php echo $file_photo; ?>">
                </div>
                <div class="sm:whitespace-normal font-sm text-sm ml-5 grid w-full">
                    <div class="md:flex items-center pb-1">
                        <div class="md:w-1/4">
                            No. Pegawai
                        </div>
                        <div class="md:w-2/3 md:ml-5 lg:w-1/2 ">
                            <input type="text" class="input w-full border mt-2 flex-1" value="<?php echo $nip; ?>" disabled >
                        </div>
                    </div>
                    <div class="md:flex items-center py-1">
                        <div class="md:w-1/4">
                            Nama Lengkap
                        </div>
                        <div class="md:w-2/3 md:ml-5 lg:w-1/2 ">
                            <input type="text" class="input w-full border mt-2 flex-1" value="<?php echo $nama; ?>" disabled >
                        </div>
                    </div>
                    <div class="md:flex items-center pt-1">
                        <div class="md:w-1/4">
                            Jabatan
                        </div>
                        <div class="md:w-2/3 md:ml-5 lg:w-1/2 ">
                            <input type="text" class="input w-full border mt-2 flex-1" value="<?php echo $jabatan; ?>" disabled >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="kehadiran-detail-0.php" method="POST">
				<input type="hidden" name="txtid" value="<?php echo $id; ?>"/>				

			<div class="intro-x box p-5 mt-5 flex">
				<select class="w-full tail-select" name="cbobln" id="cbobln">
					<?php
						$q = mysqli_query($koneksi,"select bulan, nama, id FROM bulan_transaksi order by id asc");
						while ($row1 = mysqli_fetch_array($q)){
							$k_id           = $row1['id'];
							$k_opis         = $row1['nama'];
					?>
					<option value='<?php echo $k_id; ?>' <?php if ($k_id == $bulan){ echo 'selected'; } ?>><?php echo $k_opis; ?></option>
					<?php
						}
					?>
				</select>
				<button id="tabulator-attendance-html-filter-go" type="submit" class="button bg-theme-1 ml-5 w-1/2 text-white" id="btnbulan" name="btnbulan">Tampilkan</button>
			</div>
	</form>

    <div class="intro-y box p-5 mt-5">
        <div class="overflow-x-auto scrollbar-hidden">
            <div id="attendance-detail">
								<table class="table table-report -mt-2">
									<thead>
										<tr>

											<th class="whitespace-no-wrap">TANGGAL</th>
											<th class="whitespace-no-wrap">MASUK</th>
											<th class="whitespace-no-wrap">PULANG</th>

										</tr>
									</thead>
											<?php
														$query = mysqli_query($koneksi,"SELECT *, DATE_FORMAT(tbkehadiran.tanggal,'%d/%m/%Y') AS tgl_kehadiran,
                                                                                               tbuser.nama, tbuser.jabatan
                                                                                        FROM tbkehadiran, tbuser
                                                                                        WHERE tbkehadiran.nip=tbuser.nip and
                                                                                        tbkehadiran.nip='$nip' and month(tbkehadiran.tanggal)='$bulan'")or die(mysql_error);
												//$no =$mulai+1;
												while ($data = mysqli_fetch_assoc($query)) {

											?>
									<tbody>
											<tr>
												<td class=""><?php echo $data['tgl_kehadiran']?></td>
												<td class="">
                                                    <?php echo $data['masuk']?><br>
                                                    Lat : <?php echo $data['lat_msk']?>, Lng : <?php echo $data['long_msk']?>
                                                </td>
												<td class="">
                                                    <?php echo $data['pulang']?><br>
                                                     Lat : <?php echo $data['lat_plg']?>, Lng : <?php echo $data['long_plg']?>
                                                          </td>
											</tr>
									</tbody>
												<?php
													}
												?>
								</table>
            </div>
        </div>
    </div>

    <div class="intro-y box p-5 mt-5">
        <div class="flex justify-between items-center">
			<table width="100%">
				<tr>
					<td width="80%"><h2>Peta Sebaran</h2></td>
					<td width="10%">
						<button type="button"  class="button w-20 bg-theme-1 text-white"> <a href="kehadiran-detail.php"> Masuk </a></button>
					</td>
					<td width="10%">
						<button type="button"  class="button w-20 bg-theme-2 text-white"> <a href="kehadiran-detail1.php"> Pulang </a></button>
					</td>	
				</tr>
			</table>
        </div>
        <br>
        <div id="map"></div>
<script>
        var mymap = L.map('map').setView([<?php echo $lat_desa; ?>,<?php echo $long_desa; ?>], 16);   
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
			
<?php
        
        $mysqli = mysqli_connect('localhost', 'root', '', 'dbdesacerdas');   //koneksi ke database
        $tampil = mysqli_query($mysqli, "select * from tbkehadiran where nip='$nip' and month(tanggal)='$bulan'"); //ambil data dari tabel lokasi
        while($hasil = mysqli_fetch_array($tampil)){ 
			$lat_lok=$hasil['lat_msk'];
			$long_lok=$hasil['long_msk'];
			$koordinat=$lat_lok.",".$long_lok;
		?> 

        L.marker([<?php echo str_replace(['[', ']', 'LatLng', '(', ')'], '', $koordinat); ?>]).addTo(mymap)

        <?php } ?>			        
       	
</script>
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

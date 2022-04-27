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
						<a href="#" class="breadcrumb--active">Data Kehadiran</a> 
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
                        Data Kehadiran
                    </h2>
                </div>
                <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
					<!-- BEGIN : Card Soal -->
					<div class="intro-y col-span-12">
						<div class="intro-y box p-5">
							<form action="" name="modal_popup" enctype="multipart/form-data" method="POST">
                        <div class="col-span-12 mt-8">
                            <div class="grid grid-cols-12 gap-6 mt-5">

                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
											<input class="input pr-12 w-full border col-span-4" 
											placeholder="Cari Nama Pegawai" id="txtcari" name="txtcari" autocomplete="off">
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-1 intro-y">
									<button type="submit" name="tambah" class="button w-20 bg-theme-1 text-white">Cari</button>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-1 intro-y">
									<button type="submit" class="button w-20 bg-theme-1 text-white"> <a href="kehadiran.php"> Reset </a></button>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">

                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-5 intro-y">
									<div class="intro-y block sm:flex items-center h-10">
										<div class="flex items-center sm:ml-auto mt-12 sm:mt-0">
											<button class="button box flex items-center text-gray-700"> <i data-feather="printer" class="hidden sm:block w-4 h-4 mr-2"></i> <a target="_blank" href="cetak_kehadiran.php"> Print </a></button>
											<button class="ml-3 button box flex items-center text-gray-700"> <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> <a target="_blank" href="export_excel_kehadiran.php"> Export to Excel </a></button>
											<button class="ml-3 button box flex items-center text-gray-700"> <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> <a target="_blank" href="export_pdf_kehadiran.php"> Export to PDF </a></button>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
					</form>
						</div>
					</div>
					<div class="intro-y col-span-12">
						<div class="intro-y box p-5">
							<div class="overflow-x-auto">
								<table class="table table-report -mt-2">
									<thead>
										<tr>
											<th class="whitespace-no-wrap">NAMA LENGKAP</th>
											<th class="text-center whitespace-no-wrap">TANGGAL</th>
											<th class="text-center whitespace-no-wrap">MASUK</th>
											<th class="text-center whitespace-no-wrap">PULANG</th>
											<th class="text-center whitespace-no-wrap">AKSI</th>
										</tr>
									</thead>
											<?php
												$halaman = 10;
												$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
												$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

												if(isset($_POST['tambah'])){
													$txtcari = $_POST['txtcari'];
													if ($txtcari<>'') {
														$result = mysqli_query($koneksi,"SELECT *, tbuser.nama, tbuser.jabatan
                                                                                        FROM tbkehadiran, tbuser
                                                                                        WHERE tbkehadiran.nip=tbuser.nip and
                                                                                        tbuser.nama like '%$txtcari%'");
													}
													if ($txtcari=='') {
														$result = mysqli_query($koneksi,"SELECT * FROM tbkehadiran");
													}
												} else {
													$result = mysqli_query($koneksi,"SELECT * FROM tbkehadiran");
												}

												$total = mysqli_num_rows($result);
												$pages = ceil($total/$halaman);

												if(isset($_POST['tambah'])){
													$txtcari = $_POST['txtcari'];
													if ($txtcari<>'') {
														$query = mysqli_query($koneksi,"SELECT *, DATE_FORMAT(tbkehadiran.tanggal,'%d/%m/%Y') AS tgl_kehadiran,
                                                                                               tbuser.nama, tbuser.jabatan
                                                                                        FROM tbkehadiran, tbuser
                                                                                        WHERE tbkehadiran.nip=tbuser.nip and
                                                                                        tbuser.nama like '%$txtcari%' LIMIT $mulai, $halaman")or die(mysql_error);
													}
													if ($txtcari=='') {
														$query = mysqli_query($koneksi,"SELECT *, DATE_FORMAT(tbkehadiran.tanggal,'%d/%m/%Y') AS tgl_kehadiran,
                                                                                               tbuser.nama, tbuser.jabatan
                                                                                        FROM tbkehadiran, tbuser
                                                                                        WHERE tbkehadiran.nip=tbuser.nip LIMIT $mulai, $halaman")or die(mysql_error);
													}
												} else {
													$query = mysqli_query($koneksi,"SELECT *, DATE_FORMAT(tbkehadiran.tanggal,'%d/%m/%Y') AS tgl_kehadiran,
                                                                                               tbuser.nama, tbuser.jabatan
                                                                                        FROM tbkehadiran, tbuser
                                                                                        WHERE tbkehadiran.nip=tbuser.nip LIMIT $mulai, $halaman")or die(mysql_error);
												}
												$no =$mulai+1;
												while ($data = mysqli_fetch_assoc($query)) {
													//$id_perpustakaan=$data['id_perpustakaan'];
													//$cari_kd=mysqli_query($koneksi,"SELECT sum(jumlah) as total FROM tbbuku WHERE id_perpustakaan='$id_perpustakaan'");
													//$tm_cari=mysqli_fetch_array($cari_kd);
													//$total_buku=$tm_cari['total'];
											?>
									<tbody>
											<tr>
												<td>
													<a href="" class="font-medium whitespace-no-wrap"><?php echo $data['nama']?></a>
													<div class="text-gray-600 text-xs whitespace-no-wrap"><?php echo $data['jabatan']?></div>
												</td>
												<td class="text-center"><?php echo $data['tgl_kehadiran']?></td>
												<td class="text-center"><?php echo $data['masuk']?></td>
												<td class="text-center"><?php echo $data['pulang']?></td>
												<td class="table-report__action w-56">
													<div class="flex justify-center items-center">
														<a class="flex items-center mr-3" href="kehadiran-detail.php?id=<?php echo $data['nip']?>"> <i data-feather="eye" class="w-4 h-4 mr-1"></i> Show </a>
													</div>
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

					<div class="intro-y col-span-12">
    <div class="intro-y box p-5 mt-5">
        <div class="flex justify-between items-center">
			<table width="100%">
				<tr>
					<td width="80%"><h2>Peta Sebaran</h2></td>
					<td width="10%">
						<button type="button"  class="button w-20 bg-theme-2 text-white"> <a href="kehadiran.php"> Masuk </a></button>
					</td>
					<td width="10%">										
						<button type="button"  class="button w-20 bg-theme-1 text-white"> <a href="kehadiran1.php"> Pulang </a></button>
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
        $tampil = mysqli_query($mysqli, "select * from tbkehadiran"); //ambil data dari tabel lokasi
        while($hasil = mysqli_fetch_array($tampil)){ 
			$lat_lok=$hasil['lat_plg'];
			$long_lok=$hasil['long_plg'];
			$koordinat=$lat_lok.",".$long_lok;
		?> 

        L.marker([<?php echo str_replace(['[', ']', 'LatLng', '(', ')'], '', $koordinat); ?>]).addTo(mymap)

        <?php } ?>			        
       	
</script>
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

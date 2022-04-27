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

<?php include "menu_ass02.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="ass_hasil.php" class="breadcrumb--active">Assestment Score</a> </div>
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

				<div class="intro-y flex items-center mt-8">
					<h2 class="text-lg font-medium mr-auto">Table Hasil Ujian / Sertifikasi</h2>
				</div>
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
											<button class="button box flex items-center text-gray-700"> <i data-feather="printer" class="hidden sm:block w-4 h-4 mr-2"></i> <a target="_blank" href="cetak_ass_hasil.php"> Print </a></button>
											<button class="ml-3 button box flex items-center text-gray-700"> <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> <a target="_blank" href="export_excel_ass_hasil.php"> Export to Excel </a></button>
											<button class="ml-3 button box flex items-center text-gray-700"> <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> <a target="_blank" href="export_pdf_ass_hasil.php"> Export to PDF </a></button>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
					</form>
						</div>

				<div class="intro-y box p-5 mt-5">
										<table class="table table--sm" width="100%"> 
											<thead> 
												<tr> 
													<th class="border whitespace-no-wrap">NAMA PELAKSANA UJIAN</th>
													<th class="border whitespace-no-wrap">PAKET SOAL</th>
													<th class="border text-center whitespace-no-wrap">TANGGAL UJIAN</th>
													<th class="border text-center whitespace-no-wrap">SKOR/NILAI</th>
													<th class="border text-center whitespace-no-wrap">STATUS</th>
													<th class="border text-center whitespace-no-wrap">AKSI</th>
												</tr> 
											</thead>

											<?php 
												$halaman = 10;
												$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
												$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

												if(isset($_POST['tambah'])){	
													$txtcari = $_POST['txtcari'];
													if ($txtcari<>'') {
														$result = mysqli_query($koneksi,"SELECT * FROM vw_ujian WHERE id_kel='$kd_kel' and 
																						(nama like '%$txtcari%' or nama_paket like '%$txtcari%')");
													}
													if ($txtcari=='') {
														$result = mysqli_query($koneksi,"SELECT * FROM vw_ujian WHERE id_kel='$kd_kel'");
													}
												} else {
													$result = mysqli_query($koneksi,"SELECT * FROM vw_ujian WHERE id_kel='$kd_kel'");
												}

												$total = mysqli_num_rows($result);
												$pages = ceil($total/$halaman);            

												if(isset($_POST['tambah'])){	
													$txtcari = $_POST['txtcari'];
													if ($txtcari<>'') {
														$query = mysqli_query($koneksi,"SELECT * FROM vw_ujian 
																						WHERE id_kel='$kd_kel' and 
																						(nama like '%$txtcari%' or nama_paket like '%$txtcari%') 
																						LIMIT $mulai, $halaman")or die(mysql_error);												
													}
													if ($txtcari=='') {
														$query = mysqli_query($koneksi,"SELECT * FROM vw_ujian 
																						WHERE id_kel='$kd_kel' 
																						LIMIT $mulai, $halaman")or die(mysql_error);													
													}
												} else {
													$query = mysqli_query($koneksi,"SELECT * FROM vw_ujian 
																						WHERE id_kel='$kd_kel' 
																						LIMIT $mulai, $halaman")or die(mysql_error);
												}
												$no =$mulai+1;
												while ($data = mysqli_fetch_assoc($query)) {
													$status=$data['status'];
													if($status=='Lulus') {
														$warna="text-theme-9";
													} else {
														$warna="text-theme-6";
													}
													
											?>
												<tbody>
													<tr>
														<td class="border">
															<?php echo $data['nama']?>
															<br>
															<small><?php echo $data['email']?></small>
														</td>
														<td class="border"><?php echo $data['nama_paket']?></td>
														<td class="border text-center"><?php echo $data['tanggal']?></td>
														<td class="border text-center"><?php echo $data['nilai']?></td>
														<td class="border text-center <?php echo $warna; ?>"><?php echo $data['status']?></td>														
														<td class="border text-center">
															<center>
															<div class="dropdown relative">
																<button class="dropdown-toggle button text-white bg-theme-1 shadow-md flex items-center"> Aksi <i class="w-4 h-4 ml-2" data-feather="chevron-down"></i> </button>
																<div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
																	<div class="dropdown-box__content box p-2">
																		<a href="ass_hasil_score.php?id=<?php echo $data['id_ujian']?>" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="eye" class="w-4 h-4 mr-2"></i> Detail </a>
																		<a href="ass_hasil_lulus.php?id=<?php echo $data['id_ujian']?>" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="check" class="w-4 h-4 mr-2"></i> Lulus </a>
																		<a href="ass_hasil_gagal.php?id=<?php echo $data['id_ujian']?>" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="x" class="w-4 h-4 mr-2"></i> Tidak Lulus </a>
																	</div>
																</div>
															</div>
															</center>
														</td>
													</tr>
												</tbody>
												<?php               
													} 
												?>
										</table>          
                                        <table class="table">
                                            <tbody>
                                                <tr class="">
                                                    <td width="20%" class="no-border"></td>
                                                    <td width="80%" class="no-border text-right">
														<?php for ($i=1; $i<=$pages ; $i++){ ?>
															<a class="pagination__link pagination__link--active" href="?halaman=<?php echo $i; ?>">
																<?php echo $i; ?>
															</a>
														<?php } ?> 
													</td>
                                                </tr>
											</tbody>
										</table>
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
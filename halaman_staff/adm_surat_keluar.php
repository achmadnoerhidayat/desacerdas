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

	$kd_prop=substr($kd_kel,0,2);
	$kd_kab=substr($kd_kel,0,5);
	$kd_kec=substr($kd_kel,0,8);

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
		background-color: #FFD700;
	}
	.btn_style2:hover{
		border: 1px solid #b1b1b1;
		box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
	}
	</style>


    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->

        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->

<?php include "menu_adm01b.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
					<div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a>
					<i data-feather="chevron-right" class="breadcrumb__icon"></i>
					<a href="#" class="">Administrasi</a>
					<i data-feather="chevron-right" class="breadcrumb__icon"></i>
					<a href="#" class="breadcrumb--active">Buku Agenda Surat Keluar BPD</a> </div>
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

									<br>
									<center>
										<b>
										<h2>
										Buku Agenda Surat Keluar BPD<br>
										DESA <?php echo $nm_kel; ?><br>
										KECAMATAN <?php echo $nm_kec; ?>
										</h2>
										</b>
									</center>
					<form action="" name="modal_popup" enctype="multipart/form-data" method="POST">
                        <div class="col-span-12 mt-8">
                            <div class="grid grid-cols-12 gap-6 mt-5">

                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
											<input class="input pr-12 w-full border col-span-4" 
											placeholder="Cari Nomor/Tujuan" id="txtcari" name="txtcari" autocomplete="off">
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-1 intro-y">
									<button type="submit" name="tambah" class="button w-20 bg-theme-1 text-white">Cari</button>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-1 intro-y">
									<button type="submit" name="tambah" class="button w-20 bg-theme-1 text-white">Reset</button>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">

                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-5 intro-y">
									<div class="intro-y block sm:flex items-center h-10">
										<div class="flex items-center sm:ml-auto mt-12 sm:mt-0">
											<button class="button box flex items-center text-gray-700"> <i data-feather="printer" class="hidden sm:block w-4 h-4 mr-2"></i> <a target="_blank" href="cetak_surat_keluar.php"> Print </a></button>
											<button class="ml-3 button box flex items-center text-gray-700"> <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> <a target="_blank" href="export_excel_surat_keluar.php"> Export to Excel </a></button>
											<button class="ml-3 button box flex items-center text-gray-700"> <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> <a target="_blank" href="export_pdf_surat_keluar.php"> Export to PDF </a></button>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
					</form>

                <div class="grid grid-cols-12 gap-6 mt-5">

                    <div class="intro-y col-span-12 lg:col-span-12">
                        <!-- BEGIN: Form Layout -->
                        <div class="intro-y box p-5">



										<table class="table table--sm" width="100%">
											<thead>
												<tr>
													<td class="border text-center whitespace-no-wrap" rowspan="2"> <b>No</b></td>
													<td class="border text-center whitespace-no-wrap" rowspan="2"> <b>Tanggal</b></td>
													<td class="border text-center whitespace-no-wrap" colspan="4"> <b>Surat Keluar</b></td>
													<td class="border whitespace-no-wrap" rowspan="2"> <b>Keterangan</b></td>
													<td class="border text-center whitespace-no-wrap" rowspan="2"> </td>
												</tr>
												<tr>
													<td class="border text-center whitespace-no-wrap"> <b>Nomor</b></td>
													<td class="border text-center whitespace-no-wrap"> <b>Tanggal</b></td>
													<td class="border whitespace-no-wrap"> <b>Hal dan Isi Singkat</b></td>
													<td class="border whitespace-no-wrap"> <b>Tujuan</b></td>
												</tr>
											</thead>

											<?php 
												$halaman = 10;
												$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
												$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

												if(isset($_POST['tambah'])){	
													//$txttgl = $_POST['txttgl'];	
													$txtcari = $_POST['txtcari'];

													//if($txttgl<>'') {
														//$result = mysqli_query($koneksi,"SELECT * FROM tbsurat_keluar where kode='$kd_kel' 
														//and tanggal='$txttgl'");														
													//}
													if($txtcari<>'') {
														$result = mysqli_query($koneksi,"SELECT * FROM tbsurat_keluar where kode='$kd_kel' 
														and (nomor like '%$txtcari%' or tujuan like '%$txtcari%')");																												
													}
													if ($txtcari=='') {
														$result = mysqli_query($koneksi,"SELECT * FROM tbsurat_keluar where kode='$kd_kel'");
													}
												} else {
													$result = mysqli_query($koneksi,"SELECT * FROM tbsurat_keluar where kode='$kd_kel'");
												}

												$total = mysqli_num_rows($result);
												$pages = ceil($total/$halaman);            

												if(isset($_POST['tambah'])){	
													//$txttgl = $_POST['txttgl'];	
													$txtcari = $_POST['txtcari'];

													//if($txttgl<>'') {
														//$query = mysqli_query($koneksi,"SELECT * FROM tbsurat_keluar where kode='$kd_kel' 
																						//and tanggal='$txttgl' 
																						//LIMIT $mulai, $halaman")or die(mysql_error);
													//}
													if($txtcari<>'') {
														$query = mysqli_query($koneksi,"SELECT *, 
																						DATE_FORMAT(tanggal,'%d/%m/%Y') AS tgl, 
																						DATE_FORMAT(tgl_surat,'%d/%m/%Y') AS tgl1 
																						FROM tbsurat_keluar where kode='$kd_kel' 
																						and (nomor like '%$txtcari%' or tujuan like '%$txtcari%') 
																						LIMIT $mulai, $halaman")or die(mysql_error);
													}
													if ($txtcari=='') {
														$query = mysqli_query($koneksi,"SELECT *, 
																						DATE_FORMAT(tanggal,'%d/%m/%Y') AS tgl, 
																						DATE_FORMAT(tgl_surat,'%d/%m/%Y') AS tgl1 
																						FROM tbsurat_keluar where kode='$kd_kel' 
																						LIMIT $mulai, $halaman")or die(mysql_error);
													}
												} else {
													$query = mysqli_query($koneksi,"SELECT *, 
																						DATE_FORMAT(tanggal,'%d/%m/%Y') AS tgl, 
																						DATE_FORMAT(tgl_surat,'%d/%m/%Y') AS tgl1
																						FROM tbsurat_keluar where kode='$kd_kel' 
																						LIMIT $mulai, $halaman")or die(mysql_error);
												}
												$no = 0 ;
												while ($data = mysqli_fetch_assoc($query)) {
													$no++;
											?>

												<tbody>
													<tr>
														<td class="border text-center"><?php echo $no; ?></td>    
														<td class="border text-center"><?php echo $data['tgl']; ?></td>    
														<td class="border text-center"><?php echo $data['nomor']; ?></td>    
														<td class="border text-center"><?php echo $data['tgl1']; ?></td>    
														<td class="border"><?php echo $data['isi']; ?></td>
														<td class="border"><?php echo $data['tujuan']; ?></td> 
														<td class="border"><?php echo $data['keterangan']; ?></td>														    
														<td class="border text-center">
															<div class="flex sm:justify-center items-center">
																<a class="flex items-center mr-3" href="adm_surat_keluar_detail.php?kd=<?php echo $data['id']?>"> <i data-feather="eye" class="w-4 h-4 mr-1"></i></a>
																<a class="flex items-center mr-3" href="adm_surat_keluar_edit.php?kd=<?php echo $data['id']?>"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i></a>
																<a class="flex items-center text-theme-6" href="surat_keluar_del.php?kd=<?php echo $data['id']?>" onclick="return confirm('Data akan dihapus. Lanjutkan?')"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i></a>
															</td>															
														</td>								  
													</tr>
												</tbody>
												<?php               
													} 
												?>											
										</table>


                <!-- END: Datatable -->


                        </div>
                        <!-- END: Form Layout -->
                    </div>
                </div>
            </div>
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

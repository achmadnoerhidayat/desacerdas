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

	$txtidsoal=$_POST['txtidsoal'];
	$cari_kd=mysqli_query($koneksi,"SELECT id_modul, nama_soal FROM tbsoal WHERE id='$txtidsoal'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$id_modul=$tm_cari['id_modul'];
	$nama_soal=$tm_cari['nama_soal'];	
	
	$cari_kd=mysqli_query($koneksi,"SELECT nama_paket, deskripsi, waktu FROM tbmodul_ass WHERE id_modul='$id_modul'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nama_paket=$tm_cari['nama_paket'];
	$deskripsi=$tm_cari['deskripsi'];
	$waktu=$tm_cari['waktu'];
	
	$no_soal=$_POST['txtno'];

	//$cari_kd=mysqli_query($koneksi,"SELECT pilihan FROM tbsoal_pilihan WHERE id_soal='$txtidsoal'");
	//$tm_cari=mysqli_fetch_array($cari_kd);
	//$id_modul=$tm_cari['pilihan'];	
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

<?php include "menu_ass01.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="soal.php?id=<?php echo $id_modul; ?>" class="breadcrumb--active">Assesment</a> </div>
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
		        <h2 class="text-lg font-medium mr-auto">
		            Assesment Detail - <?php echo $nama_paket; ?>
		        </h2>
		    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN : Card Soal -->


        	<div class="intro-y col-span-12 lg:col-span-8">
					
					<form action="soal_edit_save.php" method="post">
					<input type="hidden" name="txtidmodul" value="<?php echo $id_modul; ?>"/>
					<input type="hidden" name="txtidsoal" value="<?php echo $txtidsoal; ?>"/>					
					
                    <div class="box">
                        <div class="flex p-5 lg:p-10 mb-10">
                            <div class="w-full">
                                <label class="text-lg font-medium">Pertanyaan No <?php echo $no_soal; ?></label><br>
								<textarea class="input w-full border mt-2" id="txtsoal" name="txtsoal" rows="3" required><?php echo $nama_soal; ?></textarea>
                            
								<?php 
									$no1 = 0 ;
									$query = mysqli_query($koneksi,"SELECT id_piihan, pilihan, jawaban FROM tbsoal_pilihan 
													WHERE id_soal='$txtidsoal' order by id_piihan")or die(mysql_error);
									while ($data = mysqli_fetch_assoc($query)) {		
										$no1++;
										$id_piihan=$data['id_piihan'];
										$pilihan=$data['pilihan'];
										$jawaban=$data['jawaban'];
																				
										if($no1=='1') {
											$ket_piliha="A";
											$pilihan_a=$pilihan;
											$idpilihan_a=$id_piihan;
											if($jawaban=='1') {
												$checked_a="checked";
											} else {
												$checked_a="";												
											}										
										}
										if($no1=='2') {
											$ket_pilihb="B";
											$pilihan_b=$pilihan;
											$idpilihan_b=$id_piihan;
											if($jawaban=='1') {
												$checked_b="checked";
											} else {
												$checked_b="";												
											}										
										}							
										if($no1=='3') {
											$ket_pilihc="C";
											$pilihan_c=$pilihan;
											$idpilihan_c=$id_piihan;
											if($jawaban=='1') {
												$checked_c="checked";
											} else {
												$checked_c="";												
											}										
										}														
										if($no1=='4') {
											$ket_pilihd="D";
											$pilihan_d=$pilihan;
											$idpilihan_d=$id_piihan;
											if($jawaban=='1') {
												$checked_d="checked";
											} else {
												$checked_d="";												
											}										
										}																					
										if($no1=='5') {
											$ket_pilihe="E";
											$pilihan_e=$pilihan;
											$idpilihan_e=$id_piihan;		
											if($jawaban=='1') {
												$checked_e="checked";
											} else {
												$checked_e="";												
											}																					
										}		
									}		
								?>
								
	                            <div class="intro-y flex justify-between items-center my-2">
	                                <span><?php echo $ket_piliha; ?></span>&nbsp;&nbsp;&nbsp;
									<input type="hidden" name="txtidpilihan_a" value="<?php echo $idpilihan_a; ?>"/>
<textarea class="input w-full border mt-2" id="txtjwba" name="txtjwba" style="overflow:auto" rows="1"><?php echo $pilihan_a; ?></textarea>									
	                                &nbsp;&nbsp;&nbsp;
									<span class="flex items-center">
										<input type="radio" class="input border mr-2" id="jwb_a" name="jwb" value="A" <?php echo $checked_a; ?> >
	                                </span>
	                            </div>
	                            <div class="intro-y flex justify-between items-center my-2">
	                                <span><?php echo $ket_pilihb; ?></span>&nbsp;&nbsp;&nbsp;
									<input type="hidden" name="txtidpilihan_b" value="<?php echo $idpilihan_b; ?>"/>
<textarea class="input w-full border mt-2" id="txtjwbb" name="txtjwbb" style="overflow:auto" rows="1"><?php echo $pilihan_b; ?></textarea>
	                                &nbsp;&nbsp;&nbsp;
									<span class="flex items-center">
										<input type="radio" class="input border mr-2" id="jwb_b" name="jwb" value="B" <?php echo $checked_b; ?> >
	                                </span>
	                            </div>
	                            <div class="intro-y flex justify-between items-center my-2">
	                                <span><?php echo $ket_pilihc; ?></span>&nbsp;&nbsp;&nbsp;
									<input type="hidden" name="txtidpilihan_c" value="<?php echo $idpilihan_c; ?>"/>
<textarea class="input w-full border mt-2" id="txtjwbc" name="txtjwbc" style="overflow:auto" rows="1"><?php echo $pilihan_c; ?></textarea>									
	                                &nbsp;&nbsp;&nbsp;
									<span class="flex items-center">
										<input type="radio" class="input border mr-2" id="jwb_c" name="jwb" value="C" <?php echo $checked_c; ?> >
	                                </span>
	                            </div>
	                            <div class="intro-y flex justify-between items-center my-2">
	                                <span><?php echo $ket_pilihd; ?></span>&nbsp;&nbsp;&nbsp;
									<input type="hidden" name="txtidpilihan_d" value="<?php echo $idpilihan_d; ?>"/>
<textarea class="input w-full border mt-2" id="txtjwbd" name="txtjwbd" style="overflow:auto" rows="1"><?php echo $pilihan_d; ?></textarea>									
	                                &nbsp;&nbsp;&nbsp;
									<span class="flex items-center">
										<input type="radio" class="input border mr-2" id="jwb_d" name="jwb" value="D" <?php echo $checked_d; ?> >
	                                </span>
	                            </div>
	                            <div class="intro-y flex justify-between items-center my-2">
	                                <span><?php echo $ket_pilihe; ?></span>&nbsp;&nbsp;&nbsp;
									<input type="hidden" name="txtidpilihan_e" value="<?php echo $idpilihan_e; ?>"/>
<textarea class="input w-full border mt-2" id="txtjwbe" name="txtjwbe" style="overflow:auto" rows="1"><?php echo $pilihan_e; ?></textarea>
	                                &nbsp;&nbsp;&nbsp;
									<span class="flex items-center">
										<input type="radio" class="input border mr-2" id="jwb_e" name="jwb" value="E" <?php echo $checked_e; ?> >
	                                </span>
	                            </div>


								
                                <div class="intro-y relative mb-10">
                                    <button type="submit" class="button absolute mt-1 lg:mt-3 top-0 right-0 border border-theme-1 text-theme-1 dark:border-theme-10 dark:text-theme-10 w-auto">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
					</form>
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
    </body>
</html>

<?php
	}
?>
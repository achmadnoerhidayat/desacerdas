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

	$id_modul=$_GET['idmodul'];
	$nosoal=$_GET['nosoal'];	
	
	$cari_kd=mysqli_query($koneksi,"SELECT nama_paket, deskripsi, waktu FROM tbmodul_ass WHERE id_modul='$id_modul'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nama_paket=$tm_cari['nama_paket'];										
	$deskripsi=$tm_cari['deskripsi'];										
	$waktu=$tm_cari['waktu'];											
	
	$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbsoal WHERE id_modul='$id_modul'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_soal=$tm_cari['tot'];				
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

<?php include "menu_ujian.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="index.php" class="breadcrumb--active">Assesment</a> </div>
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
                   <h2 class="text-lg font-medium mr-auto">Detail Ujian / Sertifikasi</h2>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">

		<div class="intro-y col-span-12 lg:col-span-12">					
			<div class="flex items-center justify-between">
				<?php 
				$no = 0 ;
				$query = mysqli_query($koneksi,"SELECT id_soal, no_soal, nama_soal FROM tbsoal_tmp WHERE id_modul='$id_modul' order by id_soal")or die(mysql_error);
				while ($data = mysqli_fetch_assoc($query)) {		
					$id_soal=$data['id_soal'];
					$no++;
					
					if($no==$nosoal) {
						$bg_button="bg-theme-1";
						$warna_text="text-white";
					} else {
						$bg_button="";
						$warna_text="text-theme-1";
					}
			?>		
                <a href="ujian_mulai.php?idmodul=<?php echo $id_modul; ?>&nosoal=<?php echo $no; ?>" data-navigate-id="<?php echo $no; ?>" class="navigate-button navigate-button--<?php echo $no; ?> button mx-1 border border-theme-1 w-12 mt-2 
				<?php echo $bg_button; ?> <?php echo $warna_text; ?> ">
                    <?php echo $no; ?>
                </a>
			<?php 
				}
			?>
			</div>
		</div>

                    <div class="intro-y col-span-12 lg:col-span-12">
                        <!-- BEGIN: Radio Button -->
<form action="test.php" method="post">
                        <div class="intro-y box mt-5">
                            <div class="p-5" id="radio">
                                <div class="preview">
                                    <div>
                                        <label><b>
											<?php echo $nosoal; ?>.&nbsp;
											<?php 
												$cari_kd=mysqli_query($koneksi,"SELECT id_soal, no_soal, nama_soal FROM tbsoal_tmp WHERE id_modul='$id_modul' and no_soal='$nosoal'");
												$tm_cari=mysqli_fetch_array($cari_kd);
												$id_soal=$tm_cari['id_soal'];										
												$nama_soal=$tm_cari['nama_soal'];											
												echo $nama_soal;
											?>
										</b></label>
										<br>&nbsp;
											<?php 
												$no1 = 0 ;
												$query1 = mysqli_query($koneksi,"SELECT id_piihan, pilihan, jawaban 
																					FROM tbsoal_pilihan WHERE id_soal='$id_soal' 
																					order by id_piihan")or die(mysql_error);
												while ($data1 = mysqli_fetch_assoc($query1)) {
													$no1++;
													if($no1=='1') {
														$ket_pilih="A";
														$nama_rb="jwb_a";
													}
													if($no1=='2') {
														$ket_pilih="B";
														$nama_rb="jwb_b";
													}							
													if($no1=='3') {
														$ket_pilih="C";
														$nama_rb="jwb_c";
													}														
													if($no1=='4') {
														$ket_pilih="D";
														$nama_rb="jwb_d";
													}																					
													if($no1=='5') {
														$ket_pilih="E";
														$nama_rb="jwb_e";
													}														
											?>
										
                                        <div class="flex items-center text-gray-700 mt-2">
											<span><?php echo $ket_pilih; ?>&nbsp;&nbsp;</span>
											<input type="radio" class="input border mr-2" id="<?php echo $ket_pilih; ?>" name="jwb" value="<?php echo $ket_pilih; ?>" >
                                            <label class="cursor-pointer select-none" for="vertical-radio-chris-evans"><?php echo $data1['pilihan']; ?></label>
                                        </div>
										
										<?php
												}
										?>
                                    </div>
                                </div>
                            </div>
                        </div>
</form>
                        <!-- END: Radio Button -->
                    </div>
					
		<div class="intro-y col-span-12 lg:col-span-12">					
			<div class="flex items-center justify-between">
				<?php 
					$nosoal=$nosoal-1;
					if($nosoal=='0') {
						$nosoal="1";
					}
				?>
				<a href="ujian_mulai.php?idmodul=<?php echo $id_modul; ?>&nosoal=<?php echo $nosoal; ?>" class="navigate-prev button mx-1 border border-theme-1 text-theme-1">
					<i data-feather="arrow-left" class="mr-3 inline-block w-4 h-4"></i> Prev
				</a>
				<button id="question-report" type="button" class="button mx-1 bg-theme-1 text-white py-3 px-16">Kirim Jawaban</button>
				<?php 
					$nosoal=$nosoal+1;
					if($nosoal==$jml_soal) {
						$nosoal=$jml_soal;
					}
				?>
				<a href="ujian_mulai.php?idmodul=<?php echo $id_modul; ?>&nosoal=<?php echo $nosoal; ?>" class="navigate-next button mx-1 border border-theme-1 text-theme-1">
					Next <i data-feather="arrow-right" class="ml-3 inline-block w-4 h-4"></i>
				</a>
			</div>
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

	<?php  } ?>
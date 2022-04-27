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

	$tgl_skr_eng=date('Y/m/d');
	
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

	if(isset($_POST['btnkirim'])) {
		$txtidmodul = $_POST['txtidmodul'];
		$txtnosoal = $_POST['txtnosoal'];
		$txtjmlsoal = $_POST['txtjmlsoal'];
		$txtidsoal = $_POST['txtidsoal'];

		$txtidpilihan_a = $_POST['txtidpilihan_a'];
		$txtidpilihan_b = $_POST['txtidpilihan_b'];
		$txtidpilihan_c = $_POST['txtidpilihan_c'];
		$txtidpilihan_d = $_POST['txtidpilihan_d'];
		$txtidpilihan_e = $_POST['txtidpilihan_e'];	

		if(isset($_POST['jwb'])) {
			$benar=$_POST['jwb'];
			if($benar=='A') {
				$jawabannya=$txtidpilihan_a;
			}
			if($benar=='B') {
				$jawabannya=$txtidpilihan_b;
			}
			if($benar=='C') {
				$jawabannya=$txtidpilihan_c;
			}
			if($benar=='D') {
				$jawabannya=$txtidpilihan_d;
			}	
			if($benar=='E') {
				$jawabannya=$txtidpilihan_e;		
			}
			$cari_kd=mysqli_query($koneksi,"SELECT jawaban FROM tbsoal_pilihan WHERE id_soal='$txtidsoal' and id_piihan='$jawabannya'");
			$tm_cari=mysqli_fetch_array($cari_kd);
			$default_jawaban=$tm_cari['jawaban'];
		
			if($default_jawaban=='0') {
				mysqli_query($koneksi,"UPDATE tbsoal_jawaban SET 
										id_pilihan='$jawabannya', benar='0', salah='1', kosong='0' 
										WHERE id_modul='$txtidmodul' AND id_soal='$txtidsoal' AND no_soal='$txtnosoal'");																
			} else {
				mysqli_query($koneksi,"UPDATE tbsoal_jawaban SET 
										id_pilihan='$jawabannya', benar='1', salah='0', kosong='0' 
										WHERE id_modul='$txtidmodul' AND id_soal='$txtidsoal' AND no_soal='$txtnosoal'");																			
			}
		} else {
				mysqli_query($koneksi,"UPDATE tbsoal_jawaban SET 
										id_pilihan='0', benar='0', salah='0', kosong='1' 
										WHERE id_modul='$txtidmodul' AND id_soal='$txtidsoal' AND no_soal='$txtnosoal'");																
		}
		
		$cari_kd=mysqli_query($koneksi,"SELECT sum(benar) as jbenar, sum(salah) as jsalah, sum(kosong) as jkosong FROM tbsoal_jawaban WHERE id_modul='$id_modul'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jbenar=$tm_cari['jbenar'];		
		$jsalah=$tm_cari['jsalah'];
		$jkosong=$tm_cari['jkosong'];		
		$jnilai=($jbenar/$txtjmlsoal)*100;
		
		
		mysqli_query($koneksi,"INSERT INTO tbujian 
								(tgl_ujian, id_modul, nik, j_benar, j_salah, j_kosong, nilai, status, id_kel) 
								VALUES 
								('$tgl_skr_eng','$id_modul','$nip','$jbenar','$jsalah','$jkosong','$jnilai','','$kd_kel')");			
		
		$cari_kd=mysqli_query($koneksi,"select max(id_ujian) as t from tbujian where id_modul='$id_modul' and nik='$nip'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$id_ujian=$tm_cari['t'];			
	
		
		$next = 'location:ass_hasil_score2.php?id=';
		$awal = $next.$id_ujian;
		header($awal);
	}
	
	if(isset($_POST['btnprev'])) {		 
		$txtidmodul = $_POST['txtidmodul'];
		$txtnosoal = $_POST['txtnosoal'];
		$txtjmlsoal = $_POST['txtjmlsoal'];
		$txtidsoal = $_POST['txtidsoal'];

		$txtidpilihan_a = $_POST['txtidpilihan_a'];
		$txtidpilihan_b = $_POST['txtidpilihan_b'];
		$txtidpilihan_c = $_POST['txtidpilihan_c'];
		$txtidpilihan_d = $_POST['txtidpilihan_d'];
		$txtidpilihan_e = $_POST['txtidpilihan_e'];	

		if(isset($_POST['jwb'])) {
			$benar=$_POST['jwb'];
			if($benar=='A') {
				$jawabannya=$txtidpilihan_a;
			}
			if($benar=='B') {
				$jawabannya=$txtidpilihan_b;
			}
			if($benar=='C') {
				$jawabannya=$txtidpilihan_c;
			}
			if($benar=='D') {
				$jawabannya=$txtidpilihan_d;
			}	
			if($benar=='E') {
				$jawabannya=$txtidpilihan_e;		
			}
			$cari_kd=mysqli_query($koneksi,"SELECT jawaban FROM tbsoal_pilihan WHERE id_soal='$txtidsoal' and id_piihan='$jawabannya'");
			$tm_cari=mysqli_fetch_array($cari_kd);
			$default_jawaban=$tm_cari['jawaban'];
		
			if($default_jawaban=='0') {
				mysqli_query($koneksi,"UPDATE tbsoal_jawaban SET 
										id_pilihan='$jawabannya', benar='0', salah='1', kosong='0' 
										WHERE id_modul='$txtidmodul' AND id_soal='$txtidsoal' AND no_soal='$txtnosoal'");																
			} else {
				mysqli_query($koneksi,"UPDATE tbsoal_jawaban SET 
										id_pilihan='$jawabannya', benar='1', salah='0', kosong='0' 
										WHERE id_modul='$txtidmodul' AND id_soal='$txtidsoal' AND no_soal='$txtnosoal'");																			
			}
		} else {
				mysqli_query($koneksi,"UPDATE tbsoal_jawaban SET 
										id_pilihan='0', benar='0', salah='0', kosong='1' 
										WHERE id_modul='$txtidmodul' AND id_soal='$txtidsoal' AND no_soal='$txtnosoal'");																
		}

		$txtnosoal=$txtnosoal-1;
		if($txtnosoal=='0') {
			$txtnosoal="1";
		}

		$next = 'location:ujian_mulai.php?idmodul=';
		$awal1 = "&nosoal=";
		$awal = $next.$txtidmodul.$awal1.$txtnosoal;
		header($awal);
	}

	if(isset($_POST['btnnext'])) {		 
		$txtidmodul = $_POST['txtidmodul'];
		$txtnosoal = $_POST['txtnosoal'];
		$txtjmlsoal = $_POST['txtjmlsoal'];
		$txtidsoal = $_POST['txtidsoal'];

		$txtidpilihan_a = $_POST['txtidpilihan_a'];
		$txtidpilihan_b = $_POST['txtidpilihan_b'];
		$txtidpilihan_c = $_POST['txtidpilihan_c'];
		$txtidpilihan_d = $_POST['txtidpilihan_d'];
		$txtidpilihan_e = $_POST['txtidpilihan_e'];	

		if(isset($_POST['jwb'])) {
			$benar=$_POST['jwb'];
			if($benar=='A') {
				$jawabannya=$txtidpilihan_a;
			}
			if($benar=='B') {
				$jawabannya=$txtidpilihan_b;
			}
			if($benar=='C') {
				$jawabannya=$txtidpilihan_c;
			}
			if($benar=='D') {
				$jawabannya=$txtidpilihan_d;
			}	
			if($benar=='E') {
				$jawabannya=$txtidpilihan_e;		
			}
			$cari_kd=mysqli_query($koneksi,"SELECT jawaban FROM tbsoal_pilihan WHERE id_soal='$txtidsoal' and id_piihan='$jawabannya'");
			$tm_cari=mysqli_fetch_array($cari_kd);
			$default_jawaban=$tm_cari['jawaban'];
		
			if($default_jawaban=='0') {
				mysqli_query($koneksi,"UPDATE tbsoal_jawaban SET 
										id_pilihan='$jawabannya', benar='0', salah='1', kosong='0' 
										WHERE id_modul='$txtidmodul' AND id_soal='$txtidsoal' AND no_soal='$txtnosoal'");																
			} else {
				mysqli_query($koneksi,"UPDATE tbsoal_jawaban SET 
										id_pilihan='$jawabannya', benar='1', salah='0', kosong='0' 
										WHERE id_modul='$txtidmodul' AND id_soal='$txtidsoal' AND no_soal='$txtnosoal'");																			
			}
		} else {
				mysqli_query($koneksi,"UPDATE tbsoal_jawaban SET 
										id_pilihan='0', benar='0', salah='0', kosong='1' 
										WHERE id_modul='$txtidmodul' AND id_soal='$txtidsoal' AND no_soal='$txtnosoal'");																
		}


		if($txtnosoal==$txtjmlsoal) {
			$txtnosoal=$txtjmlsoal;
		} else {
			$txtnosoal=$txtnosoal+1;					
		}
								
		$next = 'location:ujian_mulai.php?idmodul=';
		$awal1 = "&nosoal=";
		$awal = $next.$txtidmodul.$awal1.$txtnosoal;
		header($awal);
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
									$query = mysqli_query($koneksi,"SELECT id_piihan, pilihan, jawaban FROM tbsoal_pilihan 
													WHERE id_soal='$id_soal' order by id_piihan")or die(mysql_error);
									while ($data = mysqli_fetch_assoc($query)) {		
										$no1++;
										$id_piihan=$data['id_piihan'];
										$pilihan=$data['pilihan'];
										//$jawaban=$data['jawaban'];
											
										if($no1=='1') {
											$ket_piliha="A";
											$pilihan_a=$pilihan;
											$idpilihan_a=$id_piihan;
													
											$cari_kd=mysqli_query($koneksi,"SELECT count(*) as tot FROM tbsoal_jawaban 
																			WHERE id_modul='$id_modul' and id_soal='$id_soal' and id_pilihan='$id_piihan'");
											$tm_cari=mysqli_fetch_array($cari_kd);
											$tot=$tm_cari['tot'];
											if($tot=='0') {
												$jawaban='0';
											} else {
												$jawaban='1';
											}
																						
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

											$data = mysqli_query($koneksi,"SELECT * FROM tbsoal_jawaban 
																			WHERE id_modul='$id_modul' and id_soal='$id_soal' and id_pilihan='$id_piihan'");
											$cek = mysqli_num_rows($data);
											if($cek > 0){		
												$jawaban='1';			
											} else {
												$jawaban='0';
											}
											
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

											$data = mysqli_query($koneksi,"SELECT * FROM tbsoal_jawaban 
																			WHERE id_modul='$id_modul' and id_soal='$id_soal' and id_pilihan='$id_piihan'");
											$cek = mysqli_num_rows($data);
											if($cek > 0){		
												$jawaban='1';			
											} else {
												$jawaban='0';
											}
											
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

											$data = mysqli_query($koneksi,"SELECT * FROM tbsoal_jawaban 
																			WHERE id_modul='$id_modul' and id_soal='$id_soal' and id_pilihan='$id_piihan'");
											$cek = mysqli_num_rows($data);
											if($cek > 0){		
												$jawaban='1';			
											} else {
												$jawaban='0';
											}
											
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

											$data = mysqli_query($koneksi,"SELECT * FROM tbsoal_jawaban 
																			WHERE id_modul='$id_modul' and id_soal='$id_soal' and id_pilihan='$id_piihan'");
											$cek = mysqli_num_rows($data);
											if($cek > 0){		
												$jawaban='1';			
											} else {
												$jawaban='0';
											}
											
											if($jawaban=='1') {
												$checked_e="checked";
											} else {
												$checked_e="";												
											}																					
										}		
									}		
								?>

<form action="" method="post">										
	                            <div class="flex items-center text-gray-700 mt-2">
	                                <span><?php echo $ket_piliha; ?>&nbsp;&nbsp;</span>
									<input type="radio" class="input border mr-2" id="jwb_a" name="jwb" value="A" <?php echo $checked_a; ?> > 							
									<input type="hidden" id="txtidpilihan_a" name="txtidpilihan_a" value="<?php echo $idpilihan_a; ?>"/>
									<textarea class="input w-full border mt-2" style="overflow:auto" rows="1" disabled><?php echo $pilihan_a; ?></textarea>
	                            </div>
	                            <div class="flex items-center text-gray-700 mt-2">
	                                <span><?php echo $ket_pilihb; ?>&nbsp;&nbsp;</span>
									<input type="radio" class="input border mr-2" id="jwb_b" name="jwb" value="B" <?php echo $checked_b; ?> >
									<input type="hidden" name="txtidpilihan_b" value="<?php echo $idpilihan_b; ?>"/>
									<textarea class="input w-full border mt-2" style="overflow:auto" rows="1" disabled><?php echo $pilihan_b; ?></textarea>
	                            </div>
	                            <div class="flex items-center text-gray-700 mt-2">
	                                <span><?php echo $ket_pilihc; ?>&nbsp;&nbsp;</span>
									<input type="radio" class="input border mr-2" id="jwb_c" name="jwb" value="C" <?php echo $checked_c; ?> >
									<input type="hidden" name="txtidpilihan_c" value="<?php echo $idpilihan_c; ?>"/>
									<textarea class="input w-full border mt-2" style="overflow:auto" rows="1" disabled><?php echo $pilihan_c; ?></textarea>
	                            </div>
	                           <div class="flex items-center text-gray-700 mt-2">
	                                <span><?php echo $ket_pilihd; ?>&nbsp;&nbsp;</span>
									<input type="radio" class="input border mr-2" id="jwb_d" name="jwb" value="D" <?php echo $checked_d; ?> >
									<input type="hidden" name="txtidpilihan_d" value="<?php echo $idpilihan_d; ?>"/>
									<textarea class="input w-full border mt-2" style="overflow:auto" rows="1" disabled><?php echo $pilihan_d; ?></textarea>
	                            </div>
	                            <div class="flex items-center text-gray-700 mt-2">
	                                <span><?php echo $ket_pilihe; ?>&nbsp;&nbsp;</span>
									<input type="radio" class="input border mr-2" id="jwb_e" name="jwb" value="E" <?php echo $checked_e; ?> >
									<input type="hidden" name="txtidpilihan_e" value="<?php echo $idpilihan_e; ?>"/>
									<textarea class="input w-full border mt-2" style="overflow:auto" rows="1" disabled><?php echo $pilihan_e; ?></textarea>
	                            </div>
				
<input type="hidden" name="txtidmodul" value="<?php echo $id_modul; ?>"/>
<input type="hidden" name="txtnosoal" value="<?php echo $nosoal; ?>"/>
<input type="hidden" name="txtjmlsoal" value="<?php echo $jml_soal; ?>"/>		
<input type="hidden" name="txtidsoal" value="<?php echo $id_soal; ?>"/>		
				

										
										
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- END: Radio Button -->
                    </div>
					
		<div class="intro-y col-span-12 lg:col-span-12">					
			<div class="flex items-center justify-between">
				<button class="navigate-prev button mx-1 border border-theme-1 text-theme-1" type="submit" id="btnprev" name="btnprev" >
				<i data-feather="arrow-left" class="mr-3 inline-block w-4 h-4"></i> Prev
                </button>
				
				<button id="btnkirim" name="btnkirim" type="submit" class="button mx-1 bg-theme-1 text-white py-3 px-16">Kirim Jawaban</button>
				
				<button class="navigate-prev button mx-1 border border-theme-1 text-theme-1" type="submit" id="btnnext" name="btnnext" >
				Next <i data-feather="arrow-right" class="ml-3 inline-block w-4 h-4"></i>
                </button>

			</div>
		</div>

</form>				
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
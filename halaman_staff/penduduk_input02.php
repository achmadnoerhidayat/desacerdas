<?php
session_start();
	
	if($_SESSION['nip']==''){
		header("location:../index.php");
	} else {
		$kd_kel=$_SESSION['kodewil'];
		$nip=$_SESSION['nip'];
		$nm_user=$_SESSION['nm_user'];
		
	function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[2],$pisah[1],$pisah[0]);
		$satukan = implode('-',$urutan);
		return $satukan;
	}
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
	
	$kd_kec=substr($kd_kel,0,8);
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kec'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kec=$tm_cari['nama'];
	
	if(isset($_POST['submit1'])) {
		$txtnik = $_POST['txtnik'];	
		$menetap = $_POST['vertical_radio_button'];
		if($menetap=='Menetap') {
			$ket_menetap1="";
			$ket_menetap2="";
			$ket_menetap3="";
			$ket_menetap4="";
			$tgl_skr=date('Y/m/d');
			$tgl=date('d');
			$bln=date('m');
			$thn=date('Y');
			mysqli_query($koneksi,"UPDATE tbpenduduk 
							SET menetap='$menetap', menetap_ket1='$ket_menetap1', menetap_ket2='$ket_menetap2', menetap_ket3='$ket_menetap3', 
							menetap_ket4='$ket_menetap4', tgl_register='$tgl_skr' 
							WHERE nik='$txtnik'");
			$sql_insert="INSERT INTO tbrekap_penduduk (kode, tanggal, tgl, bln, tahun, tipe) 
						VALUES ('$kd_kel','$tgl_skr','$tgl','$bln','$thn','1')";
			mysqli_query($koneksi,$sql_insert);
		}
		if($menetap=='Datang Dari') {
			$ket_menetap1=$_POST['txtmenetap1'];
			$ket_menetap2="";
			$ket_menetap3="";
			$ket_menetap4="";
			$txttgldatang = ubahformatTgl($_POST['txttgl1']);
			$txttglpergi = ubahformatTgl($_POST['txttgl1a']);
			$txtmaksud=$_POST['txtmaksud'];
			$txtdidatangi=$_POST['txtdidatangi'];
			
			mysqli_query($koneksi,"UPDATE tbpenduduk 
							SET menetap='$menetap', menetap_ket1='$ket_menetap1', menetap_ket2='$ket_menetap2', menetap_ket3='$ket_menetap3', 
							menetap_ket4='$ket_menetap4', 
							tgl_datang='$txttgldatang', tgl_pergi='$txttglpergi', maksud_datang='$txtmaksud', didatangi='$txtdidatangi', 
							tgl_register='$txttgldatang' 
							WHERE nik='$txtnik'");

			$sql_insert="INSERT INTO tbrekap_penduduk (kode, tanggal, tgl, bln, tahun, tipe) 
						VALUES ('$kd_kel','$txttgldatang','','','','2')";
			mysqli_query($koneksi,$sql_insert);
		}
		if($menetap=='Lahir Di') {
			$ket_menetap1="";
			$ket_menetap2=$_POST['txtmenetap2'];
			$ket_menetap3="";
			$ket_menetap4="";

			$cari_kd=mysqli_query($koneksi,"SELECT tgl_lhr FROM tbpenduduk WHERE nik='$txtnik'");
			$tm_cari=mysqli_fetch_array($cari_kd);
			$tgl_lhr=$tm_cari['tgl_lhr'];
	
			mysqli_query($koneksi,"UPDATE tbpenduduk 
						SET menetap='$menetap', menetap_ket1='$ket_menetap1', menetap_ket2='$ket_menetap2', menetap_ket3='$ket_menetap3', 
						menetap_ket4='$ket_menetap4', 
						tgl_register='$tgl_lhr' WHERE nik='$txtnik'");

			$sql_insert="INSERT INTO tbrekap_penduduk (kode, tanggal, tgl, bln, tahun, tipe) 
						VALUES ('$kd_kel','$tgl_lhr','','','','3')";
			mysqli_query($koneksi,$sql_insert);
		}
		if($menetap=='Pindah Ke') {
			$ket_menetap1="";
			$ket_menetap2="";
			$ket_menetap3=$_POST['txtmenetap3'];
			$ket_menetap4="";
			$txttglpindah = ubahformatTgl($_POST['txttgl2']);
			
			mysqli_query($koneksi,"UPDATE tbpenduduk 
						SET menetap='$menetap', menetap_ket1='$ket_menetap1', menetap_ket2='$ket_menetap2', menetap_ket3='$ket_menetap3', 
						menetap_ket4='$ket_menetap4', 
						tgl_register='$txttglpindah', tgl_pindah='$txttglpindah' WHERE nik='$txtnik'");

			$sql_insert="INSERT INTO tbrekap_penduduk (kode, tanggal, tgl, bln, tahun, tipe) 
						VALUES ('$kd_kel','$txttglpindah','','','','4')";
			mysqli_query($koneksi,$sql_insert);
		}
		if($menetap=='Meninggal') {
			$ket_menetap1="";
			$ket_menetap2="";
			$ket_menetap3="";
			$ket_menetap4=$_POST['txtmenetap4'];
			$txttglmeninggal = ubahformatTgl($_POST['txttglmeninggal']);
			$txtjam=$_POST['txtjam'];
			mysqli_query($koneksi,"UPDATE tbpenduduk 
						SET menetap='$menetap', menetap_ket1='$ket_menetap1', menetap_ket2='$ket_menetap2', menetap_ket3='$ket_menetap3', 
						menetap_ket4='$ket_menetap4', 
						Menetap_tgl='$txttglmeninggal', tgl_register='$txttglmeninggal', jam_kematian='$txtjam' WHERE nik='$txtnik'");
			$sql_insert="INSERT INTO tbrekap_penduduk (kode, tanggal, tgl, bln, tahun, tipe) 
						VALUES ('$kd_kel','$txttglmeninggal','','','','5')";
			mysqli_query($koneksi,$sql_insert);
		}	
		if($menetap=='Hilang') {
			$ket_menetap1="";
			$ket_menetap2="";
			$ket_menetap3="";
			$ket_menetap4="";
			$txttglhilang = ubahformatTgl($_POST['txttglhilang']);
			mysqli_query($koneksi,"UPDATE tbpenduduk 
						SET menetap='$menetap', menetap_ket1='$ket_menetap1', menetap_ket2='$ket_menetap2', menetap_ket3='$ket_menetap3', 
						menetap_ket4='$ket_menetap4', 
						tgl_hilang='$txttglhilang', tgl_register='$txttglhilang' WHERE nik='$txtnik'");
			$sql_insert="INSERT INTO tbrekap_penduduk (kode, tanggal, tgl, bln, tahun, tipe) 
						VALUES ('$kd_kel','$txttglhilang','','','','6')";
			mysqli_query($koneksi,$sql_insert);
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
    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->
        
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->

<?php include "menu_penduduk01.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> 
					<i data-feather="chevron-right" class="breadcrumb__icon"></i> 
					<a href="penduduk_daftar.php" class="">Kependudukan</a>
					<i data-feather="chevron-right" class="breadcrumb__icon"></i>
					<a href="#" class="breadcrumb--active">Input Data Kependudukan</a> </div>
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
									<font color="white">Data Diri</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="25%">
									<font color="white">Informasi Menetap Mutasi</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="white" width="25%">
									<font color="black">Kepemilikan E-KTP dan Dokumen</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="25%">
									<font color="white">Data Keluarga</font>
								</td>
							</tr> 
						</table>
						
<form class="form-horizontal" action="penduduk_input03.php" method="post">
<input type="hidden" name="txtnik" value="<?php echo $txtnik; ?>"/>

                        <div class="intro-y box">
                            <div class="p-5" id="input">
							
                                <div class="preview">
										<div>
											
											<div class="flex items-center text-gray-700 mt-2">
												<div class="sm:grid grid-cols-3 gap-2">
													<div class="relative mt-2">
														<input type="radio" class="input border mr-2" id="Belum" name="vertical_radio_button" value="Belum E-KTP">
														<label class="cursor-pointer select-none" for="vertical-radio-chris-evans">Belum E-KTP</label>
													</div>
													<div class="relative mt-2">

													</div>
												</div>
											</div>
											<div class="flex items-center text-gray-700 mt-2">
												<div class="sm:grid grid-cols-2 gap-2">
													<div class="relative mt-2">
														<input type="radio" class="input border mr-2" id="Sudah" name="vertical_radio_button" value="Sudah E-KTP">
														<label class="cursor-pointer select-none" for="vertical-radio-liam-neeson">Sudah E-KTP</label>
													</div>
													<div class="relative mt-2">
																												
													</div>
												</div>
											</div>
											<div class="mt-3">
												<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtktp1" name="txtktp1" 
														autocomplete="off" placeholder="Dikeluarkan di">
												</div>
											</div>
											<div class="mt-3">
												<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txttgl1" name="txttgl1" 
														autocomplete="off" placeholder="Tanggal">
												</div>
											</div>	
											<br>
											<div class="mt-3">
												<label><b>Dokumen Imigrasi</b></label>  
											</div>
											<div class="mt-3">
												<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtpassport" name="txtpassport" 
														autocomplete="off" placeholder="No. Passport">
												</div>
											</div>
											<div class="mt-3">
												<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" id="txtkitap" name="txtkitap" 
														autocomplete="off" placeholder="No. Kitap">
												</div>
											</div>
										</div>                                    
								</div>
								
								
                            </div>
                        </div>
                    </div>
                </div>
				
				<table class="table table--sm" width="100%"> 
					<tr> 
						<td class="border text-center whitespace-no-wrap">
							<button type="submit" id="submit1" name="submit1" class="button bg-theme-1 text-white mt-5">
							&nbsp;&nbsp;&nbsp;Selanjutnya&nbsp;&nbsp;&nbsp;   
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
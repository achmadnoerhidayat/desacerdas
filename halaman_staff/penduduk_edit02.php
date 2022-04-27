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
	
	$tgl_skr=date('d/m/Y');
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
		$txtgllahir = ubahformatTgl($_POST['txtgllahir']);
		$txtnik = $_POST['txtnik'];
		$txtkk = $_POST['txtkk'];
		$txtnm = $_POST['txtnm'];
		$cbojk = $_POST['cbojk'];
		$txtalamat = $_POST['txtalamat'];
		$txtrt = $_POST['txtrt'];
		$txtrw = $_POST['txtrw'];
		$txttempatlhr = $_POST['txttempatlhr'];
		$cbostatus = $_POST['cbostatus'];
		$cboagama = $_POST['cboagama'];
		$cbodarah = $_POST['cbodarah'];
		$cbopekerjaan = $_POST['cbopekerjaan'];
		$cbowarga = $_POST['cbowarga'];
		$cbodukuh = $_POST['cbodukuh'];
		$txtid = $_POST['txtid'];
		$txtform=$_POST['txtform'];
		$cbopendidikan = $_POST['cbopendidikan'];
		$cbomembaca = $_POST['cbomembaca'];
		
		mysqli_query($koneksi,"UPDATE tbpenduduk SET 
							nik='$txtnik', kk='$txtkk', nama='$txtnm', id_jk='$cbojk', alamat='$txtalamat', rt='$txtrt', rw='$txtrw', 
							tempat_lhr='$txttempatlhr', tgl_lhr='$txtgllahir', id_status_kawin='$cbostatus', id_agama='$cboagama', 
							id_gol_darah='$cbodarah', kd_pekerjaan='$cbopekerjaan', id_warga='$cbowarga', id_dukuh='$cbodukuh', 
							kd_pendidikan='$cbopendidikan', kd_membaca='$cbomembaca' 
							WHERE id='$txtid'");

		$cari_kd=mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal, 
									DATE_FORMAT(tgl_datang,'%d/%m/%Y') AS tanggal_datang,
									DATE_FORMAT(tgl_pergi,'%d/%m/%Y') AS tanggal_pergi,
									DATE_FORMAT(tgl_pindah,'%d/%m/%Y') AS tanggal_pindah,
									DATE_FORMAT(menetap_tgl,'%d/%m/%Y') AS tanggal_mati, 
									DATE_FORMAT(tgl_hilang,'%d/%m/%Y') AS tanggal_hilang 
									from tbpenduduk WHERE id='$txtid'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$menetap=$tm_cari['menetap'];
	if($menetap=='Menetap') {
			$ket_menetap1="";
			$ket_menetap2="";
			$ket_menetap3="";
			$ket_menetap4="";
			
			$txtgldatang = "";
			$txtglpergi = "";
			$maksud_datang = "";
			$didatangi = "";

			$txtglpindah = "";
			$txtglmeninggal = "";
			$txtglhilang ="";
			
			$jam="";
		}	
		if($menetap=='Datang Dari') {
			$ket_menetap1=$tm_cari['menetap_ket1'];
			$ket_menetap2="";
			$ket_menetap3="";
			$ket_menetap4="";
			
			$txtgldatang = $tm_cari['tanggal_datang'];
			$txtglpergi = $tm_cari['tanggal_pergi'];
			$maksud_datang = $tm_cari['maksud_datang'];
			$didatangi = $tm_cari['didatangi'];

			$txtglpindah = "";
			$txtglmeninggal = "";
			$txtglhilang ="";
			
			$jam="";
		}	
		if($menetap=='Lahir Di') {
			$ket_menetap1="";
			$ket_menetap2=$tm_cari['menetap_ket2'];
			$ket_menetap3="";
			$ket_menetap4="";
			
			$txtgldatang = "";
			$txtglpergi = "";
			$maksud_datang = "";
			$didatangi = "";
			
			$txtglpindah = "";
			$txtglmeninggal = "";
			$txtglhilang ="";
			
			$jam="";
		}
		if($menetap=='Pindah Ke') {
			$ket_menetap1="";
			$ket_menetap2="";
			$ket_menetap3=$tm_cari['menetap_ket3'];
			$ket_menetap4="";

			$txtgldatang = "";
			$txtglpergi = "";
			$maksud_datang = "";
			$didatangi = "";
			
			$txtglpindah = $tm_cari['tanggal_pindah'];
			$txtglmeninggal = "";
			$txtglhilang ="";
			
			$jam="";
		}
		if($menetap=='Meninggal') {
			$ket_menetap1="";
			$ket_menetap2="";
			$ket_menetap3="";
			$ket_menetap4=$tm_cari['menetap_ket4'];
			$jam=$tm_cari['jam_kematian'];
			
			$txtgldatang = "";
			$txtglpergi = "";
			$maksud_datang = "";
			$didatangi = "";
			
			$txtglpindah = "";
			$txtglmeninggal = $tm_cari['tanggal_mati'];
			$txtglhilang ="";
		}
		if($menetap=='Hilang') {
			$ket_menetap1="";
			$ket_menetap2="";
			$ket_menetap3="";
			$ket_menetap4="";
			
			$txtgldatang = "";
			$txtglpergi = "";
			$maksud_datang = "";
			$didatangi = "";
			
			$txtglpindah = "";
			$txtglmeninggal = "";
			$txtglhilang = $tm_cari['tanggal_hilang'];
			
			$jam="";
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

<?php include "menu_penduduk02.php"; ?>

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
					<a href="#" class="breadcrumb--active">Edit Data Kependudukan</a> </div>
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
								<td class="border text-center whitespace-no-wrap" bgcolor="white" width="25%">
									<font color="black">Informasi Menetap Mutasi</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="25%">
									<font color="white">Kepemilikan E-KTP dan Dokumen</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="25%">
									<font color="white">Data Keluarga</font>
								</td>
							</tr> 
						</table>
						
<form class="form-horizontal" action="penduduk_edit03.php" method="post">
<input type="hidden" name="txtid" value="<?php echo $txtid; ?>"/>
<input type="hidden" name="txtform" value="<?php echo $txtform; ?>"/>
                        <div class="intro-y box">
                            <div class="p-5" id="input">
							
                                <div class="preview">
											
									<div class="mt-3">
										<div class="relative mt-2">
											<input type="radio" class="input border mr-2" name="jenis_kelamin" value="Menetap" <?php if ($menetap=="Menetap") echo "checked";?> autocomplete="off"> Menetap
										</div>
									</div>

									<div class="mt-3">
										<div class="relative mt-2">
											<input type="radio" class="input border mr-2" name="jenis_kelamin" value="Datang Dari" <?php if ($menetap=="Datang Dari") echo "checked";?> autocomplete="off"> Datang Dari
										</div>
										<div class="relative mt-2">
											<input type="text" class="input pr-12 w-full border col-span-4" id="txtmenetap1" name="txtmenetap1" autocomplete="off" value="<?php echo $ket_menetap1; ?>">														
										</div>
										<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Tanggal Datang" 
												id="txttgl1" name="txttgl1" autocomplete="off" value="<?php echo $txtgldatang; ?>">
										</div>
										<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Maksud dan Tujuan" 
												id="txtmaksud" name="txtmaksud" value="<?php echo $maksud_datang; ?>" autocomplete="off" >
										</div>
										<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Nama dan Alamat Yang didatangi" 
												id="txtdidatangi" name="txtdidatangi" value="<?php echo $didatangi; ?>" autocomplete="off" >
										</div>
										<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Pergi Tanggal" 
												id="txttgl1a" name="txttgl1a" autocomplete="off" value="<?php echo $txtglpergi; ?>">
										</div>
									</div>	

									<div class="mt-3">
										<div class="relative mt-2">
											<input type="radio" class="input border mr-2" name="jenis_kelamin" value="Lahir Di" <?php if ($menetap=="Lahir Di") echo "checked";?> > Lahir Di
										</div>
										<div class="relative mt-2">
											<input type="text" class="input pr-12 w-full border col-span-4" id="txtmenetap2" name="txtmenetap2" autocomplete="off" value="<?php echo $ket_menetap2; ?>">
										</div>
									</div>	

									<div class="mt-3">
										<div class="relative mt-2">
											<input type="radio" class="input border mr-2" name="jenis_kelamin" value="Pindah Ke" <?php if ($menetap=="Pindah Ke") echo "checked";?> > Pindah Ke
										</div>
										<div class="relative mt-2">
											<input type="text" class="input pr-12 w-full border col-span-4" id="txtmenetap3" name="txtmenetap3" autocomplete="off" value="<?php echo $ket_menetap3; ?>">
										</div>
										<div class="relative mt-2">
											<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Tanggal Pindah" 
												id="txttgl2" name="txttgl2" autocomplete="off" value="<?php echo $txtglpindah; ?>">
										</div>
									</div>

									<div class="mt-3">
										<div class="relative mt-2">
											<input type="radio" class="input border mr-2" name="jenis_kelamin" value="Meninggal" <?php if ($menetap=="Meninggal") echo "checked";?> > Meninggal
										</div>
										<div class="relative mt-2">
											<input type="text" class="input pr-12 w-full border col-span-4" id="txtmenetap4" name="txtmenetap4" autocomplete="off" value="<?php echo $ket_menetap4; ?>" >
										</div>
										<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Tanggal Meninggal" 
												id="txttglmeninggal" name="txttglmeninggal" autocomplete="off" value="<?php echo $txtglmeninggal; ?>">
										</div>
										<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Jam Kematian" 
												id="txtjam" name="txtjam" autocomplete="off"  value="<?php echo $jam; ?>">
										</div>
									</div>									

									<div class="mt-3">
										<div class="relative mt-2">
											<input type="radio" class="input border mr-2" name="jenis_kelamin" value="Hilang" <?php if ($menetap=="Hilang") echo "checked";?> > Hilang
										</div>
										<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Tanggal Hilang" 
												id="txttglhilang" name="txttglhilang" autocomplete="off" value="<?php echo $txtglhilang; ?>">
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
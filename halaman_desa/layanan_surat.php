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
		
<link href="jquery-ui-1.11.4/smoothness/jquery-ui.css" rel="stylesheet" />
  <script src="jquery-ui-1.11.4/external/jquery/jquery.js"></script>
  <script src="jquery-ui-1.11.4/jquery-ui.js"></script>
  <script src="jquery-ui-1.11.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="jquery-ui-1.11.4/jquery-ui.theme.css">
    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->
        
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->

<?php include "menu_surat02.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
<div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> 
					<i data-feather="chevron-right" class="breadcrumb__icon"></i> 
					<a href="#" class="">Layanan Surat</a>
					<i data-feather="chevron-right" class="breadcrumb__icon"></i>
					<a href="#" class="breadcrumb--active">Surat Keterangan</a> </div>
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
								<td class="border text-center whitespace-no-wrap" bgcolor="white" width="33%">
									<a href="#"><font color="black">SURAT KETERANGAN</font></a>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="33%">
									<a href="layanan_surat01.php"><font color="white">SURAT PENGANTAR</font></a>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="34%">
									<a href="layanan_surat02.php"><font color="white">SURAT IZIN</font></a>
								</td>
							</tr> 
						</table>
					</div>
				</div>
                        <div class="intro-y box mt-5">
							<div class="p-5" id="link-button">
								<table class="table table--sm" width="100%"> 
									<tr> 
										<td width="20%">

										</td>
										<td width="20%">
											<a href="s_domisili.php" class="button w-48 inline-block mr-1 mb-2 border border-theme-1 text-theme-1">DOMISILI</a>
										</td>
										<td width="20%">
											<a href="s_usaha.php" class="button w-48 inline-block mr-1 mb-2 border border-theme-1 text-theme-1">USAHA</a>								
										</td>
										<td width="20%">
											<a href="s_miskin.php" class="button w-48 inline-block mr-1 mb-2 border border-theme-1 text-theme-1">MISKIN</a>																
										</td>
										<td width="20%">

										</td>										
									</tr> 
									<tr> 
										<td width="20%">

										</td>
										<td width="20%">
											<a href="s_hibah.php" class="button w-48 inline-block mr-1 mb-2 border border-theme-1 text-theme-1">HIBAH</a>
										</td>
										<td width="20%">
											<a href="s_jualtanah.php" class="button w-48 inline-block mr-1 mb-2 border border-theme-1 text-theme-1">JUAL TANAH</a>								
										</td>
										<td width="20%">
											<a href="s_cerai.php" class="button w-48 inline-block mr-1 mb-2 border border-theme-1 text-theme-1">CERAI</a>																
										</td>
										<td width="20%">

										</td>										
									</tr>
									<tr> 
										<td width="20%">

										</td>
										<td width="20%">
											<a href="s_kematian.php" class="button w-48 inline-block mr-1 mb-2 border border-theme-1 text-theme-1">KEMATIAN</a>
										</td>
										<td width="20%">
											<a href="s_kehilangan.php" class="button w-48 inline-block mr-1 mb-2 border border-theme-1 text-theme-1">KEHILANGAN</a>								
										</td>
										<td width="20%">
											<a href="s_pindah.php" class="button w-48 inline-block mr-1 mb-2 border border-theme-1 text-theme-1">PINDAH</a>																
										</td>
										<td width="20%">

										</td>										
									</tr>									
									<tr> 
										<td width="20%">

										</td>
										<td width="20%">
											<a href="s_gugat_cerai.php" class="button w-48 inline-block mr-1 mb-2 border border-theme-1 text-theme-1">GUGAT CERAI</a>
										</td>
										<td width="20%">
											<a href="s_akan_nikah.php" class="button w-48 inline-block mr-1 mb-2 border border-theme-1 text-theme-1">AKAN NIKAH</a>								
										</td>
										<td width="20%">
											<a href="s_lansia.php" class="button w-48 inline-block mr-1 mb-2 border border-theme-1 text-theme-1">LANSIA</a>																
										</td>
										<td width="20%">

										</td>										
									</tr>
									<tr> 
										<td width="20%">

										</td>
										<td width="20%">
											<a href="s_belum_menikah.php" class="button w-48 inline-block mr-1 mb-2 border border-theme-1 text-theme-1">BELUM MENIKAH</a>
										</td>
										<td width="20%">
											<a href="s_kelahiran.php" class="button w-48 inline-block mr-1 mb-2 border border-theme-1 text-theme-1">KELAHIRAN</a>								
										</td>
										<td width="20%">
											<a href="s_waqaf.php" class="button w-48 inline-block mr-1 mb-2 border border-theme-1 text-theme-1">WAQAF</a>																
										</td>
										<td width="20%">

										</td>										
									</tr>									
								</table>
							</div>
						</div>	
            <!-- END: Content -->
        </div>
		
		
		
		
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="dist/js/app.js"></script>
        <!-- END: JS Assets-->

<script>
   
    $("#cbodukuh").change(function(){
   
        // variabel dari nilai combo box provinsi
        var id_kec = $("#cbodukuh").val();
       
        // tampilkan image load
        $("#imgLoad").show("");
       
        // mengirim dan mengambil data
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "cari_rt.php",
            data: "kec="+id_kec,
            success: function(msg){
               
                // jika tidak ada data
                if(msg == ''){
                    alert('Tidak ada data RT');
                }
               
                // jika dapat mengambil data,, tampilkan di combo box kota
                else{
                    $("#cbort").html(msg);                                                     
                }
               
                // hilangkan image load
                $("#imgLoad").hide();
            }
        });    
    });
</script>

<script>
   
    $("#cbodukuh1").change(function(){
   
        // variabel dari nilai combo box provinsi
        var id_kec = $("#cbodukuh1").val();
       
        // tampilkan image load
        $("#imgLoad").show("");
       
        // mengirim dan mengambil data
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "cari_rt.php",
            data: "kec="+id_kec,
            success: function(msg){
               
                // jika tidak ada data
                if(msg == ''){
                    alert('Tidak ada data RT');
                }
               
                // jika dapat mengambil data,, tampilkan di combo box kota
                else{
                    $("#cbort1").html(msg);                                                     
                }
               
                // hilangkan image load
                $("#imgLoad").hide();
            }
        });    
    });
</script>

    </body>
</html>

<?php
	}
?>
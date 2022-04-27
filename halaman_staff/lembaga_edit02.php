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
	
	$tgl_skr=date('Y/m/m');
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

	$txtnm = $_POST['txtnm'];
	$cbokat = $_POST['cbokat'];
	$txtdeskripsi = $_POST['txtdeskripsi'];
	
	$tgl_skr1=date('d/m/Y');
	$tgl_skr2=date('d/m/Y');

	$id=$_POST['txtid'];

	$cari_kd=mysqli_query($koneksi,"SELECT 
					kode, nm_lembaga, kd_kategori, deskripsi, wewenang, nm_pengurus, kd_jabatan, 
					DATE_FORMAT(mulai,'%d/%m/%Y') AS tgl1, DATE_FORMAT(sampai,'%d/%m/%Y') AS tgl2, file_photo 
					FROM tblembaga WHERE id='$id'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_pengurus=$tm_cari['nm_pengurus'];
	$kd_jabatan=$tm_cari['kd_jabatan'];
	$tgl1=$tm_cari['tgl1'];
	$tgl2=$tm_cari['tgl2'];
	$file_photo=$tm_cari['file_photo'];
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

<?php include "menu_lembaga02.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> 
					<i data-feather="chevron-right" class="breadcrumb__icon"></i> 
					<a href="lembaga_daftar.php" class="">Lembaga</a>
					<i data-feather="chevron-right" class="breadcrumb__icon"></i>
					<a href="#" class="breadcrumb--active">Input Lembaga</a> </div>
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
                
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">
						<table class="table table--sm" width="100%"> 
							<tr> 
								
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="33%">
									<font color="white">Lembaga</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="34%">
									<font color="white">Wewenang/Tugas</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="white" width="33%">
									<font color="black">Struktur Organisasi</font>
								</td>

							</tr> 
						</table>
						
								<form class="form-horizontal" enctype="multipart/form-data" action="lembaga_input_edit_proses.php" method="post">
<input type="hidden" name="txtid" value="<?php echo $id; ?>"/>
	<input type="hidden" name="txtnm" value="<?php echo $txtnm; ?>"/>
	<input type="hidden" name="cbokat" value="<?php echo $cbokat; ?>"/>
	<input type="hidden" name="txtdeskripsi" value="<?php echo $txtdeskripsi; ?>"/>

                        <div class="intro-y box">
                            <div class="p-5" id="input">
							
                                <div class="preview">

										<div class="mt-3">
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
													<label><b>Ganti Foto Pengurus</b></label>
													<input type="file" name="gambar" class="input w-full border mt-2" />
													<label>*Tipe File PNG,JPEG, Ukuran Maksimum 5Mb</label>
												</div>
												<div class="relative mt-2">
													<label><b>Foto Pengurus Sebelumnya</b></label>
													<img src="<?php echo $file_photo; ?>" width="300px" height="300px">
												</div>
											</div>
										</div>

									<div class="mt-3">
					<label><b>Nama Pengurus</b></label>
                                        <input type="text" class="input w-full border mt-2" 
										id="txtnmp" name="txtnmp" value="<?php echo $nm_pengurus; ?>">
                                    </div>	
									<div class="mt-3">
										<label><b>Jabatan</b></label>
										<div class="relative mt-2">
											<select class="input pr-12 w-full border col-span-4" name="cbojbt" id="cbojbt" required>
												<option value="">Jabatan</option>
<?php
													$q = mysqli_query($koneksi,"select id, nm_jabatan FROM tbjabatan_lembaga");
													while ($row1 = mysqli_fetch_array($q)){
														$k_id           = $row1['id'];
														$k_opis         = $row1['nm_jabatan'];
												?>
											<option value='<?php echo $k_id; ?>' <?php if ($k_id == $kd_jabatan){ echo 'selected'; } ?>><?php echo $k_opis; ?></option>
												<?php
													}
												?>
											</select>
										</div>
									</div>	
									<div class="mt-3">
										<div class="sm:grid grid-cols-2 gap-2">
											<div class="relative mt-2">
												<label><b>Jabatan Dari</b></label>
												<input type="text" class="input pr-12 w-full border col-span-4" 
												id="txttgl1" name="txttgl1" value="<?php echo $tgl1; ?>">
											</div>
											<div class="relative mt-2">
												<label><b>Sampai</b></label>
												<input type="text" class="input pr-12 w-full border col-span-4" 
												id="txttgl2" name="txttgl2" value="<?php echo $tgl2; ?>">
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
							<button type="submit" class="button bg-theme-1 text-white mt-5">
							&nbsp;&nbsp;&nbsp;SIMPAN&nbsp;&nbsp;&nbsp;   
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

<script type="text/javascript">
var uploadField = document.getElementById("gambar");
uploadField.onchange = function() {
    if(this.files[0].size > 5000000){ // ini untuk ukuran 800KB, 1000000 untuk 1 MB.
       alert("Maaf. File Terlalu Besar ! Maksimal Upload 5 Mb");
       this.value = "";
    };
};
</script> 

    </body>
</html>

<?php
	}
?>
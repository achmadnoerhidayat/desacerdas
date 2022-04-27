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
	
	if(isset($_POST['btnsimpan'])) {

		$txttahun = $_POST['txttahun'];
		$txtlaju = $_POST['txtlaju'];

		mysqli_query($koneksi,"INSERT INTO tblajupenduduk (kd_kel, tahun, laju) VALUES ('$kd_kel','$txttahun','$txtlaju')");
		echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('laju_penduduk.php');</script>";		
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
    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->

        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->

<?php include "menu_profil01.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> 
						<a href="index.php" class="">Home</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> 
						<a href="#" class="breadcrumb--active">Laju Pertumbuhan Penduduk</a> 
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

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Laju Pertumbuhan Penduduk</h2>
    </div>

    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <!-- BEGIN: Change Password -->
            <div class="intro-y box lg:mt-5">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="p-5">
                        <div class="mt-3">
                            <label>Tahun Data</label>
                            <input name="txttahun" id="txttahun" type="text" class="input w-full border mt-2 border-theme-6" placeholder="Ex. 2022">
                        </div>

                        <div class="mt-3">
                            <label>Laju Pertumbuhan Penduduk</label>
                            <input name="txtlaju" id="txtlaju" type="text" class="input w-full border mt-2 border-theme-6" placeholder="Ex. 10000">
                        </div>

						<button type="submit" id="btnsimpan" name="btnsimpan" class="button button--lg w-full bg-theme-1 text-white mt-3 block h-25">SIMPAN DATA</button>
                    </div>
                </form>
            </div>
            <!-- END: Change Password -->
        </div>
    </div>
	
				<div class="intro-y flex items-center mt-8">
					<h2 class="text-lg font-medium mr-auto">Daftar Laju Pertumbuhan Penduduk</h2>
				</div>

				<div class="intro-y box p-5 mt-5">

                    <table class="table table-report table-report--bordered ">
                        <thead>
                            <tr>
                                <th class="border-b-2 whitespace-no-wrap">Tahun Data</th>
                                <th class="border-b-2 whitespace-no-wrap">Laju Pertumbuhan Penduduk</th>
                                <th class="border-b-2 text-center whitespace-no-wrap">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
						
							<?php 
								$no = 0 ;
								$sql = mysqli_query($koneksi,"SELECT id, tahun, laju FROM tblajupenduduk WHERE kd_kel='$kd_kel' order by id asc");
								while ($tampil = mysqli_fetch_array($sql)) {
									$no++;
							?>
							
                            <tr>
                                <td class="border-b"><?php echo $tampil['tahun']?></td>
                                <td class="border-b"><?php echo number_format($tampil['laju'],0)?></td>
                                <td class="border-b text-center">
                                    <div class="flex sm:justify-center items-center">
                                        <a class="flex items-center mr-3" href="laju_penduduk_edit.php?kd=<?php echo $tampil['id']?>"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                        <a class="flex items-center text-theme-6" href="laju_penduduk_del.php?kd=<?php echo $tampil['id']?>" onclick="return confirm('Data akan dihapus. Lanjutkan?')"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
				</td>
                            </tr>
							
							<?php
								}
							?>
							
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
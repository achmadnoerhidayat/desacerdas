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

<style>
		/*data */

		/*pagination*/
		.container_pagination{text-align:left;}
		ul.pagination{list-style-type:none;}
		ul.pagination li{display:inline;}
		ul.pagination li a{margin:5px;padding:5px 10px;background-color:grey;color:#fff;text-decoration:none;}
		span.active{margin:5px;padding:5px 10px;background-color:blue;color:#fff;}
	</style>	
	
    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->
        
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->

<?php include "menu_nopenting02.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> 
					<i data-feather="chevron-right" class="breadcrumb__icon"></i> 
					<a href="#" class="">No. Penting</a>
					<i data-feather="chevron-right" class="breadcrumb__icon"></i>
					<a href="" class="breadcrumb--active">Daftar</a> </div>
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
                        <div class="intro-y box p-5">

                                        <table class="table">
                                            <tbody>
											<form action="" name="modal_popup" enctype="multipart/form-data" method="POST">
												<tr class="">
													<td width="80%" class="no-border">
														<input class="input pr-12 w-full border col-span-4" 
														placeholder="Nama Instansi/Badan/Jabatan" id="txtcari" name="txtcari">               
													</td>
													<td width="20%" class="no-border text-center">
														<button type="submit" name="tambah" class="button w-40 bg-theme-1 text-white">CARI</button>
													</td>
												</tr>
											</form>
                                                
                                            </tbody>
                                        </table>

						</div>
					</div>
				</div>
				
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">
                        <!-- BEGIN: Form Layout -->
                        <div class="intro-y box p-5">



									<div class="overflow-x-auto">

<?php
/*get db connection*/
//$koneksi=mysqli_connect("localhost","root","","dbdesacerdas") or die('tak dapat mengakses database');
/*init for pagination*/

$page=isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 1;


if(isset($_POST['tambah'])){
													$txtcari = $_POST['txtcari'];
													if ($txtcari<>'') {
														$cari_semua = mysqli_query($koneksi,"SELECT * FROM tbnopenting WHERE id_kel='$kd_kel' and nama like '%$txtcari%'");
													}
													if ($txtcari=='') {
														$cari_semua = mysqli_query($koneksi,"SELECT * FROM tbnopenting WHERE id_kel='$kd_kel'");
													}
												} else {
													$cari_semua = mysqli_query($koneksi,"SELECT * FROM tbnopenting WHERE id_kel='$kd_kel'");
												}
//=mysqli_query($koneksi,"select * from tbbuatsurat");





$jml_data=mysqli_num_rows($cari_semua);
$batas=10;
$jmlpage=ceil($jml_data/$batas);
if($page>$jmlpage) {$page=$jmlpage;}
if($page<1) {$page=1;}
$posisi=($page-1) * $batas ;
/*view data*/
if($jml_data>0){
?>
<table class="table table--sm" width="100%"> 
											<thead> 
												<tr> 
													<th class="border text-center whitespace-no-wrap">Nama Instansi/Badan/Jabatan</th>
													<th class="border text-center whitespace-no-wrap">Kategori</th>
													<th class="border text-center whitespace-no-wrap">No. Telepon</th>
													<th class="border text-center whitespace-no-wrap"></th>
												</tr> 
											</thead>
<?php
if(isset($_POST['tambah'])){
													$txtcari = $_POST['txtcari'];
													if ($txtcari<>'') {
														$cari_sebagian = mysqli_query($koneksi,"SELECT * FROM tbnopenting 
																						WHERE id_kel='$kd_kel' and 
																						nama like '%$txtcari%' 
																						LIMIT $posisi, $batas")or die(mysql_error);
													}
													if ($txtcari=='') {
														$cari_sebagian = mysqli_query($koneksi,"SELECT * FROM tbnopenting 
																						WHERE id_kel='$kd_kel' 
																						LIMIT $posisi, $batas")or die(mysql_error);
													}
												} else {
													$cari_sebagian = mysqli_query($koneksi,"SELECT * FROM tbnopenting 
																						WHERE id_kel='$kd_kel' 
																						LIMIT $posisi, $batas")or die(mysql_error);
												}

    //$cari_sebagian=mysqli_query($koneksi,"select * from tbbuatsurat limit $posisi, $batas");
	while($data=mysqli_fetch_array($cari_sebagian)){
													$id_kategori=$data['id_kategori'];
													$cari_kd=mysqli_query($koneksi,"SELECT nama FROM tbkategori_nopenting WHERE id='$id_kategori'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$nm_kategori=$tm_cari['nama'];													

?>

<tr>
														<td class="border"><?php echo $data['nama']?></td>
														<td class="border"><?php echo $nm_kategori; ?></td>
														<td class="border"><?php echo $data['notlp']?></td>
														<td class="border text-center">
															<button class="btn_style1" type="">
																<a href="nopenting_edit.php?id=<?php echo $data['id_nopenting']?>">&nbsp;&nbsp;Edit&nbsp;&nbsp;</a>
															</button>&nbsp;
															<button class="btn_style2" type="">
																<a href="nopenting_del.php?id=<?php echo $data['id_nopenting']?>" onclick="return confirm('Data akan dihapus. Lanjutkan?')" >&nbsp;&nbsp;Hapus&nbsp;&nbsp;</a>
															</button>
														</td>
													</tr>

<?php
	}
	echo "</table><br>";
}
/*pagination*/
$sebelumnya = $page - 1;
$berikutnya = $page + 1;
echo "<div class='container_pagination'>";
echo "<ul class='pagination'>";
	if($page > 2){
		$back=$page-1;
		echo "<li><a title='prev' href='".$_SERVER['PHP_SELF']."?page=$back'>Prev</a></li>";
	}

	if($page==1){
		for($i=$page-1; $i<=$page+3; $i++){
		if($i<1){continue;}
		if($i>$jmlpage){break;}
		if($i == $page){
			echo "<li><span title='$i' class='active'>$i</span></li>";
		}else{
			echo "<li><a title='$i' href='".$_SERVER['PHP_SELF']."?page=$i'>$i</a></li>";
			}
		}
	}else if($page==$jmlpage){
		for($i=$page-3; $i<=$page; $i++){
		if($i<1){continue;}
		if($i>$jmlpage){break;}
		if($i == $page){
			echo "<li><span title='$i' class='active'>$i</span></li>";
		}else{
			echo "<li><a title='$i' href='".$_SERVER['PHP_SELF']."?page=$i'>$i</a></li>";
			}
		}
	}else if($page==$jmlpage-1){
		for($i=$page-2; $i<=$page+1; $i++){
		if($i<1){continue;}
		if($i>$jmlpage){break;}
		if($i == $page){
			echo "<li><span title='$i' class='active'>$i</span></li>";
		}else{
			echo "<li><a title='$i' href='".$_SERVER['PHP_SELF']."?page=$i'>$i</a></li>";
			}
		}
	}else{
		for($i=$page-1; $i<=$page+2; $i++){
			if($i<1){continue;}
			if($i>$jmlpage){break;}
			if($i == $page){
				echo "<li><span title='$i' class='active'>$i</span></li>";
			}else{
				echo "<li><a title='$i' href='".$_SERVER['PHP_SELF']."?page=$i'>$i</a></li>";
			}
		}
	}
	if($page < $jmlpage-1){
		$next=$page+1;
		echo "<li><a title='next' href='".$_SERVER['PHP_SELF']."?page=$next'>Next</span></a></li>";
	}
	echo "</ul>";
	echo "</div>";
?>

									</div>



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
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

		$folder = "../file_upload/";
		
		$folder1 = $folder . basename( $_FILES['id-input-file-1']['name']) ;
		$temp1 = $_FILES['id-input-file-1']['tmp_name'];
		$name1 = basename( $_FILES['id-input-file-1']['name']) ;
		if(!empty($_FILES["id-input-file-1"]["tmp_name"])){
			move_uploaded_file($temp1, $folder1);
		}		
		$title = $_POST['title'];
		$kat = $_POST['kat'];

		mysqli_query($koneksi,"INSERT INTO tblaporan_anggaran (judul, kategori, file_berkas) VALUES ('$title','$kat','$folder1')");
		echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('laporan_anggaran.php');</script>";		
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

<?php include "menu_lap-anggaran.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> 
						<a href="index.php" class="">Home</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> 
						<a href="#" class="breadcrumb--active">Laporan Anggaran</a> 
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
        <h2 class="text-lg font-medium mr-auto">Laporan Anggaran</h2>
    </div>

    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <!-- BEGIN: Change Password -->
            <div class="intro-y box lg:mt-5">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="p-5">
                        <div>
							<!-- File Upload -->
							<label class="text-lg">Upload Berkas Laporan Anggaran</label>
							<input type="file" id="id-input-file-1" name="id-input-file-1" class="input w-full border mt-2" required onchange="return validasiFile()"  />
							<span class="text-red-500">*</span>
							<span class="text-xs">Tipe File PDF, XLS, XLSX, DOC, DOCX Ukuran maksimum 15MB</span>
                        </div>


                        <div class="mt-3">
                            <label>Judul Laporan</label>
                            <input name="title" id="title" type="text" class="input w-full border mt-2 border-theme-6" placeholder="Judul Laporan">
                        </div>

                        <div class="mt-3">
                            <label>Kategori Laporan</label>
							<select id="kat" name="kat" class="tail-select w-full z-auto">
								<option value="Buku Bank">Buku Bank</option>
								<option value="Buku Kas Pembantu">Buku Kas Pembantu</option>
								<option value="Buku Kas Umum">Buku Kas Umum</option>
								<option value="Buku Pembantu Pajak">Buku Pembantu Pajak</option>
								<option value="Rancangan APBdes">Rancangan APBdes</option>
								<option value="Rencana Anggaran Biaya">Rencana Anggaran Biaya</option>
							</select>
                        </div>

						<button type="submit" id="btnsimpan" name="btnsimpan" class="button button--lg w-full bg-theme-1 text-white mt-3 block h-25">SIMPAN DATA</button>
                    </div>
                </form>
            </div>
            <!-- END: Change Password -->
        </div>
    </div>
	
				<div class="intro-y flex items-center mt-8">
					<h2 class="text-lg font-medium mr-auto">Daftar Laporan Anggaran</h2>
				</div>

				<div class="intro-y box p-5 mt-5">
					<form action="" name="modal_popup" enctype="multipart/form-data" method="POST">
                        <div class="col-span-12 mt-8">
                            <div class="grid grid-cols-12 gap-6 mt-5">

                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
											<input class="input pr-12 w-full border col-span-4" 
											placeholder="Judul Laporan Anggaran" id="txtcari" name="txtcari" autocomplete="off">
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-1 intro-y">
									<button type="submit" name="tambah" class="button w-20 bg-theme-1 text-white">Cari</button>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-1 intro-y">
									<button type="submit" class="button w-20 bg-theme-1 text-white"> <a href="laporan_anggaran.php"> Reset </a></button>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">

                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-5 intro-y">
									<div class="intro-y block sm:flex items-center h-10">
										<div class="flex items-center sm:ml-auto mt-12 sm:mt-0">
											<button class="button box flex items-center text-gray-700"> <i data-feather="printer" class="hidden sm:block w-4 h-4 mr-2"></i> <a target="_blank" href="cetak_lap_anggaran.php"> Print </a></button>
											<button class="ml-3 button box flex items-center text-gray-700"> <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> <a target="_blank" href="export_excel_lap_anggaran.php"> Export to Excel </a></button>
											<button class="ml-3 button box flex items-center text-gray-700"> <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> <a target="_blank" href="export_pdf_lap_anggaran.php"> Export to PDF </a></button>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
					</form>
					<br>

                    <?php
/*get db connection*/
//$koneksi=mysqli_connect("localhost","root","","dbdesacerdas") or die('tak dapat mengakses database');
/*init for pagination*/

$page=isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 1;


if(isset($_POST['tambah'])){
													$txtcari = $_POST['txtcari'];
													if ($txtcari<>'') {
														$cari_semua = mysqli_query($koneksi,"SELECT * FROM tblaporan_anggaran WHERE judul like '%$txtcari%'");
													}
													if ($txtcari=='') {
														$cari_semua = mysqli_query($koneksi,"SELECT * FROM tblaporan_anggaran");
													}
												} else {
													$cari_semua = mysqli_query($koneksi,"SELECT * FROM tblaporan_anggaran");
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
	echo "<table class='table table--sm' width='100%'>";
	echo "<tr><th class='border whitespace-no-wrap'>JUDUL</th><th class='border whitespace-no-wrap'>KATEGORI</th><th class='border text-center whitespace-no-wrap'>AKSI</th></tr>";

if(isset($_POST['tambah'])){
													$txtcari = $_POST['txtcari'];
													if ($txtcari<>'') {
														$cari_sebagian = mysqli_query($koneksi,"SELECT * FROM tblaporan_anggaran
																						WHERE judul like '%$txtcari%'
																						LIMIT $posisi, $batas")or die(mysql_error);
													}
													if ($txtcari=='') {
														$cari_sebagian = mysqli_query($koneksi,"SELECT * FROM tblaporan_anggaran
																						LIMIT $posisi, $batas")or die(mysql_error);
													}
												} else {
													$cari_sebagian = mysqli_query($koneksi,"SELECT * FROM tblaporan_anggaran
																						LIMIT $posisi, $batas")or die(mysql_error);
												}

    //$cari_sebagian=mysqli_query($koneksi,"select * from tbbuatsurat limit $posisi, $batas");
	while($data=mysqli_fetch_array($cari_sebagian)){


?>

<tr>
														<td class="border"><?php echo $data['judul']?></td>
														<td class="border"><?php echo $data['kategori']?></td>
														<td class="border text-center">
															<button class="btn_style" type="">
																<a target="_blank" href="lihat_file.php?nm_file=<?php echo $data['file_berkas']; ?>"> Lihat Berkas </a>
															</button>&nbsp;
															<button class="btn_style2" type="">
																<a href="laporan_anggaran_del.php?id=<?php echo $data['id']?>" onclick="return confirm('Data akan dihapus. Lanjutkan?')" >&nbsp;&nbsp;Hapus&nbsp;&nbsp;</a>
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

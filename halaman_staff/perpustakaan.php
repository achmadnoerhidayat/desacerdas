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
	
	
    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->
        
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->

<?php include "menu_perpustakaan.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> 
					<i data-feather="chevron-right" class="breadcrumb__icon"></i> 
					<a href="" class="breadcrumb--active">Perpustakaan</a> </div>
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

                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                        Data Perpustakaan
                    </h2>
                </div>
                <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
					<!-- BEGIN : Card Soal -->
					<div class="intro-y col-span-12">
						<div class="intro-y box p-5">
							<form action="" method="post">
								<div class="flex items-center">
									<input class="input w-3/4 border" placeholder="Nama Perpustakaan" id="txtcari" name="txtcari" autocomplete="off">	
									<button type="submit" id="tambah" name="tambah" class="button w-1/4 ml-5 bg-theme-1 text-white">Cari</button>
									<a href="perpustakaan.php" class="button w-1/4 ml-5 bg-theme-6 text-white">Reset</a>
								</div>
							</form>
						</div>
					</div>
					<div class="intro-y col-span-12">
						<div class="intro-y box p-5">
							<div class="overflow-x-auto">
								<table class="table table-report -mt-2">
									<thead>
										<tr>
											<th class="whitespace-no-wrap">NAMA PERPUSTAKAAN</th>
											<th class="whitespace-no-wrap">JUMLAH BUKU</th>
											<th class="text-center whitespace-no-wrap">AKSI</th>
										</tr>
									</thead>
											<?php 
												$halaman = 10;
												$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
												$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

												if(isset($_POST['tambah'])){	
													$txtcari = $_POST['txtcari'];
													if ($txtcari<>'') {
														$result = mysqli_query($koneksi,"SELECT * FROM tbperpustakaan WHERE id_kel='$kd_kel' and nm_perpustakaan like '%$txtcari%'");
													}
													if ($txtcari=='') {
														$result = mysqli_query($koneksi,"SELECT * FROM tbperpustakaan WHERE id_kel='$kd_kel'");
													}
												} else {
													$result = mysqli_query($koneksi,"SELECT * FROM tbperpustakaan WHERE id_kel='$kd_kel'");
												}

												$total = mysqli_num_rows($result);
												$pages = ceil($total/$halaman);            

												if(isset($_POST['tambah'])){	
													$txtcari = $_POST['txtcari'];
													if ($txtcari<>'') {
														$query = mysqli_query($koneksi,"SELECT * FROM tbperpustakaan WHERE id_kel='$kd_kel' and 
																						nm_perpustakaan like '%$txtcari%' LIMIT $mulai, $halaman")or die(mysql_error);												
													}
													if ($txtcari=='') {
														$query = mysqli_query($koneksi,"SELECT * FROM tbperpustakaan WHERE id_kel='$kd_kel' LIMIT $mulai, $halaman")or die(mysql_error);													
													}
												} else {
													$query = mysqli_query($koneksi,"SELECT * FROM tbperpustakaan WHERE id_kel='$kd_kel' LIMIT $mulai, $halaman")or die(mysql_error);
												}
												$no =$mulai+1;
												while ($data = mysqli_fetch_assoc($query)) {			
													$id_perpustakaan=$data['id_perpustakaan'];
													$cari_kd=mysqli_query($koneksi,"SELECT sum(jumlah) as total FROM tbbuku WHERE id_perpustakaan='$id_perpustakaan'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$total_buku=$tm_cari['total'];																									
											?>									
									<tbody>
											<tr>
												<td>
													<a href="" class="font-medium whitespace-no-wrap"><?php echo $data['nm_perpustakaan']?></a> 
													<div class="text-gray-600 text-xs whitespace-no-wrap"><?php echo $data['deskripsi']?></div>
												</td>
												<td class="text-center"><?php echo $total_buku; ?></td>
												<td class="table-report__action w-56">
													<div class="flex justify-center items-center">
														<a class="flex items-center mr-3" href="buku.php?id=<?php echo $data['id_perpustakaan']?>"> <i data-feather="eye" class="w-4 h-4 mr-1"></i> Show </a>
													</div>
												</td>												
											</tr>
									</tbody>
												<?php               
													} 
												?>									
								</table>							
							</div>
						</div>
						</div>
						
					</div>					
					<!-- END : Card Soal -->
				</div>		

    <!-- Begin : Modal Buku -->
    <div class="modal" id="modal-book">
        <div class="modal__content relative">
            <a data-dismiss="modal" href="javascript:;" class="absolute right-0 top-0 mt-3 mr-3">
                <i data-feather="x" class="w-8 h-8 text-gray-500"></i>
            </a>

            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto">Input Data Buku/Dokumen</h2>
            </div>

            <form id="book-form" action="buku_save.php" method="post">
                <div class="p-5 grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12">
                        <label>Perpustakaan</label>
                        <select id="cboperpustakaan" name="cboperpustakaan" data-search="true" class="tail-select w-full border">
							<?php
								$sql="SELECT id_perpustakaan, nm_perpustakaan FROM tbperpustakaan WHERE id_kel='$kd_kel'";
			       				$sql_row=mysqli_query($koneksi,$sql);
			       				while($sql_res=mysqli_fetch_assoc($sql_row))	
									{
							?>
							<option value="<?php echo $sql_res["id_perpustakaan"]; ?>"><?php echo $sql_res["nm_perpustakaan"]; ?></option>
			       			<?php
			       				}
			       			?>
                        </select>
                    </div>
                    <div class="col-span-12">
                        <label>Judul Buku</label>
                        <input id="txtjudul" type="text" class="input w-full border mt-2 flex-1" placeholder="cth: Buku Sejarah" name="txtjudul">
                    </div>
                    <div class="col-span-12">
                        <label>Code Buku</label>
                        <input id="txtkdbuku" type="text" class="input w-full border mt-2 flex-1" placeholder="cth: B-SJR-009-2020" name="txtkdbuku">
                    </div>
                    <div class="col-span-12">
                        <label>Code Rak</label>
                        <input id="txtkdrak" type="text" class="input w-full border mt-2 flex-1" placeholder="cth: AG-001" name="txtkdrak">
                    </div>
                    <div class="col-span-12">
                        <label>Deskripsi Singkat</label>
                        <textarea id="txtdeskripsibuku" class="input w-full border mt-2 flex-1" placeholder="Buku pelajaran sejarah" name="txtdeskripsibuku"></textarea>
                    </div>
                    <div class="col-span-12">
                        <label>Jumlah</label>
                        <input id="txtjumlah" type="text" class="input w-full border mt-2 flex-1" placeholder="cth: 100" name="txtjumlah">
                    </div>
                </div>

                <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                    <button data-dismiss="modal" type="reset" class="button w-20 border text-gray-700 mr-1">Batal</button>
                    <button type="submit" class="button w-20 bg-theme-1 text-white">Simpan</button>
                </div>
            </form>

        </div>
    </div>

    <!-- Begin : Modal Perpustakaan -->
    <div class="modal" id="modal-library">
        <div class="modal__content relative">
            <a data-dismiss="modal" href="javascript:;" class="absolute right-0 top-0 mt-3 mr-3">
                <i data-feather="x" class="w-8 h-8 text-gray-500"></i>
            </a>

            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto">Tambah Perpustakaan</h2>
            </div>

            <form id="library-form" action="perpustakaan_save.php" method="post">
			<input type="hidden" name="txtkdkel" value="<?php echo $kd_kel; ?>"/>
                <div class="p-5 grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12">
                        <label>Nama Perpustakaan</label>
                        <input id="txtnm" name="txtnm" type="text" class="input w-full border mt-2 flex-1" placeholder="cth: Perpustakaan Sejarah">
                    </div>
                    <div class="col-span-12">
                        <label>Deskripsi Singkat</label>
                        <textarea id="txtdeskripsi" class="input w-full border mt-2 flex-1" placeholder="Sejarah singkat tentang perpustakaan" name="txtdeskripsi"></textarea>
                    </div>
                </div>

                <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                    <button data-dismiss="modal" type="reset" class="button w-20 border text-gray-700 mr-1">Batal</button>
                    <button type="submit" class="button w-20 bg-theme-1 text-white">Simpan</button>
                </div>
            </form>

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
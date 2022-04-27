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

	if(isset($_POST['tambah1'])){
		$cbort=$_POST['cbort'];
		$cbobln=$_POST['cbobln'];
		$cbothn=$_POST['cbothn'];

		$cari_kd=mysqli_query($koneksi,"select bulan FROM tbbulan WHERE id='$cbobln'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$nm_bulan=$tm_cari['bulan'];
	} else {
		$cbort=$_POST['cbort1'];
		$cbobln=$_POST['cbobln1'];
		$cbothn=$_POST['cbothn1'];

		$cari_kd=mysqli_query($koneksi,"select bulan FROM tbbulan WHERE id='$cbobln'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$nm_bulan=$tm_cari['bulan'];	
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
		background-color: #FFD700;
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
					<a href="#" class="breadcrumb--active">Laporan Kematian</a> </div>
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
	<br>
	<center>
		<font size="3"><b>LAPORAN KEMATIAN</b></font>
	</center>
		<br>
	<table cellpadding="0" cellspacing="0" width="100%" border="0">
		<tr>
			<td width="10%"><font size="2">BULAN</font></td>
			<td width="2%" align="center"><font size="2">:</font></td>
			<td width="88%"><font size="2"><?php echo $nm_bulan; ?></font></td>
		</tr>
		<tr>
			<td width="10%"><font size="2">TAHUN</font></td>
			<td width="2%" align="center"><font size="2">:</font></td>
			<td width="88%"><font size="2"><?php echo $cbothn; ?></font></td>
		</tr>
		<tr>
			<td width="10%"><font size="2">RT</font></td>
			<td width="2%" align="center"><font size="2">:</font></td>
			<td width="88%"><font size="2"><?php echo $cbort; ?></font></td>
		</tr>
		<tr>
			<td width="10%"><font size="2">KELURAHAN</font></td>
			<td width="2%" align="center"><font size="2">:</font></td>
			<td width="88%"><font size="2"><?php echo $nm_kel; ?></font></td>
		</tr>
		<tr>
			<td width="10%"><font size="2">KECAMATAN</font></td>
			<td width="2%" align="center"><font size="2">:</font></td>
			<td width="88%"><font size="2"><?php echo $nm_kec; ?></font></td>
		</tr>
	</table>
	
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">
                        <!-- BEGIN: Form Layout -->
                        <div class="intro-y box p-5">

	
                                        <table class="table">
                                            <tbody>
											<form action="" name="modal_popup" enctype="multipart/form-data" method="POST">
												<tr class="">
													<td colspan="5" class="no-border">
<input type="hidden" name="cbobln1" value="<?php echo $cbobln; ?>"/>
<input type="hidden" name="cbothn1" value="<?php echo $cbothn; ?>"/>
<input type="hidden" name="cbort1" value="<?php echo $cbort; ?>"/>
														<input class="input pr-12 w-full border col-span-4" 
														placeholder="NIK/Nama" id="txtcari" name="txtcari">
													</td>
													<td width="10%" class="no-border text-center">
														<button type="submit" name="tambah" class="button w-40 bg-theme-1 text-white">CARI</button>
													</td>
												</tr>
											</form>
                                                <tr valign="top" class="">
                                                    	<td width="15%" class="no-border">

							</td>
                                                    	<td width="1%" class="no-border text-center">

							</td>
                                                    	<td width="54%" class="no-border text-left" >

							</td>
                                                    	<td width="10%" class="no-border text-center">
															<button type="button" class="button w-40 bg-theme-1 text-white">
															<a href="report15.php?sbln=<?php echo $cbobln; ?>&sthn=<?php echo $cbothn; ?>&srt=<?php echo $cbort; ?>" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Download&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
															</button>
														</td>
                                                    	<td width="10%" class="no-border text-center">
															<button type="button" class="button w-40 bg-theme-1 text-white">
															<a target="_blank" href="export_excel15.php?sbln=<?php echo $cbobln; ?>&sthn=<?php echo $cbothn; ?>&srt=<?php echo $cbort; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Export Excel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
															</button>
														</td>
                                                    	<td width="10%" class="no-border text-center">
															<button type="button" class="button w-40 bg-theme-1 text-white">
															<a href="cetak15.php?sbln=<?php echo $cbobln; ?>&sthn=<?php echo $cbothn; ?>&srt=<?php echo $cbort; ?>" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Print&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
															</button>
														</td>
                                                </tr>
                                            </tbody>
                                        </table>

<div class="overflow-x-auto">
<table class="table"> 
											<thead> 
												<tr> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>NO</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>NAMA</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>JENIS KELAMIN</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>NIK</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>TEMPAT, TANGGAL LAHIR</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>
													TEMPAT,TANGGAL, JAM KEMATIAN</b></font></center>
													</td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>ALAMAT</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>KET</b></font></center></td> 
													<td colspan="3" class="border border-b-2 whitespace-no-wrap"></td> 
												</tr> 
											</thead>  

											<?php 
												$halaman = 10;
												$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
												$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

												if(isset($_POST['tambah'])){	
													$txtcari = $_POST['txtcari'];
													$result = mysqli_query($koneksi,"SELECT * FROM tbpenduduk 
													where kode='$kd_kel' and menetap='Meninggal' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and 
													rt='$cbort' and (nama like '%$txtcari%' or nik='%$txtcari%')");
												} else {
													$result = mysqli_query($koneksi,"SELECT * FROM tbpenduduk 
													where kode='$kd_kel' and menetap='Meninggal' and 
													month(tgl_register)='$cbobln' and year(tgl_register)='$cbothn' and 
													rt='$cbort'");
												}

												$total = mysqli_num_rows($result);
												$pages = ceil($total/$halaman);            


												if(isset($_POST['tambah'])){	
													$txtcari = $_POST['txtcari'];
												$query = mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal, 
													DATE_FORMAT(menetap_tgl,'%d/%m/%Y') AS tanggal_mati 
													from tbpenduduk 
													where kode='$kd_kel' and 
													menetap='Meninggal' and 
													month(tgl_register)='$cbobln' and 
													year(tgl_register)='$cbothn' and 
													rt='$cbort' 
													and (nama like '%$txtcari%' or nik='%$txtcari%') LIMIT $mulai, $halaman")or die(mysql_error);
												} else {
												$query = mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal, 
													DATE_FORMAT(menetap_tgl,'%d/%m/%Y') AS tanggal_mati 
													from tbpenduduk 
													where kode='$kd_kel' and 
													menetap='Meninggal' and 
													month(tgl_register)='$cbobln' and 
													year(tgl_register)='$cbothn' and 
													rt='$cbort' LIMIT $mulai, $halaman")or die(mysql_error);
												}



												$no =$mulai+1;
												while ($data = mysqli_fetch_assoc($query)) {
													$id_jk=$data['id_jk'];	
													$cari_kd=mysqli_query($koneksi,"select jk FROM tbjk where kode='$id_jk'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jk=$tm_cari['jk'];

											?>
												<tbody>
													<tr>
														<td class="border text-center"><font size="2"><?php echo $no; ?></font></td>                  
														<td class="border"><font size="2"><?php echo $data['nama']; ?></font></td>             
														<td class="border text-center"><font size="2"><?php echo $jk; ?></font></td>
														<td class="border"><font size="2"><?php echo $data['nik']; ?></font></td>             
														<td class="border"><font size="2"><?php echo $data['tempat_lhr']; ?>, <?php echo $data['tanggal']; ?></font></td>  
														<td class="border text-center"><font size="2"><?php echo $data['menetap_ket4']; ?>, <?php echo $data['tanggal_mati']; ?>, <?php echo $data['jam_kematian']; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $data['alamat']; ?></font></td>
														<td class="border"><font size="2"><?php echo $data['keterangan']; ?></font></td>
<td class="border">
															<form action="penduduk_detail01.php" method="post">			
																<input type="hidden" name="txtid" value="<?php echo $data['id']; ?>"/>															
																<input type="hidden" name="txtform" value="15"/>
																<button class="btn_style" type="submit">Detail</button>
															</form>	
														</td>	
														<td class="border">
															<form action="penduduk_edit01.php" method="post">			
																<input type="hidden" name="txtid" value="<?php echo $data['id']; ?>"/>															
																<input type="hidden" name="txtform" value="15"/>
																<button class="btn_style1" type="submit">Edit</button>
															</form>															
														</td>	
														<td class="border">
																<a href="penduduk_del.php?txtid=<?php echo $data['id']?>&txtform=15" 
																onclick="return confirm('Data penduduk akan dihapus. Lanjutkan?')"> 
																<button class="btn_style2" type="button">Delete</button>
																</a>
														</td>
													</tr>
												</tbody>
												<?php               
$no++;
													} 
												?>
										</table> 
</div>        
                                        <table class="table">
                                            <tbody>
                                                <tr class="">
                                                    <td width="20%" class="no-border"></td>
                                                    <td width="80%" class="no-border text-right">
														<?php for ($i=1; $i<=$pages ; $i++){ ?>
															<a href="?halaman=<?php echo $i; ?>"><font size="2"><?php echo $i; ?></font></a>&nbsp;
														<?php } ?> 
													</td>
                                                </tr>
											</tbody>
										</table>

                <!-- END: Datatable -->


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
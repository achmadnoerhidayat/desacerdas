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

	$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk WHERE kode='$kd_kel' and id_jk='1'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_laki=$tm_cari['tot'];

	$cari_kd=mysqli_query($koneksi,"SELECT count(id_jk) as tot FROM tbpenduduk WHERE kode='$kd_kel' and id_jk='2'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_perempuan=$tm_cari['tot'];

	$jml_penduduk=$jml_laki+$jml_perempuan;
	
	if(isset($_POST['tambah'])){	
		$txtcari = $_POST['txtcari'];
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
					<a href="#" class="breadcrumb--active">Data Kependudukan Berdasarkan KK dan AK (Anggota Keluarga)</a> </div>
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
                        <!-- BEGIN: Form Layout -->
                        <div class="intro-y box p-5">

                                        <table class="table">
                                            <tbody>
											<form action="" name="modal_popup" enctype="multipart/form-data" method="POST">
												<tr class="">
													<td colspan="5" class="no-border">
														<input class="input pr-12 w-full border col-span-4" 
														placeholder="No KK" id="txtcari" name="txtcari">
													</td>
													<td width="10%" class="no-border text-center">
														<button type="submit" name="tambah" class="button w-40 bg-theme-1 text-white">CARI</button>
													</td>
												</tr>
											</form>
											
											
											
											
                                                <tr valign="top" class="">
                                                    	<td width="15%" class="no-border"></td>
                                                    	<td width="1%" class="no-border text-center"></td>
                                                    	<td width="54%" class="no-border text-left" ></td>
                                                    	<td width="10%" class="no-border text-center">
															<button type="button" class="button w-40 bg-theme-1 text-white">
															<a href="report02.php?kk=<?php echo $txtcari; ?>" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Download&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
															</button>
														</td>
                                                    	<td width="10%" class="no-border text-center">
															<button type="button" class="button w-40 bg-theme-1 text-white">
															<a target="_blank" href="export_excel02.php?kk=<?php echo $txtcari; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Export Excel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
															</button>
														</td>
                                                    	<td width="10%" class="no-border text-center">
															<button type="button" class="button w-40 bg-theme-1 text-white">
															<a href="cetak02.php?kk=<?php echo $txtcari; ?>" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Print&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
															</button>
														</td>
                                                </tr>
                                            </tbody>
                                        </table>

									<div class="overflow-x-auto">
										<?php 
											if(isset($_POST['tambah'])){	
												$txtcari = $_POST['txtcari'];
												
												$cari_kd=mysqli_query($koneksi,"select alamat, rt, rw 
																				FROM tbpenduduk 
																				where kode='$kd_kel' and kk='$txtcari'");
												$tm_cari=mysqli_fetch_array($cari_kd);
												$alamat_hdr=$tm_cari['alamat'];
												$rt_hdr=$tm_cari['rt'];
												$rw_hdr=$tm_cari['rw'];

												$cari_kd=mysqli_query($koneksi,"select nama FROM tbpenduduk 
																				where kode='$kd_kel' and kk='$txtcari' and status_hub='Kepala Keluarga'");
												$tm_cari=mysqli_fetch_array($cari_kd);
												$nama_kk=$tm_cari['nama'];
											} else {
												$txtcari="";
												$alamat_hdr="";
												$rt_hdr="";
												$rw_hdr="";
												$nama_kk="";
											}
										?>
										<table class="table"> 
											<tr>
												<td width="15%"></td>
												<td width="20%"><font size="2"><b>No. KK</b></font></td>
												<td width="20%"><font size="2"><b><?php echo $txtcari; ?></b></font></td>
												<td width="15%"><font size="2"><b>Desa/Kelurahan</b></font></td>
												<td width="15%"><font size="2"><b><?php echo $nm_kel; ?></b></font></td>
												<td width="15%"></td>
											</tr>
											<tr>
												<td width="15%"></td>
												<td width="20%"><font size="2"><b>Nama Kepala Keluarga</b></font></td>
												<td width="20%"><font size="2"><b><?php echo $nama_kk; ?></b></font></td>
												<td width="15%"><font size="2"><b>Kecamatan</b></font></td>
												<td width="15%"><font size="2"><b><?php echo $nm_kec; ?></b></font></td>
												<td width="15%"></td>
											</tr>
											<tr>
												<td width="15%"></td>
												<td width="20%"><font size="2"><b>Alamat</b></font></td>
												<td width="20%"><font size="2"><b><?php echo $alamat_hdr; ?></b></font></td>
												<td width="15%"><font size="2"><b>Kabupaten/Kota</b></font></td>
												<td width="15%"><font size="2"><b><?php echo $nm_kab; ?></b></font></td>
												<td width="15%"></td>
											</tr>
											<tr>
												<td width="15%"></td>
												<td width="20%"><font size="2"><b>RT/RW</b></font></td>
												<td width="20%"><font size="2"><b><?php echo $rt_hdr; ?>/<?php echo $rw_hdr; ?></b></font></td>
												<td width="15%"><font size="2"><b>Provinsi</b></font></td>
												<td width="15%"><font size="2"><b><?php echo $nm_prop; ?></b></font></td>
												<td width="15%"></td>
											</tr>
										</table>
										<table class="table"> 
											<thead> 
												<tr> 
													<th class="border border-b-2 whitespace-no-wrap text-center"><font size="2"><b>No</b></font></th>
													<th class="border border-b-2 whitespace-no-wrap"><font size="2"><b>Nama lengkap</b></font></th> 
													<th class="border border-b-2 whitespace-no-wrap text-center"><font size="2"><b>NIK</b></font></th> 
													<th class="border border-b-2 whitespace-no-wrap text-center"><font size="2"><b>Jenis Kelamin</b></font></th>
													<th class="border border-b-2 whitespace-no-wrap text-center"><font size="2"><b>Tempat Lahir</b></font></th> 
													<th class="border border-b-2 whitespace-no-wrap text-center"><font size="2"><b>Tanggal Lahir</b></font></th>
													<th class="border border-b-2 whitespace-no-wrap text-center"><font size="2"><b>Agama</b></font></th>
													<th class="border border-b-2 whitespace-no-wrap text-center"><font size="2"><b>Pendidikan</b></font></th>
													<th class="border border-b-2 whitespace-no-wrap text-center"><font size="2"><b>Jenis Pekerjaan</b></font></th>
												</tr> 
											</thead>  

											<?php 
												if(isset($_POST['tambah'])){	
													$txtcari = $_POST['txtcari'];
													$query = mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal from tbpenduduk 
													where kode='$kd_kel' and kk='$txtcari'")or die(mysql_error);
												$no =1;
												while ($data = mysqli_fetch_assoc($query)) {
													$id_jk=$data['id_jk'];
													$id_status_kawin=$data['id_status_kawin'];
													$id_agama=$data['id_agama'];
													$id_gol_darah=$data['id_gol_darah'];
													$kd_pekerjaan=$data['kd_pekerjaan'];
													$id_warga=$data['id_warga'];
													$id_dukuh=$data['id_dukuh'];
													$kd_pendidikan=$data['kd_pendidikan'];
													
													$cari_kd=mysqli_query($koneksi,"select jk FROM tbjk where kode='$id_jk'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jk=$tm_cari['jk'];

													$cari_kd=mysqli_query($koneksi,"select status_nikah FROM tbstatus_nikah where kode='$id_status_kawin'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$status_nikah=$tm_cari['status_nikah'];

													$cari_kd=mysqli_query($koneksi,"select agama FROM tbagama where kode='$id_agama'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$agama=$tm_cari['agama'];

													$cari_kd=mysqli_query($koneksi,"select darah FROM tbdarah where kode='$id_gol_darah'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$darah=$tm_cari['darah'];
													
													$cari_kd=mysqli_query($koneksi,"select pekerjaan FROM tbpekerjaan where kode='$kd_pekerjaan'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$pekerjaan=$tm_cari['pekerjaan'];
													
													$cari_kd=mysqli_query($koneksi,"select warga FROM tbwarga where kode='$id_warga'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$warga=$tm_cari['warga'];
													
													$cari_kd=mysqli_query($koneksi,"select nm_dukuh FROM tbdukuh where id_dukuh='$id_dukuh'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$nm_dukuh=$tm_cari['nm_dukuh'];

													$cari_kd=mysqli_query($koneksi,"select pendidikan FROM tbpendidikan where kode='$kd_pendidikan'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$pendidikan=$tm_cari['pendidikan'];	
													
													
											?>
												<tbody>
													<tr>
														<td class="border text-center"><font size="2"><?php echo $no; ?></font></td>
														<td class="border"><font size="2"><?php echo $data['nama']; ?></font></td>             
														<td class="border text-center"><font size="2"><?php echo $data['nik']; ?></font></td>            
														<td class="border text-center"><font size="2"><?php echo $jk; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $data['tempat_lhr']; ?></font></td>  
														<td class="border text-center"><font size="2"><?php echo $data['tanggal']; ?></font></td>	
														<td class="border text-center"><font size="2"><?php echo $agama; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $pendidikan; ?></font></td>														
														<td class="border text-center"><font size="2"><?php echo $pekerjaan; ?></font></td>
													</tr>
												</tbody>
												<?php     
$no++;												
													}
												}													
												?>
												
										</table> 
<br>
<table class="table"> 
											<thead> 
												<tr> 
													<th rowspan="2" class="border border-b-2 whitespace-no-wrap"><font size="2"><b>Status Perkawinan</b></font></th> 
													<th rowspan="2" class="border border-b-2 whitespace-no-wrap text-center"><font size="2"><b>Status Hubungan<br>Dalam Keluarga</b></font></th> 
													<th rowspan="2" class="border border-b-2 whitespace-no-wrap text-center"><font size="2"><b>Kewarganegaraan</b></font></th>
													<th colspan="2" class="border border-b-2 whitespace-no-wrap"><font size="2"><b>Dokumen Imigrasi</b></font></th> 
													<th colspan="2" class="border border-b-2 whitespace-no-wrap"><font size="2"><b>Nama Orang Tua</b></font></th> 
													<th rowspan="2" colspan="3" class="border border-b-2 whitespace-no-wrap"></th> 
												</tr> 
												<tr> 
													<th class="border border-b-2 whitespace-no-wrap"><font size="2"><b>No. Paspor</b></font></th> 
													<th class="border border-b-2 whitespace-no-wrap text-center"><font size="2"><b>No. Kitap</b></font></th> 
													<th class="border border-b-2 whitespace-no-wrap text-center"><font size="2"><b>Ayah</b></font></th>
													<th class="border border-b-2 whitespace-no-wrap"><font size="2"><b>Ibu</b></font></th> 
												</tr>												
											</thead>  

											<?php 
												if(isset($_POST['tambah'])){	
													$txtcari = $_POST['txtcari'];
													$query = mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal from tbpenduduk 
													where kode='$kd_kel' and kk='$txtcari'")or die(mysql_error);
												
												while ($data = mysqli_fetch_assoc($query)) {
													$id_jk=$data['id_jk'];
													$id_status_kawin=$data['id_status_kawin'];
													$id_agama=$data['id_agama'];
													$id_gol_darah=$data['id_gol_darah'];
													$kd_pekerjaan=$data['kd_pekerjaan'];
													$id_warga=$data['id_warga'];
													$id_dukuh=$data['id_dukuh'];
													$id_dukuh=$data['id_dukuh'];
													
													$cari_kd=mysqli_query($koneksi,"select jk FROM tbjk where kode='$id_jk'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jk=$tm_cari['jk'];

													$cari_kd=mysqli_query($koneksi,"select status_nikah FROM tbstatus_nikah where kode='$id_status_kawin'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$status_nikah=$tm_cari['status_nikah'];

													$cari_kd=mysqli_query($koneksi,"select agama FROM tbagama where kode='$id_agama'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$agama=$tm_cari['agama'];

													$cari_kd=mysqli_query($koneksi,"select darah FROM tbdarah where kode='$id_gol_darah'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$darah=$tm_cari['darah'];
													
													$cari_kd=mysqli_query($koneksi,"select pekerjaan FROM tbpekerjaan where kode='$kd_pekerjaan'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$pekerjaan=$tm_cari['pekerjaan'];
													
													$cari_kd=mysqli_query($koneksi,"select warga FROM tbwarga where kode='$id_warga'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$warga=$tm_cari['warga'];
													
													$cari_kd=mysqli_query($koneksi,"select nm_dukuh FROM tbdukuh where id_dukuh='$id_dukuh'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$nm_dukuh=$tm_cari['nm_dukuh'];
	
											?>
												<tbody>
													<tr>
														<td class="border"><font size="2"><?php echo $status_nikah; ?></font></td>             
														<td class="border text-center"><font size="2"><?php echo $data['status_hub']; ?></font></td>            
														<td class="border text-center"><font size="2"><?php echo $warga; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $data['passport']; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $data['kitap']; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $data['nm_ayah']; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $data['nm_ibu']; ?></font></td>
														<td class="border">
															<form action="penduduk_detail01.php" method="post">			
																<input type="hidden" name="txtid" value="<?php echo $data['id']; ?>"/>															
																<input type="hidden" name="txtform" value="2"/>
																<button class="btn_style" type="submit">Detail</button>
															</form>	
														</td>	
														<td class="border">
															<form action="penduduk_edit01.php" method="post">			
																<input type="hidden" name="txtid" value="<?php echo $data['id']; ?>"/>															
																<input type="hidden" name="txtform" value="2"/>
																<button class="btn_style1" type="submit">Edit</button>
															</form>															
														</td>	
														<td class="border">
																<a href="penduduk_del.php?txtid=<?php echo $data['id']?>&txtform=2" 
																onclick="return confirm('Data penduduk akan dihapus. Lanjutkan?')"> 
																<button class="btn_style2" type="button">Delete</button>
																</a>
														</td>
													</tr>
												</tbody>
												<?php               
													}
												}													
												?>
												
										</table> 
</div>        


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
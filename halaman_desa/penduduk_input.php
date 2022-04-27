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
	
	$tgl_skr=date('d/m/Y');
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kel=$tm_cari['nama'];
	
	$kd_kec=substr($kd_kel,0,8);
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kec'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kec=$tm_cari['nama'];
	
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
								<td class="border text-center whitespace-no-wrap" bgcolor="white" width="25%">
									<font color="black">Data Diri</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="25%">
									<font color="white">Informasi Menetap Mutasi</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="25%">
									<font color="white">Kepemilikan E-KTP dan Dokumen</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="25%">
									<font color="white">Data Keluarga</font>
								</td>
							</tr> 
						</table>
						
<form class="form-horizontal" action="penduduk_input01.php" method="post">
                        <div class="intro-y box">
                            <div class="p-5" id="input">
							
                                <div class="preview">
									<div class="mt-3">
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="KK" 
												id="txtkk" name="txtkk" autocomplete="off" required>
											</div>
										</div>
										<div class="mt-3">
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="NIK" 
												id="txtnik" name="txtnik" autocomplete="off" required>
											</div>
										</div>
										<div class="mt-3">
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Nama Lengkap" 
												id="txtnm" name="txtnm" autocomplete="off" required>
											</div>
										</div>
										<div class="mt-3">
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Tempat Lahir" 
												id="txttempatlhr" name="txttempatlhr" autocomplete="off" required>
											</div>
										</div>
										<div class="mt-3">
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Tanggal Lahir" 
												id="txttgllahir" name="txtgllahir" autocomplete="off" required value="<?php echo $tgl_skr; ?>">
											</div>
										</div>
										<div class="mt-3">
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
													<select class="input pr-12 w-full border col-span-4" name="cbojk" id="cbojk" required>
													<option value="">Jenis Kelamin</option>
														<?php
															$sql="select kode, jk FROM tbjk";
			       											$sql_row=mysqli_query($koneksi,$sql);
			       											while($sql_res=mysqli_fetch_assoc($sql_row))	
																{
														?>
													<option value="<?php echo $sql_res["kode"]; ?>"><?php echo $sql_res["jk"]; ?></option>
			       										<?php
			       											}
			       										?>
													</select>
												</div>
												<div class="relative mt-2">
													<select class="input pr-12 w-full border col-span-4" name="cbodarah" id="cbodarah" required>
													<option value="">Golongan Darah</option>
														<?php
															$sql="select kode, darah FROM tbdarah";
			       											$sql_row=mysqli_query($koneksi,$sql);
			       											while($sql_res=mysqli_fetch_assoc($sql_row))	
																{
														?>
													<option value="<?php echo $sql_res["kode"]; ?>"><?php echo $sql_res["darah"]; ?></option>
			       										<?php
			       											}
			       										?>
													</select>
												</div>
											</div>
										</div>
										<div class="mt-3">
											<div class="relative mt-2">
												<input class="input pr-12 w-full border col-span-4" placeholder="Alamat" 
												id="txtalamat" name="txtalamat" required autocomplete="off">
											</div>
										</div>
										<div class="mt-3">
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
													<input class="input pr-12 w-full border col-span-4" value="<?php echo $nm_kel; ?>" disabled>
												</div>
												<div class="relative mt-2">
													<input class="input pr-12 w-full border col-span-4" value="<?php echo $nm_kec; ?>" disabled>
												</div>
											</div>
										</div>
										<div class="mt-3">
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
													<select class="input pr-12 w-full border col-span-4" id="cboagama" name="cboagama" required>
																			<option value="">Agama</option>
																				<?php
																					$sql="select kode, agama FROM tbagama";
																					$sql_row=mysqli_query($koneksi,$sql);
																						while($sql_res=mysqli_fetch_assoc($sql_row))	
																							{
																				?>
																			<option value="<?php echo $sql_res["kode"]; ?>"><?php echo $sql_res["agama"]; ?></option>
																				<?php
																					}
																				?>
																			</select>
												</div>
												<div class="relative mt-2">
													<select class="input pr-12 w-full border col-span-4" name="cbostatus" id="cbostatus" required>
													<option value="">Status Perkawinan</option>
														<?php
																	$sql="select kode, status_nikah FROM tbstatus_nikah";
			       														$sql_row=mysqli_query($koneksi,$sql);
			       														while($sql_res=mysqli_fetch_assoc($sql_row))	
																		{
																?>
																<option value="<?php echo $sql_res["kode"]; ?>"><?php echo $sql_res["status_nikah"]; ?></option>
			       													<?php
			       														}
			       													?>
													</select>
												</div>
											</div>
										</div>
										<div class="mt-3">
											<select class="input pr-12 w-full border col-span-4" name="cbodukuh" id="cbodukuh" required>
																	<option value="">Pilih Dukuh/Dusun</option>
																	<?php
																		$sql="select id_dukuh, nm_dukuh FROM tbdukuh where kode='$kd_kel'";
																		$sql_row=mysqli_query($koneksi,$sql);
																		while($sql_res=mysqli_fetch_assoc($sql_row))	
																			{
																	?>
																	<option value="<?php echo $sql_res["id_dukuh"]; ?>"><?php echo $sql_res["nm_dukuh"]; ?></option>
																	<?php
																		}
																	?>								
											</select>
										</div>
										<div class="mt-3">
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
													<input class="input pr-12 w-full border col-span-4" placeholder="RT" 
												id="txtrt" name="txtrt" required autocomplete="off">
												</div>
												<div class="relative mt-2">
													<input class="input pr-12 w-full border col-span-4" placeholder="RW" 
												id="txtrw" name="txtrw" required autocomplete="off">
												</div>
											</div>
										</div>
										<div class="mt-3">
											<select class="input pr-12 w-full border col-span-4" name="cbopekerjaan" id="cbopekerjaan" required>
											<option value="">Pekerjaan</option>
											<?php
																	$sql="select kode, pekerjaan FROM tbpekerjaan";
			       														$sql_row=mysqli_query($koneksi,$sql);
			       														while($sql_res=mysqli_fetch_assoc($sql_row))	
																		{
																?>
																<option value="<?php echo $sql_res["kode"]; ?>"><?php echo $sql_res["pekerjaan"]; ?></option>
			       													<?php
			       														}
			       													?>					
											</select>
										</div>
										<div class="mt-3">
											<select class="input pr-12 w-full border col-span-4" name="cbowarga" id="cbowarga" required>
											<option value="">Warga Negara</option>
											<?php
																	$sql="select kode, warga FROM tbwarga";
			       														$sql_row=mysqli_query($koneksi,$sql);
			       														while($sql_res=mysqli_fetch_assoc($sql_row))	
																		{
																?>
																<option value="<?php echo $sql_res["kode"]; ?>"><?php echo $sql_res["warga"]; ?></option>
			       													<?php
			       														}
			       													?>			
											</select>
										</div>	
										<div class="mt-3">
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
													<select class="input pr-12 w-full border col-span-4" name="cbopendidikan" id="cbopendidikan" required>
												<option value="">Pendidikan Terakhir</option>
												<?php
																		$sql="select kode, pendidikan FROM tbpendidikan";
																			$sql_row=mysqli_query($koneksi,$sql);
																			while($sql_res=mysqli_fetch_assoc($sql_row))	
																			{
																	?>
																	<option value="<?php echo $sql_res["kode"]; ?>"><?php echo $sql_res["pendidikan"]; ?></option>
																		<?php
																			}
																		?>			
												</select>
												</div>
												<div class="relative mt-2">
													<select class="input pr-12 w-full border col-span-4" name="cbomembaca" id="cbomembaca" required>
													<option value="">Dapat Membaca</option>
														<?php
																	$sql="select kode, membaca FROM tbmembaca order by id asc";
			       														$sql_row=mysqli_query($koneksi,$sql);
			       														while($sql_res=mysqli_fetch_assoc($sql_row))	
																		{
																?>
																<option value="<?php echo $sql_res["kode"]; ?>"><?php echo $sql_res["membaca"]; ?></option>
			       													<?php
			       														}
			       													?>
													</select>
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
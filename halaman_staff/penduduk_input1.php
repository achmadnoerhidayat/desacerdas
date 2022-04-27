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
                
                <div class="pos intro-y grid grid-cols-12 gap-5 ">
                    <!-- BEGIN: Post Content -->
                    <div class="intro-y col-span-12 lg:col-span-12">
<form class="form-horizontal" action="save_kependudukan.php" method="post">
						<input type="hidden" name="txtkdkel" value="<?php echo $kd_kel; ?>"/>
                        <div class="post intro-y overflow-hidden box mt-8">
						<!-- BEGIN: Button Link -->
                        <div class="intro-y box mt-5">
                            
                            <div class="p-5" id="link-button">
                                <div class="preview"> <a href="" class="button w-24 inline-block mr-1 mb-2 bg-theme-1 text-white">Link</a> <a href="" class="button w-24 inline-block mr-1 mb-2 border text-gray-700">Button</a> <a href="" class="button w-24 inline-block mr-1 mb-2 bg-theme-9 text-white">Input</a> <a href="" class="button w-24 inline-block mr-1 mb-2 bg-theme-12 text-white">Submit</a> <a href="" class="button w-24 inline-block mr-1 mb-2 bg-theme-6 text-white">Reset</a> <a href="" class="button w-24 inline-block mr-1 mb-2 bg-gray-200 text-gray-600">Metal</a> </div>
                                <div class="source-code hidden">
                                    <button data-target="#keywords" class="copy-code button button--sm border flex items-center text-gray-700"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Copy code </button>
                                    <div class="overflow-y-auto h-64 mt-3">
                                        <pre class="source-preview" id="copy-link-button"> <code class="text-xs p-0 rounded-md html pl-5 pt-8 pb-4 -mb-10 -mt-10"> HTMLOpenTaga href=&quot;&quot; class=&quot;button w-24 inline-block mr-1 mb-2 bg-theme-1 text-white&quot;HTMLCloseTagLinkHTMLOpenTag/aHTMLCloseTag HTMLOpenTaga href=&quot;&quot; class=&quot;button w-24 inline-block mr-1 mb-2 border text-gray-700&quot;HTMLCloseTagButtonHTMLOpenTag/aHTMLCloseTag HTMLOpenTaga href=&quot;&quot; class=&quot;button w-24 inline-block mr-1 mb-2 bg-theme-9 text-white&quot;HTMLCloseTagInputHTMLOpenTag/aHTMLCloseTag HTMLOpenTaga href=&quot;&quot; class=&quot;button w-24 inline-block mr-1 mb-2 bg-theme-12 text-white&quot;HTMLCloseTagSubmitHTMLOpenTag/aHTMLCloseTag HTMLOpenTaga href=&quot;&quot; class=&quot;button w-24 inline-block mr-1 mb-2 bg-theme-6 text-white&quot;HTMLCloseTagResetHTMLOpenTag/aHTMLCloseTag HTMLOpenTaga href=&quot;&quot; class=&quot;button w-24 inline-block mr-1 mb-2 bg-gray-200 text-gray-600&quot;HTMLCloseTagMetalHTMLOpenTag/aHTMLCloseTag </code> </pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Button Link -->
						
                            
                            <div class="post__content tab-content">
								<div class="tab-content__pane p-5 active" id="content">
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
												id="txtalamat" name="txtalamat" required>
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
												id="txtrt" name="txtrt" required>
												</div>
												<div class="relative mt-2">
													<input class="input pr-12 w-full border col-span-4" placeholder="RW" 
												id="txtrw" name="txtrw" required>
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
									</div>
								</div>
								<div class="tab-content__pane p-5" id="meta-title">

									<div class="preview">
                                    <div>
					<div class="mt-3">
                                        <div class="flex items-center text-gray-700 mt-2">
                                            <input type="radio" class="input border mr-2" id="rbt1" name="vertical_radio_button" value="rbt1">
                                            <label class="cursor-pointer select-none" for="rbt1">Menetap</label>
                                        </div>
</div>
<div class="mt-3">
                                        <div class="flex items-center text-gray-700 mt-2">
                                            <input type="radio" class="input border mr-3" id="vertical-radio-liam-neeson" name="vertical_radio_button" value="vertical-radio-liam-neeson">
                                            <label class="cursor-pointer select-none" for="vertical-radio-liam-neeson">Datang Dari</label>
													<input class="input pr-12 w-full border col-span-4" placeholder="RT" 
												id="txtrt" name="txtrt" required>
                                        </div>
</div>
                                        <div class="flex items-center text-gray-700 mt-2">
                                            <input type="radio" class="input border mr-2" id="vertical-radio-daniel-craig" name="vertical_radio_button" value="vertical-radio-daniel-craig">
                                            <label class="cursor-pointer select-none" for="vertical-radio-daniel-craig">Daniel Craig</label>
                                        </div>
                                    </div>
									</div>
								</div>
								<div class="tab-content__pane p-5" id="keywords">
									Kepemilikan E-KTP dan Dokumen
								</div>
								<div class="tab-content__pane p-5" id="keywords1">
									Data Keluarga
								</div>
                            </div>
                        </div>
						<button type="submit" class="button bg-theme-1 text-white mt-5">   &nbsp;&nbsp;&nbsp;SIMPAN&nbsp;&nbsp;&nbsp;   </button>
                    </div>
                    <!-- END: Post Content -->
					
</form>
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
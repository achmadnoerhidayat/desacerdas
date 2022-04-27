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
	
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kec'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kec=$tm_cari['nama'];

	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_prop'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_prop=$tm_cari['nama'];

	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kab'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kab=$tm_cari['nama'];
	
	$cari_kd=mysqli_query($koneksi,"SELECT * FROM tbprofil where kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$kd_pos=$tm_cari['kd_pos'];
	$luas=$tm_cari['luas'];
	$file_peta=$tm_cari['file_peta'];
	$lat_desa=$tm_cari['lat_desa'];
	$long_desa=$tm_cari['long_desa'];
	$koordinat=$lat_desa.",".$long_desa;	
	
	$tgl_skr=date('d/m/Y');	
	$tgl_skr_eng=date('Y/m/d');

	$bln_skr=date('m');
	$thn_skr=date('Y');	
	$cari_kd=mysqli_query($koneksi,"SELECT 
									DATE_FORMAT(tgl,'%d/%m/%Y') AS tanggal, 
									suspect, probable, positif, perawatan, meninggal, sembuh, 
									otg, isoman, id 
									FROM tbcovid where kode='$kd_kel' and tgl='$tgl_skr_eng'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$suspect=$tm_cari['suspect'];
	$perawatan=$tm_cari['perawatan'];
	$probable=$tm_cari['probable'];
	$positif=$tm_cari['positif'];
	$meninggal=$tm_cari['meninggal'];
	$sembuh=$tm_cari['sembuh'];	
	$otg=$tm_cari['otg'];	
	$isoman=$tm_cari['isoman'];	
	
	if($suspect=='') {
		$suspect="0";
	}
	if($perawatan=='') {
		$perawatan="0";		
	}
	if($probable=='') {
		$probable="0";
	}
	if($positif=='') {
		$positif="0";
	}
	if($meninggal=='') {
		$meninggal="0";
	}
	if($sembuh=='') {
		$sembuh="0";
	}
	if($otg=='') {
		$otg="0";
	}
	if($isoman=='') {
		$isoman="0";
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

		<script src="assets/js/highcharts.js"></script>
<script src="assets/js/jquery-1.10.1.min.js"></script>
<script>
		var chart; 
		$(document).ready(function() {
			  chart = new Highcharts.Chart(
			  {
				  
				 chart: {
					renderTo: 'mygraph',
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false
				 },   
				 title: {
					text: 'Grafik Jumlah Penduduk Laki-Laki dan Perempuan '
				 },
				 tooltip: {
					formatter: function() {
						return '<b>'+
						this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ';
					}
				 },
				 
				
				 plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							color: '#000000',
							connectorColor: 'green',
							formatter: function() 
							{
								return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) +' % ';
							}
						}
					}
				 },
       
					series: [{
					type: 'pie',
					name: 'Browser share',
					data: [
					<?php
					    include "connection.php";
						$query = mysqli_query($con,"SELECT jk from view_penduduk1 where kode='$id'");
					 
						while ($row = mysqli_fetch_array($query)) {
							$browsername = $row['jk'];
						 
							$data = mysqli_fetch_array(mysqli_query($con,"SELECT total from view_penduduk1 where jk='$browsername' and kode='$id'"));
							$jumlah = $data['total'];
							?>
							[ 
								'<?php echo $browsername ?>', <?php echo $jumlah; ?>
							],
							<?php
						}
						?>
			 
					]
				}]
			  });
		});	
	</script>
	
<style>
	.btn_style{
		border: 1px solid #cecece;
		border-radius: 3px;
		padding: 3px 10px;
		box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
		color: black;
		background-color: yellow;
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
		background-color: green;
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

<link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
      integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
      crossorigin=""
    />

    <script
      src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
      integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
      crossorigin=""
    ></script>
<style>
#map {
    width: 100%;
    height:640px;
}

#map1 {
    width: 100%;
    height:640px;
}

#chart-container {
    width: 100%;
    height: auto;
}


</style>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>
	
    </head>
    <!-- END: Head -->
    <body class="app">


    <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("data.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var marks = [];

                    for (var i in data) {
                        name.push(data[i].tahun);
                        marks.push(data[i].laju);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Tahun Data',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'line',
                        data: chartdata
                    });
                });
            }
        }
        </script>
        <!-- BEGIN: Mobile Menu -->

        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->

<?php include "menu_dashboard.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="index.php" class="breadcrumb--active">Dashboard</a> </div>
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Search -->
					<form action="index-search.php" method="post">
						<div class="search hidden sm:block">
							<input type="text" class="search__input input placeholder-theme-13" id="txtsearch" name="txtsearch" placeholder="Search..." autocomplete="off" required>
							<button type="submit" class="cart-button" id="btnsearch" name="btnsearch"><i data-feather="search" class="search__icon"></i></button>
					 
	                        </div>
	                        <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon"></i> </a>
				
                  	</form>
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
														placeholder="NIK/KK/nama" id="txtcari" name="txtcari">
													</td>
													<td width="10%" class="no-border text-center">
														<button type="submit" name="tambah" class="button w-40 bg-theme-1 text-white">CARI</button>
													</td>
												</tr>
											</form>
                                            </tbody>
                                        </table>
										<div class="overflow-x-auto">
										<table class="table"> 
											<thead>
												<tr> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>KK</b></font></center></td> 													
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>NIK</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>NAMA LENGKAP</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>ALAMAT</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>RT</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>RW</b></font></center></td> 													
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>KELURAHAN/DESA</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center><font size="2"><b>KECAMATAN</b></font></center></td> 
													<td class="border border-b-2 whitespace-no-wrap"><center></center></td>
												</tr> 
											</thead>  

											<?php 
												$halaman = 10;
												$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
												$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

												if(isset($_POST['tambah'])){	
													$txtcari = $_POST['txtcari'];
													$result = mysqli_query($koneksi,"SELECT * FROM tbpenduduk where kode='$kd_kel'
                                                    and (nama like '%$txtcari%' or kk like '%$txtcari%' or nik like '%$txtcari%')");
													} else {
													$result = mysqli_query($koneksi,"SELECT * FROM tbpenduduk where kode='$kd_kel' and nik='0'");
												}

												$total = mysqli_num_rows($result);
												$pages = ceil($total/$halaman);            

												if(isset($_POST['tambah'])){	
													$txtcari = $_POST['txtcari'];
													$query = mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal from tbpenduduk 
													where kode='$kd_kel' and
                                                    (nama like '%$txtcari%' or kk like '%$txtcari%' or nik like '%$txtcari%') LIMIT $mulai, $halaman")or die(mysql_error);
												} else {
													$query = mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal from tbpenduduk 
													where kode='$kd_kel' and nik='0' LIMIT $mulai, $halaman")or die(mysql_error);
												}
												$no =$mulai+1;
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

													$cari_kd=mysqli_query($koneksi,"select pendidikan FROM tbpendidikan where kode='$kd_pendidikan'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$pendidikan=$tm_cari['pendidikan'];

													//$cari_kd=mysqli_query($koneksi,"SELECT membaca FROM tbmembaca WHERE kode='$kd_membaca'");
													//$tm_cari=mysqli_fetch_array($cari_kd);
													//$membaca=$tm_cari['membaca'];
													
													$cari_kd=mysqli_query($koneksi,"select nm_dukuh FROM tbdukuh where id_dukuh='$id_dukuh'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$nm_dukuh=$tm_cari['nm_dukuh'];
	
											?>
												<tbody>
													<tr>
														<td class="border text-center"><font size="2"><?php echo $data['kk']; ?></font></td>	
														<td class="border text-center"><font size="2"><?php echo $data['nik']; ?></font></td>
														<td class="border"><font size="2"><?php echo $data['nama']; ?></font></td>             
														<td class="border"><font size="2"><?php echo $data['alamat']; ?></font></td>
														<td class="border"><font size="2"></font></td>														
														<td class="border"><font size="2"></font></td>														
														<td class="border text-center"><font size="2"><?php echo $nm_kel; ?></font></td>
														<td class="border text-center"><font size="2"><?php echo $nm_kec; ?></font></td>
														<td class="border">
															<form action="index_penduduk_detail01.php" method="post">			
																<input type="hidden" name="txtid" value="<?php echo $data['id']; ?>"/>															
																<input type="hidden" name="txtform" value="7"/>
																<button class="btn_style" type="submit">Lihat Data</button>
															</form>	
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
				

					
				<div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-6">
                        <!-- BEGIN: Basic Table -->
                        <div class="intro-y box">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                <h2 class="font-medium text-base mr-auto">
                                    Laju Pertumbuhan Penduduk
                                </h2>
                            </div>
							<div class="p-5">
                                <div class="preview">
                                    <div class="overflow-x-auto">	

        <canvas id="graphCanvas"></canvas>

									</div>
								</div>
							</div>
						</div>
					</div>
                    <div class="intro-y col-span-12 lg:col-span-6">
                        <!-- BEGIN: Basic Table -->
                        <div class="intro-y box">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                <h2 class="font-medium text-base mr-auto">
                                    Update Covid Per Tanggal <?php echo $tgl_skr; ?>
                                </h2>
                            </div>
							<div class="p-5">
                                <div class="preview">
                                    <div class="overflow-x-auto">	
													<table class="table">
														<tbody>
															<tr>	
																<td class="border text-center" bgcolor="#FF7F50" width="40%"><font color="white">SUSPECT</font></td>
																<td class="text-center" width="20%"><font color="#FF7F50"><?php echo $suspect; ?></font></td>
																<td class="border text-center" bgcolor="blue" width="40%"><font color="white">PERAWATAN</font></td>
																<td class="text-center" width="20%"><font color="blue"><?php echo $perawatan; ?></font></td>																
															</tr>
															<tr>	
																<td class="border text-center" bgcolor="#FF00FF" width="40%"><font color="white">PROBABLE</font></td>
																<td class="text-center" width="20%"><font color="#FF00FF"><?php echo $probable; ?></font></td>
																<td class="border text-center" bgcolor="black" width="40%"><font color="white">MENINGGAL</font></td>
																<td class="text-center" width="20%"><font color="black"><?php echo $meninggal; ?></font></td>																
															</tr>
															<tr>	
																<td class="border text-center" bgcolor="#00FFFF" width="40%"><font color="white">O T G</font></td>
																<td class="text-center" width="20%"><font color="#00FFFF"><?php echo $otg; ?></font></td>
																<td class="border text-center" bgcolor="#DC143C" width="40%"><font color="white">ISOMAN</font></td>
																<td class="text-center" width="20%"><font color="#DC143C"><?php echo $isoman; ?></font></td>																
															</tr>
															<tr>	
																<td class="border text-center" bgcolor="red" width="40%"><font color="white">POSITIF</font></td>
																<td class="text-center" width="20%"><font color="red"><?php echo $positif; ?></font></td>
																<td class="border text-center" bgcolor="green" width="40%"><font color="white">SEMBUH</font></td>
																<td class="text-center" width="20%"><font color="green"><?php echo $sembuh; ?></font></td>
															</tr>
														</tbody>
													</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
						
                        <div class="col-span-12 xl:col-span-12 mt-6">
							<!-- BEGIN: Small Table -->
							<div class="intro-y box mt-5">
								<div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
									<h2 class="font-medium text-base mr-auto">
										Data Mutasi Penduduk Bulan Ini
									</h2>
								</div>
								<div class="p-5" id="small-table">
									<div class="preview">
										<div class="overflow-x-auto">
											<table class="table mt-5">
												<thead>
													<tr class="bg-gray-200 text-gray-700">
														<th class="whitespace-no-wrap">#</th>
														<th class="whitespace-no-wrap">NIK</th>
														<th class="whitespace-no-wrap">NAMA LENGKAP</th>
														<th class="whitespace-no-wrap">ALAMAT</th>
														<th class="whitespace-no-wrap">RT</th>
														<th class="whitespace-no-wrap">RW</th>
														<th class="whitespace-no-wrap">KELURAHAN/DESA</th>														
														<th class="whitespace-no-wrap">KECAMATAN</th>																												
														<th class="whitespace-no-wrap">KETERANGAN</th>																																										
													</tr>
												</thead>
												<tbody>
													<?php 
														$query1 = mysqli_query($koneksi,"select *, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tanggal, 
																						DATE_FORMAT(tgl_register,'%d/%m/%Y') AS tanggal_kematian, 
																						DATE_FORMAT(tgl_datang,'%d/%m/%Y') AS tanggal_datang, 
																						DATE_FORMAT(tgl_pindah,'%d/%m/%Y') AS tanggal_pergi 																						
														from tbpenduduk 
														where kode='$kd_kel' and menetap<>'Menetap' and 
														month(tgl_register)='$bln_skr' and year(tgl_register)='$thn_skr'")or die(mysql_error);
														$no=0;
														while ($data1 = mysqli_fetch_assoc($query1)) {
															$menetap=$data1['menetap'];
															if($menetap=='Lahir Di') {
																$ket="Kelahiran";
																$ket_tgl=$data1['tanggal'];
																$warna_text="green";
															}
															if($menetap=='Meninggal') {
																$ket="Meninggal";
																$ket_tgl=$data1['tanggal_kematian'];
																$jam_kematian=$data1['jam_kematian'];		
																$warna_text="red";																
															}		
															if($menetap=='Datang Dari') {
																$ket="Kedatangan";
																$ket_tgl=$data1['tanggal_datang'];
																//$jam_kematian=$data1['jam_kematian'];		
																$warna_text="green";																
															}		
															if($menetap=='Pindah Ke') {
																$ket="Pindah";
																$ket_tgl=$data1['tanggal_pergi'];
																//$jam_kematian=$data1['jam_kematian'];		
																$warna_text="red";																
															}																	
															$no++;	
													?>
													<tr>
														<td class="border-b"><?php echo $no; ?></td>														
														<td class="border-b"><?php echo $data1['nik']; ?></td>
														<td class="border-b"><?php echo $data1['nama']; ?></td>
														<td class="border-b"><?php echo $data1['alamat']; ?></td>
														<td class="border-b"></td>
														<td class="border-b"></td>
														<td class="border-b"><?php echo $nm_kel; ?></td>														
														<td class="border-b"><?php echo $nm_kec; ?></td>
														<td class="border-b">
															<font color="<?php echo $warna_text; ?>">
															<?php echo $ket; ?><br>
															<?php echo $ket_tgl; ?>
															</font>
														</td>														
													</tr>
													<?php 
														}
													?>													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<!-- END: Small Table -->
                        </div>						
<br>&nbsp;Peta Wilayah
                    <div class="intro-y blog col-span-12 md:col-span-12 box">
                        
<div id="map"></div>
<script>
        var mymap = L.map('map').setView([<?php echo $lat_desa; ?>,<?php echo $long_desa; ?>], 19);   
        //setting maps menggunakan api mapbox bukan google maps, daftar dan dapatkan token      
        L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibmFiaWxjaGVuIiwiYSI6ImNrOWZzeXh5bzA1eTQzZGxpZTQ0cjIxZ2UifQ.1YMI-9pZhxALpQ_7x2MxHw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 20,
                id: 'mapbox/streets-v11', //menggunakan peta model streets-v11 kalian bisa melihat jenis-jenis peta lainnnya di web resmi mapbox
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'your.mapbox.access.token'
            }).addTo(mymap);
			
	
</script>
												
                    </div>	

<br>&nbsp;Peta Sebaran Tracking COVID 19
                    <div class="intro-y blog col-span-12 md:col-span-12 box">
                        
        <div id="map1"></div>
<script>
        var mymap = L.map('map1').setView([<?php echo $lat_desa; ?>,<?php echo $long_desa; ?>], 11);   
        //setting maps menggunakan api mapbox bukan google maps, daftar dan dapatkan token      
        L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibmFiaWxjaGVuIiwiYSI6ImNrOWZzeXh5bzA1eTQzZGxpZTQ0cjIxZ2UifQ.1YMI-9pZhxALpQ_7x2MxHw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 20,
                id: 'mapbox/streets-v11', //menggunakan peta model streets-v11 kalian bisa melihat jenis-jenis peta lainnnya di web resmi mapbox
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'your.mapbox.access.token'
            }).addTo(mymap);
			
<?php
        
        $mysqli = mysqli_connect('localhost', 'root', '', 'dbdesacerdas');   //koneksi ke database
        $tampil = mysqli_query($mysqli, "select * from tbtracking where kode='$kd_kel'"); //ambil data dari tabel lokasi
        while($hasil = mysqli_fetch_array($tampil)){ 
			$lat_lok=$hasil['_lat'];
			$long_lok=$hasil['_long'];
			$koordinat=$lat_lok.",".$long_lok;
		?> 

        L.marker([<?php echo str_replace(['[', ']', 'LatLng', '(', ')'], '', $koordinat); ?>]).addTo(mymap)

        <?php } ?>			        
       	
</script>
    
												
                    </div>
					
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
    </body>
</html>

<?php
	}
?>
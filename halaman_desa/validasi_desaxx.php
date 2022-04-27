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

	$cari_kd=mysqli_query($koneksi,"SELECT count(*) as tot FROM tbdukuh where kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jml_dukuh=$tm_cari['tot'];
	
	$cari_kd=mysqli_query($koneksi,"SELECT *, 
					left(kode,2) as kd_prop, left(kode,5) as kd_kab,
					left(kode,8) as kd_kec 
					FROM tbprofil where kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$file_peta=$tm_cari['file_peta'];
	$file_logo=$tm_cari['logo_desa'];
	$kd_prop=$tm_cari['kd_prop'];
	$kd_kab=$tm_cari['kd_kab'];
	$kd_kec=$tm_cari['kd_kec'];	
	$alamat=$tm_cari['alamat'];	
	$kd_pos=$tm_cari['kd_pos'];

	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_prop'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_prop=$tm_cari['nama'];

	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kab'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kab=$tm_cari['nama'];
	
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

<?php include "menu_profil01.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="#" class="breadcrumb--active">Validasi Desa</a> </div>
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
            <h2 class="text-lg font-medium mr-auto">
                Desa 
            </h2>

            <div class="flex flex-row">
                <a href="" id="hapus-desa" class="button inline-block border border-theme-6 text-theme-6 w-24 mr-2">Hapus</a>
                <a href="" class="button inline-block border border-theme-1 text-theme-1 w-24 mr-2">Ubah</a>
                <div class="dropdown">
                    <button class="dropdown-toggle button inline-block bg-theme-1 text-white w-auto">Tambah <i data-feather="chevron-down" class="w-4 h-4 ml-2 inline-block"></i></button>
                    <div class="dropdown-box w-48">
                        <div class="dropdown-box__content box p-2">
                            <a href="javascript:;" data-toggle="modal" data-target="#dusun-modal" class="flex items-center p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                <i data-feather="plus" class="w-4 h-4 mr-3"></i> Dusun / Dukuh
                            </a>
                            <a href="javascript:;" data-toggle="modal" data-target="#rw-modal" class="flex items-center p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                <i data-feather="plus" class="w-4 h-4 mr-3"></i> Data RW
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="intro-y mt-5">
        <!-- BEGIN: Validate Layout -->
        @if (is_null($validate))
            <form id="form-validate" action="{{ route(request()->route()->getName()) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="flex">
                    <!-- Data Desa -->
                    <div class="w-full lg:w-1/2 p-5 box">

                        <h2 class="text-lg font-medium mr-auto">Data Desa</h2>

                        <div class="my-5 border-b border-gray-300"></div>

                        <!-- File Upload -->
                        <label>Upload Logo Daerah</label>
                        <x-input class="mt-3" type="file" id="input-file" name="image" placeholder="File" value="{{ old('email') }}" />
                        <span class="text-red-500">*</span>
                        <span class="text-xs">Tipe File PNG, JPG, JPEG, Ukuran maksimum 5MB</span>
                        <x-error :error="__('image')"></x-error>
                        <!-- End : File Upload -->

                        <div class="my-5 border-b border-gray-300"></div>

                        <!-- Form Region -->
                        <div class="mt-3 flex-col xl:flex">
                            <div>
                                <label>Provinsi</label>
                                <div class="mt-2">
                                    <select id="provinces" name="province" data-search="true" class="tail-select w-full z-auto"></select>
                                </div>
                                <x-error :error="__('province')"></x-error>
                            </div>

                            <div class="mt-4">
                                <label>Kabupaten / Kota</label>
                                <div class="mt-2">
                                    <select id="cities" name="city" data-search="true" class="tail-select w-full z-auto"></select>
                                </div>
                                <x-error :error="__('city')"></x-error>
                            </div>

                            <div class="mt-4">
                                <label>Kecamatan</label>
                                <div class="mt-2">
                                    <select id="districts" name="district" data-search="true" class="tail-select w-full z-auto"></select>
                                </div>
                                <x-error :error="__('district')"></x-error>
                            </div>

                            <div class="mt-4">
                                <label>Desa / Kelurahan</label>
                                <div class="mt-2">
                                    <select id="villages" name="village" data-search="true" class="tail-select w-full z-auto"></select>
                                </div>
                                <x-error :error="__('village')"></x-error>
                            </div>
                        </div>
                        <!-- End : Form Region -->

                        <div class="my-5 border-b border-gray-300"></div>

                        <div class="mt-3">
                            <label>Lokasi Kantor Desa</label>
                            <div class="mt-2 w-full" id="googleMap" style="height:380px;"></div>

                            <div class="flex mt-3">
                                <div class="w-1/2 mr-2">
                                    <label for="Latitude">Latitude</label>
                                    <x-input type="text" class="input" id="lat" name="lat" value="{{ old('lat') }}"/>
                                </div>
                                <div class="w-1/2 ml-2">
                                    <label>Longitude</label>
                                    <x-input type="text" class="input" id="lng" name="lng" value="{{ old('lng') }}"/>
                                </div>
                            </div>

                            <x-error :error="__('lat')"></x-error>
                        </div>

                    </div>
                </div>

                <div class="mt-5 flex justify-end w-full lg:w-1/2">
                    <button type="submit" class="submit ml-2 button w-auto bg-theme-1 text-white flex items-center uppercase">
                        <i data-feather="save" class="inline-block mr-4"></i> Submit Data
                    </button>
                </div>
            </form>
        @else
            <!-- Data Dusun -->
            <div class="intro-y box p-5 mt-5 flex">
                <div class="w-1/3 overflow-x-auto scrollbar-hidden mr-5">
                    <img src="{{ asset($validate->image) }}" alt="">
                    <h2 class="text-lg font-medium mr-auto mt-3">Nama</h2>
                    <p>
                        Desa {{ $validate->village->name }}
                    </p>

                    <br>
                    <h2 class="text-lg font-medium mr-auto mt-3">Alamat</h2>
                    <p>
                    @php
                        $address = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?latlng=" . $validate->village->meta['lat'] . "," . $validate->village->meta['long'] . "&sensor=true&key=AIzaSyC01hCsQ46I133UAz8pdjjRXlZ-o5DT1pY");
                        $address = json_decode($address, true);
                        $addressDetail = $address['results'][0]['formatted_address'];
                        echo $addressDetail;
                    @endphp
                    </p>
                </div>
                <div class="w-2/3 overflow-x-auto scrollbar-hidden ml-5">
                    <div class="accordion">
                        @foreach ($validate->village->dusuns as $dusun)
                            <div class="accordion__pane @if($loop->first) active pb-4 @else py-4 @endif border-b border-gray-200 dark:border-dark-5">
                                <a href="javascript:;" class="accordion__pane__toggle font-bold block">
                                    {{ $dusun->name }}
                                </a>
                                <div class="accordion__pane__content mt-3 text-gray-700 dark:text-gray-600 leading-relaxed">
                                    @forelse ($dusun->rws as $rw)
                                        <div class="mr-5">
                                            <div class="flex items-center justify-between">
                                                <span>
                                                    RW : {{ $rw->name }}
                                                </span>

                                                <div class="flex">
                                                    <a href="javascript:;" data-id="{{ $rw->id }}" data-name="{{ $rw->name }}" data-toggle="modal" data-target="#rw-modal-edit" class="rw-edit-btn flex items-contents-center py-1 px-2 my-2 ml-3 transition duration-300 ease-in-out border border-theme-1 text-theme-1 rounded-md w-24">
                                                        <i data-feather="edit" class="w-4 h-4 mr-3"></i> Edit RW
                                                    </a>
                                                    <a href="{{ route('village.validate.delete-rw', $rw->id) }}" class="hapus-rw flex items-contents-center py-1 px-2 my-2 ml-3 transition duration-300 ease-in-out border border-theme-6 text-theme-6 rounded-md w-32">
                                                        <i data-feather="trash" class="w-4 h-4 mr-3"></i> Hapus RW
                                                    </a>
                                                </div>
                                            </div>
                                            @forelse ($rw->rts as $rt)
                                                <div class="flex items-center justify-between">
                                                    <span>
                                                        RT : {{ $rt->name }}
                                                    </span>

                                                    <div class="flex">
                                                        <a href="javascript:;" data-rw="{{ $rw->id }}" data-id="{{ $rt->id }}" data-name="{{ $rt->name }}" data-toggle="modal" data-target="#rt-modal-edit" class="rt-edit-btn flex items-contents-center py-1 px-2 my-2 ml-3 transition duration-300 ease-in-out border border-theme-1 text-theme-1 rounded-md w-24">
                                                            <i data-feather="edit" class="w-4 h-4 mr-3"></i> Edit RT
                                                        </a>
                                                        <a href="{{ route('village.validate.delete-rt', $rt->id) }}" class="hapus-rt flex items-contents-center py-1 px-2 my-2 ml-3 transition duration-300 ease-in-out border border-theme-6 text-theme-6 rounded-md w-32">
                                                            <i data-feather="trash" class="w-4 h-4 mr-3"></i> Hapus RT
                                                        </a>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="mb-2">
                                                    Belum ada RT
                                                </div>
                                            @endforelse

                                            <a href="javascript:;" data-toggle="modal" data-target="#rt-modal" data-rw="{{ $rw->id }}" class="rt-add flex items-center w-32 p-2 transition duration-300 ease-in-out border border-theme-3 text-theme-3 bg-white hover:bg-gray-200 rounded-md">
                                                <i data-feather="plus" class="w-4 h-4 mr-3"></i> Tambah RT
                                            </a>
                                        </div>
                                    @empty
                                        <div class="mr-5 py-3">
                                            Belum ada RW
                                        </div>
                                    @endforelse
                                </div>

                                <div class="flex">
                                    <a href="javascript:;" data-id="{{ $dusun->id }}" data-name="{{ $dusun->name }}" data-toggle="modal" data-target="#dusun-modal-edit" class="dusun-edit-btn flex items-contents-center py-1 px-2 mt-2 transition duration-300 ease-in-out border border-theme-1 text-theme-1 mr-2 rounded-md w-32">
                                        <i data-feather="edit" class="w-4 h-4 mr-3"></i> Edit Dusun
                                    </a>
                                    <a href="{{ route('village.validate.delete-dusun', $dusun->id) }}" class="hapus-dusun flex items-contents-center py-1 px-2 mt-2 transition duration-300 ease-in-out border border-theme-6 text-theme-6 ml-2 rounded-md w-36">
                                        <i data-feather="trash" class="w-4 h-4 mr-3"></i> Hapus Dusun
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <x-maps :village="$validate->village->name"></x-maps>

            <!-- BEGIN : Dusun Modal Form -->
            <div class="modal" id="dusun-modal">
                <div class="modal__content modal__content--lg p-10">
                    <h2 class="text-lg font-medium mr-auto pb-4 border-b">Tambah Data Dusun / Dukuh</h2>

                    <form id="dusun-form" class="pt-4" action="{{ route('village.validate.add-dusun') }}" method="POST">
                        <div>
                            <label>Nama Dusun</label>
                            <div class="mt-2 flex">
                                <x-input type="text" class="flex-1" name="dusuns[]" placeholder="Nama Dusun / Dukuh"></x-input>
                                <button id="dusun-plus" type="button" class="button w-auto border ml-2">
                                    <i data-feather="plus" class="h-4 w-4"></i>
                                </button>
                            </div>
                        </div>

                        <div id="dusun-input"></div>

                        <div class="border-t my-3"></div>

                        <div class="flex justify-end">
                            <button type="submit" class="button px-5 border bg-theme-1 text-white flex items-center">
                                <i data-feather="save" class="h-4 w-4 inline-block mr-3"></i> SIMPAN
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END : Dusun Modal Form -->

            <!-- BEGIN : Edit Dusun Modal Form -->
            <div class="modal" id="dusun-modal-edit">
                <div class="modal__content modal__content--lg p-10">
                    <h2 class="text-lg font-medium mr-auto pb-4 border-b">Ubah Data Dusun / Dukuh</h2>

                    <form id="dusun-form-edit" class="pt-4" action="#" method="POST">
                        <div>
                            <label>Nama Dusun</label>
                            <div class="mt-2 flex">
                                <x-input type="text" class="flex-1" id="nama-dusun" name="dusun" placeholder="Nama Dusun / Dukuh"></x-input>
                            </div>
                        </div>

                        <div class="border-t my-3"></div>

                        <div class="flex justify-end">
                            <button type="submit" class="button px-5 border bg-theme-1 text-white flex items-center">
                                <i data-feather="save" class="h-4 w-4 inline-block mr-3"></i> UPDATE
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END : Edit Dusun Modal Form -->

            @if (count($validate->village->dusuns) > 0)
                <!-- BEGIN : RW Modal Form -->
                <div class="modal" id="rw-modal">
                    <div class="modal__content modal__content--lg p-10">
                        <h2 class="text-lg font-medium mr-auto pb-4 border-b">Tambah Data RW</h2>

                        <form id="rw-form" class="pt-4" action="{{ route('village.validate.add-rw') }}" method="POST">
                            <div>
                                <label>Pilih Dusun</label>
                                <div class="mt-2 flex">
                                    <select name="dusun" class="tail-select w-full">
                                        @foreach ($validate->village->dusuns as $dusun)
                                            <option value="{{ $dusun->id }}">{{ $dusun->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mt-2">
                                <label>Nama RW</label>
                                <div class="mt-2 flex">
                                    <x-input type="text" class="flex-1" name="rws[]" placeholder="Nama RW"></x-input>
                                    <button id="rw-plus" type="button" class="button w-auto border ml-2">
                                        <i data-feather="plus" class="h-4 w-4"></i>
                                    </button>
                                </div>
                            </div>

                            <div id="rw-input"></div>

                            <div class="border-t my-3"></div>

                            <div class="flex justify-end">
                                <button type="submit" class="button px-5 border bg-theme-1 text-white flex items-center">
                                    <i data-feather="save" class="h-4 w-4 inline-block mr-3"></i> SIMPAN
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END : RW Modal Form -->

                <!-- BEGIN : Edit RW Modal Form -->
                <div class="modal" id="rw-modal-edit">
                    <div class="modal__content modal__content--lg p-10">
                        <h2 class="text-lg font-medium mr-auto pb-4 border-b">Ubah Data Data RW</h2>

                        <form id="rw-form-edit" class="pt-4" action="#" method="POST">
                            <div>
                                <label>Pilih Dusun</label>
                                <div class="mt-2 flex">
                                    <select name="dusun" class="tail-select w-full">
                                        @foreach ($validate->village->dusuns as $dusun)
                                            <option value="{{ $dusun->id }}">{{ $dusun->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mt-2">
                                <label>Nama RW</label>
                                <div class="mt-2 flex">
                                    <x-input type="text" class="flex-1" id="nama-rw" name="rw" placeholder="Nama RW"></x-input>
                                </div>
                            </div>

                            <div class="border-t my-3"></div>

                            <div class="flex justify-end">
                                <button type="submit" class="button px-5 border bg-theme-1 text-white flex items-center">
                                    <i data-feather="save" class="h-4 w-4 inline-block mr-3"></i> UPDATE
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END : Edit RW Modal Form -->

                <!-- BEGIN : RT Modal Form -->
                <div class="modal" id="rt-modal">
                    <div class="modal__content modal__content--lg p-10">
                        <h2 class="text-lg font-medium mr-auto pb-4 border-b">Tambah Data RT</h2>

                        <form id="rt-form" class="pt-4" action="{{ route('village.validate.add-rt') }}" method="POST">
                            <div>
                                <label>Nama RT</label>
                                <div class="mt-2 flex">
                                    <x-input type="text" class="flex-1" name="rts[]" placeholder="Nama RT"></x-input>
                                    <button id="rt-plus" type="button" class="button w-auto border ml-2">
                                        <i data-feather="plus" class="h-4 w-4"></i>
                                    </button>
                                </div>
                            </div>

                            <div id="rt-input"></div>

                            <div class="border-t my-3"></div>

                            <div class="flex justify-end">
                                <button type="submit" class="button px-5 border bg-theme-1 text-white flex items-center">
                                    <i data-feather="save" class="h-4 w-4 inline-block mr-3"></i> SIMPAN
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END : RT Modal Form -->

                <!-- BEGIN : Edit RT Modal Form -->
                <div class="modal" id="rt-modal-edit">
                    <div class="modal__content modal__content--lg p-10">
                        <h2 class="text-lg font-medium mr-auto pb-4 border-b">Ubah Data Data RT</h2>

                        <form id="rt-form-edit" class="pt-4" action="#" method="POST">
                            <div>
                                <label>Nama RT</label>
                                <div class="mt-2 flex">
                                    <x-input type="hidden" class="flex-1" id="rw_id" name="rw"></x-input>
                                    <x-input type="text" class="flex-1" id="nama-rt" name="rt" placeholder="Nama RT"></x-input>
                                </div>
                            </div>

                            <div class="border-t my-3"></div>

                            <div class="flex justify-end">
                                <button type="submit" class="button px-5 border bg-theme-1 text-white flex items-center">
                                    <i data-feather="save" class="h-4 w-4 inline-block mr-3"></i> SIMPAN
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END : Edit RT Modal Form -->
            @endif

        @endif
        <!-- END: Validate Layout -->
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
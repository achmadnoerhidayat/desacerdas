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
    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->

        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->

<?php include "menu_ass01.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="index.php" class="breadcrumb--active">Assesment</a> </div>
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

    <div class="intro-y flex justify-between items-center mt-8">
        <h2 class="text-lg font-medium">
            Manajemen Ujian / Sertifikasi
        </h2>
		<a href="javascript:;" data-toggle="modal" data-target="#modal-form" class="button w-auto inline-block mr-1 mb-2 border border-theme-1 text-theme-1 dark:border-theme-10 dark:text-theme-10">
			Tambah Assesment
		</a>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
	
			<?php 
				$query = mysqli_query($koneksi,"SELECT id_modul, nama_paket, deskripsi, waktu 
												FROM tbmodul_ass 
												order by id_modul")or die(mysql_error);
				while ($data = mysqli_fetch_assoc($query)) {		
					$id_modul=$data['id_modul'];
					$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbsoal WHERE id_modul='$id_modul'");
					$tm_cari=mysqli_fetch_array($cari_kd);
					$jml_soal=$tm_cari['tot'];									
			?>
			
            <!-- BEGIN : Card Soal -->
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="intro-y box">
                    <div class="flex flex-row items-center p-5 lg:p-10">
                        <div class="w-2/3 lg:w-1/2">
                            <a href="javascript:;" data-delete="{{ $assesment->slug }}" class="delete absolute right-0 top-0 mt-5 mr-5">
                                <i data-feather="trash" class="w-6 h-6 text-red-500"></i>
                            </a>
                            <h1 class="text-4xl font-medium leading-none">
                                <span><?php echo $data['nama_paket']?></span>
                            </h1>
                            <div class="mt-5 normal-case flex items-center">
                                <i data-feather="clock" class="inline-block mr-3"></i> <?php echo $data['waktu']?> Menit
                                <span class="mx-4">-</span>
                                <i data-feather="clipboard" class="inline-block mr-3"></i> <?php echo $jml_soal; ?> Soal
                            </div>
                        </div>
                        <div class="w-1/3 lg:w-1/2 text-right">
                            <a href="soal.php?id=<?php echo $data['id_modul']?>" class="button w-auto inline-block mr-1 mb-2 border bg-gray-200 text-gray-600">
                                Tambah Soal
                            </a>
									<a href="ass_edit.php?id=<?php echo $data['id_modul']?>" class="button w-auto inline-block mr-1 mb-2 border bg-gray-200 text-gray-600">
										Ubah Data
									</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END : Card Soal -->	
			
			<?php 
				}
			?>
    </div>

    <!-- Custom Modal -->
    <div class="modal" id="modal-form">
        <div class="modal__content">
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">Nama Paket Ujian</h2>
            </div>
            <form id="assesment-form" action="ass_save.php" method="post">
                <div class="p-5 grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12">
                        <div>
                            <label>Nama Paket</label>
                            <input id="assesment-category" name="assesment-category" type="text" class="input w-full border mt-2 flex-1" placeholder="ex: TIU, TWK">
                        </div>

                        <div class="mt-5">
                            <label>Deskripsi Singkat</label>
                            <textarea id="assesment-description" name="assesment-description" class="input w-full border mt-2 flex-1" cols="10" placeholder="ex: Soal Tes ini termasuk dalam tes intelegensia umum..."></textarea>
                        </div>

                        <div class="mt-3">
                            <label>Waktu Pengerjaan</label>
                            <input id="assesment-time" name="assesment-time" type="number" step="5" class="input w-full border mt-2 flex-1" placeholder="ex: 90">
                        </div>
                    </div>
                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                    <button data-dismiss="modal"  type="button" class="button w-32 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">
                        Batal
                    </button>
                    <button id="assesment-button" type="submit" class="button w-32 bg-theme-1 text-white">
                        Lanjutkan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Custom Update Modal -->
    <div class="modal" id="modal-form-update">
        <div class="modal__content">
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">Nama Paket Ujian</h2>
            </div>
            <form id="assesment-form-update">
                <div class="p-5 grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12">
                        <div>
                            <label>Nama Paket</label>
                            <input id="assesment-category-update" type="text" class="input w-full border mt-2 flex-1" placeholder="ex: TIU, TWK">
                            <div id="error-category-update" class="assesment__input-error w-5/6 text-theme-6 mt-2"></div>
                        </div>

                        <div class="mt-5">
                            <label>Deskripsi Singkat</label>
                            <textarea id="assesment-description-update" class="input w-full border mt-2 flex-1" cols="10" placeholder="ex: Soal Tes ini termasuk dalam tes intelegensia umum..."></textarea>
                            <div id="error-description-update" class="assesment__input-error w-5/6 text-theme-6 mt-2"></div>
                        </div>

                        <div class="mt-3">
                            <label>Waktu Pengerjaan</label>
                            <input id="assesment-time-update" type="number" step="5" class="input w-full border mt-2 flex-1" placeholder="ex: 90">
                            <div id="error-time-update" class="assesment__input-error w-5/6 text-theme-6 mt-2"></div>
                        </div>
                    </div>
                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                    <button data-dismiss="modal"  type="button" class="button w-32 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">
                        Batal
                    </button>
                    <button id="assesment-button-update" type="submit" class="button w-32 bg-theme-1 text-white">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Sucess -->
    <x-modal id="modal-success" :type="__('success')" :title="__('Berhasil')" :message="__('Berhasil menambahkan data baru')" :button="__('Lanjutkan')" :url="url('login')"></x-modal>

    <!-- Modal Error -->
    <x-modal id="modal-error" :type="__('error')" :title="__('Gagal')" :message="__('Server saat ini sedang mengalami kendala')"></x-modal>

    <!-- Modal Confirmation -->
    <div class="modal" id="delete-modal-preview">
        <div class="modal__content">
            <div class="p-5 text-center">
                <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                <div class="text-3xl mt-5">Apakah anda yakin?</div>
                <div class="text-gray-600 mt-5">
                    <span>Proses ini tidak bisa di kembalikan.</span>
                </div>
            </div>
            <div class="px-5 pb-8 text-center">
                <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Batalkan</button>
                <button id="confirm-delete" type="button" class="button w-24 bg-theme-6 text-white">Ya, Hapus!</button>
            </div>
        </div>
    </div>

<script>
    cash(function () {
        // Modal ID
        const allModal = cash(`.modal`)
        const successModal = cash(`#modal-success`)

        // Create Assesment
        let assesmentBtn = cash('#assesment-button')
        let assesmentForm = cash('#assesment-form')

        let assesmentCategory = cash('#assesment-category')
        let assesmentDescription = cash('#assesment-description')
        let assesmentTime = cash('#assesment-time')

        async function newAssesment() {
            // Reset state
            cash('#assesment-form').find('.input').removeClass('border-theme-6')
            cash('#assesment-form').find('.assesment__input-error').html('')

            // Loading state
            assesmentBtn.attr('disabled', 'disabled')
            assesmentBtn.html(`
                <i data-loading-icon="oval" data-color="white" class="w-5 h-5 mr-2 inline-block"></i> Loading...
            `).svgLoader()
            await helper.delay(1500)

            axios.post(`{{ route('assesment.admin.store') }}`,{
                category: assesmentCategory.val(),
                description: assesmentDescription.val(),
                time: assesmentTime.val(),
            }).then(res => {
                const successModal = cash(`#modal-success`)
                let url = `{{ route('assesment.admin.show', ':id')  }}`
                url = url.replace(':id', res.data.data.slug)

                successModal.modal(`show`)
                successModal.find('a').last().attr('href', url)
                successModal.modal(`on.hide`, function() {
                    location.href = url
                })
            }).catch(err => {
                assesmentBtn.removeAttr('disabled')
                assesmentBtn.html(`Lanjutkan`)
                if(err.response.data.message !== 'Server Error') {
                    for (const [key, val] of Object.entries(err.response.data.errors)) {
                        cash(`#assesment-${key}`).addClass('border-theme-6')
                        cash(`#error-${key}`).html(val)
                    }
                } else {
                    cash("#modal-error").modal("show")
                }
            })
        }

        assesmentForm.on('submit', function(event) {
            event.preventDefault()
            newAssesment()
        })

        // Update Assesment
        let buttonEdit = cash('.button--edit')
        let assesmentBtnUpdate = cash('#assesment-button-update')
        let assesmentFormUpdate = cash('#assesment-form-update')

        let assesmentCategoryUpdate = cash('#assesment-category-update')
        let assesmentDescriptionUpdate = cash('#assesment-description-update')
        let assesmentTimeUpdate = cash('#assesment-time-update')

        async function updateAssesment(id) {
            // Reset state
            cash('#assesment-form-update').find('.input').removeClass('border-theme-6')
            cash('#assesment-form-update').find('.assesment__input-error').html('')

            // Loading state
            assesmentBtnUpdate.attr('disabled', 'disabled')
            assesmentBtnUpdate.html(`
                <i data-loading-icon="oval" data-color="white" class="w-5 h-5 mr-2 inline-block"></i> Loading...
            `).svgLoader()
            await helper.delay(1500)

            let updateUrl = `{{ route('assesment.admin.update', ':slug') }}`
            updateUrl = updateUrl.replace(':slug', id)

            axios.put(updateUrl, {
                category: assesmentCategoryUpdate.val(),
                description: assesmentDescriptionUpdate.val(),
                time: assesmentTimeUpdate.val(),
            }).then(res => {
                successModal.modal(`show`)
                successModal.find('div.message').html('Berhasil mengubah data')
                successModal.find('a').last().attr('href', `{{ route('assesment.admin') }}`)
                successModal.find('a').last().attr('data-dismiss', 'modal').html('Ok')
                assesmentBtnUpdate.removeAttr('disabled')
                assesmentBtnUpdate.html(`Update`)
                successModal.modal('on.hide', function() {
                    allModal.modal('hide')
                    location.href = `{{ route('assesment.admin') }}`
                })
            }).catch(err => {
                assesmentBtnUpdate.removeAttr('disabled')
                assesmentBtnUpdate.html(`Update`)
                if(err.response.data.message !== 'Server Error') {
                    for (const [key, val] of Object.entries(err.response.data.errors)) {
                        cash(`#assesment-${key}-update`).addClass('border-theme-6')
                        cash(`#error-${key}-update`).html(val)
                    }
                } else {
                    cash("#modal-error").modal("show")
                }
            })
        }

        let dataEdit
        buttonEdit.on('click', function() {
            dataEdit = cash(this).data('edit')

            assesmentCategoryUpdate.attr('value',  dataEdit.title)
            assesmentDescriptionUpdate.html(dataEdit.description)
            assesmentTimeUpdate.attr('value',  dataEdit.time)
        })

        assesmentFormUpdate.on('submit', function(event) {
            event.preventDefault()
            updateAssesment(dataEdit.slug)
        })

        // Delete
        const confirmDelete = cash('#confirm-delete')
        const deleteBox = cash('.delete')

        let deleteId;
        deleteBox.on('click', function() {
            deleteId = cash(this).data('delete')
            const deleteModal = cash('#delete-modal-preview')
            deleteModal.modal('show')
        })

        async function deleteAssessment(id) {
            let deleteUrl = `{{ route('assesment.admin.destroy', ':slug') }}`
            deleteUrl = deleteUrl.replace(':slug', id)

            // Loading state
            confirmDelete.attr('disabled', 'disabled')

            axios.delete(deleteUrl)
            .then(res => {
                successModal.modal('show')
                successModal.find('div.message').html('Berhasil menghapus data')
                successModal.find('a').last().attr('href', `{{ route('assesment.admin') }}`)
                successModal.find('a').last().attr('data-dismiss', 'modal').html('Ok')
                successModal.modal('on.hide', function() {
                    allModal.modal('hide')
                    location.href = `{{ route('assesment.admin') }}`
                })
            }).catch(err => {
                confirmDelete.removeAttr('disabled')
                modalError.modal('show')
            })
        }

        confirmDelete.on('click', function() {
            event.preventDefault()
            deleteAssessment(deleteId)
        })
    })
</script>	

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
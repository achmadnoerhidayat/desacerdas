<?php 
	include "config/koneksi.php";
	$folder="../file_upload/";
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
     function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[2],$pisah[1],$pisah[0]);
		$satukan = implode('-',$urutan);
		return $satukan;
	}
	
	$txtpemb1 = ubahformatTgl($_POST['txtpemb1']);
	$txtpemb2 = ubahformatTgl($_POST['txtpemb2']); 
	$id = $_POST['txtid'];
	$txtnm = $_POST['txtnm'];
	$txttipe = $_POST['txttipe'];
	$txtpengelola = $_POST['txtpengelola'];
	$txtluasp = $_POST['txtluasp'];	
	$txtluaspot = $_POST['txtluaspot'];		
	$txttipebgn = $_POST['txttipebgn'];	
	$txtjmlbgn = $_POST['txtjmlbgn'];	
	$txtjalan = $_POST['txtjalan'];	
	$txtrencanap = $_POST['txtrencanap'];	
	$txtrencanar = $_POST['txtrencanar'];
	
	$txtpanjang1 = $_POST['txtpanjang1'];		
	$txtpanjang2 = $_POST['txtpanjang2'];	
	$txtpanjang3 = $_POST['txtpanjang3'];
	$txtpanjang4 = $_POST['txtpanjang4'];
	$txtpanjang5 = $_POST['txtpanjang5'];

	$txtjml1 = $_POST['txtjml1'];
	$txtjml2 = $_POST['txtjml2'];
	$txtjml3 = $_POST['txtjml3'];
	$txtjml4 = $_POST['txtjml4'];
	$txtjml5 = $_POST['txtjml5'];
	$txtjml6 = $_POST['txtjml6'];
	$txtjml7 = $_POST['txtjml7'];
	$txtjml8 = $_POST['txtjml8'];
	$txtjml9 = $_POST['txtjml9'];
	$txtjml10 = $_POST['txtjml10'];
	$txtjml11 = $_POST['txtjml11'];
	$txtjml12 = $_POST['txtjml12'];
	$txtjml13 = $_POST['txtjml13'];
	$txtjml14 = $_POST['txtjml14'];
	$txtjml15 = $_POST['txtjml15'];
	$txtjml16 = $_POST['txtjml16'];

	$txtpemb3 = $_POST['txtpemb3'];
	$txtpemb4 = $_POST['txtpemb4'];
	$txtpemb5 = $_POST['txtpemb5'];
	$txtpemb6 = $_POST['txtpemb6'];
	$txtpemb7 = $_POST['txtpemb7'];
	$txtpemb8 = $_POST['txtpemb8'];
	
	$txtp3a_1 = $_POST['txtp3a-1'];
	$txtp3a_2 = $_POST['txtp3a-2'];
	$txtp3a_3 = $_POST['txtp3a-3'];
	$txtp3a_4 = $_POST['txtp3a-4'];
	$txtp3a_5 = $_POST['txtp3a-5'];
	$txtp3a_6 = $_POST['txtp3a-6'];
	$txtp3a_7 = $_POST['txtp3a-7'];
	$txtp3a_8 = $_POST['txtp3a-8'];
	$txtp3a_9 = $_POST['txtp3a-9'];

	if(!empty($_FILES["gambar"]["tmp_name"])){
		$temp = $_FILES['gambar']['tmp_name'];
		$name = basename( $_FILES['gambar']['name']) ;
		$size = $_FILES['gambar']['size'];
		$type = $_FILES['gambar']['type'];
		$foto = $folder.$name;	

		move_uploaded_file($temp, $folder . $name);
			mysqli_query($koneksi,"UPDATE tbirigasi SET 
				nama_irigasi='$txtnm', tipe='$txttipe', pengelola='$txtpengelola', 
				luas_prencana='$txtluasp', luas_potensial='$txtluaspot', tipe_bgn='$txttipebgn', jml_bgn_utama='$txtjmlbgn', 
				jln_inspeksi='$txtjalan', rencana_produksi='$txtrencanap', rencana_intensitas_tanam='$txtrencanar',
				panjang_1='$txtpanjang1', panjang_2='$txtpanjang2', panjang_3='$txtpanjang3', panjang_4='$txtpanjang4', panjang_5='$txtpanjang5',
				jml_1='$txtjml1', jml_2='$txtjml2', jml_3='$txtjml3', jml_4='$txtjml4', 
				jml_5='$txtjml5', jml_6='$txtjml6', jml_7='$txtjml7', jml_8='$txtjml8', 
				jml_9='$txtjml9', jml_10='$txtjml10', jml_11='$txtjml11', jml_12='$txtjml12', 
				jml_13='$txtjml13', jml_14='$txtjml14', jml_15='$txtjml15', jml_16='$txtjml16',
				bangun_mulai='$txtpemb1', bangun_selesai='$txtpemb2', bangun_biaya='$txtpemb3', bangun_konstruksi='$txtpemb4', 
				bangun_konsultan='$txtpemb5', bangun_pengawas='$txtpemb6', bangun_kontraktor='$txtpemb7', bangun_sumber='$txtpemb8',
				p3a_1='$txtp3a_1', p3a_2='$txtp3a_2', p3a_3='$txtp3a_3', p3a_4='$txtp3a_4', p3a_5='$txtp3a_5', 
				p3a_6='$txtp3a_6', p3a_7='$txtp3a_7', p3a_8='$txtp3a_8', p3a_9='$txtp3a_9', 
file_photo='$foto', file_name='$name' 				
				WHERE id='$id'");
			echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('irigasi.php');</script>";
	} else {
			mysqli_query($koneksi,"UPDATE tbirigasi SET 
				nama_irigasi='$txtnm', tipe='$txttipe', pengelola='$txtpengelola', 
				luas_prencana='$txtluasp', luas_potensial='$txtluaspot', tipe_bgn='$txttipebgn', jml_bgn_utama='$txtjmlbgn', 
				jln_inspeksi='$txtjalan', rencana_produksi='$txtrencanap', rencana_intensitas_tanam='$txtrencanar',
				panjang_1='$txtpanjang1', panjang_2='$txtpanjang2', panjang_3='$txtpanjang3', panjang_4='$txtpanjang4', panjang_5='$txtpanjang5',
				jml_1='$txtjml1', jml_2='$txtjml2', jml_3='$txtjml3', jml_4='$txtjml4', 
				jml_5='$txtjml5', jml_6='$txtjml6', jml_7='$txtjml7', jml_8='$txtjml8', 
				jml_9='$txtjml9', jml_10='$txtjml10', jml_11='$txtjml11', jml_12='$txtjml12', 
				jml_13='$txtjml13', jml_14='$txtjml14', jml_15='$txtjml15', jml_16='$txtjml16',
				bangun_mulai='$txtpemb1', bangun_selesai='$txtpemb2', bangun_biaya='$txtpemb3', bangun_konstruksi='$txtpemb4', 
				bangun_konsultan='$txtpemb5', bangun_pengawas='$txtpemb6', bangun_kontraktor='$txtpemb7', bangun_sumber='$txtpemb8',
				p3a_1='$txtp3a_1', p3a_2='$txtp3a_2', p3a_3='$txtp3a_3', p3a_4='$txtp3a_4', p3a_5='$txtp3a_5', 
				p3a_6='$txtp3a_6', p3a_7='$txtp3a_7', p3a_8='$txtp3a_8', p3a_9='$txtp3a_9' 
				WHERE id='$id'");
			echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('irigasi.php');</script>";
	}
?>
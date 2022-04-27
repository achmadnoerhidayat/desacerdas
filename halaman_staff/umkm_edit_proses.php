<?php 
	include "config/koneksi.php";
	date_default_timezone_set('Asia/Jakarta');
	$waktuaja_skr=date('h:i');
 	$folder="../file_upload/";

	function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[2],$pisah[1],$pisah[0]);
		$satukan = implode('-',$urutan);
		return $satukan;
	}

	$txttgl = ubahformatTgl($_POST['txttgllahir']);	
	$id = $_POST['txtid'];
	$txtnik = $_POST['txtnik'];
	$txtnm = $_POST['txtnm'];
	$txttempatlhr = $_POST['txttempatlhr'];
	$cbojk = $_POST['cbojk'];
	$cbodukuh = $_POST['cbodukuh'];
	$cbort = $_POST['cbort'];
	$txtrw = $_POST['txtrw'];
	
	$txtumkm = $_POST['txtumkm'];
	$txttlp = $_POST['txttlp'];
	$cbodukuh1 = $_POST['cbodukuh1'];
	$cbort1 = $_POST['cbort1'];
	$txtrw1 = $_POST['txtrw1'];
	$txtdeskripsi = $_POST['txtdeskripsi'];

	if(!empty($_FILES["id-input-file-4"]["tmp_name"])){
		$temp = $_FILES['id-input-file-4']['tmp_name'];
		$name = rand(0,9999).$_FILES['id-input-file-4']['name'];
		$size = $_FILES['id-input-file-4']['size'];
		$type = $_FILES['id-input-file-4']['type'];
		$foto = $folder.$name;		

        move_uploaded_file($temp, $folder . $name);
		$sql_insert="UPDATE tbumkm SET 
					nik='$txtnik', nama='$txtnm', tempat_lhr='$txttempatlhr', 
					id_jk='$cbojk', id_dukuh='$cbodukuh', id_rt='$cbort', rw='$txtrw', 
					nama_umkm='$txtumkm', no_tlp='$txttlp', id_dukuh1='$cbodukuh1', id_rt1='$cbort1', 
					rw1='$txtrw1', deskripsi='$txtdeskripsi', file_cover='$foto', file_cover_name='$name', tgl_lhr='$txttgl' 
					WHERE id='$id'";
		mysqli_query($koneksi,$sql_insert);
		echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('umkm_daftar.php');</script>";
	} else {
		$sql_insert="UPDATE tbumkm SET 
					nik='$txtnik', nama='$txtnm', tempat_lhr='$txttempatlhr', 
					id_jk='$cbojk', id_dukuh='$cbodukuh', id_rt='$cbort', rw='$txtrw', 
					nama_umkm='$txtumkm', no_tlp='$txttlp', id_dukuh1='$cbodukuh1', id_rt1='$cbort1', 
					rw1='$txtrw1', deskripsi='$txtdeskripsi', tgl_lhr='$txttgl' 
					WHERE id='$id'";
		mysqli_query($koneksi,$sql_insert);
		echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('umkm_daftar.php');</script>";		
	}
?>
<?php 
	include "config/koneksi.php";
	$folder="../file_upload/";
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$id = $_POST['txtid'];
	$txtnm = $_POST['txtnm'];
	$txtdeskripsi = $_POST['txtdeskripsi'];

	if(!empty($_FILES["gambar"]["tmp_name"])){
		$temp = $_FILES['gambar']['tmp_name'];
		$name = basename( $_FILES['gambar']['name']) ;
		$size = $_FILES['gambar']['size'];
		$type = $_FILES['gambar']['type'];
		$foto = $folder.$name;	

		move_uploaded_file($temp, $folder . $name);
		mysqli_query($koneksi,"UPDATE tbdukuh SET nm_dukuh='$txtnm', deskripsi_wilayah='$txtdeskripsi', file_photo='$foto', file_name='$name' WHERE id_dukuh='$id'");
		header('location:dukuh.php');	
	} else {
		mysqli_query($koneksi,"UPDATE tbdukuh SET nm_dukuh='$txtnm', deskripsi_wilayah='$txtdeskripsi' WHERE id_dukuh='$id'");
        	header('location:dukuh.php');
	}
?>
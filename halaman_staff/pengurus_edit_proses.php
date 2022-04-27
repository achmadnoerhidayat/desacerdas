<?php 
	include "config/koneksi.php";
	$folder="../file_upload/";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$id = $_POST['txtid'];
	$cbort = $_POST['cbort'];
	$txtnm = $_POST['txtnm'];
	$cbojbt = $_POST['cbojbt'];
	
	if(!empty($_FILES["gambar"]["tmp_name"])){
		$temp = $_FILES['gambar']['tmp_name'];
		$name = basename( $_FILES['gambar']['name']) ;
		$size = $_FILES['gambar']['size'];
		$type = $_FILES['gambar']['type'];
		$foto = $folder.$name;		
	
        move_uploaded_file($temp, $folder . $name);
		mysqli_query($koneksi,"UPDATE tbpengurus_rt SET 
								id_rt='$cbort', nama='$txtnm', id_jabatan='$cbojbt', file_photo='$foto', file_name='$name' 
								WHERE id='$id'");
        header('location:pengurus_rt.php');
	} else {
		mysqli_query($koneksi,"UPDATE tbpengurus_rt SET 
								id_rt='$cbort', nama='$txtnm', id_jabatan='$cbojbt' WHERE id='$id'");
        header('location:pengurus_rt.php');		
	}
?>
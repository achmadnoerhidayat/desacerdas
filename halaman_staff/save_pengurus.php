<?php 
	include "config/koneksi.php";
	$folder="../file_upload/";
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$cbort = $_POST['cbort'];
	$txtnm = $_POST['txtnm'];
	$cbojbt = $_POST['cbojbt'];

	$temp = $_FILES['gambar']['tmp_name'];
	$name = basename( $_FILES['gambar']['name']) ;
    $size = $_FILES['gambar']['size'];
    $type = $_FILES['gambar']['type'];
	$foto = $folder.$name;		
					
	move_uploaded_file($temp, $folder . $name);
	mysqli_query($koneksi,"INSERT INTO tbpengurus_rt 
								(id_rt, nama, id_jabatan, file_photo, file_name) 
								VALUES 
								('$cbort','$txtnm','$cbojbt','$foto','$name')");
	header('location:pengurus_rt.php');
?>
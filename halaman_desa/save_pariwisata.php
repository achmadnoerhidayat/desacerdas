<?php 
	include "config/koneksi.php";
	$folder="../file_upload/";
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$cbokel = $_POST['txtkdkel'];
	$txtnm = $_POST['txtnm'];
	$txtjml = $_POST['txtjml'];
	$txtpemasukan = $_POST['txtpemasukan'];
	$txtket = $_POST['txtket'];
	$txtpengelola = $_POST['txtpengelola'];

    $temp = $_FILES['gambar']['tmp_name'];
    $name = basename( $_FILES['gambar']['name']) ;
    $size = $_FILES['gambar']['size'];
    $type = $_FILES['gambar']['type'];
	$foto = $folder.$name;		
					
	move_uploaded_file($temp, $folder . $name);
	mysqli_query($koneksi,"INSERT INTO tbpariwisata 
				(kode, nama_wisata, jml_pengunjung, tgl_input, jam_input, user_id, pemasukan, keterangan, pengelola, file_photo, file_name) 
				VALUES 
				('$cbokel','$txtnm','$txtjml','$tgl_skr','$waktuaja_skr','','$txtpemasukan','$txtket','$txtpengelola','$foto','$name')");
	header('location:pariwisata.php');
?>
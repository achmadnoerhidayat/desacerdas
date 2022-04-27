<?php 
	include "config/koneksi.php";
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$cbodukuh = $_POST['cbodukuh'];
	$txtrt = $_POST['txtrt'];

	$data = mysqli_query($koneksi,"SELECT * FROM tbrt WHERE id_dukuh='$cbodukuh' and rt='$txtrt'"); 
	$cek = mysqli_num_rows($data);
	if($cek > 0){		
		echo"<script>window.alert('Data RT sudah ada!');window.location=('tambah_rt.php');</script>";
	} else {
		mysqli_query($koneksi,"INSERT INTO tbrt (id_dukuh,rt) VALUES ('$cbodukuh','$txtrt')");
		echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('rt_add.php');</script>";
	}
?>
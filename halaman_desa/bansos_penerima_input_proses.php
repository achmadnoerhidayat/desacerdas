<?php 
	include "config/koneksi.php";
 
	$nik = $_POST['txtnik'];	
	$txtkdbansos = $_POST['txtkdbansos'];

	$data1 = mysqli_query($koneksi,"SELECT nik FROM tbbansos_penerima WHERE nik='$nik'"); 
	$cek = mysqli_num_rows($data1);
	if($cek > 0){		
		echo"<script>window.alert('NIK sudah terdaftar di BANSOS.');window.location=('bansos_penerima_input.php?txtid=$txtkdbansos');</script>";
	} else {
		mysqli_query($koneksi,"INSERT INTO tbbansos_penerima (kd_bansos, nik) VALUES ('$txtkdbansos','$nik')");

		$next = 'location:bansos_penerima_input.php?txtid=';
		$awal = $next.$txtkdbansos;
		header($awal);
	}
?>
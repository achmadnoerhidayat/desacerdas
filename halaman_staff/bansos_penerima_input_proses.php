<?php 
	include "config/koneksi.php";
 
	$nik = $_POST['txtnik'];	
	$txtkdbansos = $_POST['txtkdbansos'];

	mysqli_query($koneksi,"INSERT INTO tbbansos_penerima (kd_bansos, nik) VALUES ('$txtkdbansos','$nik')");

	$next = 'location:bansos_penerima_input.php?txtid=';
	$awal = $next.$txtkdbansos;
	header($awal);
?>
<?php 
	include "config/koneksi.php";
 
	$cbokel = $_POST['txtkdkel'];
	$txtnm = $_POST['txtnm'];
	$txtdeskripsi = $_POST['txtdeskripsi'];
	
	mysqli_query($koneksi,"INSERT INTO tbperpustakaan (nm_perpustakaan, deskripsi, id_kel) VALUES ('$txtnm','$txtdeskripsi','$cbokel')");
	header('location:perpustakaan.php');
?>
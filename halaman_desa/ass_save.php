<?php 
	include "config/koneksi.php";
 
	$txtkode = $_POST['assesment-category'];
	$txtdeskripsi = $_POST['assesment-description'];
	$txtwaktu = $_POST['assesment-time'];
	mysqli_query($koneksi,"INSERT INTO tbmodul_ass (nama_paket, deskripsi, waktu) 
							VALUES ('$txtkode','$txtdeskripsi','$txtwaktu')");
	
	header('location:ass_manajemen.php');
?>
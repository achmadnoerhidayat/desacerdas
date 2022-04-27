<?php 
	include "config/koneksi.php";
 
	$cboperpustakaan = $_POST['cboperpustakaan']; 
	$txtjudul = $_POST['txtjudul'];
	$txtkdbuku = $_POST['txtkdbuku'];
	$txtkdrak = $_POST['txtkdrak'];
	$txtdeskripsibuku = $_POST['txtdeskripsibuku'];
	$txtjumlah = $_POST['txtjumlah'];	
	
	mysqli_query($koneksi,"INSERT INTO tbbuku 
							(id_perpustakaan, kd_buku, nm_buku, kd_rak, deskripsi_buku, jumlah) 
							VALUES 
							('$cboperpustakaan','$txtkdbuku','$txtjudul','$txtkdrak','$txtdeskripsibuku','$txtjumlah')");
	header('location:perpustakaan.php');
?>
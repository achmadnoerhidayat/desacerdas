<?php 
	include "config/koneksi.php";
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$cbokel = $_POST['txtkdkel'];
	$txtnama = $_POST['txtnama'];
	$cbokat = $_POST['cbokat'];
	$txttlp = $_POST['txttlp'];
	
	//id_nopenting, nama, id_kategori, notlp, id_kel FROM tbnopenting
	
	mysqli_query($koneksi,"INSERT INTO tbnopenting (nama, id_kategori, notlp, id_kel) VALUES ('$txtnama','$cbokat','$txttlp','$cbokel')");
	header('location:nopenting_add.php');
?>
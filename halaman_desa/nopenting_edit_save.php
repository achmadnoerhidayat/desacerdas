<?php 
	include "config/koneksi.php";
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$id = $_POST['txtid'];
	$txtnama = $_POST['txtnama'];
	$cbokat = $_POST['cbokat'];
	$txttlp = $_POST['txttlp'];
	
	//id_nopenting, nama, id_kategori, notlp, id_kel FROM tbnopenting
	
	mysqli_query($koneksi,"UPDATE tbnopenting SET nama='$txtnama', id_kategori='$cbokat', notlp='$txttlp' WHERE id_nopenting='$id'");
	header('location:nopenting.php');
?>
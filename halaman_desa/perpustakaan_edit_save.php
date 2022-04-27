<?php 
	include "config/koneksi.php";
	//$folder="../file_upload/";
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$id = $_POST['txtid'];
	$txtjudul = $_POST['txtjudul'];
	$txtrak = $_POST['txtrak'];
	$txtjml = $_POST['txtjml'];
	
	mysqli_query($koneksi,"UPDATE tbperpustakaan 
						SET nama_buku='$txtjudul', kode_rak='$txtrak', jumlah='$txtjml' 
						WHERE id_perpustakaan='$id'");
	header('location:perpustakaan.php');
?>
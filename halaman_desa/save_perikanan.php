<?php 
	include "config/koneksi.php";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$cbokel = $_POST['txtkdkel'];
	$cbojns = $_POST['cbojns'];
	$txtproduksi = $_POST['txtproduksi'];
	$txtpermintaan = $_POST['txtpermintaan'];

	mysqli_query($koneksi,"INSERT tbperikanan (kode, kd_ikan, produksi, permintaan) 
				VALUES ('$cbokel','$cbojns','$txtproduksi','$txtpermintaan')");
	//$next = 'location:perikanan_rst.php?cbokel=';
	//$awal = $next.$kd;
	//header($awal);
	
	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('perikanan.php');</script>";
?>
<?php 
	include "config/koneksi.php";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$cbokel = $_POST['txtkdkel'];
	$cbojns = $_POST['cbojenis'];
	$txtltanam = $_POST['txtltanam'];
	$txtproduksi = $_POST['txtproduksi'];

	mysqli_query($koneksi,"INSERT tbpertanian (kode, kd_tumbuhan, luas_tanam, produksi) 
						VALUES ('$cbokel','$cbojns','$txtltanam','$txtproduksi')");
	//$next = 'location:perkebunan_rst.php?cbokel=';
	//$awal = $next.$kd;
//	header($awal);
	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('perkebunan.php');</script>";		
	
?>
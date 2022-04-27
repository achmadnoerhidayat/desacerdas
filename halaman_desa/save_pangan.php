<?php 
	include "config/koneksi.php";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$cbokel = $_POST['txtkdkel'];
	$cbojns = $_POST['cbojenis'];
	$txtltanam = $_POST['txtltanam'];
	$txtlpanen = $_POST['txtlpanen'];
	$txtproduksi = $_POST['txtproduksi'];
	$txtproduktivitas = $_POST['txtproduktivitas'];

	mysqli_query($koneksi,"INSERT tbpertanian (kode, kd_tumbuhan, luas_tanam, luas_panen, produksi,produktivitas) 
						VALUES ('$cbokel','$cbojns','$txtltanam','$txtlpanen','$txtproduksi','$txtproduktivitas')");
	//$next = 'location:pangan_rst.php?cbokel=';
	//$awal = $next.$kd;
	//header($awal);
	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('pangan.php');</script>";
?>
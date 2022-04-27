<?php 
	include "config/koneksi.php";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$cbokel = $_POST['txtkdkel'];
	$cbojns = $_POST['cbojenis'];
	$txtlpanen = $_POST['txtlpanen'];
	$txtproduksi = $_POST['txtproduksi'];

	mysqli_query($koneksi,"INSERT tbpertanian (kode, kd_tumbuhan, luas_panen, produksi) 
						VALUES ('$cbokel','$cbojns','$txtlpanen','$txtproduksi')");
	//$next = 'location:sayuran.php?cbokel=';
	//$awal = $next.$kd;
	//header($awal);
						echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('biofarmeka.php');</script>";		
	
?>
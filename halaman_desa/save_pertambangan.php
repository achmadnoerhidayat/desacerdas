<?php 
	include "config/koneksi.php";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$txtkdkel = $_POST['txtkdkel'];
	$cbojns = $_POST['cbojns'];
	$txtluas = $_POST['txtluas'];
	$txtton = $_POST['txtton'];
	$txtlahan = $_POST['txtlahan'];
	$txtsistem = $_POST['txtsistem'];

	mysqli_query($koneksi,"INSERT tbpertambangan 
				(kode, kd_tambang, luas, produksi, lahan, sistem) 
				VALUES 
				('$txtkdkel','$cbojns','$txtluas','$txtton','$txtlahan','$txtsistem')");
				
			echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('pertambangan.php');</script>";
	
?>
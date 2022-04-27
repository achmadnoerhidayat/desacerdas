<?php 
	include "config/koneksi.php";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');

	function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[2],$pisah[1],$pisah[0]);
		$satukan = implode('-',$urutan);
		return $satukan;
	}
 
	$kdkel = $_POST['txtkdkel'];
	$txtnm = $_POST['txtnm'];
	$cbokat = $_POST['cbokat'];
	$txttgl = ubahformatTgl($_POST['txttgl']);

	mysqli_query($koneksi,"INSERT INTO tbprestasi (
				kode, nm_penghargaan, kd_tingkat, deskripsi, tanggal, posisi) 
				VALUES 
				('$kdkel','$txtnm','$cbokat','','$txttgl','')");

	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('prestasi.php');</script>";
?>
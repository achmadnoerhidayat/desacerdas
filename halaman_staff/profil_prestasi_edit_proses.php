<?php 
	include "config/koneksi.php";
 
	function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[2],$pisah[1],$pisah[0]);
		$satukan = implode('-',$urutan);
		return $satukan;
	}

	$id = $_POST['txtid'];
	$txtnm = $_POST['txtnm'];
	$cbokat = $_POST['cbokat'];
	//$txtposisi = $_POST['txtposisi'];
	//$txtdeskripsi = $_POST['txtdeskripsi'];
	$txttgl = ubahformatTgl($_POST['txttgl']);

	mysqli_query($koneksi,"UPDATE tbprestasi 
				SET nm_penghargaan='$txtnm', kd_tingkat='$cbokat', 
				deskripsi='', tanggal='$txttgl', posisi='' WHERE id='$id'");

	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('prestasi.php');</script>";
?>
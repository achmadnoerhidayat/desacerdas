<?php
	include "config/koneksi.php";
	
	$kode=$_GET['kd'];
	$thn=$_GET['thn'];
	$kdwil=$_GET['kdwil'];
	
	$modal=mysqli_query($koneksi,"Delete FROM tbrek WHERE kode='$kode'");
	$modal=mysqli_query($koneksi,"Delete FROM tbrapbes_detail WHERE kode='$kode' and tahun='$thn' and kode_wil='$kdwil'");

	echo"<script>window.alert('Data Berhasil Dihapus!');window.location=('adm_rabdes_detail.php?thn=$thn');</script>";
?>
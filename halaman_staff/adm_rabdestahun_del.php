<?php
	include "config/koneksi.php";
	$thn=$_GET['thn'];
	$id=$_GET['kd'];
	
	$modal=mysqli_query($koneksi,"Delete FROM tbrapbes where kode='$id' and tahun='$thn'");
	$modal=mysqli_query($koneksi,"Delete FROM tbrapbes_detail WHERE kode_wil='$id' and tahun='$thn'");
	echo"<script>window.alert('Data Berhasil Dihapus!');window.location=('adm_rabdes.php');</script>";
?>
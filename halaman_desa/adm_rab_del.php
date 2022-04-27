<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];
	$modal=mysqli_query($koneksi,"Delete FROM tbrab WHERE id='$id'");
	$modal=mysqli_query($koneksi,"Delete FROM tbrab_sub WHERE kode_rab='$id'");
	$modal=mysqli_query($koneksi,"Delete FROM tbrab_detail WHERE kode_rab='$id'");
	echo"<script>window.alert('Data Berhasil Dihapus!');window.location=('adm_rab.php');</script>";
?>
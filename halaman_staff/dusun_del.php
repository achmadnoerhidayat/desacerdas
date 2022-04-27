<?php
	include "config/koneksi.php";
	$id=$_GET['id'];

	$modal=mysqli_query($koneksi,"Delete FROM tbdukuh WHERE id_dukuh='$id'");
	$modal=mysqli_query($koneksi,"DELETE FROM tbrw WHERE id_dukuh='$id'");
	$modal=mysqli_query($koneksi,"DELETE FROM tbrt WHERE id_dukuh='$id'");	
	header('location:validasi_desa.php');
?>
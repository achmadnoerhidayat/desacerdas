<?php
	include "config/koneksi.php";
	$id=$_GET['id'];

	$modal=mysqli_query($koneksi,"DELETE FROM tbrw WHERE id='$id'");
	header('location:validasi_desa.php');
?>
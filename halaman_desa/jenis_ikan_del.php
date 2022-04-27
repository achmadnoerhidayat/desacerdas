<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];

	$modal=mysqli_query($koneksi,"Delete FROM tbjenis_ikan WHERE kode='$id'");
	header('location:jenis_ikan.php');
?>
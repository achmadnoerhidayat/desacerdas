<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];

	$modal=mysqli_query($koneksi,"Delete FROM tbjenis_tanaman WHERE kode='$id'");
	header('location:jenis_tanaman.php');
?>
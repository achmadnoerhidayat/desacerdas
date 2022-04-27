<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];

	$modal=mysqli_query($koneksi,"Delete FROM tbjenis_ternak WHERE kode='$id'");
	header('location:jenis_ternak.php');
?>
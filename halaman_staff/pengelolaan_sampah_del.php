<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];

	$modal=mysqli_query($koneksi,"Delete FROM tbpengelolaan_sampah WHERE id='$id'");
	header('location:sampah_pengelolaan.php');
?>
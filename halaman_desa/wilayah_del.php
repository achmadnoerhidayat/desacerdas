<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];
	$modal=mysqli_query($koneksi,"Delete FROM tbdukuh WHERE id_dukuh='$id'");
	header('location:wilayah.php');
?>
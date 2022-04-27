<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];

	$modal=mysqli_query($koneksi,"Delete FROM tbpertambangan WHERE id='$id'");

	header('location:pertambangan.php');
?>
<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];

	$modal=mysqli_query($koneksi,"Delete FROM tbuser WHERE id='$id'");
	header('location:user.php');
?>
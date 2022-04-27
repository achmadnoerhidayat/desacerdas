<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];

	

	$modal=mysqli_query($koneksi,"Delete FROM tbtimbulan WHERE id='$id'");
	header('location:sampah_timbulan.php');
	
?>
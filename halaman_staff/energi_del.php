<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];

	

	$modal=mysqli_query($koneksi,"Delete FROM tbenergi WHERE id='$id'");
	header('location:energi.php');
	
?>
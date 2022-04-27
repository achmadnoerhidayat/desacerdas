<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];

	
	$modal=mysqli_query($koneksi,"Delete FROM tbtps WHERE id='$id'");

	header('location:tps.php');
?>
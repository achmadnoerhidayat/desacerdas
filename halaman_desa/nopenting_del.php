<?php
	include "config/koneksi.php";
	$id=$_GET['id'];
	
	$modal=mysqli_query($koneksi,"Delete FROM tbnopenting WHERE id_nopenting='$id'");
	header('location:nopenting.php');
?>
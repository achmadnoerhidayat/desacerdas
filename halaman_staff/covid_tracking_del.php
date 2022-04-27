<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];
	$modal=mysqli_query($koneksi,"Delete FROM tbtracking WHERE id='$id'");

	header('location:covid_tracking.php');
?>
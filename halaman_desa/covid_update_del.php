<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];
	$modal=mysqli_query($koneksi,"Delete FROM tbcovid WHERE id='$id'");

	header('location:covid_update.php');
?>
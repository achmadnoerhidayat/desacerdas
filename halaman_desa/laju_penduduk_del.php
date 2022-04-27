<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];
	$modal=mysqli_query($koneksi,"Delete FROM tblajupenduduk WHERE id='$id'");

	header('location:laju_penduduk.php');
?>
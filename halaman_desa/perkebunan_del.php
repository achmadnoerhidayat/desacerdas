<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];
	$modal=mysqli_query($koneksi,"Delete FROM tbpertanian WHERE id='$id'");

header('location:perkebunan.php');
?>
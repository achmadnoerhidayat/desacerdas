<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];
	$modal=mysqli_query($koneksi,"Delete FROM tbprogram WHERE id='$id'");
	header('location:program.php');
?>
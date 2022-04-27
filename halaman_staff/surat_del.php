<?php
	include "config/koneksi.php";
	$id=$_GET['id'];	
	$modal=mysqli_query($koneksi,"Delete FROM tbbuatsurat WHERE nomor_surat='$id'");
	header('location:list_surat.php');
?>
<?php
	include "config/koneksi.php";
	$id=$_GET['id'];
	
	$modal=mysqli_query($koneksi,"Delete FROM tbperpustakaan WHERE id_perpustakaan='$id'");
	header('location:perpustakaan.php');
?>
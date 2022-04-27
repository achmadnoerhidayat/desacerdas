<?php
	include "config/koneksi.php";
	$id=$_GET['id'];	
	$modal=mysqli_query($koneksi,"Delete FROM tbmodul_ass WHERE id_modul='$id'");
	header('location:ass_manajemen.php');
?>
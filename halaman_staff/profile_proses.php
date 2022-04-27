<?php 
	include "config/koneksi.php";
 
	$nip = $_POST['txtnip'];
	$txtnm = $_POST['txtnm'];
	$txtpwd = $_POST['txtpwd'];
	
	mysqli_query($koneksi,"UPDATE tbuser SET nama='$txtnm', password='$txtpwd' WHERE nip='$nip'");
	echo"<script>window.alert('Update Profil Berhasil!');window.location=('index.php');</script>";
?>
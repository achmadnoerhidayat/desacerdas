<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	include "config/koneksi.php";

	$txtid = $_POST['txtid'];
	$txtnip = $_POST['txtnip'];
	$txtnm = $_POST['txtnm'];
	$txtpwd = $_POST['txtpwd'];
	$cbolevel = $_POST['cbolevel'];

	$txtuser = $_POST['txtuser'];
	$txtemail = $_POST['txtemail'];

	mysqli_query($koneksi,"UPDATE tbuser set 
				password='$txtpwd', level_akses='$cbolevel', nama='$txtnm', email='$txtemail', user_name='$txtuser', 
				nip='$txtnip' 
				where id='$txtid'");
  	echo"<script>window.alert('Data User Berhasil diubah');window.location=('user.php');</script>";
?>
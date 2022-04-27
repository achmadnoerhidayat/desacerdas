<?php 
	$koneksi = mysqli_connect("localhost","root","","clcwebid_dbdesacerdas"); 
	if (mysqli_connect_errno()){
		echo "Koneksi database gagal : " . mysqli_connect_error();
	}
?>
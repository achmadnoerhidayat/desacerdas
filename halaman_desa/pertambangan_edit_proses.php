<?php 
	include "config/koneksi.php";
 
	$id = $_POST['txtid'];
	
	$cbojns = $_POST['cbojns'];
	
	$txtluas = $_POST['txtluas'];
	$txtton = $_POST['txtton'];
	$txtlahan = $_POST['txtlahan'];
	$txtsistem = $_POST['txtsistem'];

	mysqli_query($koneksi,"UPDATE tbpertambangan 
				SET kd_tambang='$cbojns', luas='$txtluas', produksi='$txtton', lahan='$txtlahan', sistem='$txtsistem' WHERE id='$id'");
	header('location:pertambangan.php');
?>
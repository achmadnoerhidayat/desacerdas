<?php 
	include "config/koneksi.php";

	$txtnama = $_POST['txtnama'];
	$txtjbt = $_POST['txtjbt'];
	
	$txttugas = $_POST['txttugas'];
	
	if($txtnama=='') {
		
	} else {
		mysqli_query($koneksi,"INSERT INTO tbsurat_tugas (fld_nama, fld_jabatan) VALUES ('$txtnama','$txtjbt')");		
	}
	
	//header('location:s_tugas_add1.php');
?>
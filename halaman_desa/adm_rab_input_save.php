<?php 
	include "config/koneksi.php";
 
	$txtkdkel = $_POST['txtkdkel'];
	
	$txttahun = $_POST['txttahun'];
	$txtbidang = $_POST['txtbidang'];
	$txtbidangsub = $_POST['txtbidangsub'];	
	$txtkeg = $_POST['txtkeg'];
	$txtwaktu = $_POST['txtwaktu'];
	$txtrincian = $_POST['txtrincian'];
	
	$txtno1 = $_POST['txtno1'];
	$txtjumlah1 = $_POST['txtjumlah1'];
	$txtno2 = $_POST['txtno2'];
	$txtjumlah2 = $_POST['txtjumlah2'];
	$txtno3 = $_POST['txtno3'];
	$txtjumlah3 = $_POST['txtjumlah3'];
	

	
	$txturaian1 = $_POST['txturaian1'];
	$txturaian2 = $_POST['txturaian2'];
	$txturaian3 = $_POST['txturaian3'];



	//$txtno4 = $_POST['txtno4'];
	//$txturaian = $_POST['txturaian'];	
	$txtvol = $_POST['txtvol'];
	$txtharga = $_POST['txtharga'];
	$txtjml = $_POST['txtjml'];
	
	mysqli_query($koneksi,"INSERT INTO tbrab 
				(kode, tahun, bidang, bidang_sub, kegiatan, 
				waktu, rincian, 
				no_anggaran1, jml1, no_anggaran2, jml2, no_anggaran3, jml3, 
				uraian_1, uraian_2, uraian_3) 
				VALUES 
				('$txtkdkel','$txttahun','$txtbidang','$txtbidangsub','$txtkeg',
				'$txtwaktu','$txtrincian','$txturaian','$txtvol','$txtharga','$txtjml',
				'$txtno1','$txtjumlah1','$txtno2','$txtjumlah2','$txtno3','$txtjumlah3','$txtno4', 
				'$txturaian1', '$txturaian2', '$txturaian3')");
							
	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('adm_rab.php');</script>";
?>
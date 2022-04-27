<?php 
	include "config/koneksi.php";
 
	$id = $_POST['txtid'];	
	
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
	
	$txtno4 = $_POST['txtno4'];
	$txturaian = $_POST['txturaian'];	
	$txtvol = $_POST['txtvol'];
	$txtharga = $_POST['txtharga'];
	$txtjml = $_POST['txtjml'];
	
	$txturaian1 = $_POST['txturaian1'];
	$txturaian2 = $_POST['txturaian2'];
	$txturaian3 = $_POST['txturaian3'];
	
	mysqli_query($koneksi,"UPDATE tbrab 
				SET tahun='$txttahun', bidang='$txtbidang', bidang_sub='$txtbidangsub', kegiatan='$txtkeg', 
				waktu='$txtwaktu', rincian='$txtrincian', uraian='$txturaian', volume='$txtvol', harga='$txtharga', jumlah='$txtjml', 
				no_anggaran1='$txtno1', jml1='$txtjumlah1', no_anggaran2='$txtno2', jml2='$txtjumlah2', no_anggaran3='$txtno3', jml3='$txtjumlah2', 
				no_anggaran4='$txtno4', 
				uraian_1='$txturaian1', uraian_2='$txturaian2', uraian_3='$txturaian3' WHERE id='$id'");
				
	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('adm_rab.php');</script>";
?>
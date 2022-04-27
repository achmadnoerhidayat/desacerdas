<?php 
	include "config/koneksi.php";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$cbokel = $_POST['txtkdkel'];
	
	$txtjml1 = $_POST['txtjml1'];
	$txtjml2 = $_POST['txtjml2'];	
	$txtjml3 = $_POST['txtjml3'];
	$txtjml4 = $_POST['txtjml4'];
	$txtjml5 = $_POST['txtjml5'];
	$txtjml6 = $_POST['txtjml6'];
	
	$txtair1 = $_POST['txtair1'];
	$txtair2 = $_POST['txtair2'];	
	$txtair3 = $_POST['txtair3'];
	$txtair4 = $_POST['txtair4'];
	$txtair5 = $_POST['txtair5'];
	$txtair6 = $_POST['txtair6'];
	
	$txtnilai1 = $_POST['txtnilai1'];
	$txtnilai2 = $_POST['txtnilai2'];	
	$txtnilai3 = $_POST['txtnilai3'];
	$txtnilai4 = $_POST['txtnilai4'];
	$txtnilai5 = $_POST['txtnilai5'];
	$txtnilai6 = $_POST['txtnilai6'];

	$txtkapasitas1 = $_POST['txtkapasitas1'];
	$txtkapasitas2 = $_POST['txtkapasitas2'];

	$txtsumber1 = $_POST['txtsumber1'];
	$txtsumber2 = $_POST['txtsumber2'];
	$txtsumber3 = $_POST['txtsumber3'];
	$txtsumber4 = $_POST['txtsumber4'];
	$txtsumber5 = $_POST['txtsumber5'];
	$txtsumber6 = $_POST['txtsumber6'];
	
$data = mysqli_query($koneksi,"SELECT * FROM tbairminum WHERE kode='$cbokel'"); 
	$cek = mysqli_num_rows($data);
	if($cek > 0){		
	mysqli_query($koneksi,"UPDATE tbairminum 
						SET jml_pelanggan1='$txtjml1', jml_pelanggan2='$txtjml2', jml_pelanggan3='$txtjml3', 
						jml_pelanggan4='$txtjml4', jml_pelanggan5='$txtjml5', jml_pelanggan6='$txtjml6', 
						air1='$txtair1', air2='$txtair2', air3='$txtair3', air4='$txtair4', air5='$txtair5', air6='$txtair6', 
						nilai1='$txtnilai1', nilai2='$txtnilai2', nilai3='$txtnilai3', nilai4='$txtnilai4', nilai5='$txtnilai5', nilai6='$txtnilai6', 
						kapasitas_produksi='$txtkapasitas1', kapasitas_produksi_efektif='$txtkapasitas2', 
						produksi1='$txtsumber1', produksi2='$txtsumber2', produksi3='$txtsumber3', produksi4='$txtsumber4', 
						produksi5='$txtsumber5', produksi6='$txtsumber6' WHERE kode='$cbokel'");

  	echo"<script>window.alert('Data Berhasil Diupdate!');window.location=('air_minum.php');</script>";
	} else {
	mysqli_query($koneksi,"INSERT INTO tbairminum 
						(kode, 
						jml_pelanggan1, jml_pelanggan2, jml_pelanggan3, jml_pelanggan4, jml_pelanggan5, jml_pelanggan6, 
						air1, air2, air3, air4, air5, air6, 
						nilai1, nilai2, nilai3, nilai4, nilai5, nilai6, 
						kapasitas_produksi, kapasitas_produksi_efektif, 
						produksi1, produksi2, produksi3, produksi4, produksi5, produksi6, 
						sumber) 
						VALUES 
						('$cbokel',
						'$txtjml1','$txtjml2','$txtjml3','$txtjml4','$txtjml5','$txtjml6',
						'$txtair1','$txtair2','$txtair3','$txtair4','$txtair5','$txtair6',
						'$txtnilai1','$txtnilai2','$txtnilai3','$txtnilai4','$txtnilai5','$txtnilai6',
						'$txtkapasitas1','$txtkapasitas2',
						'$txtsumber1','$txtsumber2','$txtsumber3','$txtsumber4','$txtsumber5','$txtsumber6',
						'')");

  	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('air_minum.php');</script>";
	}
?>
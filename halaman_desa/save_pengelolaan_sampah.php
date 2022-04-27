<?php 
	include "config/koneksi.php";
	//$namafolder="../file_upload/";
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$cbokel = $_POST['txtkdkel'];
	$txtnm = $_POST['txtnm'];
	$txtdasar = $_POST['txtdasar'];
	$txttujuan = $_POST['txttujuan'];
	$txtkeg = $_POST['txtkeg'];
	$txthasil = $_POST['txthasil'];

	//$file=$_FILES['txtfile1']['name'];
	//$tmp_dir=$_FILES['txtfile1']['tmp_name'];
	//$ukuran=$_FILES['txtfile1']['size'];
	//$jenis_gambar=$_FILES['txtfile1']['type'];

			mysqli_query($koneksi,"INSERT INTO tbpengelolaan_sampah 
								(kode, nama, dasar, tujuan, kegiatan, hasil) 
								VALUES 
								('$cbokel','$txtnm','$txtdasar','$txttujuan','$txtkeg','$txthasil')");

			echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('sampah_pengelolaan.php');</script>";
?>
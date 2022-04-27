<?php 
	include "config/koneksi.php";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$txtnip = $_GET['txt1'];
	$txtlat = $_GET['txt2'];
	$txtlong = $_GET['txt3'];

		$data = mysqli_query($koneksi,"SELECT nip FROM tbkehadiran WHERE nip='$txtnip' and tanggal='$tgl_skr' and masuk<>''");
		$cek = mysqli_num_rows($data);
		if($cek > 0){	
			echo"<script>window.alert('Anda Sudah Absen Masuk sebelumnya!');window.location=('absensi.php');</script>";		
		} else {
			mysqli_query($koneksi,"INSERT INTO tbkehadiran (nip, tanggal, masuk, lat) VALUES ('$txtnip','$tgl_skr','$waktuaja_skr','$txtlat')");			
			echo"<script>window.alert('Absen Masuk anda berhasil direkam!');window.location=('absensi.php');</script>";
		}	
?>

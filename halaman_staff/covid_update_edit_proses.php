<?php 
	include "config/koneksi.php";
 
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');

	function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[2],$pisah[1],$pisah[0]);
		$satukan = implode('-',$urutan);
		return $satukan;
	}
	$txttgl = ubahformatTgl($_POST['txttgl']);
	$id = $_POST['txtid'];
	$txt1 = $_POST['txt1'];
	$txt2 = $_POST['txt2'];
	$txt3 = $_POST['txt3'];
	$txt4 = $_POST['txt4'];
	$txt5 = $_POST['txt5'];
	$txt6 = $_POST['txt6'];
	$txt7 = $_POST['txt7'];
	$txt8 = $_POST['txt8'];
	
	mysqli_query($koneksi,"UPDATE tbcovid SET 
				tgl='$txttgl', suspect='$txt1', probable='$txt2', positif='$txt3', 
				perawatan='$txt4', meninggal='$txt5', sembuh='$txt6', otg='$txt7', isoman='$txt8' WHERE id='$id'");

	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('covid_update.php');</script>";
?>
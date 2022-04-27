<?php 
	include "config/koneksi.php";
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$cbokel = $_POST['txtid'];
    $txtketinggian = $_POST['txtketinggian'];
    $txthujan = $_POST['txthujan'];
    $txtsuhu = $_POST['txtsuhu'];
    $txttopografi = $_POST['txttopografi'];
    $txtjarak1 = $_POST['txtjarak1'];
    $txtjarak2 = $_POST['txtjarak2'];
    $txtjarak3 = $_POST['txtjarak3'];
    $txtjarak4 = $_POST['txtjarak4'];

	mysqli_query($koneksi,"UPDATE tbprofil SET 
				tinggi='$txtketinggian', hujan='$txthujan', suhu='$txtsuhu', topografi='$txttopografi',
        			jarak1='$txtjarak1', jarak2='$txtjarak2', jarak3='$txtjarak3', jarak4='$txtjarak4' 
				WHERE kode='$cbokel'");
	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('geografis.php');</script>";
?>
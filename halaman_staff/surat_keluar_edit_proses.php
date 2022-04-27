<?php 
	include "config/koneksi.php";

    function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[2],$pisah[1],$pisah[0]);
		$satukan = implode('-',$urutan);
		return $satukan;
	}
	
	$txttgl = ubahformatTgl($_POST['txttgl']);
	$txttglsrt = ubahformatTgl($_POST['txttglsrt']); 
	$id = $_POST['txtid'];
	$txttahun = $_POST['txttahun'];
	$txtno = $_POST['txtno'];
	$txttujuan = $_POST['txttujuan'];
	$txtisi = $_POST['txtisi'];
	$txtket = $_POST['txtket'];
	
	mysqli_query($koneksi,"UPDATE tbsurat_keluar 
							SET tahun='$txttahun', nomor='$txtno', tanggal='$txttgl', 
							tujuan='$txttujuan', isi='$txtisi', keterangan='$txtket', tgl_surat='$txttglsrt' 
							WHERE id='$id'");

	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('adm_surat_keluar.php');</script>";
?>
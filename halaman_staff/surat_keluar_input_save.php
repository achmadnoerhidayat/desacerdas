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
	$txtkdkel = $_POST['txtkdkel'];
	$txttahun = $_POST['txttahun'];
	$txtno = $_POST['txtno'];
	$txttujuan = $_POST['txttujuan'];
	$txtisi = $_POST['txtisi'];
	$txtket = $_POST['txtket'];
	
	mysqli_query($koneksi,"INSERT INTO tbsurat_keluar 
							(kode, tahun, nomor, tanggal, tujuan, isi, keterangan, tgl_surat) 
							VALUES 
							('$txtkdkel','$txttahun','$txtno','$txttgl','$txttujuan','$txtisi','$txtket','$txttglsrt')");
							
echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('adm_surat_keluar_input.php');</script>";
	
?>
<?php 
	include "config/koneksi.php";

   function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[2],$pisah[1],$pisah[0]);
		$satukan = implode('-',$urutan);
		return $satukan;
	}
	
	$txttgl = ubahformatTgl($_POST['txttgl']);
	$cbokel = $_POST['txtkdkel'];
	$txtnm = $_POST['txtnm'];
	$txtnik = $_POST['txtnik'];
	$cbokategori = $_POST['cbokategori'];
	$txtisi = $_POST['txtisi'];

    mysqli_query($koneksi,"INSERT INTO tbpengaduan
                                  (tanggal, nik, kd_kategori, isi, kode, nama)
                                  VALUES
                                  ('$txttgl','$txtnik','$cbokategori','$txtisi','$cbokel','$txtnm')");
    header('location:pengaduan_input.php');
?>

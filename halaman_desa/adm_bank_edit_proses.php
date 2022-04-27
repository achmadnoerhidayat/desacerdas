<?php 
	include "config/koneksi.php";
	$folder="../file_upload/";
 
 	function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[2],$pisah[1],$pisah[0]);
		$satukan = implode('-',$urutan);
		return $satukan;
	}

	$txttgl = ubahformatTgl($_POST['txttgl']);	
	$id = $_POST['txtid'];	
	$txttahun = $_POST['txttahun'];
	$cbobln = $_POST['cbobln'];
	$txturaian = $_POST['txturaian'];
	$txt1 = $_POST['txt1'];
	$txt2 = $_POST['txt2'];
	$txt3 = $_POST['txt3'];
	$txt4 = $_POST['txt4'];
	$txt5 = $_POST['txt5'];
	
	if(!empty($_FILES["gambar"]["tmp_name"])){	
		$temp = $_FILES['gambar']['tmp_name'];
		$name = basename( $_FILES['gambar']['name']) ;
		$size = $_FILES['gambar']['size'];
		$type = $_FILES['gambar']['type'];
		$foto = $folder.$name;		
		
		move_uploaded_file($temp, $folder . $name);
		mysqli_query($koneksi,"UPDATE tbbank SET 
					tahun='$txttahun', bulan='$cbobln', tgl_trx='$txttgl', uraian_trx='$txturaian', 
					setoran='$txt1', bunga='$txt2', penarikan='$txt3', pajak='$txt4', adm='$txt4', 
					file_photo='$foto', file_name='$name' WHERE id='$id'");

		header('location:adm_bank.php');
	} else {
		mysqli_query($koneksi,"UPDATE tbbank SET 
					tahun='$txttahun', bulan='$cbobln', tgl_trx='$txttgl', uraian_trx='$txturaian', 
					setoran='$txt1', bunga='$txt2', penarikan='$txt3', pajak='$txt4', adm='$txt4' WHERE id='$id'");		
		header('location:adm_bank.php');
	}
?>
<?php 
	include "config/koneksi.php";
	$folder="../file_upload/";
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');

	function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[2],$pisah[1],$pisah[0]);
		$satukan = implode('-',$urutan);
		return $satukan;
	}
	
 
	$kdkel = $_POST['txtkdkel'];
	$txtnm = $_POST['txtnm'];
	$cbokat = $_POST['cbokat'];
	$cbostatus = $_POST['cbostatus'];
	//$txttahun = $_POST['txttahun'];
	$txtdeskripsi = $_POST['txtdeskripsi'];
	$txttgl1 = ubahformatTgl($_POST['txttgl1']);
	$txttgl2 = ubahformatTgl($_POST['txttgl2']);

	$temp = $_FILES['gambar']['tmp_name'];
    $name = rand(0,9999).$_FILES['gambar']['name'];
    $size = $_FILES['gambar']['size'];
    $type = $_FILES['gambar']['type'];
	$foto = $folder.$name;		
					
    //if ($size < 5000000 and ($type =='image/jpeg' or $type =='image/jpg' or $type == 'image/png')) {
        move_uploaded_file($temp, $folder . $name);
			mysqli_query($koneksi,"INSERT INTO tbprogram 
				(kode, nm_program, kd_kategori, kd_status, deskripsi, file_photo, file_name) 
				VALUES 
				('$kdkel','$txtnm','$cbokat','$cbostatus','$txtdeskripsi','$foto','$name')");
        header('location:program.php');
    //}else{
        //echo "<b>Ukuran Gambar Terlalu Besar, Max hanya 5 Mb!</b>";
    //}
?>
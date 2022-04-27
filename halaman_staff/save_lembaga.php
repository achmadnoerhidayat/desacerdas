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
	$txttgl1 = ubahformatTgl($_POST['txttgl1']);
	$txttgl2 = ubahformatTgl($_POST['txttgl2']);
	$txtnm = $_POST['txtnm'];
	$cbokat = $_POST['cbokat'];
	$txtdeskripsi = $_POST['txtdeskripsi'];
	//$txtwewenang = $_POST['txtwewenang'];
	$txtnmp = $_POST['txtnmp'];
	$cbojbt = $_POST['cbojbt'];
	
    $temp = $_FILES['gambar']['tmp_name'];
			$name = basename( $_FILES['gambar']['name']) ;
    $size = $_FILES['gambar']['size'];
    $type = $_FILES['gambar']['type'];
	$foto = $folder.$name;		
					
    //if ($size < 5000000 and ($type =='image/jpeg' or $type =='image/jpg' or $type == 'image/png')) {
        move_uploaded_file($temp, $folder . $name);
	mysqli_query($koneksi,"INSERT INTO tblembaga 
				(kode, nm_lembaga, kd_kategori, deskripsi, wewenang, nm_pengurus, kd_jabatan, mulai, sampai,
				file_photo, file_name) 
				VALUES 
				('$kdkel','$txtnm','$cbokat','','$txtdeskripsi','$txtnmp','$cbojbt','$txttgl1','$txttgl2', 
				'$foto','$name')");
        header('location:lembaga_daftar.php');
    //}else{
        //echo "<b>Ukuran Gambar Terlalu Besar, Max hanya 5 Mb!</b>";
    //}
?>
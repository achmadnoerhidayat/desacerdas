<?php 
	include "config/koneksi.php";
	$folder="../file_upload/";
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$cbokel = $_POST['txtkdkel'];
	$txtjudul = $_POST['txtjudul'];
	$txtpembuat = $_POST['txtpembuat'];
	$txtisi = $_POST['txtisi'];

    $temp = $_FILES['gambar']['tmp_name'];
	$name = basename( $_FILES['gambar']['name']) ;
    $size = $_FILES['gambar']['size'];
    $type = $_FILES['gambar']['type'];
	$foto = $folder.$name;		
					
    //if ($size < 5000000 and ($type =='image/jpeg' or $type =='image/jpg' or $type == 'image/png')) {
	move_uploaded_file($temp, $folder . $name);
	
	
	
	mysqli_query($koneksi,"INSERT INTO tbberita (judul, pembuat, isi, tgl_berita, id_kel, foto_berita) 
							VALUES ('$txtjudul','$txtpembuat','$txtisi','$tgl_skr','$cbokel','$foto')");
	header('location:berita.php');
    //}else{
        //echo "<b>Ukuran Gambar Terlalu Besar, Max hanya 5 Mb!</b>";
    //}
?>
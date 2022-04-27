<?php 
	include "config/koneksi.php";
	$folder="../file_upload/";
 
	$id = $_POST['txtid'];
	//$kode = $_POST['txtkdkel'];

	$txtnm = $_POST['txtnm'];
	$cbokat = $_POST['cbokat'];
	$cbostatus = $_POST['cbostatus'];
	
	$txtdeskripsi = $_POST['txtdeskripsi'];

	$temp = $_FILES['gambar']['tmp_name'];
    $name = rand(0,9999).$_FILES['gambar']['name'];
    $size = $_FILES['gambar']['size'];
    $type = $_FILES['gambar']['type'];
	$foto = $folder.$name;		

	//if ($size < 5000000 and ($type =='image/jpeg' or $type =='image/jpg' or $type == 'image/png')) {
        move_uploaded_file($temp, $folder . $name);
		mysqli_query($koneksi,"UPDATE tbprogram 
				SET nm_program='$txtnm', kd_kategori='$cbokat', kd_status='$cbostatus', 
				deskripsi='$txtdeskripsi', file_photo='$foto', file_name='$name' WHERE id='$id'");
        header('location:program.php');
    //}else{
        //echo "<b>Ukuran Gambar Terlalu Besar, Max hanya 5 Mb!</b>";
    //}
?>
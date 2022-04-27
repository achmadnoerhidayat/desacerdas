<?php 
	include "config/koneksi.php";
	$folder="../file_upload/";
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$cbokel = $_POST['txtkdkel'];
	$txtnm = $_POST['txtnm'];
	$txtluas = $_POST['txtluas'];
	$txtdalam = $_POST['txtdalam'];
	$cbokondisi = $_POST['cbokondisi'];
	$txtpotensi = $_POST['txtpotensi'];

    $temp = $_FILES['gambar']['tmp_name'];
		$name = basename( $_FILES['gambar']['name']) ;
    $size = $_FILES['gambar']['size'];
    $type = $_FILES['gambar']['type'];
	$foto = $folder.$name;		
					
    //if ($size < 5000000 and ($type =='image/jpeg' or $type =='image/jpg' or $type == 'image/png')) {
        move_uploaded_file($temp, $folder . $name);
			mysqli_query($koneksi,"INSERT INTO tbdanau 
				(kode, nama_danau, luas, kedalaman, kondisi, pemanfaatan, tgl_input, jam_input, user_id, file_photo, file_name) 
				VALUES 
				('$cbokel','$txtnm','$txtluas','$txtdalam','$cbokondisi','$txtpotensi',
				'$tgl_skr','$waktuaja_skr','','$foto','$name')");
        header('location:danau.php');
    //}else{
        //echo "<b>Ukuran Gambar Terlalu Besar, Max hanya 5 Mb!</b>";
    //}
?>
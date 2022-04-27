<?php 
	include "config/koneksi.php";
	$folder="../file_upload/";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$cbokel = $_POST['txtkdkel'];
	$txtnm = $_POST['txtnm'];
	$txtnms = $_POST['txtnms'];
	$txtp = $_POST['txtp'];
	$txtluas = $_POST['txtluas'];
	$txttahun = $_POST['txttahun'];
	$cbokondisi = $_POST['cbokondisi'];
	$txtmanfaat = $_POST['txtpotensi'];
	$txtnmsal = $_POST['txtnmsal'];
	$txtl = $_POST['txt1'];
	$txtdebit = $_POST['txtdebit'];
	
    $temp = $_FILES['gambar']['tmp_name'];
		$name = basename( $_FILES['gambar']['name']) ;
    $size = $_FILES['gambar']['size'];
    $type = $_FILES['gambar']['type'];
	$foto = $folder.$name;		
					
    //if ($size < 5000000 and ($type =='image/jpeg' or $type =='image/jpg' or $type == 'image/png')) {
        move_uploaded_file($temp, $folder . $name);
		mysqli_query($koneksi,"INSERT INTO tbbendungan 
								(kode, nama_bendungan, nama_sungai, panjang, luas, 
								tahun, kondisi, deskripsi, 
								nama_saluran, lebar_saluran, debit, file_photo, file_name) 
								VALUES 
								('$cbokel','$txtnm','$txtnms','$txtp','$txtluas',
								'$txttahun','$cbokondisi','$txtmanfaat',
								'$txtnmsal','$txtl','$txtdebit','$foto','$name')");		
        header('location:bendungan.php');
    //}else{
        //echo "<b>Ukuran Gambar Terlalu Besar, Max hanya 5 Mb!</b>";
    //}
?>
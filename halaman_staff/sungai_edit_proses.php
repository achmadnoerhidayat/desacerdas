<?php 
	include "config/koneksi.php";
	$folder="../file_upload/";
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$id = $_POST['txtid'];
	$txtnm = $_POST['txtnm'];
	$txtp = $_POST['txtp'];
	$txtl = $_POST['txtl'];
	$txtdalam = $_POST['txtdalam'];
	$txtdebit = $_POST['txtdebit'];
	$cbokondisi = $_POST['cbokondisi'];
	$txtpotensi = $_POST['txtpotensi'];

	if(!empty($_FILES["gambar"]["tmp_name"])){
		$temp = $_FILES['gambar']['tmp_name'];
		$name = basename( $_FILES['gambar']['name']) ;
		$size = $_FILES['gambar']['size'];
		$type = $_FILES['gambar']['type'];
		$foto = $folder.$name;	

		//if ($size < 5000000 and ($type =='image/jpeg' or $type =='image/jpg' or $type == 'image/png')) {
			move_uploaded_file($temp, $folder . $name);
			mysqli_query($koneksi,"UPDATE tbsungai SET 
								nama_sungai='$txtnm', panjang='$txtp', lebar='$txtl', kedalaman='$txtdalam', 
								debit='$txtdebit', kondisi='$cbokondisi', potensi='$txtpotensi', 
								file_photo='$foto', file_name='$name' WHERE id='$id'");
			header('location:sungai.php');
		//}else{
			//echo "<b>Ukuran Gambar Terlalu Besar, Max hanya 5 Mb!</b>";
		//}	
	} else {
		mysqli_query($koneksi,"UPDATE tbsungai SET 
							nama_sungai='$txtnm', panjang='$txtp', lebar='$txtl', kedalaman='$txtdalam', 
							debit='$txtdebit', kondisi='$cbokondisi', potensi='$txtpotensi' WHERE id='$id'");
        header('location:sungai.php');
	}

?>
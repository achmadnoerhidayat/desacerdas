<?php 
	include "config/koneksi.php";
	$folder="../file_upload/";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$id = $_POST['txtid'];
	$txtnm = $_POST['txtnm'];
	$txtnms = $_POST['txtnms'];
	$txtp = $_POST['txtp'];
	$txtluas = $_POST['txtluas'];
	$txttahun = $_POST['txttahun'];
	$cbokondisi = $_POST['cbokondisi'];
	$txtnmsal = $_POST['txtnmsal'];
	$txtl = $_POST['txt1'];
	$txtdebit = $_POST['txtdebit'];
	$txtmanfaat = $_POST['txtpotensi'];

	if(!empty($_FILES["gambar"]["tmp_name"])){
		$temp = $_FILES['gambar']['tmp_name'];
		$name = basename( $_FILES['gambar']['name']) ;
		$size = $_FILES['gambar']['size'];
		$type = $_FILES['gambar']['type'];
		$foto = $folder.$name;	

		//if ($size < 5000000 and ($type =='image/jpeg' or $type =='image/jpg' or $type == 'image/png')) {
			move_uploaded_file($temp, $folder . $name);
			mysqli_query($koneksi,"UPDATE tbbendungan 
								SET nama_bendungan='$txtnm', nama_sungai='$txtnms', panjang='$txtp', luas='$txtluas', 
								tahun='$txttahun', kondisi='$cbokondisi', deskripsi='$txtmanfaat', 
								nama_saluran='$txtnmsal', lebar_saluran='$txtl', debit='$txtdebit', 
								file_photo='$foto', file_name='$name' where id='$id'");
			echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('bendungan.php');</script>";
		//}else{
			//echo "<b>Ukuran Gambar Terlalu Besar, Max hanya 5 Mb!</b>";
		//}

	} else {
			mysqli_query($koneksi,"UPDATE tbbendungan 
								SET nama_bendungan='$txtnm', nama_sungai='$txtnms', panjang='$txtp', luas='$txtluas', 
								tahun='$txttahun', kondisi='$cbokondisi', deskripsi='$txtmanfaat', 
								nama_saluran='$txtnmsal', lebar_saluran='$txtl', debit='$txtdebit' where id='$id'");

			echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('bendungan.php');</script>";
	}
?>
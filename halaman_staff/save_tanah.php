<?php 
	include "config/koneksi.php";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$cbokel = $_POST['txtkdkel'];
	$txtmorfologi = $_POST['txtmorfologi'];
	$txtfisika1 = $_POST['txtfisika1'];
	$txtfisika2 = $_POST['txtfisika2'];
	$txtfisika3 = $_POST['txtfisika3'];
	$txtfisika4 = $_POST['txtfisika4'];
	$txtkimia1 = $_POST['txtkimia1'];
	$txtkimia2 = $_POST['txtkimia2'];
	$txtkimia3 = $_POST['txtkimia3'];
	$txtanalisis = $_POST['txtanalisis'];

	$data = mysqli_query($koneksi,"SELECT * FROM tbtanah WHERE kode='$cbokel'"); 
	$cek = mysqli_num_rows($data);
	if($cek > 0){		
		mysqli_query($koneksi,"UPDATE tbtanah 
							SET morfologi='$txtmorfologi', 
							fisika_1='$txtfisika1', fisika_2='$txtfisika2', fisika_3='$txtfisika3', fisika_4='$txtfisika4', 
							kimia_1='$txtkimia1', kimia_2='$txtkimia2', kimia_3='$txtkimia3', 
							analisa='$txtanalisis' WHERE kode='$cbokel'");

		echo"<script>window.alert('Data Berhasil Diupdate!');window.location=('tanah.php');</script>";
	} else {
		mysqli_query($koneksi,"INSERT INTO tbtanah 
							(kode, morfologi, 
							fisika_1, fisika_2, fisika_3, fisika_4, 
							kimia_1, kimia_2, kimia_3, 
							analisa) 
							VALUES 
							('$cbokel','$txtmorfologi',
							'$txtfisika1','$txtfisika2','$txtfisika3','$txtfisika4',
							'$txtkimia1','$txtkimia2','$txtkimia3',
							'$txtanalisis')");

		echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('tanah.php');</script>";
	}



			

?>
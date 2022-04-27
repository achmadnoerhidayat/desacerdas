<?php 
	include "config/koneksi.php";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$cbokel = $_POST['txtkdkel'];
	$cbojns = $_POST['cbojns'];
	$txt1 = $_POST['txt1'];
	$txt2 = $_POST['txt2'];
	

	//$data = mysqli_query($koneksi,"SELECT * FROM tbtimbulan WHERE kode='$cbokel'"); 
	//$cek = mysqli_num_rows($data);
	//if($cek > 0){		
		//mysqli_query($koneksi,"UPDATE tbtimbulan 
							//SET domestik_vol='$txt1', domestik_berat='$txt2', 
						//nondomestik1_vol='$txt3', nondomestik1_berat='$txt4', 
						//nondomestik2_vol='$txt5', nondomestik2_berat='$txt6', 
						//nondomestik3_vol='$txt7', nondomestik3_berat='$txt8', 
						//nondomestik4_vol='$txt9', nondomestik4_berat='$txt10', 
						//nondomestik5_vol='$txt11', nondomestik5_berat='$txt12', 
						//nondomestik6_vol='$txt13', nondomestik6_berat='$txt14', 
						//nondomestik7_vol='$txt15', nondomestik7_berat='$txt16',
						//nondomestik8_vol='$txt17', nondomestik8_berat='$txt18', 
						//nondomestik9_vol='$txt19', nondomestik9_berat='$txt20' 
//WHERE kode='$cbokel'");

		//echo"<script>window.alert('Data Berhasil Diupdate!');window.location=('sampah_timbulan.php');</script>";
	//} else {
		mysqli_query($koneksi,"INSERT INTO tbtimbulan 
							(kode, id_sumber, vol, berat) 
							VALUES 
							('$cbokel','$cbojns', '$txt1','$txt2')");

		echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('sampah_timbulan.php');</script>";
	//}



			

?>
<?php 
	include "config/koneksi.php";
 
	$txtidmodul = $_POST['txtidmodul'];
	$txtsoal = $_POST['txtsoal'];
	
	$txtjwba = $_POST['txtjwba'];
	$txtjwbb = $_POST['txtjwbb'];
	$txtjwbc = $_POST['txtjwbc'];
	$txtjwbd = $_POST['txtjwbd'];
	$txtjwbe = $_POST['txtjwbe'];	

	if(isset($_POST['jwb'])) {
		$benar=$_POST['jwb'];
	}

	if($benar=='A') {
		$pilihan1="1";
		$pilihan2="0";
		$pilihan3="0";
		$pilihan4="0";
		$pilihan5="0";		
	}
	if($benar=='B') {
		$pilihan1="0";
		$pilihan2="1";
		$pilihan3="0";
		$pilihan4="0";
		$pilihan5="0";		
	}
	if($benar=='C') {
		$pilihan1="0";
		$pilihan2="0";
		$pilihan3="1";
		$pilihan4="0";
		$pilihan5="0";		
	}
	if($benar=='D') {
		$pilihan1="0";
		$pilihan2="0";
		$pilihan3="0";
		$pilihan4="1";
		$pilihan5="0";		
	}	
	if($benar=='E') {
		$pilihan1="0";
		$pilihan2="0";
		$pilihan3="0";
		$pilihan4="0";
		$pilihan5="1";		
	}	
	
	mysqli_query($koneksi,"INSERT INTO tbsoal (id_modul, nama_soal) VALUES ('$txtidmodul','$txtsoal')");
	
	$cari_kd=mysqli_query($koneksi,"SELECT id FROM tbsoal WHERE id_modul='$txtidmodul' order by id desc limit 1");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$id_soal=$tm_cari['id'];

	mysqli_query($koneksi,"INSERT INTO tbsoal_pilihan (id_soal, pilihan, jawaban) VALUES ('$id_soal','$txtjwba','$pilihan1')");
	mysqli_query($koneksi,"INSERT INTO tbsoal_pilihan (id_soal, pilihan, jawaban) VALUES ('$id_soal','$txtjwbb','$pilihan2')");
	mysqli_query($koneksi,"INSERT INTO tbsoal_pilihan (id_soal, pilihan, jawaban) VALUES ('$id_soal','$txtjwbc','$pilihan3')");
	mysqli_query($koneksi,"INSERT INTO tbsoal_pilihan (id_soal, pilihan, jawaban) VALUES ('$id_soal','$txtjwbd','$pilihan4')");
	mysqli_query($koneksi,"INSERT INTO tbsoal_pilihan (id_soal, pilihan, jawaban) VALUES ('$id_soal','$txtjwbe','$pilihan5')");
	
	$next = 'location:soal.php?id=';
	$awal = $next.$txtidmodul;
	header($awal);
?>
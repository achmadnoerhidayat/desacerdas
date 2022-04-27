<?php 
	include "config/koneksi.php";
 
	$txtidmodul = $_POST['txtidmodul'];
	$txtidsoal = $_POST['txtidsoal'];	
	
	$txtsoal = $_POST['txtsoal'];
	
	$txtjwba = $_POST['txtjwba'];
	$txtjwbb = $_POST['txtjwbb'];
	$txtjwbc = $_POST['txtjwbc'];
	$txtjwbd = $_POST['txtjwbd'];
	$txtjwbe = $_POST['txtjwbe'];	
	
	$txtidpilihan_a = $_POST['txtidpilihan_a'];
	$txtidpilihan_b = $_POST['txtidpilihan_b'];
	$txtidpilihan_c = $_POST['txtidpilihan_c'];
	$txtidpilihan_d = $_POST['txtidpilihan_d'];
	$txtidpilihan_e = $_POST['txtidpilihan_e'];	

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
	
	mysqli_query($koneksi,"UPDATE tbsoal SET nama_soal='$txtsoal' WHERE id='$txtidsoal'");

	mysqli_query($koneksi,"UPDATE tbsoal_pilihan SET pilihan='$txtjwba', jawaban='$pilihan1' WHERE id_piihan='$txtidpilihan_a'");
	mysqli_query($koneksi,"UPDATE tbsoal_pilihan SET pilihan='$txtjwbb', jawaban='$pilihan2' WHERE id_piihan='$txtidpilihan_b'");
	mysqli_query($koneksi,"UPDATE tbsoal_pilihan SET pilihan='$txtjwbc', jawaban='$pilihan3' WHERE id_piihan='$txtidpilihan_c'");
	mysqli_query($koneksi,"UPDATE tbsoal_pilihan SET pilihan='$txtjwbd', jawaban='$pilihan4' WHERE id_piihan='$txtidpilihan_d'");
	mysqli_query($koneksi,"UPDATE tbsoal_pilihan SET pilihan='$txtjwbe', jawaban='$pilihan5' WHERE id_piihan='$txtidpilihan_e'");	
		
	
	$next = 'location:soal.php?id=';
	$awal = $next.$txtidmodul;
	header($awal);
?>
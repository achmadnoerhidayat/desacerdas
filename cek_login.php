<?php 
	session_start();
	include 'config/koneksi.php';
 
	$txtemail = $_POST['txtemail'];
	$txtpass = $_POST['txtpass'];
	$data = mysqli_query($koneksi,"SELECT * FROM tbuser WHERE (email='$txtemail' or user_name='$txtemail') and password='$txtpass'");
 
	$cek = mysqli_num_rows($data);
	if($cek > 0){		

		$cari_kd=mysqli_query($koneksi,"SELECT level_akses, kode_wilayah, nama, nip FROM tbuser WHERE (email='$txtemail' or user_name='$txtemail')");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$level_akses=$tm_cari['level_akses'];
		$kode_wilayah=$tm_cari['kode_wilayah'];
		$nm_user=$tm_cari['nama'];
		$nip=$tm_cari['nip'];
		
		if($level_akses=='1') {
			$_SESSION['nip']=$nip;
			$_SESSION['nm_user']=$nm_user;
			header("location:halaman_admin/index.php");
		}
		if($level_akses=='2') {
			$_SESSION['kodewil']=$kode_wilayah;
			$_SESSION['nip']=$nip;
			$_SESSION['nm_user']=$nm_user;
			header("location:halaman_desa/index.php");
		}
		if($level_akses=='3') {
			$_SESSION['kodewil']=$kode_wilayah;
			$_SESSION['nip']=$nip;
			$_SESSION['nm_user']=$nm_user;
			header("location:halaman_staff/index.php");
		}
		if($level_akses=='4') {
			$_SESSION['kodewil']=$kode_wilayah;
			$_SESSION['nip']=$nip;
			$_SESSION['nm_user']=$nm_user;
			header("location:halaman_tamu/index.php");
		}
	}else{
  		echo"<script>window.alert('Login Gagal!');window.location=('index.php');</script>";
	}
?>
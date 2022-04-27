<?php
	session_start();
	if($_SESSION['nip']==''){
		header("location:../index.php");
	} else {
		$kd_kel=$_SESSION['kodewil'];
		$nip=$_SESSION['nip'];
		$nm_user=$_SESSION['nm_user'];
		
	include "config/koneksi.php";
	$cari_kd=mysqli_query($koneksi,"SELECT file_photo, file_name FROM tbuser WHERE nip='$nip'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$file_photo=$tm_cari['file_photo'];
	$file_name=$tm_cari['file_name'];
	if($file_photo=='') {
		$file_photo="dist/images/logo.svg";
	}
	
	
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kel=$tm_cari['nama'];
	
	$kd_prop=substr($kd_kel,0,2);
	$kd_kab=substr($kd_kel,0,5);
	$kd_kec=substr($kd_kel,0,8);
	
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kec'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kec=$tm_cari['nama'];

	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_prop'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_prop=$tm_cari['nama'];

	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kab'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kab=$tm_cari['nama'];
	
	$cari_kd=mysqli_query($koneksi,"SELECT * FROM tbprofil where kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$kd_pos=$tm_cari['kd_pos'];
	$luas=$tm_cari['luas'];
	$file_peta=$tm_cari['file_peta'];

	$txtsearch = $_POST['txtsearch'];

	// ----------- Profil ---------------
	// ----- 1. pengaduan --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbpengaduan WHERE isi like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search1=$tm_cari['tot'];
		
	// ----- 2. bansos --------
		//$cari_kd=mysqli_query($koneksi,"SELECT count(kd_bansos) as tot FROM tbbansos WHERE nm_bansos like '%$txtsearch%' and kode='$kd_kel'");
		//$tm_cari=mysqli_fetch_array($cari_kd);
		//$jml_search2=$tm_cari['tot'];

	// ----- 3. donasi --------
		//$cari_kd=mysqli_query($koneksi,"SELECT count(kd_donasi) as tot FROM tbdonasi WHERE nm_donasi like '%$txtsearch%' and kode='$kd_kel'");
		//$tm_cari=mysqli_fetch_array($cari_kd);
		//$jml_search3=$tm_cari['tot'];

	// ----- 4. umkm --------
		//$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbumkm WHERE nama_umkm like '%$txtsearch%' and kode='$kd_kel'");
		//$tm_cari=mysqli_fetch_array($cari_kd);
		//$jml_search4=$tm_cari['tot'];

	// ----- 5. lembaga --------
		//$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tblembaga WHERE nm_lembaga like '%$txtsearch%' and kode='$kd_kel'");
		//$tm_cari=mysqli_fetch_array($cari_kd);
		//$jml_search5=$tm_cari['tot'];

	// ----- 6. Program Desa --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbprogram WHERE nm_program like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search6=$tm_cari['tot'];

	// ----- 7. Profil Dukuh --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id_dukuh) as tot FROM tbdukuh WHERE nm_dukuh like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search7=$tm_cari['tot'];
	
	// ----- 8. Pengurus RT --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(tbpengurus_rt.id) as tot FROM tbpengurus_rt, tbrt, tbdukuh 
										WHERE tbpengurus_rt.id_rt=tbrt.id_rt and 
														tbrt.id_dukuh=tbdukuh.id_dukuh and 
														tbpengurus_rt.nama like '%$txtsearch%' and tbdukuh.kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search8=$tm_cari['tot'];

	// ----- 9. Perangkat Desa --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbperangkat WHERE nama like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search9=$tm_cari['tot'];

	// ----- 10. Prestasi Desa --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbprestasi WHERE nm_penghargaan like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search10=$tm_cari['tot'];

	// ----- 11. Covid Tracking --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbtracking WHERE nama like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search11=$tm_cari['tot'];

	// ----- 12. Penduduk --------
		//$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbpenduduk 
										//WHERE 
										//(nama like '%$txtsearch%' or nik like '%$txtsearch%' or kk like '%$txtsearch%') 
										//and kode='$kd_kel'");
		//$tm_cari=mysqli_fetch_array($cari_kd);
		//$jml_search12=$tm_cari['tot'];
	
		
	// -----------Potensi ---------------
	// ----- 1. sungai --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbsungai WHERE nama_sungai like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search1a=$tm_cari['tot'];	
	// ----- 2. danau --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbdanau WHERE nama_danau like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search2a=$tm_cari['tot'];
	// ----- 3. Rawa --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbrawa WHERE nama_rawa like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search3a=$tm_cari['tot'];
	// ----- 4. Mata Air --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbmata_air WHERE nama_mata_air like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search4a=$tm_cari['tot'];
	// ----- 5. Bendungan --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbbendungan WHERE nama_bendungan like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search5a=$tm_cari['tot'];
	// ----- 6. Irigasi --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbirigasi WHERE nama_irigasi like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search6a=$tm_cari['tot'];

	// ----- 7. Potensi Bahan Galian --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(tbpertambangan.id) as tot 
												FROM tbpertambangan, tbjenis_tambang 
												WHERE tbpertambangan.kd_tambang=tbjenis_tambang.kode and 
												tbjenis_tambang.nama like '%$txtsearch%' and tbpertambangan.kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search7a=$tm_cari['tot'];

	// ----- 8. Energi --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbenergi WHERE jenis_energi like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search8a=$tm_cari['tot'];

	// ----- 9. Sayuran --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(tbpertanian.id) as tot 
						FROM tbpertanian, tbjenis_tanaman 
						WHERE tbpertanian.kd_tumbuhan=tbjenis_tanaman.kode and 
						tbjenis_tanaman.kelompok='Tanaman Sayuran' and 
						tbpertanian.kode='$kd_kel' and 
						tbjenis_tanaman.nama like '%$txtsearch%'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search9a=$tm_cari['tot'];

	// ----- 10. Biofarmeka --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(tbpertanian.id) as tot 
						FROM tbpertanian, tbjenis_tanaman 
						WHERE tbpertanian.kd_tumbuhan=tbjenis_tanaman.kode and 
						tbjenis_tanaman.kelompok='Tanaman Obat' and 
						tbpertanian.kode='$kd_kel' and 
						tbjenis_tanaman.nama like '%$txtsearch%'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search10a=$tm_cari['tot'];

	// ----- 11. Buah --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(tbpertanian.id) as tot 
						FROM tbpertanian, tbjenis_tanaman 
						WHERE tbpertanian.kd_tumbuhan=tbjenis_tanaman.kode and 
						tbjenis_tanaman.kelompok='Buah' and 
						tbpertanian.kode='$kd_kel' and 
						tbjenis_tanaman.nama like '%$txtsearch%'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search11a=$tm_cari['tot'];

	// ----- 12. Kebun --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(tbpertanian.id) as tot 
						FROM tbpertanian, tbjenis_tanaman 
						WHERE tbpertanian.kd_tumbuhan=tbjenis_tanaman.kode and 
						tbjenis_tanaman.kelompok='Tanaman Perkebunan' and 
						tbpertanian.kode='$kd_kel' and 
						tbjenis_tanaman.nama like '%$txtsearch%'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search12a=$tm_cari['tot'];

	// ----- 13. Pangan --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(tbpertanian.id) as tot 
						FROM tbpertanian, tbjenis_tanaman 
						WHERE tbpertanian.kd_tumbuhan=tbjenis_tanaman.kode and 
						tbjenis_tanaman.kelompok='Tanaman Palawija' and 
						tbpertanian.kode='$kd_kel' and 
						tbjenis_tanaman.nama like '%$txtsearch%'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search13a=$tm_cari['tot'];

	// ----- 14. Ternak --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(tbpeternakan.id) as tot 
						FROM tbpeternakan, tbjenis_ternak 
						WHERE tbpeternakan.kd_ternak=tbjenis_ternak.kode and 
						tbpeternakan.kode='$kd_kel' and 
						tbjenis_ternak.nama like '%$txtsearch%'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search14a=$tm_cari['tot'];

	// ----- 15. Ikan --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(tbperikanan.id) as tot 
						FROM tbperikanan, tbjenis_ikan 
						WHERE tbperikanan.kd_ikan=tbjenis_ikan.kode 
						and tbjenis_ikan.nama like '%$txtsearch%' and tbperikanan.kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search15a=$tm_cari['tot'];

	// ----- 16. Ikan Usaha --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(tbperikanan_cabang.id) as tot 
						FROM tbperikanan_cabang, tbcabang_ikan 
						WHERE tbperikanan_cabang.kd_cabang=tbcabang_ikan.kode and 
						tbcabang_ikan.nama like '%$txtsearch%' and tbperikanan_cabang.kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search16a=$tm_cari['tot'];

	// ----- 17. Pariwisata --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbpariwisata WHERE nama_wisata like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search17a=$tm_cari['tot'];

	// ----- 18. Tpa --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbtpa WHERE nm_tpa like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search18a=$tm_cari['tot'];

	// ----- 19. Tps --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbtps WHERE nm_tps like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search19a=$tm_cari['tot'];

	// ----- 20. Timbulan Sampah --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(tbtimbulan.id) as tot 
						FROM tbtimbulan, tbtimbulan_sumber 
						WHERE 
						tbtimbulan.id_sumber=tbtimbulan_sumber.id and 
						tbtimbulan.kode='$kd_kel' and tbtimbulan_sumber.sumber like '%$txtsearch%'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search20a=$tm_cari['tot'];

	// ----- 21. Pengelolaan Sampah --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbpengelolaan_sampah WHERE nama like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search21a=$tm_cari['tot'];


		$jml_search=($jml_search1+$jml_search2+$jml_search3+$jml_search4+$jml_search5+$jml_search6+$jml_search7+$jml_search8+$jml_search9+$jml_search10+$jml_search11+$jml_search12)
				+($jml_search1a+$jml_search2a+$jml_search3a+$jml_search4a+$jml_search5a+$jml_search6a
				+$jml_search7a+$jml_search8a+$jml_search9a+$jml_search10a+$jml_search11a+$jml_search12a
				+$jml_search13a+$jml_search14a+$jml_search15a+$jml_search16a+$jml_search17a+$jml_search18a
				+$jml_search19a+$jml_search20a+$jml_search21a);
		$sql_search="Hasil pencarian dengan kata kunci '$txtsearch' ditemukan ".$jml_search." data.";

	if(isset($_POST['btnsearch'])) {	
		// ----------- Profil ---------------
		// ----- 1. pengaduan --------
			$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbpengaduan WHERE isi like '%$txtsearch%' and kode='$kd_kel'");
			$tm_cari=mysqli_fetch_array($cari_kd);
			$jml_search1=$tm_cari['tot'];
			
		// ----- 2. bansos --------
			//$cari_kd=mysqli_query($koneksi,"SELECT count(kd_bansos) as tot FROM tbbansos WHERE nm_bansos like '%$txtsearch%' and kode='$kd_kel'");
			//$tm_cari=mysqli_fetch_array($cari_kd);
			//$jml_search2=$tm_cari['tot'];

		// ----- 3. donasi --------
			//$cari_kd=mysqli_query($koneksi,"SELECT count(kd_donasi) as tot FROM tbdonasi WHERE nm_donasi like '%$txtsearch%' and kode='$kd_kel'");
			//$tm_cari=mysqli_fetch_array($cari_kd);
			//$jml_search3=$tm_cari['tot'];

		// ----- 4. umkm --------
			//$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbumkm WHERE nama_umkm like '%$txtsearch%' and kode='$kd_kel'");
			//$tm_cari=mysqli_fetch_array($cari_kd);
			//$jml_search4=$tm_cari['tot'];

		// ----- 5. lembaga --------
			$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tblembaga WHERE nm_lembaga like '%$txtsearch%' and kode='$kd_kel'");
			$tm_cari=mysqli_fetch_array($cari_kd);
			$jml_search5=$tm_cari['tot'];

		// ----- 6. Program Desa --------
			$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbprogram WHERE nm_program like '%$txtsearch%' and kode='$kd_kel'");
			$tm_cari=mysqli_fetch_array($cari_kd);
			$jml_search6=$tm_cari['tot'];

	// ----- 7. Profil Dukuh --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id_dukuh) as tot FROM tbdukuh WHERE nm_dukuh like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search7=$tm_cari['tot'];
	
	// ----- 8. Pengurus RT --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(tbpengurus_rt.id) as tot FROM tbpengurus_rt, tbrt, tbdukuh 
										WHERE tbpengurus_rt.id_rt=tbrt.id_rt and 
														tbrt.id_dukuh=tbdukuh.id_dukuh and 
														tbpengurus_rt.nama like '%$txtsearch%' and tbdukuh.kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search8=$tm_cari['tot'];

	// ----- 9. Perangkat Desa --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbperangkat WHERE nama like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search9=$tm_cari['tot'];

	// ----- 10. Prestasi Desa --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbprestasi WHERE nm_penghargaan like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search10=$tm_cari['tot'];

	// ----- 11. Covid Tracking --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbtracking WHERE nama like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search11=$tm_cari['tot'];

	// ----- 12. Penduduk --------
		//$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbpenduduk 
										//WHERE 
										//(nama like '%$txtsearch%' or nik like '%$txtsearch%' or kk like '%$txtsearch%') 
										//and kode='$kd_kel'");
		//$tm_cari=mysqli_fetch_array($cari_kd);
		//$jml_search12=$tm_cari['tot'];

			
		// -----------Potensi ---------------
		// ----- 1. sungai --------
			$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbsungai WHERE nama_sungai like '%$txtsearch%' and kode='$kd_kel'");
			$tm_cari=mysqli_fetch_array($cari_kd);
			$jml_search1a=$tm_cari['tot'];	
		// ----- 2. danau --------
			$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbdanau WHERE nama_danau like '%$txtsearch%' and kode='$kd_kel'");
			$tm_cari=mysqli_fetch_array($cari_kd);
			$jml_search2a=$tm_cari['tot'];
		// ----- 3. Rawa --------
			$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbrawa WHERE nama_rawa like '%$txtsearch%' and kode='$kd_kel'");
			$tm_cari=mysqli_fetch_array($cari_kd);
			$jml_search3a=$tm_cari['tot'];
		// ----- 4. Mata Air --------
			$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbmata_air WHERE nama_mata_air like '%$txtsearch%' and kode='$kd_kel'");
			$tm_cari=mysqli_fetch_array($cari_kd);
			$jml_search4a=$tm_cari['tot'];
		// ----- 5. Bendungan --------
			$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbbendungan WHERE nama_bendungan like '%$txtsearch%' and kode='$kd_kel'");
			$tm_cari=mysqli_fetch_array($cari_kd);
			$jml_search5a=$tm_cari['tot'];
		// ----- 6. Irigasi --------
			$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbirigasi WHERE nama_irigasi like '%$txtsearch%' and kode='$kd_kel'");
			$tm_cari=mysqli_fetch_array($cari_kd);
			$jml_search6a=$tm_cari['tot'];

	// ----- 7. Potensi Bahan Galian --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(tbpertambangan.id) as tot 
												FROM tbpertambangan, tbjenis_tambang 
												WHERE tbpertambangan.kd_tambang=tbjenis_tambang.kode and 
												tbjenis_tambang.nama like '%$txtsearch%' and tbpertambangan.kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search7a=$tm_cari['tot'];

	// ----- 8. Energi --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbenergi WHERE jenis_energi like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search8a=$tm_cari['tot'];

	// ----- 9. Sayuran --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(tbpertanian.id) as tot 
						FROM tbpertanian, tbjenis_tanaman 
						WHERE tbpertanian.kd_tumbuhan=tbjenis_tanaman.kode and 
						tbjenis_tanaman.kelompok='Tanaman Sayuran' and 
						tbpertanian.kode='$kd_kel' and 
						tbjenis_tanaman.nama like '%$txtsearch%'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search9a=$tm_cari['tot'];

	// ----- 10. Biofarmeka --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(tbpertanian.id) as tot 
						FROM tbpertanian, tbjenis_tanaman 
						WHERE tbpertanian.kd_tumbuhan=tbjenis_tanaman.kode and 
						tbjenis_tanaman.kelompok='Tanaman Obat' and 
						tbpertanian.kode='$kd_kel' and 
						tbjenis_tanaman.nama like '%$txtsearch%'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search10a=$tm_cari['tot'];

	// ----- 11. Buah --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(tbpertanian.id) as tot 
						FROM tbpertanian, tbjenis_tanaman 
						WHERE tbpertanian.kd_tumbuhan=tbjenis_tanaman.kode and 
						tbjenis_tanaman.kelompok='Buah' and 
						tbpertanian.kode='$kd_kel' and 
						tbjenis_tanaman.nama like '%$txtsearch%'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search11a=$tm_cari['tot'];

	// ----- 12. Kebun --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(tbpertanian.id) as tot 
						FROM tbpertanian, tbjenis_tanaman 
						WHERE tbpertanian.kd_tumbuhan=tbjenis_tanaman.kode and 
						tbjenis_tanaman.kelompok='Tanaman Perkebunan' and 
						tbpertanian.kode='$kd_kel' and 
						tbjenis_tanaman.nama like '%$txtsearch%'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search12a=$tm_cari['tot'];

	// ----- 13. Pangan --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(tbpertanian.id) as tot 
						FROM tbpertanian, tbjenis_tanaman 
						WHERE tbpertanian.kd_tumbuhan=tbjenis_tanaman.kode and 
						tbjenis_tanaman.kelompok='Tanaman Palawija' and 
						tbpertanian.kode='$kd_kel' and 
						tbjenis_tanaman.nama like '%$txtsearch%'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search13a=$tm_cari['tot'];

	// ----- 14. Ternak --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(tbpeternakan.id) as tot 
						FROM tbpeternakan, tbjenis_ternak 
						WHERE tbpeternakan.kd_ternak=tbjenis_ternak.kode and 
						tbpeternakan.kode='$kd_kel' and 
						tbjenis_ternak.nama like '%$txtsearch%'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search14a=$tm_cari['tot'];

	// ----- 15. Ikan --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(tbperikanan.id) as tot 
						FROM tbperikanan, tbjenis_ikan 
						WHERE tbperikanan.kd_ikan=tbjenis_ikan.kode 
						and tbjenis_ikan.nama like '%$txtsearch%' and tbperikanan.kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search15a=$tm_cari['tot'];

	// ----- 16. Ikan Usaha --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(tbperikanan_cabang.id) as tot 
						FROM tbperikanan_cabang, tbcabang_ikan 
						WHERE tbperikanan_cabang.kd_cabang=tbcabang_ikan.kode and 
						tbcabang_ikan.nama like '%$txtsearch%' and tbperikanan_cabang.kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search16a=$tm_cari['tot'];

	// ----- 17. Pariwisata --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbpariwisata WHERE nama_wisata like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search17a=$tm_cari['tot'];

	// ----- 18. Tpa --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbtpa WHERE nm_tpa like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search18a=$tm_cari['tot'];

	// ----- 19. Tps --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbtps WHERE nm_tps like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search19a=$tm_cari['tot'];

	// ----- 20. Timbulan Sampah --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(tbtimbulan.id) as tot 
						FROM tbtimbulan, tbtimbulan_sumber 
						WHERE 
						tbtimbulan.id_sumber=tbtimbulan_sumber.id and 
						tbtimbulan.kode='$kd_kel' and tbtimbulan_sumber.sumber like '%$txtsearch%'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search20a=$tm_cari['tot'];

	// ----- 21. Pengelolaan Sampah --------
		$cari_kd=mysqli_query($koneksi,"SELECT count(id) as tot FROM tbpengelolaan_sampah WHERE nama like '%$txtsearch%' and kode='$kd_kel'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$jml_search21a=$tm_cari['tot'];


		$jml_search=($jml_search1+$jml_search5+$jml_search6+$jml_search7+$jml_search8+$jml_search9+$jml_search10+$jml_search11)
				+($jml_search1a+$jml_search2a+$jml_search3a+$jml_search4a+$jml_search5a+$jml_search6a
				+$jml_search7a+$jml_search8a+$jml_search9a+$jml_search10a+$jml_search11a+$jml_search12a
				+$jml_search13a+$jml_search14a+$jml_search15a+$jml_search16a+$jml_search17a+$jml_search18a
				+$jml_search19a+$jml_search20a+$jml_search21a);
		$sql_search="Hasil pencarian dengan kata kunci '$txtsearch' ditemukan ".$jml_search." data.";
	}
	
?>


<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title><?php include "titel.php"; ?></title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="dist/css/app.css" />
        <!-- END: CSS Assets-->

		<script src="assets/js/highcharts.js"></script>
<script src="assets/js/jquery-1.10.1.min.js"></script>
<script>
		var chart; 
		$(document).ready(function() {
			  chart = new Highcharts.Chart(
			  {
				  
				 chart: {
					renderTo: 'mygraph',
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false
				 },   
				 title: {
					text: 'Grafik Jumlah Penduduk Laki-Laki dan Perempuan '
				 },
				 tooltip: {
					formatter: function() {
						return '<b>'+
						this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ';
					}
				 },
				 
				
				 plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							color: '#000000',
							connectorColor: 'green',
							formatter: function() 
							{
								return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) +' % ';
							}
						}
					}
				 },
       
					series: [{
					type: 'pie',
					name: 'Browser share',
					data: [
					<?php
					    include "connection.php";
						$query = mysqli_query($con,"SELECT jk from view_penduduk1 where kode='$id'");
					 
						while ($row = mysqli_fetch_array($query)) {
							$browsername = $row['jk'];
						 
							$data = mysqli_fetch_array(mysqli_query($con,"SELECT total from view_penduduk1 where jk='$browsername' and kode='$id'"));
							$jumlah = $data['total'];
							?>
							[ 
								'<?php echo $browsername ?>', <?php echo $jumlah; ?>
							],
							<?php
						}
						?>
			 
					]
				}]
			  });
		});	
	</script>
    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->

        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->

<?php include "menu_dashboard.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="index.php" class="breadcrumb--active">Dashboard</a> </div>
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Search -->
                    <div class="intro-x relative mr-3 sm:mr-6">

			<form action="" method="post">
	                        <div class="search hidden sm:block">
	                            <input type="text" class="search__input input placeholder-theme-13" id="txtsearch" name="txtsearch" placeholder="Search..." autocomplete="off">
	                            <button type="submit" class="cart-button" id="btnsearch" name="btnsearch"><i data-feather="search" class="search__icon"></i></button>
					 
	                        </div>
	                        <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon"></i> </a>
				
                  	</form>
                    </div>
                    <!-- END: Search -->
                    <!-- BEGIN: Notifications -->

                    <!-- END: Notifications -->
                    <!-- BEGIN: Account Menu -->
                    <div class="intro-x dropdown w-8 h-8 relative">
                        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                            <img alt="User Profil" src="<?php echo $file_photo; ?>">
                        </div>
                        <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20">
                            <div class="dropdown-box__content box bg-theme-38 text-white">
                                <div class="p-4 border-b border-theme-40">
                                    <div class="font-medium"><?php echo $nm_user; ?></div>
                                    <div class="text-xs text-theme-41">Tamu Desa</div>
                                </div>
                                <div class="p-2">
                                    <a href="profile.php" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                    <a href="change_pwd.php" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Change Password </a>
                                </div>
                                <div class="p-2 border-t border-theme-40">
                                    <a href="logout.php" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Account Menu -->
                </div>
                <!-- END: Top Bar -->

                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">

                        <div class="col-span-12 xl:col-span-12 mt-6">
							<?php
								if($jml_search==0) {
							?>
							<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> 
							<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> Data Tidak Ditemukan! </div>										
							<?php
								} else {
							?>
							<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-1 text-white"> 
							<i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> <?php echo $sql_search; ?> </div>
							<?php 
								}
							?>

						
						<?php
								if($jml_search<>0) {
						?>

                            <div class="mt-5">
								<div class="box p-5 mt-5">

									<!-- BEGIN: Cek Pengaduan -->
										<?php
											if($jml_search1<>0) {
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Pengaduan Masyarakat :  <?php echo $jml_search1; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="pengaduan-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek Pengaduan -->

									

									<!-- BEGIN: Cek Lembaga -->
										<?php
											if($jml_search5<>0) {		
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Lembaga Desa :  <?php echo $jml_search5; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="lembaga-daftar-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek Lembaga -->

									<!-- BEGIN: Cek Program -->
										<?php
											if($jml_search6<>0) {		
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Program Desa :  <?php echo $jml_search6; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="program-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek Program -->

									<!-- BEGIN: Cek Dukuh -->
										<?php
											if($jml_search7<>0) {		
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Dukuh/Dusun :  <?php echo $jml_search7; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="dukuh-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek Dukuh -->

									<!-- BEGIN: Cek Pengurus RT -->
										<?php
											if($jml_search8<>0) {		
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Pengurus RT :  <?php echo $jml_search8; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="pengurus-rt-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek Pengurus RT -->

									<!-- BEGIN: Cek Perangkat Desa -->
										<?php
											if($jml_search9<>0) {		
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Perangkat Desa :  <?php echo $jml_search9; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="perangkat-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek Perangkat Desa -->

									<!-- BEGIN: Cek Prestasi Desa -->
										<?php
											if($jml_search10<>0) {		
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Prestasi Desa :  <?php echo $jml_search10; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="prestasi-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek Prestasi Desa -->

									<!-- BEGIN: Cek Tracking  Covid -->
										<?php
											if($jml_search11<>0) {		
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Tracking Covid :  <?php echo $jml_search11; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="covid-tracking-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek Tracking  Covid -->

									







									

									<!-- BEGIN: Cek Sungai -->
										<?php
											if($jml_search1a<>0) {
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Sungai :  <?php echo $jml_search1a; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="sungai-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek Sungai -->
									
									<!-- BEGIN: Cek Danau -->
										<?php
											if($jml_search2a<>0) {
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Danau :  <?php echo $jml_search2a; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="danau-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek Sungai -->									
									
									<!-- BEGIN: Cek Rawa -->
										<?php
											if($jml_search3a<>0) {
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Rawa :  <?php echo $jml_search3a; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="rawa-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek Rawa -->
									
									<!-- BEGIN: Cek Mata Air -->
										<?php
											if($jml_search4a<>0) {
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Mata Air :  <?php echo $jml_search4a; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="mataair-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek Mata Air -->

									<!-- BEGIN: Cek Bendungan/Waduk -->
										<?php
											if($jml_search5a<>0) {
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Bendungan/Waduk :  <?php echo $jml_search5a; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="bendungan-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek Bendungan/Waduk -->

									<!-- BEGIN: Cek irigasi -->
										<?php
											if($jml_search6a<>0) {
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Irigasi :  <?php echo $jml_search6a; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="irigasi-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek irigasi -->










									<!-- BEGIN: Cek irigasi -->
										<?php
											if($jml_search7a<>0) {
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Pertambangan :  <?php echo $jml_search7a; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="pertambangan-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek irigasi -->

									<!-- BEGIN: Cek irigasi -->
										<?php
											if($jml_search8a<>0) {
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Energi Terbarukan :  <?php echo $jml_search8a; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="energi-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek irigasi -->

									<!-- BEGIN: Cek irigasi -->
										<?php
											if($jml_search9a<>0) {
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Potensi Sayuran :  <?php echo $jml_search9a; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="sayuran-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek irigasi -->

									<!-- BEGIN: Cek irigasi -->
										<?php
											if($jml_search10a<>0) {
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Potensi Biofarmeka :  <?php echo $jml_search10a; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="biofarmeka-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek irigasi -->

									<!-- BEGIN: Cek irigasi -->
										<?php
											if($jml_search11a<>0) {
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Potensi Buah :  <?php echo $jml_search11a; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="buah-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek irigasi -->

									<!-- BEGIN: Cek irigasi -->
										<?php
											if($jml_search12a<>0) {
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Potensi Perkebunan :  <?php echo $jml_search12a; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="perkebunan-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek irigasi -->

									<!-- BEGIN: Cek irigasi -->
										<?php
											if($jml_search13a<>0) {
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Potensi Pangan :  <?php echo $jml_search13a; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="pangan-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek irigasi -->

									<!-- BEGIN: Cek irigasi -->
										<?php
											if($jml_search14a<>0) {
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Potensi Peternakan :  <?php echo $jml_search14a; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="peternakan-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek irigasi -->

									<!-- BEGIN: Cek irigasi -->
										<?php
											if($jml_search15a<>0) {
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Perikanan :  <?php echo $jml_search15a; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="perikanan-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek irigasi -->

									<!-- BEGIN: Cek irigasi -->
										<?php
											if($jml_search16a<>0) {
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Cabang Usaha Perikanan :  <?php echo $jml_search16a; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="perikanan-cabang-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek irigasi -->

									<!-- BEGIN: Cek irigasi -->
										<?php
											if($jml_search17a<>0) {
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Pariwisata :  <?php echo $jml_search17a; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="pariwisata-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek irigasi -->

									<!-- BEGIN: Cek irigasi -->
										<?php
											if($jml_search18a<>0) {
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="check" class="w-6 h-6 mr-2"></i> TPA :  <?php echo $jml_search18a; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="tpa-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek irigasi -->

									<!-- BEGIN: Cek irigasi -->
										<?php
											if($jml_search19a<>0) {
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="check" class="w-6 h-6 mr-2"></i> TPS :  <?php echo $jml_search19a; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="tps-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek irigasi -->

									<!-- BEGIN: Cek irigasi -->
										<?php
											if($jml_search20a<>0) {
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Timbulan Sampah :  <?php echo $jml_search20a; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="sampah-timbulan-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek irigasi -->

									<!-- BEGIN: Cek irigasi -->
										<?php
											if($jml_search21a<>0) {
										?>
										<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="check" class="w-6 h-6 mr-2"></i> Pengelolaan Sampah :  <?php echo $jml_search21a; ?> data ditemukan 
											&nbsp;&nbsp;&nbsp;<a href="sampah-pengelolaan-search.php?varsearch=<?php echo $txtsearch; ?>"> <i data-feather="eye" class="w-4 h-4 ml-auto"></i></a> 
										</div>	
										<?php 
											}
										?>	
									<!-- END: Cek irigasi -->
									
								</div>
                            </div>
                        </div>
						<?php 
							}
						?>
                    </div>
                </div>
            </div>
            <!-- END: Content -->
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="dist/js/app.js"></script>
		<script src="assets/js/highcharts.js"></script>
<script src="assets/js/jquery-1.10.1.min.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>

<?php
	}
?>
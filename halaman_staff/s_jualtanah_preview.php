<?php
	session_start();
	$kd_kel=$_SESSION['kodewil'];
	include "config/koneksi.php";

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
	
// === Data Pihak 1 ===========
	$nama=$_GET['txt8'];	
	$umur=$_GET['txt9'];
	$kd_pekerjaan=$_GET['txt10'];
	$alamat=$_GET['txt11'];	
		
// === Data Pihak 2 ===========
	$nama1=$_GET['txt12'];	
	$umur1=$_GET['txt13'];	
	$kd_pekerjaan1=$_GET['txt14'];
	$alamat1=$_GET['txt15'];	

	$fld_hak=$_GET['txt23'];	
	$fld_noserti=$_GET['txt24'];
	$fld_alamatserti=$_GET['txt25'];	
	$fld_hibah1=$_GET['txt26'];
	$fld_hibah2=$_GET['txt27'];	
	$fld_hibah3=$_GET['txt28'];
	$fld_batas1=$_GET['txt29'];	
	$fld_batas2=$_GET['txt30'];		
	$fld_batas3=$_GET['txt31'];	
	$fld_batas4=$_GET['txt32'];	

	$fld_harga=$_GET['txt16'];
	$fld_total=$_GET['txt17'];
	$fld_jbayar=$_GET['txt18'];
	$fld_durasi=$_GET['txt19'];
	$fld_durasi_pilih=$_GET['txt20'];			

		
// === Data Saksi I ===========	
	$nama_saksi1=$_GET['txt39'];
	$tempatlhr_saksi1=$_GET['txt40'];	
	$tanggal_lahirsaksi1="";
	$id_pekerjaan_saksi1=$_GET['txt41'];	
	$alamat_saksi1=$_GET['txt42'];		
	$hub_saksi1=$_GET['txt43'];	
	
// === Data Saksi II ===========	
	$nama_saksi2=$_GET['txt44'];
	$tempatlhr_saksi2=$_GET['txt45'];	
	$tanggal_lahirsaksi2="";
	$id_pekerjaan_saksi2=$_GET['txt46'];	
	$alamat_saksi2=$_GET['txt47'];		
	$hub_saksi2=$_GET['txt48'];		

// ========= Data Tanah ============
		
	
	$fld_penyelesaian=$_GET['txt49'];

	$fld_dp=$_GET['txt33'];
	$besar_dp=($fld_dp/100)*$fld_total;

	$tanggal_dp=$_GET['txt2'];
	$tgldp=substr($tanggal_dp,3,2);	
	$blndp=substr($tanggal_dp,0,2);
	$thndp=substr($tanggal_dp,6,4);		

		if($blndp=='01') {
			$ket_bln_dp="Januari";
		}	
		
	
	$tgl_skr=date('d');
		$bln_skr=date('m');
		$thn_skr=date('Y');
		if($bln_skr=='1') {
			$bln_rome="I";
			$ket_bln="Januari";
		}
		if($bln_skr=='2') {
			$bln_rome="II";
			$ket_bln="Pebruari";
		}
		if($bln_skr=='3') {
			$bln_rome="III";
			$ket_bln="Maret";			
		}
		if($bln_skr=='4') {
			$bln_rome="IV";
			$ket_bln="April";
		}
		if($bln_skr=='5') {
			$bln_rome="V";
			$ket_bln="Mei";
		}
		if($bln_skr=='6') {
			$bln_rome="VI";
			$ket_bln="Juni";			
		}
		if($bln_skr=='7') {
			$bln_rome="VII";
			$ket_bln="Juli";			
		}
		if($bln_skr=='8') {
			$bln_rome="VIII";
			$ket_bln="Agustus";			
		}
		if($bln_skr=='9') {
			$bln_rome="IX";
			$ket_bln="September";
		}
		if($bln_skr=='10') {
			$bln_rome="X";
			$ket_bln="Oktober";
		}
		if($bln_skr=='11') {
			$bln_rome="XI";
			$ket_bln="Nopember";
		}
		if($bln_skr=='12') {
			$bln_rome="XII";
			$ket_bln="Desember";
		}

		$cari_kd=mysqli_query($koneksi,"SELECT no_pengaturan 
						FROM tbpengaturan_surat WHERE id_kel='$kd_kel' and id_kategori='5'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$no_pengaturan=$tm_cari['no_pengaturan'];
		
		$cari_kd=mysqli_query($koneksi,"SELECT count(nomor_surat) as total 
						FROM tbbuatsurat WHERE id_kel='$kd_kel' and id_kategori='5' and 
						month(tgl_surat)='$bln_skr' and year(tgl_surat)='$thn_skr'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$total=$tm_cari['total'];
		$nourut=$total+1;

		$no_surat = $nourut."/".$nourut."/".$no_pengaturan."/".$bln_rome."/".$thn_skr;	
		$tgl_surat=$tgl_skr." ".$ket_bln." ".$thn_skr;		
	

									
// === Master Data ===========														
	$cari_kd=mysqli_query($koneksi,"select pekerjaan FROM tbpekerjaan where kode='$kd_pekerjaan'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$pekerjaan=$tm_cari['pekerjaan'];													
	
	$cari_kd=mysqli_query($koneksi,"select pekerjaan FROM tbpekerjaan where kode='$kd_pekerjaan1'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$pekerjaan1=$tm_cari['pekerjaan'];		

	$cari_kd=mysqli_query($koneksi,"select pekerjaan FROM tbpekerjaan where kode='$id_pekerjaan_saksi1'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$pekerjaan_saksi1=$tm_cari['pekerjaan'];

	$cari_kd=mysqli_query($koneksi,"select pekerjaan FROM tbpekerjaan where kode='$id_pekerjaan_saksi2'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$pekerjaan_saksi2=$tm_cari['pekerjaan'];	
	
// === Header ==============									
	$cari_kd=mysqli_query($koneksi,"SELECT 
									id, alamat, tempat, jabatan, nama, nip, logo_surat, 
									nm_kab, nm_kec, nm_kel 
									FROM tbpengaturan_surat 
									WHERE id_kel='$kd_kel' and id_kategori='5'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$alamat_surat=$tm_cari['alamat'];
	$logo_surat=$tm_cari['logo_surat'];
	$tempat_surat=$tm_cari['tempat'];	
	$jabatan=$tm_cari['jabatan'];
	$nama_jwb=$tm_cari['nama'];
	$nip_jwb=$tm_cari['nip'];
	
	$fld_nama_kab=$tm_cari['nm_kab'];
	$fld_nama_kec=$tm_cari['nm_kec'];
	$fld_nama_kel=$tm_cari['nm_kel'];
	
	$dot = '.............................';
	
	require_once("dompdf/autoload.inc.php");
	use Dompdf\Dompdf;
	$dompdf = new Dompdf();

	$html = '<head>
				<style>
					html, body {
						font-family: Arial, Helvetica, sans-serif;
					}
					table.table, table.table td, table.table th {
						border: 1px solid black;
					}

					table.table {
						width: 100%;
						border-collapse: collapse;
					}

					sup {
						font-size: 8;
					}
				</style>	
			</head>
			<body>
			<div style="margin-top: -20pt; padding: 10pt; overflow: none; text-align: justify;">
			<div style="position: absolute; top: -5pt; left: 5pt;">
				<img src="'.$logo_surat.'" width="80pt">
			</div>
			<div style="text-align: center; border-bottom: 3pt double black; padding: 10pt 0;">
				<div style="font-weight: bold;">'.$fld_nama_kab.'</div>
				<div style="font-weight: bold;">'.$fld_nama_kec.'</div>
				<div style="font-weight: bold;">'.$fld_nama_kel.'</div>
				<div>'.$alamat_surat.'</div>
			</div>
			<div style="text-align: center; margin: 30pt 0;">
				<div style="text-decoration: underline; font-weight: bold;">SURAT KETERANGAN JUAL TANAH </div>		
				<div>'.$no_surat.'</div>				
			</div>

        <!-- Begin : Isi Surat -->
        <div style="margin-top: 30pt;">Yang bertanda tangan di bawah ini  : </div>
        <table style="margin: 10pt 0 10pt 30pt; width: 100%;">
            <tbody>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;">I.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Nama</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$nama.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;"></td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Umur</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$umur.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;"></td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Pekerjaan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$pekerjaan.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;"></td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Alamat</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$alamat.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;"></td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;" colspan="3">Dalam hal ini bertindak atas nama diri pribadi yang selanjutnya disebut sebagai <b>Pihak Pertama (Penjual)</b></td>
                </tr>

                <tr>
                    <td style="padding-top: 10pt;" colspan="4"></td>
                </tr>

                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;">II.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Nama</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$nama1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;"></td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Umur</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$umur1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;"></td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Pekerjaan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$pekerjaan1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;"></td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Alamat</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$alamat1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;"></td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;" colspan="3">Dalam hal ini bertindak atas nama diri pribadi yang selanjutnya disebut sebagai <b>Pihak Kedua (Pembeli)</b></td>
                </tr>
            </tbody>
        </table>
        <!-- End : Isi Surat -->

        <!-- Catatan Surat -->
        <div style="text-indent: 40px; margin-top: 10pt;">
            <span>
                Pada hari ini '.$tgl_skr.' bulan '.$ket_bln.' tahun '.$thn_skr.', 
				Pihak pertama dengan ini berjanji untuk menyatakan dan mengikatkan diri untuk menjual kepada pihak kedua 
				dan pihak kedua juga berjanji menyatakan serta mengikatkan diri untuk membeli dari pihak pertama berupa :
            </span>
        </div>
        <div style="margin-top: 10pt;">
            <b>Sebidang Tanah</b> dengan <b>Hak '.$fld_hak.'</b> yang diuraikan dalam 
			<b>nomor sertifikat tanah</b> : '.$fld_noserti.', 
			yang berlokasi di <b>alamat lengkap</b> '.$fld_alamatserti.', 
			dengan ukuran tanah: <b>panjang</b> '.$fld_hibah1.' m (meter), 
			<b>lebar</b> '.$fld_hibah2.' m  (meter), 
			<b>luas tanah</b> '.$fld_hibah3.' m<sup>2</sup> (meter persegi), 
			dan untuk selanjutnya disebut Tanah. Dengan batas-batas tanah adalah sebagai berikut :
        </div>
        <div style="margin-top: 10pt;">
            Adapun batas-batasnya sebagai berikut:
            <ul>
                <li>Sebelah Timur berbatasan dengan '.$fld_batas1.'</li>
                <li>Sebelah Barat berbatasan dengan '.$fld_batas2.'</li>
                <li>Sebelah Utara berbatasan dengan '.$fld_batas3.'</li>
                <li>Sebelah Selatan berbatasan dengan '.$fld_batas4.'</li>
            </ul>
        </div>
        <div style="margin-top: 10pt;">
            Kedua belah pihak bersepakat untuk mengadakan ikatan perjanjian jual – beli Tanah dimana syarat dan ketentuannya diatur dalam 10 (sepuluh) pasal, seperti berikut di bawah ini :
        </div>

        <div style="page-break-after: always;"></div>
        <!-- Pasal 1 -->
        <div style="text-align: center;">
            <div style="font-weight: bold;">Pasal 1</div>
            <div style="font-weight: bold;">HARGA DAN CARA PEMBAYARAN</div>
        </div>			
        <div style="margin-top: 10pt;">
            Jual beli tanah tersebut dilakukan dan disetujui oleh masing-masing pihak dengan <b>harga per meter persegi</b>
            '.number_format($fld_harga,0).' atau jumlah uang terbilang (  rupiah), sehingga <b>keseluruhan harga tanah</b> tersebut adalah :
            '.number_format($fld_total,0).' atau jumlah uang terbilang (  rupiah), dan 
			akan dibayarkan Pihak Kedua kepada Pihak Pertama secara ( <b>'.$fld_jbayar.'</b> ) 
			selambat-lambatnya '.$fld_durasi.' (  ) '.$fld_durasi_pilih.' setelah ditandatanganinya surat perjanjian ini.
        </div>

        <!-- Pasal 2 -->
        <div style="text-align: center; margin-top: 30pt;">
            <div style="font-weight: bold;">Pasal 2</div>
            <div style="font-weight: bold;">BESARNYA UANG MUKA DAN UANG CICILAN</div>
        </div>
        <div style="margin-top: 10pt;">
            Besarnya uang cicilan untuk selama waktu sebagaimana tercantum dalam pasal 1 tersebut di atas, adalah sebagai berikut:
        </div>
        <table style="margin: 10pt 0 10pt 30pt; width: 100%;">
            <tbody>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;">1.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 96%; text-align: justify;">
                        Uang muka atau DP (Down Payment) sebesar '.number_format($fld_dp,0).' % (  persen ) 
						dari keseluruhan harga tanah yang disepakati sesuai 
						pasal 1. Jumlah total uang muka yang akan diberikan adalah sebesar '.number_format($besar_dp,0).' (  rupiah ) 
						dan akan diberikan Pihak Kedua kepada Pihak Pertama selambat-lambatnya 
						pada Tanggal '.$tgldp.' Bulan '.$ket_bln_dp.' Tahun '.$thndp.' (  ) setelah penandatanganan Surat perjanjian ini.
                    </td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;">2.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 96%; text-align: justify;">
                        Lama jangka waktu cicilan adalah . 
						Cicilan dibayar per tanggal  (  ) setiap bulannya 
						secara (  )  ke Pihak Pertama. 
                    </td>
                </tr>			
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;">3.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 96%; text-align: justify;">
                        Cicilan Pertama sebesar  (  rupiah ) akan dibayarkan Pihak Kedua kepada Pihak Pertama 
						selambat-lambatnya pada Tanggal  (  ) Bulan  Tahun  (  )
                    </td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;">4.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 96%; text-align: justify;">
                        Cicilan Terakhir sebesar  (  rupiah ) akan dibayarkan Pihak Kedua kepada Pihak Pertama selambat-lambatnya 
						pada Tanggal  (  ) Bulan  Tahun  (  )
                    </td>
                </tr>
            </tbody>
        </table>

        <div style="page-break-after: always;"></div>
        <!-- Pasal 3 -->
        <div style="text-align: center;">
            <div style="font-weight: bold;">Pasal 3</div>
            <div style="font-weight: bold;">JAMINAN DAN SAKSI</div>
        </div>
        <div style="margin-top: 10pt;">
            Pihak Pertama menjamin sepenuhnya bahwa Tanah yang dijualnya adalah milik sah atau hak pihak pertama sendiri dan tidak ada orang atau pihak lain yang turut mempunyai hak, bebas dari sitaan, tidak tersangkut dalam suatu perkara atau sengketa, hak kepemilikannya tidak sedang dipindahkan atau sedang dijaminkan kepada orang atau pihak lain dengan cara bagaimanapun juga, dan tidak sedang atau telah dijual kepada orang atau pihak lain.
        </div>
        <div style="margin-top: 10pt;">
            Jaminan pihak pertama dikuatkan oleh dua orang yang turut menandatangani Surat Perjanjian ini selaku saksi.
        </div>
        <div style="margin-top: 10pt;">
            Kedua orang saksi tersebut adalah :
        </div>
        <table style="margin: 10pt 0 10pt 30pt; width: 100%;">
            <tbody>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;">1.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Nama</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$nama_saksi1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;"></td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Tempat, Tanggal Lahir</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$tempatlhr_saksi1.', '.$tanggal_lahirsaksi1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;"></td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Pekerjaan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$pekerjaan_saksi1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;"></td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Alamat</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$alamat_saksi1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;"></td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Hubungan Kekerabatan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$hub_saksi1.'</td>
                </tr>

                <tr>
                    <td style="padding-top: 10pt;" colspan="4"></td>
                </tr>

                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;" colspan="4">Selanjutnya disebut sebagai <b>Saksi I</b></td>
                </tr>

                <tr>
                    <td style="padding-top: 10pt;" colspan="4"></td>
                </tr>

                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;">2.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Nama</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$nama_saksi2.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;"></td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Tempat, Tanggal Lahir</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$tempatlhr_saksi2.', '.$tanggal_lahirsaksi2.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;"></td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Pekerjaan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$pekerjaan_saksi2.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;"></td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Alamat</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$alamat_saksi2.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;"></td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;">Hubungan Kekerabatan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$hub_saksi2.'</td>
                </tr>

                <tr>
                    <td style="padding-top: 10pt;" colspan="4"></td>
                </tr>

                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 30%;" colspan="4">Selanjutnya disebut sebagai <b>Saksi II</b></td>
                </tr>
            </tbody>
        </table>

        <!-- Pasal 4 -->
        <div style="text-align: center; margin-top: 30pt;">
            <div style="font-weight: bold;">Pasal 4</div>
            <div style="font-weight: bold;">PENYERAHAN TANAH</div>
        </div>
        <div style="margin-top: 10pt;">
            Pihak pertama berjanji serta mengikatkan diri untuk menyerahkan sertifikat tanah kepada pihak kedua 
			selambat-lambatnya  (  )  
			setelah pihak kedua melunasi seluruh pembayarannya.
        </div>

        <!-- Pasal 5 -->
        <div style="text-align: center; margin-top: 30pt;">
            <div style="font-weight: bold;">Pasal 5</div>
            <div style="font-weight: bold;">STATUS KEPEMILIKAN</div>
        </div>
        <div style="margin-top: 10pt;">
            Sejak ditandatanganinya Surat Perjanjian ini maka tanah tersebut di atas beserta segala keuntungan maupun kerugiannya beralih dari Pihak Pertama kepada Pihak Kedua dengan demikian hak kepemilikan tanah tersebut sepenuhnya menjadi hak milik Pihak Kedua.
        </div>

        <div style="page-break-after: always;"></div>

        <!-- Pasal 6 -->
        <div style="text-align: center; margin-top: 30pt;">
            <div style="font-weight: bold;">Pasal 6</div>
            <div style="font-weight: bold;">PEMBALIKNAMAAN KEPEMILIKAN</div>
        </div>
        <table style="margin: 10pt 0 10pt 30pt; width: 100%;">
            <tbody>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;">1.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 96%; text-align: justify;">
                        Pihak pertama wajib membantu  pihak kedua dalam proses pembaliknamaan atas kepemilikan hak tanah dan bangunan rumah tersebut dalam hal pengurusan yang menyangkut instansi-instansi terkait, memberikan keterangan-keterangan serta menandatangani surat-surat yang bersangkutan serta melakukan segala hak yang ada hubungannya dengan pembaliknamaan serta perpindahan hak dari Pihak Pertama kepada Pihak Kedua.
                    </td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;">2.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 96%; text-align: justify;">
                        Segala macam biaya yang berhubungan dengan balik nama atas tanah dari Pihak Pertama kepada Pihak Kedua dibebankan sepenuhnya kepada Pihak Kedua.
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Pasal 7 -->
        <div style="text-align: center; margin-top: 30pt;">
            <div style="font-weight: bold;">Pasal 7</div>
            <div style="font-weight: bold;">PAJAK, IURAN, DAN PUNGUTAN</div>
        </div>
        <div style="margin-top: 10pt;">
            Kedua belah pihak bersepakat bahwa segala macam pajak, iuran, dan pungutan uang yang berhubungan dengan tanah di atas:
        </div>
        <table style="margin: 10pt 0 10pt 30pt; width: 100%;">
            <tbody>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;">1.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 96%; text-align: justify;">
                        Sejak sebelum hingga waktu ditandatanganinya perjanjian ini masih menjadi kewajiban dan tanggung jawab Pihak Pertama.
                    </td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;">2.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 96%; text-align: justify;">
                        Setelah ditandatanganinya perjanjian ini dan seterusnya menjadi kewajiban dan tanggung jawab Pihak Kedua.
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Pasal 8 -->
        <div style="text-align: center; margin-top: 30pt;">
            <div style="font-weight: bold;">Pasal 8</div>
            <div style="font-weight: bold;">MASA BERLAKUNYA PERJANJIAN</div>
        </div>
        <div style="margin-top: 10pt;">
            Perjanjian ini tidak berakhir karena meninggal dunianya pihak pertama, atau karena sebab apapun juga. Dalam keadaan demikian maka para ahli waris atau pengganti pihak pertama wajib mentaati ketentuan yang tertulis dalam perjanjian ini dan pihak pertama mengikat diri untuk melakukan segala apa yang perlu guna melaksanakan ketentuan ini.
        </div>

        <!-- Pasal 9 -->
        <div style="text-align: center; margin-top: 30pt;">
            <div style="font-weight: bold;">Pasal 9</div>
            <div style="font-weight: bold;">HAL-HAL LAIN</div>
        </div>
        <div style="margin-top: 10pt;">
            Hal-hal yang belum tercantum dalam perjanjian ini akan dibicarakan serta diselesaikan secara kekeluargaan melalui jalan musyawarah untuk mufakat oleh kedua belah pihak.
        </div>

        <div style="page-break-after: always;"></div>
        <!-- Pasal 10 -->
        <div style="text-align: center; margin-top: 30pt;">
            <div style="font-weight: bold;">Pasal 10</div>
            <div style="font-weight: bold;">PENYELESAIAN PERSELISIHAN</div>
        </div>
        <div style="margin-top: 10pt;">
            Apabila terjadi perselisihan dan tidak bisa diselesaikan secara kekeluargaan atau mufakat maka kedua belah pihak telah sepakat memilih menyelesaikan perkara secara hukum. Tentang perjanjian ini dan segala akibatnya, kedua belah pihak memilih menyelesaikan perkara di '.$fld_penyelesaian.'.
        </div>

        <div style="margin-top: 30pt;">
            Demikianlah Surat Perjanjan ini dibuat dan ditandatangani kedua belah pihak 
			di '.$alamat_surat.' pada Hari ? Tanggal  (  ) Bulan  Tahun  (  ), 
			dalam keadaan sadar serta tanpa adanya paksaan atau tekanan dari pihak manapun.
        </div>

		
		'.$dot.'
<!-- Tanda Tangan Pihak 1 dan Pihak 2 -->
<div style="margin-top: 10pt; position: relative;">
    <!-- Pihak Pertama -->
    <div style="width: 200pt; text-align: center; margin-top: 30pt; position: absolute; left: 0;">
        <div style="font-weight: bold;">PIHAK PERTAMA,</div>
        <div style="margin-top: 65pt;">( '.$nama.' )</div>
    </div>

    <!-- Pihak Kedua -->
    <div style="width: 200pt; text-align: center; margin-top: 0; position: absolute; right: 0;">
        <div style="font-weight: bold;">PIHAK KEDUA,</div>
        <div style="margin-top: 65pt;">( '.$nama1.' )</div>
    </div>
</div>


<!-- Saksi - saksi -->
<div style="top: 160pt; position: relative;">
    <div><b><u>Saksi - Saksi :</u></b></div>
    <!-- Saksi Pertama -->
    <div style="width: 200pt; text-align: center; margin-top: 30pt; position: absolute; left: 0;">
        <div style="font-weight: bold;">SAKSI PERTAMA,</div>
        <div style="margin-top: 65pt;">( '.$nama_saksi1.' )</div>
    </div>

    <!-- Saksi Kedua -->
    <div style="width: 200pt; text-align: center; margin-top: 0; position: absolute; right: 0;">
        <div style="font-weight: bold;">SAKSI KEDUA,</div>
        <div style="margin-top: 65pt;">( '.$nama_saksi2.' )</div>
    </div>
</div>

<!-- Mengetahui -->
<div style="top: 280pt; position: relative; text-align: center;">
    <div style="font-weight: bold;">Mengetahui</div>
    <div style="font-weight: bold;">'.$jabatan.'</div>
    <div style="margin-top: 65pt;"><u>'.$nama_jwb.'</u></div>
    <div>'.$nip_jwb.'</div>
</div>

';

$html .= "</div></body></html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
//$dompdf->stream('surat_keterangan_jualtanah.pdf');
$dompdf->stream('surat_pengantar_jualtanah.pdf',array("Attachment"=>0));
?>

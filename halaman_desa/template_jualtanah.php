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
	
	$no_surat = $_GET['id'];	
	$cari_kd=mysqli_query($koneksi,"SELECT 
									DATE_FORMAT(tgl_surat,'%d %M %Y') AS tanggal_surat, title_surat, 
									nama, kd_pekerjaan, alamat, fld_umur1,  
									nama1, kd_pekerjaan1, alamat1, fld_umur2,
									DATE_FORMAT(tgl_trx,'%d %M %Y') AS tanggal_trx, 
									day(tgl_trx) as tgl, month(tgl_trx) as bln, year(tgl_trx) as thn, 
									fld_harga, fld_total, fld_jbayar, 
									fld_durasi,fld_durasi_pilih, fld_lamaserah,fld_lamaserah_pilih,
									fld_hak,fld_noserti,fld_alamatserti,fld_hibah1, fld_hibah2, fld_hibah3,
									fld_batas1, fld_batas2, fld_batas3, fld_batas4, 
									fld_dp, DATE_FORMAT(fld_tgldp,'%d %M %Y') AS tanggal_dp, 
									day(fld_tgldp) as tgldp, month(fld_tgldp) as blndp, year(fld_tgldp) as thndp, 
									fld_lamacicil, fld_lamacicil_pilih, 
									fld_bayartiap, day(fld_bayartiap) as tglbyrtiapbln, fld_carabyr, 
									DATE_FORMAT(fld_cicil_awal,'%d %M %Y') AS tanggal_cicil_awal, 
									day(fld_cicil_awal) as tglcicilawal, month(fld_cicil_awal) as blncicilawal, year(fld_cicil_awal) as thncicilawal,
									DATE_FORMAT(fld_cicil_akhir,'%d %M %Y') AS tanggal_cicil_akhir, 
									day(fld_cicil_akhir) as tglcicilakhir, month(fld_cicil_akhir) as blncicilakhir, year(fld_cicil_akhir) as thncicilakhir,									
									fld_cicil_awalrp, fld_cicil_akhirrp, 
									fld_saksi1, fld_saksi_tempat1, DATE_FORMAT(fld_saksi_tgllahir1,'%d %M %Y') AS tanggal_lahirsaksi1, 
									fld_saksi_pekerjaan1, fld_saksi_alamat1, fld_saksi_hub1, 
									fld_saksi2, fld_saksi_tempat2, DATE_FORMAT(fld_saksi_tgllahir2,'%d %M %Y') AS tanggal_lahirsaksi2, 
									fld_saksi_pekerjaan2, fld_saksi_alamat2, fld_saksi_hub2,							
									fld_penyelesaian 
									FROM tbbuatsurat 
									WHERE nomor_surat='$no_surat'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$tgl_surat=$tm_cari['tanggal_surat'];

// === Data Pihak 1 ===========
	$nama=$tm_cari['nama'];	
	$kd_pekerjaan=$tm_cari['kd_pekerjaan'];
	$alamat=$tm_cari['alamat'];	
	$umur=$tm_cari['fld_umur1'];	
	
// === Data Pihak 2 ===========
	$nama1=$tm_cari['nama1'];	
	$kd_pekerjaan1=$tm_cari['kd_pekerjaan1'];
	$alamat1=$tm_cari['alamat1'];	
	$umur1=$tm_cari['fld_umur2'];	

	$tanggal_trx=$tm_cari['tanggal_trx'];
	$tgl=$tm_cari['tgl'];	
	$bln=$tm_cari['bln'];
	$thn=$tm_cari['thn'];	
	$fld_hak=$tm_cari['fld_hak'];	
	$fld_noserti=$tm_cari['fld_noserti'];
	$fld_alamatserti=$tm_cari['fld_alamatserti'];	
	$fld_harga=$tm_cari['fld_harga'];
	$fld_total=$tm_cari['fld_total'];
	$fld_jbayar=$tm_cari['fld_jbayar'];
	$fld_durasi=$tm_cari['fld_durasi'];
	$fld_durasi_pilih=$tm_cari['fld_durasi_pilih'];			
	$fld_dp=$tm_cari['fld_dp'];
	$besar_dp=($fld_dp/100)*$fld_total;
	$tanggal_dp=$tm_cari['tanggal_dp'];
	$tgldp=$tm_cari['tgldp'];	
	$blndp=$tm_cari['blndp'];
	$thndp=$tm_cari['thndp'];		
	$fld_lamacicil=$tm_cari['fld_lamacicil'];
	$fld_lamacicil_pilih=$tm_cari['fld_lamacicil_pilih'];

	$fld_lamaserah=$tm_cari['fld_lamaserah'];
	$fld_lamaserah_pilih=$tm_cari['fld_lamaserah_pilih'];

	$tglbyrtiapbln=$tm_cari['tglbyrtiapbln'];
	$carabyrtiapbln=$tm_cari['fld_carabyr'];
	$tanggal_cicil_awal=$tm_cari['tanggal_cicil_awal'];	
	$rupiah_cicil_awal=$tm_cari['fld_cicil_awalrp'];			
	$tanggal_cicil_akhir=$tm_cari['tanggal_cicil_akhir'];	
	$rupiah_cicil_akhir=$tm_cari['fld_cicil_akhirrp'];		

	$tglcicilawal=$tm_cari['tglcicilawal'];
	$blncicilawal=$tm_cari['blncicilawal'];
	$thncicilawal=$tm_cari['thncicilawal'];			
	$tglcicilakhir=$tm_cari['tglcicilakhir'];
	$blncicilakhir=$tm_cari['blncicilakhir'];
	$thncicilakhir=$tm_cari['thncicilakhir'];						
			
// === Data Saksi I ===========	
	$nama_saksi1=$tm_cari['fld_saksi1'];
	$tempatlhr_saksi1=$tm_cari['fld_saksi_tempat1'];	
	$tanggal_lahirsaksi1=$tm_cari['tanggal_lahirsaksi1'];
	$id_pekerjaan_saksi1=$tm_cari['fld_saksi_pekerjaan1'];	
	$alamat_saksi1=$tm_cari['fld_saksi_alamat1'];		
	$hub_saksi1=$tm_cari['fld_saksi_hub1'];	
	
// === Data Saksi II ===========	
	$nama_saksi2=$tm_cari['fld_saksi2'];
	$tempatlhr_saksi2=$tm_cari['fld_saksi_tempat2'];	
	$tanggal_lahirsaksi2=$tm_cari['tanggal_lahirsaksi2'];
	$id_pekerjaan_saksi2=$tm_cari['fld_saksi_pekerjaan2'];	
	$alamat_saksi2=$tm_cari['fld_saksi_alamat2'];		
	$hub_saksi2=$tm_cari['fld_saksi_hub2'];		

// ========= Data Tanah ============
	$fld_hibah1=$tm_cari['fld_hibah1'];
	$fld_hibah2=$tm_cari['fld_hibah2'];	
	$fld_hibah3=$tm_cari['fld_hibah3'];
	
	$fld_batas1=$tm_cari['fld_batas1'];	
	$fld_batas2=$tm_cari['fld_batas2'];		
	$fld_batas3=$tm_cari['fld_batas3'];	
	$fld_batas4=$tm_cari['fld_batas4'];		
	
	$fld_penyelesaian=$tm_cari['fld_penyelesaian'];
									
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
                Pada hari ini ? tanggal '.$tgl.' bulan '.$bln.' Tahun '.$thn.', 
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
            '.$fld_harga.' atau jumlah uang terbilang (  rupiah), sehingga <b>keseluruhan harga tanah</b> tersebut adalah :
            '.$fld_total.' atau jumlah uang terbilang (  rupiah), dan 
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
                        Uang muka atau DP (Down Payment) sebesar '.$fld_dp.' % (  persen ) 
						dari keseluruhan harga tanah yang disepakati sesuai 
						pasal 1. Jumlah total uang muka yang akan diberikan adalah sebesar '.$besar_dp.' (  rupiah ) 
						dan akan diberikan Pihak Kedua kepada Pihak Pertama selambat-lambatnya 
						pada Tanggal '.$tgldp.' Bulan '.$blndp.' Tahun '.$thndp.' (  ) setelah penandatanganan Surat perjanjian ini.
                    </td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;">2.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 96%; text-align: justify;">
                        Lama jangka waktu cicilan adalah '.$fld_lamacicil.' (  ) '.$fld_lamacicil_pilih.'. 
						Cicilan dibayar per tanggal '.$tglbyrtiapbln.' (  ) setiap bulannya 
						secara ( '.$carabyrtiapbln.' )  ke Pihak Pertama. 
                    </td>
                </tr>			
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;">3.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 96%; text-align: justify;">
                        Cicilan Pertama sebesar '.$rupiah_cicil_awal.' (  rupiah ) akan dibayarkan Pihak Kedua kepada Pihak Pertama 
						selambat-lambatnya pada Tanggal '.$tglcicilawal.' (  ) Bulan '.$blncicilawal.' Tahun '.$thncicilawal.' (  )
                    </td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 4%;">4.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 96%; text-align: justify;">
                        Cicilan Terakhir sebesar '.$rupiah_cicil_akhir.' (  rupiah ) akan dibayarkan Pihak Kedua kepada Pihak Pertama selambat-lambatnya 
						pada Tanggal '.$tglcicilakhir.' (  ) Bulan '.$blncicilakhir.' Tahun '.$thncicilakhir.' (  )
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
			selambat-lambatnya '.$fld_lamaserah.' (  ) '.$fld_lamaserah_pilih.' 
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
			di '.$alamat_surat.' pada Hari ? Tanggal '.$tgl.' (  ) Bulan '.$bln.' Tahun '.$thn.' (  ), 
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

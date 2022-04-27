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
									nama, kd_pekerjaan, alamat, 
									fld1, fld2, fld3, fld4, fld5, fld6, fld7, fld8, fld9, fld10,
							fld11, fld12, fld13, fld14, fld15	
									FROM tbbuatsurat 
									WHERE nomor_surat='$no_surat'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$tgl_surat=$tm_cari['tanggal_surat'];

// === Data Warga ===========
	$nama=$tm_cari['nama'];	
	$kd_pekerjaan=$tm_cari['kd_pekerjaan'];	
	$alamat=$tm_cari['alamat'];		
	
// === Data Izin ===========
	$fld1=$tm_cari['fld1'];	
	$fld2=$tm_cari['fld2'];		
	$fld3=$tm_cari['fld3'];	
	$fld4=$tm_cari['fld4'];	
	$fld5=$tm_cari['fld5'];		
	$fld6=$tm_cari['fld6'];
	$fld7=$tm_cari['fld7'];	
	$fld8=$tm_cari['fld8'];		
	$fld9=$tm_cari['fld9'];
	$fld10=$tm_cari['fld10'];	
	$fld11=$tm_cari['fld11'];		
	$fld12=$tm_cari['fld12'];
	$fld13=$tm_cari['fld13'];	
	$fld14=$tm_cari['fld14'];		
	$fld15=$tm_cari['fld15'];	
	
// === Master Data ===========	
	$cari_kd=mysqli_query($koneksi,"select pekerjaan FROM tbpekerjaan where kode='$kd_pekerjaan'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$pekerjaan=$tm_cari['pekerjaan'];													

// === Header ==============									
	$cari_kd=mysqli_query($koneksi,"SELECT 
									id, alamat, tempat, jabatan, nama, nip, logo_surat, 
									nm_kab, nm_kec, nm_kel 
									FROM tbpengaturan_surat 
									WHERE id_kel='$kd_kel' and id_kategori='23'");
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
				<div style="text-decoration: underline; font-weight: bold;">SURAT IZIN PEMBANGUNAN</div>		
				<div>'.$no_surat.'</div>				
			</div>

        <!-- Begin : Isi Surat -->
        <div style="margin-top: 10pt;">Yang bertanda tangan di bawah ini :</div>
        <table style="margin: 10pt 0 10pt 30pt; width: 100%;">
            <tbody>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Nama</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$nama.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Pekerjaan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$pekerjaan.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Alamat</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$alamat.'</td>
                </tr>
            </tbody>
        </table>

        <div style="margin-top: 10pt; text-align: justify;">
            <span>
                Dengan ini kami bermaksud mengajukan permohonan Izin Mendirikan Bangunan (IMB) baru/tambahan/pemutihan *) di atas persil sebagaimana tersebut di bawah ini
            </span>
        </div>

        <table style="margin: 10pt 0 10pt 30pt; width: 100%;">
            <tbody>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Nama Pemilik/Persil</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$fld3.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Letak Bangunan/Persil</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$fld4.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">RT/RW</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$fld5.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Kelurahan/Kecamatan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$fld6.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Nomor Sertifikat</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$fld1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Luas</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$fld2.' m<sup>2</sup></td>
                </tr>
            </tbody>
        </table>

        <div style="margin-top: 10pt; text-align: justify;">
			<span>
				Bangunan tersebut dengan :
			</span>
        </div>

        <table style="margin: 10pt 0 10pt 10pt; width: 100%;">
            <tbody>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">1.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 33%;">Pondasi</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$fld7.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">2.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 33%;">Lantai</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$fld8.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">3.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 33%;">Tiang</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$fld9.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">4.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 33%;">Dinding</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$fld10.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">5.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 33%;">Rangka Kap</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$fld11.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">6.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 33%;">Tutup Atap</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$fld12.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">7.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 33%;">Fungsi Bangunan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$fld13.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">8.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 33%;">Pelaksanaan / Pengawasan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$fld14.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">9.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 33%;">Pembuangan Air Limbah</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$fld15.'</td>
                </tr>
            </tbody>
        </table>

        <div style="margin-top: 10pt; text-align: justify;">
			<span>
				dan melampirkan syarat-syarat sebagai berikut :
			</span>
        </div>

        <table class="table" style="width: 100%;">
            <tbody>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top;" colspan="2">Jenis Persyaratan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; text-align: center; width: 5%;">v</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top;" colspan="2">a. Fotokopi Kartu Tanda Penduduk (KTP) pemohon yang masih berlaku</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; text-align: center; width: 5%;"></td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top;" colspan="2">b. Apabila pengajuan permohonan sebagaimana dilakukan oleh pihak ketiga, maka permohonan tersebut harus dilampiri dengan :</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; text-align: center; width: 5%;"></td>
                </tr>
                <tr>
                    <td style="padding: 1pt 0 0 20pt; vertical-align:top;" colspan="2">1). Surat kuasa bermeterai Rp. 6.000,- (enam ribu rupiah) yang ditandatangani oleh pemohon; dan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; text-align: center; width: 5%;"></td>
                </tr>
                <tr>
                    <td style="padding: 1pt 0 0 20pt; vertical-align:top;" colspan="2">2). Fotokopi Kartu Tanda Penduduk (KTP) pihak ketiga selaku penerima kuasa yang masih berlaku.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; text-align: center; width: 5%;"></td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top;" colspan="2">c. Fotokopi IMB lama untuk pengajuan IMB renovasi / tambahan / balik nama</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; text-align: center; width: 5%;"></td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top;" colspan="2">d. Fotokopi tanda pelunasan Pajak Bumi dan Bangunan (PBB) tahun terakhir ;</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; text-align: center; width: 5%;"></td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top;" colspan="2">e. Fotokopi sertifikat tanah atau bukti kepemilikan tanah ;</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; text-align: center; width: 5%;"></td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top;" colspan="2">f. Apabila sertfikat tanah tidak atas nama pemohon, maka pemilik tanah yang bersangkutan turut menandatangani surat permohonan atau dapat dilakukan dengan melampirkan :</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; text-align: center; width: 5%;"></td>
                </tr>
                <tr>
                    <td style="padding: 1pt 0 0 20pt; vertical-align:top;" colspan="2">1). Surat persetujuan bermeterai Rp. 6.000,00 (enam ribu rupiah); dan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; text-align: center; width: 5%;"></td>
                </tr>
                <tr>
                    <td style="padding: 1pt 0 0 20pt; vertical-align:top;" colspan="2">2). Fotokopi Kartu Tanda Penduduk (KTP) pemilik tanah yang masih berlaku.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; text-align: center; width: 5%;"></td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top;" colspan="2">g. Apabila pemilik tanah telah meninggal dunia, maka ahli waris yang bersangkutan turut menandatangani surat permohonan atau dapat dilakukan dengan melampirkan :</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; text-align: center; width: 5%;"></td>
                </tr>
                <tr>
                    <td style="padding: 1pt 0 0 20pt; vertical-align:top;" colspan="2">1). Surat persetujuan bermeterai Rp. 6.000,00 (enam ribu rupiah) ;</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; text-align: center; width: 5%;"></td>
                </tr>
                <tr>
                    <td style="padding: 1pt 0 0 20pt; vertical-align:top;" colspan="2">2). Fotokopi akta / surat kematian pemilik tanah ;</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; text-align: center; width: 5%;"></td>
                </tr>
                <tr>
                    <td style="padding: 1pt 0 0 20pt; vertical-align:top;" colspan="2">3). Fotokopi surat keterangan waris; dan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; text-align: center; width: 5%;"></td>
                </tr>
                <tr>
                    <td style="padding: 1pt 0 0 20pt; vertical-align:top;" colspan="2">4). Fotokopi Kartu Tanda Penduduk (KTP) ahli waris yang masih berlaku.</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; text-align: center; width: 5%;"></td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top;" colspan="2">h. Surat persetujuan dari tetangga dilampiri fotokopi KTP pemberi persetujuan ;</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; text-align: center; width: 5%;"></td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top;" colspan="2">i. Gbr. Bangunan (peta lokasi, denah bangunan, bangunan tampak depan & samping, serta potongan bangunan) dan gambar bangunan lama utk IMB balik nama ;</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; text-align: center; width: 5%;"></td>
                </tr>
            </tbody>
        </table>
        <!-- End : Isi Surat -->
		
		'.$dot.'
		<div style="float: right; width: 250pt; text-align: center; margin-top: 20pt;">
			<div>'.$tempat_surat.', '.$tgl_surat.'</div>
			<div>'.$jabatan.'</div>
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
$dompdf->stream('surat_izin_pembangunan.pdf',array("Attachment"=>0));
?>

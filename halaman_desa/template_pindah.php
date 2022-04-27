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
									tgl_surat, title_surat, nama, nik, id_jk, tempat_lhr, 
									tgl_lhr, id_status_kawin, id_agama, kd_pekerjaan, alamat, 
									DATE_FORMAT(tgl_surat,'%d %M %Y') AS tanggal_surat,nokk,namakk, 
									alamat_tujuan, jumlah_pindah, jenis_pindah, 
									DATE_FORMAT(tgl_lhr,'%d %M %Y') AS tanggal_lahir, jenis_usaha, tempat_usaha 
									FROM tbbuatsurat 
									WHERE nomor_surat='$no_surat'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nama=$tm_cari['nama'];	
	$nik=$tm_cari['nik'];
	$id_jk=$tm_cari['id_jk'];
	$tempat_lhr=$tm_cari['tempat_lhr'];
	$tgl_lhr=$tm_cari['tanggal_lahir'];
	$id_status_kawin=$tm_cari['id_status_kawin'];
	$id_agama=$tm_cari['id_agama'];
	$kd_pekerjaan=$tm_cari['kd_pekerjaan'];	
	$alamat=$tm_cari['alamat'];	
	$tgl_surat=$tm_cari['tanggal_surat'];
	$jenis_pindah=$tm_cari['jenis_pindah'];	
	$tempat_usaha=$tm_cari['tempat_usaha'];
	$nokk=$tm_cari['nokk'];
	$namakk=$tm_cari['namakk'];

	$alamat_tujuan=$tm_cari['alamat_tujuan'];	
	$jumlah_pindah=$tm_cari['jumlah_pindah'];	
	$jenis_pindah=$tm_cari['jenis_pindah'];	
	
	$cari_kd=mysqli_query($koneksi,"SELECT 
									id, alamat, tempat, jabatan, nama, nip, logo_surat, 
									nm_kab, nm_kec, nm_kel 
									FROM tbpengaturan_surat 
									WHERE id_kel='$kd_kel' and id_kategori='9'");
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
				<div style="text-decoration: underline; font-weight: bold;">SURAT KETERANGAN PINDAH</div>	
				<div style="text-decoration: underline; font-weight: bold;">'.$jenis_pindah.'</div>				
				<div>'.$no_surat.'</div>				
			</div>

        <!-- Begin : Isi Surat -->
        <table style="margin: 10pt 0 10pt 30pt; width: 100%;">
            <tbody>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">NIK</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$nik.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Nama</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$nama.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Nomor Kartu Keluarga</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$nokk.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Nama Kepala Keluarga</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$namakk.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Alamat Sekarang</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$alamat.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Alamat Tujuan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$alamat_tujuan.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Jumlah Keluarga Yang Pindah</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$jumlah_pindah.'</td>
                </tr>
            </tbody>
        </table>

        <div style="margin-top: 10pt; text-align: justify;">
            <span>
                Adapun permohonan Pindah Penduduk WNI yang bersangkutan sebagaimana terlampir.
            </span>
        </div>
        <div style="margin-top: 10pt; text-align: justify;">
            <span>
                Demikian Surat Pengantar Pindah ini dibuat agar digunakan sebagaimana mestinya.
            </span>
        </div>
		
		
		<div style="float: right; width: 250pt; text-align: center; margin-top: 20pt;">
			<div>'.$fld_nama_kel.', '.$tgl_surat.'</div>
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
$dompdf->stream('surat_keterangan_pindah.pdf',array("Attachment"=>0));
?>

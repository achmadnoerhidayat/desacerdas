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
									DATE_FORMAT(tgl_surat,'%d %M %Y') AS tanggal_surat, 
									DATE_FORMAT(tgl_lhr,'%d %M %Y') AS tanggal_lahir, 
									fld_layanan, fld_keperluan, fld_keterangan 	
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
	
		$fld_layanan=$tm_cari['fld_layanan'];
		$fld_keperluan=$tm_cari['fld_keperluan'];
		$fld_keterangan=$tm_cari['fld_keterangan'];
		
													$cari_kd=mysqli_query($koneksi,"select jk FROM tbjk where kode='$id_jk'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$jk=$tm_cari['jk'];

													$cari_kd=mysqli_query($koneksi,"select status_nikah FROM tbstatus_nikah where kode='$id_status_kawin'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$status_nikah=$tm_cari['status_nikah'];

													$cari_kd=mysqli_query($koneksi,"select agama FROM tbagama where kode='$id_agama'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$agama=$tm_cari['agama'];
													
													$cari_kd=mysqli_query($koneksi,"select pekerjaan FROM tbpekerjaan where kode='$kd_pekerjaan'");
													$tm_cari=mysqli_fetch_array($cari_kd);
													$pekerjaan=$tm_cari['pekerjaan'];													

									
	$cari_kd=mysqli_query($koneksi,"SELECT 
									id, alamat, tempat, jabatan, nama, nip, logo_surat 
									FROM tbpengaturan_surat 
									WHERE id_kel='$kd_kel' and id_kategori='17'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$alamat_surat=$tm_cari['alamat'];
	$logo_surat=$tm_cari['logo_surat'];
	$tempat_surat=$tm_cari['tempat'];	
	$jabatan=$tm_cari['jabatan'];
	$nama_jwb=$tm_cari['nama'];
	$nip_jwb=$tm_cari['nip'];
	
	require_once("dompdf/autoload.inc.php");
	use Dompdf\Dompdf;
	$dompdf = new Dompdf();

	$html = '<table width="100%">
				<tr>
					<td width="20%">
						<img src="'.$logo_surat.'" width="100px">
					</td>
					<td width="60%">
						<center><b>'.$nm_kab.'</b><br><b>'.$nm_kec.'</b><br><b>'.$nm_kel.'</b><br>'.$alamat_surat.'</center>
					</td>
					<td width="20%"></td>					
				</tr>
			</table>
			<hr>
			<br>
			<center>
				<b><u>SURAT PENGANTAR KARTU KELUARGA</u></b><br>
				'.$no_surat.'
			</center>
			<br>
        <!-- Begin : Isi Surat -->
        <div style="margin-top: 0; text-align: justify; text-indent: 30pt;">
			<span>
				Yang bertanda tangan di bawah ini, '.$jabatan.' '.$nm_kel.', '.$nm_kec.', '.$nm_kab.', '.$nm_prop.', dengan ini menerangkan :
			</span>
		</div>
        <table style="margin: 10pt 0 10pt 30pt; width: 100%;">
            <tbody>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Nama</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$nama.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Tempat/Tanggal Lahir</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$tempat_lhr.'/'.$tgl_lhr.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Jenis Kelamin</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$jk.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Agama</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$agama.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Status</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$status_nikah.'</td>
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
                <tr>
                    <td style="padding: 2pt 0;" colspan="3"></td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Keperluan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$fld_keperluan.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Keterangan Lain-lain</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$fld_keterangan.'</td>
                </tr>
            </tbody>
        </table>

        <div style="margin-top: 10pt; text-align: justify;">
			<span>
                Orang tersebut yang diatas adalah benar-benar penduduk Desa Kami yang berdomisili di '.$alamat.'.
            </span>
        </div>

        <div style="margin-top: 10pt; text-align: justify;">
			<span>
                Surat pengantar ini diberikan untuk keperluan '.$fld_layanan.' Kartu Keluarga.
            </span>
        </div>
        <!-- End : Isi Surat -->

        <!-- Catatan Surat -->
        <div style="margin-top: 10pt; text-align: justify;">
			<span>
				Demikian Surat Pengantar ini dibuat dengan sebenarnya, untuk dapat digunakan sebagaimana mestinya.
			</span>
        </div>
		
		<br>&nbsp;
<table width="100%">
				<tr valign="top">
					<td width="50%" align="center">
					&nbsp;<br>Camat ...................
					</td>
					<td width="50%" align="center">
					'.$tempat_surat.', '.$tgl_surat.'<br>'.$jabatan.'<br><br><br><br><br><br>
					<u>'.$nama_jwb.'</u><br>
					'.$nip_jwb.'
					</td>
				</tr>
				</table>
';

$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('surat_pengantar_ktp.pdf',array("Attachment"=>0));
?>

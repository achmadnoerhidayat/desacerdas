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
	
	$nama=$_GET['txt1'];	
	$nik=$_GET['txt2'];
	$tempat_lhr=$_GET['txt3'];
	$tgl_lhr=$_GET['txt4'];	
	$id_jk=$_GET['txt5'];
	$id_agama=$_GET['txt6'];
	$kd_pekerjaan=$_GET['txt7'];	
	$alamat=$_GET['txt8'];	
	$fld_umur1=$_GET['txt9'];

	$nama1=$_GET['txt10'];	
	$nik1=$_GET['txt11'];
	$tempat_lhr1=$_GET['txt12'];
	$tgl_lhr1=$_GET['txt13'];	
	$id_jk1=$_GET['txt14'];
	$id_agama1=$_GET['txt15'];
	$kd_pekerjaan1=$_GET['txt16'];	
	$alamat1=$_GET['txt17'];	
	$fld_umur2=$_GET['txt18'];

	$tanggal_gugat=$_GET['txt19'];
	$fld_hari=$_GET['txt20'];
	$fld_saksi1=$_GET['txt21'];	
	$fld_saksi2=$_GET['txt22'];		
	$tgl_surat="";
	
	if($id_jk=='1') {
		$pihak1="Suami";
		$pihak2="Istri";
		$pihak1_ket="Saudara";
		$pihak2_ket="Saudari";		
	} else {
		$pihak1="Istri";
		$pihak2="Suami";		
		$pihak1_ket="Saudari";
		$pihak2_ket="Saudara";				
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
						FROM tbpengaturan_surat WHERE id_kel='$kd_kel' and id_kategori='10'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$no_pengaturan=$tm_cari['no_pengaturan'];
		
		$cari_kd=mysqli_query($koneksi,"SELECT count(nomor_surat) as total 
						FROM tbbuatsurat WHERE id_kel='$kd_kel' and id_kategori='10' and 
						month(tgl_surat)='$bln_skr' and year(tgl_surat)='$thn_skr'");
		$tm_cari=mysqli_fetch_array($cari_kd);
		$total=$tm_cari['total'];
		$nourut=$total+1;

		$no_surat = $nourut."/".$nourut."/".$no_pengaturan."/".$bln_rome."/".$thn_skr;
	$tgl_surat=$tgl_skr." ".$ket_bln." ".$thn_skr;		
	
// === Master Data 1 ===========	
	$cari_kd=mysqli_query($koneksi,"select jk FROM tbjk where kode='$id_jk'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jk=$tm_cari['jk'];

	$cari_kd=mysqli_query($koneksi,"select agama FROM tbagama where kode='$id_agama'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$agama=$tm_cari['agama'];

	$cari_kd=mysqli_query($koneksi,"select pekerjaan FROM tbpekerjaan where kode='$kd_pekerjaan'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$pekerjaan=$tm_cari['pekerjaan'];													

// === Master Data 2 ===========	
	$cari_kd=mysqli_query($koneksi,"select jk FROM tbjk where kode='$id_jk1'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$jk1=$tm_cari['jk'];

	$cari_kd=mysqli_query($koneksi,"select agama FROM tbagama where kode='$id_agama1'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$agama1=$tm_cari['agama'];

	$cari_kd=mysqli_query($koneksi,"select pekerjaan FROM tbpekerjaan where kode='$kd_pekerjaan1'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$pekerjaan1=$tm_cari['pekerjaan'];													
	
// === Info Lainnya ===========													
	//$cari_kd=mysqli_query($koneksi,"select status_nikah FROM tbstatus_nikah where kode='$id_status_kawin'");
	//$tm_cari=mysqli_fetch_array($cari_kd);
	//$status_nikah=$tm_cari['status_nikah'];

// === Header ==============									
	$cari_kd=mysqli_query($koneksi,"SELECT 
									id, alamat, tempat, jabatan, nama, nip, logo_surat, 
									nm_kab, nm_kec, nm_kel 
									FROM tbpengaturan_surat 
									WHERE id_kel='$kd_kel' and id_kategori='10'");
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
				<div style="text-decoration: underline; font-weight: bold;">SURAT KETERANGAN GUGAT CERAI</div>		
				<div>'.$no_surat.'</div>				
			</div>

        <!-- Begin : Isi Surat -->
        <div style="margin-top: 30pt;">Yang bertanda tangan di bawah ini, menerangkan  :</div>
        <table style="margin: 10pt 30pt; width: 100%;">
            <tbody>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Nama</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$nama.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">NIK</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$nik.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Tempat/Tanggal lahir</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$tempat_lhr.', '.$tgl_lhr.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Agama</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$agama.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Pekerjaan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$pekerjaan.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Umur</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$fld_umur1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Alamat</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$alamat.'</td>
                </tr>
            </tbody>
        </table>
        <div style="margin-top: 10pt;">Selanjutnya disebut Pihak I '.$pihak1.'</div>
        <div style="margin-top: 10pt;">Dengan kesadaran bersama tanpa paksaan atau tekanan dari pihak manapun juga, maka dengan ini menyatakan gugat cerai kepada :</div>
        <table style="margin: 10pt 30pt; width: 100%;">
            <tbody>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Nama</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$nama1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">NIK</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$nik1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Tempat/Tanggal lahir</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$tempat_lhr1.', '.$tgl_lhr1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Agama</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$agama1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Pekerjaan</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$pekerjaan1.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Umur</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$fld_umur2.'</td>
                </tr>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 34%;">Alamat</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 65%;">'.$alamat1.'</td>
                </tr>
            </tbody>
        </table>
        <div style="margin-top: 10pt;">Selanjutnya disebut Pihak II '.$pihak2.'</div>
        <div style="margin-top: 10pt;">Bahwa sejak Hari '.$fld_hari.' Tanggal '.$tanggal_gugat.' '.$pihak2_ket.' '.$nama1.' </div>
        <!-- End : Isi Surat -->

        <!-- Catatan Surat -->
        <div style="margin-top: 30pt;">
            (Pihak II ) sudah bukan '.$pihak2.' dan tanggung jawab saya lagi, dan persoalan-persoalan yang berkaitan dengan mantan '.$pihak2.' bukan tanggung jawab saya lagi.
        </div>
        <div style="margin-top: 30pt;">
            Bilamana '.$pihak2_ket.' (Pihak II ) mendapatkan jodoh dengan orang lain maka dengan rasa ikhlas dan ridho, lahir dan batin, saya persilahkan untuk menikah dan saya tidak akan menuntut atau menggugat kepada siapapun dan begitu juga sebaliknya.
        </div>
        <div style="margin-top: 30pt;">
            Demikian Surat Keterangan Gugat Cerai ini dibuat, untuk digunakan sebagaimana mestinya.
        </div>
		
		'.$dot.'
<!-- Tanda Tangan Pihak 1 dan Pihak 2 -->
<div style="margin-top: 30pt; position: relative;">
    <!-- Pihak Pertama -->
    <div style="width: 150pt; text-align: center; margin-top: 30pt; position: absolute; left: 0;">
        <div><b>PIHAK PERTAMA,</b></div>
        <div style="padding: 10px;
            width: 40px;
            border: 1px solid #000;
            margin-top: 10pt;
            left: 50pt;
            position: relative;
            vertical-align: middle;">
            Materai 6000
        </div>
        <div style="margin-top: 10pt;">( '.$nama.' )</div>
    </div>

    <!-- Pihak Kedua -->
    <div style="width: 150pt; text-align: center; margin-top: -15pt; position: absolute; right: 0;">
        <div>'.$nm_kel.', '.$tgl_surat.'</div>
        <div><b>PIHAK KEDUA,</b></div>
        <div style="margin-top: 65pt;">( '.$nama1.' )</div>
    </div>
</div>

<!-- Saksi - saksi -->
<div style="top: 160pt; position: relative;">
    <b>Saksi-Saksi:</b>

    <div style="margin-top: -10pt;">
        <!-- Saksi Pertama -->
        <div style="width: 150pt; text-align: center; margin-top: 30pt; position: absolute; left: 0;">
            <div><b>SAKSI PERTAMA,</b></div>
            <div style="margin-top: 65pt;">( '.$fld_saksi1.' )</div>
        </div>

        <!-- Saksi Kedua -->
        <div style="width: 150pt; text-align: center; position: absolute; right: 0;">
            <div><b>SAKSI KEDUA,</b></div>
            <div style="margin-top: 65pt;">( '.$fld_saksi2.' )</div>
        </div>
    </div>
</div>

<!-- Mengetahui -->
<div style="left: 35%; top: 280pt; position: relative; text-align: center;">
    <!-- Saksi Pertama -->
    <div style="width: 150pt; text-align: center; margin-top: 30pt; position: absolute; left: 0;">
        <div><b>Mengetahui</b></div>
        <div>'.$jabatan.'</div>
        <div style="margin-top: 65pt;"><u>'.$nama_jwb.'</u></div>
        <div>'.$nip_jwb.'</div>
    </div>
</div>
		

';

$html .= "</div></body></html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('surat_keteragan_gugat_cerai.pdf',array("Attachment"=>0));
?>

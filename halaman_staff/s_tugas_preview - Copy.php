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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pengantar Tugas</title>
</head>
<body>
    <div style="margin-top: -20pt; padding: 10pt; overflow: none;">
         <!-- @include('letter.template.head') -->

        <!-- Begin : Isi Surat -->
        <table style="margin: 10pt 0; width: 100%;">
            <tbody>
                <tr>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 9%;">Dasar</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                    <td style="padding: 1pt 2pt; vertical-align:top; width: 90%;">Tertib Administrasi Pengelolaan Keuangan Desa dan Percepatan pembangunan</td>
                </tr>
            </tbody>
        </table>

        <div style="margin-top: 10pt; text-decoration: underline; font-weight: bold; text-align: center;">
			<span>
				MEMERINTAHKAN
			</span>
        </div>

			<?php 
				$sql = mysqli_query($koneksi,"SELECT fld_nama, fld_jabatan FROM tbsurat_tugas WHERE id_kel='$kd_kel' and nomor_surat=''");
				while ($tampil = mysqli_fetch_array($sql)) {
			?>
            <table style="margin: 10pt 0; width: 100%;">
                <tbody>
                    <tr>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 9%;">Kepada</td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">: </td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">.</td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 8%;">Nama</td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 80%;"><?php echo $tampil['fld_nama'] ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 9%;">&nbsp;</td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">&nbsp;</td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">&nbsp;</td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 8%;">Jabatan</td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">:</td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 80%;"><?php echo $tampil['fld_jabatan'] ?></td>
                    </tr>
                </tbody>
            </table>
			
			<?php 
				}
			?>
			
 

			<?php 
				$sql = mysqli_query($koneksi,"SELECT fld_tugas FROM tbsurat_tugas1 WHERE id_kel='$kd_kel' and nomor_surat=''");
				while ($tampil = mysqli_fetch_array($sql)) {
			?>
            <table style="margin: 10pt 0; width: 100%;">
                <tbody>
                    <tr>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 9%;">Untuk : &nbsp;</td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">&nbsp;</td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 1%;">.</td>
                        <td style="padding: 1pt 2pt; vertical-align:top; width: 80%; text-align: justify;"><?php echo $tampil['fld_tugas'] ?></td>
                    </tr>
                </tbody>
            </table>
			<?php 
				}
			?>

        <!-- End : Isi Surat -->

        <!-- Catatan Surat -->
        <div style="margin-top: 20pt; text-align: justify;">
			<span>
				Demikian Surat perintah tugas ini di buat untuk dilaksanakan dengan sebaik-baiknya.
			</span>
        </div>


    </div>
</body>
</html>

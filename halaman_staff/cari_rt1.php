<?php
	include "config/koneksi.php";
	error_reporting(E_ALL ^ E_DEPRECATED);

	$sql = mysqli_query($koneksi,"select distinct(rt) as idrt FROM tbpenduduk WHERE id_dukuh='".$_POST["kec"]."'");
	while($data_prov = mysqli_fetch_array($sql)){
?>
	<option value="<?php echo $data_prov["idrt"] ?>"><?php echo $data_prov["idrt"] ?></option><br>
<?php
	}
?>
<?php
	include "config/koneksi.php";
	error_reporting(E_ALL ^ E_DEPRECATED);

	$sql = mysqli_query($koneksi,"SELECT tbrt.rt, tbrt.id_rt FROM tbrt, tbrw WHERE tbrt.id_rw=tbrw.id and tbrw.id_dukuh='".$_POST["kec"]."'");
	while($data_prov = mysqli_fetch_array($sql)){
?>
	<option value="<?php echo $data_prov["id_rt"] ?>"><?php echo $data_prov["rt"] ?></option><br>
<?php
	}
?>
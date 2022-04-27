<?php
	header('Content-Type: application/json');
	session_start();
	$kd_kel=$_SESSION['kodewil'];
	
	$conn = mysqli_connect("localhost","root","","dbdesacerdas");
	$sqlQuery = "SELECT id, kd_kel, tahun, laju FROM tblajupenduduk WHERE kd_kel='$kd_kel' ORDER BY id";
	$result = mysqli_query($conn,$sqlQuery);
	$data = array();
	foreach ($result as $row) {
		$data[] = $row;
	}

	mysqli_close($conn);
	echo json_encode($data);
?>
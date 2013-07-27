<?php
$conn = oci_connect('BPSDM', 'BPSDM', 'localhost/XE');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT * FROM GIS_LOKASI_UPT ');
oci_execute($stid);

echo 'callback([';
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $tipe = $row['TYPE'];
	$content = $row['CONTENT'];
	$lng = $row['LAT'];
	$lat = $row['LON'];
	
	echo '{';
		echo '"tipe":"'.$tipe.'",';
		echo '"content":"'.$content.'",';
		echo '"lat":"'.$lat.'",';
		echo '"lng":"'.$lng.'"';
	echo '},';
}
echo ']);';	

?>
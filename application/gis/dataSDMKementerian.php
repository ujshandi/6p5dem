<?php
$conn = oci_connect('BPSDM', 'BPSDM', 'localhost/XE');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'Select KODEKABUP,count(*) as JUMLAH from sdm_peg_dinas group by KODEKABUP ');
oci_execute($stid);

echo 'callback([';
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $kode = $row['KODEKABUP'];
	$jumlah = $row['JUMLAH'];
	
	echo '{';
		echo '"kode":"'.$kode.'",';
		echo '"jumlah":"'.$jumlah.'"';
	echo '},';
}
echo ']);';	

?>
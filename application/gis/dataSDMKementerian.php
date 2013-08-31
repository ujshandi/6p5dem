<?php
$conn = oci_connect('BPSDM', 'BPSDM', 'localhost/XE');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, ' select SUM(JUMLAH) as TOTAL from (Select KABALAMAT,count(*) as JUMLAH from sdm_pegawai group by KABALAMAT) where ROWNUM <= 15 ');
oci_execute($stid);

while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $total = $row['TOTAL'];
}

$stid = oci_parse($conn, ' select * from (Select KABALAMAT,count(*) as JUMLAH from sdm_pegawai group by KABALAMAT) where ROWNUM <= 15 ');
oci_execute($stid);

echo 'callback([';
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $kode = $row['KABALAMAT'];
	$jumlah = $row['JUMLAH'];
	
	echo '{';
		echo '"kode":"'.$kode.'",';
		echo '"jumlah":"'.$jumlah.'",';
		echo '"total":"'.$total.'"';
	echo '},';
}
echo ']);';	

?>
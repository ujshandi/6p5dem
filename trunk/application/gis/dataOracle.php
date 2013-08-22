<?php
$conn = oci_connect('BPSDM', 'BPSDM', 'localhost/XE');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, "SELECT BPSDM.GIS_LOKASI_UPT.*, 
(SELECT COUNT(*) FROM BPSDM.DIKLAT_MST_PESERTA WHERE BPSDM.DIKLAT_MST_PESERTA.KODE_UPT = BPSDM.GIS_LOKASI_UPT.KODE_UPT AND BPSDM.DIKLAT_MST_PESERTA.STATUS_PESERTA = 'Registrasi') AS JML_PESERTA,
(SELECT COUNT(*) FROM BPSDM.DIKLAT_MST_PESERTA WHERE BPSDM.DIKLAT_MST_PESERTA.KODE_UPT = BPSDM.GIS_LOKASI_UPT.KODE_UPT AND BPSDM.DIKLAT_MST_PESERTA.STATUS_PESERTA = 'Lulus') AS JML_ALUMNI
FROM
BPSDM.GIS_LOKASI_UPT");
oci_execute($stid);

echo 'callback([';
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $tipe = $row['TYPE'];
	$content = $row['CONTENT'];
	$peserta = $row['JML_PESERTA'];
	$alumni = $row['JML_ALUMNI'];
	$lng = $row['LAT'];
	$lat = $row['LON'];
	
	echo '{';
		echo '"tipe":"'.$tipe.'",';
		echo '"content":"'.$content.'",';
		echo '"peserta":"'.$peserta.'",';
		echo '"alumni":"'.$alumni.'",';
		echo '"lat":"'.$lat.'",';
		echo '"lng":"'.$lng.'"';
	echo '},';
}
echo ']);';	

?>
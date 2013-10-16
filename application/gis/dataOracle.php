<?php
$conn = oci_connect('BPSDM', 'BPSDM', 'localhost/XE');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, "SELECT BPSDM.GIS_LOKASI_UPT.*, 
(SELECT COUNT(*) FROM BPSDM.DIKLAT_MST_PESERTA WHERE BPSDM.DIKLAT_MST_PESERTA.KODE_UPT = BPSDM.GIS_LOKASI_UPT.KODE_UPT AND BPSDM.DIKLAT_MST_PESERTA.STATUS_PESERTA = 'Registrasi') AS JML_PESERTA,
(SELECT COUNT(*) FROM BPSDM.DIKLAT_MST_PESERTA WHERE BPSDM.DIKLAT_MST_PESERTA.KODE_UPT = BPSDM.GIS_LOKASI_UPT.KODE_UPT AND BPSDM.DIKLAT_MST_PESERTA.STATUS_PESERTA = 'Lulus') AS JML_ALUMNI,
(SELECT COUNT(*) FROM BPSDM.DIKLAT_MST_DOSEN WHERE BPSDM.DIKLAT_MST_DOSEN.KODE_UPT = BPSDM.GIS_LOKASI_UPT.KODE_UPT AND BPSDM.DIKLAT_MST_DOSEN.JENIS_DOSEN = 'Dosen') AS JML_DOSEN,
(SELECT COUNT(*) FROM BPSDM.DIKLAT_MST_DOSEN WHERE BPSDM.DIKLAT_MST_DOSEN.KODE_UPT = BPSDM.GIS_LOKASI_UPT.KODE_UPT AND BPSDM.DIKLAT_MST_DOSEN.JENIS_DOSEN = 'Instruktur') AS JML_INSTRUKTUR,
(SELECT COUNT(*) FROM BPSDM.DIKLAT_MST_DOSEN WHERE BPSDM.DIKLAT_MST_DOSEN.KODE_UPT = BPSDM.GIS_LOKASI_UPT.KODE_UPT AND BPSDM.DIKLAT_MST_DOSEN.JENIS_DOSEN = 'Widyaiswara') AS JML_WIDYAISWARA
FROM
BPSDM.GIS_LOKASI_UPT");
oci_execute($stid);

echo 'callback([';
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $tipe = $row['TYPE'];
	$kodeupt = $row['KODE_UPT'];
	$content = $row['CONTENT'];
	$peserta = $row['JML_PESERTA'];
	$alumni = $row['JML_ALUMNI'];
	$dosen = $row['JML_DOSEN'];
	$instruktur = $row['JML_INSTRUKTUR'];
	$widyaiswara = $row['JML_WIDYAISWARA'];
	$lng = $row['LAT'];
	$lat = $row['LON'];
	
	echo '{';
		echo '"tipe":"'.$tipe.'",';
		echo '"kodeupt":"'.$kodeupt.'",';
		echo '"content":"'.$content.'",';
		echo '"peserta":"'.$peserta.'",';
		echo '"alumni":"'.$alumni.'",';
		echo '"dosen":"'.$dosen.'",';
		echo '"instruktur":"'.$instruktur.'",';
		echo '"widyaiswara":"'.$widyaiswara.'",';
		echo '"lat":"'.$lat.'",';
		echo '"lng":"'.$lng.'"';
	echo '},';
}
echo ']);';	

?>
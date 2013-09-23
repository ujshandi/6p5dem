<?php
$prov = $_GET['prov'];
if($prov=='true'){
	$conn = oci_connect('BPSDM', 'BPSDM', 'localhost/XE');
	if (!$conn) {
		$e = oci_error();
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}

	$stid = oci_parse($conn, ' select SUM(JUMLAH) as TOTAL from (Select a.KODEPROVIN,count(*) as JUMLAH, b.NAMAPROVIN from sdm_peg_dinas a inner join SDM_PROVINSI b on b.KODEPROVIN = a.KODEPROVIN group by a.KODEPROVIN, b.NAMAPROVIN)'); //where ROWNUM <= 15 
	oci_execute($stid);

	while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
		$total = $row['TOTAL'];
	}

	$stid = oci_parse($conn, ' select * from (Select a.KODEPROVIN,count(*) as JUMLAH, b.NAMAPROVIN from sdm_peg_dinas a inner join SDM_PROVINSI b on b.KODEPROVIN = a.KODEPROVIN group by a.KODEPROVIN, b.NAMAPROVIN)');
	oci_execute($stid);

	echo 'callback([';
	while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
		$kode = $row['KODEPROVIN'];
		$jumlah = $row['JUMLAH'];
		$nama = $row['NAMAPROVIN'];
		
		echo '{';
			echo '"kode":"'.$kode.'",';
			echo '"jumlah":"'.$jumlah.'",';
			echo '"nama":"'.$nama.'",';
			echo '"total":"'.$total.'"';
		echo '},';
	}
	echo ']);';	

}else{
	$conn = oci_connect('BPSDM', 'BPSDM', 'localhost/XE');
	if (!$conn) {
		$e = oci_error();
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}

	$stid = oci_parse($conn, ' select SUM(JUMLAH) as TOTAL from (Select a.KODEKABUP,count(*) as JUMLAH, b.NAMAKABUP from sdm_peg_dinas a inner join SDM_KABUPATEN b on b.KODEKABUP = a.KODEKABUP group by a.KODEKABUP, b.NAMAKABUP) where ROWNUM <= 15 '); //where ROWNUM <= 15 
	oci_execute($stid);

	while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
		$total = $row['TOTAL'];
	}

	$stid = oci_parse($conn, ' select * from (Select a.KODEKABUP,count(*) as JUMLAH, b.NAMAKABUP from sdm_peg_dinas a inner join SDM_KABUPATEN b on b.KODEKABUP = a.KODEKABUP group by a.KODEKABUP, b.NAMAKABUP) where ROWNUM <= 15 ');
	oci_execute($stid);

	echo 'callback([';
	while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
		$kode = $row['KODEKABUP'];
		$jumlah = $row['JUMLAH'];
		$nama = $row['NAMAKABUP'];
		
		echo '{';
			echo '"kode":"'.$kode.'",';
			echo '"jumlah":"'.$jumlah.'",';
			echo '"nama":"'.$nama.'",';
			echo '"total":"'.$total.'"';
		echo '},';
	}
	echo ']);';	
}
?>
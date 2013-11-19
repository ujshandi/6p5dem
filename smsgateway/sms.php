<html>
<head>
<!-- refresh script setiap 30 detik -->
<meta http-equiv="refresh" content="1; url=<?php $_SERVER['PHP_SELF']; ?>">
</head>
 
<body>
 
<h1>SMS server running....</h1>
 
<?php
 
//koneksi ke mysql dan db nya
mysql_connect("localhost", "root", "");
mysql_select_db("sms");
 
// query untuk membaca SMS yang belum diproses
$query = "SELECT * FROM inbox WHERE Processed = 'false'";
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil))
{
// membaca ID SMS
$id = $data['ID'];
 
// membaca no pengirim
$noPengirim = $data['SenderNumber'];
 
// membaca pesan SMS dan mengubahnya menjadi kapital
$msg = strtoupper($data['TextDecoded']);

// membaca modem
$modem = $data['RecipientID'];
 
// proses parsing
 
// memecah pesan berdasarkan karakter <spasi>
$pecah = explode(" ", $msg);
 
// jika ingin mengganti balasan sms

if($modem=="jasakons"){
 $reply = "Terima kasih atas masukannya. BP3TI-KOMINFO / PT JASAKONS PUTRA UTAMA";
 }else
if($modem=="ciptanusa"){ 
 $reply = "Terima kasih atas masukannya. BP3TI-KOMINFO / PT CIPTA NUSA BUANA SENTOSA";
}else
if($modem=="dwieltis"){ 
 $reply = "Terima kasih atas masukannya. BP3TI-KOMINFO / PT DWI ELTIS KONSULTAN";
}

 
// membuat SMS balasan
 
$query3 = "INSERT INTO outbox(DestinationNumber, TextDecoded) VALUES ('$noPengirim', '$reply')";
$hasil3 = mysql_query($query3);
 
// ubah nilai 'processed' menjadi 'true' untuk setiap SMS yang telah diproses
 
$query3 = "UPDATE inbox SET Processed = 'true' WHERE ID = '$id'";
$hasil3 = mysql_query($query3);
}
?>
 
</body>
</html>
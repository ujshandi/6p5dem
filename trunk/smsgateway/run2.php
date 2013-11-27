<?php
include('function.php');
$handle = @fopen("smsdrc1", "r");
if ($handle) {
    while (!feof($handle)) {
        $buffer = fgets($handle);

		if (substr_count($buffer, 'user = ') > 0)
		{
		   $split = explode("user = ", $buffer);
		   $user = str_replace("\r\n", "", $split[1]);
		}

		if (substr_count($buffer, 'password = ') > 0)
		{
		   $split = explode("password = ", $buffer);
		   $pass = str_replace("\r\n", "", $split[1]);
		}

		if (substr_count($buffer, 'database = ') > 0)
		{
		   $split = explode("database = ", $buffer);
		   $db = str_replace("\n", "", $split[1]);
		}
		
    }
    fclose($handle);
}
include('db.php');

$query = "SELECT * FROM inbox ORDER BY ID DESC";
$hasil = mysql_query($query) or die(mysql_error());
	
?>

	<table width="100%">
		  <thead>
			<tr>
				<th align="left" valign="top" scope="col">Tanggal Terima SMS</th>
				<th align="left" valign="top" scope="col">Pengirim</th>
				<th align="left" valign="top" scope="col">SMS</th>
				<th align="left" valign="top" scope="col">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ($data = mysql_fetch_array($hasil))
			{
			?>
			<tr>
				<td align="left" valign="top">
					<?php
						$arr_datetime=explode(" ", $data['ReceivingDateTime']);
						$arr_date = explode("-",$arr_datetime[0]);
						echo $date_indo = $arr_date[2] . '-' . $arr_date[1] . '-' . $arr_date[0];
						
						echo ' ' . $arr_datetime[1];
					?> 
				</td>
				<td align="left" valign="top"><?=$data['SenderNumber']?> </td>
				<td align="left" valign="top"><?=$data['TextDecoded']?> </td>
				<td align="center" valign="top"></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>	


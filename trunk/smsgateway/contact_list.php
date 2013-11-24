<div class="wrap_right bgcontent">
<h1 class="heading">Kontak Nomer</h1>
<hr/>
<?php
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

$query = "SELECT * FROM contact";
$hasil = mysql_query($query) or die(mysql_error());
	
?>

<table>
	  <thead>
		<tr>
			<th align="left" valign="top" scope="col">ID</th>
			<th align="left" valign="top" scope="col">Nama</th>
			<th align="left" valign="top" scope="col">Nomer</th>
			<th align="left" valign="top" scope="col">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		while ($data = mysql_fetch_array($hasil))
		{
		?>
		<tr>
			<td align="left" valign="top"><?=$data['id']?> </td>
			<td align="left" valign="top"><?=$data['nama']?> </td>
			<td align="left" valign="top"><?=$data['number']?> </td>
			<td align="center" valign="top"></td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>
<div class="clear">&nbsp;</div>
</div>
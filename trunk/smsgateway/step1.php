<div class="wrap_right bgcontent">
<h1 class="heading">Setting GAMMURC</h1>
<hr/>
<?php
$handle = @fopen("gammurc", "r");
$baris = array();
$i = 1;
$j = 1;
if ($handle) {
    while (!feof($handle)) {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'port = ') > 0)
		{
		   if ($i == 1)
		   {
		      $split = explode("port = ", $buffer);
		      $port1 = str_replace(":", "", $split[1]);
		   }
		   
		   if ($i == 2)
		   {
		      $split = explode("port = ", $buffer);
		      $port2 = str_replace(":", "", $split[1]);
		   }
		   
		   if ($i == 3)
		   {
		      $split = explode("port = ", $buffer);
		      $port3 = str_replace(":", "", $split[1]);
		   }
		   
		   if ($i == 4)
		   {
		      $split = explode("port = ", $buffer);
		      $port4 = str_replace(":", "", $split[1]);
		   }
		   
		   $i++;
		}
		
		if (substr_count($buffer, 'connection = ') > 0)
		{
		   if ($j == 1)
		   {
 		      $split = explode("connection = ", $buffer);
		      $connection1 = $split[1];
		   }
		   
		   if ($j == 2)
		   {
 		      $split = explode("connection = ", $buffer);
		      $connection2 = $split[1];
		   }
		   
		   if ($j == 3)
		   {
 		      $split = explode("connection = ", $buffer);
		      $connection3 = $split[1];
		   }
		   
		   if ($j == 4)
		   {
 		      $split = explode("connection = ", $buffer);
		      $connection4 = $split[1];
		   }
		   
		   $j++;
		}
		
		$baris[] = $buffer; 
    }
    fclose($handle);
}

if (isset($_GET['op']) == "simpan"){
  $port1 = $_POST['port1'];
  $connection1 = $_POST['connection1'];
  $handle = @fopen("gammurc", "w");
  $text = "[gammu]\nport = ".$port1.":\nconnection = ".$connection1;
  fwrite($handle, $text);
  fclose($handle); 
  echo "<p>Konfigurasi GAMMURC sudah disimpan</p>";  
}
?> 
<fieldset>
	<form method="post" class="sform" action="<?php $_SERVER['PHP_SELF']; ?>?m=setting_gammurc&op=simpan">
		<ol>
		<li>
			<label for="">PORT <em>*</em></label> 
			<input name="port1" value="<?php echo $port1;?>" type="text" class="four"/>
		</li>
		<li>
			<label for="">CONNECTION <em>*</em></label>
			<input type="text" name="connection1" value="<?php echo $connection1;?>" class="four">
		</li>
		
		<li><input class="greenbutton" type="submit" name="submit" value="Simpan"> <a href="connection.xls">Lihat Jenis Connection</a> </li>
		</ol>
	</form>
</fieldset>

</div>
<?php
$handle = @fopen("smsdrc1", "r");
if ($handle) {
    while (!feof($handle)) {
        $buffer = fgets($handle);
		
		if (substr_count($buffer, 'pc = ') > 0)
		{
		   $split = explode("pc = ", $buffer);
		   $pc = str_replace("\r\n", "", $split[1]);
		}
		
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

mysql_connect($pc, $user, $pass);
mysql_select_db($db); 
?>
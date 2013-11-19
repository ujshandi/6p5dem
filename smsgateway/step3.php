<div class="wrap_right bgcontent">
<h1 class="heading">Konfigurasi MySQL</h1>
<hr/>
<fieldset>
<?php
  if (isset($_POST['submit']))
  {
    $dbname = $_POST['db'];
	$dbuser = $_POST['username'];
	$dbpass = $_POST['password'];
	
	mysql_connect("localhost", $dbuser, $dbpass);
	$query = "DROP DATABASE IF EXISTS ".$dbname;
	$result = mysql_query($query);
	$query = "CREATE DATABASE ".$dbname;
	$result = mysql_query($query);
	
	if (!$result) {
    die('<b>Error: </b>' . mysql_error());
    }

    $handle = @fopen("mysql-table.sql", "r");
	$content = fread($handle, filesize("mysql-table.sql"));
	$split = explode(";", $content);
	
	mysql_select_db($dbname);
	
	for ($i=0; $i<=count($split)-1; $i++)
	{
	  mysql_query($split[$i]);
    }

	fclose($handle);
	echo "<p>Database <b>\"".$dbname."\"</b> sudah berhasil dibuat</p>";
  }
?> 


<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" class="sform">
	<ol>
		<li>
			<label for="">USERNAME <em>*</em></label> 
			<input name="username" value="" type="text" class="four"/>
		</li>
		<li>
			<label for="">PASSWORD <em>*</em></label> 
			<input name="password" value="" type="password" class="four"/>
		</li>
		<li>
			<label for="">NAMA DATABASE <em>*</em></label> 
			<input name="db" value="" type="text" class="four"/>
		</li>
		
		<li><input type="submit" name="submit" class="greenbutton" value="INSTALL"></li>
	</ol>
</form>
</fieldset>
</div>
<div class="wrap_right bgcontent">
<h1 class="heading">Setting Konfigurasi SMSDRC</h1>
<hr/>
<fieldset>

<?php
$handle = @fopen("smsdrc1", "r");
$baris = array();
if ($handle) {
    while (!feof($handle)) {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'port = ') > 0)
		{
		   $split = explode("port = ", $buffer);
		   $port1 = str_replace(":", "", $split[1]);
		}
		
		if (substr_count($buffer, 'connection = ') > 0)
		{
		   $split = explode("connection = ", $buffer);
		   $connection1 = $split[1];
		}

		if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id1 = $split[1];
		}		

		if (substr_count($buffer, 'user = ') > 0)
		{
		   $split = explode("user = ", $buffer);
		   $user = $split[1];
		}

		if (substr_count($buffer, 'password = ') > 0)
		{
		   $split = explode("password = ", $buffer);
		   $pass = $split[1];
		}

		if (substr_count($buffer, 'database = ') > 0)
		{
		   $split = explode("database = ", $buffer);
		   $db = $split[1];
		}
		
		$baris[] = $buffer; 
    }
    fclose($handle);
}

if (isset($_GET['op']) == "simpan")
{
  $port1 = $_POST['port1'];
  $connection1 = $_POST['connection1'];
  $id1 = $_POST['id1'];  
  /*$port2 = $_POST['port2'];
  $connection2 = $_POST['connection2'];
  $id2 = $_POST['id2'];
  $port3 = $_POST['port3'];
  $connection3 = $_POST['connection3'];
  $id3 = $_POST['id3'];
  $port4 = $_POST['port4'];
  $connection4 = $_POST['connection4'];
  $id4 = $_POST['id4']; */
  
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  
  $db = $_POST['db'];  
  
  $handle = @fopen("smsdrc1", "w");
  $text = "[gammu]
# isikan no port di bawah ini
port = ".$port1.":
# isikan jenis connection di bawah ini
connection = ".$connection1."

[smsd]
service = mysql
logfile = smsdlog
debuglevel = 0
phoneid = ".$id1."
commtimeout = 30
sendtimeout = 30
PIN = 1234

# -----------------------------
# Konfigurasi koneksi ke MySQL
# -----------------------------
pc = localhost

# isikan user untuk akses ke MySQL
user = ".$user."
# isikan password user untuk akses ke MySQL
password = ".$pass."
# isikan nama database untuk Gammu
database = ".$db."\n";

  fwrite($handle, $text);
  fclose($handle);
 
echo "<p>Konfigurasi SMSDRC sudah disimpan</p>"; 



}

?> 

<form method="post" class="sform" action="<?php $_SERVER['PHP_SELF']; ?>?m=set_smsdrc&op=simpan">
	<ol>
		<li>
			<label for="">USERNAME (MySQL) <em>*</em></label> 
			<input name="user" value="<?php echo $user;?>" type="text" class="four"/>
		</li>
		<li>
			<label for="">PASSWORD (MySQL) <em></em></label> 
			<input name="pass" value="<?php echo $pass;?>" type="text" class="four"/>
		</li>
		<li>
			<label for="">DATABASE (MySQL) <em>*</em></label> 
			<input name="db" value="<?php echo $db;?>" type="text" class="four"/>
		</li>
	</ol>

	<p><b>Modem</b></p>

	<ol>
		<li><label for="">ID PHONE <em></em></label><input type="text" name="id1" class="four" value="<?php echo $id1;?>"></li>
		<li><label for="">PORT <em></em></label><input type="text" name="port1" class="four" value="<?php echo $port1;?>"></li>
		<li><label for="">CONNECTION <em></em></label><input type="text" name="connection1" class="four" value="<?php echo $connection1;?>"></li>
	
		<li><input type="submit" name="submit" value="Simpan" class="greenbutton"></li>
	</ol>
</form>
</fieldset>
</div>
<div class="wrap_right bgcontent">
<h1 class="heading">Setting GAMMURC</h1>
<hr/>
<fieldset>

<h2>Langkah 4 - Setting Konfigurasi SMSDRC</h2>

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

$handle = @fopen("smsdrc2", "r");
$baris = array();
if ($handle) {
    while (!feof($handle)) {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'port = ') > 0)
		{
		   $split = explode("port = ", $buffer);
		   $port2 = str_replace(":", "", $split[1]);
		}
		
		if (substr_count($buffer, 'connection = ') > 0)
		{
		   $split = explode("connection = ", $buffer);
		   $connection2 = $split[1];
		}

		if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id2 = $split[1];
		}
		
		$baris[] = $buffer; 
    }
    fclose($handle);
}

$handle = @fopen("smsdrc3", "r");
$baris = array();
if ($handle) {
    while (!feof($handle)) {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'port = ') > 0)
		{
		   $split = explode("port = ", $buffer);
		   $port3 = str_replace(":", "", $split[1]);
		}
		
		if (substr_count($buffer, 'connection = ') > 0)
		{
		   $split = explode("connection = ", $buffer);
		   $connection3 = $split[1];
		}

		if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id3 = $split[1];
		}
		
		$baris[] = $buffer; 
    }
    fclose($handle);
}

$handle = @fopen("smsdrc4", "r");
$baris = array();
if ($handle) {
    while (!feof($handle)) {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'port = ') > 0)
		{
		   $split = explode("port = ", $buffer);
		   $port4 = str_replace(":", "", $split[1]);
		}
		
		if (substr_count($buffer, 'connection = ') > 0)
		{
		   $split = explode("connection = ", $buffer);
		   $connection4 = $split[1];
		}		
		
		if (substr_count($buffer, 'phoneid = ') > 0)
		{
		   $split = explode("phoneid = ", $buffer);
		   $id4 = $split[1];
		}
		
		$baris[] = $buffer; 
    }
    fclose($handle);
}

if ($_GET['op'] == "simpan")
{
  $port1 = $_POST['port1'];
  $connection1 = $_POST['connection1'];
  $id1 = $_POST['id1'];  
  $port2 = $_POST['port2'];
  $connection2 = $_POST['connection2'];
  $id2 = $_POST['id2'];
  $port3 = $_POST['port3'];
  $connection3 = $_POST['connection3'];
  $id3 = $_POST['id3'];
  $port4 = $_POST['port4'];
  $connection4 = $_POST['connection4'];
  $id4 = $_POST['id4'];
  
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

  $handle = @fopen("smsdrc2", "w");
  $text = "[gammu]
# isikan no port di bawah ini
port = ".$port2.":
# isikan jenis connection di bawah ini
connection = ".$connection2."

[smsd]
service = mysql
logfile = smsdlog
debuglevel = 0
phoneid = ".$id2."
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

  $handle = @fopen("smsdrc3", "w");
  $text = "[gammu]
# isikan no port di bawah ini
port = ".$port3.":
# isikan jenis connection di bawah ini
connection = ".$connection3."

[smsd]
service = mysql
logfile = smsdlog
debuglevel = 0
phoneid = ".$id3."
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

  $handle = @fopen("smsdrc4", "w");
  $text = "[gammu]
# isikan no port di bawah ini
port = ".$port4.":
# isikan jenis connection di bawah ini
connection = ".$connection4."

[smsd]
service = mysql
logfile = smsdlog
debuglevel = 0
phoneid = ".$id4."
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

<p>Masukkan konfigurasi SMSDRC berikut ini!</p>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>?op=simpan">
<table>
 <tr><td>USERNAME (MySQL)</td><td>:</td><td><input type="text" name="user" value="<?php echo $user;?>"></td></tr>
 <tr><td>PASSWORD (MySQL)</td><td>:</td><td><input type="text" name="pass" value="<?php echo $pass;?>"></td></tr>
 <tr><td>DATABASE NAME GAMMU YANG TELAH DIBUAT SEBELUMNYA (LANGKAH 3)</td><td>:</td><td><input type="text" name="db" value="<?php echo $db;?>"></td></tr>
</table>

<p><b>Modem/HP 1</b></p>

<table>
 <tr><td>ID PHONE</td><td>:</td><td><input type="text" name="id1" value="<?php echo $id1;?>"></td></tr>
 <tr><td>PORT</td><td>:</td><td><input type="text" name="port1" value="<?php echo $port1;?>"></td></tr>
 <tr><td>CONNECTION</td><td>:</td><td><input type="text" name="connection1" value="<?php echo $connection1;?>"></td></tr>
</table>

<p><b>Modem/HP 2</b></p>

<table>
 <tr><td>ID PHONE</td><td>:</td><td><input type="text" name="id2" value="<?php echo $id2;?>"></td></tr>
 <tr><td>PORT</td><td>:</td><td><input type="text" name="port2" value="<?php echo $port2;?>"></td></tr>
 <tr><td>CONNECTION</td><td>:</td><td><input type="text" name="connection2" value="<?php echo $connection2;?>"></td></tr>
</table>

<p><b>Modem/HP 3</b></p>

<table>
 <tr><td>ID PHONE</td><td>:</td><td><input type="text" name="id3" value="<?php echo $id3;?>"></td></tr>
 <tr><td>PORT</td><td>:</td><td><input type="text" name="port3" value="<?php echo $port3;?>"></td></tr>
 <tr><td>CONNECTION</td><td>:</td><td><input type="text" name="connection3" value="<?php echo $connection3;?>"></td></tr>
</table>

<p><b>Modem/HP 4</b></p>

<table>
 <tr><td>ID PHONE</td><td>:</td><td><input type="text" name="id4" value="<?php echo $id4;?>"></td></tr>
 <tr><td>PORT</td><td>:</td><td><input type="text" name="port4" value="<?php echo $port4;?>"></td></tr>
 <tr><td>CONNECTION</td><td>:</td><td><input type="text" name="connection4" value="<?php echo $connection4;?>"></td></tr>
</table>
<br>
<input type="submit" name="submit" value="Simpan">
</form>
</fieldset>
</div>
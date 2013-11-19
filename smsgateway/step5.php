<div class="wrap_right bgcontent">
<h1 class="heading">Langkah 5 - Membuat Service GAMMU</h1>
<hr/>
<fieldset>
<p>Klik tombol di bawah ini untuk membuat Service</p>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" class="sform">
<ol><li><input type="submit" name="submit" value="INSTALL SERVICE GAMMU" class="greenbutton"></li></ol>
</form>

<?php
  if (isset($_POST['submit']))
  {
   echo "<b>Status :</b><br>";
   echo "<pre>";
   passthru("gammu-smsd -n phone1 -k", $hasil);
   passthru("gammu-smsd -n phone1 -u", $hasil);

   $handle = @fopen("smsdrc1", "r");
   while (!feof($handle)) 
   {
        $buffer = fgets($handle);
        if (substr_count($buffer, 'port = ') > 0)
		{
		   $split = explode("port = ", $buffer);
		   $port1 = str_replace(":", " ", $split[1]);
		}
   }	
   if ($port1 != "\r\n") passthru("gammu-smsd -c smsdrc1 -n phone1 -i", $hasil);
   fclose($handle);

   echo "</pre>";
  }
?> 
</fieldset>
</div>
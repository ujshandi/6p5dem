<div class="wrap_right bgcontent">
<h1 class="heading">Langkah 6 - Menjalankan Service GAMMU</h1>
<hr/>
<fieldset>

<p>Klik tombol di bawah ini untuk menjalankan GAMMU Service!</p>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<input type="submit" name="submit" value="JALANKAN SERVICE GAMMU"></td></tr>
</form>

<?php
  if ($_POST['submit']) 
  {
   echo "<b>Status :</b><br>";
   echo "<pre>";
   passthru("gammu-smsd -c smsdrc1 -n phone1 -s");
   passthru("gammu-smsd -c smsdrc2 -n phone2 -s");
   passthru("gammu-smsd -c smsdrc3 -n phone3 -s");
   passthru("gammu-smsd -c smsdrc4 -n phone4 -s");   
   echo "</pre>";
  }
?> 
</fieldset>
</div>
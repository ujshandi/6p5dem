<div class="wrap_right bgcontent">
<h1 class="heading">Langkah 6 - Menjalankan Service GAMMU</h1>
<hr/>
<fieldset>

<p>Klik tombol di bawah ini untuk menjalankan GAMMU Service!</p>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" class="sform">
<input type="submit" name="submit" value="JALANKAN SERVICE GAMMU"></td></tr>
</form>

<?php
  if (isset($_POST['submit'])) 
  {
   echo "<b>Status :</b><br>";
   echo "<pre>";
   passthru("gammu-smsd -c smsdrc1 -n phone1 -s");
   echo "</pre>";
  }
?> 
</fieldset>
</div>
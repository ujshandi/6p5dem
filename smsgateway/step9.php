<div class="wrap_right bgcontent">
<h1 class="heading">Menghentikan Service</h1>
<hr/>
<fieldset>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" class="sform">
<input type="submit" name="submit" value="HENTIKAN SERVICE GAMMU"></td></tr>
</form>

<?php
  if (isset($_POST['submit']))
  {
   echo "<b>Status :</b><br>";
   echo "<pre>";
   passthru("gammu-smsd -n phone1 -k");
   echo "</pre>";
  }
?> 
</fieldset>
</div>
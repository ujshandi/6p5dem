<div class="wrap_right bgcontent">
<h1 class="heading">Test Koneksi Modem</h1>
<hr/>
<fieldset>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<input type="submit" name="submit" value="CEK KONEKSI"></td></tr>
</form>
</fieldset>
<p>
<?php
if (isset($_POST['submit'])){
   echo "<b>Status :</b><br>";
   echo "<hr>Modem/HP 1<br>";
   echo "<pre>";
   passthru("gammu -s 0 -c gammurc identify", $hasil);
   echo "</pre>";
}
?> 
</p>

</div>
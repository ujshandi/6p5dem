<div class="wrap_right bgcontent">
<h1 class="heading">Kirim SMS</h1>
<hr/>
<fieldset>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" class="sform">
<ol>
	<li>
		<label for="">No Hp Tujuan <em>*</em></label> 
		<input type="text" name="nohp" />
	</li>
	<li>
		<label for="">Isi SMS<em>*</em></label> 
		<textarea name="sms" rows="5" cols="40"></textarea>
	</li>
	<li>
		<input type="submit" name="submit" value="Kirim SMS" class="greenbutton">
	</li>
</ol>


</form>

<?php
  if (isset($_POST['submit']))
  {
   $nohp = $_POST['nohp'];
   $sms = $_POST['sms'];
   $phone = $_POST['phoneid'];
   
   echo "<b>Status :</b><br>";
   echo "<pre>";
   passthru('gammu-smsd-inject -c '.$phone.' TEXT '.$nohp.' -text "'.$sms.'"');
   echo "</pre>";
   
   echo 'gammu-smsd-inject -c '.$phone.' TEXT '.$nohp.' -text "'.$sms.'"';
  }
?> 
</fieldset>
</div>
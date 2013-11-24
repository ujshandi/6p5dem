<div class="wrap_right bgcontent">
<h1 class="heading">Kirim SMS</h1>
<hr/>
<fieldset>
<?php
	include('db.php');
	include('function.php');
?>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" class="sform">
<ol>
	<li>
		<label for="">No Hp Tujuan <em>*</em></label> 
		<select name="nohp" id="nohp">
			<?php
				$sql="select * from contact";
				$query=mysql_query($sql);
				while($rows=mysql_fetch_array($query)){
					echo "<option value=" . $rows['number'] . ">" . $rows['nama'] .'-'. $rows['number'] . "</option>";
				}
			?>
		</select>
		
	</li>
	<li>
		<label for="">Pilih Modem <em>*</em></label> 
		<?php echo service3(''); ?>
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
   
  // echo 'gammu-smsd-inject -c '.$phone.' TEXT '.$nohp.' -text "'.$sms.'"';
  }
?> 
</fieldset>
</div>
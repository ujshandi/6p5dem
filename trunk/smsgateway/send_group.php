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
		<label for="">Kirim ke Group <em>*</em></label> 
		<select name="groupID" id="groupID">
			<?php
				$sql="select * from pbk_groups";
				$query=mysql_query($sql);
				while($rows=mysql_fetch_array($query)){
					echo "<option value=" . $rows['ID'] . ">" . $rows['Name'] . "</option>";
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
   $groupID = $_POST['groupID'];
   $sms = $_POST['sms'];
   $phone = $_POST['phoneid'];
   
   echo "<b>Status :</b><br>";
   echo "<pre>";
   
	$query_pbk=mysql_query("select * from pbk where GroupID=" . $groupID . "");
	//echo $query_pbk . "<br/>";
	while($rows_pbk=mysql_fetch_array($query_pbk)){
		//echo 'gammu-smsd-inject -c '.$phone.' TEXT '.$rows_pbk['Number'].' -text "'.$sms.'"';
		passthru('gammu-smsd-inject -c '.$phone.' TEXT '.$rows_pbk['Number'].' -text "'.$sms.'"');
	}
   
   echo "</pre>";
   
  // echo 'gammu-smsd-inject -c '.$phone.' TEXT '.$nohp.' -text "'.$sms.'"';
  }
?> 
</fieldset>
</div>
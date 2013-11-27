<div class="wrap_right bgcontent">
<h1 class="heading">Tambah Kontak</h1>
<hr/>
<fieldset>
<?php
	include('db.php');
	$sql="select * from pbk_groups";
	$query=mysql_query($sql);
?>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" class="sform">
<ol>
	<li>
		<label for="">Nama <em>*</em></label> 
		<input type="text" name="nama" />
	</li>
	<li>
		<label for="">No Hp Tujuan <em>*</em></label> 
		<input type="text" name="nohp" />
	</li>
	<li>
		<label for="">Group <em>*</em></label> 
		<select name="groupname" id="groupname">
			<?php
				while($rows=mysql_fetch_array($query)){
					echo "<option value=" .$rows[ID]. ">" . $rows[Name] . "</option>";
				}
			?>
			
		</select>
	</li>
	<li>
		<input type="submit" name="submit" value="Simpan" class="greenbutton">
	</li>
</ol>


</form>

<?php
	
  if (isset($_POST['submit']))
  {
   $nohp = $_POST['nohp'];
   $nama = $_POST['nama'];
   $groupname = $_POST['groupname'];
   
   $res_insert=mysql_query("INSERT INTO pbk (Name,Number,GroupID) values ('" . $nama . "','" . $nohp . "','" . $groupname . "')");
   if ($res_insert){
		echo "Data Tersimpan";
   }else{
		echo "Data Gagal Tersimpan";
   }
  }
?> 
</fieldset>
</div>
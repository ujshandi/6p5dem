<div class="wrap_right bgcontent">
<h1 class="heading">Tambah Group</h1>
<hr/>
<fieldset>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" class="sform">
<ol>
	<li>
		<label for="">Nama Group<em>*</em></label> 
		<input type="text" name="nama_group" />
	</li>
	<li>
		<input type="submit" name="submit" value="Simpan" class="greenbutton">
	</li>
</ol>


</form>

<?php
include('db.php');
  if (isset($_POST['submit']))
  {
   $nama_group = $_POST['nama_group'];
   
   $res_insert=mysql_query("INSERT INTO pbk_groups (Name) values ('" . $nama_group . "')");
   if ($res_insert){
		echo "Data Tersimpan";
   }else{
		echo "Data Gagal Tersimpan";
   }
  }
?> 
</fieldset>
</div>
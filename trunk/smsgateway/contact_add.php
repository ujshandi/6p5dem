<div class="wrap_right bgcontent">
<h1 class="heading">Tambah Kontak</h1>
<hr/>
<fieldset>

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
		<input type="submit" name="submit" value="Simpan" class="greenbutton">
	</li>
</ol>


</form>

<?php
	include('db.php');
  if (isset($_POST['submit']))
  {
   $nohp = $_POST['nohp'];
   $nama = $_POST['nama'];
   
   $res_insert=mysql_query("INSERT INTO contact (nama,number) values ('" . $nama . "','" . $nohp . "')");
   if ($res_insert){
		echo "Data Tersimpan";
   }else{
		echo "Data Gagal Tersimpan";
   }
  }
?> 
</fieldset>
</div>
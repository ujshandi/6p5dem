<html lang="en">
  <head>
    <meta charset="utf-8">
    
  </head>
<body>
    <!-- page content -->
    
    <h1 align="center"><?= $title ?></h1>
    <?php echo form_open('dinas/search'); ?>
	<input type="submit" value="Back">
	<table class="box-table-a" width="100%" border="1" bordercolor="#FFFFFF">
		<tr>
			<td width="125">NIP</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result->row()->nip?></td>
		</tr>
		<tr>
			<td width="125">Nama</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result->row()->nama_pegawai?></td>
		</tr>
        <tr>
			<td width="125">Provinsi</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result->row()->namaprovin?></td>
		</tr>
		<tr>
			<td width="125">Kabkota</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result->row()->namakabup?></td>
		</tr>
		<tr>
			<td width="125">Tempat Lahir</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result->row()->tempat_lahir?></td>
		</tr>
		<tr>
			<td width="125">Tanggal Lahir</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result->row()->tgl_lahir?></td>
		</tr>  
		<tr>
			<td width="125">Jenis Kelamin</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result->row()->jenis_kelamin?></td>
		</tr>
		<tr>
			<td width="125">Agama</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result->row()->agama?></td>
		</tr>
		<tr>
			<td width="125">Alamat</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result->row()->alamat?></td>
		</tr>
        <tr>
			<td width="125">Jabatan</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result->row()->nama_jabatan?></td>
		</tr>
        <tr>
			<td width="125">Golongan</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result->row()->nama_golongan?></td>
		</tr>
		
	</table>
	  
</body>
</html>

<html>
<head>
<style>

th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	font-style: normal;
	height: 25px;
	background-color: #FFFFFF;	
}
table {
	border-collapse:collapse;
	
}
hr{
 color:#FFFF99;

}
</style>

<body>
<body id="demo">
	<table cellpadding="0" cellspacing="1" border="1"  class="display dataTable" width='100%'>
		<form method="post" action="<?=site_url().'/satker/proses_add'?>">
		<p>Isi data satuan kerja>><a href='<?=site_url().'/satker'?>'>Index page</a></p>
		  <table width="100%" border="1">
			<tr bgcolor="#FFFF99">
			  <td width="16%">Kode</td>
			  <td width="1%">:</td>
			  <td width="83%"><label>
				<input name="kode" type="text" id="kode" size="20" required>
			  </label></td>
			</tr>
			<tr bgcolor="#FFFFCC">
			  <td>Nama</td>
			  <td>:</td>
			  <td><label>
				<input name="nama" type="text" id="nama" size="80" required>
			  </label></td>
			</tr>
			<tr bgcolor="#FFFF99">
			  <td colspan="3"><label>
				<input type="submit" name="simpan" id="simpan" value="Simpan">
			  </label></td>
			</tr>
		  </table>
		</form>
	</table>
</body>
</head>
</html>
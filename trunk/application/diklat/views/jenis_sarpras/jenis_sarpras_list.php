
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
<link href="<?=base_url()?>public/diklat/css/demo_page.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>public/diklat/css/demo_table.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>public/diklat/js/themes/base/jquery.ui.all.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?=base_url()?>public/diklat/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/diklat/js/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/diklat/js/jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/diklat/js/jquery.ui.datepicker.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/diklat/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/diklat/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('.dataTable').dataTable();
		
	} );
	</script>
<body>
<body id="demo">
	<p>Daftar  Jenis Sarana Prasarana >> <a href='<?=site_url().'/jenis_sarpras/add'?>'>Rekam Data Sarana Prasarana</a></p>
	<table cellpadding="0" cellspacing="1" border="1"  class="display dataTable" width='100%'>
		<thead bgcolor='#ffff99'>
			<tr>
				<th align='center'>Nama Sarana Prasarana</th>
				<th align='center'>Jenis</th>
				<th align='center'>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?foreach($result->result() AS $r){?>
				<tr class='gradeC'>
					<td width='50%'><?=$r->nama_sarpras?></td>
					<td width='15%'><?=$r->jenis?></td>
					<td width='10%'>
						<a href="<?=site_url().'/jenis_sarpras/edit/'.$r->id_sarpras?>" >Ubah </a> |
						<a href="<?=site_url().'/jenis_sarpras/proses_delete/'.$r->id_sarpras?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" >Hapus</a>
					</td>
				</tr>
			<?}?>
		</tbody>
	</table>
</body>
</head>
</html>
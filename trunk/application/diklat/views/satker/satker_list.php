
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
	<p>Daftar  Satuan Kerja >> <a href='<?=site_url().'/satker/add'?>'>Rekam Data Satuan Kerja</a></p>
	<table cellpadding="0" cellspacing="1" border="1"  class="display dataTable" width='100%'>
		<thead bgcolor='#ffff99'>
			<tr>
				<th align='center'>Kode</th>
				<th align='center'>Nama</th>
				<th align='center'>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?foreach($result->result() AS $r){?>
				<tr class='gradeC'>
					<td width='5%'><?=$r->kode_induk?></td>
					<td width='30%'><?=$r->nama_induk?></td>
					<td width='10%'>
						<a href="<?=site_url().'/satker/edit/'.$r->kode_induk?>" >Ubah </a> |
						<a href="<?=site_url().'/satker/proses_delete/'.$r->kode_induk?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" >Hapus</a>
					</td>
				</tr>
			<?}?>
		</tbody>
	</table>
</body>
</head>
</html>
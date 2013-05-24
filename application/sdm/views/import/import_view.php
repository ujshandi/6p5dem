<link rel="stylesheet" href="<?php  echo base_url() ?>css/table.css" type="text/css" media="screen" />
<div class="main" align="center">
<h1 align="center"><?= $title; ?></h1>
<?php 
	$attributes = array('id' => 'fmimport');
	echo form_open_multipart('import/eksekusi', $attributes);
?>	
	<div class="control-btn">
			<?php //echo anchor('form/add_lowongan', 'Tambah Lowongan', 'class=tombol')?>
	</div>
	<table  class='box-table-a'>
		<tr>
			<td>File</td>
			<td><input type="file" name="datafile"/></td>
		</tr>
		<tr>
			<td></td>
			<td> <input type="submit" value="Import"></td>
		</tr>
		<?if(isset($error)){?>
			<tr>
				<td></td>
				<td><font color="#F00"><?=$error?></font></td>
			</tr>
		<?}?>
		<?if(isset($success)){?>
			<tr>
				<td></td>
				<td><font color="#0F0"><?=$success?></font></td>
			</tr>
		<?}?>
	</table>
<?php form_close();?>
	
</div>

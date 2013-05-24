<html lang="en">
  <head>
    <meta charset="utf-8">
    
  </head>
<body>
    <!-- page content -->
    
    <h1 align="center">
      <?= $title ?>
    </h1>
    
<?php echo form_open('chain/edit'); ?>	
<table class="box-table-a" width="100%" border="1" bordercolor="#FFFFFF">
		<tr>
			<td width="125">ID</td>
			<td width="159" bgcolor="#FFFFFF"><?php echo form_input('id_peg_kementrian', $result->row()->id_peg_kementrian)?></td>
		</tr>
        <tr>
			<td width="125">NIP</td>
			<td width="159" bgcolor="#FFFFFF"><?php echo form_input('nip', $result->row()->nip)?></td>
		</tr>
		<tr>
			<td width="125">Nama</td>
			<td width="159" bgcolor="#FFFFFF"><?php echo form_input('nama', $result->row()->nama)?></td>
		</tr>
		<tr>
			<td width="125">Alamat</td>
			<td width="159" bgcolor="#FFFFFF"><?php echo form_input('alamat', $result->row()->alamat)?></td>
		</tr>
<tr>	  
<?php echo form_submit('submit','Update'); ?>
</tr>
</table>
<?php echo form_close(); ?> 
</body>
</html>
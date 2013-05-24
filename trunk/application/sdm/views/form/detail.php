<!DOCTYPE html>
<html>
<head>
<title><?=$title?></title>
<link rel="stylesheet" href="../../../css/tab/jquery-ui-1.8.16.custom.css">
</head>
<body>
    <div id="tabku">
        <ul>
            <li><a href="#a">Data Pegawai</a></li>
            <li><a href="#b">Diklat & Pelatihan</a></li>
        </ul>
        <div id="a">
    <?php echo form_open('chain/search'); ?>
	<input type="submit" value="Back">
    <!-- page content -->
	<table class="box-table-a" width="100%" border="1" bordercolor="#FFFFFF">
		<tr>
			<td width="125">NIP</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result1->row()->nip?></td>
		</tr>
		<tr>
			<td width="125">Nama</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result1->row()->nama?></td>
		</tr>
		<tr>
			<td width="125">Tempat Lahir</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result1->row()->tempat_lahir?></td>
		</tr>
		<tr>
			<td width="125">Tanggal Lahir</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result1->row()->tgl_lahir?></td>
		</tr>  
		<tr>
			<td width="125">Jenis Kelamin</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result1->row()->jenis_kelamin?></td>
		</tr>
		<tr>
			<td width="125">Agama</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result1->row()->agama?></td>
		</tr>
		<tr>
			<td width="125">Alamat</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result1->row()->alamat?></td>
		</tr>
	</table>
    <?php echo form_close(); ?>
        </div>
        <div id="b">
        <?php echo form_open('chain/search'); ?>
	<input type="submit" value="Back">
    <!-- page content -->
	<table class="box-table-a" width="100%" border="1" bordercolor="#FFFFFF">
    <tr>
      <td>No</td>
      <td>Tahun Diklat</td>
      <td>Nama Diklat</td>
      <td>Jenis Pelatihan</td>
    </tr>
    <?
		$i=1;
		foreach($result2->result() as $row){
	?>
			<tr>
			<td><?=$i?></td>
			<td><?=$row->tahun_diklat?></td>
			<td><?=$row->nama_diklat?></td>
			<td><?=$row->nama_jenis_pelatihan?></td>
			</tr>
	<?
			$i++;
		}
	?>
  	</table>
    <?php echo form_close(); ?>
        </div>
    </div><!--end of tabku-->
    
    <script src="../../../js/jquery-1.9.1.js">
    </script>
    <script src="../../../js/jquery.ui.core.js">
    </script>
    <script src="../../../js/jquery.ui.widget.js">
    </script>
    <script src="../../../js/jquery.ui.tabs.js">
    </script>
    <script>
    (function($){
        $("#tabku").tabs();
    })(jQuery);
    </script>

</body>
</html>
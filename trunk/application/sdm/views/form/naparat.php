<html lang="en">
  <head>
    <meta charset="utf-8">
  </head>
  <body><div class="main">
  
    <!-- page content -->
    <?php echo form_open('naparat/search'); ?>
    <h1 align="center"><?= $title ?></h1>
    <div id="provinsi">
    Matra : <br/>
    <?php
        echo form_dropdown("kodematra", $option_matra, $this->input->post('kodematra'),"id='kodematra'");
    ?>
    </div> 
    <td></td>
		<td> <input type="submit" value="Tampilkan"></td>
 	</tr>
    <?php echo form_close(); ?>
	<table class='box-table-a' width='100%'>
	  <tr>
		<th>No</th>
		<th>Npeg</th>
		<th>Nama</th>
        <th>Alamat</th>
        <th>Perusahaan</th>
		<th>Jabatan</th>
		<th>Golongan</th>
        <th>Aksi</th>
		<!--th>TMT</th>
		<th>Alamat</th>
		<th>Status</th>
		<th>Jml Anak</th>
		<th>Keterangan</th-->
	  </tr> 
	 </table>
  </div>
  </body>
</html>
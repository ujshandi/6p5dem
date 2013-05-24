<html lang="en">
  <head>
    <meta charset="utf-8">
  </head>
  <body><div class="main">
  
    <!-- page content -->
    <?php echo form_open('dinas/search'); ?>
    <h1 align="center"><?= $title ?></h1>
    <div id="provinsi">
   	Provinsi : <br/>
    <?php
        echo form_dropdown("kodeprovin", $option_prov, $this->input->post('kodeprovin'),"id='kodeprovin'");
    ?>
    </div>
 
    <div id="kabkota">
    Kabupaten/Kota :<br/>
    <?php
        echo form_dropdown("kodekabup",array('Pilih Kabupaten/Kota'=>'Pilih Provinsi Dahulu'),'',"id='kodekabup'",$this->input->post('kodekabup'));
    ?>
    </div>
     <td></td>
		<td> <input type="submit" value="Tampilkan"></td>
 	</tr>
    <?php echo form_close(); ?>
	<table class='box-table-a' width='100%'>
	  <tr>
		<th>No</th>
		<th>Nip</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>TMT</th>
		<th>Jabatan</th>
		<th>Golongan</th>
        <th>Aksi</th>
		<!--th>TMT</th>
		<th>Alamat</th>
		<th>Status</th>
		<th>Jml Anak</th>
		<th>Keterangan</th-->
	  </tr>
      <?
		$i=1;
		foreach($result->result() as $row){
	  ?>
      <tr>
		<td><?= $i ?></a></td>
		<td><?= $row->nip ?></a></td>
		<td><?= $row->nama_pegawai ?></a></td>
        <td><?= $row->alamat ?></a></td>
		<td><?= $row->tahun_pengangkatan ?></a></td>
		<td><?= $row->nama_jabatan ?></a></td>
		<td><?= $row->nama_golongan ?></a></td>
        <td><a href="<?=site_url('dinas/detail/'.$row->id_peg_dinas)?>">Detail</a></td>
	  </tr>
      <?
			$i++;
		}
	  ?>
	 </table>
    
    <script type="text/javascript">
        $("#kodeprovin").change(function(){
                var selectValues = $("#kodeprovin").val();
                if (selectValues == 0){
                    var msg = "Kabupaten/Kota :<br><select name=\"kodekabup\" disabled><option value=\"Pilih Kabupaten/Kota\">Pilih Provinsi Dahulu</option></select>";
                    $('#kabkota').html(msg);
                }else{
                    var kodeprovin = {kodeprovin:$("#kodeprovin").val()};
                    $('#kodekabup').attr("disabled",true);
                    $.ajax({
                            type: "POST",
                            url : "<?php echo site_url('dinas/select_kabkota')?>",
                            data: kodeprovin,
                            success: function(msg){
                                $('#kabkota').html(msg);
                            }
                    });
                }
        });
       </script>
  </div>
  </body>
</html>
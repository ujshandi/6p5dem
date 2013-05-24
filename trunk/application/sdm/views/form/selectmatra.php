<html lang="en">
  <head>
    <meta charset="utf-8">
    
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
  </head>
  <body>
    <!-- page content -->
    <?php echo form_open('chain/search'); ?>
    <h1 align="center"><?= $title ?></h1>
    <div id="matra">
   Pilih Matra : <br/>
    <?php
        echo form_dropdown("kodematra", $option_matra, $this->input->post('kodematra'),"id='kodematra'");
    ?>
    </div>
  
    <td><?php echo form_submit("submit","Tampilkan"); ?></td>
    <?php echo form_close(); ?>
    <? //if(isset($kemen)){?>
	<table class='box-table-a' width='100%'>
	  <tr>
		<th>No</th>
		<th>Nip</th>
		<th>Nama</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Jabatan</th>
		<th>Golongan</th>
		<th>Aksi</th>
		<!--th>Alamat</th>
		<th>Status</th>
		<th>Jml Anak</th>
		<th>Keterangan</th-->
	  </tr>
	<?php //foreach($kemen as $list){?> 
	  <tr>
		<td><?php //$list->id_peg_kementrian ?></a></td>
		<td><?php //$list->nip ?></a></td>
		<td><?php //$list->nama ?></a></td>
		<td><?php //$list->tempat_lahir ?></a></td>
		<td><?php //$list->tgl_lahir ?></a></td>
		<td><?php //$list->jenis_kelamin ?></a></td>
		<td><?php //$list->agama ?></a></td>
		<td><a href="#">Detail<?php //$list->tahun_pengangkatan ?></a></td>
		
	  </tr>
	 <? //} ?>
	</table>
	<? //}?>
	<?php echo $this->pagination->create_links(); ?>
    
    <script type="text/javascript">
        $("#kodematra").change(function(){
                var selectValues = $("#kodematra").val();
                if (selectValues == 0){
                    var msg = "Eselon II :<br><select name=\"id_eselon_2\" disabled><option value=\"Pilih Eselon II\">Pilih Eselon I Dahulu</option></select>";
                    $('#eselon2').html(msg);
                }else{
                    var id_eselon_1 = {id_eselon_1:$("#id_eselon_1").val()};
                    $('#id_eselon_2').attr("disabled",true);
                    $.ajax({
                            type: "POST",
                            url : "<?php echo site_url('chain/select_eselon2')?>",
                            data: id_eselon_1,
                            success: function(msg){
                                $('#eselon2').html(msg);
                            }
                    });
                }
        });
            $('body').delegate("#id_eselon_2","change", function() {
                var selectValues = $("#id_eselon_2").val();
                if (selectValues == 0){
                    var msg = "Eselon III :<br><select name=\"id_eselon_3\" disabled><option value=\"Pilih Eselon III\">Pilih Eselon II Dahulu</option></select>";
                    $('#eselon3').html(msg);
                }else{
                    var id_eselon_2 = {id_eselon_2:$("#id_eselon_2").val()};
                    $('#id_eselon_3').attr("disabled",true);
                    $.ajax({
                            type: "POST",
                            url : "<?php echo site_url('chain/select_eselon3')?>",
                            data: id_eselon_2,
                            success: function(msg){
                                $('#eselon3').html(msg);
                            }
                    });
                }
        });
       </script>
  </body>
</html>
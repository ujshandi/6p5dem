<!-- page content -->
	<div class="wrap_right bgcontent">
	<h1 class="heading">Data Aparatur Dinas Berdasarkan Duk</h1>
    
	<?=form_open('sdm_dinas/search_duk')?>
	<div id="provin">
   Provinsi : <br/>
    <?php
        echo form_dropdown("KODEPROVIN", $option_provin, $this->input->post('KODEPROVIN'),"id='KODEPROVIN'");
    ?>
    </div>
 
    <div id="kabupkota">
    Kabupaten/Kota :<br/>
    <?php
        echo form_dropdown("KODEKABUP",array('0'=>'Pilih Provinsi Dahulu'),'',"id='KODEKABUP'",$this->input->post('KODEKABUP'));
    ?>
    </div>
 
    <td></td>
		<td><input class="greenbutton" type="submit" value="TAMPILKAN" style="float:LEFT"/></td>
 	</tr>
    <?=form_close() ?>

	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/golongan/add'?>">Tambah Data</a>
	<table class="box-table-a" width="100%" border="1" bordercolor="#FFFFFF">
    <thead>
	<tr>
      <th width="4%" rowspan="2">No</th>
      <th width="21%" rowspan="2">Nama</th>
      <th width="12%" rowspan="2">Nip</th>
      <th colspan="2">Pangkat</th>
      <th colspan="2">Jabatan</th>
      <th width="10%" rowspan="2">TMT</th>
      <th width="6%" rowspan="2">Aksi</th>
    </tr>
    <tr>
      <th width="6%">Gol</th>
      <th width="6%">TMT</th>
      <th width="27%">Jabatan</th>
      <th width="8%">TMT</th>
    </tr>
	</thead>
 </table>
	<div class="clear">&nbsp;</div>
	<?=$this->pagination->create_links()?>
</div>
    
    <script type="text/javascript">
        $("#KODEPROVIN").change(function(){
                var selectValues = $("#KODEPROVIN").val();
                if (selectValues == 0){
                    var msg = "Kabupaten/Kota :<br><select name=\"KODEKABUP\" disabled><option value=\"0\">Pilih Provinsi Dahulu</option></select>";
                    $('#kabupkota').html(msg);
                }else{
                    var KODEPROVIN = {KODEPROVIN:$("#KODEPROVIN").val()};
                    $('#KODEKABUP').attr("disabled",true);
                    $.ajax({
                            type: "POST",
                            url : "<?php echo site_url('sdm_dinas/select_kabupkota')?>",
                            data: KODEPROVIN,
                            success: function(msg){
                                $('#kabupkota').html(msg);
                            }
                    });
                }
        });
    </script>
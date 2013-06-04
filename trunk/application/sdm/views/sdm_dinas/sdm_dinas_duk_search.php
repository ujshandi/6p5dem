<!-- page content -->
	<div class="wrap_right bgcontent">
	<h1 class="heading">Data Aparatur Dinas Berdasarkan Duk</h1>
    <hr/>
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
 	<hr/>
    <?=form_close() ?>
	<table class="box-table-a" width="100%" border="1" bordercolor="#FFFFFF">
    <thead>
	<tr>
      <th width="4%" rowspan="2">No</th>
      <th width="12%" rowspan="2">Nip</th>
	  <th width="21%" rowspan="2">Nama</th>
      <th colspan="2" align="center">Pangkat</th>
      <th colspan="2" align="center">Jabatan</th>
      <th width="15%" rowspan="2" align="center">Tahun Pengangkatan</th>
    </tr>
    <tr>
      <th width="6%" align="center">Gol</th>
      <th width="6%" align="center">TMT</th>
      <th width="20%">Jabatan</th>
      <th width="8%" align="center">TMT</th>
    </tr>
	</thead>
	<tbody>
	  <?
		$i=1;
		foreach($result->result() as $row){
	  ?>
		<tr class='gradeC'>
			<td width='5%'><?=$i?></td>
			<td width='8%'><?=$row->NIP?></td>
			<td width='10%'><?=$row->NAMA?></td>
			<td width='5%' align="center"><?=$row->NAMA_GOLONGAN?></td>
			<td width='5%' align="center"><?=$row->TMT_GOLONGAN?></td>
			<td width='8%'><?=$row->NAMA_JABATAN?></td>
			<td width='5%' align="center"><?=$row->TMT_JABATAN?></td>
			<td width='5%' align="center"><?=$row->TMT?></td>
			</tr>
      <?
		$i++;
		}
	  ?>
	  </tbody>
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
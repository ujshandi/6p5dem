<!-- page content -->
	<div class="wrap_right bgcontent">
	<h1 class="heading">Data DUK Aparatur Kementerian</h1>
    <hr/>
	<?=form_open('sdm_kementerian/search_duk_new')?>
	<div id="kantor">
   <h2>Kantor : </h2>
    <?php
        echo form_dropdown("KODEKANTOR", $option_kantor, $this->input->post('KODEKANTOR'),"id='KODEKANTOR'");
    ?>
    </div>
 
    <div id="unit">
    <h2>Satker :</h2>
    <?php
        echo form_dropdown("KODEUNIT", $option_satker, $this->input->post('KODEUNIT'),"id='KODEUNIT'");
    ?>
    </div>
	<hr/>
    <td></td>
		<td><input class="greenbutton" type="submit" value="Tampilkan" style="float:left"/></td>
    <?=form_close() ?>
	<li style="float:right">
	<a href="<?=base_url().$this->config->item('index_page').'/sdm_kementerian/add'?>" class="control"> <span class="add">Tambah Data</span></a>
	</li>
	<hr/>
	<table width="100%">
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
			<td width='5%'><?=$row->NIP?></td>
			<td width='20%'><?=$row->NAMA?></td>
			<td width='3%' align="center"><?=$row->NAMA_GOLONGAN?></td>
			<td width='5%' align="center"><?=$row->TMTGOLONGAN?></td>
			<td width='20%'><?=$row->JABATAN?></td>
			<td width='5%' align="center"><?=$row->TMTJABATAN?></td>
			<td width='5%' align="center"><?=$row->TMTPNS?></td>
		</tr>
      <?
		$i++;
		}
	  ?>
	  </tbody>
	</table>
	<div class="clear">&nbsp;</div>
	<div class="paging right">
          <ul>
            <li><?=$this->pagination->create_links()?></li>
          </ul>
        </div>
</div>
    
    <script type="text/javascript">
        $("#KODEKANTOR").change(function(){
                var selectValues = $("#KODEKANTOR").val();
                if (selectValues == 0){
                    var msg = "Satker :<br><select name=\"KODEUNIT\" disabled><option value=\"0\">Pilih Kantor Dahulu</option></select>";
                    $('#unit').html(msg);
                }else{
                    var KODEKANTOR = {KODEKANTOR:$("#KODEKANTOR").val()};
                    $('#KODEUNIT').attr("disabled",true);
                    $.ajax({
                            type: "POST",
                            url : "<?php echo site_url('sdm_kementerian/select_satker')?>",
                            data: KODEKANTOR,
                            success: function(msg){
                                $('#unit').html(msg);
                            }
                    });
                }
        });
    </script>
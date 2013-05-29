<!-- page content -->
	<div class="wrap_right bgcontent">
	<h1 class="heading">Data Aparatur Dinas</h1>
    
	<?=form_open('sdm_dinas/search')?>
	<div id="provin">
   Provinsi : <br/>
    <?php
        echo form_dropdown("KODEPROVIN", $option_provin, $this->input->post('KODEPROVIN'),"id='KODEPROVIN'");
    ?>
    </div>
 
    <div id="kabupkota">
    Kabupaten/Kota :<br/>
    <?php
        echo form_dropdown("KODEPROVIN", $option_kabupkota, $this->input->post('KODEKABUP'),"id='KODEKABUP'");
    ?>
    </div>
 
    <td></td>
		<td><input class="greenbutton" type="submit" value="Tampilkan" style="float:left"/></td>
 	</tr>
    <?=form_close() ?>
	<li style="float:right">
	<a href="<?=base_url().$this->config->item('index_page').'/golongan/add'?>" class="control"> <span class="add">Tambah Data</span></a>
	</li>
	<table width="100%">
	  <thead>
		<th>No</th>
		<th>NIP</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>TMT</th>
		<th>Jabatan</th>
		<th>Golongan</th>
		<th>aksi</th>
	  <?
		$i=1;
		foreach($result->result() as $row){
	  ?>
		<tr>
				<td width='5%'><?=$i?></td>
				<td width='8%'><?=$row->NIP?></td>
				<td width='15%'><?=$row->NAMA?></td>
				<td width='10%'><?=$row->ALAMAT?></td>
				<td width='5%'><?=$row->TMT?></td>
				<td width='15%'><?=$row->NAMA_JABATAN?></td>
				<td width='5%'><?=$row->NAMA_GOLONGAN?></td>
				<td width='7%'>
					<a href="<?=site_url().'/sdm_dinas/add_diklat/'.$row->ID_PEG_DINAS?>">
						<img src="<?=base_url()?>asset/sdm2/images/ic-add.png" />&nbsp;
					</a>
					<a href="<?=site_url().'/sdm_dinas/edit/'.$row->ID_PEG_DINAS?>">
						<img src="<?=base_url()?>asset/sdm2/images/ic-edit.png" />&nbsp; 
					</a>
					<a href="<?=site_url().'/sdm_dinas/detail/'.$row->ID_PEG_DINAS?>">
						<img src="<?=base_url()?>asset/sdm2/images/check.png" />
					</a>
				</td>
			</tr>
      <?
		$i++;
		}
	  ?>
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
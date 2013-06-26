<!-- page content -->
	<div class="wrap_right bgcontent">
	<h1 class="heading">Data Aparatur Kementerian</h1>
    <hr/>
	<?=form_open('sdm_kementerian/search_new')?>
	<div id="kantor">
   <h2>Kantor : </h2>
    <?php
        echo form_dropdown("KODEKANTOR", $option_kantor, $this->input->post('KODEKANTOR'),"id='KODEKANTOR'");
    ?>
    </div>
    <div id="unit">
    <h2>Satker :</h2>
    <?php
        echo form_dropdown("KODEUNIT",array('0'=>'Pilih Kantor Dahulu'),'',"id='KODEUNIT'",$this->input->post('KODEUNIT'));
    ?>
    </div>
 	<hr/>
    <td></td>
		<td><input class="greenbutton" type="submit" value="TAMPILKAN" style="float:LEFT"/></td>
    <?=form_close() ?>
	<li style="float:RIGHT">
	<a href="<?=base_url().$this->config->item('index_page').'/sdm_kementerian/add'?>" class="control"> <span class="add">Tambah Data</span></a>
	</li>
	<hr/>
	<table width="100%">
	  <thead>
		<th>NIP</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>TMT</th>
		<th>Jabatan</th>
		<th>Golongan</th>
		<th>aksi</th>
	  </thead>
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
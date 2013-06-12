<!-- page content -->
	<div class="wrap_right bgcontent">
	<h1 class="heading">Data Pegawai BUMN</h1>
    <hr/>
	<?=form_open('sdm_bumn/search')?>
	<div id="matra">
   Matra : <br/>
    <?php
        echo form_dropdown("KODEMATRA", $option_matra, $this->input->post('KODEMATRA'),"id='KODEMATRA'");
    ?>
    </div>
 
    <div id="bumn">
    BUMN :<br/>
    <?php
        echo form_dropdown("KODEBUMN",array('0'=>'Pilih Matra Dahulu'),'',"id='KODEBUMN'",$this->input->post('KODEBUMN'));
    ?>
    </div>
 
    <td></td>
		<td><input class="greenbutton" type="submit" value="TAMPILKAN" style="float:LEFT"/></td>
 	<hr/>
    <?=form_close() ?>
	<li style="float:left">
	<a href="<?=base_url().$this->config->item('index_page').'/sdm_bumn/add'?>" class="control"> <span class="add">Tambah Data</span></a>
	</li>
	<table width="100%">
	  <thead>
		<th>NIK</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>BUMN</th>
		<th>Jabatan</th>
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
        $("#KODEMATRA").change(function(){
                var selectValues = $("#KODEMATRA").val();
                if (selectValues == 0){
                    var msg = "BUMN :<br><select name=\"KODEKABUP\" disabled><option value=\"0\">Pilih Matra Dahulu</option></select>";
                    $('#bumn').html(msg);
                }else{
                    var KODEMATRA = {KODEMATRA:$("#KODEMATRA").val()};
                    $('#KODEBUMN').attr("disabled",true);
                    $.ajax({
                            type: "POST",
                            url : "<?php echo site_url('sdm_bumn/select_bumn')?>",
                            data: KODEMATRA,
                            success: function(msg){
                                $('#bumn').html(msg);
                            }
                    });
                }
        });
    </script>
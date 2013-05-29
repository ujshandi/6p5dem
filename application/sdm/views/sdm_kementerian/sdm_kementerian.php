<!-- page content -->
	<div class="wrap_right bgcontent">
	<h1 class="heading">Data Aparatur Kementerian</h1>
    
	<?=form_open('sdm_kementerian/search')?>
	<div id="eselon1">
   Eselon I : <br/>
    <?php
        echo form_dropdown("ID_ESELON_1", $option_eselon1, $this->input->post('ID_ESELON_1'),"id='ID_ESELON_1'");
    ?>
    </div>
 
    <div id="eselon2">
    Eselon II :<br/>
    <?php
        echo form_dropdown("ID_ESELON_2",array('0'=>'Pilih Eselon I Dahulu'),'',"id='ID_ESELON_2'",$this->input->post('ID_ESELON_2'));
    ?>
    </div>
 
    <div id="eselon3">
    Eselon III :<br/>
    <?php
        echo form_dropdown("ID_ESELON_3",array('0'=>'Pilih Eselon II Dahulu'),'',"id='ID_ESELON_3'",$this->input->post('ID_ESELON_3'));
    ?>
    </div>
    
    <div id="eselon4">
    Eselon IV :<br/>
    <?php
        echo form_dropdown("ID_ESELON_4",array('0'=>'Pilih Eselon III Dahulu'),'',"id='ID_ESELON_4'",$this->input->post('ID_ESELON_4') );
    ?>
    </div>
 
    <td></td>
		<td><input class="greenbutton" type="submit" value="TAMPILKAN" style="float:LEFT"/></td>
 	<hr/>
    <?=form_close() ?>
	<li style="float:left">
	<a href="<?=base_url().$this->config->item('index_page').'/sdm_kementerian/add'?>" class="control"> <span class="add">Tambah Data</span></a>
	</li>
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
        $("#ID_ESELON_1").change(function(){
                var selectValues = $("#ID_ESELON_1").val();
                if (selectValues == 0){
                    var msg = "Eselon II :<br><select name=\"ID_ESELON_2\" disabled><option value=\"0\">Pilih Eselon I Dahulu</option></select>";
                    $('#eselon2').html(msg);
                }else{
                    var ID_ESELON_1 = {ID_ESELON_1:$("#ID_ESELON_1").val()};
                    $('#ID_ESELON_2').attr("disabled",true);
                    $.ajax({
                            type: "POST",
                            url : "<?php echo site_url('sdm_kementerian/select_eselon2')?>",
                            data: ID_ESELON_1,
                            success: function(msg){
                                $('#eselon2').html(msg);
                            }
                    });
                }
        });
            $('body').delegate("#ID_ESELON_2","change", function() {
                var selectValues = $("#ID_ESELON_2").val();
                if (selectValues == 0){
                    var msg = "Eselon III :<br><select name=\"ID_ESELON_3\" disabled><option value=\"0\">Pilih Eselon II Dahulu</option></select>";
                    $('#eselon3').html(msg);
                }else{
                    var ID_ESELON_2 = {ID_ESELON_2:$("#ID_ESELON_2").val()};
                    $('#ID_ESELON_3').attr("disabled",true);
                    $.ajax({
                            type: "POST",
                            url : "<?php echo site_url('sdm_kementerian/select_eselon3')?>",
                            data: ID_ESELON_2,
                            success: function(msg){
                                $('#eselon3').html(msg);
                            }
                    });
                }
        });
		$('body').delegate("#ID_ESELON_3","change", function() {
                var selectValues = $("#ID_ESELON_3").val();
                if (selectValues == 0){
                    var msg = "Eselon IV :<br><select name=\"ID_ESELON_4\" disabled><option value=\"0\">Pilih Eselon III Dahulu</option></select>";
                    $('#eselon4').html(msg);
                }else{
                    var ID_ESELON_3 = {ID_ESELON_3:$("#ID_ESELON_3").val()};
                    $('#ID_ESELON_4').attr("disabled",true);
                    $.ajax({
                            type: "POST",
                            url : "<?php echo site_url('sdm_kementerian/select_eselon4')?>",
                            data: ID_ESELON_3,
                            success: function(msg){
                                $('#eselon4').html(msg);
                            }
                    });
                }
        });
    </script>
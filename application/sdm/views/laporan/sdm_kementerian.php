<html lang="en">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
  <div class="main">
  
    <!-- page content -->
    <?php echo form_open('lap_sdm_kementerian/pdf', array('target'=>'_blank')); ?>
    <h1 align="center"><?= $title ?></h1>
    <div id="eselon1">
   Eselon I : <br/>
    <?php
        echo form_dropdown("id_eselon_1", $option_eselon1, $this->input->post('id_eselon_1'),"id='id_eselon_1'");
    ?>
    </div>
 
    <div id="eselon2">
    Eselon II :<br/>
    <?php
        echo form_dropdown("id_eselon_2",array('0'=>'Pilih Eselon I Dahulu'),'',"id='id_eselon_2'",$this->input->post('id_eselon_2'));
    ?>
    </div>
 
    <div id="eselon3">
    Eselon III :<br/>
    <?php
        echo form_dropdown("id_eselon_3",array('0'=>'Pilih Eselon II Dahulu'),'',"id='id_eselon_3'",$this->input->post('id_eselon_3'));
    ?>
    </div>
    
    <div id="eselon4">
    Eselon IV :<br/>
    <?php
        echo form_dropdown("id_eselon_4",array('0'=>'Pilih Eselon III Dahulu'),'',"id='id_eselon_4'",$this->input->post('id_eselon_4') );
    ?>
    </div>
 
    <td></td>
		<td> <input type="submit" value="Print Laporan"></td>
 	</tr>
    <?php echo form_close(); ?>
	
  </div>
  <script type="text/javascript">
	$("#id_eselon_1").change(function(){
			var selectValues = $("#id_eselon_1").val();
			if (selectValues == 0){
				var msg = "Eselon II :<br><select name=\"id_eselon_2\" disabled><option value=\"0\">Pilih Eselon I Dahulu</option></select>";
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
				var msg = "Eselon III :<br><select name=\"id_eselon_3\" disabled><option value=\"0\">Pilih Eselon II Dahulu</option></select>";
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
	$('body').delegate("#id_eselon_3","change", function() {
			var selectValues = $("#id_eselon_3").val();
			if (selectValues == 0){
				var msg = "Eselon IV :<br><select name=\"id_eselon_4\" disabled><option value=\"0\">Pilih Eselon III Dahulu</option></select>";
				$('#eselon4').html(msg);
			}else{
				var id_eselon_3 = {id_eselon_3:$("#id_eselon_3").val()};
				$('#id_eselon_4').attr("disabled",true);
				$.ajax({
						type: "POST",
						url : "<?php echo site_url('chain/select_eselon4')?>",
						data: id_eselon_3,
						success: function(msg){
							$('#eselon4').html(msg);
						}
				});
			}
	});
   </script>
  </body>
</html>
<!-- page content -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Print Laporan DUK Aparatur Kementerian</h1> 
 <?php echo form_open('lap_duk_sdm_kementerian/pdf', array('target'=>'_blank')); ?>
    <div id="kantor">
   KANTOR : <br/>
    <?php
        echo form_dropdown("KODEKANTOR", $option_kantor, $this->input->post('KODEKANTOR'),"id='KODEKANTOR'");
    ?>
    </div>
 
    <div id="unit">
    SATKER :<br/>
    <?php
        echo form_dropdown("KODEUNIT",array('0'=>'Pilih Kantor Dahulu'),'',"id='KODEUNIT'",$this->input->post('KODEUNIT'));
    ?>
    </div>
 
    <td></td>
		<td><input class="greenbutton" type="submit" value="TAMPILKAN" style="float:LEFT"/></td>
 	<hr/>
    <?=form_close() ?>
</div>
	
    <script type="text/javascript">
        $("#KODEKANTOR").change(function(){
                var selectValues = $("#KODEKANTOR").val();
                if (selectValues == 0){
                    var msg = "SATKER :<br><select name=\"KODEUNIT\" disabled><option value=\"0\">Pilih Kantor Dahulu</option></select>";
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
  </div>
  </body>
</html>
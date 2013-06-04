<!-- page content -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Print Laporan Aparatur Dinas</h1> 
 <?php echo form_open('lap_sdm_dinas/pdf', array('target'=>'_blank')); ?>
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
  </div>
  </body>
</html>
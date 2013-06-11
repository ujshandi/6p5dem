<!-- page content -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Print Laporan Pegawai BUMN</h1> 
 <?php echo form_open('lap_sdm_bumn/pdf', array('target'=>'_blank')); ?>
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
</div>
	
    <script type="text/javascript">
        $("#KODEMATRA").change(function(){
                var selectValues = $("#KODEMATRA").val();
                if (selectValues == 0){
                    var msg = "BUMN :<br><select name=\"KODEBUMN\" disabled><option value=\"0\">Pilih Matra Dahulu</option></select>";
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
  </div>
  </body>
</html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  </head>
  <body><div class="main">
  
    <!-- page content -->
    <?php echo form_open('lap_sdm_dinas/pdf', array('target'=>'_blank')); ?>
    <h1 align="center"><?= $title ?></h1>
    <div id="provinsi">
   Provinsi : <br/>
    <?php
        echo form_dropdown("kodeprovin", $option_prov, $this->input->post('kodeprovin'),"id='kodeprovin'");
    ?>
    </div>
 
    <div id="kabkota">
    Kabupaten/Kota :<br/>
    <?php
        echo form_dropdown("kodekabup",array('0'=>'Pilih Provinsi Dahulu'),'',"id='kodekabup'",$this->input->post('kodekabup'));
    ?>
    </div> 
    <td></td>
		<td> <input type="submit" value="Print Laporan"></td>
 	</tr>
    <?php echo form_close(); ?>
	
    <script type="text/javascript">
        $("#kodeprovin").change(function(){
                var selectValues = $("#kodeprovin").val();
                if (selectValues == 0){
                    var msg = "Kabupaten/Kota :<br><select name=\"kodekabup\" disabled><option value=\"Pilih Kabupaten/Kota\">Pilih Provinsi Dahulu</option></select>";
                    $('#kabkota').html(msg);
                }else{
                    var kodeprovin = {kodeprovin:$("#kodeprovin").val()};
                    $('#kodekabup').attr("disabled",true);
                    $.ajax({
                            type: "POST",
                            url : "<?php echo site_url('dinas/select_kabkota')?>",
                            data: kodeprovin,
                            success: function(msg){
                                $('#kabkota').html(msg);
                            }
                    });
                }
        });
       </script>
  </div>
  </body>
</html>
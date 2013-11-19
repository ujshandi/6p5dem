<div class="wrap_right bgcontent">
<h1 class="heading">Tambah Data Pegawai BUMN</h1>
<hr/>
			<li><input class="greenbutton" type="submit" value="Back" style="float:left"/></li>
<?=form_close()?>
        <hr/>
        <?=form_open('sdm_bumn_ver2/proses_add', array('class'=>'sform'))?>
            <fieldset>
                <ol>
                    <li><div id="matra"><label>Matra   <em>*</em></label>
						<?php
							echo form_dropdown("KODEMATRA", $option_matra, $this->input->post('KODEMATRA'),"id='KODEMATRA'");
						?></div>
					<li><div id="bumn"><label>BUMN <em>*</em></label>
						<?php
							echo form_dropdown("KODEBUMN",array('0'=>'Pilih BUMN Dahulu'),'',"id='KODEBUMN'",$this->input->post('KODEBUMN'));
						?></div>
					<li><label for="">TAHUN<em>*</em></label> 
					<select name="TAHUN" id="TAHUN">
					<?php 
					$opti['value'] = set_value('TAHUN');
					echo $this->mdl_sdm_bumn_ver2->getOptionTahun($opti);
					?>
					</select>
					</li>
					<li><label for="">JUMLAH SDM <em>*</em></label> <input name="JUMLAHSDM" value="<?=set_value('JUMLAHSDM')?>" type="text"/></li>
					<li><label for="">PENDIDIKAN TRANSPORTASI <em>*</em></label> <input name="PEND_TRANSPORTASI" value="<?=set_value('PEND_TRANSPORTASI')?>" type="text"/>
					<div class="clearfix">&nbsp;</div>
                    <hr/>
                    <li><div class="four right tr"><input class="greenbutton" type="submit" value="SUBMIT" style="margin-right:10px"/><input class="greenbutton" type="submit" value="RESET"/></div></li>
                </ol>
            </fieldset>
		<?=form_close()?>
		
		</div>
        <div class="clearfix">&nbsp;</div>
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
                            url : "<?php echo site_url('sdm_bumn_ver2/select_bumn2')?>",
                            data: KODEMATRA,
                            success: function(msg){
                                $('#bumn').html(msg);
                            }
                    });
                }
        });
    </script>
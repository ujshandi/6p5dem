<div class="wrap_right bgcontent">
<h1 class="heading">Tambah Data Standar  Kompetensi</h1>
<?=form_open('standar_udara', array('class'=>'sform'))?>
<hr/>
			<li><input class="greenbutton" type="submit" value="Back" style="float:left"/></li>
<?=form_close()?>
        <hr/>
        <?=form_open('standar_udara/proses_add', array('class'=>'sform'))?>
            <fieldset>
			<?php 
			if(validation_errors())
			{
		?>
				<ul class="message error grid_12">
					<li><?=validation_errors()?></li>
					<li class="close-bt"></li>
				</ul>	
		<?php
			} 
		?>
                <ol>
                    <li><div id="kategori"><label>Kategori  <em>*</em></label>
						<?php
							echo form_dropdown("KODE_KATEG_KOPETENSI", $option_kategori, $this->input->post('KODE_KATEG_KOPETENSI'),"id='KODE_KATEG_KOPETENSI'");
						?></div>
					<li><div id="tingkat"><label>Tingkat  <em>*</em></label>
						<?php
							echo form_dropdown("KODE_TINGKAT", $option_tingkat, $this->input->post('KODE_TINGKAT'),"id='KODE_TINGKAT'");
						?></div>

					<li><label for="">Kode Kopetensi <em>*</em></label> <input name="KODE_STANDAR_UDARA" value="<?=set_value('KODE_STANDAR_UDARA')?>" type="text" class="three"/></li>
                    <li><label for="">Deskripsi <em>*</em></label> <input name="NAMA_STANDAR" value="<?=set_value('NAMA_STANDAR')?>" type="text" class="eight"/></li>
					<div class="clearfix">&nbsp;</div>
                    <hr/>
                    <li><div class="four right tr"><input class="greenbutton" type="submit" value="SUBMIT" style="margin-right:10px"/><input class="greenbutton" type="submit" value="RESET"/></div></li>
                </ol>
            </fieldset>
		<?=form_close()?>
		
		</div>
        <div class="clearfix">&nbsp;</div>
		    <script type="text/javascript">
        $("#KODE_KATEG_KOPETENSI").change(function(){
                var selectValues = $("#KODE_KATEG_KOPETENSI").val();
                if (selectValues == 0){
                    var msg = "<label>Tingkat  <em>*</em></label><select name=\"KODE_TINGKAT\" disabled><option value=\"0\">Pilih Kategori Dahulu</option></select>";
                    $('#tingkat').html(msg);
                }else{
                    var KODE_KATEG_KOPETENSI = {KODE_KATEG_KOPETENSI:$("#KODE_KATEG_KOPETENSI").val()};
                    $('#KODE_TINGKAT').attr("disabled",true);
                    $.ajax({
                            type: "POST",
                            url : "<?php echo site_url('standar_udara/select_tingkat2')?>",
                            data: KODE_KATEG_KOPETENSI,
                            success: function(msg){
                                $('#tingkat').html(msg);
                            }
                    });
                }
        });
    </script>
		<div class="wrap_right bgcontent">
		<h1 class="heading">Tambah Data Pegawai Dinas</h1>
		<?=form_open('sdm_bumn/search', array('class'=>'sform'))?>
<hr/>
			<li><input class="greenbutton" type="submit" value="Back" style="float:left"/></li>
<?=form_close()?>
        <hr/>
        <?=form_open('sdm_bumn/proses_add', array('class'=>'sform'))?>
            <fieldset>
                <ol>
					<li><label for="">NIK <em>*</em></label> <input name="NIK" value="<?=set_value('NIK')?>" type="text" class="five"/><small>*Format : 1234545644</small></li>
                    <li><label for="">Nama Lengkap <em>*</em></label> <input name="NAMA" value="<?=set_value('NAMA')?>" type="text" class="five"/></li>
                    <li><label for="">Tempat Lahir <em>*</em></label> <input name="TMPT_LAHIR" value="<?=set_value('TMPT_LAHIR')?>" type="text"/></li>
					<li><label for="">Tanggal Lahir <em>*</em></label> <input name="TGL_LAHIR" value="<?=set_value('TGL_LAHIR')?>" type="text"/><small>*Format : YYYY-MM-DD</small></li>
                    <li><label for="">jenis kelamin <em>*</em></label> <select name="JENIS_KELAMIN">
								<option value="Pria">Pria</option>
								<option value="Wanita">Wanita</option>
						</select></li>
					<li><label for="">Agama <em>*</em></label> <input name="AGAMA" value="<?=set_value('AGAMA')?>" type="text"/>
                    <li><div id="matra"><label>Matra   <em>*</em></label>
						<?php
							echo form_dropdown("KODEMATRA", $option_matra, $this->input->post('KODEMATRA'),"id='KODEMATRA'");
						?></div>
					<li><div id="bumn"><label>BUMN <em>*</em></label>
						<?php
							echo form_dropdown("KODEBUMN",array('0'=>'Pilih BUMN Dahulu'),'',"id='KODEBUMN'",$this->input->post('KODEBUMN'));
						?></div>
					<li><label for="">alamat sesuai identitas <em>*</em></label> <input name="ALAMAT" value="<?=set_value('ALAMAT')?>" type="text" class="eight"/></li>
					<li><label for="">Status Perkawinan <em>*</em></label> <select name="STATUS">
								<option value="Lajang">Lajang</option>
								<option value="Menikah">Menikah</option>
						</select></li>
					<li><label for="">Jumlah Anak <em>*</em></label> <input name="JML_ANAK" value="<?=set_value('JML_ANAK')?>" type="text"/>
					<li><label>Jabatan   <em>*</em></label>
						<?php
							echo form_dropdown("ID_JABATAN", $option_jabatan, $this->input->post('ID_JABATAN'),"id='ID_JABATAN'");
						?>
					<li><label for="">Keterangan <em>*</em></label> <input name="KETERANGAN" value="<?=set_value('KETERANGAN')?>" type="text" class="eight"/>
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
                            url : "<?php echo site_url('sdm_bumn/select_bumn2')?>",
                            data: KODEMATRA,
                            success: function(msg){
                                $('#bumn').html(msg);
                            }
                    });
                }
        });
    </script>
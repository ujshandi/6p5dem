		<div class="wrap_right bgcontent">
		<h1 class="heading">Tambah Data Pegawai Kementerian</h1>
		<?=form_open('sdm_kementerian/search', array('class'=>'sform'))?>
<hr/>
			<li><input class="greenbutton" type="submit" value="Back" style="float:left"/></li>
<?=form_close()?>
        <hr/>
        <?=form_open('sdm_kementerian/proses_add', array('class'=>'sform'))?>
            <fieldset>
                <ol>
					<li><label for="">NIP <em>*</em></label> <input name="NIP" value="<?=set_value('NIP')?>" type="text" class="five"/><small>*Format : 1234545644</small></li>
                    <li><label for="">Nama Lengkap <em>*</em></label> <input name="NAMA" value="<?=set_value('NAMA')?>" type="text" class="five"/></li>
                    <li><label for="">Tempat Lahir <em>*</em></label> <input name="TMPT_LAHIR" value="<?=set_value('TMPT_LAHIR')?>" type="text"/></li>
					<li><label for="">Tanggal Lahir <em>*</em></label> <input name="TGL_LAHIR" value="<?=set_value('TGL_LAHIR')?>" type="text"/><small>*Format : YYYY-MM-DD</small></li>
                    <li><label for="">jenis kelamin <em>*</em></label> <select name="JENIS_KELAMIN">
								<option value="Pria">Pria</option>
								<option value="Wanita">Wanita</option>
						</select></li>
					<li><label for="">Agama <em>*</em></label> <input name="AGAMA" value="<?=set_value('AGAMA')?>" type="text"/>
                    <li><div id="eselon1"><label>Eselon I   <em>*</em></label>
						<?php
							echo form_dropdown("ID_ESELON_1", $option_eselon1, $this->input->post('ID_ESELON_1'),"id='ID_ESELON_1'");
						?></div>
					<li><div id="eselon2"><label>Eselon II <em>*</em></label>
						<?php
							echo form_dropdown("ID_ESELON_2",array('0'=>'Pilih Eselon I Dahulu'),'',"id='ID_ESELON_2'",$this->input->post('ID_ESELON_2'));
						?></div>
					<li><div id="eselon3"><label>Eselon III <em>*</em></label>
						<?php
							echo form_dropdown("ID_ESELON_3",array('0'=>'Pilih Eselon II Dahulu'),'',"id='ID_ESELON_3'",$this->input->post('ID_ESELON_3'));
						?></div>
					<li><div id="eselon4"><label>Eselon IV <em>*</em></label>
						<?php
							echo form_dropdown("ID_ESELON_4",array('0'=>'Pilih Eselon III Dahulu'),'',"id='ID_ESELON_4'",$this->input->post('ID_ESELON_4'));
						?></div>
					<li><label for="">alamat sesuai identitas <em>*</em></label> <input name="ALAMAT" value="<?=set_value('ALAMAT')?>" type="text" class="eight"/></li>
					<li><label for="">Status Perkawinan <em>*</em></label> <select name="STATUS">
								<option value="Lajang">Lajang</option>
								<option value="Menikah">Menikah</option>
						</select></li>
					<li><label for="">Jumlah Anak <em>*</em></label> <input name="JML_ANAK" value="<?=set_value('JML_ANAK')?>" type="text"/>
					<li><label>Golongan   <em>*</em></label>
						<?php
							echo form_dropdown("ID_GOLONGAN", $option_golongan, $this->input->post('ID_GOLONGAN'),"id='ID_GOLONGAN'");
						?>
					<li><label for="">Tahun Golongan <em>*</em></label> <input name="TMT_GOLONGAN" value="<?=set_value('TMT_GOLONGAN')?>" type="text"/>
					<li><label>Jabatan   <em>*</em></label>
						<?php
							echo form_dropdown("ID_JABATAN", $option_jabatan, $this->input->post('ID_JABATAN'),"id='ID_JABATAN'");
						?>
					<li><label for="">Tahun Jabatan <em>*</em></label> <input name="TMT_JABATAN" value="<?=set_value('TMT_JABATAN')?>" type="text"/>
                    <li><label for="">Status Pegawai <em>*</em></label> <select name="STATUS_PEG">
								<option value="PNS">PNS</option>
								<option value="Magang">MAGANG</option>
						</select></li>
					<li><label for="">Tahun Pengangkatan <em>*</em></label> <input name="TMT" value="<?=set_value('TMT')?>" type="text"/>
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
                            url : "<?php echo site_url('sdm_kementerian/select_eselon2_add')?>",
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
                            url : "<?php echo site_url('sdm_kementerian/select_eselon3_add')?>",
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
                            url : "<?php echo site_url('sdm_kementerian/select_eselon4_add')?>",
                            data: ID_ESELON_3,
                            success: function(msg){
                                $('#eselon4').html(msg);
                            }
                    });
                }
        });
    </script>
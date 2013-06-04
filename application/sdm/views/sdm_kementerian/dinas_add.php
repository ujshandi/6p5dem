		<div class="wrap_right bgcontent">
		<h1 class="heading">Tambah Data Pegawai Dinas</h1>
		<?=form_open('sdm_dinas/search', array('class'=>'sform'))?>
<hr/>
			<li><input class="greenbutton" type="submit" value="Back" style="float:left"/></li>
<?=form_close()?>
        <hr/>
        <?=form_open('sdm_dinas/proses_add', array('class'=>'sform'))?>
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
                    <li><div id="provin"><label>Provinsi   <em>*</em></label>
						<?php
							echo form_dropdown("KODEPROVIN", $option_provin, $this->input->post('KODEPROVIN'),"id='KODEPROVIN'");
						?></div>
					<li><div id="kabupkota"><label>Kabupaten/Kota <em>*</em></label>
						<?php
							echo form_dropdown("KODEKABUP",array('0'=>'Pilih Provinsi Dahulu'),'',"id='KODEKABUP'",$this->input->post('KODEKABUP'));
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
								<option value="PNS?>">PNS</option>
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
                            url : "<?php echo site_url('sdm_dinas/select_kabupkota2')?>",
                            data: KODEPROVIN,
                            success: function(msg){
                                $('#kabupkota').html(msg);
                            }
                    });
                }
        });
    </script>
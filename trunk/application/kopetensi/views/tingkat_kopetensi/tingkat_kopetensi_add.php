<div class="wrap_right bgcontent">
<h1 class="heading">Tambah Data Tingkat Kompetensi</h1>
<?=form_open('tingkat_kopetensi', array('class'=>'sform'))?>
<hr/>
			<li><input class="greenbutton" type="submit" value="Back" style="float:left"/></li>
<?=form_close()?>
        <hr/>
        <?=form_open('tingkat_kopetensi/proses_add', array('class'=>'sform'))?>
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

					<li><label for="">Kode Tingkat <em>*</em></label> <input name="KODE_TINGKAT" value="<?=set_value('KODE_TINGKAT')?>" type="text" class="three"/></li>
                    <li><label for="">Deskripsi <em>*</em></label> <input name="DESKRIPSI" value="<?=set_value('DESKRIPSI')?>" type="text" class="eight"/></li>
					<div class="clearfix">&nbsp;</div>
                    <hr/>
                    <li><div class="four right tr"><input class="greenbutton" type="submit" value="SUBMIT" style="margin-right:10px"/><input class="greenbutton" type="submit" value="RESET"/></div></li>
                </ol>
            </fieldset>
		<?=form_close()?>
		
		</div>
        <div class="clearfix">&nbsp;</div>
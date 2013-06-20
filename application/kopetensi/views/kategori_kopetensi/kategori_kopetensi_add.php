<div class="wrap_right bgcontent">
<h1 class="heading">Tambah Data Kategori Kompetensi</h1>
<?=form_open('kategori_kopetensi', array('class'=>'sform'))?>
<hr/>
			<li><input class="greenbutton" type="submit" value="Back" style="float:left"/></li>
<?=form_close()?>
        <hr/>
        <?=form_open('kategori_kopetensi/proses_add', array('class'=>'sform'))?>
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
                    <li><div id="matra"><label>Matra  <em>*</em></label>
						<?php
							echo form_dropdown("KODEMATRA", $option_matra, $this->input->post('KODEMATRA'),"id='KODEMATRA'");
						?></div>

					<li><label for="">Kode Kategori <em>*</em></label> <input name="KODE_KATEG_KOPETENSI" value="<?=set_value('KODE_KATEG_KOPETENSI')?>" type="text" class="three"/></li>
                    <li><label for="">Nama Kategori <em>*</em></label> <input name="NAMA_KATEGORI" value="<?=set_value('NAMA_KATEGORI')?>" type="text" class="eight"/></li>
					<div class="clearfix">&nbsp;</div>
                    <hr/>
                    <li><div class="four right tr"><input class="greenbutton" type="submit" value="SUBMIT" style="margin-right:10px"/><input class="greenbutton" type="submit" value="RESET"/></div></li>
                </ol>
            </fieldset>
		<?=form_close()?>
		
		</div>
        <div class="clearfix">&nbsp;</div>
<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Eselon III</h1>
	<hr/>
	<?=form_open('eselon3/proses_add', array('class'=>'sform'))?>
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
			<li><label for="">Eselon II   <em>*</em></label>
				<?php
					echo form_dropdown("ID_ESELON_2", $option_eselon2, $this->input->post('ID_ESELON_2'),"id='ID_ESELON_2'");
				?>
			<li><label for="">Kode Eselon III <em>*</em></label> <input name="ID_ESELON_3" value="<?=set_value('ID_ESELON_3')?>" type="text" class="five"/></li>
			<li><label for="">Nama Eselon III <em>*</em></label> <input name="NAMA_ESELON_3" value="<?=set_value('NAMA_ESELON_3')?>" type="text" class="five"/></li>
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->

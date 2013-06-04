<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Eselon II</h1>
	<hr/>
	<?=form_open('eselon2/proses_add', array('class'=>'sform'))?>
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
			<li><label for="">Eselon I   <em>*</em></label>
				<?php
					echo form_dropdown("ID_ESELON_1", $option_eselon1, $this->input->post('ID_ESELON_1'),"id='ID_ESELON_1'");
				?>
			<li><label for="">Kode Eselon II <em>*</em></label> <input name="ID_ESELON_2" value="<?=set_value('ID_ESELON_2')?>" type="text" class="five"/></li>
			<li><label for="">Nama Eselon II <em>*</em></label> <input name="NAMA_ESELON_2" value="<?=set_value('NAMA_ESELON_2')?>" type="text" class="five"/></li>
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->

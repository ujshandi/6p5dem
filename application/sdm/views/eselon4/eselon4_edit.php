<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Eselon IV</h1>
	<hr/>
	<?=form_open('eselon4/proses_edit', array('class'=>'sform'))?>
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
			<li><label for="">Eselon III   <em>*</em></label>
				<?php
					echo form_dropdown("ID_ESELON_3", $option_eselon3, $this->input->post('ID_ESELON_3'),"id='ID_ESELON_3'");
				?>
			<li><label for="">Id Eselon IV <em>*</em></label> <input name="ID_ESELON_4" value="<?=$result->row()->ID_ESELON_4?>" type="text" class="five" /></li>
			<li><label for="">Nama Eselon IV <em>*</em></label> <input name="NAMA_ESELON_4" value="<?=$result->row()->NAMA_ESELON_4?>" type="text" class="five"/></li>
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->
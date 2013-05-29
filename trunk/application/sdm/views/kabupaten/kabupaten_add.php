<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Kabupaten</h1>
	<hr/>
	<?=form_open('kabupaten/proses_add', array('class'=>'sform'))?>
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
			<li><label for="">Provinsi   <em>*</em></label>
				<?php
					echo form_dropdown("KODEPROVIN", $option_provin, $this->input->post('KODEPROVIN'),"id='KODEPROVIN'");
				?>
			<li><label for="">Kode Kabupaten <em>*</em></label> <input name="KODEKABUP" value="<?=set_value('KODEKABUP')?>" type="text" class="five"/></li>
			<li><label for="">Nama Kabupaten <em>*</em></label> <input name="NAMAKABUP" value="<?=set_value('NAMAKABUP')?>" type="text" class="five"/></li>
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->

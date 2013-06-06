<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Sarana</h1>
	<hr/>
	<?=form_open('sarana/proses_add', array('class'=>'sform'))?>
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
			<li><label for="">UPT <em>*</em></label>
				<?php 
					$opti['id'] = 'KODE_UPT';
					$opti['name'] = 'KODE_UPT';
					$opti['value'] = set_value('KODE_INDUK');
					echo $this->mdl_satker->getOptionUPT($opti);
				?>
			</li>
			
			<li><label for="">ID Sarana <em>*</em></label> <input name="ID_SARANA" value="<?=set_value('ID_SARANA')?>" type="text" class="three"/></li>
			
			<li><label for="">TAHUN<em>*</em></label> <select id="TAHUN" name="TAHUN">
			<option value="">- Pilih Tahun -</option>
			<option value="2000">2000</option>
			<option value="2001">2001</option>
			<option value="2002">2002</option>
			<option value="2003">2003</option>
			<option value="2004">2004</option>
			<option value="2005">2005</option>
			<option value="2006">2006</option>
			<option value="2007">2007</option>
			<option value="2008">2008</option>
			<option value="2009">2009</option>
			<option value="2010">2010</option>
			<option value="2011">2011</option>
			<option value="2012">2012</option>
			<option value="2013">2013</option>
			<option value="2014">2014</option>
			<option value="2015">2015</option>
			<option value="2016">2016</option>
			<option value="2017">2017</option>
			<option value="2018">2018</option>
			<option value="2019">2019</option>
			<option value="2020">2020</option>
			</select></li>
			
			<li><label for="">NAMA SARANA <em>*</em></label> <input name="ID_SARPRAS" value="<?=set_value('ID_SARPRAS')?>" type="text" class="five"/></li>
			
			<li><label for="">JUMLAH <em>*</em></label> <input name="JUMLAH" value="<?=set_value('JUMLAH')?>" type="text" class="five"/></li>
			
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->

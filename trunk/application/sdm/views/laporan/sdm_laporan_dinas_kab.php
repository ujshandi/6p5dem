<!-- page content -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Print Laporan Aparatur Dinas</h1>
	<hr/>
 <?php echo form_open('lap_sdm_dinas/pdf', array('target'=>'_blank','class'=>'sform')); ?>
		<ol>	
			<li>
				<label for="">PROVINSI<em>*</em></label>
				<select name="KODEPROVIN" id="KODEPROVIN">
					<?=$this->mdl_sdm_dinas->getOptionProvinChild()?>
				</select>
			</li>
			<li><label for="">KABUPATEN<em>*</em></label>
				<select name="KODEKABUP" id="KODEKABUP">
					<?=$this->mdl_sdm_dinas->getOptionKabupChild()?>        	
				</select>
			</li>
		</ol>
	<hr/>
 
    <td></td>
		<td><input class="greenbutton" type="submit" value="TAMPILKAN" style="float:LEFT"/></td>
 	<hr/>
    <?=form_close() ?>
</div>
  </div>
  </body>
</html>
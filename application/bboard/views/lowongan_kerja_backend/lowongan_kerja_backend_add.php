<script type="text/javascript">	$(document).ready(function() {			    var makracode=document.getElementById('MAKRA_CODE').value;			$.ajax({				 type:'post',				 url:'<?php echo site_url(); ?>/lowongan_kerja/get_mahli',				 data:'MAKRA_CODE='+makracode,				 success:function(data){					   //do something if you want to with returned data					   $("#AHLI_CODE").html(data);				 }			 });								 $("#MAKRA_CODE").change(function() {			var makracode=$(this).val();			$.ajax({				 type:'post',				 url:'<?php echo site_url(); ?>/lowongan_kerja/get_mahli',				 data:'MAKRA_CODE='+makracode,				 success:function(data){					   //do something if you want to with returned data					   $("#AHLI_CODE").html(data);					   				 }			 });    			 		});		    });  		$(function() {		/*$( "#LOWONGAN_DATE").datepicker({dateFormat : 'dd-mm-yy'});*/					$( "#LOWONGAN_DATE_EXPIRED").datepicker();			$( "#LOWONGAN_DATE").datepicker();		});</script>	<!-- contenna --><div class="wrap_right bgcontent">	<h1 class="heading">Tambah Lowongan Kerja</h1>	<hr/>	<?=form_open('lowongan_kerja_backend/proses_add', array('class'=>'sform'))?>	<fieldset>		<?php 			if(validation_errors())			{		?>				<ul class="message error grid_12">					<li><?=validation_errors()?></li>					<li class="close-bt"></li>				</ul>			<?php			} 		?>		<ol>			<li><label for="">MAKRA<em>*</em></label>				<?php 									$opti['name'] = 'MAKRA';					$opti['value'] = set_value('MAKRA_CODE');					$opti['id'] = 'MAKRA_CODE';					echo $this->lowongan_kerja->get_group_makra($opti); 				?>							</li>			<li><label for="">AHLI<em>*</em></label>				<select name="AHLI_CODE" id="AHLI_CODE">					<option value="0">Pilihan Kosong</option>				</select>			</li>			<li><label for="">JUDUL LOWONGAN <em>*</em></label> <input name="LOWONGAN_TITLE" value="<?=set_value('LOWONGAN_TITLE')?>" type="text" class="five"/></li>			<li><label for="">TANGGAL<em>*</em></label> <input name="LOWONGAN_DATE" value="<?=set_value('LOWONGAN_DATE')?>" type="text" id="LOWONGAN_DATE" class="one"/></li>			<li><label for="">BERLAKU SAMPAI <em>*</em></label> <input name="LOWONGAN_DATE_EXPIRED" value="<?=set_value('LOWONGAN_DATE_EXPIRED')?>" id="LOWONGAN_DATE_EXPIRED" type="text" class="one"/></li>			<li><label for="">SUMMARY <em>*</em></label> <input name="LOWONGAN_SUMMARY" value="<?=set_value('LOWONGAN_SUMMARY')?>" type="text" class="five"/></li>			<li><label for="">DETAIL LOWONGAN <em>*</em></label> 				<textarea name="LOWONGAN_DETAIL" class="five"><?=set_value('LOWONGAN_DETAIL')?></textarea></li>						<div class="clearfix">&nbsp;</div>			<hr/>			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>		</ol>	</fieldset>	<?=form_close()?></div><!-- end wrap right content--><fieldset class="grey-bg">
				
		
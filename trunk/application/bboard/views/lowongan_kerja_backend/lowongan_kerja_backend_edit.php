<script type="text/javascript">	$(document).ready(function() {			 $("#MAKRA_CODE").change(function() {			var makracode=$(this).val();			$.ajax({				 type:'post',				 url:'<?php echo site_url(); ?>/lowongan_kerja/get_mahli',				 data:'MAKRA_CODE='+makracode,				 success:function(data){					   //do something if you want to with returned data					   $("#AHLI_CODE").html(data);					   				 }			 });    			 		});		    });  	$(function() {		$( "#LOWONGAN_DATE_EXPIRED").datepicker();		$( "#LOWONGAN_DATE").datepicker();		});</script>	<!-- contenna --><div class="wrap_right bgcontent">	<h1 class="heading">Lowongan Kerja</h1>	<hr/>	<?=form_open('lowongan_kerja_backend/proses_edit', array('class'=>'sform'))?>	<fieldset>		<?php 			if(validation_errors())			{		?>				<ul class="message error grid_12">					<li><?=validation_errors()?></li>					<li class="close-bt"></li>				</ul>			<?php			} 					?>		<ol>		    <input type="hidden" name="id" value="<?=$id?>">					<li><label for="">MAKRA<em>*</em></label>				<?php 									$opti['name'] = 'MAKRA';					$opti['value'] = set_value('LOWONGAN_MAKRA');					$opti['id'] = 'MAKRA_CODE';					echo $this->lowongan_kerja->get_group_makra($opti); 				?>							</li>			<li><label for="">AHLI<em>*</em></label>					<?php 					$opti['name'] = 'AHLI_CODE';					$opti['value'] = set_value('LOWONGAN_AHLI');					$opti['id'] = 'AHLI_CODE';					echo $this->lowongan_kerja->get_group_mahli($opti); 				?>			</li>			<?php 				if ($result->row()->LOWONGAN_DATE_EXPIRED!="") 					$dateexpired = $this->fungsi->setDBToDate($result->row()->LOWONGAN_DATE_EXPIRED);				else					$dateexpired = "";									if ($result->row()->LOWONGAN_DATE!=""){					$lowongandate = $this->fungsi->setDBToDate($result->row()->LOWONGAN_DATE);				}else{					$lowongandate = "";				}			?>		<li><label for="">LOWONGAN TITLE <em>*</em></label> <input name="LOWONGAN_TITLE" value="<?=$result->row()->LOWONGAN_TITLE?>" type="text" class="five"/></li>		<li><label for="">LOWONGAN DATE <em>*</em></label> <input name="LOWONGAN_DATE" value="<?php echo $lowongandate; ?>" id="LOWONGAN_DATE" type="text" class="two"/></li>		<li><label for="">LOWONGAN DATE EXPIRED <em>*</em></label> <input name="LOWONGAN_DATE_EXPIRED" id="LOWONGAN_DATE_EXPIRED" value="<?php echo $dateexpired ?>" type="text" class="two"/></li>		<li><label for="">LOWONGAN SUMMARY <em>*</em></label> <input name="LOWONGAN_SUMMARY" value="<?=$result->row()->LOWONGAN_SUMMARY?>" type="text" class="five"/></li>		<li><label for="">LOWONGAN DETAIL <em>*</em></label> <input name="LOWONGAN_DETAIL" value="<?=$result->row()->LOWONGAN_DETAIL?>" type="text" class="five"/></li>						<div class="clearfix">&nbsp;</div>			<hr/>			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>		</ol>	</fieldset>	<?=form_close()?></div><!-- end wrap right content-->
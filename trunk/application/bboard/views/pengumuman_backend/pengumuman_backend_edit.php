<script type="text/javascript">	$(function() {				$( "#EXPIRE").datepicker();		});</script><div class="wrap_right bgcontent">	<h1 class="heading">Data Pengumuman</h1>	<hr/>	<?=form_open('pengumuman_backend/proses_edit', array('class'=>'sform'))?>	<fieldset>		<?php 			if(validation_errors())			{		?>				<ul class="message error grid_12">					<li><?=validation_errors()?></li>					<li class="close-bt"></li>				</ul>			<?php			} 				if ($result->row()->EXPIRE!=""){					$expire = $this->fungsi->setDBToDate($result->row()->EXPIRE);				}else{					$expire = "";				}		?>		<ol>		    <input type="hidden" name="id" value="<?=$id?>">			<li><label for="">JUDUL <em>*</em></label> <input name="JUDUL" value="<?=$result->row()->JUDUL?>" type="text" class="five"/></li>			<li><label for="">DESKRIPSI <em>*</em></label><input name="DESKRIPSI" value="<?=$result->row()->DESKRIPSI?>" type="text" class="five"/></li>			<li><label for="">ISI <em>*</em></label> 				<textarea name="ISI" class="five"><?=$result->row()->ISI?></textarea>			</li>			<li><label for="">URL <em>*</em></label> <input name="URL" value="<?=$result->row()->URL?>" type="text" class="five"/></li>			<li><label for="">GAMBAR <em>*</em></label> <input name="GAMBAR" value="<?=$result->row()->GAMBAR?>" type="file" class="five"/></li>			<li><label for="">EXPIRE <em>*</em></label> <input name="EXPIRE" value="<?=$expire?>" id="EXPIRE" type="text" class="five"/></li>								<div class="clearfix">&nbsp;</div>			<hr/>			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>		</ol>	</fieldset>	<?=form_close()?></div><!-- end wrap right content-->
<div class="wrap_right bgcontent">
<h1 class="heading">Tambah Data Matra</h1>
<?=form_open('matra', array('class'=>'sform'))?>
<hr/>
			<li><input class="greenbutton" type="submit" value="Back" style="float:left"/></li>
<?=form_close()?>
        <hr/>
        <?=form_open('matra/proses_add', array('class'=>'sform'))?>
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
   					<li><label for="">Kode Matra <em>*</em></label> <input name="KODEMATRA" value="<?=set_value('KODEMATRA')?>" type="text" class="three"/></li>
                    <li><label for="">Nama Matra <em>*</em></label> <input name="NAMAMATRA" value="<?=set_value('NAMAMATRA')?>" type="text" class="five"/></li>
					<div class="clearfix">&nbsp;</div>
                    <hr/>
                    <li><div class="four right tr"><input class="greenbutton" type="submit" value="SUBMIT" style="margin-right:10px"/><input class="greenbutton" type="submit" value="RESET"/></div></li>
                </ol>
            </fieldset>
		<?=form_close()?>
		
		</div>
        <div class="clearfix">&nbsp;</div>
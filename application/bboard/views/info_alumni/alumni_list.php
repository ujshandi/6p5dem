<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Informasi Data Alumni</h1>
	<hr/>
	<a href="<?=site_url();?>" class="greenbutton">Back</a>
	<br>
	<br>
	<?=form_open('alumni_frontpage/search', array('class'=>'sform'))?>
	<fieldset>
	<ol>
		<li>
			UPT : 
			<select name="kode_upt">
				<?=$this->mdl_upt->getOptionUPT(array('value'=>$kode_upt))?>
			</select>
			&nbsp;&nbsp;
			NAMA ALUMNI :
			<input type="textfield" name="search" value="<?=!empty($search)?$search:''?>" />
			&nbsp;&nbsp;
			<select name="numrow">
				<option value="30" <?=$numrow==30?'Selected="selected"':''?>>30</option>
				<option value="50" <?=$numrow==50?'Selected="selected"':''?>>50</option>
				<option value="75" <?=$numrow==75?'Selected="selected"':''?>>75</option>
				<option value="100" <?=$numrow==100?'Selected="selected"':''?>>100</option>
				<option value="200" <?=$numrow==200?'Selected="selected"':''?>>200</option>
			</select>
			<input type="submit" name="submit" value="Proses" />
		</li>
	</ol>		
	</fieldset>
	<?=form_close()?>
	
	<hr/>
	<table width="100%">
	  <thead>
		<th>NO</th>
		<th width="20%">UPT</th>
		<th width="15%">DIKLAT</th>
		<th>NO PESERTA</th>
		<th width="15%">NAMA PESERTA</th>
		<th>TEMPAT BEKERJA</th>
	  </thead>
	  <tbody>
	  
		<?
		$i=$curcount;
		foreach($result->result() as $r){
		?>
		
			<tr class='gradeC'>
				<td width='2%'><?=$i?></td>
				<td width='15%'><?=$r->NAMA_UPT?></td>
				<td width='15%'><?=$r->NAMA_DIKLAT?></td>
				<td width='10%'><?=$r->NO_PESERTA?></td>
				<td width='20%'><?=$r->NAMA_PESERTA?></td>
				<td width='15%'><?=$r->INSTANSI?></td>
			</tr>
		<?
		$i++;
		}
		?>
	  </tbody>
	</table>
	
          	<div class="clearfix">&nbsp;</div>        
        <div class="paging right">
          <ul>
            <li class="active">
				 <li><?=$this->pagination->create_links()?></li>
          </ul>
        </div><!--end pagination-->
	<div class="clearfix"></div>
        
</div><!-- end wrap right content-->
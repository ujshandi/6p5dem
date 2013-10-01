<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Diklat Kompetensi</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/diklat_kopetensi/add'?>" class="control"> <span class="add">Tambah Data</span></a>
	<hr/>
	<?=form_open('diklat_kopetensi/search', array('class'=>'sform'))?>
	
	<fieldset>
	<ol>
		<li>
			KOMPETENSI : 
			<select name="kodekopetensi">
				<?=$this->mdl_diklat_kopetensi->getOptionKopetensiChild(array('value'=>$kodekopetensi))?>
			</select>
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
		<th width='2%'>No</th>
		<th>Kompetensi</th>
		<th>Nama Diklat</th>
		<th width='15%'>aksi</th>
	  </thead>
	  <tbody>
		
		<?
		$i=$curcount;
		foreach($result->result() as $r){
		?>
		
			<tr class='gradeC'>
				<td width='2%'><?=$i?></td>
				<td><?=$r->NAMA_STANDAR?></td>
				<td><?=$r->NAMA_DIKLAT?></td>
				<td >
					<a href="<?=site_url().'/diklat_kopetensi/edit/'.$r->KOPETEN_DIKLAT_ID?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/diklat_kopetensi/proses_delete/'.$r->KOPETEN_DIKLAT_ID?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
						<span class="delete">hapus</span></a>
				</td>
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
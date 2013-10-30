<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Kegiatan</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/kalender/add'?>" class="control"> <span class="add">Tambah Data </span></a>
	<?=form_open('kalender/search', array('class'=>'sform'))?>
	<fieldset>
	<ol>
		<li>
			UPT : 
			<select name="kode_upt">
				<?=$this->mdl_satker->getOptionUPTChild(array('value'=>$kode_upt))?>
			</select>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			KEGIATAN :
			<input type="textfield" name="search" value="<?=!empty($search)?$search:''?>" />
			<select name="numrow">
				<option value="10" <?=$numrow==10?'Selected="selected"':''?>>10</option>
				<option value="25" <?=$numrow==25?'Selected="selected"':''?>>25</option>
				<option value="50" <?=$numrow==50?'Selected="selected"':''?>>50</option>
			</select>
			<input type="submit" name="submit" value="Proses" />
		</li>
	</ol>		
	</fieldset>
	<?=form_close()?>
	<table width="100%">
	  <thead>
		<th>No</th>
		<th>UPT</th>
		<th>Periode Awal</th>
		<th>Periode Akhir</th>
		<th>Kegiatan</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?
		$i=$curcount;
		foreach($result->result() as $r){
		?>
			<tr class='gradeC'>
				<td width='2%'><?=$i?></td>
				<td width ="27%"><?=$r->NAMA_UPT?></td>
				<td width ="10%"><?=$r->TGL_AWAL?></td>
				<td width ="10%"><?=$r->TGL_AKHIR?></td>
				<td width ="30%"><?=$r->KEGIATAN->load()?></td>
				<td >
					<a href="<?=site_url().'/kalender/edit/'.$r->IDKALENDER?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/kalender/proses_delete/'.$r->IDKALENDER?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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
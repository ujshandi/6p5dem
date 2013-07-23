<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Kurikulum</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/kurikulum/add'?>" class="control"> <span class="add">Tambah Data </span></a>
	
	<?=form_open('kurikulum/search', array('class'=>'sform'))?>
	<fieldset>
	<ol>
		<li>
			UPT : 
			<select name="kode_upt">
				<?=$this->mdl_satker->getOptionUPTChild(array('value'=>$kode_upt))?>
			</select>
			&nbsp;&nbsp;
			NAMA KURIKULUM :
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
	
	<table width="100%">
	  <thead>
		<th>No</th>
		<th>UPT</th>
		<th>Kode Diklat</th>		
		<th>Kode kurikulum</th>
		<th>Nama kurikulum</th>
		<th>SKS Teori</th>
		<th>SKS Praktek</th>
		<th>jam</th>
		<th>Semester</th>
		<th width="140px">aksi</th>
	  </thead>
	  <tbody>
		<?
		$i=$curcount;
		foreach($result->result() as $r){
		?>
			<tr class='gradeC'>
				<td width='2%'><?=$i?></td>
				<td><?=$r->NAMA_UPT?></td>
				<td><?=$r->KODE_DIKLAT?></td>
				<td><?=$r->KODE_KURIKULUM?></td>
				<td><?=$r->NAMA_KURIKULUM?></td>
				<td><?=$r->SKS_TEORI?></td>
				<td><?=$r->SKS_PRAKTEK?></td>
				<td><?=$r->JAM?></td>
				<td><?=$r->SEMESTER?></td>				
				<td >
					<a href="<?=site_url().'/kurikulum/edit/'.$r->KODE_KURIKULUM?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/kurikulum/proses_delete/'.$r->KODE_KURIKULUM?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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
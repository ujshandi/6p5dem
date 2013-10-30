<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Penelitian</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/penelitian/add'?>" class="control"> <span class="add">Tambah Data </span></a>
	
	<?=form_open('penelitian/search', array('class'=>'sform'))?>
	<fieldset>
	<ol>
		<li>
			UPT : 
			<select name="kode_upt">
				<?=$this->mdl_satker->getOptionUPTChild(array('value'=>$kode_upt))?>
			</select>
			&nbsp;&nbsp;
			JUDUL PENELITIAN : 
			<input type="textfield" name="search" value="<?=!empty($search)?$search:''?>" />
			&nbsp;&nbsp;
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
		<th width="20%">UPT</th>
		<th>DOSEN</th>
		<th>Judul Penelitian</th>
		<th>Abstrak</th>
		<th>Tanggal Publikasi</th>
		
		<th>aksi</th>
	  </thead>
	  <tbody>
	  
		<?
		$i=$curcount;
		foreach($result->result() as $r){
		?>
		
			<tr class='gradeC'>
				<td width='2%'><?=$i?></td>
				<td><?=$r->NAMA_UPT?></td>
				<td><?=$r->NAMADOSEN?></td>
				<td><?=$r->JUDUL_PENELITIAN?></td>
				<td><?=$r->ABSTRAK->load()?></td>
				<td><?=$r->TGL_PUBLIKASI?></td>
				<td >
					<!--<a href="<?=site_url().'/penelitian/view/'.$r->ID_PENELITIAN?>" class="control" >
						<span class="view">view</span></a> |-->
					<!--<a href="<?=site_url().'/penelitian/edit/'.$r->ID_PENELITIAN?>" class="control" >
						<span class="edit">edit</span></a> | -->
					<a href="<?=site_url().'/penelitian/proses_delete/'.$r->ID_PENELITIAN?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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
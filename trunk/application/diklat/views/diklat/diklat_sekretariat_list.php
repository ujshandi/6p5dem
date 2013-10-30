<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Diklat Sekretariat</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/diklat_sekretariat/add'?>" class="control"> <span class="add">Tambah Data </span></a>
	
	<?=form_open('diklat_sekretariat/search', array('class'=>'sform'))?>
	<fieldset>
	<ol>
		<li>
			NAMA DIKLAT :
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
		<th>Kode</th>
		<th width="25%">Nama</th>
		<th>Program</th>
		<th width="21%">Satker</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
	  
		<?
		$i=$curcount;
		foreach($result->result() as $r){
		?>
		
			<tr class='gradeC'>
				<td width='2%'><?=$i?></td>
				<td><?=$r->KODE_DIKLAT?></td>
				<td><?=$r->NAMA_DIKLAT?></td>
				<td><?=$r->NAMA_PROGRAM?></td>
				<td><?=$r->NAMA_INDUK?></td>
				<td >
					<a href="<?=site_url().'/diklat_sekretariat/edit/'.$r->KODE_DIKLAT?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/diklat_sekretariat/proses_delete/'.$r->KODE_DIKLAT?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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
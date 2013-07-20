<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Sarana Prasarana</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/jenis_sarpras/add'?>" class="control"> <span class="add">Tambah Data </span></a>
	<?=form_open('jenis_sarpras/search', array('class'=>'sform'))?>
	<fieldset>
	<ol>
		<li>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="textfield" name="search" value="<?=!empty($search)?$search:''?>" />
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
		<th>Nama Sarana Prasarana</th>
		<th>Jenis</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?
		$i=$curcount;
		foreach($result->result() as $r){
		?>
			<tr class='gradeC'>
				<td width='2%'><?=$i?></td>
				<td><?=$r->NAMA_SARPRAS?></td>
				<td><?=$r->JENIS?></td>
				<td>
					<a href="<?=site_url().'/jenis_sarpras/edit/'.$r->ID_SARPRAS?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/jenis_sarpras/proses_delete/'.$r->ID_SARPRAS?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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
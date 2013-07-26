<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data program</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/program/add'?>" class="control"> <span class="add">Tambah Data </span></a>
	
	<?=form_open('program/search', array('class'=>'sform'))?>
	<fieldset>
	<ol>
		<li>
			SATKER : 
			<select name="kode_induk">
				<?=$this->mdl_satker->getOptionSatker(array('value'=>$kode_induk))?>
			</select>
			&nbsp;&nbsp;
			NAMA PROGRAM :
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
		<th>Kode program</th>
		<th>Nama program</th>
		<th width="25%">Satker</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
	  
		<?
		$i=$curcount;
		foreach($result->result() as $r){
		?>
		
			<tr class='gradeC'>
				<td width='2%'><?=$i?></td>
				<td><?=$r->KODE_PROGRAM?></td>
				<td><?=$r->NAMA_PROGRAM?></td>
				<td><?=$r->NAMA_INDUK?></td>
				<td >
					<a href="<?=site_url().'/program/edit/'.$r->KODE_PROGRAM?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/program/proses_delete/'.$r->KODE_PROGRAM?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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
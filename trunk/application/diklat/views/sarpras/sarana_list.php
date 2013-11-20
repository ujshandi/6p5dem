<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Sarana</h1>
	<hr/>
	<?php
	if ($can_insert== TRUE){
	?>
	<a href="<?=base_url().$this->config->item('index_page').'/sarana/add'?>" class="control"> <span class="add">Tambah Data Sarana</span></a>
	<?php
	}
	?>
	
	<?=form_open('sarana/search', array('class'=>'sform'))?>
	<fieldset>
	<ol>
		<li>
			UPT : 
			<select name="kode_upt">
				<?=$this->mdl_satker->getOptionUPTChild(array('value'=>$kode_upt))?>
			</select>
			&nbsp;&nbsp;
			NAMA SARANA :
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
		<th>UPT</th>
		<?php foreach ($fields as $field_name => $field_display): ?>
		<th <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
			<?php echo anchor("/sarana/index/$field_name/".
			(($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc'), $field_display); ?>
		</th>
		<?php endforeach; ?>
		<!--th>Nama Sarana</th>
		<th>Jumlah</th>
		<th>Tahun</th-->
		<th>Deskripsi</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		
		<?
		$i=$curcount;
		foreach($result->result() as $r){
		?>
		
			<tr class='gradeC'>
				<td width='2%'><?=$i?></td>
				<td width="25%"><?=$r->NAMA_UPT?></td>
				<?php foreach ($fields as $field_name => $field_display): ?>
				<td>
					<?php echo $r->$field_name; ?>
				</td>
				<?php endforeach ?>
				<td><?=$r->DESKRIPSI?></td>
				<td >
				<?php
						if ($can_update==true){
							?>
					<a href="<?=site_url().'/sarana/edit/'.$r->ID_SARANA?>" class="control" >
						<span class="edit">edit</span></a> |
				<?php
					}
						if ($can_delete==true){
							?>
					<a href="<?=site_url().'/sarana/proses_delete/'.$r->ID_SARANA?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
						<span class="delete">hapus</span></a>
				<?php
				}
				?>
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
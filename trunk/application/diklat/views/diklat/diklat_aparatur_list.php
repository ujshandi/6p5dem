<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Diklat Aparatur</h1>
	<hr/>
	<?php
	if ($can_insert== TRUE){
	?>
	<a href="<?=base_url().$this->config->item('index_page').'/diklat_aparatur/add'?>" class="control"> <span class="add">Tambah Data </span></a>
	<?php
	}
	?>
	
	<?=form_open('diklat_aparatur/search', array('class'=>'sform'))?>
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
		<?php foreach ($fields as $field_name => $field_display): ?>
		<th <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
			<?php echo anchor("/diklat_aparatur/index/$field_name/". ##sorting
			(($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc'), $field_display); ?>
		</th>
		<?php endforeach; ?>
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
				<?php
					
						if ($can_view==true){
							?>
					<a href="<?=site_url().'/diklat_aparatur/add_detail/'.$r->KODE_DIKLAT?>" class="control" >
						<span class="view">Detail</span></a> |
				<?php
				}
						if ($can_update==true){
							?>
					<a href="<?=site_url().'/diklat_aparatur/edit/'.$r->KODE_DIKLAT?>" class="control" >
						<span class="edit">edit</span></a> |
				<?php
					}
						if ($can_delete==true){
							?>
					<a href="<?=site_url().'/diklat_aparatur/proses_delete/'.$r->KODE_DIKLAT?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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
<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Prasarana</h1>
	<hr/>
	<?php
	if ($can_insert== TRUE){
	?>
	<a href="<?=base_url().$this->config->item('index_page').'/prasarana/add'?>" class="control"> <span class="add">Tambah Data Prasarana</span></a>
	<?php
	}
	?>
	
	<?=form_open('prasarana/search', array('class'=>'sform'))?>
	<fieldset>
	<ol>
		<li>
			UPT : 
			<select name="kode_upt">
				<?=$this->mdl_satker->getOptionUPTChild(array('value'=>$kode_upt))?>
			</select>
			&nbsp;&nbsp;
			NAMA PRASARANA :
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
		<th width='18%'>UPT</th>
		<?php foreach ($fields as $field_name => $field_display): ?>
		<th <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
			<?php echo anchor("/prasarana/index/$field_name/".
			(($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc'), $field_display); ?>
		</th>
		<?php endforeach; ?>
		<!--<th>Nama Prasarana</th>
		<th >Jml</th>
		<th>Kapasitas</th>
		<th>Tahun Pengadaan</th>-->
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
				<td style="vertical-align:middle" width = "25%"><?=$r->NAMA_UPT?></td>
				<td style="vertical-align:middle"><?=$r->NAMA_SARPRAS?></td>
				<td style="vertical-align:middle"><?=$r->JUMLAH?></td>
				<td style="vertical-align:middle"><?=$r->KAPASITAS?></td>
				<td style="vertical-align:middle"><?=$r->TAHUN?></td>
				<td style="vertical-align:middle"><?=$r->DESKRIPSI_PRASARANA?></td>
				<td style="vertical-align:middle">
				<?php
						if ($can_update==true){
							?>
					<a href="<?=site_url().'/prasarana/edit/'.$r->ID_PRASARANA?>" class="control" >
						<span class="edit">edit</span></a> |	
				<?php
					}
						if ($can_delete==true){
							?>
					<a href="<?=site_url().'/prasarana/proses_delete/'.$r->ID_PRASARANA?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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
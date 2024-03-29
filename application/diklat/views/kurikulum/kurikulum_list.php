<script>
    $(document).ready(function(){
        $("#KODE_UPT").change(function(){
            var KODE_UPT = $("#KODE_UPT").val();
            $.ajax({
               type : "POST",
               url  : "<?=base_url().$this->config->item('index_page');?>/peserta/getDiklat",
               data : "KODE_UPT=" + KODE_UPT,
               success: function(data){
                   $("#KODE_DIKLAT").html(data);
               }
            });
        });
    });
</script>


<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Kurikulum</h1>
	<hr/>
	<?php
	if ($can_insert== TRUE){
	?>
	<a href="<?=base_url().$this->config->item('index_page').'/kurikulum/add'?>" class="control"> <span class="add">Tambah Data </span></a>
	<?php
	}
	?>
	
	<?=form_open('kurikulum/search', array('class'=>'sform'))?>
	<fieldset>
	<ol>
		<li>
			<!-- cainned combobox-->
			UPT	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
				<select name="KODE_UPT" id="KODE_UPT">
					<?=$this->mdl_satker->getOptionUPTChild(array('value'=>$kode_upt))?>
				</select>
			<br>			
			DIKLAT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
				<select name="KODE_DIKLAT" id="KODE_DIKLAT">
					<?=$this->mdl_peserta->getOptionDiklatByUPT(array('KODE_UPT'=>$kode_upt, 'value'=>$kode_diklat));?>        	
				</select>
			&nbsp;&nbsp;
			<br>
			NAMA KURIKULUM &nbsp;&nbsp;:
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
		<?php foreach ($fields as $field_name => $field_display): ?>
		<th <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
			<?php echo anchor("/kurikulum/index/$field_name/". ##sorting
			(($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc'), $field_display); ?>
		</th>
		<?php endforeach; ?>
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
				<td><?=$r->NAMA_DIKLAT?></td>
				<td><?=$r->KODE_KURIKULUM?></td>
				<td><?=$r->NAMA_KURIKULUM?></td>
				<td><?=$r->SKS_TEORI?></td>
				<td><?=$r->SKS_PRAKTEK?></td>
				<td><?=$r->JAM?></td>
				<td><?=$r->SEMESTER?></td>				
				<td >
				<?php
						if ($can_update==true){
							?>
					<a href="<?=site_url().'/kurikulum/edit/'.$r->KODE_KURIKULUM?>" class="control" >
						<span class="edit">edit</span></a> |
				<?php
					}
						if ($can_delete==true){
							?>
					<a href="<?=site_url().'/kurikulum/proses_delete/'.$r->KODE_KURIKULUM?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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
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
	<h1 class="heading">Data Alumni</h1>
	<hr/>
	<?php
	if ($can_insert== TRUE){
	?>
	<a href="<?=base_url().$this->config->item('index_page').'/alumni/add_alumni1'?>" class="control"> <span class="add">Tambah Data </span></a>
	<a href="<?=base_url().$this->config->item('index_page').'/alumni/pdf'?>" class="control" target="_blank"> <span class="pdf">Export Ke PDF </span></a>
	<?php
	}
	?>
	
	<?=form_open('alumni/search', array('class'=>'sform'))?>
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
			NAMA ALUMNI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
			<input type="textfield" name="search" value="<?=!empty($search)?$search:''?>" />
			&nbsp;&nbsp;
			<select name="numrow">
				<option value="10" <?=$numrow==10?'Selected="selected"':''?>>10</option>
				<option value="25" <?=$numrow==25?'Selected="selected"':''?>>25</option>
				<option value="50" <?=$numrow==50?'Selected="selected"':''?>>50</option>
			</select>
			<input type="submit" name="submit" value="Proses" />
			<br>
			JUMLAH ALUMNI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?echo $jumlah;?>
		</li>
	</ol>		
	</fieldset>
	<?=form_close()?>
	
	<table width="100%">
	  <thead>
		<th>NO</th>
		<?php foreach ($fields as $field_name => $field_display): ?>
		<th <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
			<?php echo anchor("/alumni/index/$field_name/". ##sorting
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
				<td><?=$r->NAMA_UPT?></td>
				<td><?=$r->NAMA_DIKLAT?></td>
				<td><?=$r->NO_PESERTA?></td>
				<td><?=$r->NAMA_PESERTA?></td>
				<td><?=$r->KERJA?></td>
				<td><?=$r->INSTANSI?></td>
				<!--<td><?=$r->TGL_LULUS?></td>-->
				<td><?=$r->THN_ANGKATAN?></td>
				
				<td >
				<?php
						if ($can_update==true){
							?>
					<a href="<?=site_url().'/alumni/edit/'.$r->ID_ALUMNI?>" class="control" >
						<span class="edit">edit</span></a> |
				<?php
					}
						if ($can_delete==true){
							?>
					<a href="<?=site_url().'/alumni/proses_delete/'.$r->ID_ALUMNI?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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
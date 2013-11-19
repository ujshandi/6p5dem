<script>
    $(document).ready(function(){
        $("#KODEPROVIN").change(function(){
            var KODEPROVIN = $("#KODEPROVIN").val();
            $.ajax({
               type : "POST",
               url  : "<?=base_url().$this->config->item('index_page');?>/sdm_dinas/getKabup",
               data : "KODEPROVIN=" + KODEPROVIN,
               success: function(data){
                   $("#KODEKABUP").html(data);
               }
            });
        });
    });
</script>


<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Pegawai Dinas</h1>
	<hr/>
	<?php
	if ($can_insert== TRUE){
	?>
	<a href="<?=base_url().$this->config->item('index_page').'/sdm_dinas/add_prov'?>" class="control"> <span class="add">Tambah Data </span></a>
	<?php
	}
	?>
	
	<?=form_open('sdm_dinas/search', array('class'=>'sform'))?>
	<fieldset>
	<ol>
		<li>
			<!-- cainned combobox-->
			PROVINSI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
				<select name="KODEPROVIN" id="KODEPROVIN">
					<?=$this->mdl_sdm_dinas->getOptionProvinChild(array('value'=>$kodeprovin))?>
				</select>
			<br>			
			KABUPATEN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<select name="KODEKABUP" id="KODEKABUP">
					<?=$this->mdl_sdm_dinas->getOptionKabupChild(array('value'=>$kodekabup));?>        	
				</select>
			&nbsp;&nbsp;
			<br>
			NAMA PEGAWAI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
		<?php foreach ($fields as $field_name => $field_display): ?>
		<th <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
			<?php echo anchor("/sdm_dinas/index/$field_name/".
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
				<td width='5%'><?=$i?></td>
				<?php foreach ($fields as $field_name => $field_display): ?>
				<td>
					<?php echo $r->$field_name; ?>
				</td>
				<?php endforeach ?>
				<td width='10%'>
				<?php
						if ($can_update==true){
							?>
					<a href="<?=site_url().'/sdm_dinas/add_diklat/'.$r->ID_PEG_DINAS?>">
						<img src="<?=base_url()?>asset/globalstyle/images/ic-add.png" />&nbsp;
					</a>
					<?php
					}
						if ($can_update==true){
							?>
					<a href="<?=site_url().'/sdm_dinas/edit/'.$r->ID_PEG_DINAS?>">
						<img src="<?=base_url()?>asset/globalstyle/images/ic-edit.png" />&nbsp; 
					</a>
					<?php
					}
						if ($can_view==true){
							?>
					<a href="<?=site_url().'/sdm_dinas/detail/'.$r->ID_PEG_DINAS?>">
						<img src="<?=base_url()?>asset/globalstyle/images/check.png" />&nbsp;
					</a>
					<?php
					}
						if ($can_delete==true){
							?>
					<a href="<?=site_url().'/sdm_dinas/proses_delete/'.$r->ID_PEG_DINAS?>">
						<img src="<?=base_url()?>asset/globalstyle/images/ic-delete.png" />
					</a>
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
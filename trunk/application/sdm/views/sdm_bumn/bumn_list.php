<script>
    $(document).ready(function(){
        $("#KODEMATRA").change(function(){
            var KODEMATRA = $("#KODEMATRA").val();
            $.ajax({
               type : "POST",
               url  : "<?=base_url().$this->config->item('index_page');?>/sdm_bumn/getBumn",
               data : "KODEMATRA=" + KODEMATRA,
               success: function(data){
                   $("#KODEBUMN").html(data);
               }
            });
        });
    });
</script>


<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Pegawai BUMN</h1>
	<hr/>
	<?php
	if ($can_insert== TRUE){
	?>
	<a href="<?=base_url().$this->config->item('index_page').'/sdm_bumn/add'?>" class="control"> <span class="add">Tambah Data </span></a>
	<?php
	}
	?>
	<?=form_open('sdm_bumn/search', array('class'=>'sform'))?>
	<fieldset>
	<?=$kodebumn?>
	<ol>
		<li>
			<!-- cainned combobox-->
			MATRA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
				<select name="KODEMATRA" id="KODEMATRA">
					<?=$this->mdl_sdm_bumn->getOptionMatraChild(array('value'=>$kodematra))?>
				</select>
			<br>			
			BUMN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<select name="KODEBUMN" id="KODEBUMN">
					<?=$this->mdl_sdm_bumn->getOptionBumnByMatra(array('KODEMATRA'=>$kodematra, 'value'=>$kodebumn));?>        	
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
		<th>NIK</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Jabatan</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?
		$i=$curcount;
		foreach($result->result() as $r){
		?>
			<tr class='gradeC'>
				<td width='5%'><?=$i?></td>
				<td width='8%'><?=$r->NIK?></td>
				<td width='15%'><?=$r->NAMA?></td>
				<td width='15%'><?=$r->ALAMAT?></td>
				<td width='15%'><?=$r->JABATAN?></td>
				<td width='8%'>
				<?php
					if($can_update == true){
					?>
					<a href="<?=site_url().'/sdm_bumn/add_diklat/'.$r->ID_PEG_BUMN?>">
						<img src="<?=base_url()?>asset/globalstyle/images/ic-add.png" />&nbsp;
					</a>
					<?php 
					}
						if($can_update==true){
						?>
					<a href="<?=site_url().'/sdm_bumn/edit/'.$r->ID_PEG_BUMN?>">
						<img src="<?=base_url()?>asset/globalstyle/images/ic-edit.png" />&nbsp; 
					</a>
					<?php
					}
						if($can_view==true){
						?>
					<a href="<?=site_url().'/sdm_bumn/detail/'.$r->ID_PEG_BUMN?>">
						<img src="<?=base_url()?>asset/globalstyle/images/check.png" />&nbsp;
					</a>
					<?php
					}
						if($can_delete==true){
						?>
					<a href="<?=site_url().'/sdm_bumn/delete/'.$r->ID_PEG_BUMN?>">
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
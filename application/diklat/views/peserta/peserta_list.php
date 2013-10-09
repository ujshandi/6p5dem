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
	<h1 class="heading">Data Peserta</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/peserta/add'?>" class="control"> <span class="add">Tambah Peserta Diklat</span></a>
	<a href="<?=base_url().$this->config->item('index_page').'/peserta/add_lulus1'?>" class="control"> <span class="add">Tambah Peserta Lulus Diklat</span></a>
	<a href="<?=base_url().$this->config->item('index_page').'/peserta/upload'?>" class="control"> <span class="add">Upload Data</span></a>
	
	<?=form_open('peserta/search', array('class'=>'sform'))?>
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
			NAMA PESERTA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
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
		<th width="15%">UPT</th>
		<th width="10%">Diklat</th>
		<th width="9%">No Peserta / NIP</th>
		<th width="12%">Nama peserta</th>
		<th width="10%">Daerah</th>
		<th>Angkatan</th>
		<th>Status</th>
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
				<td><?=$r->DAERAH?></td>
				<td><?=$r->THN_ANGKATAN?></td>
				<td><?=$r->STATUS_PESERTA?></td>
				<td >
					<a href="<?=site_url().'/peserta/view/'.$r->IDPESERTA?>" class="control" >
						<span class="view">view</span></a> |
					<a href="<?=site_url().'/peserta/edit/'.$r->IDPESERTA?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/peserta/proses_delete/'.$r->IDPESERTA?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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
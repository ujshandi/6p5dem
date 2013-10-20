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
	<a href="<?=base_url().$this->config->item('index_page').'/alumni/add_alumni1'?>" class="control"> <span class="add">Tambah Data </span></a>
	
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
				<option value="30" <?=$numrow==30?'Selected="selected"':''?>>30</option>
				<option value="50" <?=$numrow==50?'Selected="selected"':''?>>50</option>
				<option value="75" <?=$numrow==75?'Selected="selected"':''?>>75</option>
				<option value="100" <?=$numrow==100?'Selected="selected"':''?>>100</option>
				<option value="200" <?=$numrow==200?'Selected="selected"':''?>>200</option>
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
		<th width="20%">UPT</th>
		<th width="15%">DIKLAT</th>
		<th>NO PESERTA</th>
		<th width="15%">NAMA ALUMNI</th>
		<th>STATUS</th>
		<th>TEMPAT BEKERJA</th>
		<th>PERIODE LULUS</th>
		<th>TAHUN ANGKATAN</th>
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
				<td><?=$r->TGL_LULUS?></td>
				<td><?=$r->THN_ANGKATAN?></td>
				<td >
					<a href="<?=site_url().'/alumni/edit/'.$r->ID_ALUMNI?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/alumni/proses_delete/'.$r->ID_ALUMNI?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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
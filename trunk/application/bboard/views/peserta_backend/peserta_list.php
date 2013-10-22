<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Pendaftaran Taruna</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/peserta_backend/add'?>" class="control"> <span class="add">Tambah Pendaftar Taruna</span></a>
	
	<a href="<?=base_url().$this->config->item('index_page').'/peserta_backend/add_lulus1'?>" class="control"> <span class="add">Tambah Pendaftar Lulus Ujian</span></a>
	
	<?=form_open('peserta_backend/search', array('class'=>'sform'))?>
	<fieldset>
	<ol>
		<li>
			UPT : 
			<select name="kode_upt">
				<?=$this->mdl_upt->getOptionUPT(array('value'=>$kode_upt))?>
			</select>
			&nbsp;&nbsp;
			NAMA PENDAFTAR :
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
		<th width="18%">UPT</th>
		<th width="12%">Diklat</th>
		<th width="12%">Nama Pendatar</th>
		<th >Tempat Lahir</th>
		<th >Tanggal Lahir</th>
		<th width="6%">Jenis Kelamin</th>
		<th>Status</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		
		<?
		$i=1;
		foreach($result->result() as $r){
		?>
		
			<tr class='gradeC'>
				<td width='2%'><?=$i?></td>
				<td><?=$r->NAMA_UPT?></td>
				<td><?=$r->NAMA_DIKLAT?></td>
				<td><?=$r->NAMA_PENDAFTAR?></td>
				<td><?=$r->TEMPAT_LAHIR?></td>
				<td><?=$r->TGL_LAHIR?></td>
				<td><?=$r->JK?></td>
				<td><?=$r->STATUS_PENDAFTAR?></td>
				<td >
					<a href="<?=site_url().'/peserta_backend/edit/'.$r->IDPENDAFTAR?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/peserta_backend/proses_delete/'.$r->IDPENDAFTAR?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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
<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Dosen</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/dosen/add'?>" class="control"> <span class="add">Tambah Data </span></a>
	<a href="<?=base_url().$this->config->item('index_page').'/dosen/upload'?>" class="control"> <span class="upload">Upload Data </span></a>
	<a href="<?=base_url().$this->config->item('index_page').'/dosen/pdf'?>" class="control" target="_blank"> <span class="pdf">Export Ke PDF </span></a>
	
	<?=form_open('dosen/search', array('class'=>'sform'))?>
	<fieldset>
	<ol>
		<li>
			UPT : 
			<select name="kode_upt">
				<?=$this->mdl_satker->getOptionUPTChild(array('value'=>$kode_upt))?>
			</select>
			&nbsp;&nbsp;
			NAMA DOSEN :
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
		<th width="10%">Nama Pengajar</th>
		<th>Foto</th>
		<th width="17%">Status Pengajar</th>
		<th width="7%">Jenis Pengajar</th>
		<!--<th width="8%">Jurusan</th>
		<th width="10%">Kelompok Matakuliah</th>-->
		<th width="5%">Thn Mulai Mengajar</th>
		<th width="25%">UPT</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?
		$i=$curcount;
		foreach($result->result() as $r){
		?>
			<tr class='gradeC'>
				<td width='2%'><?=$i?></td>
				<td><?=$r->NAMADOSEN?></td>
				<td style="vertical-align:middle"><img width ="75px" src='<?=base_url()?>file_upload/diklat/<?=$r->FOTO_DOSEN?>' alt='<?=$r->FOTO_DOSEN?>'/></td>
				<td><?=$r->STATUS?></td>
				<td><?=$r->JENIS_DOSEN?></td>
				<!--<td><?=$r->JURUSAN?></td>
				<td><?=$r->KELOMPOK_MATKUL?></td>-->
				<td><?=$r->TAHUN?></td>
				<td><?=$r->NAMA_UPT?></td>
				<td >
					<a href="<?=site_url().'/dosen/view/'.$r->IDDOSEN?>" class="control" >
						<span class="view">view</span></a> |
					<a href="<?=site_url().'/dosen/edit/'.$r->IDDOSEN?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/dosen/proses_delete/'.$r->IDDOSEN?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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
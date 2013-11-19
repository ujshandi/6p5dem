<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Pegawai BUMN</h1>
	<hr/>
	<?php
	if ($can_insert== TRUE){
	?>
	<a href="<?=base_url().$this->config->item('index_page').'/sdm_bumn_ver2/add'?>" class="control"> <span class="add">Tambah Data </span></a>
	<?php
	}
	?>	
	<hr/>
	<table width="100%">
	  <thead>
		<th>No</th>
		<th>MATRA</th>
		<th>NAMA BUMN</th>
		<th>TAHUN</th>
		<th>JUMLAH SDM</th>
		<th>BID TRANSPORTASI</th>
		<th>AKSI</th>
	  </thead>
	  <tbody>
		<?
		$i=$curcount;
		foreach($result->result() as $r){
		?>
			<tr class='gradeC'>
				<td width='5%'><?=$i?></td>
				<td width='8%'><?=$r->NAMAMATRA?></td>
				<td width='15%'><?=$r->NAMA_BUMN?></td>
				<td width='5%'><?=$r->TAHUN?></td>
				<td width='15%'><?=$r->JUMLAHSDM?></td>
				<td width='10%'><?=$r->PEND_TRANSPORTASI?></td>
				<td width='10%'>
					<?php 
						if($can_update==true){
						?>
					<a href="<?=site_url().'/sdm_bumn_ver2/edit/'.$r->ID_PEG_BUMN?>" class="control">
						<span class="edit">edit</span>
					</a>
					<?php
					}
						if($can_delete==true){
						?>
					<a href="<?=site_url().'/sdm_bumn_ver2/delete/'.$r->ID_PEG_BUMN?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
						<span class="delete">hapus</span>
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
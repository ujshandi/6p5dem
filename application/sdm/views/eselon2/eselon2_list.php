<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Eselon II</h1>
	<hr/>
	<li style="float:left">
	<a href="<?=base_url().$this->config->item('index_page').'/golongan/add'?>" class="control"> <span class="add">Tambah Data</span></a>
	</li>
	<hr/>
	<table width="100%">
	  <thead>
		<th>No</th>
		<th>Kode Eselon</th>
		<th>Nama</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?
		$i=1;
		foreach($result->result() AS $r){?>
			<tr class='gradeC'>
				<td width='5%'><?=$i?></td>
				<td width='5%'><?=$r->ID_ESELON_2?></td>
				<td width='30%'><?=$r->NAMA_ESELON_2?></td>
				<td width='10%'>
					<a href="<?=site_url().'/eselon2/edit/'.$r->ID_ESELON_2?>" class="control">
						<span class="edit">edit</span>
					</a>
					<a href="<?=site_url().'/eselon2/proses_delete/'.$r->ID_ESELON_2?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
						<span class="delete">hapus</span>
					</a>
				</td>
			</tr>
		<?
		$i++;
		}
		?>
	  </tbody>
	</table>
	<div class="clear">&nbsp;</div>
	<div class="paging right">
          <ul>
            <li><?=$this->pagination->create_links()?></li>
          </ul>
        </div>
	
</div><!-- end wrap right content-->
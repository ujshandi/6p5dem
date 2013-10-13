<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Kategori Kompetensi</h1>
	<hr/>
	<?=form_open('kategori_kopetensi')?>
	<li><div id="matra"><label>Matra   :</label>
						<?php
							echo form_dropdown("KODEMATRA", $option_matra, $this->input->post('KODEMATRA'),"id='KODEMATRA'");
						?></div>
	<hr/>
		<li><input class="greenbutton" type="submit" value="TAMPILKAN" style="float:left"/></li>
 	
    <?=form_close() ?>
	<li style="float:right">
	<a href="<?=base_url().$this->config->item('index_page').'/kategori_kopetensi/add'?>" class="control"> <span class="add">Tambah Data</span></a>
	</li>
	<hr/>
	<table width="100%">
	  <thead>
		<th>No</th>
		<th>Kode</th>
		<th>Deskripsi</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?
		$i=1;
		foreach($result->result() AS $r){?>
			<tr class='gradeC'>
				<td width='5%'><?=$i?></td>
				<td width='5%'><?=$r->KODE_KATEG_KOPETENSI?></td>
				<td width='35%'><?=$r->NAMA_KATEGORI?></td>
				<td width='8%'>
					<a href="<?=site_url().'/kategori_kopetensi/edit/'.$r->KODE_KATEG_KOPETENSI?>" class="control">
						<span class="edit">edit</span>
					</a>
					<a href="<?=site_url().'/kategori_kopetensi/proses_delete/'.$r->KODE_KATEG_KOPETENSI?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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
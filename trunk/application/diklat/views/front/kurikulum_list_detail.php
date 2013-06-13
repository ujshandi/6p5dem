<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Program Diklat <?=$diklat->row()->NAMA_DIKLAT?></h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/front/kurikulum/'.$upt->row()->KODE_UPT?>" class="control">&nbsp;&nbsp;&nbsp;Kembali</span></a>
	<br>
	<br>
	<h2 class="heading">Deskripsi Program Diklat</h2>
	<hr/>
		<table width="629" border="0" cellspacing="2" cellpadding="2">
		  <tr>
			<td width="141" align="left" valign="top">Nama UPT</td>
			<td width="475" align="left" valign="top"><?=$upt->row()->NAMA_UPT?></td>
		  </tr>
		  <tr>
			<td align="left" valign="top">Kode</td>
			<td align="left" valign="top"><?=$diklat->row()->KODE_DIKLAT.' - '.$diklat->row()->NAMA_DIKLAT?></td>
		  </tr>
		  <tr>
			<td align="left" valign="top">Deskripsi</td>
			<td align="left" valign="top"><?=$diklat->row()->DESKRIPSI->load()?></td>
		  </tr>
		  <tr>
			<td align="left" valign="top">Tujuan</td>
			<td align="left" valign="top"><?=$diklat->row()->TUJUAN->load()?></td>
		  </tr>
		  <tr>
			<td align="left" valign="top">Peluang Kerja</td>
			<td align="left" valign="top"><?=$diklat->row()->PELUANG->load()?></td>
		  </tr>
		  <tr>
			<td align="left" valign="top">Lama Pendidikan</td>
			<td align="left" valign="top"><?=$diklat->row()->LAMA?></td>
		  </tr>
		  <tr>
			<td align="left" valign="top">Syarat</td>
			<td align="left" valign="top"><?=$diklat->row()->SYARAT->load()?></td>
		  </tr>
		</table>
		<br>
	<h2 class="heading">Daftar Kurikulum</h2>
	<hr/>
	<table width="100%" border="1" cellspacing="1" cellpadding="1">
		<tr>
			<th width="67" scope="col">NO</th>
			<th width="715" scope="col">Nama Kuriklum</th>
			<th width="84" scope="col">Teori</th>
			<th width="96" scope="col">Praktek</th>
			<th width="69" scope="col">Jumlah</th>
			<th width="82" scope="col">Jam</th>
			<th width="80" scope="col">Semester</th>
		</tr>
		<?
			$i=1;
			foreach($kurikulum->result() as $r){
		?>
		<tr>
			<td><?=$i++?></td>
			<td><?=$r->NAMA_KURIKULUM?></td>
			<td><?=$r->SKS_TEORI?></td>
			<td><?=$r->SKS_PRAKTEK?></td>
			<td><?=$r->JUMLAH?></td>
			<td><?=$r->JAM?></td>
			<td><?=$r->SEMESTER?></td>
		</tr>
		<?}?>
	</table>
</div><!-- end wrap right content-->

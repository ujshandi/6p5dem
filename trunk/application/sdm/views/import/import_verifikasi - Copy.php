<link rel="stylesheet" href="<?php  echo base_url() ?>css/table.css" type="text/css" media="screen" />
<div class="main" align="center">
<h1 align="center"><?= $title; ?></h1>
<?php 
	
	echo form_open('import/verifikasi_proses');
?>	
	<div class="control-btn">
			
	</div>
	<table  class='box-table-a' width="100%">
		<thead>
			<tr>
				<th width='20px'>No.</th>
				<th>NIP</th>
				<th>Nama</th>
				<th>Golongan</th>
				<th>Jabatan</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$x=0;
				foreach($result->result() as $r){ 
			?>
					<input type="hidden" name="data[<?=$x?>]['id']" value="<?=$r->id?>" />
					<input type="hidden" name="data[<?=$x?>]['nip']" value="<?=$r->nip?>" />
					<input type="hidden" name="data[<?=$x?>]['nama_pegawai']" value="<?=$r->nama_pegawai?>" />
					<input type="hidden" name="data[<?=$x?>]['tempat_lahir']" value="<?=$r->tempat_lahir?>" />
					<input type="hidden" name="data[<?=$x?>]['tgl_lahir']" value="<?=$r->tgl_lahir?>" />
					<input type="hidden" name="data[<?=$x?>]['jenis_kelamin']" value="<?=$r->jenis_kelamin?>" />
					<input type="hidden" name="data[<?=$x?>]['agama']" value="<?=$r->agama?>" />
					<input type="hidden" name="data[<?=$x?>]['tahun_pengangkatan']" value="<?=$r->tahun_pengangkatan?>" />
					<input type="hidden" name="data[<?=$x?>]['alamat']" value="<?=$r->alamat?>" />
					<input type="hidden" name="data[<?=$x?>]['status_perkawinan']" value="<?=$r->status_perkawinan?>" />
					<input type="hidden" name="data[<?=$x?>]['keterangan']" value="<?=$r->keterangan?>" />
					<input type="hidden" name="data[<?=$x?>]['jumlah_anak']" value="<?=$r->jumlah_anak?>" />
					<input type="hidden" name="data[<?=$x?>]['kodekabup']" value="<?=$r->kodekabup?>" />
					
					<input type="hidden" name="data[<?=$x?>]['kodeprovin']" value="<?=$r->kodeprovin?>" />

					<tr>
						<td><?=$x+1?></td>
						<td><?=$r->nip?></td>
						<td><?=$r->nama_pegawai?></td>
						<td><?=$this->import_model->comboGolongan(array("name"=>"data[$x]['id_golongan']", "selected"=>$r->id_golongan))?></td>
						<td><?=$this->import_model->comboJabatan(array("name"=>"data[$x]['id_jabatan']", "selected"=>$r->id_jabatan))?></td>
					</tr>
			<?php
					$x++;
				}
			?>
			<tr>
				<td></td>
				<td colspan="4"><input type="submit" value="Simpan"></td>
			</tr>
		</tbody>
	</table>
<?php form_close();?>
	
</div>

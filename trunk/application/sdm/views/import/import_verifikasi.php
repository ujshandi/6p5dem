<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Verifikasi Data SDM Provinsi</h1>
	<hr/>
	<?=form_open('import/verifikasi_proses');?>
	<table  class='box-table-a' width="100%">
		<thead>
			<tr>
				<th width='20px'>No.</th>
				<th>NIP</th>
				<th>Nama</th>
				<th>Tempat Lahir</th>
				<th>JK</th>
				<th>Golongan</th>
				<th>Jabatan</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$x=0;
				foreach($result->result() as $r){ 
			?>
					<input type="hidden" name="data[<?=$x?>][ID_PEG_DINAS]" value="<?=$r->ID_PEG_DINAS?>" />
					<input type="hidden" name="data[<?=$x?>][NIP]" value="<?=$r->NIP?>" />
					<input type="hidden" name="data[<?=$x?>][NAMA]" value="<?=$r->NAMA?>" />
					<input type="hidden" name="data[<?=$x?>][TMPT_LAHIR]" value="<?=$r->TMPT_LAHIR?>" />
					<input type="hidden" name="data[<?=$x?>][TGL_LAHIR]" value="<?=$r->TGL_LAHIR?>" />
					<input type="hidden" name="data[<?=$x?>][JENIS_KELAMIN]" value="<?=$r->JENIS_KELAMIN?>" />
					<input type="hidden" name="data[<?=$x?>][AGAMA]" value="<?=$r->AGAMA?>" />
					<input type="hidden" name="data[<?=$x?>][TMT]" value="<?=$r->TMT?>" />
					<input type="hidden" name="data[<?=$x?>][ALAMAT]" value="<?=$r->ALAMAT?>" />
					<input type="hidden" name="data[<?=$x?>][STATUS]" value="<?=$r->STATUS?>" />
					<input type="hidden" name="data[<?=$x?>][KETERANGAN]" value="<?=$r->KETERANGAN?>" />
					<input type="hidden" name="data[<?=$x?>][JML_ANAK]" value="<?=$r->JML_ANAK?>" />
					<input type="hidden" name="data[<?=$x?>][KODEKABUP]" value="<?=$r->KODEKABUP?>" />
					
					<input type="hidden" name="data[<?=$x?>][KODEPROVIN]" value="<?=$r->KODEPROVIN?>" />

					<tr>
						<td><?=$x+1?></td>
						<td><?=$r->NIP?></td>
						<td><?=$r->NAMA?></td>
						<td><?=$r->JENIS_KELAMIN?></td>
						<td><?=$r->TMPT_LAHIR?></td>
						<td><?=$this->mdl_import->comboGolongan(array("name"=>"data[$x][ID_GOLONGAN]", "selected"=>$r->ID_GOLONGAN))?></td>
						<td><?=$this->mdl_import->comboJabatan(array("name"=>"data[$x][ID_JABATAN]", "selected"=>$r->ID_JABATAN))?></td>
					</tr>
			<?php
					$x++;
				}
			?>
			<tr>
				<td></td>
				<td colspan="6"><input type="submit" value="Simpan"></td>
			</tr>
		</tbody>
	</table>
	<div class="clear">&nbsp;</div>
	<?=form_close()?>
</div><!-- end wrap right content-->

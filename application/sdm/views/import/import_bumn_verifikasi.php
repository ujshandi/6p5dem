<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Verifikasi Data SDM BUMN</h1>
	<hr/>
	<?=form_open('import_bumn/verifikasi_proses');?>
	<table  class='box-table-a' width="100%">
		<thead>
			<tr>
				<th width='20px'>No.</th>
				<th>NIK</th>
				<th>Nama</th>
				<th>Tempat Lahir</th>
				<th>JK</th>
				<th>Matra</th>
				<th>BUMN</th>
				<th>Jabatan</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$x=0;
				foreach($result->result() as $r){ 
			?>
					<input type="hidden" name="data[<?=$x?>][ID_PEG_BUMN]" value="<?=$r->ID_PEG_BUMN?>" />
					<input type="hidden" name="data[<?=$x?>][NIK]" value="<?=$r->NIK?>" />
					<input type="hidden" name="data[<?=$x?>][NAMA]" value="<?=$r->NAMA?>" />
					<input type="hidden" name="data[<?=$x?>][TMPT_LAHIR]" value="<?=$r->TMPT_LAHIR?>" />
					<input type="hidden" name="data[<?=$x?>][TGL_LAHIR]" value="<?=$r->TGL_LAHIR?>" />
					<input type="hidden" name="data[<?=$x?>][JENIS_KELAMIN]" value="<?=$r->JENIS_KELAMIN?>" />
					<input type="hidden" name="data[<?=$x?>][AGAMA]" value="<?=$r->AGAMA?>" />
					<input type="hidden" name="data[<?=$x?>][ALAMAT]" value="<?=$r->ALAMAT?>" />
					<input type="hidden" name="data[<?=$x?>][STATUS]" value="<?=$r->STATUS?>" />
					<input type="hidden" name="data[<?=$x?>][KETERANGAN]" value="<?=$r->KETERANGAN?>" />
					<input type="hidden" name="data[<?=$x?>][JML_ANAK]" value="<?=$r->JML_ANAK?>" />					
					<tr>
						<td><?=$x+1?></td>
						<td><?=$r->NIK?></td>
						<td><?=$r->NAMA?></td>
						<td><?=$r->JENIS_KELAMIN?></td>
						<td><?=$r->TMPT_LAHIR?></td>
						<td><?=$this->mdl_import_bumn->comboMatra(array("name"=>"data[$x][KODEMATRA]", "selected"=>$r->KODEMATRA))?></td>
						<td><?=$this->mdl_import_bumn->comboBumn(array("name"=>"data[$x][KODEBUMN]", "selected"=>$r->KODEBUMN))?></td>
						<td><?=$this->mdl_import_bumn->comboJabatan(array("name"=>"data[$x][ID_JABATAN]", "selected"=>$r->ID_JABATAN))?></td>
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

<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Dosen</h1>
	<hr/>
	<?=form_open('front/dosen')?>
		<select name="KODE_UPT">
			<?
				$opt['value'] = isset($KODE_UPT)?$KODE_UPT:$this->input->post('KODE_UPT');
				echo $this->mdl_satker->getOptionUPTChild($opt)
			?>
		</select>
		<br>
		<input type="submit" value="Proses" class="control">
	<?=form_close()?>
	<?if($opt['value'] != ""){?>
		<br>
		<table width="100%" border="1" cellspacing="1" cellpadding="1">
			<tr>
				<th scope="col">No</th>
				<th scope="col">Nama Dosen</th>
				<th scope="col">Jenis Kelamin</th>
				<th scope="col">Status Dosen</th>
				<th scope="col">Tahun Mulai Mengajar</th>
				<th scope="col">Pendidikan/Kualifikasi</th>
			</tr>
			<?
				$result = $this->mdl_dosen->getDosenByUPT($opt['value'], 'Dosen');
				if($result->num_rows() > 0){
					$i=1;
					foreach($result->result() as $r){?>
						<tr>
							<td><?=$i?></td>
							<td><?=$r->NAMADOSEN?></td>
							<td><?=$r->JK?></td>
							<td><?=$r->STATUS?></td>
							<td><?=$r->TAHUN?></td>
							<td><?=ReadCLOB($r->PENDIDIKAN)?></td>
						</tr>
			<?	
						$i++;
					}
				}
			?>
		</table>
	<?}?>
	<div class="clear">&nbsp;</div>
</div><!-- end wrap right content-->
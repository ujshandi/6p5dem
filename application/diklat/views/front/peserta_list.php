<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Peserta</h1>
	<hr/>
	<?=form_open('front/peserta')?>
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
		<th>No</th>
		<th width="22%">UPT</th>
		<th width="15%">Diklat</th>
		<th>No peserta</th>
		<th width="15%">Nama peserta</th>
		<th>Angkatan</th>
		<th>Status</th>
	  </tr>
		<?
			$result = $this->mdl_peserta->getPesertaByUPT($opt['value'], 'peserta');
			if($result->num_rows() > 0){
				$i=1;
				foreach($result->result() as $r){?>
				<tr class='gradeC'>
					<td width='2%'><?=$i?></td>
					<td><?=$r->NAMA_UPT?></td>
					<td><?=$r->NAMA_DIKLAT?></td>
					<td><?=$r->NO_PESERTA?></td>
					<td><?=$r->NAMA_PESERTA?></td>
					<td><?=$r->THN_ANGKATAN?></td>
					<td><?=$r->STATUS_PESERTA?></td>
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
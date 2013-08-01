<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Penyuluhan</h1>
	<hr/>
	<?=form_open('front/penyuluhan')?>
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
		<th width="2%">No</th>
		<th width="20%">UPT</th>
		<th>Nama Penyuluhan</th>
		<th>Peserta</th>
		<th>Tempat</th>
		<th>Tanggal</th>
	   </tr>
		<?
			$result = $this->mdl_penyuluhan->getPenyuluhanByUPT($opt['value'], 'penyuluhan');
			if($result->num_rows() > 0){
				$i=1;
				foreach($result->result() as $r){?>
				<tr class='gradeC'>
					<td width='2%'><?=$i?></td>
						<td><?=$r->NAMA_UPT?></td>
						<td><?=$r->NAMA_PENYULUHAN?></td>
						<td><?=$r->JML_PESERTA?></td>
						<td><?=$r->TEMPAT?></td>
						<td><?=$r->TANGGAL?></td>
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
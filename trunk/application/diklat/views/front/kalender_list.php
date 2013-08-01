<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Agenda</h1>
	<hr/>
	<?=form_open('front/agenda')?>
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
		<th>UPT</th>
		<th>Periode Awal</th>
		<th>Periode Akhir</th>
		<th>Kegiatan</th>
	  </tr>
		<?
			$result = $this->mdl_kalender->getKalenderByUPT($opt['value'], 'kalender');
			if($result->num_rows() > 0){
				$i=1;
				foreach($result->result() as $r){?>
				<tr class='gradeC'>
					<td width='2%'><?=$i?></td>
					<td width ="27%"><?=$r->NAMA_UPT?></td>
					<td><?=$r->TGL_AWAL?></td>
					<td><?=$r->TGL_AKHIR?></td>
					<td width ="27%"><?=$r->KEGIATAN->load()?></td>
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
<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Penelitian</h1>
	<hr/>
	<?=form_open('front/penelitian')?>
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
		<th>Dosen</th>
		<th>Judul Penelitian</th>
		<th>Abstrak</th>
		<th>Tanggal Publikasi</th>
	   </tr>
		<?
			$result = $this->mdl_penelitian->getPenelitianByUPT($opt['value'], 'penelitian');
			if($result->num_rows() > 0){
				$i=1;
				foreach($result->result() as $r){?>
				<tr class='gradeC'>
					<td width='2%'><?=$i?></td>
						<td><?=$r->NAMA_UPT?></td>
						<td><?=$r->NAMADOSEN?></td>
						<td><?=$r->JUDUL_PENELITIAN?></td>
						<td width ="27%"><?=$r->ABSTRAK->load()?></td>
						<td><?=$r->TGL_PUBLIKASI?></td>
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
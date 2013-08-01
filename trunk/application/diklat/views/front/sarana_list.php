<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Sarana</h1>
	<hr/>
	<?=form_open('front/sarana')?>
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
				<th>Nama Sarana</th>
				<th>Jumlah</th>
				<th>Tahun</th>
			  </tr>
			<?
			$result = $this->mdl_sarana->getSaranaByUPT($opt['value'], 'sarana');
			if($result->num_rows() > 0){
				$i=1;
				foreach($result->result() as $r){?>
				<tr class='gradeC'>
					<td width='2%'><?=$i?></td>
					<td width="25%"><?=$r->NAMA_UPT?></td>
					<td><?=$r->NAMA_SARPRAS?></td>
					<td><?=$r->JUMLAH?></td>
					<td><?=$r->TAHUN?></td>
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
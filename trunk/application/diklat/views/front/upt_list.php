<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data UPT</h1>
	<hr/>
	<?=form_open('front/upt')?>
		<select name="KODE_INDUK">
			<?
				$opt['value'] = isset($KODE_INDUK)?$KODE_INDUK:$this->input->post('KODE_INDUK');
				echo $this->mdl_satker->getOptionSatker($opt)
			?>
		</select>
		<br>
		<input type="submit" value="Proses" class="control">
	<?=form_close()?>
	<?if($opt['value'] != ""){?>
		<br>
		<table width="100%" border="1" cellspacing="1" cellpadding="1">
	  <tr>
		<th>NO</th>
		<th width="15%">KODE UPT</th>
		<th>NAMA UPT</th>
		<th>SATKER</th>
	   </tr>
		<?
			$result = $this->mdl_upt->getUptBySATKER($opt['value']);
			if($result->num_rows() > 0){
				$i=1;
				foreach($result->result() as $r){?>
				<tr class='gradeC'>
					<td width='2%'><?=$i?></td>
					<td><?=$r->KODE_UPT?></td>
					<td><?=$r->NAMA_UPT?></td>
					<td><?=$r->NAMA_INDUK?></td>
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
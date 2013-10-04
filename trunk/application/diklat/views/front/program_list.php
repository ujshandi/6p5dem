<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Program</h1>
	<hr/>
	<?=form_open('front/program')?>
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
		<th width="15%">KODE PROGRAM</th>
		<th>NAMA PROGRAM</th>
		<th>SATKER</th>
	   </tr>
		<?
			$result = $this->mdl_program->getProgramBySATKER($opt['value']);
			if($result->num_rows() > 0){
				$i=1;
				foreach($result->result() as $r){?>
				<tr class='gradeC'>
					<td width='2%'><?=$i?></td>
					<td><?=$r->KODE_PROGRAM?></td>
					<td><?=$r->NAMA_PROGRAM?></td>
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
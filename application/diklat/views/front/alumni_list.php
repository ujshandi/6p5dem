<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Alumni</h1>
	<hr/>
	<?=form_open('front/alumni')?>
		<?
			$opt['name'] = 'KODE_UPT';
			$opt['value'] = isset($KODE_UPT)?$KODE_UPT:$this->input->post('KODE_UPT');
			echo $this->mdl_satker->getOptionUPTChild($opt)
		?>
		<br>
		<input type="submit" value="Proses" class="control">
	<?=form_close()?>
	<?if($opt['value'] != ""){?>
		<br>
		<table width="100%" border="1" cellspacing="1" cellpadding="1">
	  <tr>
		<th>NO</th>
		<th width="20%">UPT</th>
		<!--<th width="15%">DIKLAT</th>-->
		<th>NO PESERTA</th>
		<th width="15%">Nama PESERTA</th>
		<th>STATUS</th>
		<th>TEMPAT BEKERJA</th>
		<th>PERIODE LULUS</th>
	   </tr>
		<?
			$result = $this->mdl_alumni->getAlumniByUPT($opt['value'], 'alumni');
			if($result->num_rows() > 0){
				$i=1;
				foreach($result->result() as $r){?>
				<tr class='gradeC'>
					<td width='2%'><?=$i?></td>
					<td><?=$r->NAMA_UPT?></td>
					<!--<td><?=$r->NAMA_DIKLAT?></td>-->
					<td><?=$r->NO_PESERTA?></td>
					<td><?=$r->NAMA_PESERTA?></td>
					<td><?=$r->STATUS_PESERTA?></td>
					<td><?=$r->KERJA?></td>
					<td><?=$r->TGL_LULUS?></td>
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
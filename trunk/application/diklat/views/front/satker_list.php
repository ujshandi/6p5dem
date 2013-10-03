<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Satuan Kerja</h1>
	<hr/>
	<?=form_open('front/satker')?>
		<br>
		<input type="submit" value="Proses" class="control">
	<?=form_close()?>
	
		<br>
		<table width="100%" border="1" cellspacing="1" cellpadding="1">
	  <tr>
		<th>NO</th>
		<th width="20%">Kode Induk</th>
		<!--<th width="15%">DIKLAT</th>-->
		<th>Nama Satuan Kerja</th>
	   </tr>
		<?
			$result = $this->mdl_satker->getSatker();
			if($result->num_rows() > 0){
				$i=1;
				foreach($result->result() as $r){?>
				<tr class='gradeC'>
					<td width='2%'><?=$i?></td>
					<td><?=$r->KODE_INDUK?></td>
					<td><?=$r->NAMA_INDUK?></td>
				</tr>
		<?
				$i++;
			}
		}
		?>
	</table>
	
	<div class="clear">&nbsp;</div>
</div><!-- end wrap right content-->
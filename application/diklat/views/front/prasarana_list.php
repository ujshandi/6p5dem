<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Prasarana</h1>
	<hr/>
	<?=form_open('front/prasarana')?>
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
		<th>Nama Prasarana</th>
		<th>Jumlah</th>
		<th>Kapasitas</th>
		<th>Tahun</th>
		<th>Foto</th>
		 </tr>
		<?
			$result = $this->mdl_prasarana->getPrasaranaByUPT($opt['value'], 'prasarana');
			if($result->num_rows() > 0){
				$i=1;
				foreach($result->result() as $r){?>
				<tr class='gradeC'>
					<td width='2%'><?=$i?></td>
						<td style="vertical-align:middle" width = "25%"><?=$r->NAMA_UPT?></td>
						<td style="vertical-align:middle"><?=$r->NAMA_SARPRAS?></td>
						<td style="vertical-align:middle"><?=$r->JUMLAH?></td>
						<td style="vertical-align:middle"><?=$r->KAPASITAS?></td>
						<td style="vertical-align:middle"><?=$r->TAHUN?></td>
						<td style="vertical-align:middle"><img width ="75px" src='<?=base_url()?>file_upload/diklat/<?=$r->GAMBAR_PRASARANA?>' alt='<?=$r->GAMBAR_PRASARANA?>'/></td>
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
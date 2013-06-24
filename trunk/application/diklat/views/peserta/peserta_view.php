<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Peserta</h1>
	<hr/>
	<?=form_open('peserta/proses_add_lulus', array('class'=>'sform'))?>
		<br>
		
		<!--<input type="submit" value="back" class="control">-->
		<ol>			
			<li><label for="" >UPT : <em> </em></label>
					<strong><?=$result->row()->NAMA_UPT?></strong>
			</li>
			<br>
			<li><label for="" >DIKLAT : <em> </em></label>
				<strong><?=$result->row()->NAMA_DIKLAT?></strong>
			</li>
			<br>
			<li><label for="" >NMOR INDUK : <em> </em></label>
				<strong><?=$result->row()->NO_PESERTA?></strong>
			</li>
			<br>
			<li><label for="" >NAMA PESERTA : <em></em></label>
				<strong><?=$result->row()->NAMA_PESERTA?></strong>
			</li>
			<br>
			<li><label for="" >TEMPAT_LAHIR : <em></em></label>
				<strong><?=$result->row()->TEMPAT_LAHIR?></strong>
			</li>
			<br>
			<li><label for="" >TANGGAL LAHIR : <em></em></label>
				<strong><?=$result->row()->TGL_LAHIR?></strong>
			</li>
			<br>
			<li><label for="" >JENIS KELAMIN : <em></em></label>
				<strong><?=$result->row()->JK?></strong>
			</li>
			<br>
			<li><label for="" >STATUS : <em></em></label>
				<strong><?=$result->row()->STATUS_PESERTA?></strong>
			</li>
		</ol>	
		<br>
		
		<table width="100%" border="1" cellspacing="1" cellpadding="1">
		<tr>
			<th width="2%">No</th>
			<th>JENJANG</th>
			<th>NAMA SEKOLAH</th>
			<th>PERIODE</th>
			<th>NO IJAZAH</th>
	   </tr>
		<?
			$result = $this->mdl_peserta->getDataDetail( 'peserta');
			if($result->num_rows() > 0){
				$i=1;
				foreach($result->result() as $r){?>
				<tr class='gradeC'>
					<td width='2%'><?=$i?></td>
						<td><?=$r->JENJANG?></td>
						<td><?=$r->NAMA_PENDIDIKAN?></td>
						<td><?=$r->PERIODE?></td>
						<td><?=$r->NO_IJASAH?></td>
						
				</tr>
		<?
				$i++;
			}
		}
		?>
	</table>
	<div class="clear">&nbsp;</div>
	<?=form_close()?>
</div><!-- end wrap right content-->
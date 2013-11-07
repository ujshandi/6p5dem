<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Dosen Detail</h1>
	<hr/>
	<?=form_open('dosen/proses_add_lulus', array('class'=>'sform'))?>
		<br>
		
		<!--<input type="submit" value="back" class="control">-->
		<ol>	
			<img width="100px" src='<?=base_url()?>file_upload/diklat/<?=$result->row()->FOTO_DOSEN?>' />
			
			<li><label for="" >NO INDUK : <em> </em></label>
					<strong><?=$result->row()->NIP?></strong>
			</li>
			<br>
			<li><label for="" >NAMA PENGAJAR : <em> </em></label>
					<strong><?=$result->row()->NAMADOSEN?></strong> 
			</li>
				
			<br>
			<li><label for="" >TEMPAT LAHIR : <em> </em></label>
				<strong><?=$result->row()->TEMPAT_LAHIR?></strong>
			</li>
			<br>
			<li><label for="" >TANGGAL LAHIR : <em></em></label>
				<strong><?=$result->row()->TGL_LAHIR?></strong>
			</li>
			<br>
			<li><label for="" >STATUS PENGAJAR : <em></em></label>
				<strong><?=$result->row()->STATUS?></strong>
			</li>
			<br>
			<li><label for="" >TAHUN MULAI MENGAJAR : <em></em></label>
				<strong><?=$result->row()->TAHUN?></strong>
			</li>
			<br>
			<li><label for="" >PENDIDIKAN : <em></em></label>
				<strong><?=ReadCLOB($result->row()->PENDIDIKAN)?></strong>
			</li>
			<br>
			<li><label for="" >JENIS PENGAJAR : <em></em></label>
				<strong><?=$result->row()->JENIS_DOSEN?></strong>
			</li>
			<br>
			<li><label for="" >UPT : <em></em></label>
				<strong><?=$result->row()->NAMA_UPT?></strong>
			</li>
		</ol>	
		<br>
		<div class="clear">&nbsp;</div>
	<?=form_close()?>
</div><!-- end wrap right content-->
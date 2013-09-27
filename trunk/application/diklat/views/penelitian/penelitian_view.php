<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Penelitian</h1>
	<hr/>
	<?=form_open('penelitian/proses_add_lulus', array('class'=>'sform'))?>
		<br>
		
		<!--<input type="submit" value="back" class="control">-->
		<ol>
			<li><label for="" >UPT : <em></em></label>
				<strong><?=$result->row()->KODE_UPT?></strong>
			</li>
			<br>
			<li><label for="" >DOSEN : <em> </em></label>
					<strong><?=$result->row()->IDDOSEN_1?></strong>
			</li>
			<br>
			<li><label for="" >DOSEN : <em> </em></label>
					<strong><?=$result->row()->IDDOSEN_2?></strong>
			</li>
			<br>
			<li><label for="" >DOSEN : <em> </em></label>
					<strong><?=$result->row()->IDDOSEN_3?></strong>
			</li>
			<br>
			<li><label for="" >DOSEN : <em> </em></label>
					<strong><?=$result->row()->IDDOSEN_4?></strong>
			</li>
			<br>
			<li><label for="" >JUDUL PENELITIAN : <em></em></label>
				<strong><?=$result->row()->JUDUL_PENELITIAN?></strong>
			</li>
			<br>
			<li><label for="" >ABSTRAK : <em></em></label>
				<strong><?=ReadCLOB($result->row()->ABSTRAK)?></strong>
			</li>
			<br>
			<li><label for="" >TANGGAL PUBLIKASI : <em></em></label>
				<strong><?=$result->row()->TGL_PUBLIKASI?></strong>
			</li>
			<br>
		</ol>	
		<br>
		<div class="clear">&nbsp;</div>
	<?=form_close()?>
</div><!-- end wrap right content-->
<h1 class="heading">Pengumuman</h1><div class="center_content"><?php	foreach($results->result() as $row){?>		<h4><?php echo $row->JUDUL; ?></h4>		Release : <span><?php echo $row->TANGGAL_PEMBUATAN; ?></span><br/>		<?php echo $row->ISI; ?>	<?php	}?></div><br/><br/><a href="<?=site_url();?>" class="greenbutton">Back</a>
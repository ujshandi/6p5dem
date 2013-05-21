<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
		<a href=""><img src="<?php echo base_url();?>asset/admin/images/header/headerbp3ti.png" width="162" height="86" alt="" /></a>
	</div>
	<div id="title">
		<p id="title-top">Sistem Informasi Keuangan</p>
		<p id="title-bottom">Balai Penyedia dan Pengelola Pembiayaan Telekomunikasi dan Informatika (BP3TI)</p>
	</div>
	
	<!-- end logo -->
	
	<!--  start top-search -->
	<div id="top-search">
		<!--
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td><input type="text" value="Search" onblur="if (this.value=='') { this.value='Search'; }" onfocus="if (this.value=='Search') { this.value=''; }" class="top-search-inp" /></td>
		<td>
		 
		<select  class="styledselect">
			<option value="">All</option>
			<option value="">Products</option>
			<option value="">Categories</option>
			<option value="">Clients</option>
			<option value="">News</option>
		</select> 
		 
		</td>
		<td>
		<input type="image" src="<?php echo base_url();?>asset/admin/images/shared/top_search_btn.gif"  />
		</td>
		</tr>
		</table>
		-->
		<div id="nav-right">
		
			<!--<div class="nav-divider">&nbsp;</div>-->
			<div class="showhide-account"><img src="<?php echo base_url();?>asset/admin/images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></div>
			<!--<div class="nav-divider">&nbsp;</div>-->
			<a href="<?php echo site_url();?>/auth/logout" id="logout"><img src="<?php echo base_url();?>asset/admin/images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>
		
			<!--  start account-content -->	
			<div class="account-content">
			<div class="account-drop-inner">
				<a href="" id="acc-settings">Settings</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-details">Personal details </a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-project">Project details</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-inbox">Inbox</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-stats">Statistics</a> 
			</div>
			</div>
			<!--  end account-content -->
		
	</div>
	</div>
	
	
 	<!--  end top-search -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>


<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">
		
		<ul class="select"><li><a href="#nogo"><b>Dashboard</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><?php echo anchor('dashboard/index','Dashboard'); ?></li>
				<li><a href="#nogo">Grafik Realisasi</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		 <div class="nav-divider">&nbsp;</div>
		                    
		<ul class="select"><li><a href="#nogo"><b>Anggaran</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<?
					if ($privilage['mcm'][0] == 1){
						echo '<li>'.anchor('anggaran/index','Anggaran').'</li>';
					}else{
						echo '<li>Anggaran</li>';
					}
				?>
				<!--<li><a href="#nogo">Anggaran</a></li>-->
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		
		
	 
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="#nogo"><b>BKU</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<?php
				
					if ($privilage['mcm'][0] == 1){
						echo '<li>'.anchor('mcm/index','MCM').'</li>';
					}else{
						echo '<li>MCM</li>';
					}
					
					/*
					if ($privilage['penerimaan_kas'][0] == 1){ 
						echo '<li>'.anchor('penerimaan_kas/index','Penerimaan').'</li>'; 
					}else{
						echo '<li>Penerimaan</li>'; 
					}
					
					if ($privilage['pengeluaran_kas'][0] == 1){
						echo '<li>'.anchor('pengeluaran_kas/index','Pengeluaran').'</li>'; 
					}else{
						echo '<li>Pengeluaran</li>'; 
					}
					*/
					/*
					if ($privilage['piutang'][0] == 1){
						echo '<li>'.anchor('piutang/index','Piutang').'</li>'; 
					}else{
						echo '<li>Piutang</li>'; 
					}*/
				?> 
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="#nogo"><b>Piutang</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<?php
					if ($privilage['piutang'][0] == 1){
						echo '<li>'.anchor('piutang/index','Piutang').'</li>'; 
					}else{
						echo '<li>Piutang</li>'; 
					}
				?> 
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
			<ul class="select"><li><a href="#nogo"><b>Penerimaan</b><!--[if IE 7]><!--></a><!--<![endif]-->
			<!--[if lte IE 6]><table><tr><td><![endif]-->
			<div class="select_sub">
				<ul class="sub">
					<?php
						
						if ($privilage['posting_mcm'][0] == 1){ 
							echo '<li class="icon_blog">'.anchor('mcm/list_posting_ak','Posting MCM').'</li>'; 
						}else{
							echo '<li class="icon_blog">Posting MCM</li>'; 
						}
						
						if ($privilage['penerimaan_kas'][0] == 1){ 
							echo '<li class="icon_blog">'.anchor('penerimaan_kas/index','Penerimaan Kas').'</li>'; 
						}else{
							echo '<li class="icon_blog">Penerimaan Kas</li>'; 
						}
					?>
				</ul>
			</div>
			<!--[if lte IE 6]></td></tr></table></a><![endif]-->		
		</ul>		

		<div class="nav-divider">&nbsp;</div>
			<ul class="select"><li><a href="#nogo"><b>Pengeluaran</b><!--[if IE 7]><!--></a><!--<![endif]-->
			<!--[if lte IE 6]><table><tr><td><![endif]-->
			<div class="select_sub">
				<ul class="sub">
					<?php
						if ($privilage['pengeluaran_kas'][0] == 1){ 
							echo '<li class="icon_blog">'.anchor('pengeluaran_kas/index','Pengeluaran Kas').'</li>'; 
						}else{
							echo '<li class="icon_blog">Pengeluaran Kas</li>'; 
						}
					?>
				</ul>
			</div>
			<!--[if lte IE 6]></td></tr></table></a><![endif]-->		
		</ul>		
		<div class="nav-divider">&nbsp;</div>
		<ul class="select"><li><a href="#nogo"><b>Jurnal</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<?php
					
					if ($privilage['kas_awal'][0] == 1){ 
						echo '<li class="icon_blog">'.anchor('kas_awal/index','Akun Awal').'</li>'; 
					}else{
						echo '<li class="icon_blog">Akun Awal</li>'; 
					}
				
					if ($privilage['jurnal_umum'][0] == 1){ 
						echo '<li>'.anchor('jurnal_umum/index','Jurnal Umum').'</li>'; 
					}else{
						echo '<li>Jurnal Umum</li>'; 
					}

					
					if ($privilage['jurnal_penyesuaian'][0] == 1){
						echo '<li>'.anchor('jurnal_penyesuaian/index','Jurnal Penyesuaian').'</li>'; 
					}else{
						echo '<li>Jurnal Penyesuaian</li>'; 
					}	
					
					if ($privilage['jurnal_koreksi'][0] == 1){ 
						echo '<li class="icon_blog">'.anchor('jurnal_koreksi/index','Jurnal Koreksi').'</li>'; 
					}else{
						echo '<li class="icon_blog">Jurnal Koreksi</li>'; 
					}
					
					if ($privilage['mutasi_kas'][0] == 1){ 
						echo '<li class="icon_blog">'.anchor('mutasi_kas/index','Mutasi Kas').'</li>'; 
					}else{
						echo '<li class="icon_blog">Mutasi Kas</li>'; 
					}
					
					
					
				

				?>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		<div class="nav-divider">&nbsp;</div>
			<ul class="select"><li><a href="#nogo"><b>Buku Besar</b><!--[if IE 7]><!--></a><!--<![endif]-->
			<!--[if lte IE 6]><table><tr><td><![endif]-->
			<div class="select_sub">
				<ul class="sub">
					<?php
						if ($privilage['buku_besar'][0] == 1){ 
							echo '<li>'.anchor('buku_besar/index','Buku Besar').'</li>'; 
						}else{
							echo '<li>Buku Besar</li>'; 
						}
					?>
				</ul>
			</div>
			<!--[if lte IE 6]></td></tr></table></a><![endif]-->		
		</ul>		
		
		<div class="nav-divider">&nbsp;</div>
			<ul class="select"><li><a href="#nogo"><b>Trial Balance</b><!--[if IE 7]><!--></a><!--<![endif]-->
			<!--[if lte IE 6]><table><tr><td><![endif]-->
			<div class="select_sub">
				<ul class="sub">
					<?php
						if ($privilage['trial_balance'][0] == 1){ 
							echo '<li class="icon_blog">'.anchor('trial_balance/index','Trial Balance').'</li>'; 
						}else{
							echo '<li class="icon_blog">Trial Balance</li>'; 
						}
					?>
				</ul>
			</div>
			<!--[if lte IE 6]></td></tr></table></a><![endif]-->		
			</ul>		
		
		<div class="nav-divider">&nbsp;</div>

		<ul class="select"><li><a href="#nogo"><b>Laporan</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<?php
					if ($privilage['laporan_neraca'][0] == 1){ 
						echo '<li>'.anchor('laporan_neraca/index','Laporan Neraca').'</li>'; 
					}else{
						echo '<li>Laporan Neraca</li>'; 
					}
					
					if ($privilage['laporan_buku_kas'][0] == 1){ 
						echo '<li>'.anchor('laporan_buku_kas/index','Laporan Arus Kas').'</li>'; 
					}else{
						echo '<li>Laporan Arus Kas</li>'; 
					}
					
					if ($privilage['laporan_laba_rugi'][0] == 1){ 
						echo '<li>'.anchor('laporan_laba_rugi/index','Laporan Kegiatan Operasional / Aktivitas').'</li>'; 
					}else{
						echo '<li>Laporan Kegiatan Operasional / Aktivitas</li>'; 
					}
					
					if ($privilage['laporan_realisasi'][0] == 1){ 
						echo '<li>'.anchor('laporan_realisasi/index','Laporan Realisasi Anggaran').'</li>'; 
					}else{
						echo '<li>Laporan  Realisasi Anggaran</li>'; 
					}
				?>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>

		<div class="nav-divider">&nbsp;</div>
		<ul class="select"><li><a href="#nogo"><b>Preferensi</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li>
				<?php if ($privilage['master_akun'][0] == 1){ 
					echo '<li class="icon_blog">'.anchor('master_akun','Master Akun').'</li>'; 
				}else{
					echo '<li class="icon_blog">Master Akun</li>'; 
				} ?>
				</li>
				
				<li>
				<?php if ($privilage['master_parawaba'][0] == 1){ 
					echo '<li class="icon_blog">'.anchor('master_parawaba','Master Parawaba').'</li>'; 
				}else{
					echo '<li class="icon_blog">Master Parawaba</li>'; 
				} ?>
				</li>
				<?php
					if ($privilage['users_level'][0] == 1){ 
						echo '<li class="icon_blog">'.anchor('users_level','User Level').'</li>'; 
					}else{
						echo '<li class="icon_blog">User Level</li>'; 
					}
					
					if ($privilage['backup_database'][0] == 1){ 
						echo '<li>'.anchor('backup_database/index','Backup Database').'</li>'; 
					}else{
						echo '<li>Backup Database</li>'; 
					}
					
				?>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		 
		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
 <div class="clear"></div>
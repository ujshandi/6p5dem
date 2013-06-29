  <div id="content" class="page-green">
    <div id="contentwrap">
    	<div class="wrap_left bgtrans">
        <h2 class="heading">Manajemen User dan Frontend</h2>
        <hr/>
        <ul id="vmenu">
			 <? // echo $menuUser ?> 
			
				<li>
					<a href="#">Users</a>
					<ul>
						<li><a href="<?php echo site_url(); ?>/users">User List</a></li>
						<li><a href="<?php echo site_url(); ?>/user_group">Group User</a></li>
						<li><a href="<?php echo site_url(); ?>/user_privilege">Hak Akses Group</a></li>
						<li><a href="<?php echo site_url(); ?>/menu">Menu</a></li>
					</ul>
				</li>
				<li>
					<a href="#">Berita</a>
					<ul>
						<li><a href="<?php echo site_url(); ?>/news_backend">Berita List</a></li>
					</ul>
				</li>
				<li>
					<li><a href="<?php echo site_url(); ?>/pengumuman_backend">Pengumuman</a>
				</li>
				<li>
					<a href="<?php echo site_url(); ?>/agenda_backend">Agenda Kegiatan</a>
					
				</li>
				<li>
					<a href="<?php echo site_url(); ?>/lowongan_kerja_backend">Lowongan Kerja</a>
				</li>
				<li>
					<a href="<?php echo site_url(); ?>/peserta_backend">Pendaftaran Taruna</a>
				</li>
			</ul><!-- end vmenu -->
		</div><!-- end wrap left-->
    
  <div id="content" class="page-green">
    <div id="contentwrap">
    	<div class="wrap_left bgtrans">
        <h2 class="heading">Manajemen User</h2>
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
					<a href="#">Pengumuman</a>
					<ul>
						<li><a href="<?php echo site_url(); ?>/pengumuman_backend">Pengumuman</a></li>
					</ul>
				</li>
				<li>
					<a href="#">Agenda Kegiatan</a>
					<ul>
						<li><a href="<?php echo site_url(); ?>/agenda_backend">Agenda Kegiatan</a></li>
					</ul>
				</li>
				<li>
					<a href="#">Lowongan Kerja</a>
					<ul>
						<li><a href="<?php echo site_url(); ?>/lowongan_kerja/add">Lowongan Kerja</a></li>
					</ul>
				</li>
			</ul><!-- end vmenu -->
		</div><!-- end wrap left-->
    
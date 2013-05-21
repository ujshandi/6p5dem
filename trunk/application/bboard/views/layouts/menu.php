
	<!-- Header -->
		<div id="hulu">
			<div id="hulu_kiri"></div>
			<div id="hulu_kanan"></div>
		</div>
	<!-- Server status -->

	<!-- End server status -->

	<!-- Main nav -->
	<nav id="main-nav">
		<ul class="container_12">
			
			<li class="home current">
				<ul> 
						
						<li class=" "><?=anchor('dashboard','Home')?></li>
						<li class=" "><?=anchor('profil','Profil')?></li>						<li class=" "><?=anchor('berita','Berita')?></li>						<li class=" "><?=anchor('informasi','Informasi')?></li>						<li class=" "><?=anchor('Agenda','Agenda')?></li>						<li class=" "><?=anchor('dokumen','Dokumen')?></li>												
						
				</ul>
			</li>
		</ul>
	</nav>
	<!-- End main nav -->
	
	<!-- Sub nav -->
	<div id="sub-nav"><div class="container_12">
		
		
	</div></div>
	<!-- End sub nav -->
	
	<!-- Status bar -->
	<div id="status-bar"><div class="container_12">
	
		<ul id="status-infos">
			<li class="spaced">Logged as: <strong><?=logged_as()?></strong></li>
			<!--
			<li>
				<a href="javascript:void(0)" class="button" title="1 messages"><img src="images/icons/fugue/mail.png" width="16" height="16"> <strong>1</strong></a>
				<div id="messages-list" class="result-block">
					<span class="arrow"><span></span></span>
					
					<ul class="small-files-list icon-mail">
						<li>
							<a href="javascript:void(0)"><strong>10:15</strong> Please update...<br>
							<small>From: System</small></a>
						</li>
					</ul>
					<p id="messages-info" class="result-info"><a href="javascript:void(0)">Go to inbox &raquo;</a></p>
				</div>
			</li>
			<li>
				<a href="javascript:void(0)" class="button" title="2 comments"><img src="images/icons/fugue/balloon.png" width="16" height="16"> <strong>2</strong></a>
				<div id="comments-list" class="result-block">
					<span class="arrow"><span></span></span>
					
					<ul class="small-files-list icon-comment">
						<li>
							<a href="javascript:void(0)"><strong>Jane</strong>: I don't think so<br>
							<small>On <strong>Post title</strong></small></a>
						</li>
						<li>
							<a href="javascript:void(0)"><strong>Ken_54</strong>: What about using a different...<br>
							<small>On <strong>Post title</strong></small></a>
						</li>
					</ul>
					
					<p id="comments-info" class="result-info"><a href="javascript:void(0)">Manage comments &raquo;</a></p>
				</div>
			</li>
			-->
			<li>
				<?=anchor('auth/logout', '<span class="smaller">LOGOUT</span>', array('class'=>'button red', 'title'=>'Logout'))?>
			</li>
		</ul>
		
		<ul id="breadcrumb">
			<li>&nbsp;&nbsp;<?=date('d/m/Y').'&nbsp;&nbsp;'.date('H:i');?>&nbsp;&nbsp;</li>
		</ul>
		<!--
		<ul id="breadcrumb">
			<li><a href="javascript:void(0)" title="Home">Home</a></li>
			<li><a href="javascript:void(0)" title="Dashboard">Dashboard</a></li>
		</ul>
		-->
	
	</div></div>
	<!-- End status bar -->
	
	<div id="header-shadow"></div>
	<!-- End header -->
	
	<!-- Always visible control bar -->
	<div id="control-bar" class="grey-bg clearfix">
		
	</div>
	<!-- End control bar -->
	
	
	<!-- Content -->
	<article class="container_12">
	
	<?php
		$flash_message = $this->session->flashdata('message');
		if (!empty($flash_message)){
	?>
			<ul class="message success grid_12">
				<li><?=$flash_message?></li>
				<li class="close-bt"></li>
			</ul>
	<?php 
		}
	?>
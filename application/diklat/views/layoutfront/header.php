
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Sistem Informasi Manajemen DIKLAT Perhubungan - BPSDM Perhubungan - Kementerian Perhubungan RI</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
  <link rel="shortcut icon" href="<?=base_url()?>asset/globalstyle/images/favicon.ico" />
	<link type="text/css" href="<?=base_url()?>asset/globalstyle/css/style.css" rel="stylesheet"  type="text/css"  />
	<script type="text/javascript" src="<?=base_url()?>asset/globalstyle/js/jquery-min.js" ></script>
	<script type="text/javascript" src="<?=base_url()?>asset/globalstyle/js/custom.js" ></script>
	<script type="text/javascript" src="<?=base_url()?>asset/diklat/js/ui.datepicker.js"></script>
	<script type="text/javascript" src="<?=base_url()?>asset/board/asset/frontpage/js/ui.datepicker.js"></script>
</head>

<body>
<div id="container">

<div id="header" class="bg_grd"> 
    <div class="header-img grd"> 
      <div id="title">
        <h1>Aplikasi Basis Data Diklat</h1>
        <h3>Sistem Informasi Manajemen SDM Bidang Transportasi</h3>
      </div><!-- end title -->
      
      <div class="hublogo"><a href="http://www.dephub.go.id" title="Kementerian Perhubungan RI" target="_blank"></a></div>
	  
      <div class="right">
	  <div class="panel">
            <h4>Welcome :</h4>
            <p><a href="#">
			<?
				$user = $this->session->userdata('dataUser');
				echo $user['USER_NAME'];
				//print_r($user);
			?></a></p>
            <hr>
            <a href="<?=base_url().$this->config->item('index_page')?>" class="inlink">Menu Admin</a> 
			<a href="<?=base_url().'index.php/auth/logout'?>" class="inlink">Logout</a>
    	</div>
          <!--<div class="usr"><span>welcome user</span>
		  <a href="#">
			<?
				$user = $this->session->userdata('dataUser');
				echo $user['USER_NAME'];
				//print_r($user);
			?>
			</a></div>
            <ul class="homout">
				<li><a href="<?=base_url()?>"><img src="<?=base_url()?>asset/globalstyle/images/icon_home_16x16.png" />HOME</a></li>
                <li><a href="<?=base_url().$this->config->item('index_page')?>"><img src="<?=base_url()?>asset/globalstyle/images/icon_home_16x16.png" />MENU ADMIN</a></li>
                <li><a href="<?=base_url().'index.php/auth/logout'?>"><img src="<?=base_url()?>asset/globalstyle/images/icon_logout_16x16.png" />LOGOUT</a></li>
            </ul>-->
      </div>
	  
      <div class="clear"></div>
            
	  <div class="bread">
		<p id="breadcrumb">
		<a href="<?=base_url()?>">Home</a>
		Diklat
		<!--
		<a href="#">Sub Menu</a>
		<a href="#">Sub submenu</a>
		<a href="#">Sub submenu 1</a>
		You're here
		-->
		</p>
	  </div><!-- end breadcrumbs -->
      
	  <div class="clear"></div>
    </div><!-- end image headers -->
    
</div><!-- end header -->
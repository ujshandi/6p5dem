
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Sistem Informasi Manajemen SDM Perhubungan - BPSDM Perhubungan - Kementerian Perhubungan RI</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
  <link rel="shortcut icon" href="<?=base_url()?>asset/globalstyle/images/favicon.ico" />
	<link type="text/css" href="<?=base_url()?>asset/globalstyle/css/style.css" rel="stylesheet"  />
	<script type="text/javascript" src="<?=base_url()?>asset/globalstyle/js/jquery-min.js" ></script>
	<script type="text/javascript" src="<?=base_url()?>asset/globalstyle/js/custom.js" ></script>
	<script type="text/javascript" src="<?=base_url()?>asset/diklat/js/ui.datepicker.js" ></script>	
	<script type="text/javascript" src="<?=base_url()?>asset/board/asset/frontpage/js/ui.datepicker.js"></script>
	<link href="<?=base_url()?>asset/globalstyle/css/jquery-ui-datepicker/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="<?=base_url()?>asset/globalstyle/js/jquery-ui-datepicker/jquery-1.9.1.js"></script>
	<script src="<?=base_url()?>asset/globalstyle/js/jquery-ui-datepicker/jquery-ui-1.10.3.custom.js"></script>
</head>

<body>
<div id="container">

<div id="header" class="bg_grd"> 
    <div class="header-img grd">
      <div id="title">
        <h1>Aplikasi Basis Data KOMPETENSI</h1>
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
			<a href="<?=base_url().'index.php/auth/logout'?>" class="inlink">Logout</a>
            <!--<a href="#" class="inlink">Setting</a> <a href="<?=base_url().'index.php/auth/logout'?>" class="inlink">Logout</a>-->
    	</div>
			
      </div>
	  <div class="clear"></div>
            
	  <div class="bread">
		<p id="breadcrumb">
		<a href="<?=base_url()?>">Home</a>
		KOMPETENSI
		<!--<a href="#">Sub Menu</a>
		<a href="#">Sub submenu</a>
		<a href="#">Sub submenu 1</a>
		You're here-->
		</p>
	  </div><!-- end breadcrumbs -->
      
	  <div class="clear"></div>
    </div><!-- end image headers -->
    
</div><!-- end header -->

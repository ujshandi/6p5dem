
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Sistem Informasi Manajemen SDM Perhubungan - BPSDM Perhubungan - Kementerian Perhubungan RI</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
  <link rel="shortcut icon" href="<?=base_url()?>asset/globalstyle/images/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/globalstyle/css/style.css" />
  <!--link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/globalstyle/css/jquery.jqplot.min.css" />
  <link type="text/css" rel="stylesheet" href="<?=base_url()?>asset/globalstyle/js/syntaxhighlighter/styles/shCoreDefault.min.css" />
  <link type="text/css" rel="stylesheet" href="<?=base_url()?>asset/globalstyle/js/syntaxhighlighter/styles/shThemejqPlot.min.css" />
  <link type="text/css" rel="stylesheet" href="<?=base_url()?>asset/globalstyle/js/syntaxhighlighter/styles/shThemejqPlot.min.css" /-->
  <link type="text/css" rel="stylesheet" href="<?=base_url()?>asset/dbmon/css/main.css" />
  <link type="text/css" rel="stylesheet" href="<?=base_url()?>asset/dbmon/css/easyui/icon.css" />
  <link type="text/css" rel="stylesheet" href="<?=base_url()?>asset/dbmon/css/easyui/gray/easyui.css" />
	<script type="text/javascript" src="<?=base_url()?>asset/dbmon/js/jquery-1.7.2.min.js" ></script>
	<script type="text/javascript" src="<?=base_url()?>asset/globalstyle/js/jquery.jqplot.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>asset/globalstyle/js/plugins/jqplot.json2.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>asset/globalstyle/js/custom.js" ></script>
	<script type="text/javascript" src="<?=base_url()?>asset/dbmon/js/FusionCharts.js" ></script>
	<script type="text/javascript" src="<?=base_url()?>asset/dbmon/js/main.js" ></script>
	<script type="text/javascript" src="<?=base_url()?>asset/dbmon/js/jquery.easyui.min.js" ></script>
	<script type="text/javascript">
		var host='<?=base_url()?>dbmon.php/';
		var site='<?=base_url()?>';
	</script>
	
</head>

<body>
<div id="container">
<div id="header" class="bg_grd"> 
    <div class="header-img grd"> 
      <div id="title">
        <h1>Aplikasi Dashboard Monitoring</h1>
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
            <!--<a href="#" class="inlink">Setting</a>--> <a href="<?=base_url().'index.php/auth/logout'?>" class="inlink">Logout</a>
    	</div>
			
      </div>
	  <div class="clear"></div>
            
	  <div class="bread">
		<p id="breadcrumb">
		<a href="<?=base_url()?>">Home</a>
		Dashboard Monitoring
		<!--<a href="#">Sub Menu</a>
		<a href="#">Sub submenu</a>
		<a href="#">Sub submenu 1</a>
		You're here-->
		</p>
	  </div><!-- end breadcrumbs -->
      
	  <div class="clear"></div>
    </div><!-- end image headers -->
    
</div><!-- end header -->


<div style='padding:5px; margin-top:2px; margin-right:5px;'>
<div id="panel_all" class="easyui-layout"  >  
		<div data-options="region:'west',title:'Main Menu',split:true" id="menu" >
		  	<div id="accordionMenu" fit="true" class="easyui-accordion" >	
				<div title="Dashboard Monitoring SDM" iconCls="chart_bar" style="padding:5px;">
					<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="shape_move_backwards" 
						onClick="loadUrl(this, 'get_form/sdm_dinas');" style="width:250px" >Komposisi SDM Dinas</a>
					<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="chart_organisation" style="width:250px" 
						onClick="loadUrl(this, 'get_form/sdm_kementerian');" >Komposisi SDM Kementrian</a>
					<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="shape_square_delete" style="width:250px" 
						onClick="loadUrl(this, 'get_form/sdm_bumn');" >Komposisi SDM BUMN</a>
				</div>
				
				<div title="Dashboard Monitoring Diklat" iconCls="chart_pie" style="padding:5px;">
					<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="status_online" 
						onClick="loadUrl(this, 'get_form/mon_diklat/peserta');" style="width:300px" >Komposisi Peserta Berdasarkan Program</a>
					<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="status_offline" style="width:300px" 
						onClick="loadUrl(this, 'get_form/mon_diklat/alumni');" >Komposisi Alumni Berdasarkan Program</a>
					<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="status_online" style="width:250px" 
						onClick="loadUrl(this, 'get_form/mon_diklat_upt/peserta');" >Komposisi Peserta Berdasarkan UPT</a>
					<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="status_offline" style="width:250px" 
						onClick="loadUrl(this, 'get_form/mon_diklat_upt/alumni');" >Komposisi Alumni Berdasarkan UPT</a>
					<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="status_online" style="width:250px" 
						onClick="loadUrl(this, 'get_form/mon_diklat_diklat/peserta');" >Komposisi Peserta Berdasarkan DIKLAT</a>
					<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="status_offline" style="width:250px" 
						onClick="loadUrl(this, 'get_form/mon_diklat_diklat/alumni');" >Komposisi Alumni Berdasarkan DIKLAT</a>
				</div>
				<div title="Dashboard Monitoring Pendidikan" iconCls="chart_curve" style="padding:5px;">
					<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="book_addresses" 
						onClick="loadUrl(this, 'get_form/mon_pendidikan');" style="width:250px" >Komposisi Pendidikan Kementerian</a>
					
					<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="book_addresses" 
						onClick="loadUrl(this, 'get_form/mon_pendidikan_dinas');" style="width:250px" >Komposisi pendidikan SDM dinas</a>
					<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="book_addresses" 
						onClick="loadUrl(this, 'get_form/mon_jenjang_pendidikan');" style="width:250px" >Komposisi Jenjang pendidikan Kementerian</a>
				</div>
			</div>
				
	   		
		
		</div>  
		<div data-options="region:'center',title:'Main'" style="padding:5px;background:#ffffff;" id="content_na">
			
				<?=$this->load->view($view)?>
			
			
		</div>  
	</div>
</div>

<div id="footer">
    Copyright &copy; 2013 BPSDM Perhubungan - <a href="http://www.dephub.go.id/">Kementerian Perhubungan RI</a>
</div>

	<script>
	$('#panel_all').css('width',frmWidth-10);
	$('#panel_all').css('height',frmHeight-167);
	$('#menu').css('width',280);
	$('#menu').css('height',frmHeight-190);
	$('#content_na').css('width',frmWidth-340);
	$('#content_na').css('height',frmHeight-190);
	</script>
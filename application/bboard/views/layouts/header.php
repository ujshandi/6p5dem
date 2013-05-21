<!DOCTYPE html><!-- saved from url=(0066)http://www.display-inline.fr/demo/constellation/template/forms.php -->

<html lang="en">
<head>

	<title>Buletin Board BPSDM</title>
	<meta charset="utf-8">
	
	<!-- Combined stylesheets load -->
	<!-- Load either 960.gs.fluid or 960.gs to toggle between fixed and fluid layout -->
	<link href="<?=base_url()?>asset/board/asset/admin/css/style.css" rel="stylesheet" type="text/css">
	
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<link rel="icon" type="image/png" href="favicon-large.png">
	
	<!-- Combined JS load -->
	<!-- html5.js has to be loaded before anything else -->
	<script type="text/javascript" src="<?=base_url()?>asset/board/asset/admin/js/jquery-1.4.2.min.js"></script>
	<!--[if lte IE 8]><script type="text/javascript" src="js/standard.ie.js"></script><![endif]-->
	
	<!-- FancyBox -->
	<script type="text/javascript" src="<?=base_url()?>asset/board/asset/admin/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="<?=base_url()?>asset/board/asset/admin/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/board/asset/admin/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	
	<!-- Live Search -->
	<script src="<?php echo base_url()?>asset/board/asset/admin/js/livesearch/jquery.livesearch.js" type="text/javascript" ></script>
	
	<!-- Datepicker -->
	<script type="text/javascript" src="<?=base_url()?>asset/board/asset/admin/js/jquery.datepick/jquery.datepick.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>asset/board/asset/admin/js/jquery-ui.js"></script>
	<link href="<?=base_url()?>asset/board/asset/admin/css/datepicker.css" rel="stylesheet" type="text/css">	<script type='text/javascript'>
		function load(page,div){			//do_scroll(0);			var site = "<?php echo site_url()?>";			$.ajax({				url: site+"/"+page,				success: function(response){							//$(div).html(response);									document.getElementById(div).value=response;									},			dataType:"html"  					});			return false;		}	</script>
	<!--
	
	This file is from the demo website of the Constellation Admin Skin
	
	If you like it and wish to use it, please consider buying it on ThemeForest:
	http://themeforest.net/item/constellation-complete-admin-skin/116461
	
	Thanks!
	
	-->
	
</head>

<body>
<!-- The template uses conditional comments to add wrappers div for ie8 and ie7 - just add .ie or .ie7 prefix to your css selectors when needed -->
<!--[if lt IE 9]><div class="ie"><![endif]-->
<!--[if lt IE 8]><div class="ie7"><![endif]-->
	
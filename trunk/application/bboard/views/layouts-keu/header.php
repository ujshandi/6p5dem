<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Sistem Informasi Keuangan BP3TI</title>

<link rel="stylesheet" href="<?php echo base_url()?>/asset/admin/css/screen.css" type="text/css" media="screen" title="default" />


	<!-- Combined JS load -->

	<!-- html5.js has to be loaded before anything else -->
 	<script type="text/javascript" src="<?=base_url()?>asset/admin/js/jquery-1.4.2.min.js"></script>

	<!--[if lte IE 8]><script type="text/javascript" src="js/standard.ie.js"></script><![endif]-->

	
	<!-- Datepicker -->

<script type="text/javascript" src="<?=base_url()?>asset/admin/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/admin/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<!--<link href="<?=base_url()?>asset/admin/css/style.css" rel="stylesheet" type="text/css">-->


	<script type="text/javascript" src="<?=base_url()?>asset/admin/js/jquery.datepick/jquery.datepick.min.js"></script>

	<script type="text/javascript" src="<?=base_url()?>asset/admin/js/jquery-ui.js"></script>

	<link href="<?=base_url()?>asset/admin/css/datepicker.css" rel="stylesheet" type="text/css">
	<script type='text/javascript'>
		function load(page,div){
			//do_scroll(0);
			var site = "<?php echo site_url()?>";
			$.ajax({
				url: site+"/"+page,
				success: function(response){			
				//$(div).html(response);
				
					document.getElementById(div).value=response;
					
				},
			dataType:"html"  		
			});
			return false;
		}
	</script>
 
<!--  checkbox styling script -->
<script src="<?php echo base_url()?>asset/admin/js/jquery/ui.core.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>asset/admin/js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>asset/admin/js/jquery/jquery.bind.js" type="text/javascript"></script>


 
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  




<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="<?php echo base_url()?>/asset/admin/js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>


<!--  styled select box script version 2 --> 
<!--<script src="<?php echo base_url()?>/asset/admin/js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>-->
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<!--<script src="<?php echo base_url()?>/asset/admin/js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>-->
<!--<script type="text/javascript" src="<?=base_url()?>asset/admin/js/jquery.datepick/jquery.datepick.min.js"></script>-->
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="<?php echo base_url()?>/asset/admin/js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
$(function() {
	$("input.file_1").filestyle({ 
	image: "images/forms/upload_file.gif",
	imageheight : 29,
	imagewidth : 78,
	width : 300
	});
});
</script>

<!-- Custom jquery scripts -->
<script src="<?php echo base_url()?>/asset/admin/js/jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="<?php echo base_url()?>/asset/admin/js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>/asset/admin/js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 

 

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?php echo base_url()?>/asset/admin/js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>

<script type='text/javascript'>
	function load(page,div){
		//do_scroll(0);
		var site = "<?php echo site_url()?>";
		$.ajax({
			url: site+"/"+page,
			success: function(response){			
			//$(div).html(response);
			
				document.getElementById(div).value=response;
				
			},
		dataType:"html"  		
		});
		return false;
	}
</script>

<link href="<?=base_url()?>asset/admin/js/datatables/demo_table_jui.css" rel="stylesheet" type="text/css">
<script type="text/javascript" language="javascript" src="<?=base_url();?>asset/admin/js/datatables/jquery.dataTables.js"></script>

</head>

<body>
<!-- The template uses conditional comments to add wrappers div for ie8 and ie7 - just add .ie or .ie7 prefix to your css selectors when needed -->
<!--[if lt IE 9]><div class="ie"><![endif]-->
<!--[if lt IE 8]><div class="ie7"><![endif]-->
	

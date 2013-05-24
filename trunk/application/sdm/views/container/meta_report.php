<?=doctype()?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php echo @$title ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?=@$keywords?>">

<!-- CSS -->
	<link rel="shortcut icon" href="<?php  echo base_url() ?>images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="<?php  echo base_url() ?>css/style.css" type="text/css" media="screen" />
<!-- Table -->
<link rel="stylesheet" href="<?php  echo base_url() ?>css/table2.css" type="text/css" media="screen" />
	
<!-- confirm  -->
	<link rel="stylesheet" type="text/css" href="<?php  echo base_url() ?>css/jquery.confirm.css" />
	<!-- <link href='http://fonts.googleapis.com/css?family=Cuprum&amp;subset=latin' rel='stylesheet' type='text/css'> -->
 <!-- JS -->
	<script src="<?php  echo base_url() ?>js/jquery-1.7.1.js" type="text/javascript"></script>
 	<script src="<?php  echo base_url() ?>js/navigation.js" type="text/javascript"></script>

<!-- Hit URL -->
	<script type="text/javascript" src="<?=base_url()?>js/simpleajax.js"></script>
<!-- Validate js-->
	<script type="text/javascript" src="<?php  echo base_url() ?>js/jquery.validate.js"></script>
	
<!-- Table paging/search js-->
	<script type="text/javascript" src="<?php  echo base_url() ?>js/jquery.dataTables.js"></script>	
	<script type="text/javascript" src="<?php  echo base_url() ?>js/custom.js"></script>	
<!-- Checkbox js-->	
	<script type="text/javascript" src="<?php  echo base_url() ?>js/smooth.table.js	"></script>
	
	
<style type="text/css">

/* Layout */
@import "<?=base_url()?>css/dropdown.css";

/* Theme */
@import "<?=base_url()?>css/default.ultimate.css";

</style>

 
</head>
<body>
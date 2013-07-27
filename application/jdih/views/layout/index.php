 <html>
 <head>
 <title>BDPT BPSDM</title>
 <link rel="shortcut icon" href="<?=base_url()?>asset/globalstyle/images/favicon.ico" />

  <!--link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/globalstyle/css/jquery.jqplot.min.css" />
  <link type="text/css" rel="stylesheet" href="<?=base_url()?>asset/globalstyle/js/syntaxhighlighter/styles/shCoreDefault.min.css" />
  <link type="text/css" rel="stylesheet" href="<?=base_url()?>asset/globalstyle/js/syntaxhighlighter/styles/shThemejqPlot.min.css" />
  <link type="text/css" rel="stylesheet" href="<?=base_url()?>asset/globalstyle/js/syntaxhighlighter/styles/shThemejqPlot.min.css" /-->
  <link type="text/css" rel="stylesheet" href="<?=base_url()?>asset/jdih/css/style.css" />
  <link type="text/css" rel="stylesheet" href="<?=base_url()?>asset/jdih/css/slidemenu.css" />
  
  <link type="text/css" rel="stylesheet" href="<?=base_url()?>asset/dbmon/css/easyui/icon.css" />
  <link type="text/css" rel="stylesheet" href="<?=base_url()?>asset/dbmon/css/easyui/gray/easyui.css" />
	<script type="text/javascript" src="<?=base_url()?>asset/dbmon/js/jquery-1.7.2.min.js" ></script>
	<script type="text/javascript" src="<?=base_url()?>asset/jdih/js/slidemenu.js"></script>
	<script type="text/javascript" src="<?=base_url()?>asset/dbmon/js/main.js" ></script>
	<script type="text/javascript" src="<?=base_url()?>asset/dbmon/js/jquery.easyui.min.js" ></script>
	<script type="text/javascript">
		var host='<?=base_url()?>jdih.php/';
		var host_file='<?=$this->config->item('path_doc')?>';
		var site='<?=base_url()?>';
	</script>
	</head>
	<body>
<div align="center">
<TABLE WIDTH=900 BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD COLSPAN=2>
			<div id="header_na"><? include_once 'header.php';?></div></TD>
	</TR>
	<TR>
		<TD COLSPAN=2><? include_once 'menu.php';?></TD>
	</TR>
	<TR>
		<TD valign="top" width="666" bgcolor="#FFFFFF">
			<? $this->load->view($view);?></TD>
		<TD valign="top" background="<?=base_url()?>asset/jdih/images/bg_left.png">
			<? include_once 'menu_kanan.php';?></TD>
	</TR>
	<TR>
		<TD COLSPAN=2 background="<?=base_url()?>asset/jdih/images/footer.png">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td align="center" class="footer"><a href="<?=base_url()?>jdih.php/home">HOME</a> | <a href="<?=base_url()?>jdih.php/produk_hukum/ttg">TENTANG KAMI</a> | <a href="#">PRODUK HUKUM</a> | <a href="<?=base_url()?>jdih.php/produk_hukum/faq">FAQ</a> | <a href="<?=base_url()?>jdih.php/produk_hukum/kontak">KONTAK KAMI</a> <hr />&nbsp;</td>
				
			  </tr>
			  <tr>
				<td align="center" class="footer2">@2013, BASIS DATA PERATURAN TRANSPORTASI BADAN PENGEMBANGAN SUMBER DAYA MANUSIA PERHUBUNGAN&nbsp;</td>
			  </tr>
			</table>

			&nbsp;</TD>
	</TR>
</TABLE>
</div>
</body>
</html>
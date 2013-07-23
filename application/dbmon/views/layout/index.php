<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>Sistem Informasi Manajemen SDM Perhubungan - BPSDM Perhubungan - Kementerian Perhubungan RI</title>
	<link href="" rel="shortcut icon" type="image/x-icon">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="keywords" content="">
	<meta name="description" content="">
	<META name="Author" content="">
	
  <link rel="shortcut icon" href="<?=base_url()?>asset/globalstyle/images/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/globalstyle/css/style.css" />
  
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
<body id="bodyHt"  fit="true" style="overflow: hidden;border:none;">
	<div region="north" border="false" style="position: relative; height:123px; overflow:hidden;" class="bg_darkred">
		<table width="100%">
			<tr>
				<td colspan="3">
					<div id="header" class="bg_darkred"> 
					<div class="header-img darkred"> 
					  <div id="title">
						<h3>BPSDM Perhubungan - Kementerian Perhubungan RI</h3>
						<h2>Sistem Informasi Manajemen SDM Bidang Transportasi</h2>
						<h1>Aplikasi Dashboard Monitoring</h1>
					  </div><!-- end title -->
					  
					  <div class="hublogo"><a href="http://www.dephub.go.id" title="Kementerian Perhubungan RI" target="_blank"></a></div>
					  <div class="clear"></div>
					  
					  <div class="bread">
						<ul class="breadcrumbs">
						  <li><a href="#">Home</a></li>
						  <li><a href="#">Dashboard Monitoring</a></li>
						  <li><span>Edit</span></li>
						  <li class="current"><a href="#">Add</a></li>
						</ul>
					  </div><!-- end breadcrumbs -->
					  
					  <div class="right">
						  <div class="usr"><span>welcome user</span><a href="#">Lukito Wibowo</a></div>
							<ul class="homout">
								<li><a href="<?=base_url()?>"><img src="<?=base_url()?>asset/globalstyle/images/icon_home_16x16.png" />HOME</a></li>
								<li><a href="#"><img src="<?=base_url()?>asset/globalstyle/images/icon_logout_16x16.png" />LOGOUT</a></li>
							</ul>
					  </div>
					  
					  <div class="clear"></div>
					</div><!-- end image headers -->
				</td>
			</tr>
			<tr>
				<td colspan="3" style="background-color:#CCC6C6">
					<div style="text-align: right; padding-right: 5px; >
						<span id="namauser">Administrator</span>&nbsp&nbsp&nbsp-&nbsp&nbsp
						<span id="waktu"></span>&nbsp&nbsp&nbsp-	
						<a id='btnLogout' href="<?=base_url()?>login/logout" plain="true" class="easyui-linkbutton" iconCls="door_out">Log off</a>
					</div>			
				</td>
			</tr>
		</table> 
	</div>
	
	<div region="west"  fit='false' border="false" title="Menu Utama Sistem" style="width:255px;padding:1px 0px 0px 0px;">
		<div id="accordionMenu" fit="true" class="easyui-accordion" style="width:240px;">	
			<div title="Procurement" iconCls="procurement" style="padding:5px;">
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="unit" onClick="loadUrl(this, '<?=base_url()?>procurement/get_form/div_unit');" >Divisi Unit</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="spare-part" >Divisi Spare Part</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="marketing" >Divisi Marketing</a>
			</div>
			<div title="Supply" iconCls="supplier" style="padding:5px;">
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="unit" >Divisi Unit</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="spare-part" >Divisi Spare Part</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="service" >Divisi Service</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="marketing" >Divisi Marketing</a>
			</div>
			<div title="Sales of Goods & Service" iconCls="sales-service" style="padding:5px;">
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="unit" >Divisi Unit</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="spare-part" >Divisi Spare Part</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="service" >Divisi Service</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="marketing" >Divisi Marketing</a>
			</div>
			<div title="Administration Claim" iconCls="administration" style="padding:5px;">
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="process-claim" >Proses Klaim</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="received-claim" >Proses Penerimaan Claim</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="sent-claim" >Proses Penyerahan Claim BBN</a>
			</div>
			<div title="Finance" iconCls="finance" style="padding:5px;">
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="kas" >Bukti Kas</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="bank" >Bukti Bank</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="bukti-setoran" >Bukti Setoran Dealer DIM</a>
			</div>
			<div title="Controlling" iconCls="controlling" style="padding:5px;">
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="icon-impreg" >Analisa Unit Kendaraan</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="icon-impreg" >Analisa Pertumbuhan Service</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="icon-impreg" >Analisa Permintaan Spare-part</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="icon-impreg" >Koperasi - Komunikasi MSDM</a>
			</div>
			<div title="Human Resources Department" iconCls="hrd" style="padding:5px;">
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="icon-impreg" >Seleksi & Rekrutmen</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="icon-impreg" >Pelatihan & Pengembangan</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="icon-impreg" >Manajemen Kinerja</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="icon-impreg" >Perencanaan Karir</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="icon-impreg" >Peraturan Perusahaan</a>
			</div>
			<div title="Data Reporting" iconCls="report" style="padding:5px;">
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="unit" >Divisi Unit</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="service" >Divisi Service</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="spare-part" >Divisi Spare Part</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="marketing" >Divisi Marketing</a>
			</div>
			<div title="Data Master & Configuration" iconCls="database" style="padding:5px;">
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="icon-impreg" onClick="loadUrl(this, '{$host}acc_mng/getGridForm/importer_registration');">Database Utama</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="icon-impreg" onClick="loadUrl(this, '{$host}acc_mng/getGridForm/importer_registration');">Change Password</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="icon-impreg" onClick="loadUrl(this, '{$host}acc_mng/getGridForm/importer_registration');">User Management</a>
				<!--<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="icon-impreg" onClick="loadUrl(this, '{$host}acc_mng/getGridForm/importer_registration');">Database Karyawan</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="icon-impreg" onClick="loadUrl(this, '{$host}acc_mng/getGridForm/importer_registration');">Database Channel</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="icon-impreg" onClick="loadUrl(this, '{$host}acc_mng/getGridForm/importer_registration');">Database Supplier</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="icon-impreg" onClick="loadUrl(this, '{$host}acc_mng/getGridForm/importer_registration');">Database Customer</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="icon-impreg" onClick="loadUrl(this, '{$host}acc_mng/getGridForm/importer_registration');">Database Pihak III</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="icon-impreg" onClick="loadUrl(this, '{$host}acc_mng/getGridForm/importer_registration');">Database Motor</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="icon-impreg" onClick="loadUrl(this, '{$host}acc_mng/getGridForm/importer_registration');">Database Sparepart</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="icon-impreg" onClick="loadUrl(this, '{$host}acc_mng/getGridForm/importer_registration');">Database Toolkit</a>
				<a href="#" plain="true" class="easyui-linkbutton btn-main-menu" iconCls="icon-impreg" onClick="loadUrl(this, '{$host}acc_mng/getGridForm/importer_registration');">Database Barang Promosi</a>-->
			</div>
			
		</div>
	</div>


    <div id="mainContainer" split='true' region="center" style="background:#fff; border-bottom:1px dotted #ccc; padding:5px 5px 5px 5px;">
		MAIN PAGE UNDER CONSTRUCTION
	</div>

	
    <div region="south" border="true" style='background-color:#CCC6C6;'>
        <div style="text-align: center; padding:5px">
		  <a href="http://www.yamaha-motor.co.id" style="font-weight: bold; color: inherit; text-decoration: none;">
			SISTEM INFORMASI DEALER YAMAHA - KALTIM
		  </a>&nbsp;&copy;&nbsp;2013&nbsp;-&nbsp;All rights reserved
	   </div>
    </div>
	
</body>
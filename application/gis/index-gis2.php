<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sistem Informasi Manajemen SDM Perhubungan - BPSDM Perhubungan - Kementerian Perhubungan RI</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="favicon.ico" />
<!-- <script type="text/javascript" src="js/jquery-min.js" ></script> -->
<script type="text/javascript" src="js/jquery.min_2.js" ></script>
<script type="text/javascript" src="js/jquery.jsonp-2.1.4.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript" src="js/markerwithlabel.js" ></script>
<script type="text/javascript" src="lib/mapKML.js" ></script>
<script type="text/javascript" src="js/custom.js" ></script>
<script type="text/javascript">
	function loading() {
		mapInit();
		markerInit();
	}
</script>
</head>

<body onload="loading()">
<div id="container">

<div id="header" class="bg_grd"> 
    <div class="header-img grd"> 
      <div id="title">
        <h1>Aplikasi GIS SDM Transportasi</h1>
        <h3>Sistem Informasi Manajemen SDM Bidang Transportasi</h3>
      </div><!-- end title -->
      
      <div class="hublogo"><a href="http://www.dephub.go.id" title="Kementerian Perhubungan RI" target="_blank"></a></div>
      
	  <div class="right">
          <div class="panel">
            <h4>Welcome :</h4>
            <p><a href="#"></a></p>
            <hr>
            <!--<a href="#" class="inlink">Setting</a>--> 
			<a href="../../index.php/auth/logout" class="inlink">Logout</a>
    	</div>
			
      </div>
	  <div class="clear"></div>
      
      <div class="bread">
		<p id="breadcrumb">
		<a href="../../index.php">Home</a>
		GIS
		<!--<a href="#">Sub Menu</a>
		<a href="#">Sub submenu</a>
		<a href="#">Sub submenu 1</a>
		You're here-->
		</p>
	  </div><!-- end breadcrumbs -->
      
	  <div class="clear"></div>
    </div><!-- end image headers -->
    
</div><!-- end header -->

  <div id="content">
    <div id="contentwrap">
    	<div class="wrap_left bgtrans">
        <h2 class="heading">Navigasi Menu</h2>
        <hr/>
        <ul id="vmenu">
		<form action="#">
		<!--<li>
			<a href="#">Sebaran Kegiatan</a>
			<ul>
				<li><a><input type="checkbox" id="pelatihan" onClick="showMark('pelatihan')">&nbsp;Diklat</a></li>
				<li><a><input type="checkbox" id="UPTbox" onClick="boxclick(this,'UPT')">&nbsp;UPT</a></li>
				<li><a><input type="checkbox" id="UPT APARATUR PERHUBUNGANbox" onClick="boxclick(this,'UPT APARATUR PERHUBUNGAN')">&nbsp;UPT APARATUR PERHUBUNGAN</a></li>
			</ul>
		</li> -->
		<li>
			<a href="#">Sebaran UPT Transportasi</a>
			<ul>
				<li><a><input type="checkbox" id="UPT PERHUBUNGAN DARATbox" onClick="boxclick(this,'UPT PERHUBUNGAN DARAT')">&nbsp;Matra Darat</a></li>
                <li><a><input type="checkbox" id="UPT PERHUBUNGAN LAUTbox" onClick="boxclick(this,'UPT PERHUBUNGAN LAUT')">&nbsp;Matra Laut</a></li>
                <li><a><input type="checkbox" id="UPT PERHUBUNGAN UDARAbox" onClick="boxclick(this,'UPT PERHUBUNGAN UDARA')">&nbsp;Matra Udara</a></li>
			</ul>
		</li>
		<li>
			<a href="#">Sebaran SDM Kementerian</a>
			<ul>
				<li><a><input type="checkbox" id="MATRA DARATbox" onClick="boxclick2(this,'MATRA DARAT')">&nbsp;Matra Darat</a></li>
                <li><a><input type="checkbox" id="MATRA LAUTbox" onClick="boxclick2(this,'MATRA LAUT')">&nbsp;Matra Laut</a></li>
                <li><a><input type="checkbox" id="MATRA UDARAbox" onClick="boxclick2(this,'MATRA UDARA')">&nbsp;Matra Udara</a></li>
                <li><a><input type="checkbox" id="MATRA KERETAbox" onClick="boxclick2(this,'MATRA KERETA')">&nbsp;Matra Kereta Api</a></li>
			</ul>
		</li>
		<li>
			<a href="#">Sebaran SDM Kedinasan</a>
			<ul>
				<li><a><input type="checkbox" id="DINAS PROVINSIbox" onClick="boxclick3(this,'DINAS PROVINSI')">&nbsp;Propinsi</a></li>
                <li><a><input type="checkbox" id="DINAS KABUPATENbox" onClick="boxclick3(this,'DINAS KABUPATEN')">&nbsp;Kabupaten / Kota</a></li>
			</ul>
		</li>
		<!--<li>
			<a href="#">Sebaran Alumni Diklat</a>
			<ul>
				<li><a><input type="checkbox" id="pelatihan" onClick="showMark('pelatihan')">&nbsp;Propinsi</a></li>
                <li><a><input type="checkbox" id="pelatihan" onClick="showMark('pelatihan')">&nbsp;Kabupaten / Kota</a></li>
			</ul>
		</li>-->
		</form>
	</ul><!-- end vmenu -->
    </div><!-- end wrap left-->
    
    <div class="wrap_right bgcontent">
    	<!--<h1 class="heading">main title heading</h1> -->
        	<!--start GIS Panel start-->
        	<div id="map" style="width:100%; height:550px;"></div>
            <!--start GIS Panel end-->
        <div class="clearfix"></div>
    </div><!-- end wrap right content-->
    <div class="clearfix"></div>
    </div><!-- end content wrap -->
  </div><!-- end content -->
  
  <div id="footer">
    Copyright &copy; 2013 BPSDM Perhubungan - <a href="http://www.dephub.go.id/">Kementerian Perhubungan RI</a>
  </div><!-- end footer -->

</div><!-- end container -->
<div id="resultMsg"></div>
</body>
</html>

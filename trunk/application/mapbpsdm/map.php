<html>
    <head>
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
		<meta content="utf-8" http-equiv="encoding">
        <title>.:: SIG-BPSDM ::.</title>
		<!--manggil library dari jquery dan openlayers -->
		<script src="http://maps.google.com/maps/api/js?v=3.5&amp;sensor=false"></script>
		<script type="text/javascript" src="./lib/jquery.min_2.js"></script>
        <script type="text/javascript" src="./lib/jquery.jsonp-2.1.4.js"></script>
        <script type="text/javascript" src="./lib/en/lib/OpenLayers.js"></script>
    	<!--<script type="text/javascript" src="lib/map.js"></script> -->

		<!--manggil library dari extjs -->
		<script type="text/javascript" src="./ext-3.4.0/adapter/ext/ext-base.js"></script>
        <script type="text/javascript" src="./ext-3.4.0/ext-all.js"></script>
        <link rel="stylesheet" type="text/css" href="./ext-3.4.0/resources/css/ext-all.css" />
        <link rel="stylesheet" type="text/css" href="./ext-3.4.0/examples/shared/examples.css" />
        <script type="text/javascript" src="./lib/script/GeoExt.js"></script>
        <!--library untuk edit layout + map + data -->
        <script type="text/javascript" src="./lib/map.js"></script>

		<link rel="stylesheet" href="./css/menu.css" type="text/css" />
        <link rel="stylesheet" href="./css/mapmenu.css" type="text/css" />
        <!--[if lt IE 8]>
            <script src ="http://ie7-js.googlecode.com/svn/version/2.1(beta2)/IE8.js"></script>
        <![endif]-->

    	<!--style untuk icon pada title accordion -->    
        <style type="text/css">
			p {
				margin:5px;
			}
			.settings {
				background-image:url(images/star.png);
			}
			.nav {
				background-image:url(images/map_go.png);
			}
			.info {
				background-image:url(images/information.png);
			}
			.bgtitle{
			background-image: linear-gradient(bottom, #CADCF2 33%, #95B5DE 67%);
			background-image: -o-linear-gradient(bottom, #CADCF2 33%, #95B5DE 67%);
			background-image: -moz-linear-gradient(bottom, #CADCF2 33%, #95B5DE 67%);
			background-image: -webkit-linear-gradient(bottom, #CADCF2 33%, #95B5DE 67%);
			background-image: -ms-linear-gradient(bottom, #CADCF2 33%, #95B5DE 67%);
			
			background-image: -webkit-gradient(
				linear,
				left bottom,
				left top,
				color-stop(0.33, #CADCF2),
				color-stop(0.67, #95B5DE)
			);
			padding-bottom:2px; 
			padding-top:2px; 
			padding-left:20px;
			font-weight:bold;
			}
			div#content {
				display: none;
				} 
			div#loading {             
				margin: auto;
				position: absolute;
				z-index: 1000;
				background: url(images/globe64.gif) no-repeat;
				background-position:center;
				cursor: wait;
				width:100%; 
				height:100%; 
				background-color:#FFFFFF;                
				}
        </style>
        <script type="text/javascript">
        function preloader(){
            document.getElementById("loading").style.display = "none";
            //document.getElementById("content").style.display = "block";
        }//preloader
        window.onload = preloader;
		</script>
    </head>
    <body>
    	<!--pre loader -->
    	<div id="loading" align="center">loading...</div>
    	<!--bagian banner dan menu --> 
        <div id="title" style="background-color:#99bbe8; height:50px;">
		<!--
          <img src="./images/bpsdm_header.jpg" style="float:left; margin-left:0;"> 
		  -->
		</div>
        <!--bagian menu utama -->        
        <ul id="nav" style="margin-left:253px;">
            <li><a href="#">Home</a></li>
            <li><a href="#">Map</a>
            <li><a href="#">Data</a></li>
            <li><a href="#">Login</a></li>		
            </ul>
            <script src="./js/jquery.min.js" type="text/javascript" charset="utf-8"></script>	
			<script src="./js/jquery.effects.core.js" type="text/javascript"></script>
            <script type="text/javascript" src="./js/menu.js"></script>
            
            <!--bagian menu pada peta -->
			<ul id="menu" style="margin-top:52px; float:right; margin-right: 2px;">
			
                <li onClick="showAdmKec()"><a href="#"><input type="checkbox" id="check_admKec" > Batas Administrasi</a></li>
			
                <li><a href="#">Pilih Mode Peta</a>
                    <ul>
                        <li><a href="#" onClick="javascript:baseMapSelect('2');">Open Street Map</a></li>
                        <li><a href="#" onClick="javascript:baseMapSelect('3');">Google Maps Street</a></li>                        
                        <li><a href="#" onClick="javascript:baseMapSelect('5');">Google Maps Hybrid</a></li>
                        <li><a href="#" onClick="javascript:baseMapSelect('4');">Peta Navigasi.net</a></li>
                    </ul>
                </li>
                <!--<li><a href="#">Projects</a>
                    <ul>
                        <li><a href="#">This is a project</a></li>
                        <li><a href="#">So is this</a></li>
                        <li><a href="#">and this</a></li>
                        <li><a href="#">don't forget this too</a></li>
                    </ul>
                </li> -->
            </ul>
        <!--bagian peta -->
        <div id="map">
            
        </div>
        <!--bagian navigasi kiri -->
        <div id="description" style="padding-left:3px; padding-top:3px;">
        	<div id="lokasi">  
            	<div class="bgtitle"><img src="./images/symbol/SDall.png" style="height:10px; width:10px;">Sebaran SDM</div>
            	<p><input type="checkbox" name="test1">&nbsp;Sebaran SDM Aparatur Kementerian</p>
                <span style="margin-left:15px;"><input type="checkbox" name="test1">&nbsp;Matra Laut</span><br/>
                <span style="margin-left:15px;"><input type="checkbox" name="test1">&nbsp;Matra Darat</span><br/>
				<span style="margin-left:15px;"><input type="checkbox" name="test1">&nbsp;Matra Udara</span>
    			<p>&nbsp;</p>
                <div class="bgtitle"><img src="./images/symbol/SMPall.png" style="height:10px; width:10px;">Sebaran SDM Aparatur Dinas</div>
                <p><input type="checkbox" name="test1">&nbsp;Sebaran SDM  Aparatur Dinas</p>
                <span style="margin-left:15px;"><input type="checkbox" name="test1">&nbsp; Provinsi</span><br/>
                <span style="margin-left:15px;"><input type="checkbox" name="test1">&nbsp;Kabupaten/Kota</span>
    			<p>&nbsp;</p>              
               
                <div class="bgtitle"><img src="./images/symbol/PTall.png" style="height:10px; width:10px;">Sebaran Alumni</div>
                <p><input type="checkbox" name="test1">&nbsp;Sebaran SDM berdasarkan wilayah</p>
                <span style="margin-left:15px;"><input type="checkbox" name="test1">&nbsp;Provinsi</span><br/>
                <span style="margin-left:15px;"><input type="checkbox" name="test1">&nbsp;Kabupaten/Kota</span>
            </div>
        </div>
        <div id="footer" align="center">Copy Right &copy; 2013</div>
    </body>
</html>

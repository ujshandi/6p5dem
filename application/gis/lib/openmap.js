var mapPanel;
var map, lyrLine, zoom;
var points = [];
var shpLayers=[];
var map, zoom;
var myPoint, pointLayer, center;
var bounds = new OpenLayers.Bounds();

var gphy = new OpenLayers.Layer.Google("Google Physical",{type: google.maps.MapTypeId.G_PHYSICAL_MAP});
var gmap = new OpenLayers.Layer.Google("Google Streets",{type: google.maps.MapTypeId.ROAD});
var ghyb = new OpenLayers.Layer.Google("Google Hybrid",{type: google.maps.MapTypeId.G_HYBRID_MAP});
var gsat = new OpenLayers.Layer.Google("Google Satellite",{type: google.maps.MapTypeId.G_SATELLITE_MAP});
	
Ext.onReady(function() {
	mapPanel = new GeoExt.MapPanel({
        renderTo: "mappanel",
        stateId: "mappanel",
        height: 550,
        map: map,
    });
	
	var centerlonlat = new OpenLayers.LonLat( 116.70996308327, -1.1147475242615 );
	centerlonlat=centerlonlat.transform(map.displayProjection, map.projection);
	var zoom_awal = 5;
	map.setCenter(centerlonlat,zoom_awal);
	
});

var map = new OpenLayers.Map({
			controls:[
				new OpenLayers.Control.Navigation(),
				new OpenLayers.Control.PanZoomBar(),
				new OpenLayers.Control.ScaleLine(),
				new OpenLayers.Control.MousePosition({
					div: document.getElementById('external_control') 
				})
			],
			maxResolution: "auto",
			units: 'm',
			projection: new OpenLayers.Projection('EPSG:900913'),
			'displayProjection': new OpenLayers.Projection('EPSG:4326'),
			maxResolution: 156543.0339,
			maxExtent: new OpenLayers.Bounds(-20037508.34, -20037508.34, 20037508.34, 20037508.34)
		});
/*
var kmlFar = new OpenLayers.Layer.Vector("KML", {strategies: [new OpenLayers.Strategy.Fixed()],
			  protocol: new OpenLayers.Protocol.HTTP({url: "mapData/kabIndonesia.kml",
			  format: new OpenLayers.Format.KML({
					  extractStyles: false, 
					  extractAttributes: true, 
					  maxDepth: 2, 
					  'internalProjection': map.projection, 
					  'externalProjection': map.displayProjection})
			  }),
			  styleMap: styleKmlFar = new OpenLayers.StyleMap({'default':{
							strokeColor: "#00FF00",
							strokeOpacity: 1,
							strokeWidth: 0.5,
							fillColor: "#FF5500",
							fillOpacity: 0.5
							//pointRadius: 6,
							//pointerEvents: "visiblePainted",
							label : "${name}",
							fontColor: "${favColor}",
							fontSize: "12px",
							fontFamily: "Courier New, monospace",
							fontWeight: "bold",
							labelAlign: "${align}",
							labelXOffset: "${xOffset}",
							labelYOffset: "${yOffset}"
						}})
	});*/
	
	map.addLayers([gmap, gphy, ghyb, gsat]);
	

	function baseMapSelect(str) {
			if (str == '1') {
				map.setBaseLayer(gmap);
			} else if (str == '2') {
				map.setBaseLayer(gphy);
			} else if (str == '3') {
				map.setBaseLayer(ghyb);
			} else {
				map.setBaseLayer(gsat);
			}
		}

	layerStyle = OpenLayers.Util.extend({}, OpenLayers.Feature.Vector.style['default']);
	pointLayer = new OpenLayers.Layer.Vector("Point data", {style: layerStyle});
	map.addLayer(pointLayer);
	
	selectControl = new OpenLayers.Control.SelectFeature([pointLayer]);
	map.addControl(selectControl);
	selectControl.activate();
	

	pointLayer.events.on({
		'featureselected': onFeatureSelect,
		'featureunselected': onFeatureUnselect,
		'beforefeatureremoved': onMarkerBeforeFeatureRemoved 
	});
	
	function onFeatureSelect(clickInfo) {
		clickedFeature = clickInfo.feature;
		popup = new OpenLayers.Popup.FramedCloud(
			"featurePopup",
			clickedFeature.geometry.getBounds().getCenterLonLat(),
			new OpenLayers.Size(300,300),
			clickedFeature.attributes.name,
			null,
			true,
			onPopupClose
		);
		clickedFeature.popup = popup;
		popup.feature = clickedFeature;
		map.addPopup(popup);
	}
					
	function onFeatureUnselect(clickInfo) {
		feature = clickInfo.feature;
		if (feature.popup) {
			popup.feature = null;
			map.removePopup(feature.popup);
			feature.popup.destroy();
			feature.popup = null;
		}
	}
					
	function onPopupClose(closeInfo) {
		selectControl.unselect(this.feature);
	}
	
	function onMarkerBeforeFeatureRemoved(evt){
		if(evt.feature.popup){
			map.removePopup(evt.feature.popup);
			evt.feature.popup.destroy();
			delete evt.feature.popup;
		}
	}

	function mainCategoryInitasli(){
			$.jsonp({
				url: "getmarkdemo.php",
				callback: "callback",
				success: function(data) {
					points = [];
					pointLayer.destroyFeatures();
					$.each(data, function(i, item){									
						var lat = item.lat;
						var lon = item.lon;
						var nama = item.nama;
						var tempat = item.tempat;
						var tema = item.tema;
						var judul = item.judul;
						var jmlpeserta = item.jmlpeserta;
						var tanggal = item.tanggal;
						var tempat = item.tempat;
						var photo = item.photo;
						var html = "<div><table border=0><tr><td colspan=3><center><font size=2><b>"+tema+"</b></font></center><hr></td></tr><tr><td><font size=2><b>Judul Kegiatan </b></font></td><td>:</td><td><font size=2>"+judul+"</font></td></tr><tr><td><font size=2><b>Lokasi Kegiatan</b></font></td><td>:</td><td><font size=2>"+tempat+"</font></td></tr><tr><td><font size=2><b>Jumlah Peserta</b></font></td><td>:</td><td><font size=2>"+jmlpeserta+"</font></td></tr><tr><td><font size=2><b>Tanggal</b></font></td><td>:</td><td><font size=2>"+tanggal+"</font></td></tr><tr><td><font size=2><b>Foto</b></font></td><td>:</td><td><img src='upload/"+photo+"' height='70px' width='120px' /></td></tr></table></div>";
						addMarker(lon, lat, html, nama, tema);
					});	
				},
				error: function() {
				
				}
			});
	}
	
	function mainCategoryInit(){
			$.jsonp({
				url: "dataOracle.php",
				callback: "callback",
				success: function(data) {
					points = [];
					pointLayer.destroyFeatures();
					$.each(data, function(i, item){									
						var lat = item.lat;
						var lng = item.lng;
						var point = new google.maps.LatLng(lat,lng);
						var tipe = item.tipe;
						var picture = item.picture;
						var alumni_url = getBaseUrl()+"/index.php/alumni2_frontpage/hid_filter/";
						var peserta_url = getBaseUrl()+"/index.php/peserta_frontpage/hid_filter/";
						var dosen_url = getBaseUrl()+"/index.php/dosen_frontpage/hid_filter/";
						if (!item.picture) picture = 'images/img/no.gif';
						var html = "<div style='min-height:100px;'>Keterangan : <br/>"+
							"<b>"+item.content+"</b>"+" (<a href='#' onclick='openWindow(\""+peserta_url+item.kodeupt+"\")'>detail</a>)"+"<br/>"+
							"Jumlah Peserta : "+item.peserta+"<br/>"+
							"Jumlah Alumni : "+item.alumni+"<br/>"+
							"Jumlah Dosen : "+item.dosen+"<br/>"+
							"Jumlah Instruktur : "+item.instruktur+"<br/>"+
							"Jumlah Widyaiswara : "+item.widyaiswara+
							"</div>";
						addMarker(lng, lat, html, '', tipe);
					});	
				},
				error: function() {
				
				}
			});
	}
	
	
	function addMarker(lon, lat, html, nama, tema) {
		myPoint = new OpenLayers.Geometry.Point(lon,lat).transform( map.displayProjection,  map.projection);
		bounds.extend(myPoint);
								
		var sampleStyle = OpenLayers.Util.extend({}, layerStyle);
		sampleStyle.fillOpacity = 1;
		sampleStyle.graphicOpacity = 1;							
		sampleStyle.graphicWidth = 20;
		sampleStyle.graphicHeight = 28;
		sampleStyle.graphicXOffset = -(28 / 2);
		sampleStyle.graphicYOffset = -28;
		sampleStyle.fontColor = "black";
		sampleStyle.fontSize = "12px";
		sampleStyle.labelAlign = "lt";
		sampleStyle.cursor= "pointer";
		sampleStyle.graphicTitle=nama;
		sampleStyle.graphicName="square";
		sampleStyle.label=nama;
		sampleStyle.labelXOffset=10;
		sampleStyle.labelYOffset=12;
		sampleStyle.fontFamily="verdana";
		if (tema == "UPT PERHUBUNGAN DARAT"){
			sampleStyle.externalGraphic = "images/symbol/SDall.png";
		}else if (tema == "UPT PERHUBUNGAN LAUT"){
			sampleStyle.externalGraphic = "images/symbol/SMPall.png";
		}else{
			sampleStyle.externalGraphic = "images/symbol/PTall.png";
		}
		sampleStyle.labelBackgroundColor = "#fcf9f9";
		sampleStyle.labelPadding = "3px";
		sampleStyle.labelBorderColor = "#333";
		sampleStyle.labelBorderSize = "solid 1px";
		sampleStyle.labelSelect = true;
		sampleStyle.display = 'none';
	
		myPointFeature = new OpenLayers.Feature.Vector( myPoint,null,sampleStyle);
		myPointFeature.attributes = {
			name: html	
		};
		myPointFeature.type = tema; 
		pointLayer.addFeatures( [ myPointFeature ] );
	}
	
	function VesselZoom(str) {
		coords = str.split("@");
		var x = coords[1];
		var y = coords[2];
		var centering = new OpenLayers.LonLat( y , x );
		centering = centering.transform(map.displayProjection, map.projection);
		zoom = map.getZoom();
		map.setCenter(centering,zoom);
	}
	
	function showMark(str) {
		if (document.getElementById(str).checked) {
			for (i=0;i<=pointLayer.features.length - 1;i++) {
				if(pointLayer.features[i].type == str) {
					pointLayer.features[i].style.display = 'block';
					pointLayer.redraw();
				}
			}	
		} else {
			for (i=0;i<=pointLayer.features.length - 1;i++) {
				if(pointLayer.features[i].type == str) {
					pointLayer.features[i].style.display = 'none';
					pointLayer.redraw();
				}	
			}
		}
	}
	
	$(function(){
		mainCategoryInit();
		//markerInit()
		
	});
	/*
	map.events.register('zoomend', this, function() {
		if (map.getZoom() < 5) {
			kmlFar.setVisibility(true);
		} else {
			kmlFar.setVisibility(false);
		}
		console.log(map.getZoom);
	});
	*/
	
	function boxclick(box, category) {
		//alert(category);
		if (document.getElementById(category).checked) {
			for (i=0;i<=pointLayer.features.length - 1;i++) {
				if(pointLayer.features[i].type == category) {
					pointLayer.features[i].style.display = 'block';
					pointLayer.redraw();
				}
			}	
		} else {
			for (i=0;i<=pointLayer.features.length - 1;i++) {
				if(pointLayer.features[i].type == category) {
					pointLayer.features[i].style.display = 'none';
					pointLayer.redraw();
				}	
			}
		}
	}
	
	
	
function boxclick2(box, category){
	if(box.checked) {
		if (category == 'MATRA DARAT') {
			create_kmlFileDaratOK(103);  
		}else if (category == 'MATRA LAUT') {
			create_kmlFileDaratOK(104); 
		}else if (category == 'MATRA UDARA') {
			create_kmlFileDaratOK(105);	
		}else if (category == 'MATRA KERETA') {
			create_kmlFileDaratOK(111);	
		}
	}
	else {
		for (i in shpLayers) {
			if(shpLayers[i]!=null){
				shpLayers[i].setVisibility(false);
			}
		}
	}  
	document.getElementById(category+"box").checked = box.checked;
	if (!box.checked) infowindow.close();
}

function boxclick3(box, category){
	if(box.checked) {
		if (category == 'DINAS PROVINSI') {
			create_kmlDinas(true);  		  
		}else if (category == 'DINAS KABUPATEN') {
			create_kmlDinas(false);
		}

		var kmlOptions = {
		   suppressInfoWindows: false
		};
	}
	else {
		for (i in shpLayers) {
			if(shpLayers[i]!=null){
				shpLayers[i].setVisibility(false);
			}
		}
	}  
	document.getElementById(category+"box").checked = box.checked;
	if (!box.checked) infowindow.close();
}

function create_kmlFileDaratOK(kantor){
	var pesan = new Array();
	var notYet = [3381,3382,3383,3285,3405,3530,3581,3601,3602,3603,3604,3671,3672,5272,5310,5313,5314,5315,5381,5401,5402,5403,5404,5405,5406,5407,5408,5409,5410,5411,5412,5481,6101,6103,6107,6108,6181,6206,6207,6208,6209,6210,6211,6212,6213,6310,6311,6381,6402,6403,6404,6405,6406,6407,6408,6409,6471,6472,6481,6482,7105,7106,7174,7205,7206,7207,7208,7209,7281,7322,7323,7324,7325,7381,7382,7405,7481,7482,7501,7502,7503,7504,7505,8105,8106,8181,8201,8202,8203,8204,8205,8206,8207,8208,8209,8210,8211,8212,8213,8214,8215,8216,8217,8218,8219,8220,8221,8222,8223,8224,8225,8271,8272,8701,8702,8703,8704,8705,8706,8771,8772,1109,1110,1111,1112,1113,1114,1115,1116,1181,1182,1212,1213,1214,1215,1216,1281,1282,1283,1309,1381,1401,1402,1403,1404,1405,1406,1407,1408,1409,1410,1471,1472,1481,1482,1506,1507,1508,1509,1510,1511,1609,1672,1681,1682,1683,1684,1704,1705,1706,1805,1806,1807,1881,1901,1902,1903,1904,1905,1906,1971,2001,2002,2003,2071,2072,3176,3276,3281,3282,3283,3284,3285,3286,3304,3326];
	$.jsonp({
		//url: "dataSDMKementerian.php?unitkantor="+kantor,
		url: "dataSDMKementerian.php?unitkantor="+kantor,
		callback: "callback",
		success: function(data) {
		$.each(data, function(i, item){
		
				var kode = item.kode;				
				var jumlah = item.jumlah;
				var total = item.total;
				var nama = item.nama;
				
				var low = total/4;
				var nrm = low + low;
				var hi  = nrm + low;
				var color = 'green';
				
				if(jumlah<low){ color = 'red'}
				else if(jumlah<nrm){ color = 'yellow'}
				else { color = 'green'}
			 	
				// var red = {
					// strokeColor: "#800000",
					// strokeOpacity: 1,
					// strokeWidth: 2,
					// fillColor: "#FF0000",
					// fillOpacity: 0.7
				// };
				var exe = true;
				
				for (var j=0;j<notYet.length;j++)
				{ 
					if(notYet[j]==kode){
						exe = false;
						//alert('Error: Layer '+kode+' Not Found');
					}
				}
				
				if(exe){
					shpLayers[i] = new OpenLayers.Layer.WMS( 
						"Indo Kab Reg "+kode, 
						"http://localhost:8090/geoserver/bpsdm_gis/wms", 
						{workspace: 'bpsdm_gis',layers: kode, transparent: true, format:'image/png',styles:color}, 
						{opacity: 0.8,singleTile: false,isBaseLayer:false}
					);
					
					pesan[i] = new Array(2);
					pesan[i][0] = kode;
					pesan[i][1] = "<div style='min-height:100px;'>Keterangan : <br/>"+"<b>"+item.nama+"</b><br/>"+"Jumlah SDM : "+item.jumlah+"</div>";
								
					map.addLayer(shpLayers[i]);	
					//alert(kode);
					//var centerlonlat = new OpenLayers.LonLat( 107.623701, -6.909812 );
					//centerlonlat=centerlonlat.transform(map.displayProjection, map.projection);
				}else{
					shpLayers[i] = null;
					pesan[i] = new Array(2);
					pesan[i][0] = kode;
					pesan[i][1] = "";
				}
			});
					
			info = new OpenLayers.Control.WMSGetFeatureInfo({
				url: 'http://localhost:8090/geoserver/wms', 
				layerUrls: ['http://localhost:8090/geoserver/bpsdm_gis/wms'],
				title: 'Identify features by clicking',
				infoFormat: 'text/html',
				queryVisible: true,
				eventListeners: {
					getfeatureinfo: function(event) {
						console.log(event); 
						el = document.createElement('p');
						el.innerHTML = event.text;
						if(el.querySelector('caption.featureInfo') != null){
							var lid = el.getElementsByTagName("caption")[0].firstChild.data;
							var msg = '';
							for (var i=0;i<pesan.length;i++)
							{ 
								if(pesan[i][0]==lid){
									msg = pesan[i][1];
								}
							}
							map.addPopup(new OpenLayers.Popup.FramedCloud(
								"popup", 
								map.getLonLatFromPixel(event.xy),
								null,
								msg,
								null,
								true
							));
						}
					}
				}
			});
			
			map.addControl(info);
			info.activate();
		},
		error: function() {
		   alert('Error crete SHP, Please check your internet connection!!');
		}
	});
}

function showInfo(evt) {
	if (evt.features && evt.features.length) {
		 highlightLayer.destroyFeatures();
		 highlightLayer.addFeatures(evt.features);
		 highlightLayer.redraw();
	} else {
		document.getElementById('responseText').innerHTML = evt.text;
	}
}
	
function getBaseUrl(){
	pathArray = window.location.href.split( '/' );
	protocol = pathArray[0];
	host = pathArray[2];
	url = protocol + '//' + host;
	var loc = window.location.pathname;
	var base_dir = loc.substring(0, loc.lastIndexOf('/')).substring(0, loc.lastIndexOf('/'));
	base_dir = base_dir.substring(0, base_dir.lastIndexOf('/'));
	base_dir = base_dir.substring(0, base_dir.lastIndexOf('/'));
	return (url + base_dir);
}

function create_kmlDinas(prov){
	var pesan = new Array();
	var notYet = [3381,3382,3383,3285,3405,3530,3581,3601,3602,3603,3604,3671,3672,5272,5310,5313,5314,5315,5381,5401,5402,5403,5404,5405,5406,5407,5408,5409,5410,5411,5412,5481,6101,6103,6107,6108,6181,6206,6207,6208,6209,6210,6211,6212,6213,6310,6311,6381,6402,6403,6404,6405,6406,6407,6408,6409,6471,6472,6481,6482,7105,7106,7174,7205,7206,7207,7208,7209,7281,7322,7323,7324,7325,7381,7382,7405,7481,7482,7501,7502,7503,7504,7505,8105,8106,8181,8201,8202,8203,8204,8205,8206,8207,8208,8209,8210,8211,8212,8213,8214,8215,8216,8217,8218,8219,8220,8221,8222,8223,8224,8225,8271,8272,8701,8702,8703,8704,8705,8706,8771,8772,1109,1110,1111,1112,1113,1114,1115,1116,1181,1182,1212,1213,1214,1215,1216,1281,1282,1283,1309,1381,1401,1402,1403,1404,1405,1406,1407,1408,1409,1410,1471,1472,1481,1482,1506,1507,1508,1509,1510,1511,1609,1672,1681,1682,1683,1684,1704,1705,1706,1805,1806,1807,1881,1901,1902,1903,1904,1905,1906,1971,2001,2002,2003,2071,2072,3176,3276,3281,3282,3283,3284,3285,3286,3304,3326];
	
	$.jsonp({
		url: "dataSDMDinas.php?prov="+prov,
		callback: "callback",
		success: function(data) {
		$.each(data, function(i, item){
				var kode = item.kode;
				var jumlah = item.jumlah;
				var total = item.total;
				var nama = item.nama;
				
				var low = total/4;
				var nrm = low + low;
				var hi  = nrm + low;
				
				if(jumlah<low){ color = "red";}
				else if(jumlah<nrm){ color = "yellow";}
				else { color = "green";}
				
				var exe = true;
				
				for (var j=0;j<notYet.length;j++)
				{ 
					if(notYet[j]==kode){
						exe = false;
					}
				}
				
				if(exe){
					shpLayers[i] = new OpenLayers.Layer.WMS( 
						"Indo Kab Reg "+kode, 
						"http://localhost:8090/geoserver/bpsdm_gis/wms", 
						{workspace: 'bpsdm_gis',layers: kode, transparent: true, format:'image/png', styles:color}, 
						{opacity: 0.8,singleTile: false,isBaseLayer:false}
					);
					
					pesan[i] = new Array(2);
					pesan[i][0] = kode;
					pesan[i][1] = "<div style='min-height:100px;'>Keterangan : <br/>"+"<b>"+item.nama+"</b><br/>"+"Jumlah SDM : "+item.jumlah+"</div>";
				
					map.addLayer(shpLayers[i]);	
				}else{
					shpLayers[i] = null;
					pesan[i] = new Array(2);
					pesan[i][0] = kode;
					pesan[i][1] = "";
				}
				//alert(kode);
			});
					
			info = new OpenLayers.Control.WMSGetFeatureInfo({
				url: 'http://localhost:8090/geoserver/wms', 
				layerUrls: ['http://localhost:8090/geoserver/bpsdm_gis/wms'],
				title: 'Identify features by clicking',
				infoFormat: 'text/html',
				queryVisible: true,
				eventListeners: {
					getfeatureinfo: function(event) {
						console.log(event); 
						el = document.createElement('p');
						el.innerHTML = event.text;
						if(el.querySelector('caption.featureInfo') != null){
							var lid = el.getElementsByTagName("caption")[0].firstChild.data;
							var msg = '';
							for (var i=0;i<pesan.length;i++)
							{ 
								if(pesan[i][0]==lid){
									msg = pesan[i][1];
								}
							}
							map.addPopup(new OpenLayers.Popup.FramedCloud(
								"popup", 
								map.getLonLatFromPixel(event.xy),
								null,
								msg,
								null,
								true
							));
						}
					}
				}
			});
			
			map.addControl(info);
			info.activate();
		},
		error: function() {
		   alert('Error crete SHP, Please check your internet connection!!');
		}
	});
}

function openWindow(url){
	var w = 1024;
	var h = 685;
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
    window.open(url,'popUpWindow','height='+h+',width='+w+',left='+left+',top='+top+',resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=yes');
}
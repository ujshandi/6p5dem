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
			shpLayers[i].setVisibility(false);
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
			shpLayers[i].setVisibility(false);
		}
	}  
	document.getElementById(category+"box").checked = box.checked;
	if (!box.checked) infowindow.close();
}

function create_kmlFileDaratOK(kantor){
	var info = new Array();
	var detail = new Array();
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
				
				var pesan= "<div style='min-height:100px;'>Keterangan : <br/>"+
					"<b>"+item.nama+"</b><br/>"+
					"Jumlah SDM : "+item.jumlah+
					"</div>";
				
				shpLayers[i] = new OpenLayers.Layer.WMS( 
					"Indo Kab Reg "+kode, 
					"http://localhost:8090/geoserver/bpsdm_gis/wms", 
					{workspace: 'bpsdm_gis',layers: kode, transparent: true, format:'image/png',styles:color}, 
					{opacity: 0.8,singleTile: false,isBaseLayer:false}
				);
				
				detail[i] = pesan;
							
				map.addLayer(shpLayers[i]);	
				//alert(kode);
				//var centerlonlat = new OpenLayers.LonLat( 107.623701, -6.909812 );
				//centerlonlat=centerlonlat.transform(map.displayProjection, map.projection);
				
			});
			// var queryableMapLayers = shpLayers;
			
			// var info = new OpenLayers.Control.WMSGetFeatureInfo({
			  // url: 'http://localhost:8090/geoserver/wms' // Your WMS server url here,
			  // drillDown: false, // Or true if you want drill down (see the docs)
			  // hover: false, // Or true if you want but bear in mind this could get chatty
			  // layers: queryableMapLayers,
			  // eventListeners: {
				// getfeatureinfo: function (event) {
				  // // Code here if you want to process the results
				// },
				// beforegetfeatureinfo: function(event) {
				  // // Code here to set the content of queryableMapLayers
				  // // The event object will contain xy of mouse click
					
				// },
				// nogetfeatureinfo: function(event) {
				  // // Code here if no queryable layers are found
				// }
			  // } 
			// });
			// info = new OpenLayers.Control.WMSGetFeatureInfo({
				// url: 'http://localhost:8090/geoserver/wms', 
				// layerUrls: ['http://localhost:8090/geoserver/bpsdm_gis/wms'],
				// title: 'Identify features by clicking',
				// queryVisible: true,
				// eventListeners: {
					// getfeatureinfo: function(event) {
						// console.log(event);
						// map.addPopup(new OpenLayers.Popup.FramedCloud(
							// "popup", 
							// map.getLonLatFromPixel(event.xy),
							// null,
							// event.text,
							// null,
							// true
						// ));
					// }
				// }
			// });
			// map.addControl(info);
			// info.activate();
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
				
				// if(prov){
					// var shpUrl = 'http://6p5dem.googlecode.com/svn/trunk/application/gis/kml/province/'+color+'/'+kode+'.kml';
				// }else{
					// var shpUrl = 'http://6p5dem.googlecode.com/svn/trunk/application/gis/kml/'+color+'/'+kode+'.kml';
				// }
				
				shpLayers[i] = new OpenLayers.Layer.WMS( 
					"Indo Kab Reg "+kode, 
					"http://localhost:8090/geoserver/bpsdm_gis/wms", 
					{workspace: 'bpsdm_gis',layers: kode, transparent: true, format:'image/png', styles:color}, 
					{opacity: 0.8,singleTile: false,isBaseLayer:false}
				);
  			
				map.addLayer(shpLayers[i]);	
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
						map.addPopup(new OpenLayers.Popup.FramedCloud(
							"popup", 
							map.getLonLatFromPixel(event.xy),
							null,
							event.text,
							null,
							true
						));
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
    window.open(url,'popUpWindow','height=700,width=1024,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes');
}
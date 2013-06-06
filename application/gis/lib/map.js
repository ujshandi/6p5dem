var mapPanel;
var map, lyrLine, zoom;
var points = [];
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

	function mainCategoryInit(){
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
		sampleStyle.graphicTitle=tema;
		sampleStyle.graphicName="square";
		sampleStyle.label=tema;
		sampleStyle.labelXOffset=10;
		sampleStyle.labelYOffset=12;
		sampleStyle.fontFamily="verdana";
		if (tema == "Bimbingan Teknis"){
			sampleStyle.externalGraphic = "images/symbol/SDall.png";
		}else if (tema == "Diklat"){
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
		myPointFeature.type = nama; 
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
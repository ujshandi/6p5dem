var mapPanel;
var bounds = new OpenLayers.Bounds();
var points = [];
var map, zoom;
var myPoint, pointLayer, center;

var gphy = new OpenLayers.Layer.Google("Google Physical", {type: google.maps.MapTypeId.TERRAIN});
var gmap = new OpenLayers.Layer.Google("Google Streets", {type: google.maps.MapTypeId.ROAD, numZoomLevels: 22});
var osm = new OpenLayers.Layer.OSM("Open Street Map");
//var ghyb = new OpenLayers.Layer.Google("Google Hybrid", {type: google.maps.MapTypeId.HYBRID, numZoomLevels: 22});
//var URL_Topo = "http://tiles.navigasi.net/navnet-hybrid/${z}/${x}/${y}.png'";
var URL_Topo = "http://tiles.navigasi.net/navnet-hybrid/${z}/${x}/${y}.png'";
var lyrTopo = new OpenLayers.Layer.OSM("Navigasi.Net - Topo", URL_Topo );


/*setting layout geoext*/
Ext.onReady(function() {	 
					 
	new Ext.Viewport({
        layout: "border",
        items: [{
            region: "north",
            contentEl: "title",			
            height: 50
        }, {
            region: "center",
			contentEl: "map",
            id: "mappanel",
            //title: "Map",
			map: map,
            xtype: "gx_mappanel"
            //layers: [layer],
            //extent: extent,
            //split: true
        }, {
            region: "west",
            title: "Description",
            //contentEl: "description",
			collapsible: true,
			animCollapse: true,
			margins: '0 0 0 5',
			layout: 'accordion',
			items: [{
                    //contentEl: 'west',
                    title: 'Point Lokasi',
					autoScroll:true,
					contentEl: "lokasi",
                    iconCls: 'nav' // see the HEAD section for style used
                }, {
                    title: 'Sebaran Mutu Pendidikan',
					autoScroll:true,
                    html: '<p>Some settings in here.</p>',
                    iconCls: 'settings'
                }, {
                    title: 'Information',
                    html: '<p>Some info in here.</p>',
                    iconCls: 'info'
                }],
            width: 250
            //split: true
        }, {
            region: "south",
            //title: "Description",
            contentEl: "footer",
            height: 20
            //split: true
        }]
    });
	var zoom_awal = 13;
	map.setCenter(centerlonlat,zoom_awal);
	
	mapPanel = Ext.getCmp("mappanel");
});


map = new OpenLayers.Map({
		controls:[
			new OpenLayers.Control.Navigation(),
			new OpenLayers.Control.PanZoomBar(),
			new OpenLayers.Control.ScaleLine(),
			new OpenLayers.Control.MousePosition({
		div: document.getElementById('external_control') })],
		div: "map",
		maxResolution: "auto",
		units: 'm',
		projection: new OpenLayers.Projection('EPSG:900913'),
		'displayProjection': new OpenLayers.Projection('EPSG:4326'),
		maxResolution: 156543.0339,
		maxExtent: new OpenLayers.Bounds(-20037508.34, -20037508.34, 20037508.34, 20037508.34)
	});

map.addLayers([osm, gmap, gphy, lyrTopo]);

var centerlonlat = new OpenLayers.LonLat( 107.623701, -6.909812 );
centerlonlat=centerlonlat.transform(map.displayProjection, map.projection);
var zoom_awal = 13;
map.setCenter(centerlonlat,zoom_awal);
	
layerStyle = OpenLayers.Util.extend({}, OpenLayers.Feature.Vector.style['default']);
pointLayer = new OpenLayers.Layer.Vector("Point data", {style: layerStyle});
map.addLayer(pointLayer);

selectControl = new OpenLayers.Control.SelectFeature([pointLayer]);
map.addControl(selectControl);
selectControl.activate();

//memanggil fungsi klik untuk menampilkan info, featureselected, featureunselected, dideklarasikan fungsinya di bawah
pointLayer.events.on({
	'featureselected': onFeatureSelect,
	'featureunselected': onFeatureUnselect,
	'beforefeatureremoved': onMarkerBeforeFeatureRemoved 
});

//deklarasi untuk fungsi klik menampilkan info start
function onFeatureSelect(clickInfo) {
	clickedFeature = clickInfo.feature;
	popup = new OpenLayers.Popup.FramedCloud(
		"featurePopup",
		clickedFeature.geometry.getBounds().getCenterLonLat(),
		new OpenLayers.Size(120,250),
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
//deklarasi untuk fungsi klik menampilkan info end

//deklarasi fungsi pilih jenis peta
function baseMapSelect(str) {
		if (str == '1') {
			map.setBaseLayer(lyrTopo);
		} else if (str == '2') {
			map.setBaseLayer(osm);
		} else if (str == '3') {
			map.setBaseLayer(gmap);
		} else if (str == '4') {
			map.setBaseLayer(lyrTopo);
		} else {
			map.setBaseLayer(gphy);
		}
	}

//setup mengambil data dari file lain dengan menggunakan json start
function vesselInit(){
		$.jsonp({
			//url: "getmark.php?q="+strnya,
			url: "getmark.php",
			callback: "callback",
			success: function(data) {
				points = [];
				pointLayer.destroyFeatures();
				$.each(data, function(i, item){									
					var lat = item.lat;
					var lon = item.lon;
					var nama = item.nama;
					var jenjang = item.jenjang;
                    var jenis = item.jenis;
                    var jurusan = item.jurusan;
                    var alamat = item.alamat;
                    var kecamatan = item.kecamatan;
                    var kelurahan = item.kelurahan;
                    var jmlpengajar = item.jmlpengajar;
                    var jmlsiswa = item.jmlsiswa;
                    var rata = item.rata;
                    var sarana = item.sarana;
                    var telepon = item.telepon;
                    var website = item.website;
                    var photo = item.photo;
					var html = "<div><table border=0><tr><td colspan=3><center><font size=2><b>"+nama+"</b></font></center><hr></td></tr><tr><td><font size=2><b>Alamat </b></font></td><td>:</td><td><font size=2>"+alamat+"</font></td></tr><tr><td><font size=2><b>Sarana</b></font></td><td>:</td><td><font size=2>"+sarana+"</font></td></tr><tr><td><font size=2><b>Telepon</b></font></td><td>:</td><td><font size=2>"+telepon+"</font></td></tr><tr><td><font size=2><b>Web Site</b></font></td><td>:</td><td><font size=2>"+website+"</font></td></tr><tr><td><font size=2><b>Foto</b></font></td><td>:</td><td><font size=2>"+photo+"</font></td></tr></table></div>";
					addMarker(lon, lat, html, nama, jenjang); //memanggil fungsi addMarker
				});	
			},
			error: function() {
							
			}
		});
}
//setup mengambil data dari file lain dengan menggunakan json end


//fungsi untuk menampilkan point
//fungsi addmarker yang penting urutannya sama pada pemanggilan di fungsi setup peta. variable boleh beda
function addMarker(lon, lat, html, nama, jenjang) {
	myPoint = new OpenLayers.Geometry.Point(lon,lat).transform( map.displayProjection,  map.projection);
	bounds.extend(myPoint);
							
	var sampleStyle = OpenLayers.Util.extend({}, layerStyle);
	sampleStyle.fillOpacity = 1;
	sampleStyle.graphicOpacity = 1;							
	sampleStyle.graphicWidth = 12;
	sampleStyle.graphicHeight = 16;
	sampleStyle.graphicXOffset = -(16 / 2);
	sampleStyle.graphicYOffset = -16;
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
	sampleStyle.externalGraphic = "images/symbol/ppip/p2kp.png";
	sampleStyle.labelBackgroundColor = "#fcf9f9";
	sampleStyle.labelPadding = "3px";
	sampleStyle.labelBorderColor = "#333";
	sampleStyle.labelBorderSize = "solid 1px";
	sampleStyle.labelSelect = true;
	sampleStyle.display = 'none';

	myPointFeature = new OpenLayers.Feature.Vector( myPoint,null,sampleStyle);
	myPointFeature.attributes = {
		name: html	//memilih variable yang akan menampilkan informasi
	};
	myPointFeature.type = jenjang; //memilih kategori untuk grouping
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

function resetOverlay() {
	vesselInit();
}

$(function(){
	vesselInit();
});
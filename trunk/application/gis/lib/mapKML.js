var infoWindowHeight = "215px";
var infoWindowWidth = "350px";
var gmarkers = [];
var gicons = [];
var kmlLayerURL=[];
var kmlLayers=[];
var overlay;
var map = null;
var kmlLayer = null;
MyOverlay.prototype=new google.maps.OverlayView;
MyOverlay.prototype.onAdd=function(){};
MyOverlay.prototype.onRemove=function(){};
MyOverlay.prototype.draw=function(){};
function MyOverlay(mymap){this.setMap(mymap)}

var infowindow = new google.maps.InfoWindow({ 
});

gicons["red"] = new google.maps.MarkerImage("images/mapIcons/marker_red.png",
	new google.maps.Size(20, 34),
	new google.maps.Point(0,0),
	new google.maps.Point(9, 34)
);
var iconShadow = new google.maps.MarkerImage('images/mapIcons/shadow50.png',
	new google.maps.Size(51, 51),
	new google.maps.Point(0,0),
	new google.maps.Point(9, 34)
);

var iconPath = ('images/mapIcons/');
var	imgSizeX = 35;
var	imgSizeY = 35;


function createIcon(category){
	if(category == 'UPT PERHUBUNGAN DARAT'){
		category = 'hubdarat'
	}
	if(category == 'UPT PERHUBUNGAN LAUT'){
		category = 'hublaut'
	}
	if(category == 'UPT PERHUBUNGAN UDARA'){
		category = 'hubudara'
	}
	icon = new google.maps.MarkerImage(iconPath + category + '.png',
		new google.maps.Size(imgSizeX, imgSizeY),
		new google.maps.Point(0,0),
		new google.maps.Point(imgSizeX/2, imgSizeY/2)
	)
	return icon;
}


function createMarker(latlng, category, html){
	var contentString = html;
	var marker = new google.maps.Marker({
            position: latlng,
			icon: createIcon(category),
            map: map,
			zIndex: Math.round(latlng.lat()*-100000)<<5,
			title: category
        });
		
		marker.mycategory = category; 
		marker.content = contentString;
		gmarkers.push(marker);
		
		google.maps.event.addListener(marker, 'click', function(){
		infowindow.setContent(contentString);
		infowindow.open(map, marker);
	});
	
}

function toggleShipVisibility(category, visibility) {
	if (category == 'UPT PERHUBUNGAN DARAT') {
		for (var i=0; i<gmarkers.length; i++) {
			if (gmarkers[i].mycategory == 'UPT PERHUBUNGAN DARAT') {
				gmarkers[i].setVisible(visibility);
			}
		}
	}else if (category == 'UPT PERHUBUNGAN LAUT') {
		for (var i=0; i<gmarkers.length; i++) {
			if (gmarkers[i].mycategory == 'UPT PERHUBUNGAN LAUT') {
				gmarkers[i].setVisible(visibility);
			}
		}
	}else if (category == 'UPT PERHUBUNGAN UDARA') {
		for (var i=0; i<gmarkers.length; i++) {
			if (gmarkers[i].mycategory == 'UPT PERHUBUNGAN UDARA') {
				gmarkers[i].setVisible(visibility);
			}
		}
	}
	
	document.getElementById(category+"box").checked = visibility;
	if (!visibility) infowindow.close();

}



function boxclick(box, category){
	toggleShipVisibility(category, box.checked);
}

function myclick(i){
	zoomLevel = map.getZoom();
	var latnya = gmarkers[i].getPosition().lat();
	var lngnya = gmarkers[i].getPosition().lng();
	if (MOPopupStatus == 1)	google.maps.event.trigger(gmarkers[i],"mouseover");
	if (MOPopupStatus == 2)	google.maps.event.trigger(gmarkers[i],"click");
	map.setCenter(new google.maps.LatLng(latnya,lngnya));
}

function LatLngControl(map) {

	this.node_ = this.createHtmlNode_();
	var dmsLat = map.getCenter().lat().toFixed(4);
	var dmsLon = map.getCenter().lng().toFixed(4);
	this.node_.innerHTML = 'Lat: ' +  dmsLat + '<br> Lon: ' + dmsLon;
	map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(this.node_);
	this.setMap(map);
}

LatLngControl.prototype = new google.maps.OverlayView();
LatLngControl.prototype.draw = function() {};

LatLngControl.prototype.createHtmlNode_ = function() {
	var divNode = document.createElement('div');
	divNode.id = 'latlng-control';
	divNode.index = 100;
	return divNode;
};

LatLngControl.prototype.visible_changed = function() {
	this.node_.style.display = this.get('visible') ? '' : 'none';
};

LatLngControl.prototype.updatePosition = function(latLng) {
	var dmsLat = latLng.lat().toFixed(4);
	var dmsLon = latLng.lng().toFixed(4);
	this.node_.innerHTML = 'Lat: ' +  dmsLat + '<br> Lon: ' + dmsLon;    
};

function mapInit(){
	var centerCoord = new google.maps.LatLng(-0.563985,118.088608);
	var mapOptions = {
		zoom: 6,
		center: centerCoord,
		draggable: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		mapTypeControl: true, //false
		mapTypeControlOptions: {
			style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
			position: google.maps.ControlPosition.TOP_RIGHT
		},
		panControl: true,
		panControlOptions: {
			  position: google.maps.ControlPosition.LEFT_CENTER
		},
		zoomControl: true,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.DEFAULT,
			position: google.maps.ControlPosition.LEFT_CENTER
		},
		scaleControl: false,
		scaleControlOptions: {
		  position: google.maps.ControlPosition.BOTTOM_LEFT
		},
		streetViewControl: false,
	}
	
	map = new google.maps.Map(document.getElementById("map"), mapOptions);
	overlay = new MyOverlay(map);
	
	google.maps.event.addListener(map, 'click', function() {
		infowindow.close();
	});	

	var latLngControl = new LatLngControl(map);
	
	google.maps.event.addListener(map, 'zoom_changed', function() {
		zoomLevel = map.getZoom();
	});
	google.maps.event.addListener(map, 'mouseover', function(mEvent) {
	  latLngControl.set('visible', true);
	});
	google.maps.event.addListener(map, 'mouseout', function(mEvent) {
	  latLngControl.set('visible', false);
	});
	google.maps.event.addListener(map, 'mousemove', function(mEvent) {
	  latLngControl.updatePosition(mEvent.latLng);
	});
    //var ctaLayer = new google.maps.KmlLayer({
    //url: 'http://gmaps-samples.googlecode.com/svn/trunk/ggeoxml/cta.kml'
	  //url: 'http://metrotrack.web.id/kab.kml'
	//url: 'http://6p5dem.googlecode.com/svn/trunk/application/gis/mapData/kabIndonesia.kml'
  //});
  //  wctaLayer.setMap(map);
}

function markerInit(){
	$.jsonp({
		url: "dataOracle.php",
		callback: "callback",
		success: function(data) {
			for (i in gmarkers) {
				gmarkers[i].setMap(null);
			}
			gmarkers.length = 0;
			$.each(data, function(i, item){
				var lat = item.lat;
				var lng = item.lng;
				var point = new google.maps.LatLng(lat,lng);
				var tipe = item.tipe;
				var picture = item.picture;
				if (!item.picture) picture = 'images/img/no.gif';
				var html = "Keterangan : "+item.content;
				marker = createMarker(point,tipe,html);
			});

			toggleShipVisibility("UPT PERHUBUNGAN DARAT", document.getElementById("UPT PERHUBUNGAN DARATbox").checked);
			toggleShipVisibility("UPT PERHUBUNGAN LAUT", document.getElementById("UPT PERHUBUNGAN LAUTbox").checked);
			toggleShipVisibility("UPT PERHUBUNGAN UDARA", document.getElementById("UPT PERHUBUNGAN UDARAbox").checked);
		},
		error: function() {

		   alert('Error creating marker, Please check your internet connection!!');
		}
	});
}

function resetOverlay() {
	for (i in gmarkers) {
		gmarkers[i].setMap(null);
	}
	gmarkers.length = 0;
	markerInit();	
}

function toggleShipVisibility2(category, visibility) {
	if (category == 'MATRA DARAT') {
		  show_layer_darat();
		  
	}else if (category == 'MATRA LAUT') {
		  show_layer_darat();
	}else if (category == 'MATRA UDARA') {
		  show_layer_darat();
	}
	
	document.getElementById(category+"box").checked = visibility;
	if (!visibility) infowindow.close();

}

function boxclick2xx(box, category){
	if (box.checked) toggleShipVisibility2(category, box.checked);
	else  kmlLayer.setMap(null) ;
}

function boxclick2(box, category){
  if(box.checked) {
	if (category == 'MATRA DARAT') {
	    create_kmlFileDaratOK();
		//kmlLayer01URL = 'http://6p5dem.googlecode.com/svn/trunk/application/gis/kml/bandung.kml';   		  
	}else if (category == 'MATRA LAUT') {
	   // kmlLayer01URL = 'http://6p5dem.googlecode.com/svn/trunk/application/gis/kml/bandung.kml';
		  
	}else if (category == 'MATRA UDARA') {
	    //kmlLayer01URL = 'http://6p5dem.googlecode.com/svn/trunk/application/gis/kml/bandung.kml';	  
	}
	
	var kmlOptions = {
       suppressInfoWindows: false
    };
    //kmlLayer = new google.maps.KmlLayer(kmlLayer01URL, kmlOptions);
    //kmlLayer.setMap(map);
	 
  }
  else {
	 kmlLayer.setMap(null) ;
  }  
	document.getElementById(category+"box").checked = box.checked;
	if (!box.checked) infowindow.close();
}

function create_kmlLayer(kmlURL,kmlOptions){
   kmlLayer = new google.maps.KmlLayer(kmlURL, kmlOptions);
}

function downloadUrl(url,callback) {
 var request = window.ActiveXObject ?
     new ActiveXObject('Microsoft.XMLHTTP') :
     new XMLHttpRequest;

 request.onreadystatechange = function() {
   if (request.readyState == 4) {
     request.onreadystatechange = doNothing;
     callback(request, request.status);
   }
 };

 request.open('GET', url, true);
 request.send(null);
}

function create_kmlFileDarat(){
  //alert("asdasd");
  //$('#resultMsg').load('createKmlDarat.php');
  $('#resultMsg').load('createKmlDarat.php', function() {
  //alert('Load was performed.');
  });
}

function create_kmlFileDaratOK(){
	$.jsonp({
		url: "dataSDMKementerian.php",
		callback: "callback",
		success: function(data) {
		$.each(data, function(i, item){
				var kode = item.kode;
				var jumlah = item.jumlah;
				//window.alert("kode: "+kode+"jumlah: "+jumlah);
				//window.alert(i);
				//var kmlOptions = {suppressInfoWindows: false};
				//kmlLayerURL = 'http://6p5dem.googlecode.com/svn/trunk/application/gis/kml/'+kode+'.kml';
				//window.alert(kmlLayerURL);
				//kmlLayer = new google.maps.KmlLayer(kmlLayerURL, kmlOptions);
                //kmlLayer.setMap(map);
				 kmlLayer = new google.maps.KmlLayer({
					url: 'http://6p5dem.googlecode.com/svn/trunk/application/gis/kml/'+kode+'.kml',
					suppressInfoWindows: false,
					map: map
				});
				
				
                 ;				
			});
		},
		error: function() {
		   alert('Error crete KML, Please check your internet connection!!');
		}
	});
}

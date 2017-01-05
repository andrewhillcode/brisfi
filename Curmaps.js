var map;
var map;
var TILE_SIZE = 256;
var arr = ["King George Square",-27.46589,153.02406];
var hotspot = new google.maps.LatLng(arr[1],arr[2]);

function getLocation() {
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(success);
	} 
}

function success(pos) {
  var crd = pos.coords;
  hotspot = new google.maps.LatLng(crd.latitude,crd.longitude);
  initialize()
}


function createInfoWindowContent() {
  return [
    arr[0],
  ].join('<br>');
}

function initialize() {
  var mapOptions = {
    zoom: 12,
    center: hotspot
  };

  map = new google.maps.Map(document.getElementById('mapResults'),
      mapOptions);

  var Hotspotinfo = new google.maps.InfoWindow();
  Hotspotinfo.setContent(createInfoWindowContent());
  Hotspotinfo.setPosition(hotspot);
  Hotspotinfo.open(map);

  google.maps.event.addListener(map, 'zoom_changed', function() {
    Hotspotinfo.setContent(createInfoWindowContent());
    Hotspotinfo.open(map);
  });
}

google.maps.event.addDomListener(window, 'load', getLocation);
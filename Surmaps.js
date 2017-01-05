var map;
var TILE_SIZE = 256;
var hotspot;

function success(pos) {
  var crd = pos.coords;
  hotspot = new google.maps.LatLng(crd.latitude,crd.longitude);
}

navigator.geolocation.getCurrentPosition(success);
 
function createInfoWindowContent() {
  return [
    ,
  ].join('<br>');
}

function initialize() {
  var mapOptions = {
    zoom: 16,
    center: hotspot
  };

  map = new google.maps.Map(document.getElementById('map'),
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

google.maps.event.addDomListener(window, 'load', initialize);
//xml request information
var xmlhttp = new XMLHttpRequest();
var url = "http://localhost/webcomputing/brisfi/mapData.php";
//map variables
var map;
var TILE_SIZE = 256;
//location variables
var arr = ["King George Square",-27.46589,153.02406];
var hotspot = new google.maps.LatLng(arr[1],arr[2]);

//grabs http messages 
xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {//checks status codes
        GetResponse(xmlhttp.responseText); //processes data
    }
}
xmlhttp.open("GET", url, true); //starts searching for http messages
xmlhttp.send();

function GetResponse(response) { //processing messages
    arr = response;
	hotspot = new google.maps.LatLng(Number(arr[1]),Number(arr[2])); //assigns hotspot coordinates
}

function initialize() { //called to create the map
  var mapOptions = { //zoom and centre the map
    zoom: 14,
    center: hotspot //centres on hotspot
  };

  map = new google.maps.Map(document.getElementById('map'),
      mapOptions); //creates map

  var Hotspotinfo = new google.maps.Marker({ //creates the marker for the hotspot
			position: hotspot,
			map: map,
			title: arr[0]
		});
  var infowindow = new google.maps.InfoWindow({ //creates info window 
		content: arr[0]
  });
		
  google.maps.event.addListener(Hotspotinfo, 'click', function() {
			infowindow.open(map,Hotspotinfo); //adds info window open listener 
		});
}

google.maps.event.addDomListener(window, 'load', initialize); //adds initialization listener 
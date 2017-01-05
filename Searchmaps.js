//xml request information
var xmlhttp = new XMLHttpRequest();
var url = "http://fastapps04.qut.edu.au/n9173838/brisfi/mapData.php";
//map variables
var map;
var TILE_SIZE = 256;

//empty location variables
var latlng = new google.maps.LatLng(-27.46589,153.02406);
var hotspots = [];
var hotspotIds = []
var coOrds= [];
var pins = [];
var info = [];
var i = 0;

//grabs http messages 
xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {//checks status codes
        GetResponse(xmlhttp.responseText); //processes data
    }
}
xmlhttp.open("GET", url, true); //starts searching for http messages
xmlhttp.send();

function GetResponse(response) { //processing messages
	if (!(response == null || response == "")) { //checks if empty 
		arr = response;
		coOrds[i] = new google.maps.LatLng(Number(arr[1]),Number(arr[2])); //assigns new hotspot coordinates
		hotspots[i] = arr[0]; //gets hotspot name
		hotspotIds[i] = arr[3]; //gets hotspot id
    i++;
	}
}

function createPins() { //creates all the markers for the map
	for (i = 0; i < hotspots.length; i++) { //loops through each hotspot
		pins[i] = new google.maps.Marker({
			position: coOrds[i], //set position
			map: map, //which map
			title: hotspots[i] // and title
		});
		info[i] = new google.maps.InfoWindow({ //creates a info window for each marker
			content: hotspots[i]+'<br>'+'<a href="http://localhost/webcomputing/brisfi/item.php?hotspotid='+hotspotIds[i]+'">More Info</a>'
		});
		google.maps.event.addListener(pins[i], 'click', OpenInfo(pins[i]));  //adds click event listener 
	}
}

function success(position) { //if the geo location was successful
  
  latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude); //sets user co ordinates 
  var user = new google.maps.Marker({ //creates a marker for their position  
      position: latlng, 
      map: map, 
      title:"Your location"
  });
}

function error(msg) { //if the geo location failed
  var s = document.querySelector('#status');
  s.innerHTML = typeof msg == 'string' ? msg : "failed"; //return error message
  s.className = 'fail';
  
  // console.log(arguments);-
}

if (navigator.geolocation) { //grabs user location for geo location search
  navigator.geolocation.getCurrentPosition(success, error); //grabs postion and processes response 
} else {
  error('not supported'); //geo navigation not supported error
}

function OpenInfo(pin) { //opens info window
	index = pins.indexOf(pin); //grabs the hotspot's index
	info[index].open(map,pin); //opens the window
}
function initialize() { //called to create the map
  var mapOptions = { //zoom and centre the map
    zoom: 14,
    center: coOrds[0] //centres on first received hotspot 
  };

  map = new google.maps.Map(document.getElementById('mapResults'),
      mapOptions); //creates map

  createPins(); //creates markers

  var centerlisten = google.maps.event.addListener(map, 'tilesloaded', function() {
    map.setZoom(12);
    map.setCenter(latlng);
    google.maps.event.removeListener(centerlisten); //adjusts the centre and zoom on start
  });

}

google.maps.event.addDomListener(window, 'load', initialize); //adds initialization listener 
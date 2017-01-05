function success(position) {
		  
		  var latlng = position.coords;
		  document.getElementById("lat").value = latlng.latitude;
		  document.getElementById("lng").value = latlng.longitude;
		  document.getElementById("geobutton").disabled = false;
		  document.getElementById("geo-message").style.display = "none";
		}

function error(msg) {
	var s = document.querySelector('#status');
	s.innerHTML = typeof msg == 'string' ? msg : "failed";
	s.className = 'fail';
}

if (navigator.geolocation) {
	navigator.geolocation.getCurrentPosition(success, error);
	} else {
	error('not supported');
	}
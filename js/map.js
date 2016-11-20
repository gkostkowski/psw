var cities = [
  {name: "Wroclaw", 	lat: 51.107885,            lng: 17.038538 },
  {name: "Krakow", 		lat: 50.064650,            lng: 19.944980 },
  {name: "Warszawa", 	lat: 52.229676,            lng: 21.012229 },
  {name: "Praga", 		lat: 50.075538,            lng: 14.437800 }
];


var map;
var markers = [];

function initMap() {
  var defaultCity = {lat: cities[0].lat, lng: cities[0].lng};

  map = new google.maps.Map(document.getElementById('map'), {
  zoom: 12,
  center: defaultCity
  });

map.addListener('click', function(event) {
    addMarker(event.latLng);
  });

  addMarker(defaultCity);
}

function addMarker(location) {
  var marker = new google.maps.Marker({
    position: location,
    map: map
  });
  markers.push(marker);
}

function removeMarkers(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(null);
  }
  markers = [];
}


function cityList() {
	var alertString = "";
	for (var i=0; i<cities.length; i++)
		alertString += "\n" + (i+1) + "." + cities[i].name;

	if (alertString.length == 0)
		alert("Brak proponowanych miast");
	else
		alert("Proponowane miasta: \n" + alertString);
}

function cityAmount() {
	var charNumber = 0;
	var i = 0;

	while (cities[i]) {
		charNumber += cities[i].name.length;
		i++;
	}

	alert("Ilość miast: " + cities.length +"\nSuma znaków w miastach: " + charNumber );
}

function randomCity() {
  var index = Math.floor(Math.random() * cities.length);
  removeMarkers();
  var location = {lat: cities[index].lat, lng: cities[index].lng}
  addMarker(location);
  map.setCenter(location);
  map.setZoom(12);

}

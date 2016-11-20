var map;
function initMap()
{
    var mapOptions = {
    center: new google.maps.LatLng('23.11', '71.00'),
    zoom: 2,
    scrollwheel: false,
    disableDefaultUI: false,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
		marker: new google.maps.Marker({
	 						position: new google.maps.LatLng(23.72, 72.100),
	 						map: map,
	 				}),
 };

  map = new google.maps.Map(document.getElementById("map"),mapOptions);
 }

 function addMarker(prop)
  {
		marker.setMap(null);
     marker = new google.maps.Marker({
                position: new google.maps.LatLng(prop.lat, prop.lng),
                map: map,
            });
  }

function getCityList() {
		return [
			{name: "Wroclaw", 	lat: 51.10815663, lng: 17.0482707}
			{name: "Krakow", 		lat: 0, lng: 17.0482707 },
			{name: "Warszawa", 	lat: 50, lng: 17.0482707 },
			{name: "Praga", 		lat: 2, lng: 30 }
		];
}


function cityList() {
	var alertString = "";
	var cityList = getCityList();
	for (var i=0; i<cityList.length; i++)
		alertString += "\n" + (i+1) + "." + cityList[i].name;

	if (alertString.length == 0)
		alert("Brak proponowanych miast");
	else
		alert("Proponowane miasta: \n" + alertString);
};

function cityAmount() {
	var cityList = getCityList();
	var charNumber = 0;
	var i = 0;

	while (cityList[i]) {
		charNumber += cityList[i].name.length;
		i++;
	}

	alert("Ilość miast: " + cityList.length +"\nSuma znaków w miastach: " + charNumber );
}

function randomCity() {
	var CityList = getCityList();
	var index = Math.floor(Math.random() * cityList.length);
	addMarker(CityList[index]);
}

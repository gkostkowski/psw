var wroc = {lat: 51.10815663, lng: 17.0482707};

function initMap() {
	var uluru = {lat: 51.10815663, lng: 17.0482707};
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 4,
		center: uluru
	});
	var marker = new google.maps.Marker({
		position: wroc,
		map: map
	});
}

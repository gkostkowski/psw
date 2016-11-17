
function calcualtePrice() {
	    var car = document.getElementById("car").value,
				isMen = document.getElementById("isMen").checked;
				oldEnought = document.getElementById("oldEnought").checked;
				abroad = document.getElementById("abroad").checked;
			var distance = parseInt(document.getElementById("distance").value);
			var days = parseFloat(document.getElementById("days").value);

			if ( isNaN(distance) || isNaN(days)) {
				alert("Nieprawidłowa wartość w polu 'Liczba kilometrow' lub 'Liczba dni'");
			}
			else {
				var carPrice = getCarPrice(car);
				var basicPrice = carPrice * distance + carPrice * days * 50;
				var finalPrice = isMen ? basicPrice * 1.05 : basicPrice * 1.1
					+ oldEnought ? basicPrice : basicPrice * 1.2
					+ abroad ? basicPrice * 1.3 : basicPrice
					+ Math.floor((Math.random() * 200));
				alert("Szacowana cena wynosi: " + finalPrice + ".");
			}
}

function getCarPrice(car) {
	switch (car) {
		case "scenic":
			return 4;
		case "audi":
			return 5;
		case "skoda_kombi":
			return 4;
		case "skoda_hatchback":
			return 3;
		default:
			return 2;
		};
}

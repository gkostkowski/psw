function init() {

		registerListeners( document.getElementById("name" ), "Podaj imię" );
		registerListeners( document.getElementById("lastName" ), "Podaj nazwisko" );
		registerListeners( document.getElementById("age" ), "Podaj wiek" );
		registerListeners( document.getElementById("comments" ), "Podaj informacje dodatkowe" );
		registerListeners( document.getElementById("submit" ), "Wyślij informacje" );
		registerListeners( document.getElementById("reset" ), "Anuluj" );
		var form = document.getElementById( "form" );
		var tip = document.getElementById( "tip" );
		function registerListeners( object, message ) {
				object.addEventListener( "focus",
						function() { tip.innerHTML = message; }, false );

				object.addEventListener( "blur",
						function() { tip.innerHTML = ""; }, false );
		}


		form.addEventListener( "submit",
				function() {
						return confirm( "Jesteś pewien, że chcesz wysłać te dane?" );
				},
		false );
		form.addEventListener( "reset",
				function() {
						return confirm( "Jesteś pewien, ze chcesz anulować?" );
		},
		false );
}

window.addEventListener( "load", init, false );

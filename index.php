<!DOCTYPE html>
<html lang="pl" id="root">
	<head>
		<meta charset="utf-8">
		<meta name="decription	" content="oferta wypożyczalni samochodowej">
		<meta name="keywords" content="wypożyczalnia, samochód, podróz, wakacje">
		<title>Strona główna</title>
		<script src="js/script.js"></script>
		<script src="js/l5z3.js"></script>
		<script src="js/l5z4.js"></script>
		<link rel = "stylesheet" type = "text/css" href = "css/style.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/popup.css" />
		<?php
			include 'db_utils.php';
			define('DEF_STYLE', 'common_style');
			define('HIGH_CON', 'common_style_high_contrast');
			//setcookie('colorMode');
			if(isset($_POST["black"])) 
			{
				setcookie('colorMode', HIGH_CON, time() + 60*60*24*3);
			} elseif(!isset($_COOKIE["colorMode"]) or isset($_POST["color"]) )
						setcookie('colorMode', DEF_STYLE,time() + 60*60*24*3);	
			echo("<script>console.log('PHP: zawartość ciastka colorMode: ".$_COOKIE["colorMode"]."');</script>");
			print("<link rel = \"stylesheet\" type = \"text/css\" href = \"css/$_COOKIE[colorMode].css\" />");
		?>

	</head>
	<body>
		<header>
				 <img src = "img/header_logo.png" alt = "Renting Cars logo" />
				 <h1 >Wypożyczalnia Renting Cars</h1>
				 <h2 >Zaufaj profesjonalistom i podążaj do celu samochodem na miarę Twoich oczekiwań!</h2>
		</header>
		<nav>
			<a href="form.html">Formularz rezerwacji</a> |
			<a href="flota.html">Flota</a> |
			<a href="order_form.html">Formularz osobowy</a> |
			<a href="detail_form.html">Formularz użytkownika</a> |
			<a href="info.html">Informacje dodatkowe</a> |
			<a href="orders.php">Zamówienia</a>
			<?php
				enableUsersSummary();
			?>
		</nav>
		<form action="#" method="post" style="opacity:1" class="prompt2">
					<p style="color:black;"><i>Tryb wyświetlania strony</i></p><br>
					<input type="submit" id="blackBtn" class="controls modeBtn" name="black" value="wysoki kontrast"></input>
					<input type="submit"  id="colorBtn" class="modeBtn" name="color"  value="kolor"></input>
				</form>
		<article>

			<p>
			Zapraszamy państwa do skorzystania z oferty naszej wypożyczalni.<br>
			Aby sprawdzić flotę, którą dysponujemy <a href="flota.html">kliknij tutaj</a><br>
			Aby zarezerwować samochód wypełnij <a href="form.html">formularz</a><br>
			W celu rezerwacji, wypełnij <a href="order_form.html">formularz</a>  osobowy
			</p>
		</article>

		<section>
			<h2 id="subtitle">Oferta</h2>
			<p>Zapraszamy do zapoznania z ofertą naszej wypożyczalni</p>
			<section>
				<h3>Wynajem krótkookresowy</h3>
				<p class ="clear_pos">Oferta wynajmu krótkoterminowego przygotowana jest zarówno dla osób fizycznych jak i dla podmiotów gospodarczych. Nasza wypożyczalnia oferuje cene wynajmu zmniejszającą 					się wraz z długością wynajmu.<br>
				Po 4 dobie automatycznie dostaniesz 10% rabatu, a od 8 doby aż 20% rabatu. W przypadku dłuższego najmu stawka dobowa zmienia się z każdym dodatkowym dniem.<br>
				Nasza flota składa się tylko z nowych i dobrze wyposażonych pojazdów, które są objęte pełnym pakietem ubezpieczeń AC/OC/NNW oraz Assistance Premium w całej Europie.
				Sprawdź i zarezerwuj pojazd już dzisiaj. Gwarantujemy zadowolenie.</p>
			</section>
			<section>
				<h3>Wynajem długookresowy</h3>
				<p>Oferta wynajmu długookresowego jest przygotowywany indywidualnie dla klienta dla pełnego zadowolenia i satysfakcji. Korzystając z naszych usług masz pewność stałych 				miesięcznych kosztów. Ponadto zapewniamy seris techniczny ASO, kompleksową likwidacje szkód, wymianę i przechoywanie opon, samochód zastępczy.
				Oferta jest przyznaczona tylko przedsiebiorstw</p>
			</section>
			<section>
				<h3>Wynajem z OC sprawcy</h3>
				<p>Jeżeli uczestniczyłeś w kolizji nie ze swojej winy i masz uszkodzone auto, przyjdź i wynajmij samochód zastępczy.</p>
				<section>
					<h4>Wymagane dokumenty</h4>
					<p>Aby móc skorzystać z oferty potrzebne są: nazwa zakładu ubezpieczeniowego sprawcy, numer szkody, skon osświadczenia o kolizji oraz skan dowodu rejestracyjnego</p>
				</section>
			</section>
			<section>
				<h3>Zarządzanie flotą</h3>
				<p>Jesli posiadasz problem z zarządzaniem flotą, nasi specjaliści pomogą Ci w prowadzeniu biznesem!</p>
			</section>

		</section>

		<footer>
			&copy; Renting Cars  2016<br>
			Wszelkie prawa do znaków handlowych zastrzeżone. <br>
			<a href="mailto:consultant@rentingcars.com">Kontakt</a>
			 |  <a href="index.php">Strona główna</a> |
			 <a href="mailto:admin@rentcar.com.html">Zgłoś uwagi</a>
		</footer>

		<div class="popup" id="popup">
			<p class="popup-title">Zmień styl bieżącego elementu:</p>
			<ul>
				<li onclick="setBg('blue');">Niebieskie tło</li>
				<li onclick="setFontColor('red');">Czerwona czcionka</li>
				<li onclick="changeFontSize('+');">Większa czcionka</li>
				<li onclick="changeFontSize('-');">Mniejsza czcionka</li>
				<li onclick="fontFamily('Verdana');">Czcionka Verdana</li>
				<li onclick="fontFamily('Helvetica');">Czcionka Helvetica</li>
			</ul>
		</div>
	</body>
	<button id="showPopup" onclick="showPopup()"></button>
	<button id="hidePopup" onclick="hidePopup()"></button>

</html>

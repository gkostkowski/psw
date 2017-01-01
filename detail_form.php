<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" >
		<title>Formularz osobowy</title>
		<meta name="decription	" content="oferta wypożyczalni samochodowej">
		<meta name="keywords" content="wypożyczalnia, samochód, podróz, wakacje">
		<script src="js/script.js"></script>
		<link rel = "stylesheet" type = "text/css" href = "css/style.css" />
		<script>document.writeln('<link rel = "stylesheet" type = "text/css" href = "css/'+getStyleName()+'" />')</script>
				<style>
			.search {
				width:250px;
				height:60px;
				padding: 5px 10px 5px 15px;
				position:relative;
				left: 58vw;
				background-color:pink;
			}
		</style>
	</head>
	<body>
		<header>
				 <img src = "img/header_logo.png" alt = "Renting Cars logo" />
				 <h1 >Wypożyczalnia Renting Cars</h1>
				 <h2 >Zaufaj profesjonalistom i podążaj do celu samochodem na miarę Twoich oczekiwań!</h2>
				 <div  id="colorBtn"></div>
				 <div  id="blackBtn" ></div>
		</header>
		<section>
			<p class="search" ><label><br>
	            		<input type="search" placeholder="Szukaj"/>
		        </label></p><br> 

			<div style="background:green; 
				padding:20px ; 
				box-shadow:2px 2px gray;
				box-radius:5px ;">
				<?php 
					define("MIN_SATSF",6);
					define("BRIGHT_COL","#103431");
					if(isset($_POST["color"]))
						print($_POST["color"]);
					if(isset($_POST["satisfaction"]))
						if ($_POST["satisfaction"] < MIN_SATSF)
							print("<p>Przykro Nam, że nie spełniamy Twoich oczekiwań - daj nam znać jak możemy to poprawić.</p>");
						else print("<p>Jesteśmy zadowoleni, że udaje nam się spełnić Twoje oczekiwania!</p>");
					$car_age=$_POST["month"];
					settype($car_age, "integer");
					if (date("Y") - $car_age < 1)
						$car_age = "nowy";
					elseif (date("Y") - $car_age < 4)
						$car_age = "używany";
					elseif (date("Y") - $car_age > 4)
						$car_age = "stary";
					print("<p>".htmlspecialchars("Twój samochód jest '".$car_age."'.", ENT_QUOTES)."</p>");
					if ($_POST["color"] > BRIGHT_COL)
						print("Preferujesz jaśniejsze kolory? Sprawdź Skodę Fabię w naszej ofercie!");
					else print("Preferujesz ciemniejsze kolory? Sprawdź Audi A4 w naszej ofercie!");
				?>
			</div>

		</section>
		<footer>
			&copy; Renting Cars  2016<br>
			Wszelkie prawa do znaków handlowych zastrzeżone. <br>
			<a href="mailto:consultant@rentingcars.com">Kontakt</a>
			 |  <a href="index.php">Strona główna</a> |
			 <a href="mailto:admin@rentcar.com.html">Zgłoś uwagi</a>
		</footer>
	</body>

</html>

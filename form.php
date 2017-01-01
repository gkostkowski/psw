<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" >
		<title>Formularz rezerwacji</title>
		<meta name="decription	" content="formularz do wypożyczania samochodów">
		<meta name="keywords" content="wypożyczalnia, samochód, podróz, wakacje">
		<script src="js/script.js"></script>
		<link rel = "stylesheet" type = "text/css" href = "css/style.css" />
		<script>document.writeln('<link rel = "stylesheet" type = "text/css" href = "css/'+getStyleName()+'" />')</script>
	</head>
	<body>
	<header>
				 <img src = "img/header_logo.png" alt = "Renting Cars logo" />
				 <h1 >Wypożyczalnia Renting Cars</h1>
				 <h2 >Zaufaj profesjonalistom i podążaj do celu samochodem na miarę Twoich oczekiwań!</h2>
				 <div  id="colorBtn"></div>
				 <div  id="blackBtn" ></div>
	</header>
  <h2 id="header">Formularz rezerwacji</h2>
  <div style="background:green;
    padding:20px ;
    box-shadow:2px 2px gray;
    box-radius:5px ;">
    <?php
			$name = $_POST["name"];
			$lastname = $_POST["lastname"];
      if (getType($name) == 'string' && getType($lastname) == 'string' && strlen($lastname) >0 && strlen($name) >0) {
        print("<p>imię i nazwisko poprawne</p>");
        print("<p>Zamówienie zostało przyjęte</p>");
      } else {
        print ("<p>podano niepoprawne dane</p>");
      }


      print("adress IP: ");
      print($_SERVER['REMOTE_ADDR']);

      $months[1] = "Styczen";
      $months[2] = "Luty";
      $months[3] = "Marzec";
      $months[10] = "Paźdzernik";
      $months[11] = "Listopad";
      $months[12] = "Grudzień";

      print("<p>Miesiące promocyjne: </p>");
      for ( reset( $months ); $element = key( $months ); next( $months ) )
        print( "<p>&nbsp&nbsp&nbsp&nbsp$months[$element]</p>" );

      $count = count($months);
      echo "\\Liczba miesięcy promocyjnych: \"$count\" ";

			//|| !isset($_POST["hasDrivingLicence"]) && isset($_POST["isOver25"]))
			if (isset($_POST["over1000km"]) ||  !isset($_POST["hasDrivingLicence"]) &&  isset($_POST["isOver25"])) {
					print("<p>Wynajem wysokiego ryzyka</p>");
			}
    ?>
  </div>
    <a class="bn_absolute_pos1" href="index.html">Powrót</a><br>
    <a class="bn_absolute_pos2" href="#start">Do góry</a><br>
    <br>
    <footer>
      &copy; Renting Cars  2016<br>
      Wszelkie prawa do znaków handlowych zastrzeżone. <br>
      <a href="mailto:consultant@rentingcars.com">Kontakt</a>
       |  <a href="index.php">Strona główna</a> |
       <a href="mailto:admin@rentcar.com.html">Zgłoś uwagi</a>
    </footer>
  </body>

</html>

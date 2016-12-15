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
	</header>
  <h2 id="header">Formularz rezerwacji</h2>
    <?php
		$link = mysql_connect('localhost', 'admin', 'haslo');
		if (!$link) {
		    die('Could not connect: ' . mysql_error());
		}
		echo 'Connected successfully';
		mysql_close($link);
    ?>
    <a class="bn_absolute_pos1" href="index.html">Powrót</a><br>
    <a class="bn_absolute_pos2" href="#start">Do góry</a><br>
    <br>
    <footer>
      &copy; Renting Cars  2016<br>
      Wszelkie prawa do znaków handlowych zastrzeżone. <br>
      <a href="mailto:consultant@rentingcars.com">Kontakt</a>
       |  <a href="index.html">Strona główna</a> |
       <a href="mailto:admin@rentcar.com.html">Zgłoś uwagi</a>
    </footer>
  </body>

</html>

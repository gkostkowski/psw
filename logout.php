<?php
session_start();
?>

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

<?php
if ($_SESSION["log"] == FALSE){
		echo '<p>Jesteś wylogowany</p>';
} else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$_SESSION["log"] = FALSE;
		echo '<a href="index.html" > Przejdź do strony głównej </a>';
		echo '<p>Wylogowano pomyślnie</p>';
} else if (isset($_SESSION["LOG"]) || isset($_SESSION["LOG"]) == FALSE) {
		echo
		'<h1>Zaloguj się!</h1>
		<form id="form" action="logout.php" method="post" >
			<input type="submit" value="Wyloguj!"/><br>
		</form>';
}

?>
    </body>
</html>

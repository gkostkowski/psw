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
if ($_SESSION["log"] == TRUE){
		echo '<p>Jesteś zalogowany</p>';
} else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$login = $_POST["login"];
		$password = $_POST["pass"];
		if (strcmp($login, '123') == 0 && strcmp($password, '123') == 0 ) {
				$_SESSION["log"] = TRUE;
				echo '<p>Zalogowano pomyślnie</p>';

				echo '<a href="orders.php" > Przejdź do zamówień </a>';
		} else {
				$_SESSION["log"] = FALSE;
				echo '<p>Niepoprawne dane, zaloguj się ponownie</p>';
				echo '<form id="form" action="logon.php" method="post" >
					Login<br>
					<input type="text" id="login" name="login"/><br><br>
					Hasło<br>
					<input type="password" id="pass" name="pass"><br><br>

					<input type="submit" value="Zaloguj!"/><br>
				</form>';
		}
} else if (isset($_SESSION["LOG"]) || isset($_SESSION["LOG"]) == FALSE) {
		echo
		'<h1>Zaloguj się!</h1>
		<form id="form" action="logon.php" method="post" >
			Login<br>
			<input type="text" id="login" name="login"/><br><br>
			Hasło<br>
			<input type="password" id="pass" name="pass"><br><br>

			<input type="submit" value="Zaloguj!"/><br>
		</form>';
}

?>
    </body>
</html>

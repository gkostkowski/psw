<?php
	session_start();
	if (isset($_COOKIE["debug"]))
		console_log($_COOKIE['debug']);
	include 'db_utils.php';
	
	function console_log( $data ){
	  echo '<script>';
	  echo 'console.log('. json_encode( $data ).')';
	  echo '</script>';
	}
	
	function isValidUser($login, $password) {
		
		$db = new DB();
		$stmt = $db->getUsers();
		$exists = false;
		while ($row = $stmt->fetch())
		{
			if ($row['login'] != NULL) console_log($row);
			if ($login==$row['login'] && $password == $row['password'])
				return true;
		}
		setcookie('debug', $exists, time() + 60*60*24*3);
		return false;
	}

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
echo '<a href="index.php" > Przejdź do strony głównej </a>';
if ($_SESSION["log"] == TRUE){
		echo "<p>Jesteś zalogowany jako <b>$_SESSION[loggedUser]</b></p>";
		
} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && ($_POST["login"] != '' && $_POST["pass"] != '')){
		$login = $_POST["login"];
		$password = $_POST["pass"];
		console_log($login);
		if (isValidUser($login, $password)){
		//if (strcmp($login, '123') == 0 && strcmp($password, '123') == 0 ) {
				$_SESSION["log"] = TRUE;
				$_SESSION["loggedUser"] = $login;
				echo '<p>Zalogowano pomyślnie</p>';
				echo("<script>console.log('PHP: zawartość ciastka log: ".$_SESSION["log"]."');</script>");
				echo '<a href="orders.php" > Przejdź do zamówień </a><br>';

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

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
if (!isset($_SESSION["log"]) || $_SESSION["log"] == FALSE){
	echo
		'<script type="text/javascript">
				 window.location = "logon.php"
		</script>';
} else {
		echo
			'<p>Zamowienia</p>
			<table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Samochód</th>
            <th>Data wynajmu</th>
            <th>Dystans</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Audi a3</td>
            <td>1.1.2015</td>
            <td>2000 km</td>
          </tr>
					<tr>
            <td>1</td>
            <td>Audi a3</td>
            <td>1.1.2015</td>
            <td>2000 km</td>
          </tr>
					<tr>
            <td>1</td>
            <td>Audi a3</td>
            <td>1.1.2015</td>
            <td>2000 km</td>
          </tr>
					<tr>
            <td>1</td>
            <td>Audi a3</td>
            <td>1.1.2015</td>
            <td>2000 km</td>
          </tr>
					<tr>
            <td>1</td>
            <td>Audi a3</td>
            <td>1.1.2015</td>
            <td>2000 km</td>
          </tr>
					';
			echo
				'<a href="logout.php">Wyloguj</a><br>
				<a href="index.php">Strona główna</a>';
}

?>
    </body>
</html>

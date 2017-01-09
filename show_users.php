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
		<script>document.writeln('<link rel = "stylesheet" type = "text/css" href = "css/'+getStyleName()+'" />')</script>
	</head>
	<body>
		<?php

      ?>
	 <p>Dane zarejestrowanych użytkowników przechowywane w bazie danych:</p>
	 <table>
         <caption>Dane użytkowników przechowywane w bazie danych</caption>
         <tr>
            <th>ID</th>
            <th>login</th>
            <th>hasło</th>
            <th>imię</th>
            <th>wiek</th>
         </tr>
         <?php
		
			function printRow($row) {
				$fields = ['id', 'login', 'password', 'name', 'age'];
				echo "<tr>";
				foreach ($fields as  $val)
					echo("<td>$row[$val]</td>");
				echo "</tr>";
			}
			
			include 'db_utils.php';
			$db = new DB();
			$stmt = $db->getUsers();
			while ($row = $stmt->fetch())
			{
				$val = $row['login'];
				printRow($row);			
			}
		?>
      </table>


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


<!DOCTYPE html>
<html>
	<?php
		function printTitle() {
			define("EDIT_T", "Edycja danych osobowych");
			define("ADD_T", "Rejestracja nowego użytkownika");
			echo "<h3>".EDIT_T."</h3>";
		}
		function printPrompt() {
			echo "<p>Wprowadź i zatwierdź swoje dane.</p>";
		}
	?>
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
		<br>

			<div class="prompt">
				<?php
					printTitle();
					printPrompt();
				?>
			</div>
			<?php
				$form = <<<HTML
				<form action="#" method="post">
					<p><label>Imię<br>
								<input type="text" id="name" name="name" placeholder="Imię"/>
						</label></p>

					<p><label>login<br>
								<input type="text" id="login" name="login"  placeholder="Login"/>
						</label></p>
					<p><label>hasło<br>
							<input type="text" id="password" name="password"  placeholder="Hasło"/>
					</label></p>
					<p><label>wiek<br>
							<input type="text" id="age" name="age"  placeholder="Wiek"/>
					</label></p>

					<p><input type="submit" value="Wyślij!">
							<input type="reset" value="Wyczysc"></p>
				</form>
HTML;
				$dbSaveSuccess =  <<<HTML
				<div style="height=100px; padding:20px 10px 20px 10x; background:green;">Zapis do bazy danych zakończony sukcesem<div>
				<a href="index.php" > Przejdź do strony głównej </a>
HTML;
				$dbSaveFail =  <<<HTML
				<div style="height=100px; padding:20px 10px 20px 10x; background:red;">Zapis do bazy danych nie powiódł się. <div>
				<a href="index.php" > Przejdź do strony głównej </a>
HTML;

				echo $dbSaveSuccess;
			?>
		</section>
		<footer>
			&copy; Renting Cars  2016<br>
			Wszelkie prawa do znaków handlowych zastrzeżone. <br>
			<a href="mailto:consultant@rentingcars.com">Kontakt</a>
			 |  <a href="index.html">Strona główna</a> |
			 <a href="mailto:admin@rentcar.com.html">Zgłoś uwagi</a>
		</footer>
	</body>

</html>

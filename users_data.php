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
				include 'db_utils.php';
				enableSession();
				
				$login="";
				$name="";
				$pwd="";
				$age="";
				$disabled = '';		
				$_SESSION["toEdit"] = false;
				setcookie('error', false,time() + 60*60*24*3);
				if (isset($_SESSION["log"]))
					if ($_SESSION["log"] == TRUE) {
						$_SESSION["toEdit"] = true;
						$db = new DB();
						$stmt = $db->getUser($_SESSION["loggedUser"]);
						$stmt->execute([$_SESSION["loggedUser"]]);
						while ($row = $stmt->fetch())
						{
							$login=$row['login'];
							$name=$row['name'];
							$pwd=$row['password'];
							$age=$row['age'];	
						}
						$disabled = 'disabled';		
					}
				
				$form = <<<HTML
				<form action="#" method="post">
					<p><label>Imię<br>
								<input type="text" id="name" name="name" value="$name" placeholder="Imię"/>
						</label></p>

					<p><label>login<br>
								<input type="text" id="login" name="login" value="$login" $disabled placeholder="Login"/>
						</label></p>
					<p><label>hasło<br>
							<input type="password" id="password" name="password" value="$pwd" placeholder="Hasło"/>
					</label></p>
					<p><label>wiek<br>
							<input type="text" id="age" name="age" value="$age"  placeholder="Wiek"/>
					</label></p>

					<p><input type="submit" value="Wyślij!">						
					</p>
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
				
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$db = new DB();
					$res = true;
					if ($_SESSION["toEdit"] == true) {
						$res = $db->updateUser($_SESSION["loggedUser"], $_POST["name"], $_POST["password"], $_POST["age"]);
						$_SESSION["toEdit"] = false;
					} else
						$res = $db->addUser($_POST["login"], $_POST["name"], $_POST["password"], $_POST["age"]);
 
					if (! $res)
						echo $dbSaveFail;
					else echo $dbSaveSuccess;
					setcookie('error', false,time() + 60*60*24*3);
				} else {
					setcookie('error', false,time() + 60*60*24*3);	
					echo $form;
				}

				
			?>
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



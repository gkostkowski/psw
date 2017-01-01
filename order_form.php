<!DOCTYPE html>
<html>
    <head>
		<title>Formularz zamówienia</title>
		<meta name="decription	" content="formularz do wypożyczania samochodów">
		<meta name="keywords" content="wypożyczalnia, samochód, podróz, wakacje">
    <link rel = "stylesheet" type = "text/css" href = "css/common_style.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/style.css" />
    </head>
	<style>
		body > section > 	.order_form {
	background:green !important; 
	padding:20px !important; 
	box-shadow:2px 2px gray !important;
	box-radius:5px !important;
}
	</style>
    <body>
        <header>
				 <img src = "img/header_logo.png" alt = "Renting Cars logo" />
				 <h1 >Wypożyczalnia Renting Cars</h1>
				 <h2 >Zaufaj profesjonalistom i podążaj do celu samochodem na miarę Twoich oczekiwań!</h2>
		     </header>

        <section id="1"><h3>Składanie zamówienia na samochód</h3>
            
            <div class="order_form">
			<?php
				 $telephone = $_POST["phone"];
				 if (!preg_match("/^\(\+[0-9]{2}\) [0-9]{3} [0-9]{3} [0-9]{3}$/", 
					$_POST["phone"]))
				 {
					print( "<p class = 'error'>Nieprawidłowy numer telefonu!</p>
					   <p>Poprawny numer musi być w formacie  
					   (+48) 999 999 999</p><p>Kliknij przycisk powrót, wprowadź prawidłową wartość i prześlij formularz ponownie</p>
					   </body></html>" );
					die(); 
				 }
				 else 
				 {
					$_POST["phone"]=preg_replace("/[0-9]{3} [0-9]{3}$/", "-***-***",$_POST["phone"]);
				 }
			?>
			<p style="font-style:italic;">Witaj <b><?php print( $_POST["first_name"] ." ". $_POST["last_name"] ); ?></b>. Twoje zamówienie zostało złożone. Dziękujemy za wybór naszych usług. 
         </p><p style="color:blue;"><?php 
			if (strcmp($_POST["lucky_month"], $_POST["month"]) == 0)
				print($_POST["first_name"].", urodziłeś się w miesiącu ".$_POST["month"].", dlatego z tej okazji mamy dla Ciebie 
				wyjątkową ofertę, która została wysłana na Twój adres mailowy: ".$_POST["email"]);
		 ?> 
		</p>
		 <p>Nasz konsultant wkrótce skontaktuje się z Tobą, dlatego upewnij się, że numer telefonu: 
		 <?php print( $_POST["phone"] ); ?>, który podałeś jest poprawny.</p><br>
		  <?php 
			$phone_prefx = array(48 => array("Polska", 12), 49 =>array("Niemcy", 18), 47 => array("Norwegia", 22), 1 => array("Kanada", 53));
			foreach ($phone_prefx as $nbr => $val)
				if (substr($_POST["phone"], 2, strlen($_POST["phone"])) == $nbr) {
					$hours = (string) $val[1]." godzin";
					print("Twoj numer telefonu jest zarejestrowany w kraju: ". $val[0].". Szacowany czas oczekiwania na
					połączenie z konsultantem to ".$hours);
				}
		  ?>
			</div>
        </section>
		
        <section id="2"> <h3>Więcej informacji</h3>
            <p>Masz pyatnia? Nie jesteś pewny którą ofertę wybrać lub chciałbyś dostosować ofertę do swoich potrzeb? <br>
            Napisz do Nas! Nasz konsultant skontaktuje się z Państwem w ciągu 24 godzin.</p>
            <form  class = "static_position" action="mailto:consultant@rentingcars.com">
                <input type="submit" value="Kontakt z konsultantem">
            </form>
        </section>
		<aside>
			<h4><em>Przydatne linki</em></h4>
			<h5><em>Zanim zarezerwujesz samochód:</em></h5>
			<nav>
				Zapoznaj się z naszym <a href="regulamin.html"> regulaminem</a>
				<a href="faq.html"> FAQ</a>
				<a href="forum.html"> Forum</a>
			</nav>
		</aside>
		<footer>
		<br>&copy; Renting Cars  2016<br>
		Wszelkie prawa do znaków handlowych zastrzeżone. <br>
		<a href="mailto:consultant@rentingcars.com">Kontakt</a>
			 |  <a href="index.php">Strona główna</a> |
			 <a href="mailto:admin@rentcar.com.html">Zgłoś uwagi</a>
		</footer>
    </body>

</html>

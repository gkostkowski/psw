<!DOCTYPE html>
<html>
    <head>
		<title>Formularz zamówienia</title>
		<meta name="decription	" content="formularz do wypożyczania samochodów">
		<meta name="keywords" content="wypożyczalnia, samochód, podróz, wakacje">
    <link rel = "stylesheet" type = "text/css" href = "css/common_style.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/style.css" />
    </head>
    <body>
        <header>
				 <img src = "img/header_logo.png" alt = "Renting Cars logo" />
				 <h1 >Wypożyczalnia Renting Cars</h1>
				 <h2 >Zaufaj profesjonalistom i podążaj do celu samochodem na miarę Twoich oczekiwań!</h2>
		     </header>

        <section id="1"><h3>Składanie zamówienia na samochód</h3>
            
            <div style="background:white;">
			<?php
				 if (!preg_match("/^\(\+[0-9]{2}\) [0-9]{3} [0-9]{3} [0-9]{3}$/", 
					$_POST["phone"]))
				 {
					print( "<p class = 'error'>Nieprawidłowy numer telefonu!</p>
					   <p>Poprawny numer musi być w formacie  
					   (+48) 999 999 999</p><p>Kliknij przycisk powrót, wprowadź prawidłową wartość i prześlij formularz ponownie</p>
					   </body></html>" );
					die(); 
				 }
			?>
			<p>Witaj <?php print( $_POST["first_name"] . $_POST["last_name"] ); ?>. Twoje zamówienie zostało złożone. Dziękujemy za wybór naszych usług. 
         <?php print( $_POST["first_name"] ); ?>, urodziłeś się w miesiącu 
		 <?php print( $_POST["month"] ); ?>, dlatego z tej okazji mamy dla Ciebie wyjątkową ofertę, która została wysłana na Twój adres mailowy: <?php print( $_POST["email"] ); ?></p>
		 <p>Nasz konsultant wkrótce skontaktuje się z Tobą, dlatego upewnij się, że numer telefonu: <?php print( $_POST["phone"] ); ?>, który podałeś jest poprawny.</p>
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
			 |  <a href="index.html">Strona główna</a> |
			 <a href="mailto:admin@rentcar.com.html">Zgłoś uwagi</a>
		</footer>
    </body>

</html>

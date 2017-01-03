<?php
	class DB {
		public $user = 'admin';
		public $dbname = 'psw';
		public $host = '127.0.0.1';
		public $pass = 'haslo';
		public $charset = 'utf8';
		public $dsn = "mysql:host=127.0.0.1;dbname=psw;charset=utf8";
		public static $pdo  = NULL;
		
		function __construct() {
			if (self::$pdo == NULL)	
			try {
				self::$pdo  = new PDO($this->dsn, $this->user, $this->pass);
				self::$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			} catch (PDOException $e) {
				echo 'Connection failed: ' . $e->getMessage();
			}
		}
		
		function getPDO() {
			return self::$pdo;
		}

		function getUsers():PDOStatement {
			return self::$pdo->query('SELECT id, login, password, name, age FROM users');
		}
		function getUser($u):PDOStatement {
			$stmt = self::$pdo->prepare('SELECT id, login, password, name, age FROM users where login = ?');
			//return $stmt->execute([$u]); 
			return $stmt;
		}
		
		function addUser($login, $name, $password,  $age) {
			if (isValid($login, $name, $password, $age)) {
				try {
					self::$pdo->prepare('INSERT INTO users(login, password, name, age) VALUES(?, ?, ?, ?)')->execute([$login, $password, $name, $age]);
				} catch (PDOException $e) {
					echo 'Użytkownik nie został dodany: ' . $e->getMessage();
					return false;
				}
			} else return false;	
			return true;
		}

		function updateUser($login, $name, $password,  $age) {
			if (isValid($login, $password, $name, $age)) {
				self::$pdo->prepare('UPDATE users SET password = ?,  name = ?,  age = ? where login = ?')->execute([$password, $name, $age, $login]);
				return true;
			} else return false;	
			
		}

	}
	
	function enableSession() {
		if (session_status() == PHP_SESSION_NONE) 
			session_start();
	}
	
	function enableUsersSummary() {
		enableSession();
		if (isset($_SESSION["log"]))
			if ($_SESSION["log"] == TRUE && $_SESSION["loggedUser"]=="admin")
			echo "<a href='show_users.php'>| Wyświetl użytkowników</a>";
	}
	function enableEditUserData() {
		enableSession();
		if (isset($_SESSION["log"]))
			if ($_SESSION["log"] == TRUE)
				echo "<a href='users_data.php'> | Edytuj swoje dane</a>";
	}
	function enableRegisterNewUser() {
		enableSession();
		if (isset($_SESSION["log"]))
			if ($_SESSION["log"] == FALSE)
				echo "<a href='users_data.php'> | Zarejestruj się</a>";
	}
		function enableLogIn() {
		enableSession();
		if (isset($_SESSION["log"]))
			if ($_SESSION["log"] == FALSE)
				echo "<a href='logon.php'> | Zaloguj się</a>";
	}
	
	function enableLogOut() {
		enableSession();
		if (isset($_SESSION["log"]))
			if ($_SESSION["log"] == TRUE)
				echo "<a href='logout.php'> | Wyloguj się</a>";
	}
	
	function showUser() {
		enableSession();
		if (isset($_SESSION["log"]))
			if ($_SESSION["log"] == TRUE)
				echo "<div style='text-align:right; color:blue;'>Zalogowany jako <b>". $_SESSION["loggedUser"]."</b></div>";
	}

	function isValid($login, $password, $name, $age) {
		/*if (! preg_match("/[A-z].+/", $login))
			return false;*/
		if (! preg_match("/.{6,32}/", $password))
			return false;
		if (! preg_match("/[A-z]{2,40}/", $name))
			return false;
		return (intval($age) >=18 && intval($age)<=99);

	}
	

	
	
?>



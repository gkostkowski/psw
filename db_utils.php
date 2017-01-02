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
		function addUser($login, $password, $name, $age) {
			$stmt = self::$pdo->prepare('INSERT INTO users(login, password, name, age) VALUES(?, ?, ?, ?)');
			if (isValid($login, $password, $name, $age))
				$stmt->execute([$login, $password, $name, $age]);
		}
		

		
		function EditUser() {
		
		}

		function saveUserData() {
		
		}
	}
	
	function enableUsersSummary() {
				echo "<a href='show_users.php'>| Wyświetl użytkowników</a>";
	}
	function enableEditUserData() {
		echo "<a href='users_data.php'> | Edytuj swoje dane</a>";
	}
	function enableRegisterNewUser() {
		echo "<a href='users_data.php'> | Zarejestruj się</a>";
	}

	function isValid($login, $password, $name, $age) {
		
	}
	
	
?>

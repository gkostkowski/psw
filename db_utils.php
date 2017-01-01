<?php
	class DB {
		public $user = 'admin';
		public $dbname = 'psw';
		public $host = '127.0.0.1';
		public $pass = 'haslo';
		public $charset = 'utf8';
		public $dsn = "mysql:host=127.0.0.1;dbname=psw;charset=utf8";
		public $pdo  = NULL;
		
		function __construct() {
			try {
				$this->pdo  = new PDO($this->dsn, $this->user, $this->pass);
				$this->pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			} catch (PDOException $e) {
				echo 'Connection failed: ' . $e->getMessage();
			}
		}
		
		function getPDO() {
			return $this->pdo;
		}

		function getUsers():PDOStatement {
			return $this->pdo->query('SELECT id, login, password, name, age FROM users');
		}
	}
	
	function enableUsersSummary() {

				echo "<a href='show_users.php'>| Wyświetl użytkowników</a>";
	}
	

?>

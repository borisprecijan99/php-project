<?php
	require_once("game.php");

    class Database {
	    private $conn;

	    public function __construct($configFile = "config.ini") {
		    if ($config = parse_ini_file($configFile)) {
			    $host = $config["host"];
			    $database = $config["database"];
			    $username = $config["username"];
			    $password = $config["password"];
			    $this->conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
		    } else {
			    exit("Missing configuration file.");
			    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        }
        }
    
	    public function __destruct() {
	        $this->conn = null;
	    }

        public function getAllGames($queryString) {
            $result = array();
			$query = "SELECT * FROM Game WHERE title LIKE \"%$queryString%\"";
			try {
				$queryResult = $this->conn->query($query);
				foreach ($queryResult as $q) {
					$id = $q["id"];
					$title = $q["title"];
					$releaseDate = $q["releaseDate"];
					$developer = $q["developer"];
					$publisher = $q["publisher"];
					$genres = $q["genres"];
					$price = $q["price"];
					$imageUrl = $q["imageUrl"];
					$description = $q["description"];
					$game = new Game($id, $title, $releaseDate, $developer, $publisher, $genres, $price, $imageUrl, $description);
					$result[] = $game;
				}
	    	} catch (PDOException $e) {
				echo $e->getMessage();
			}
            return $result;
        }

		public function getGameById($id) {
			$game = null;
			$query = "SELECT * FROM Game WHERE id=$id";
			try {
				$queryResult = $this->conn->query($query)->fetch();
				$id = $queryResult["id"];
				$title = $queryResult["title"];
				$releaseDate = $queryResult["releaseDate"];
				$developer = $queryResult["developer"];
				$publisher = $queryResult["publisher"];
				$genres = $queryResult["genres"];
				$price = $queryResult["price"];
				$imageUrl = $queryResult["imageUrl"];
				$description = $queryResult["description"];
				$game = new Game($id, $title, $releaseDate, $developer, $publisher, $genres, $price, $imageUrl, $description);
	    	} catch (PDOException $e) {
				echo $e->getMessage();
			}
            return $game;
		}

		public function getGamesByUsername() {
			$result = array();
			$query = "";
			try {
				$queryResult = $this->conn->query($query);
				foreach ($queryResult as $q) {
					$id = $q["id"];
					$title = $q["title"];
					$releaseDate = $q["releaseDate"];
					$developer = $q["developer"];
					$publisher = $q["publisher"];
					$genres = $q["genres"];
					$price = $q["price"];
					$imageUrl = $q["imageUrl"];
					$description = $q["description"];
					$game = new Game($id, $title, $releaseDate, $developer, $publisher, $genres, $price, $imageUrl, $description);
					$result[] = $game;
				}
	    	} catch (PDOException $e) {
				echo $e->getMessage();
			}
            return $result;
		}

		public function login($username, $password) {
			$result = null;
			$query = "SELECT * FROM User WHERE username=\"$username\" AND password=\"$password\"";
			try {
				$queryResult = $this->conn->query($query)->fetch();
				$result = $queryResult["username"];
	    	} catch (PDOException $e) {
				echo $e->getMessage();
			}
            return $result;
		}

		public function register($firstName, $lastName, $username, $password, $imagePath) {
			$query = "INSERT INTO User (firstName, lastName, username, password, imagePath) VALUES (\"$firstName\", \"$lastName\", \"$username\", \"$password\", \"$imagePath\")";
			try {
				$this->conn->query($query);
				return true;
	    	} catch (PDOException $e) {
				echo $e->getMessage();
			}
            return false;
		}
    }
?>
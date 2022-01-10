<?php
	require_once("classes/game.php");

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

		public function getAllGamesUserNotLoggedIn($queryString) {
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

		public function getAllGamesUserLoggedIn($queryString, $id) {
			$gamesInLibrary = $this->getAllGamesInLibrary($queryString, $id);
			foreach ($gamesInLibrary as $game) {
				$game->setStatus("IN LIBRARY");
			}
			$gamesNotInLibrary = $this->getAllGamesNotInLibrary($queryString, $id);
			$result = array_merge($gamesInLibrary, $gamesNotInLibrary);
			sort($result);
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

		public function getAllGamesInLibraryByUserId($id) {
			$result = array();
			$query = "SELECT * FROM Game, Library WHERE userId=$id AND id=gameId";
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

		private function getAllGamesInLibrary($queryString, $id) {
			$result = array();
			$query = "SELECT * FROM Game, Library WHERE userId=$id AND id=gameId AND title LIKE \"%$queryString%\"";
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

		private function getAllGamesNotInLibrary($queryString, $id) {
			$result = array();
			$query = "SELECT * FROM Game WHERE NOT EXISTS (SELECT * FROM Library WHERE userId=$id AND id=gameId) AND title LIKE \"%$queryString%\"";
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

		public function addAllGamesToLibrary($gameIds, $id) {
			$query = "INSERT INTO Library (userId, gameId) VALUES (:userId, :gameId)";
			try {
				$st = $this->conn->prepare($query);
				$st->bindValue("userId", $id, PDO::PARAM_INT);
				foreach ($gameIds as $gameId) {
					$st->bindValue("gameId", $gameId, PDO::PARAM_INT);
					$st->execute();
				}
				return true;
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
			return false;
		}

		public function login($username, $password) {
			$result = 0;
			$query = "SELECT * FROM User WHERE username=\"$username\" AND password=\"$password\"";
			try {
				$queryResult = $this->conn->query($query)->fetch();
				if ($queryResult != null) {
					$result = $queryResult["id"];
				}
			} catch (PDOException $e) {
				//echo $e->getMessage();
			}
			return $result;
		}

		public function register($firstName, $lastName, $username, $password, $imagePath) {
			$query = "INSERT INTO User (firstName, lastName, username, password, imagePath) VALUES (\"$firstName\", \"$lastName\", \"$username\", \"$password\", \"$imagePath\")";
			try {
				$this->conn->query($query);
				return true;
			} catch (PDOException $e) {
				//echo $e->getMessage();
			}
			return false;
		}
	}
?>
<?php
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
    }
?>
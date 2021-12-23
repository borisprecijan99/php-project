<?php
    class User {
        private $id;
        private $firstName;
        private $lastName;
        private $username;
        private $password;
        private $imagePath;
        private $gameLibrary;

        public function __construct($id, $firstName, $lastName, $username, $password, $imagePath, $gameLibrary) {
            $this->id = $id;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->username = $username;
            $this->password = $password;
            $this->imagePath = $imagePath;
            $this->gameLibrary = $gameLibrary;
        }
    }
?>
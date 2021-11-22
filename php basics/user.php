<?php
    class User {
        private $username;
        private $password;
        private $email;

        public function __construct($username, $password, $email) {
            $this->username = $username;
            $this->password = $password;
            $this->email = $email;
        }

        public function setUsername($username) {
            $this->username = $username;
        }

        public function getUsername() {
            return $this->username;
        }
    }

    $user = new User("ivgerves", "pass", "ivgerves@gmail.com");
    echo $user->getUsername();
?>
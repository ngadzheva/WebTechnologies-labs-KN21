<?php
    // include "user.php";
    // require "user.php";
    require_once "user.php";

    class Student extends User {
        private $firstName;
        private $lastName;
        private $fn;

        public function __construct($username, $password, $email, $firstName, $lastName, $fn) {
            parent::__construct($username, $password, $email);

            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->fn = $fn;
        }

        public function getStudentInfo() {
            return parent::getUsername() . ": " . $this->firstName . " " . $this->lastName;
        }
    }

    $student = new Student("ivgerves", "pass", "ivgerves@gmail.com", "Ivan", "Ivanov", 88888);
    echo $student->getUsername();
    echo "<br/>";
    echo $student->getStudentInfo();
?>
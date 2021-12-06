<?php
    $dbtype = 'mysql';
    $host = 'localhost';
    $dbname = 'webtech';
    $user = 'root';
    $password = '';

    try {
        $connection = new PDO("$dbtype:host=$host;dbname=$dbname", $user, $password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

        // $sql = "CREATE TABLE students(
        //     fn INT(6) UNSIGNED NOT NULL,
        //     userID INT NOT NULL,
        //     firstName VARCHAR(30) NOT NULL,
        //     lastName VARCHAR(30) NOT NULL,
        //     PRIMARY KEY (fn),
        //     FOREIGN KEY (userID) REFERENCES users(id)
        // )";

        // $connection->exec($sql);

        // $sql = "INSERT INTO students(fn, userID, firstName, lastName) VALUES (888888, 1, 'Ivan', 'Ivanov')";
        // $connection->exec($sql);

        $sql = "SELECT * FROM students";
        $result = $connection->query($sql);

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo $row['fn'] . ': ' . $row['firstName'] . ' ' . $row['lastName'];
            echo '<br/>'; 
        }

        $students = $result->fetchAll(PDO::FETCH_ASSOC);

        $sql = "INSERT INTO users(username, password) VALUES(?, ?)";
        $insertUserStatement = $connection->prepare($sql);
        // $insertUserStatement->execute(['user1', 'fhjgfhkdgdhs787r3jfkdf?dslkfl']);

        $sql = "INSERT INTO students(fn, userID, firstName, lastName) VALUES(?, ?, ?, ?)";
        $insertStudentStatement = $connection->prepare($sql);
        // $insertStudentStatement->execute([888889, 2, 'Georgy', 'Georgiev']);

        $sql = "UPDATE students SET firstName = :firstName WHERE fn = :fn";
        $updateStudentStatement = $connection->prepare($sql);
        $updateStudentStatement->execute(['firstName' => 'Petar', 'fn' => 888889]);

        $users = [
            ['user2', 'djdkjfdsjfdslkfsdlf'],
            ['user3', 'dfjdjfdkjdlsfdsjf'],
            ['user4', ';wfkdskjfksdfss;f']
        ];

        $students = [
            [888890, 1, 'fdsfkd', 'djfdkjfds'],
            [888891, 2, 'fksdds', 'lkdsfklds'],
            [888892, 1, 'ldfklsf', 'jdsfkflj']
        ];

        $connection->beginTransaction();

        foreach($users as $user) {
            $insertUserStatement->execute($user);
        }

        foreach($students as $student) {
            $insertStudentStatement->execute($student);
        }

        $connection->commit();
    } catch (PDOException $exception) {
        $connection->rollback();
        echo $exception->getMessage();
    }
?>
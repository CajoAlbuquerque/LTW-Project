<?php
    include_once('../database/connection.php');

    function checkPassword($username, $password) {
        global $db;

        $stmt = $db->prepare('SELECT password FROM User WHERE username = ?');
        $stmt->execute(array($username));
        $hash = $stmt->fetch();

        return $hash !== false && password_verify($password, $hash);
    }

    function getEmail($email) {
        global $db;

        $stmt = $db->prepare('SELECT username FROM User WHERE email = ?');
        $stmt->execute(array($email));

        return $stmt->fetch();
    }

    function insertUser($username, $email, $pass, $name) {
        global $db;

        $options = ['cost' => 12];
        $hash = password_hash($pass, PASSWORD_DEFAULT, $options);

        $stmt = $db->prepare('INSERT INTO User(username, email, password, name) VALUES (?, ?, ?, ?)');
        $stmt->execute(array($username, $email, $hash, $name));
    }

?>
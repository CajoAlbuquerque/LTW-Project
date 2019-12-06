<?php
    include_once('../database/connection.php');

    function getAllHouses() {
        global $db;

        $stmt = $db->prepare('SELECT * FROM House');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getHouse($id) {
        global $db;

        $stmt = $db->prepare('SELECT * FROM House WHERE houseID = ?');
        $stmt->execute(array($id));
        return $stmt->fetch();
    }

    function insertHouse($username, $title, $price, $location, $description) {
        global $db;

        $stmt = $db->prepare('SELECT userID FROM User WHERE username = ?');
        $stmt->execute(array($username));
        $userID = $stmt->fetch();

        $stmt = $db->prepare('INSERT INTO House(title, priceDay, location, description, owner) VALUES (?,?,?,?,?)');
        $stmt->execute(array($title, $price, $location, $description, $userID));
    }
?>
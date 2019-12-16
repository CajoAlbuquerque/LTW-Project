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

    function insertHouse($userID, $title, $price, $location, $description) {
        global $db;

        $stmt = $db->prepare('INSERT INTO House(title, priceDay, location, description, owner) VALUES (?,?,?,?,?)');
        $stmt->execute(array($title, $price, $location, $description, $userID));
    }

    function filterHouse($location) {
        global $db;

        $stmt = $db->prepare("SELECT * FROM House WHERE location LIKE ?");
        $stmt->execute(array('%' . $location . '%'));

        return $stmt->fetchAll();
    }

    function updateHouse($houseID, $title, $price, $location, $description) {
        global $db;

        $stmt = $db->prepare('UPDATE House SET title = ?, priceDay = ?, location =  ?, description = ? WHERE houseID = ? ');
        $stmt->execute(array($title, $price, $location, $description, $houseID));
    }
?>
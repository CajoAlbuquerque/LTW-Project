<?php
    include_once('../database/connection.php');

    function getReservationsOfHouse($house) {
        global $db;

        $stmt = $db->prepare('SELECT * FROM Reservation  WHERE house = ?');
        $stmt->execute(array($house));
        return $stmt->fetchAll();
    }

    function getReservationsOfUser($user) {
        global $db;

        $stmt = $db->prepare('SELECT * FROM Reservation  WHERE user = ?');
        $stmt->execute(array($user));
        return $stmt->fetchAll();
    }

    function insertReservation($user, $house, $startDate, $endDate, $totalPrice) {
        global $db;

        $stmt = $db->prepare('INSERT INTO Reservation(user, house, startDate, endDate, totalPrice) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute(array($user, $house, $startDate, $endDate, $totalPrice));
    }

    function checkValidDate($house, $startDate, $endDate) {
        
        if($endDate < $startDate){
            return false;
        }
        
        global $db;

        $stmt = $db->prepare('SELECT * FROM Reservation WHERE house = ?');
        $stmt->execute(array($house));
        $reservations = $stmt->fetchAll();
        foreach($reservations as $reservation) {
            $resStart = $reservation['startDate'];
            $resEnd = $reservation['endDate'];
            if(!($resStart > $endDate || $resEnd < $startDate)){
                return false;
            }
        }

        return true;
    }

?>
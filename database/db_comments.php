<?php
include_once('database/connection.php');

function getAllCommentsOfHouse($id) {
    global $dbh;

    $stmt = $dbh->prepare('SELECT * FROM Comment WHERE house = ?');
    $stmt->execute(array($id));
    return $stmt->fetchAll();
}

?>
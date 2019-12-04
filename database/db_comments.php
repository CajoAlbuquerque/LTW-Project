<?php
include_once('database/connection.php');

function getAllCommentsOfHouse($id) {
    global $dbh;

    $stmt = $dbh->prepare('SELECT * FROM Comment JOIN User ON user = userID  WHERE house = ?');
    $stmt->execute(array($id));
    return $stmt->fetchAll();
}

?>
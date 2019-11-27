<?php
include_once('database/connection.php');

function getAllHouses() {
    global $dbh;

    $stmt = $dbh->prepare('SELECT * FROM House');
    $stmt->execute();
    return $stmt->fetchAll();
}

function getHouse($id) {
    global $dbh;

  $stmt = $dbh->prepare('SELECT * FROM House WHERE houseID = ?');
  $stmt->execute(array($id));
  return $stmt->fetch();
}

?>
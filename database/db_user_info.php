<?php
include_once('database/connection.php');

function getUser($id) {
    global $dbh;

  $stmt = $dbh->prepare('SELECT * FROM User WHERE userID = ?');
  $stmt->execute(array($id));
  return $stmt->fetch();
}

?>
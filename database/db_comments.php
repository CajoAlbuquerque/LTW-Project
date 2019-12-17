<?php
include_once('../database/connection.php');

function getAllCommentsOfHouse($id) {
    global $db;

    $stmt = $db->prepare('SELECT * FROM Comment JOIN User ON user = userID  WHERE house = ?');
    $stmt->execute(array($id));
    return $stmt->fetchAll();
}

function insertComment($userID, $houseID, $stars, $comment) {
    global $db;

    $stmt = $db->prepare('INSERT INTO Comment(user, house, comment, stars) VALUES (?,?,?,?)');
    $stmt->execute(array($userID, $houseID, $comment, $stars));
}

function getRatingOfHouse($id) {
    $comments = getAllCommentsOfHouse($id);

    $count = 0;
    $sum = 0;
    foreach($comments as $comment){
        $count++;
        $sum += $comment['stars'];
    }

    //error_log("count: $count and sum: $sum", 0);

    if($count == 0){
        return(array('count' => 0, 'rating' => 0));
    }
    else {
        $rating = $sum/$count;
        return(array('count' => $count, 'rating' => $rating));
    }
}

?>
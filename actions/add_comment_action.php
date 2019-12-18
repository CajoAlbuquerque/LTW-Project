<?php
    include_once('../templates/temp_message.php');
    include_once('../database/db_comments.php');

    $userID = $_POST['userID'];
    $houseID = $_POST['houseID'];
    $stars = $_POST['stars'];
    $comment = $_POST['comment'];

    //comment validation
    if( !preg_match('/^[a-zA-Z0-9 ,.!?()]+$/', $comment) ){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Comment can only contain letters, numbers and spaces.');
        die(header("Location: ../pages/house.php?houseID=$houseID&commenting=yes"));
    }

    try {
        insertComment($userID, $houseID, $stars, $comment);
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Commented house successfully.');
        header("Location: ../pages/house.php?houseID=$houseID");
    }
    catch(PDOException $excpt) {
        die($excpt->getMessage());
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to comment house.');
        header("Location: ../pages/house.php?houseID=$houseID&commenting=yes");
    }

?>
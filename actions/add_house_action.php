<?php
    include_once('../session.php');
    include_once('../database/db_house.php');
    include_once('../database/db_user.php');
    include_once('../templates/temp_message.php');

    $username = $_POST['username'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $location = $_POST['location'];
    $description = $_POST['description'];

    //Data validation
    //title validation
    if( !preg_match('/^[a-zA-Z0-9 ]+$/', $title) ){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Title can only contain letters, numbers and spaces.');
        die(header('Location: ../pages/add_house.php'));
    }
    //location validation
    if( !preg_match('/^[a-zA-Z0-9 ,.]+$/', $location) ){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Location can only contain letters, numbers and spaces.');
        die(header('Location: ../pages/add_house.php'));
    }
    //description validation
    if( !preg_match('/^[a-zA-Z0-9 ,.!]+$/', $description) ){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Description can only contain letters, numbers and spaces.');
        die(header('Location: ../pages/add_house.php'));
    }

    try {
        $user = getUserByName($username);
        insertHouse($user['userID'], $title, $price, $location, $description);
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Registered house successfully.');
        header('Location: ../pages/homepage.php');
    }
    catch(PDOException $excpt) {
        die($excpt->getMessage());
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to register house.');
        header('Location: ../pages/add_house.php');
    }

?>
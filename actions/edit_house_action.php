<?php
    include_once('../database/db_house.php');

    $houseID = $_GET['houseID'];
    $title = $_GET['title'];
    $price = $_GET['price'];
    $location = $_GET['location'];
    $description = $_GET['description'];

    // Checking for invalid null values
    if($title === '' || $location === '' || $description === ''){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Null values inserted.');
        die(header("Location: ../pages/house.php?houseID=$houseID"));
    }

    // Validating title
    if( !preg_match('/^[a-zA-Z0-9 ]+$/', $title) ){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Invalid title.');
        die(header("Location: ../pages/house.php?houseID=$houseID"));
    }

    // Validating location
    if( !preg_match('/^[a-zA-Z0-9 ,.]+$/', $location) ){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Invalid location.');
        die(header("Location: ../pages/house.php?houseID=$houseID"));
    }

    // Validating description
    if( !preg_match('/^[a-zA-Z0-9 ,.!]+$/', $description) ){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Invalid description.');
        die(header("Location: ../pages/house.php?houseID=$houseID"));
    }

    // Validating price
    if( $price <= 0 ){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Invalid price.');
        die(header("Location: ../pages/house.php?houseID=$houseID"));    
    }

    try {
        updateHouse($houseID, $title, $price, $location, $description);
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Updated house succesfully!');
    }
    catch(PDOException $excpt) {
        die($excpt->getMessage());
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to update house!');
    }

    header("Location: ../pages/house.php?houseID=$houseID");

?>
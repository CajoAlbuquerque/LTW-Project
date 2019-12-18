<?php

include_once('../templates/temp_message.php');
include_once('../database/db_reservation.php');

$userID = $_POST['userID'];
$houseID = $_POST['houseID'];
$priceDay = $_POST['priceDay'];
$startDate = $_POST['check_in'];
$endDate = $_POST['check_out'];

if( !preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $startDate) || !preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $endDate) ){
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Invalid dates were inserted.');
    die(header("Location: ../pages/house.php?houseID=$houseID"));
}

if(!(is_numeric($userID) || is_numeric($houseID) || is_numeric($priceDay))) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Invalid values were found.');
    die(header("Location: ../pages/homepage.php"));
}

try {
    insertReservation($userID, $houseID, $startDate, $endDate, $priceDay);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Reserved house successfully.');
    header("Location: ../pages/house.php?houseID=$houseID");
}
catch(PDOException $excpt) {
    die($excpt->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to reserve house.');
    header("Location: ../pages/house.php?houseID=$houseID");
}



?>
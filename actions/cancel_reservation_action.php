<?php
include_once('../templates/temp_message.php');
include_once('../database/db_reservation.php');

$reservationID = $_GET['reservationID'];

try {
    removeReservation($reservationID);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Reservation cancelled successfully.');
    header('Location: ../pages/profile.php');
}
catch(PDOException $excpt) {
    die($excpt->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to cancel reservation.');
    header('Location: ../pages/profile.php');
}


?>
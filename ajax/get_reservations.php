<?php 
    include_once('../database/db_reservation.php');
    include_once('../database/db_images.php');
    include_once('../database/db_user.php');
    include_once('../session.php');
    include('../templates/temp_reservation.php');
    

    $username = $_GET['username'];

    $editable = $username == $_SESSION['username'];

    $user = getUserByName($username);
    $reservations = getReservationsOfUser($user['userID']);
    
    foreach($reservations as $reservation){
        $photo = getHouseThumbnail($reservation['house']);
        draw_reservation_card($reservation, $photo, $editable);
    }
?>
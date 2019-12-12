<?php 
    include_once('../database/db_reservation.php');
    include_once('../database/db_user.php');
    include('../templates/temp_common.php');

    $username = $_GET['username'];

    $user = getUserByName($username);
    $reservations = getReservationsOfUser($user['userID']);

    draw_black_header();
    
    foreach($reservations as $reservation){
        draw_reservation_card($reservation);
    }

    draw_footer();
?>
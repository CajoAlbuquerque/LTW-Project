<?php 
    include_once('../database/db_reservation.php');
    include_once('../database/db_user.php');
    include_once('../session.php');
    include('../templates/temp_common.php');
    include('../templates/temp_reservation.php');
    

    $username = $_GET['username'];

    $editable = $username == $_SESSION['username'];

    $user = getUserByName($username);
    $reservations = getReservationsOfUser($user['userID']);

    //draw_black_header();
    
    foreach($reservations as $reservation){
        draw_reservation_card($reservation, $editable);
    }

    //draw_footer();
?>
<?php 
    include_once('../database/db_house.php');
    include_once('../database/db_user.php');
    include_once('../database/db_comments.php');
    include('../templates/temp_common.php');
    include('../templates/temp_houses.php');

    $houseID = $_GET['houseID'];

    $house = getHouse($houseID);
    $owner = getUser($house['owner']);
    $comments = getAllCommentsOfHouse($houseID);

    draw_black_header();
    draw_house($house, $owner, $comments);
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $user = getUserByName($username);
        draw_reservation_form($house, $user);
    }
    draw_footer();
?>
<?php 
    include_once('../database/db_house.php');
    include_once('../database/db_user.php');
    include_once('../database/db_comments.php');
    include('../templates/temp_common.php');
    include('../templates/temp_house.php');

    $houseID = $_GET['houseID'];

    $house = getHouse($houseID);
    $owner = getUser($house['owner']);
    $comments = getAllCommentsOfHouse($houseID);

    draw_black_header();
    draw_house($house, $owner, $comments);
    draw_footer();
?>
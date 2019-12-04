<?php 
    include_once('../database/db_house.php');
    include_once('../database/db_user_info.php');
    include_once('../database/db_comments.php');
    include('../templates/temp_common.php');

    $houseID = $_GET['houseID'];

    $house = getHouse($houseID);
    $owner = getUser($house['owner']);
    $comments = getAllCommentsOfHouse($houseID);

    draw_header();
    draw_house($house, $owner, $comments);
    draw_footer();
?>
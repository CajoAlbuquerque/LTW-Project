<?php
    include_once('../templates/temp_common.php');
    include_once('../templates/temp_houses.php');
    include_once('../database/db_house.php');

    $location = $_POST['location'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];

    $houses = filterHouse($location);

    draw_black_header();
    foreach($houses as $house) {
        draw_house_card($house);
    }
    draw_footer();
?>
<?php
    include_once('../database/db_house.php');
    include_once('../templates/temp_common.php');
    include_once('../templates/temp_houses.php');

    $houses = getAllHouses();

    draw_boilerplate('dark');
    draw_header();

    foreach($houses as $house) {
        draw_house_card($house);
    }
    draw_footer();
?>
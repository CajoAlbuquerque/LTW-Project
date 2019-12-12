<?php
    include_once('../database/db_house.php');
    include_once('../templates/temp_common.php');
    include_once('../templates/temp_house.php');

    draw_white_header();

    $houses = getAllHouses();
    
   

    foreach($houses as $house) {
        draw_house_card($house);
    }

    draw_footer();
?>
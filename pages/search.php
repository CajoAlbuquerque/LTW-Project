<?php
    include_once('../templates/temp_common.php');
    include_once('../templates/temp_houses.php');
    include_once('../database/db_house.php');
    include_once('../database/db_reservation.php');

    $location = $_POST['location'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];

    if($location === ''){
        $houses = getAllHouses();
    } else {
        $houses = filterHouse($location);
    }

    draw_black_header();
    foreach($houses as $house) {
        if($check_in === '' || $check_out ==='' || checkValidDate($house['houseID'], $check_in, $check_out)){
            error_log('HERE: valid date');
            draw_house_card($house);
        }
    }
    draw_footer();
?>
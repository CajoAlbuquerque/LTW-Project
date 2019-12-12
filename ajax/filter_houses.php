<?php
    include_once('../database/db_house.php');
    include_once('../database/db_reservation.php');

    function checkDates($house, $check_in, $check_out) {
        return $check_in === '' || $check_out === '' || checkValidDate($house, $check_in, $check_out);
    }

    function checkPrice($price, $min, $max) {
        return $min === '' || $max === '' || ($min <= $price && $price <= $max);
    }

    $location = '';
    $check_in = '';
    $check_out = '';
    $min_price = '';
    $max_price = '';

    if(isset($_GET['location']))
        $location = $_GET['location'];
    if(isset($_GET['check_in']))
        $check_in = $_GET['check_in'];
    if(isset($_GET['check_out']))
        $check_out = $_GET['check_out'];
    if(isset($_GET['min_price']))
        $min_price = $_GET['min_price'];
    if(isset($_GET['max_price']))
        $max_price = $_GET['max_price'];

    $filtered_houses = array();

    if($location === ''){
        $houses = getAllHouses();
    } else {
        $houses = filterHouse($location);
    }

    foreach($houses as $house){
        if(checkDates($house['houseID'], $check_in, $check_out) && checkPrice($house['priceDay'], $min_price, $max_price)){
            array_push($filtered_houses, $house);
        }
    }

    echo json_encode($filtered_houses);
?>
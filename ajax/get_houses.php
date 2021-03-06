<?php 
    include_once('../database/db_house.php');
    include_once('../database/db_images.php');
    include_once('../database/db_comments.php');
    include_once('../database/db_user.php');
    include('../templates/temp_house.php');
    
    $username = $_GET['username'];

    $user = getUserByName($username);
    $houses = getHousesOfUser($user['userID']);
    
    foreach($houses as $house){
        $rating_info = getRatingOfHouse($house['houseID']);
        $photo = getHouseThumbnail($house['houseID']);
        draw_house_card($house, $rating_info, $photo);
    }
?>
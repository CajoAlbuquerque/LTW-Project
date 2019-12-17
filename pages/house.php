<?php 
    include_once('../database/db_house.php');
    include_once('../database/db_user.php');
    include_once('../database/db_comments.php');
    include_once('../session.php');
    include('../templates/temp_common.php');
    include('../templates/temp_house.php');
    include('../templates/temp_reservation.php');

    $houseID = $_GET['houseID'];
    if(!is_numeric($houseID)){
        die(header('Location: ../pages/homulessness.php'));
    }

    $editable = false;

    $house = getHouse($houseID);
    $owner = getUser($house['owner']);
    $comments = getAllCommentsOfHouse($houseID);

    if(isset($_SESSION['username'])){
        $editable = $owner['username'] == $_SESSION['username'];
    }

    draw_black_header();
    draw_script('house_reservation');
    draw_script('edit_house');
    draw_house($house, $owner, $comments, $editable);
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $user = getUserByName($username);
        if(isset($_POST['commenting'])) {
            draw_script('add_comment');
            draw_comment_form($houseID, $user['userID']);
        }
        else {
            draw_reservation_form($house, $user);
        }
    }
    draw_footer();
?>
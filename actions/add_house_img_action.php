<?php
    include_once('../templates/temp_message.php');
    include_once('../database/db_images.php');
    include_once('../images/upload.php');

    $houseID = $_POST['houseID'];
    $image = $_FILES['image'];

    try {
        if($image !== null && $image !== '') {
            $info = insertImage($image['name']);
            connectHouseImage($houseID, $info['photoId']);
            save_house_photo($image['tmp_name'], $info['destination']);
        }
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Added image succesfully!');
    }
    catch(PDOException $excpt) {
        die($excpt->getMessage());
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to add image!');
    }

    header("Location: ../pages/house.php?houseID=$houseID");


?>
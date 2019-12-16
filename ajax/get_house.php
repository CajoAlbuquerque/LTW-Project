<?php
    include_once('../database/db_house.php');

    if(isset($_GET['houseID'])){
        $houseID = $_GET['houseID'];
        echo json_encode(getHouse($houseID));
        return;
    }
?>
<?php
    include_once('../database/db_user.php');

    if(isset($_GET['username'])){
        $username = strtolower($_GET['username']);
        echo json_encode(getUserByName($username));
        return;
    }
?>
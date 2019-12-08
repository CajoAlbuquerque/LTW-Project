<?php
    include_once('../database/connection.php');
    include_once('../database/db_user.php');


    $id = $_GET['userID'];
    $username = $_GET['username'];
    $email = $_GET['email'];
    $name = $_GET['name'];
    $nationality = $_GET['nationality'];
    $age = $_GET['age'];

    if($id == null || $username == null || $email == null){
        return;
    }

    updateUser($id, $username, $email, $name, $nationality, $age);
    header('Location: ../pages/profile.php');
?>
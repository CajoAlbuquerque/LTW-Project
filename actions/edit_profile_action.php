<?php
    include_once('../session.php');
    include_once('../database/connection.php');
    include_once('../database/db_user.php');


    $id = $_GET['userID'];
    $username = $_GET['username'];
    $email = $_GET['email'];
    $name = $_GET['name'];
    $nationality = $_GET['nationality'];
    $age = $_GET['age'];

    // Checking for invalid null values
    if($id === '' || $username === '' || $email === ''){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username and Email cannot be empty!');
        die(header('Location: ../pages/profile.php'));
    }

    // Validating username
    if( !preg_match('/^[a-zA-Z0-9 _-]+$/', $username) ){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters, numbers, spaces or underscores!');
        die(header('Location: ../pages/profile.php'));
    }

    // Validating name
    if( !preg_match('/^[a-zA-Z0-9 -]+$/', $name) ){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Name can only contain letters, numbers and spaces!');
        die(header('Location: ../pages/profile.php'));
    }

    // Validating nationality
    if( !preg_match('/^[a-zA-Z -]+$/', $nationality) ){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Nationality can only contain letters and spaces!');
        die(header('Location: ../pages/profile.php'));
    }

    // Validating age
    if(!is_numeric($age) ){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Age numbers!');
        die(header('Location: ../pages/profile.php'));
    }

    // Checking if username or email already exist
    if ( getUserByEmail($email) !== false) {
        // If they exist then they have to be from the current user
        if($email !== getUser($id)['email']){
            $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Email already exists!');
            die(header('Location: ../pages/profile.php'));
        }
    }
    if ( getUserByName($username) !== false) {
        // If they exist then they have to be from the current user
        if($username !== getUser($id)['username']){
            $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username already exists!');
            die(header('Location: ../pages/profile.php'));
        }
    }

    try {
        updateUser($id, $username, $email, $name, $nationality, $age);
        $_SESSION['username'] = $username;
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Updated profile succesfully!');
    }
    catch(PDOException $excpt) {
        die($excpt->getMessage());
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to update profile!');
    }

    header('Location: ../pages/profile.php');
?>
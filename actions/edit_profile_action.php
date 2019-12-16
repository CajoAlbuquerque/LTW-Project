<?php
    include_once('../session.php');
    include_once('../database/connection.php');
    include_once('../database/db_user.php');
    include_once('../database/db_images.php');
    include_once('../images/upload.php');

    $id = $_POST['userID'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $nationality = $_POST['nationality'];
    $age = $_POST['age'];
    $image = $_FILES['img_file'];

    error_log("IMAGE IS: " . $image['name']);

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
        if($image !== null && $image !== '') {
            $info = insertImage($username);
            save_profile_photo($image, $info['destination']);
            updateUserImage($id, $info['photoId']);
        }
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
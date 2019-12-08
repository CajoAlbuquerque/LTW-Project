<?php
    include_once('../session.php');
    include_once('../database/connection.php');
    include_once('../database/db_user.php');

    $username = $_POST['username'];
    $current_pass = $_POST['current'];
    $new_pass = $_POST['new'];
    $confirm_pass = $_POST['confirm'];

    if ($new_pass !== $confirm_pass) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'New password and confirmation field did not match!');
        die(header('Location: ../pages/profile.php'));
    }
    
    // Checking if new password is not empty
    if ($new_pass === '' || $new_pass === null) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'New password can not be empty!');
        die(header('Location: ../pages/profile.php'));
    }
    
    // Validating current password
    if (!checkPassword($username, $current_pass)){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Current password did not match!');
        die(header('Location: ../pages/profile.php'));
    }

    try {
        updatePassword($username, $new_pass);
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Changed password succesfully!');
    }
    catch(PDOException $excpt) {
        die($excpt->getMessage());
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to change password!');
    }

    header('Location: ../pages/profile.php');
?>
<?php
    include_once('../session.php');
    include_once('../database/db_user.php');

    $username = strtolower($_POST['user']);
    $password = $_POST['pass'];

    // Checks if the password matches the saved hash
    if(checkPassword($username, $password)){
        $_SESSION['username'] = $username;
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Loged In successfully!');
        header('Location: ../pages/homepage.php');
    } else {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username or password do not match!');
        header('Location: ../pages/login.php');
    }
?>
<?php
    include_once('../session.php');
    include_once('../database/db_user.php');

    $username = strtolower($_POST['user']);
    $password = $_POST['pass'];
    $destination = 'homepage.php';

    if(isset($_SESSION['redirect'])) {
        $redirect = $_SESSION['redirect'];
        $destination = $redirect['page'] . '?';
        foreach($redirect as $key => $value) {
            if($key != 'page') {
                $destination .= $key . '=' . $value . '&';
            }
        }
        
        unset($_SESSION['redirect']);
    }

    // Validating username
    if( !preg_match('/^[a-zA-Z0-9 _-]+$/', $username) ){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Invalid username.');
        die(header('Location: ../pages/login.php'));
    }

    // Checks if the password matches the saved hash
    if(checkPassword($username, $password)){
        $_SESSION['username'] = $username;
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Logged In successfully!');
        header('Location: ../pages/' . $destination);
    } else {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username or password do not match!');
        header('Location: ../pages/login.php');
    }
?>